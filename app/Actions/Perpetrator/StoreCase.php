<?php

namespace App\Actions\Perpetrator;

use App\Perpetrator;

class StoreCase
{
    public function __construct($request)
    {
        $perpetrator = new Perpetrator();
        $name = explode(" ", $request->input('perp_name'));
        $perpetrator->first_name = $name[0];
        if (count($name) > 2) {
            $perpetrator->middle_name = $name[1];
            $perpetrator->last_name = $name[2];
        } else {
            $perpetrator->last_name = $name[1];
        }
        if ($request->has('perp_arrest')) {
            $perpetrator->arrest_date = $request->input('perp_arrest');
        }
        if ($request->has('perp_dob')) {
            $perpetrator->date_of_birth = $request->input('perp_dob');
        }
        if ($request->has('perp_death')) {
            $perpetrator->date_of_death = $request->input('perp_death');
        }
        if ($request->has('perp_details')) {
            $perpetrator->description = $request->input('perp_details');
        }

        $perpetrator->save();
        $this->rda = [
            'perpetrator' => $perpetrator
        ];
    }
}
