<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    public function perpetrator()
    {
        return $this->belongsTo('App\Perpetrator');
    }
}
