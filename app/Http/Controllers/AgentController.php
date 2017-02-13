<?php

namespace App\Http\Controllers;


use Auth;
use App\Balance;
use App\Bank;
use App\Share;
use App\Agent;
use App\Profit;
use Illuminate\Http\Request;
use DB;

class AgentController extends Controller
{
    public function __construct(){
        $this->middleware(['agent', 'auth']);
    }
    public function index(){
        $referralName = Auth::user()->agent->ref_agent_name;
        $data["jumlahuser"] = DB::table('users')->where('agent_referral', $referralName)->count();
        return view('pages.agent.index', $data);
    }
    public function  addBank()
    {
        $getID = Auth::id();
        $data["listBank"] = DB::table('banks')->where('user_id', $getID)->get();
        return view('pages.agent.bankaccount', $data);
    }
    public function  postBank(Request $request)
    {
        $this->validate($request, [
            'beneficiary_name' => 'required|min:5',
            'bank_name' => 'required',
            'beneficiary_acc_no' => 'required|min:6|max:35'
        ]);
        $request->user()->bankAgent()->create([
            'bankowner' => $request->beneficiary_name,
            'bankname' => $request->bank_name,
            'bankaccnum' => $request->beneficiary_acc_no,
         //   'swiftcode' => $request->swift_code,
            'user_id' => Auth::id()
        ]);
        //dd($request);
        session()->flash('message', 'Nice, You have been add new bank detail');
        return back();
    }
    public function  deleteBank($id)
    {
        $buang = Bank::findOrFail($id);
        $buang->delete();
        session()->flash('message', 'You just delete your bank info. Please add your current bank info');
        return back();
    }
    public function userList(){

        $referralName = Auth::user()->agent->ref_agent_name;
        $data["userList"] = DB::table('users')->where('agent_referral', $referralName)->latest()->paginate(25);
        return view('pages.agent.userlist', $data);
    }

}
