<?php

namespace App\Actions\Perpetrator;

use App\Perpetrator;

class DestroyCase
{
    public function __construct($id)
    {
        $perpetrator = Perpetrator::find($id);
        $perpetrator->victims()->delete();
        $perpetrator->sources()->delete();
        $perpetrator->images()->delete();
        $perpetrator->delete();
    }
}