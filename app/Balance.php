<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class Balance extends Model
{
    protected $fillable = [ 'total_investment', 'user_id', 'package', 'uuid', 'active', 'monthly_profit', 'total_lot', 'total_share' ];

   public static function allBalance(){
       $userID = Auth::id();
       $checking = DB::table('billeteras')->where('user_id',  $userID )->exists();
       //dd($checking);
       if(!$checking){
           return 0;
       }else{
         return  Auth::user()->billetera->sum('billeteras');
       }
    }
    public static function allProfit(){
        $userID = Auth::id();
        $checking = DB::table('billeteras')->where('user_id',  $userID )->exists();
        //dd($checking);
        if(!$checking){
            return 0;
        }else{
            return  Auth::user()->balance->sum('monthly_profit');
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
