<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Profile;
use App\Profit;
use Illuminate\Http\Request;
use Auth;
use App\Withdraw;
use App\Bank;
use App\Billetera;
use DB;
class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function senaraiKeluar(){
        $userID =Auth::id();
        $data["semuaSenarai"] = DB::table('balances')
                    ->where('user_id', $userID)
                    ->where('active', 1)
                    ->paginate(15);
        $data["bankCheck"] = Bank::where('user_id', $userID)->first();    // bank check and  profile check  frankly is same shit just different syntax !!  don't confuse
        $data["profileCheck"] = Profile::where('user_id', $userID)->exists(); // bank check and  profile check  frankly is same shit just different syntax !!

        return view('pages.withdrawal.list', $data);
    }
    public function sendToWallet($id, Request $request){
            $userAll = Auth::user()->total_wallet;
           //$findID = Balance::find($id)->first();
           // $currentBalances = $userAll +

           dd($request, $totalBalance);
    }

    public function create()
    {
        $userID = Auth::id();
        $data["adaWithdrawal"] = DB::table('balances')->where('user_id', '=', $userID )->exists();
       $checkbankAcc = DB::table('banks')->where('user_id', '=', $userID )->exists();

       $checkAmount = Billetera::where('user_id', $userID);

       if ($checkAmount->exists()){
         $currentAmount =  $checkAmount->first();
           $data['amount'] =  $currentAmount->amount;
       }else{
           $data['amount'] = 0.00;
       }
       if($checkbankAcc) {
           $data["b_name"] = Auth::user()->bank->bankowner;
           $data["b_bank"] = Auth::user()->bank->bankname;
           $data["b_accno"] = Auth::user()->bank->bankaccnum;

           return view('pages.withdrawal.create', $data);
       }
        else{
            return redirect('profile/bank-detail');
        }


    }

    public function store(Request $request)
    {

    }

    public function viewAllHistory()
    {
            $getUser = Auth::id();
            $data["listing"] = Withdraw::where("user_id", $getUser )->paginate(30);
           // dd($data["listing"]);
            return view('pages.withdrawal.history', $data); // $data[""]
    }
}
