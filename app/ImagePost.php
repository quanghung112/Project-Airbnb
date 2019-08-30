<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    protected $fillable = [
        'image', 'house_id'
    ];
    public function houses()
    {
        return $this->belongsTo('App\House');
    }
}
