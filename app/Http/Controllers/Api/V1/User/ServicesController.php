<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\ServicesRepositoryInterface;
use App\Http\Requests\V1\User\Order\AcceptRejectExtraServiceRequest;
use App\Http\Requests\V1\User\Order\OrderExtraServicesDataRequest;
use App\Http\Requests\V1\User\Order\OrderExtraServicesRequest;
use App\Http\Resources\V1\User\OrderExtraServicesResources;
use App\Http\Resources\V1\User\StatusesResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    protected $serviceRepo;

    public function __construct(ServicesRepositoryInterface $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo;
    }

    public function getUserStatus(Request $request)
    {
        $status = $this->serviceRepo->getUserStatus($request);
        $data = StatusesResources::collection($status);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function getOrderExtraServices(OrderExtraServicesRequest $request)
    {
        $status = $this->serviceRepo->getOrderExtraServices($request);
        $data = OrderExtraServicesResources::collection($status);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }
    public function getOrderExtraServicesData(OrderExtraServicesDataRequest $request)
    {
        $status = $this->serviceRepo->getOrderExtraServicesData($request);
        $data = new OrderExtraServicesResources($status);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function updateOrderExtraServicesStatus(AcceptRejectExtraServiceRequest $request)
    {
        $extra_service = $this->serviceRepo->updateOrderExtraServicesStatus($request);
        $data = new OrderExtraServicesResources($extra_service);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }


}
