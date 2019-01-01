<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perpetrator extends Model
{
    public function victims()
    {
        return $this->hasMany('App\Victim');
    }
/*
    public function details()
    {
        return $this->belongsTo('App\Detail');
    } */

    protected $dates = [
        'date_of_birth',
        'arrest_date',
    ];
}
