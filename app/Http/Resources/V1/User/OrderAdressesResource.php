<?php

namespace App\Http\Resources\V1\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderAdressesResource extends JsonResource
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
            'pickup_lat' => (string)$this->pickup_lat,
            'pickup_lng' => (string)$this->pickup_lng,
            'pickup_address' => (string)$this->pickup_address,
            'drop_off_lat' => (string)$this->drop_off_lat,
            'drop_off_lng' => (string)$this->drop_off_lng,
            'drop_off_address' => (string)$this->drop_off_address,
            'provider_lat' => (string)$this->provider_lat,
            'provider_lng' => (string)$this->provider_lng,
            'provider_address' => (string)$this->provider_address,
        ];
    }
}
