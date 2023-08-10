<?php

namespace App\Http\Controllers\Eloquent\V1\User;


use App\Http\Controllers\Interfaces\V1\User\ServicesRepositoryInterface;
use App\Models\OrderExtraService;
use App\Models\Status;

class ServicesRepository implements ServicesRepositoryInterface
{
    public function getUserStatus($request)
    {
        $statuses = Status::Active()->User()->orderBy('sort', 'asc')->get();
        return $statuses;
    }

    public function getOrderExtraServices($request)
    {
        $extra_services = OrderExtraService::where('order_id', $request->order_id)->get();
        return $extra_services;

    }

    public function getOrderExtraServicesData($request)
    {
        $extra_services = OrderExtraService::where('order_id', $request->order_id)->where('id', $request->extra_service_id)->first();
        return $extra_services;

    }

    public function updateOrderExtraServicesStatus($request)
    {
        //Todo send notification to provider here (please make external function)
        $extra_services = OrderExtraService::whereId($request->order_extra_service_id)->first();
        $extra_services->user_approval = $request->user_approval;
        $extra_services->reject_reason = $request->reject_reason;
        $extra_services->save();
        return $extra_services;
    }
}
