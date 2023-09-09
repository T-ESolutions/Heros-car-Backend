<?php

namespace App\Http\Resources\V1\Driver;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TripRequestHistoryResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $price = $this->tripRequests->sum('price');
        return [
            'id' => $this->id,
            'from_address' => $this->from_address,
            'to_address' => $this->to_address,
            'department' => $this->department->title,
            'trip_number' => $this->trip_number,
            'trip_date' => Carbon::parse($this->trip_date)->translatedFormat("dd\mm\yyyy"),
            'trip_time_from' => Carbon::parse($this->trip_time_from)->translatedFormat("h:i a"),
            'price' => $price,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'cancelled_at' => $this->user_cancel_at,


        ];
    }
}
