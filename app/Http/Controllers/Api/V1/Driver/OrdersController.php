<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Interfaces\V1\Provider\ProviderOrdersRepositoryInterface;
use App\Http\Requests\V1\Provider\AcceptRejectOrderQuestionRequest;
use App\Http\Requests\V1\Provider\AddExtraServicesRequest;
use App\Http\Requests\V1\Provider\OrderDetailsRequest;
use App\Http\Requests\V1\Provider\TakeCarLivePhotosRequest;
use App\Http\Requests\V1\Provider\UpdateOrderStatusRequest;
use App\Http\Resources\V1\Driver\ProviderOrdersResource;
use App\Http\Requests\V1\Provider\AcceptOrderRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;


class OrdersController extends Controller
{
    protected $orderRepo;

    public function __construct(ProviderOrdersRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function economicCurrentRequests()
    {

        $result = $this->orderRepo->economicCurrentRequests();
        return response()->json(msg(success(), trans('lang.success')));
    }

    public function myOrders(MyOrdersRequest $request)
    {
        $orders = $this->orderRepo->myOrders($request);
        if($orders){
            $data = ProviderOrdersResource::collection($orders)->response()->getData(true);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        }
        return response()->json(msg(failed(), trans('lang.order_not_found')), 401);

    }


    public function orderDetails(OrderDetailsRequest $request)
    {

        $order_details = $this->orderRepo->OrderDetails($request);
        $data = new OrderDetailsResource($order_details);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function home(Request $request)
    {
        $user = JWTAuth::user();

        $orders = $this->orderRepo->homeOrders($request,$user);
        $data = ProviderOrdersResource::collection($orders)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }


    public function acceptOrder(AcceptOrderRequest $request)
    {
        $request = $request->validated();
//        $result = $this->orderRepo->acceptOrder($request);

        $user = JWTAuth::user();
        $order_status = OrderStatus::where('order_id', $request['order_id'])
            ->where('status_key', 'provider_accept')
            ->first();
        if ($order_status->status_date == null) {
            $order = Order::whereId($request['order_id'])->first();
            $order->provider_id = $user->id;
            $order->status_key = Status::PROVIDER_ACCEPT;
            $order->save();

            $order_status->status_date = Carbon::now();
            $order_status->save();
            return response()->json(msg(success(), trans('lang.order_accepted_s')));
        } else {
            return response()->json(msg(failed(), trans('lang.order_accepted_before')), 400);
        }
    }

    public function rejectOrder(AcceptOrderRequest $request)
    {
        $request = $request->validated();

        $user = JWTAuth::user();
        $orderProviderRequest = OrderProviderRequest::where('order_id',$request['order_id'])
            ->where('provider_id',$user->id)
            ->first();

        if (!$orderProviderRequest) {
            OrderProviderRequest::create([
                'order_id' => $request['order_id'],
                'provider_id' => $user->id,
                'status' => 'rejected',
            ]);
            return response()->json(msg(success(), trans('lang.order_rejected_s')));
        } else {
            return response()->json(msg(failed(), trans('lang.order_rejected_before')), 400);
        }
    }

    public function updateStatus(UpdateOrderStatusRequest $request)
    {
        $request = $request->validated();
        $user = JWTAuth::user();
        $order_status = OrderStatus::where('order_id', $request['order_id'])->where('status_key', $request['status_key'])->first();
        if ($order_status->status_date == null) {
            $order = Order::whereId($request['order_id'])->first();
            $order->status_key = $request['status_key'];
            $order->save();

            $order_status->status_date = Carbon::now();
            $order_status->save();
            return response()->json(msg(success(), trans('lang.order_status_changed_s')));
        } else {
            return response()->json(msg(failed(), trans('lang.order_cant_update_status')), 400);
        }
    }

    public function takeCarLivePhotos(TakeCarLivePhotosRequest $request)
    {
        $data = $request->validated();
        $user = JWTAuth::user();
        $image_data['order_id'] = $data['order_id'];
        $image_data['type'] = 'provider';
        foreach ($data['images'] as $image) {
            $image_data['image'] = $image;
            OrderImage::create($image_data);
        }
        return response()->json(msg(success(), trans('lang.photos_added_s')));

    }

    public function addExtraServices(AddExtraServicesRequest $request)
    {
        $data = $request->validated();
        $user = JWTAuth::user();
        foreach ($data['service_ids'] as $service_id){
            //check first if this service exists before or not ...
            $exists_service = OrderExtraService::where('service_id',$service_id)->where('order_id',$data['order_id'])->first();
            if(!$exists_service){
                $service = Service::findOrFail($service_id);
                $data['service_id'] = $service_id;
                $data['service_data'] = json_encode($service);
                $data['name'] = $service->title;
                $data['price'] = $service->price;
                OrderExtraService::create($data);
            }

        }

        return response()->json(msg(success(), trans('lang.extra_services_added_s')));

    }


    public function orderQuestions(OrderDetailsRequest $request)
    {
        $request = $request->validated();

        $orderQuestions = $this->orderRepo->orderQuestions($request);
        $data = OrderQuestionResource::collection($orderQuestions)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function acceptRejectOrderQuestion(AcceptRejectOrderQuestionRequest $request)
    {
        $request = $request->validated();

        $result = $this->orderRepo->acceptRejectOrderQuestion($request);
        return response()->json(msg(success(), trans('lang.success')));
    }
}
