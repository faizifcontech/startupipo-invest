<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
        protected $fillable = ['user_id', 'bankowner', 'bankname', 'bankaccnum', 'swiftcode'];


        public function user(){
            return $this->belongsTo(User::class);
        }
}
