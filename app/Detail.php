<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /*
    public function perpetrator()
    {
        return $this->hasOne('App\Perpetrator');
    }

    public function victim()
    {
        return $this->hasOne('App\Victim');
    } */

    public function victims()
    {
        return $this->belongsTo('App\Victim');
    }

    protected $dates = [
        'incident_date',
        'arrest_date',
    ];
}
