<?php

namespace App\Http\Controllers\Eloquent\V1\User;


use App\Http\Controllers\Interfaces\V1\User\ReviewRepositoryInterface;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewRepository implements ReviewRepositoryInterface
{


    public function providerReviews($request)
    {
        $provider = Driver::whereId($request->provider_id)->with('reviewsReached')->first();
        $reviews = $provider->reviewsReached;
        return $reviews;
    }

    public function makeReview($request)
    {
        $request['writer_type'] = User::class;
        $request['writer_id'] = Auth::id();
        $reviews = OrderReview::create($request->all());
        return $reviews;
    }
}
