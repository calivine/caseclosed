<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    public function perpetrator()
    {
        return $this->belongsTo('App\Perpetrator');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function detail()
    {
        return $this->hasOne('App\Detail');
    }

    public function source()
    {
        return $this->hasOne('App\Source');
    }

    protected $dates = [
        'date_of_birth',
    ];
}
