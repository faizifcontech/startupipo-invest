<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Bank;
use App\Profile;
use App\Profit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Share;
Use App\Balance;
Use App\Billetera;
Use App\User;
use App\lotshare;
use Auth;
use DB;
use Alert;
use  Carbon\Carbon;

class ShareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deposit()
    {
        $getAgent = Auth::user()->agent_referral;
        $linkToAgnt = Agent::where('ref_agent_name', $getAgent)->first();
      //  $checkagentbank = Bank::where('user_id', $linkToAgnt->user_id)->exists();
        $data['listBank'] = DB::table('banks')->where('user_id', $linkToAgnt->user_id)->select(['id','bankowner', 'bankname', 'bankaccnum'])->get();

        $data['jumlahperlot'] = lotshare::where('id', 1)->first();

        return view('pages.share.deposit', $data);
    }

    public function depositSaved(Request $request)
    {
        $this->validate($request, [
            'payment_method' => 'required',
            'per_lot' => 'required|integer|between:1,10',
            'total_share' => 'numeric|max:300000',
            'time_of_transaction' => 'date_format:"Y-m-d H:i"|required',
            'proof_upload' => 'file|required_unless:payment_method,Cash Payment|mimes:jpeg,jpg,pdf,png|max:4096',
            //'notes' => 'string|max:30',
        ]);
        if ($request->file('proof_upload') == null){
            $path = "assets/img/cash-payment.jpg";
        }else{
            $path = Storage::putFile('doc', $request->file('proof_upload'));
        }


        if ($request->roi == 3) {
            $profit_monthly = $request->total_share * 0.03;
        } elseif ($request->roi == 2) {
            $profit_monthly = $request->total_share * 0.02;
        } else {
            $profit_monthly = $request->total_share * 0.01;
        }
        Share::create([
            'user_id' => Auth::user()->id,
            'saved_url' => $path,
            'total_share' => $request->total_share,
            'monthly_profit' => $profit_monthly,
            'model_of_investment' => $request->roi,
            'per_lot' => $request->per_lot,
            'send_to' => $request->payment_method,
            'transfer_on' => $request->time_of_transaction . ':00',//  "2016-11-28 12:27:00 ",
            'notes' => $request->notes,
        ]);


        return redirect()->action('ShareController@history')->with('success', "Great.! You have successful make a fund request. We will review your request within 12 Hours");
    }

    public function history()
    {
        $userID = Auth::id();
        $data["adaShare"] = DB::table('shares')->where('user_id', '=', $userID)->exists();

        $data['history_fund'] = Share::where('user_id', '=', $userID)->orderBy('created_at', 'desc')->paginate(12);// orderBy('created_at', 'desc')->paginate(10);
        return view('pages.share.deposit-history', $data);
    }

    public function profitList()
    {
        $userAuth = Auth::id();
        $date = Carbon::today()->toDateString();
        $profit = DB::table('profits')
            ->where('user_id', $userAuth)
            // ->where('active', 1)
            ->where('due_date', '<=', $date)
            ->orderBy('due_date', 'desc')
            ->paginate(10);

        //  dd($profit);
        return view("pages.profit.index", compact('profit'));
    }

    public function clearPayback($uuid)
    {
        $getID = Auth::id();

        $cariNilaiBill = Billetera::where('user_id', $getID);
        //check same user_id

        $check = $cariNilaiBill->exists();
        if ($check) {
            $amounts = $cariNilaiBill->first();
            $currentBalance = $amounts->amount;
        } else {
            $currentBalance = "0.00";
        }

        $balList = Balance::where('uuid', $uuid)->first();
        $getInvestemnt = $balList->total_investment;
        $sumAll = $getInvestemnt + $currentBalance;

        $deactiveBal = Balance::find($balList->id);
        $deactiveBal->active = 0;
        $deactiveBal->save();

        Billetera::updateOrCreate(['user_id' => $getID],
            [
                'amount' => $sumAll,
            ]);
        return back()->with('success', 'You have successful transfer your principal money investment to wallet balance');

    }

    public function SendProfitMonthly($id)
    {
        $getID = Auth::id();
        $cariNilaiBill = Billetera::where('user_id', $getID);
        //check same user_id
        $check = $cariNilaiBill->exists();
        if ($check) {
            $amounts = $cariNilaiBill->first();
            $currentBalance = $amounts->amount;
        } else {
            $currentBalance = "0.00";
        }
        $checkStatus = Profit::findOrFail($id);
        // dd($checkStatus);
        if ($checkStatus->active == 1) {
            $monthlyProfit =  $checkStatus->profit_amount;
            $sumAll = $currentBalance + $monthlyProfit;

            Billetera::updateOrCreate(['user_id' => $getID],
                [
                    'amount' => $sumAll,
                ]);

            $deactivateProfit = Profit::find($id);
            $deactivateProfit->active = 0;
            $deactivateProfit->save();

            Alert::success('Success', 'Profit Transferred');
            return back();
        }
        return abort(404);
        //return back()->with('success', 'You have successful transfer your principal money investment to wallet balance' );
    }
}
