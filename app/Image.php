<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function perpetrator()
    {
        return $this->belongsTo('App\Perpetrator');
    }
}
