<?php

namespace App\Http\Resources\V1\Driver;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverDataResources extends JsonResource
{


    public function toArray($request)
    {

        return [
            'id' => (int)$this->id,
            'name' => (string)$this->name ? $this->name : "",
            'image' => (string)$this->image,
            'rate' => (double)$this->rate,
            'rate_number' => 0,
        ];
    }


}
