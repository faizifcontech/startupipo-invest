<?php

namespace App\Http\Controllers;

use App\lotshare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Share;
use App\Balance;

class AgentProfitController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth", "agent"]);
    }

    public function depositList()
    {

        $referralName = Auth::user()->agent->ref_agent_name;
        $data['share'] = DB::table('shares')
            ->join('users', 'users.id', '=', 'shares.user_id')
            ->select('shares.*')
            ->where('users.agent_referral', '=', $referralName)
            ->latest()
            ->paginate(15);
        return view('pages.agent.getdeposit', $data);
    }

    public function depositEdit($id)
    {
        $data["user"] = Share::findOrFail($id);
        return view('pages.agent.depositEdit', $data);
    }

    public function depositUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
            'remark' => 'required'
        ]);
        $updateStatus = Share::findOrFail($id);
        $updateStatus->update([
            'status' => $request->status,
            'remark' => $request->remark,
        ]);
        // if approve trigger yang ni, else
        if ($request->status == 2) {
            $shareID = Share::find($id);
            $getInvest = $shareID->total_share;
            //calculate profit
            if ($shareID->model_of_investment == 3) {
                $divideProfit = $getInvest * 0.03;
                $id_user = $shareID->user_id;
                $multplyDB = [];
                //     $currentMonth = (int)date('m');
                for ($x = 2; $x <= 19; $x++) {
                    $bulanDepan = Carbon::today()->addMonths($x)->toDateString();
                    $multplyDB[] = ["user_id" => $id_user, "active" => 1, "profit_amount" => $divideProfit, "due_date" => $bulanDepan];
                }
                DB::table('profits')->insert($multplyDB);

            } elseif ($shareID->model_of_investment == 2) {
                $divideProfit = $getInvest * 0.02;
                $id_user = $shareID->user_id;
                $multplyDB = [];
                //     $currentMonth = (int)date('m');
                for ($x = 2; $x <= 13; $x++) {
                    $bulanDepan = Carbon::today()->addMonths($x)->toDateString();
                    $multplyDB[] = ["user_id" => $id_user, "active" => 1, "profit_amount" => $divideProfit, "due_date" => $bulanDepan];
                }
                DB::table('profits')->insert($multplyDB);
            } else {
                $divideProfit = $getInvest * 0.01;
                $id_user = $shareID->user_id;
                $multplyDB = [];
                //     $currentMonth = (int)date('m');
                for ($x = 2; $x <= 7; $x++) {
                    $bulanDepan = Carbon::today()->addMonths($x)->toDateString();
                    $multplyDB[] = ["user_id" => $id_user, "active" => 1, "profit_amount" => $divideProfit, "due_date" => $bulanDepan];
                }
                DB::table('profits')->insert($multplyDB);
            }
            $currentShare = lotshare::find(1)->lotshare;
            Balance::create(
                [
                    'user_id' => $shareID->user_id,
                    'package' => $shareID->model_of_investment,
                    'total_lot' => $shareID->per_lot,
                    'total_share' => $currentShare,
                    'monthly_profit' =>  $shareID->monthly_profit,
                    'active' => 1,
                    'total_investment' => $getInvest,
                ]);
        }
        return redirect()->action('AgentProfitController@depositList');
    }
}
