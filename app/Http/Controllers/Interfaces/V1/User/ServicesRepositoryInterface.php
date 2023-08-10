<?php

namespace App\Http\Controllers\Interfaces\V1\User;

interface ServicesRepositoryInterface
{

    public function getUserStatus($request);
    public function getOrderExtraServices($request);
    public function getOrderExtraServicesData($request);
    public function updateOrderExtraServicesStatus($request);


}
