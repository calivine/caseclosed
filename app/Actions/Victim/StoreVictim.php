<?php

namespace App\Actions\Victim;

use App\Perpetrator;
use App\Victim;

class StoreVictim
{
    public function __construct($request, $id)
    {
        $perpetrator = Perpetrator::find($id);
        $victim = new Victim;

        // Split victim name input into First Middle Last
        $name = explode(" ", $request->input('victim_name'));
        $victim->first_name = $name[0];
        if (count($name) > 2) {
            $victim->middle_name = $name[1];
            $victim->last_name = $name[2];
        } else {
            $victim->last_name = $name[1];
        }
        $victim->gender = $request->input('gender');

        $victim->cause_of_death = $request->input('cause_of_death');
        if ($request->has('date_of_birth')) {
            $victim->date_of_birth = $request->input('date_of_birth');
        }
        if ($request->has('incident_date') or $request->has('details')) {

            if ($request->has('incident_date')) {
                $victim->incident_date = $request->input('incident_date');
            }
            if ($request->has('description')) {
                $victim->description = $request->input('description');
            }
        }

        $victim->location = $request->input('location');

        $victim->perpetrator()->associate($perpetrator);
        $victim->save();

        $this->rda = [
            'id' => $perpetrator->id
        ];
    }
}
