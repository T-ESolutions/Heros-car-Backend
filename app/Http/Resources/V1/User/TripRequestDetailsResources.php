<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class TripRequestDetailsResources extends JsonResource
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
            'id'                        => $this->id,
            'user_id'                   => $this->user_id,
            'driver_id'                 => $this->driver_id,
            'department_id'             => $this->department_id,
            'driver_car_id'             => $this->driver_car_id,
            'trip_id'                   => $this->trip_id,
            'trip_date'                 => $this->trip_date,
            'trip_time'                 => $this->trip_time,
            'price'                     => $this->price,
            'total_price'               => $this->total_price,
            'chairs'                    => $this->chairs,
            'num_of_hours'              => $this->num_of_hours,
            'wait_hours'                => $this->wait_hours,
            'created_at'                => (string)$this->created_at,
            'started_at'                => (string)$this->started_at,
            'finished_at'               => (string)$this->finished_at,
            'accept_at'                 => (string)$this->accept_at,
            'reject_at'                 => (string)$this->reject_at,
            'user_cancel_at'            => (string)$this->user_cancel_at,
            'user_cancel_reason'        => (string)$this->user_cancel_reason,
            'user_rate'                 => (string)$this->user_rate,
            'user_rate_txt'             => (string)$this->user_rate_txt,
            'driver_rate'               => (string)$this->driver_rate,
            'driver_rate_txt'           => (string)$this->driver_rate_txt,
            'from_lat'                  => (string)$this->from_lat,
            'from_lng'                  => (string)$this->from_lng,
            'to_address'                => (string)$this->to_address,
            'to_lat'                    => (string)$this->to_lat,
            'to_lng'                    => (string)$this->to_lng,
            'from_address'              => (string)$this->from_address,
            'end_lat'                   => $this->end_lat,
            'end_lng'                   => $this->end_lng,
            'end_address'               => $this->end_address,
            'driver_car'                => new DriverCarResources($this->driverCar),
        ];
    }
}
