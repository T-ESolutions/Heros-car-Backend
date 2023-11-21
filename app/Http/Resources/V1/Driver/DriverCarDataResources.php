<?php

namespace App\Http\Resources\V1\Driver;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverCarDataResources extends JsonResource
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
            'id' => (int)$this->id,
            'car_image' => $this->car_image,
            'car_licence_image' => $this->car_licence_image,
            'brand' => $this->brand ? $this->brand : null,
            'modell' => $this->modell ? $this->modell : null,
            'document_image' => $this->document_image,

            'factory_year' => $this->factory_year,
            'color_id' => $this->color_id,
            'car_plate_num' => $this->car_plate_num,
            'car_plate_txt' => $this->car_plate_txt,
            'car_body_id' => $this->car_body_id,
            'chairs' => $this->chairs,
            'air_cond' => $this->air_cond,
            'bags' => $this->bags,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'address_ar' => $this->address_ar,
            'address_en' => $this->address_en,
            'use_my_data' => $this->driver_id == auth()->user()->id ? 1 : 0,


            'driver' => new DriverResources($this->driver),
            'departments' => DriverCarDepartmentsResources::collection($this->departments),
        ];
    }


}
