<?php

namespace App\Http\Controllers\Admin;

use App\Billetera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Withdraw;
//use DB
use Illuminate\Support\Facades\DB;
use Alert;

class UserSetController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth", "admin"]);
    }

    public function userList()
    {
        $data['user_all'] = User::where('is_admin', 0)->latest()->paginate(30);
        return view('pages.admin.userlist.userlist', $data);
    }

    public function withdrawalList()
    {
        $data['listWithDrawal'] = DB::table('withdraws')
            ->where('status', 0)
            ->latest()
            ->paginate(25);
        return view('pages.admin.userlist.withdrawalList', $data);
    }

    public function withdrawalView($id)
    {
        $data['details'] = Withdraw::findOrFail($id);

        return view('pages.admin.userlist.withdrawalView', $data);
    }

    public function withdrawalPatch(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
            'remark' => 'required|min:5'
        ]);

        $changeStatus = Withdraw::findOrFail($id);
        $changeStatus->status = $request->status;
        $changeStatus->remark = $request->remark;
        $changeStatus->save();

        $user_id_wallet = $changeStatus->user_id;
        $currentBalance = Billetera::where('user_id', $user_id_wallet)->first()->amount;
        $currentRequest =  "12.52"; //$changeStatus->sum_withdrawal;
        $amount_wallet = $currentBalance - $currentRequest;
        if ($request->status == 1) {

            DB::table('billeteras')
                ->where('user_id', $user_id_wallet)
                ->update(['amount' => $amount_wallet]);
        }
        alert()->info('Successful to change status', 'Status Updated')->persistent('Close');
        return redirect()->action('Admin\UserSetController@withdrawalList');
    }
}
