<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perpetrator extends Model
{
    public function victims()
    {
        return $this->hasMany('App\Victim');
    }

    public function source()
    {
        return $this->hasOne('App\Source');
    }
    /*
    public function details()
    {
        return $this->belongsTo('App\Detail');
    }
    */

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    protected $dates = [
        'date_of_birth',
        'arrest_date',
    ];
}
