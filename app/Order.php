<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','house_id','status','check_in','check_out','revenue','userofhome'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function house()
    {
        return $this->belongsTo('App\House', 'house_id', 'id');
    }
}
