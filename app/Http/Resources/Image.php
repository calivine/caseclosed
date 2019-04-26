<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Image extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'url' => $this->url,
            'type' => $this->type,
            'caption' => $this->caption,
            'imageable_id' => $this->imageable_id,
            'imageable_type' => $this->imageable_type
        ];
    }
}
