<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function district(){
        return $this->belongsTo('App\District');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    public function favorites(){
        return $this->hasMany('App\Favorite');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function advertisements(){
        return $this->hasMany('App\Advertisement');
    }
}
