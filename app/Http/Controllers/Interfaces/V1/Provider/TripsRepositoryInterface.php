<?php

namespace App\Http\Controllers\Interfaces\V1\Provider;

interface TripsRepositoryInterface{

    public function trips();
    public function create($request);
    public function start($request);
    public function cancel($request);
    public function finish($request);
    public function details($request);
    public function requestsEconomic();
    public function replyRequestsEconomic($request);

}
