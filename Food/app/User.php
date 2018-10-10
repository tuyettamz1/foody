<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function places(){
        return $this->hasMany('App\Place');
    }

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function favorites(){
        return $this->hasMany('App\Favorite');
    }
    
    public function isAdmin()
    {
        if($this->role_id ==1)
            return true;
        else
            return false;
    }
}
