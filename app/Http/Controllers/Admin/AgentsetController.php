<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Profit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mail\RegisterAgent;
use Illuminate\Support\Facades\Mail;
use DB;

class AgentsetController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth", "admin"]);
    }

    public function index()
    {
        $data['agent_all'] = User::where('is_admin', 2)->latest()->paginate(30);
        return view('pages.admin.agentlist.agentlist', $data);
    }

    public function create()
    {
        // create
        return view("pages.admin.agentlist.addagent");
    }

    public function store(Request $request
    )
    {
        $this->validate($request, [
            'full_name' => 'required|max:40',
            'email' => 'required|email|max:255|unique:users',
            'gender' => 'required',
            'password' => 'required',
            'agent_name' => 'required|alpha|max:20|unique:agents,ref_agent_name',
            'ssm_no' => 'required',
            'company_name' => 'required',
            'location' => 'required',
        ]);
        $agent = new User;
        $agent->name = ucwords($request->full_name);
        $agent->email = $request->email;
        $agent->gender = $request->gender;
        $agent->is_admin = 2;
        $agent->signature = 'assets/img/sigexe.png';
        $agent->agent_referral = 'add_by_admin';
        $agent->invite_id = '1';
        $agent->invite_code = 'by_admin';
        $agent->password = bcrypt($request->password);
        $agent->save();

        $getUserID = $agent->id;

        Agent::create([
            'user_id' => $getUserID,
            'ref_agent_name' => $request->agent_name,
            'company_name' => $request->company_name,
            'address' => $request->location,
            'ssm_no' => $request->ssm_no,
        ]);

        $details = [
            'name' => $request->full_name,
            'mail' =>  $request->email,
            'pass' => $request->password,
            'comp_name' =>  $request->company_name,
            'ref_name' => $request->agent_name
        ];

        Mail::to($request->email)->send(new RegisterAgent($details));

         return redirect()->action('Admin\AgentsetController@index')->with('success', 'Successful create a new agent. Notification email will send to agent');

    }

}
