<?php

namespace App\Actions\Victim;

use App\Victim;

class UpdateVictim
{
    public function __construct($request, $id)
    {
        $victim = Victim::find($id);
        if ($request->has('victim_name')) {
            $name = explode(" ", $request->input('victim_name'));
            $victim->first_name = $name[0];
            if (count($name) > 2) {
                $victim->middle_name = $name[1];
                $victim->last_name = $name[2];
            } else {
                $victim->last_name = $name[1];
            }
        }
        if ($request->has('date_of_birth')) {
            $victim->date_of_birth = $request->input('date_of_birth');
        }
        if ($request->has('incident_date')) {
            $victim->incident_date = $request->input('incident_date');
        }
        if ($request->has('description')) {
            $victim->description = $request->input('description');
        }
        if ($request->has('location')) {
            $victim->location = $request->input('location');
        }
        $victim->save();

        $this->rda = [
            'id' => $victim->perpetrator->id
        ];

    }
}
