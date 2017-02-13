<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender','agent_referral', 'invite_code', 'invite_id', 'total_wallet', 'signature'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function bank(){
        return $this->hasOne(Bank::class);
    }
    public function bankAgent(){
        return $this->hasMany(Bank::class);
    }
    public function share(){
        return $this->hasMany(Share::class);
    }
    public function balance(){
        return $this->hasOne(Balance::class);
    }
    public function agent(){
        return $this->hasOne(Agent::class);
    }
    public function withdraw(){
        return $this->hasMany(Withdraw::class);
    }
    public function billetera(){
        return $this->hasOne(Billetera::class);
    }
    public function profit(){
        return $this->hasMany(Profit::class);
    }
}
