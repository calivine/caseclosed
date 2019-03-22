<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    public function perpetrator()
    {
        return $this->belongsTo('App\Perpetrator');
    }

/*
    public function detail()
    {
        return $this->hasOne('App\Detail');
    }
*/

    protected $dates = [
        'date_of_birth',
        'incident_date'
    ];
}
