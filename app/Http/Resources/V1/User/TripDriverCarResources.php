<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class TripDriverCarResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => (int)$this->id,
            'approved'          => $this->approved,
            'available'         => $this->available,
            'car_image'         => $this->car_image,
            'car_plate_num'     => $this->car_plate_num,
            'car_plate_txt'     => $this->car_plate_txt,
            'factory_year'      => $this->factory_year,
            'chairs'            => $this->chairs,
            'air_cond'          => $this->air_cond,
            'bags'              => $this->bags,
        ];
    }
}
