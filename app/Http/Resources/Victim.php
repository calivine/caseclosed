<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;



class Victim extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'cause_of_death' => $this->cause_of_death,
            'incident_date' => $this->incident_date,
            'location' => $this->location,
            'description' => $this->description,
            'perpetrator_id' => $this->perpetrator_id
        ];
    }
}
