<?php

namespace App\Actions\Perpetrator;

use App\Perpetrator;

class UpdateCase
{
    public function __construct($request, $id)
    {
        # Get perpetrator record to update
        $perpetrator = Perpetrator::find($id);
        if ($request->has('perp_name')) {
            $name = explode(" ", $request->input('perp_name'));
            $perpetrator->first_name = $name[0];
            if (count($name) > 2) {
                $perpetrator->middle_name = $name[1];
                $perpetrator->last_name = $name[2];
            } else {
                $perpetrator->last_name = $name[1];
            }
        }
        if ($request->has('dob')) {
            $perpetrator->date_of_birth = $request->input('dob');
        }
        if ($request->has('arrest')) {
            $perpetrator->arrest_date = $request->input('arrest');
        }
        if ($request->has('death')) {
            $perpetrator->date_of_death = $request->input('death');
        }
        if ($request->has('details')) {
            $perpetrator->description = $request->input('details');
        }
        $perpetrator->save();
    }
}