<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{

    protected $fillable = [
        'title', 'style', 'loan_type', 'address', 'city', 'district', 'sub_district',
        'bedroom', 'bathroom', 'price', 'convenient', 'description', 'user_id', 'status', 'start_loan', 'end_loan', 'revenue'
    ];

    public function image(){
        return $this->hasMany('App\ImagePost');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->hasMany('App/Order');
    }
}
