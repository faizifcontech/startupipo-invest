<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable =  ["user_id", "sum_withdrawal", "transfer_to_bank", "status", "name", "remark", "swift_code", "account_no"];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
