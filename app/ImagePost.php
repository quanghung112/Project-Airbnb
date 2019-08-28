<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    public function houses()
    {
        return $this->belongsTo('App\House');
    }
}
