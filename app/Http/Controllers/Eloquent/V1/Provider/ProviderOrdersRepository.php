<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;


use App\Http\Controllers\Interfaces\V1\Provider\ProviderOrdersRepositoryInterface;
use App\Models\OrderProviderRequest;
use App\Models\OrderQuestion;
use App\Models\OrderQuestionAnswer;
use App\Models\TripRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\OrderStatus;
use App\Models\Status;
use App\Models\Order;
use Carbon\Carbon;

class ProviderOrdersRepository implements ProviderOrdersRepositoryInterface
{

    public function startTrip($request)
    {
        $order = Order::whereId($request->order_id)->first();
        return $order;
    }

    public function economicCurrentRequests()
    {
        $order = TripRequest::driver()->current()->paginate(pagination_number());
        return $order;
    }

    public function myOrders($request)
    {
        $user = JWTAuth::user();
        if($user){
            $order = Order::where('provider_id', $user->id)
                ->where(function ($q) use ($request) {
                    if ($request->type == 'current') {
                        //current
                        $orderIds = OrderStatus::whereNotNull('status_date')
                            ->whereIn('status_key',(array)['order_finished','cancel_by_user','cancel_by_admin','cancel_by_provider'])
                            ->where('user_id',Auth::guard('api')->id())
                            ->pluck('order_id');
                        $q->whereNotIn('id', $orderIds);
                        //-------
                    } elseif($request->type == 'complete') {
                        //complete
                        $orderIds = OrderStatus::where('status_key','order_finished')
                            ->where('user_id',Auth::guard('api')->id())
                            ->whereNotNull('status_date')
                            ->pluck('order_id');
                        $q->whereIn('id', $orderIds);
                        //-------
                    }elseif($request->type == 'canceled') {
                        //canceled
                        $orderIds = OrderStatus::whereIn('status_key',
                            ['cancel_by_user','cancel_by_admin','cancel_by_provider'])
                            ->whereNotNull('status_date')
                            ->where('user_id',Auth::guard('api')->id())
                            ->pluck('order_id');
                        $q->whereIn('id', $orderIds);
                        //-------
                    }
                })->orderBy('id', 'desc')->with('provider')->paginate(pagination_number());
            return $order;
        }
        return null;

    }

    public function OrderDetails($request)
    {
        $order = Order::whereId($request->order_id)->first();
        return $order;
    }

    public function homeOrders($request,$user)
    {
        $orderProviderRequest = OrderProviderRequest::where('provider_id',$user->id)
            ->where('status','rejected')
            ->pluck('order_id');

        $order = Order::orderBy('id', 'desc')
            ->whereNotIn('id', $orderProviderRequest)
            ->where('provider_id', null)
            ->with('provider')
            ->paginate(pagination_number());
        return $order;
    }

    public function acceptOrder($request)
    {
        $user = JWTAuth::user();
        $order_status = OrderStatus::where('order_id', $request['order_id'])->where('status_key', 'provider_accept')->first();
        if ($order_status->status_date == null) {
            $order = Order::whereId($request['order_id'])->first();
            $order->provider_id = $user->id;
            $order->status_key = Status::PROVIDER_ACCEPT;
            $order->save();

            $order_status->status_date = Carbon::now();
            $order_status->save();
            return $order;
        } else {
            return response()->json(msg(failed(), trans('lang.order_accepted_before')));
        }


    }


    public function orderQuestions($request)
    {
        return OrderQuestion::where('order_id',$request['order_id'])->get();
    }

    public function acceptRejectOrderQuestion($request)
    {
        $orderQuestion = OrderQuestion::whereId($request['id'])
            ->where('order_id',$request['order_id'])
            ->first();
        if($orderQuestion){
            OrderQuestionAnswer::where('order_question_id',$orderQuestion->id)->update([
                'provider_approval' => $request['provider_approval'],
                'reject_reason' => $request['provider_approval'] == 0 ? $request['reject_reason'] : null,
            ]);
        }

    }

}
