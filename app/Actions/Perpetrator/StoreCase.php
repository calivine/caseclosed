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
        if ($request->has('arrest_date')) {
            $perpetrator->arrest_date = $request->input('arrest_date');
        }
        if ($request->has('date_of_birth')) {
            $perpetrator->date_of_birth = $request->input('date_of_birth');
        }
        if ($request->has('date_of_death')) {
            $perpetrator->date_of_death = $request->input('date_of_death');
        }
        if ($request->has('description')) {
            $perpetrator->description = $request->input('description');
        }

        $perpetrator->save();
        $this->rda = [
            'perpetrator' => $perpetrator
        ];
    }
}
