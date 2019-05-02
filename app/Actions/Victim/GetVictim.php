<?php

namespace App\Actions\Victim;

use App\Victim;

class GetVictim
{
    public function __construct()
    {
        // $victim = Victim::all()->random();

        // $victims = Victim::all();
        $homepageVictimPool = collect();

        foreach(Victim::all() as $victim) {
            if (!is_null($victim->description) or $victim->description != '') {
                $homepageVictimPool = $homepageVictimPool->push($victim);
            }
        }

        $victim = $homepageVictimPool->random();

        $profileImage = $victim->images->first();

        $this->rda = [
            'victim' => $victim,
            'profileImage' => $profileImage
        ];
    }
}