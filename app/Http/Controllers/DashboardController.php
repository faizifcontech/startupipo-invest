<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Billetera;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
Use App\User;
use App\Profile;
Use App\Profit;
use App\Share;
use Charts;
use DB;

class DashboardController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getID = Auth::id();
       // $data["mobile"] = Auth::user()->profile->phone ;
       // $data["location"] = Auth::user()->profile->location ;

        $checkUser = Billetera::where('user_id', $getID)->exists();

        if ($checkUser) {
           $data['all_profit'] = Auth::user()->billetera->amount;
        }
        $checkBalance = Balance::where('user_id', $getID)->exists();

        if ($checkBalance) {
            $data['active_invest'] = Balance::where('user_id', $getID)
                                                        ->where('active', 1)
                                                        ->sum('total_investment');
        }

        $data['history_fund'] =  Share::where('user_id',  $getID)->latest()->limit(6)->get();


        return view('pages.home.index', $data);
    }

}
