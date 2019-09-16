<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id','house_id','comment','time_comment'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function house()
    {
        return $this->belongsTo('App\House', 'house_id', 'id');
    }
}
