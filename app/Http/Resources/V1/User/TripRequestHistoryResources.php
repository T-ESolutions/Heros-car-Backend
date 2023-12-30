<?php

namespace App\Http\Resources\V1\User;

use App\Http\Resources\V1\DepartmentResources;
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
        return [
            'id' => $this->id,
            'trip_id' => $this->trip_id,
            'from_lat' => $this->from_lat,
            'from_lng' => $this->from_lng,
            'from_address' => $this->from_address,
            'to_lat' => $this->to_lat,
            'to_lng' => $this->to_lng,
            'to_address' => $this->to_address,
            'department' => isset($this->department) ? new DepartmentResources($this->department) : "",
            'trip_number' => isset($this->trip) ? $this->trip->trip_number : "",
            'trip_date' => Carbon::parse($this->trip_date)->translatedFormat("dd\mm\yyyy"),
            'trip_time_from' => Carbon::parse($this->trip_time)->translatedFormat("h:i a"),
            'price' => $this->price,
            'wait_hours' => $this->wait_hours,
            'num_of_hours' => $this->num_of_hours,
            'bags' => $this->bags,
            'chairs' => $this->chairs,
            'created_at' => $this->created_at,
            'accept_at' => $this->accept_at,
            'reject_at' => $this->reject_at,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'user_cancel_at' => $this->user_cancel_at,
            'user_cancel_reason' => $this->user_cancel_reason,
        ];
    }
}
