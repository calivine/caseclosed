<?php

namespace App\Actions\Victim;

use App\Victim;

class DestroyVictim
{
    public function __construct($id)
    {
        $victim = Victim::find($id);

        $caseID = $victim->perpetrator->id;

        $victim->delete();

        $this->rda = [
            'caseID' => $caseID
        ];
    }
}
