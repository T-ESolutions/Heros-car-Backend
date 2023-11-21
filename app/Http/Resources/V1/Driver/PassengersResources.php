<?php

namespace App\Http\Resources\V1\Driver;

use Illuminate\Http\Resources\Json\JsonResource;

class PassengersResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'trip_id' => $this->trip_id,
            'driver_car_id' => $this->driver_car_id,
            'driver_id' => $this->driver_id,
            'user' => new UserResources($this->user),
            'from_lat' => $this->from_lat,
            'from_lng' => $this->from_lng,
            'from_address_ar' => $this->from_address_ar,
            'from_address_en' => $this->from_address_en,
            'to_lat' => $this->to_lat,
            'to_lng' => $this->to_lng,
            'to_address_ar' => $this->to_address_ar,
            'to_address_en' => $this->to_address_en,
            'price' => $this->price,
            'chairs' => $this->chairs,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'accept_at' => $this->accept_at,
            'reject_at' => $this->reject_at,

        ];
    }
}
