<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\ReviewRepositoryInterface;
use App\Http\Resources\V1\User\ProviderReviewSummaryResource;
use App\Http\Resources\V1\User\ProviderReviewResource;
use App\Http\Requests\V1\User\ProviderReviewsRequest;
use App\Http\Requests\V1\User\MakeReviewRequest;
use App\Http\Controllers\Controller;
use App\Models\Driver;


class ReviewController extends Controller
{
    protected $reviewRepo;

    public function __construct(ReviewRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }

    public function providerReviews(ProviderReviewsRequest $request)
    {
        $reviews = $this->reviewRepo->providerReviews($request);
        $provider = Driver::whereId($request->provider_id)->first();
        $data['summary_reviews'] = new ProviderReviewSummaryResource($provider);
        $data['reviews'] = isset($reviews) ? ProviderReviewResource::collection($reviews) : [];
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function makeProviderReviews(MakeReviewRequest $request)
    {
        $reviews = $this->reviewRepo->makeReview($request);
        return response()->json(msg(success(), trans('lang.success')));
    }


}
