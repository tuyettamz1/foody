<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function place(){
        return $this->belongsTo('App\Place');
    }

    protected $fillable = [
        'user_id', 'place_id', 'status',
    ];
}
