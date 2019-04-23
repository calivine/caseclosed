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

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    protected $dates = [
        'date_of_birth',
        'arrest_date',
        'date_of_death'
    ];
}
