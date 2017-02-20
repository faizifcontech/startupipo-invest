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
use Alert;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function senaraiKeluar()
    {
        $userID = Auth::id();
        $data["semuaSenarai"] = DB::table('balances')
            ->where('user_id', $userID)
            ->where('active', 1)
            ->paginate(15);
        $data["bankCheck"] = Bank::where('user_id', $userID)->first();    // bank check and  profile check  frankly is same shit just different syntax !!  don't confuse
        $data["profileCheck"] = Profile::where('user_id', $userID)->exists(); // bank check and  profile check  frankly is same shit just different syntax !!

        return view('pages.withdrawal.list', $data);
    }

    public function create()
    {
        $userID = Auth::id();
        $data["adaWithdrawal"] = DB::table('balances')->where('user_id', '=', $userID)->exists();
        $checkbankAcc = DB::table('banks')->where('user_id', '=', $userID)->exists();

        $data['checkAmount'] = Billetera::where('user_id', $userID);

        if ($data['checkAmount']->exists()) {
            $currentAmount = $data['checkAmount']->first();
            $data['amount'] = $currentAmount->amount;
        } else {
            $data['amount'] = 0.00;
        }
        if ($checkbankAcc) {
            $data["b_name"] = Auth::user()->bank->bankowner;
            $data["b_bank"] = Auth::user()->bank->bankname;
            $data["b_accno"] = Auth::user()->bank->bankaccnum;

            return view('pages.withdrawal.create', $data);
        } else {
            return redirect('profile/bank-detail');
        }
    }

    public function store(Request $request)
    {
        //   $getID = Auth::id();
        $currentBalance = Auth::user()->billetera->amount;
        //      dd($currentBalance);
        //$currentBalance = Auth::user()->withdraw->amount;
        $this->validate($request, [
            'beneficiary_name' => 'required|min:5',
            'beneficiary_bank' => 'required',
            'account_no' => 'required|min:6|max:45',
            'total_withdrawal' => 'required|numeric|max:' . $currentBalance
        ]);
        Alert::message('Robots are working!');
        $request->user()->withdraw()->create([
            'user_id' => Auth::id(),
            'name' => $request->beneficiary_name,
            'status' => 0,
            'sum_withdrawal' => $request->total_withdrawal,
            'transfer_to_bank' => $request->beneficiary_bank,
            'account_no' => $request->account_no,
            'swift_code' => $request->swift_code
        ]);
        alert()->success('Your request have been submit', 'Thank you! ')->persistent('Close');
        return redirect()->action('WithdrawController@viewAllHistory');
    }

    public function viewAllHistory()
    {
        $getUser = Auth::id();
        $data["listing"] = Withdraw::where("user_id", $getUser)->latest()->paginate(20);
        // dd($data["listing"]);
        return view('pages.withdrawal.history', $data); // $data[""]
    }
}
