<?php

namespace App\Http\Controllers\Eloquent\V1\User;


use App\Http\Controllers\Interfaces\V1\User\OrdersRepositoryInterface;
use App\Models\Answer;
use App\Models\Brand;
use App\Models\CancelReason;
use App\Models\ModellYear;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderImage;
use App\Models\OrderOfferRequest;
use App\Models\OrderQuestion;
use App\Models\OrderQuestionAnswer;
use App\Models\OrderStatus;
use App\Models\Question;
use App\Models\Service;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrdersRepository implements OrdersRepositoryInterface
{
    public function sendOrderRequest($request)
    {
        $data = $request->validated();

        $order = $this->storeOrder($request, $data);

        if ($order) {
            //save order QuestionsWithAnswers after add order ...
            $this->storeOrderQuestionsWithAnswers($order,$data);

            //save order Statuses after add order ...
            $this->storeOrderStatuses($order->id);

            //save order addresses after add order ...
            $this->storeOrderAdresses($order->id, $request, $data);

            //save order user car images after add order ...
            if (isset($data['images'])) {
                $this->storeOrderImages($order->id, $data);
            }
        }
        return $order;
    }

    public function myOrders($request)
    {
        $order = Order::orderBy('id','desc')->where('user_id', Auth::guard('api')->id())
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
            })->with('provider')->paginate(pagination_number());

        return $order;

    }

    public function OrderDetails($request)
    {
        $order = Order::whereId($request->order_id)->first();
        return $order;
    }

    public function storeOrder($request, $data)
    {
        $data['order_number'] = time() . '' . rand(0000, 9999);
        $data['user_id'] = auth('api')->user()->id;

        $service = Service::find($request->service_id)->first();
        $brand = Brand::find($request->brand_id)->first();
        $modell = Brand::find($request->modell_id)->first();
        $year = ModellYear::find($request->year_id)->first();

        $data['service_data'] = json_encode($service);
        $data['brand_data'] = json_encode($brand);
        $data['modell_data'] = json_encode($modell);
        $data['car_year'] = $year->year;
        $data['status_key'] = Status::orderBy('sort', 'asc')->first()->key;
        return Order::create($data);
    }

    public function storeOrderQuestionsWithAnswers($order,$data){
        $lang = request()->header('lang') ==  'en' ? 'en' :'ar';
        //store questions
        if(isset($data['questions'])) {
            foreach ($data['questions'] as $question){
                $chekQusetion = Question::whereId($question['id'])
                    ->where('service_id',$data['service_id'])
                    ->first();
                if($chekQusetion){
                    $storedQuestion = OrderQuestion::create([
                        'order_id'      => $order->id,
                        'title_ar'      => $chekQusetion->title_ar,
                        'title_en'      => $chekQusetion->title_en,
                        'type'          => $chekQusetion->type,
                        'service_id'    => $chekQusetion->service_id,
                        'service_data'  => $order->service_data,
                    ]);
                    //store answer
                    if($storedQuestion){
                        if(isset($question['answer_id'])){
                            foreach ($question['answer_id'] as $answer) {
                                $chekAnswer = Answer::whereId($answer)
                                    ->where('question_id', $question['id'])
                                    ->first();
                                if ($chekAnswer) {
                                    OrderQuestionAnswer::create([
                                        'order_question_id' => $storedQuestion->id,
                                        'answer' => $lang == 'ar' ? $chekAnswer->title_ar : $chekAnswer->title_en,
                                        'type' => $chekQusetion->type,
                                    ]);
                                }
                            }
                        }
                    }
                    //------------
                }
            }
        }
        //===========
    }

    public function storeOrderAdresses($orderId, $request, $data)
    {
        $address_data['order_id'] = $orderId;
        $address_data['pickup_lat'] = $data['pickup_lat'];
        $address_data['pickup_lng'] = $data['pickup_lng'];
        $address_data['pickup_address'] = $data['pickup_address'];
        if ($request->drop_off_lat && $request->drop_off_lng && $request->drop_off_address) {
            $address_data['drop_off_lat'] = $data['drop_off_lat'];
            $address_data['drop_off_lng'] = $data['drop_off_lng'];
            $address_data['drop_off_address'] = $data['drop_off_address'];
        }
        return OrderAddress::create($address_data);
    }

    public function storeOrderStatuses($orderId)
    {
        $statuses = Status::orderBy('sort', 'asc')->get();
        foreach ($statuses as $key => $status) {
            OrderStatus::updateOrcreate([
                'user_id' => Auth::guard('api')->id(),
                'status_date' => $key == 0 ? Carbon::now() : null,
                'status_key' => $status->key,
                'order_id' => $orderId,
                'status_ar' => $status->title_ar,
                'status_en' => $status->title_en,
            ]);
        }
    }

    public function storeOrderImages($orderId, $data)
    {
        foreach ($data['images'] as $image) {
            $images_data['order_id'] = $orderId;
            $images_data['image'] = $image;
            $images_data['type'] = 'user';
            OrderImage::create($images_data);
        }
    }

    public function cancelOrder($request)
    {
        $order=Order::whereId($request['order_id'])->first();
        if (OrderStatus::where('status_key', 'cancel_by_user')
            ->where('order_id', $request['order_id'])->first()) {

            $status = Status::where('key', 'cancel_by_user')
                ->first();

            OrderStatus::updateOrcreate([
                'user_id' => $order->user_id,
                'status_key' => 'cancel_by_user',
                'order_id' => $request['order_id'],
                'status_ar' => $status->title_ar,
                'status_en' => $status->title_en,
            ],[
                'status_date' => Carbon::now(),
            ]);

            $cancelReason = CancelReason::whereId($request['cancel_reason_id'])->first();
            Order::whereId($request['order_id'])->update([
                'status_key' => 'cancel_by_user',
                'cancel_by' => 'user',
                'cancel_reason' => json_encode($cancelReason),
                'cancel_note' => $request['cancel_note'],
            ]);

            return 'success';
        }else if (!OrderStatus::where('status_key', 'cancel_by_user')
            ->where('order_id', $request['order_id'])
            ->whereNull('status_date')
            ->first()) {

            return 'order_cancelled_before';
        }
    }

    public function acceptRejectOfferOrder($request)
    {

        //check if order delivering now
        $order = Order::whereId($request['order_id'])
            ->with('Order_status')
            ->first();
        if (!$order->Order_status) {
            $this->storeOrderStatuses($request['order_id']);
        }

        $checkOfferAccepted = $order->Order_status
            ->where('status_key', 'offer_accepted')
            ->first();

        if ($checkOfferAccepted && $checkOfferAccepted->status_date != NULL) {
            return 'offer_accepted_before';
        } else {
            OrderOfferRequest::updateOrCreate([
                'status' => $request['status'],
                'offer' => $request['offer'],
            ], [
                'order_id' => $request['order_id'],
                'provider_id' => $request['provider_id']
            ]);

            if ($request['status'] == 'accepted') {
                $order->update(['status_key' => 'offer_accepted']);

                OrderStatus::where('order_id', $request['order_id'])
                    ->where('status_key', 'offer_accepted')
                    ->update(['status_date' => Carbon::now()]);

                //Todo send notification to provider here (please make external function)
                return 'success';
            }

        }


    }

}
