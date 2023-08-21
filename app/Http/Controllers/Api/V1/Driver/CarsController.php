<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Interfaces\V1\Provider\CarRepositoryInterface;
use App\Http\Requests\V1\Provider\CarStoreRequest;
use App\Http\Controllers\Controller;



class CarsController extends Controller
{
    protected $reviewRepo;

    public function __construct(CarRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }

    public function store(CarStoreRequest $request)
    {
        $result = $this->reviewRepo->store($request);
        if($result)
            return response()->json(msg(success(), trans('lang.success')));
        return response()->json(msg(failed(), trans('lang.order_reviewed_before')), 400);
    }


}
