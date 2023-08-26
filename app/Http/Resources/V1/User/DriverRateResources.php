<?php

namespace App\Http\Resources\V1\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverRateResources extends JsonResource
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
            'image' => $this->user->image,
            'name' => $this->user->name,
            'rate' => $this->user_rate,
            'rate_txt' => $this->user_rate_txt


        ];
    }
}
