<?php

namespace App\Actions\Image;

use App\Image;
use App\Perpetrator;

class StoreImage
{
    public function __construct($request, $id)
    {
        $perpetrator = Perpetrator::find($id);

        $image = new Image;

        $image->url = $request->input('url');

        $image->type = $request->input('type');

        if ($request->has('caption')) {
            $image->caption = $request->input('caption');
        }

        if ($request->type == 'perpetrator') {
            $image->imageable_id = $perpetrator->id;
            $image->imageable_type = 'App\Perpetrator';
        }
        else if ($request->type == 'victim') {
            $image->imageable_id = $request->input('victim');
            $image->imageable_type = 'App\Victim';
        }

        $image->save();

        $this->rda = [
            'id' => $perpetrator->id
        ];
    }
}