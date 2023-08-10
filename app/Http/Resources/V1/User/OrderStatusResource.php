<?php

namespace App\Http\Resources\V1\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderStatusResource extends JsonResource
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
            'status_name' => $this->status_name,
            'status_date' => isset($this->status_date) && $this->status_date != null ? Carbon::parse($this->status_date)->diffForHumans() : "",
            'status_key' => $this->status_key,


        ];
    }
}
