<?php

namespace App\Http\Controllers\Interfaces\V1\User;

interface ReviewRepositoryInterface
{

    public function providerReviews($request);

    public function makeReview($request);

}
