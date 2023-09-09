<?php

namespace App\Http\Resources\V1\Driver;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
{


    public function toArray($request)
    {

        return [
            'id' => (int)$this->id,
            'name' => (string)$this->name ? $this->name : "",
            'phone' => $this->phone,
            'image' => (string)$this->image,
            'rate' => (double)$this->rate,
        ];
    }


}
