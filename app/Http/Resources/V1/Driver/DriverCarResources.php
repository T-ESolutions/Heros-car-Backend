<?php

namespace App\Http\Resources\V1\Driver;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverCarResources extends JsonResource
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
            'approved' => $this->approved,
            'car_image' => $this->car_image,
            'brand' => $this->brand ? $this->brand->title : '',
            'modell' => $this->modell ? $this->modell->title : '',
            'chairs' => $this->chairs,
            'description' => $this->description,
            'price' => 150,
            'driver' => new DriverDataResources($this->driver),
            'departments' => DriverCarDepartmentsResources::collection($this->departments),
        ];
    }


}
