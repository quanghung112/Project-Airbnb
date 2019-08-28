<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'title', 'style', 'loan_type', 'address', 'city', 'district', 'sub_district', 'bedroom', 'bathroom', 'price', 'convenient', 'description', 'user_id'
    ];
}
