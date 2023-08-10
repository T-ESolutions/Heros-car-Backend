<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;

class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale('ar');
        $statuses = Status::get();
        foreach ($statuses as $status){
            $countOrders = Order::where('status_key',$status->key)->get();
            $status->count_orders = sizeof($countOrders);
        }
        return view('admin.home',compact('statuses'));
    }

}
