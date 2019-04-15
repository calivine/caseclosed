<?php

namespace App\Actions\Victim;

use App\Perpetrator;

class GetVictim
{
    public function __construct()
    {
        $perpetrators = Perpetrator::all();

        $victim = $perpetrators->random()->victims->random();

        $images = $victim->perpetrator->images;

        $homeImage = null;

        foreach($images as $image) {
            if (str_contains($image->caption, $victim->last_name)) {
                $homeImage = $image;
                break;
            }
        }

        $this->rda = [
            'victim' => $victim,
            'image' => $homeImage ?? null
        ];
    }
}