<?php

namespace App\Http\Controllers\Api\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\ReviewRepositoryInterface;
use App\Http\Resources\V1\User\ProviderReviewSummaryResource;
use App\Http\Resources\V1\User\ProviderReviewResource;
use App\Http\Requests\V1\User\ProviderReviewsRequest;
use App\Http\Requests\V1\Provider\MakeReviewRequest;
use App\Http\Controllers\Controller;
use App\Models\Provider;


class ReviewController extends Controller
{
    protected $reviewRepo;

    public function __construct(ReviewRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }

    public function makeUserReviews(MakeReviewRequest $request)
    {
        $result = $this->reviewRepo->makeReview($request);
        if($result)
            return response()->json(msg(success(), trans('lang.success')));
        return response()->json(msg(failed(), trans('lang.order_reviewed_before')), 400);
    }


}
