<?php

namespace App\Http\Resources\V1\Driver;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $token;

    public function token($value)
    {
        $this->token = $value;
        return $this;
    }


    public function toArray($request)
    {

        return [
            'id' => (int)$this->id,
            'name' => (string)$this->name ? $this->name : "",
            'email' => (string)$this->email ? $this->email : "",
            'phone' => (string)$this->phone ? $this->phone : "",
            'driver_licence_image' => $this->driver_licence_image ,
            'id_number' => $this->id_number ,
            'image' => (string)$this->image,
            'social_id' => $this->social_id ? $this->social_id : "",
            'fcm_token' => $this->fcm_token ? $this->fcm_token : "",
            'jwt' => $this->jwt ? $this->jwt : "",
        ];
    }


}
