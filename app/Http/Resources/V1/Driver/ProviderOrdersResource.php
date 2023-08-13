<?php

namespace App\Http\Resources\V1\Driver;


use App\Http\Resources\V1\User\OrderAdressesResource;
use App\Http\Resources\V1\User\ServicesResources;
use App\Http\Resources\V1\User\UsersResources;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderOrdersResource extends JsonResource
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
            'user' => $this->user ? new UsersResources($this->user) : null,
            'order_number' => $this->order_number,
            'service_data' => $this->service ? new ServicesResources($this->service) : null,
            'location_summary' => $this->orderAddress ? new OrderAdressesResource($this->orderAddress) : null,
            'total_cost' => $this->total_cost,
            'status_key' => $this->status_key,
            'created_at' => $this->created_at->format('Y-m-d g:i:s a'),
            'job_available_time' => "10:00",  //this to android developer to decrement this 10 minutes to 0 to go to send order again to another provider
//            'distance_to_client' => "6.5 km" ,  //android developer how calculate it
            'distance_to_drop_off' => $this->distance,

        ];
    }
}
