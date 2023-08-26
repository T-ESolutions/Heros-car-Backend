<?php

namespace App\Http\Controllers\Interfaces\V1\User;

interface TripRepositoryInterface{

    public function createTripRequest($request);
    public function cancelTripRequest($request);
    public function getTripRequestHistory();
    public function rateTrip($request);
    public function driverRate($request);

}
