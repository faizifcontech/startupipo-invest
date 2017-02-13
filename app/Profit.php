<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    protected $fillable =  ["user_id", "profit_amount", "active"];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
