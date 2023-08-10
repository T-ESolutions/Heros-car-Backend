<?php

namespace App\Http\Controllers\Interfaces\V1\User;

interface OrdersRepositoryInterface{

    public function sendOrderRequest($request);
    public function myOrders($request);
    public function OrderDetails($request);
    public function cancelOrder($request);
    public function acceptRejectOfferOrder($request);
}
