<?php

namespace App\Http\Resources\V1\Driver;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TripsResources extends JsonResource
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
            'id' => (int)$this->id,
            'trip_number' => (int)$this->trip_number,
            'trip_date' => $this->trip_date,
            'trip_time_from' => Carbon::parse($this->trip_time_from)->translatedFormat('g:i a') ,
            'trip_time_to' => Carbon::parse($this->trip_time_to)->translatedFormat('g:i a'),
            'department_id' => (int)$this->department_id,
            'department' => $this->department->title,
            'chairs' => $this->chairs,
            'from_lat' => $this->from_lat,
            'from_lng' => $this->from_lng,
            'from_address_ar' => $this->from_address_ar,
            'from_address_en' => $this->from_address_en,
            'to_lat' => $this->to_lat,
            'to_lng' => $this->to_lng,
            'to_address_ar' => $this->to_address_ar,
            'to_address_en' => $this->to_address_en,
            'status' => $this->status ,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'cancelled_at' => $this->cancelled_at,
            'cancel_reason' => $this->cancel_reason,
        ];
    }


}
