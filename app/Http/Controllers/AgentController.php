<?php

namespace App\Http\Controllers;


use Auth;
use App\Balance;
use App\User;
use App\Bank;
use App\Share;
use App\Agent;
use App\Profit;
use Illuminate\Http\Request;
use DB;
use Alert;
use Charts;
use Carbon\Carbon;
class AgentController extends Controller
{
    public function __construct(){
        $this->middleware(['agent', 'auth'])->except(['siggyAgent','siggyAgentUpdate']);
    }
    public function index(){
        $data['bankCheck'] = Bank::where('user_id', Auth::id())->exists();
        $referralName = Auth::user()->agent->ref_agent_name;
        $data["jumlahuser"] = DB::table('users')->where('agent_referral', $referralName)->count();
        $data["latestInvestor"] = DB::table('users')->where('agent_referral', $referralName) ->latest()->first();

        $data["depositList"] = DB::table('shares') ->join('users', 'users.id', '=', 'shares.user_id')
                                                                                        ->select('shares.*')
                                                                                        ->where('users.agent_referral', '=', $referralName)
                                                                                        ->latest()->limit(5)->get();
        $data["withdrawList"] = DB::table('withdraws') ->join('users', 'users.id', '=', 'withdraws.user_id')
            ->select('withdraws.*')
            ->where('users.agent_referral', '=', $referralName)
            ->latest()->limit(5)->get();

        $data["chart"] = Charts::database(User::where('agent_referral', $referralName)->get(), 'bar', 'morris')
            ->title("Registered investor")
            ->elementLabel("Total")
            ->dimensions(1000, 350)
            ->responsive(true)
           // ->lastByMonth();
            ->groupByMonth();
        return view('pages.agent.index', $data);
    }
    public function  addBank()
    {
        $getID = Auth::id();
        $data["bankList"] = [
            'AFFIN BANK' => 'AFFIN BANK BERHAD',
            'AL RAJHI BANKING' => 'AL RAJHI BANKING AND INVESTMENT CORPORATION (MALAYSIA) BHD',
            'ALLIANCE BANK MALAYSIA BERHAD' => 'ALLIANCE BANK MALAYSIA BERHAD',
            'AMBANK (M) BERHAD' => 'AMBANK (M) BERHAD',
            'BANK ISLAM MALAYSIA BERHAD' => 'BANK ISLAM MALAYSIA BERHAD',
            'BANK RAKYAT' => 'BANK KERJASAMA RAKYAT MALAYSIA BERHAD (BANK RAKYAT)',
            'BANK MUAMALAT MALAYSIA BERHAD ' => 'BANK MUAMALAT MALAYSIA BERHAD ',
            'BANK SIMPANAN NASIONAL' => 'BANK SIMPANAN NASIONAL',
            'BANK PERTANIAN MALAYSIA BERHAD-AGROBANK' => 'BANK PERTANIAN MALAYSIA BERHAD-AGROBANK',
            'CIMB BANK BERHAD' => 'CIMB BANK BERHAD',
            'HONG LEONG BANK BERHAD' => 'HONG LEONG BANK BERHAD',
            'HSBC BANK MALAYSIA BERHAD' => 'HSBC BANK MALAYSIA BERHAD',
            'OCBC BANK (MALAYSIA) BERHAD' => 'OCBC BANK (MALAYSIA) BERHAD',
            'MAYBANK' => 'MALAYAN BANKING BERHAD (MAYBANK)',
            'PUBLIC BANK BERHAD' => 'PUBLIC BANK BERHAD',
            'RHB BANK BERHAD' => 'RHB BANK BERHAD'
        ];
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
    public function profileIndex(){
        $data["agent"] = Auth::user()->agent;
        return view('pages.agent.profile', $data);
    }
    public function profileEdit(Request $request){
        $this->validate($request, [
            'company_name' => 'required',
            'ssm_no' => 'required',
            'address' => 'required|max:100'
        ]);

        $profileAgent = Agent::where('user_id', Auth::id())->firstOrFail();
        $profileAgent->company_name = $request->company_name ;
        $profileAgent->address = $request->ssm_no ;
        $profileAgent->ssm_no = $request->address ;
        $profileAgent->save();

        alert()->success('You successful update your profile', 'Profile Updated')->persistent('Close');

        return back();
    }
    public function siggyAgent(){
        return view('pages.agent.siggy.sig');
    }
    public function siggyAgentUpdate(Request $request){
        $this->validate($request, ['digital_signature' => 'required']);

        $idUser = Auth::id();

        $siggy = User::find($idUser);
        $siggy->signature = $request->digital_signature ;
        $siggy->save();

        return redirect()->action('AgentController@index');
    }

}
