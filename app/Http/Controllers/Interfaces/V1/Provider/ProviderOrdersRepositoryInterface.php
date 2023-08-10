<?php

namespace App\Http\Controllers\Interfaces\V1\Provider;

interface ProviderOrdersRepositoryInterface{

    public function myOrders($request);
    public function OrderDetails($request);
    public function homeOrders($request,$user);
    public function acceptOrder($request);

    public function orderQuestions($request);
    public function acceptRejectOrderQuestion($request);
}
