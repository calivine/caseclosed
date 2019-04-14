<?php

namespace App\Actions\Source;

use App\Perpetrator;
use App\Source;

class StoreSource
{
    public function __construct($request, $id)
    {
        $perpetrator = Perpetrator::find($id);

        $source = new Source;

        $source->url = $request->input('source');

        $source->perpetrator()->associate($perpetrator);

        $source->save();

        $this->rda = [
            'id' => $perpetrator->id
        ];
    }
}