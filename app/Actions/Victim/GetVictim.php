<?php

namespace App\Actions\Victim;

use App\Victim;

class GetVictim
{
    public function __construct()
    {
        $victim = Victim::all()->random();

        $this->rda = [
            'victim' => $victim
        ];
    }
}