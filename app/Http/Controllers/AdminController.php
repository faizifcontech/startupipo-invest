<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Balance;
use App\lotshare;
use App\Share;
use DB;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware( ['admin', 'auth']);
    }
    public function index(){
        $data['totaluser'] = DB::table('users')->where('is_admin', 0 )->count();
        $data['totalagent'] = DB::table('users')->where('is_admin', 2 )->count();
        $data['latestUser'] = DB::table('users')->orderBy('created_at', 'desc')->limit(6)->get();
       // dd($latestList);
       // dd($data);
        return view('pages.admin.index',  $data);
    }
    //Share add
    public function shareIndex(){
        $shareLot = DB::table('lotshares')->where('id', '1')->first();
        return view('pages.admin.lotshare', compact('shareLot'));
    }
    public function shareUpdate(Request $request){
        $this->validate($request, [
            'lotshare' => 'required|numeric'
        ]);

        $updateStatus = lotshare::findOrFail(1);
        $updateStatus->update([
            'lotshare' => $request->lotshare,
        ]);

        return back();
    }
}
