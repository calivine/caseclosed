<?php

namespace App\Actions\Image;

use App\Image;

class DestroyImage
{
    public function __construct($id)
    {
        $image = Image::find($id);

        $caseID = $image->imageable->id;

        $image->delete();

        $this->rda = [
            'caseID' => $caseID
        ];
    }
}
