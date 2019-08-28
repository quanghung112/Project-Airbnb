<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public function image(){
        return $this->hasMany('App\ImagePost');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
