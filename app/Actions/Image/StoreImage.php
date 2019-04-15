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

        $image->perpetrator()->associate($perpetrator);

        $image->save();

        $this->rda = [
            'id' => $perpetrator->id
        ];
    }
}