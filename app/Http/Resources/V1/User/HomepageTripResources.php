<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class HomepageTripResources extends JsonResource
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
            'id'                => $this->id,
            'driver_id'         => $this->driver_id,
            'department_id'     => $this->department_id,
            'driver_car_id'     => $this->driver_car_id,
            'car_image'         => $this->car_image,
            'brand_name'        => $this->brand_name,
            'modell_name'       => $this->modell_name,
            'color_name'        => $this->color_name,
            'price_per_person'  => $this->price_per_person,
            'trip_date'         => $this->trip_date,
            'trip_time_from'    => $this->trip_time_from,
            'trip_time_to'      => $this->trip_time_to,
            'chairs'            => (int)$this->chairs,
            'available_chairs'  => (int)$this->available_chairs,
            'booked_chairs'     => (int)$this->booked_chairs,
            'air_cond'          => (int)$this->air_cond,
            'bags'              => (int)$this->bags,
            'from_lat'          => (string)$this->from_lat,
            'from_lng'          => (string)$this->from_lng,
            'from_address_ar'   => (string)$this->from_address_ar,
            'from_address_en'   => (string)$this->from_address_en,
            'to_lat'            => (string)$this->to_lat,
            'to_lng'            => (string)$this->to_lng,
            'to_address_ar'     => (string)$this->to_address_ar,
            'to_address_en'     => (string)$this->to_address_en,
            'end_lat'           => (string)$this->end_lat,
            'end_lng'           => (string)$this->end_lng,
            'end_address_ar'    => (string)$this->end_address_ar,
            'end_address_en'    => (string)$this->end_address_en,
        ];
    }
}
