<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;


use App\Http\Controllers\Interfaces\V1\Provider\ReviewRepositoryInterface;
use App\Models\OrderReview;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function makeReview($request)
    {
        $request['writer_type'] = Provider::class;
        $request['writer_id'] = Auth::id();
//        $reviews = OrderReview::create($request->all());
        $orderId = $request['order_id'];

        $checkReview = OrderReview::Where('order_id',$orderId)
            ->where('writer_type',Provider::class)
            ->where('writer_id',Auth::id())
            ->first();
        if($checkReview){
            return false;
        }

        unset($request['order_id']);
        $reviews = OrderReview::updateOrCreate([
            'order_id' => $orderId,
        ], $request->all());
        return $reviews;
    }
}
