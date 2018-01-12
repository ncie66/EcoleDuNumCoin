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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getProfile(){

        return $this->hasOne('Profile','userid');
    }

    public function hasWritten(){

        return $this->hasMany('BTC','writeid');
    }

    public function hasRead(){

        return $this->belongsToMany('BTC','userid');
    }
}
