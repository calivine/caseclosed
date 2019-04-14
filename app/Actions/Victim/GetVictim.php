<?php

namespace App\Actions\Victim;

use App\Perpetrator;

class GetVictim
{
    public function __construct()
    {
        $perpetrators = Perpetrator::all();

        $victim = $perpetrators->random()->victims->random();

        $this->rda = [
            'victim' => $victim
        ];
    }
}