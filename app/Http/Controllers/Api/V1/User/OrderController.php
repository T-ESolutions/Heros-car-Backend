<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\OrdersRepositoryInterface;
use App\Http\Requests\V1\User\Order\AcceptRejectOfferOrderRequest;
use App\Http\Requests\V1\User\Order\CancelOrderRequest;
use App\Http\Resources\V1\User\OrderDetailsResource;
use App\Http\Requests\V1\User\OrderDetailsRequest;
use App\Http\Resources\V1\User\MyOrdersResource;
use App\Http\Requests\V1\User\SendOrderRequest;
use App\Http\Requests\V1\User\MyOrdersRequest;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $orderRepo;

    public function __construct(OrdersRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function sendOrderRequest(SendOrderRequest $request)
    {
        $data = $this->orderRepo->sendOrderRequest($request);
        return response()->json(msgdata(success(), trans('lang.success'),$data));
    }

    public function myOrders(MyOrdersRequest $request)
    {
        $orders = $this->orderRepo->myOrders($request);
        $data = MyOrdersResource::collection($orders)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function orderDetails(OrderDetailsRequest $request)
    {

        $order_details = $this->orderRepo->OrderDetails($request);
        $data = new OrderDetailsResource($order_details);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function cancelOrder(CancelOrderRequest $request)
    {
        $data = $request->validated();

        $cancelOrder = $this->orderRepo->cancelOrder($data);
        if ($cancelOrder == 'success')
            return response()->json(msg(success(), trans('lang.order_cancel_success')));
        elseif ($cancelOrder == 'order_cancelled_before')
            return response()->json(msg(failed(), trans('lang.order_cancelled_before')));
        else
            return response()->json(msg(failed(), trans('lang.cant_cancel')));

    }

    public function acceptRejectOfferOrder(AcceptRejectOfferOrderRequest $request)
    {
        $data = $request->validated();
        $acceptRejectOfferOrder = $this->orderRepo->acceptRejectOfferOrder($data);
        if ($acceptRejectOfferOrder == 'success')
            return response()->json(msg(success(), trans('lang.success')));
        elseif ($acceptRejectOfferOrder == 'offer_accepted_before')
            return response()->json(msg(failed(), trans('lang.offer_accepted_before')));

    }
}
