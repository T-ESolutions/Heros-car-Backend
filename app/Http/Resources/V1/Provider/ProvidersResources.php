<?php

namespace App\Http\Resources\V1\Provider;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvidersResources extends JsonResource
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
            'country_code' => (string)$this->country_code ? $this->country_code : "",
            'phone' => (string)$this->phone ? $this->phone : "",
            'drive_licence' => (string)$this->drive_licence ? $this->drive_licence : "",
            'user_phone' => (string)$this->user_phone ? $this->user_phone : "",
            'image' => (string)$this->image,
            'social_id' => $this->social_id ? $this->social_id : "",
            'fcm_token' => $this->fcm_token ? $this->fcm_token : "",
            'jwt' => $this->jwt ? $this->jwt : "",
        ];
    }


}
