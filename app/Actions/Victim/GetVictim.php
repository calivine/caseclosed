<?php

namespace App\Actions\Victim;

use App\Victim;

class GetVictim
{
    public function __construct()
    {
        $victim = Victim::all()->random();

        $profileImage = $victim->images->first();

        $this->rda = [
            'victim' => $victim,
            'profileImage' => $profileImage
        ];
    }
}