<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perpetrator extends Model
{
    public function victims()
    {
        return $this->hasMany('App\Victim');
    }

    public function sources()
    {
        return $this->hasMany('App\Source');
    }
    /*
    public function details()
    {
        return $this->belongsTo('App\Detail');
    }
    */

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    protected $dates = [
        'date_of_birth',
        'arrest_date',
        'date_of_death'
    ];
}
