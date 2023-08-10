<?php

namespace App\Http\Resources\V1\Provider;

use Illuminate\Http\Resources\Json\JsonResource;

class MyOrdersUserResources extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'phone' => $this->user_phone,
            'rate' => $this->rate,

        ];
    }
}
