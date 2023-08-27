<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class TripDriverResources extends JsonResource
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
            'id'            => (int)$this->id,
            'name'          => (string)$this->name ? $this->name : "",
            'email'         => (string)$this->email ? $this->email : "",
            'phone'         => (string)$this->phone ? $this->phone : "",
            'id_number'     => $this->id_number ,
            'gender'        => $this->gender ,
            'image'         => (string)$this->image,
        ];
    }
}
