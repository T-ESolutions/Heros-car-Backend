<?php

namespace App\Http\Resources\V1\Driver;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class TripDetailsResources extends JsonResource
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
            'trip_data' => new TripsResources($this),
            'passengers' => PassengersResources::collection($this->passengers),
        ];
    }


}
