<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\TripRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Trip\CancelTripRequest;
use App\Http\Requests\V1\User\Trip\CreateTripRequest;
use App\Http\Requests\V1\User\Trip\DriverRateRequest;
use App\Http\Requests\V1\User\Trip\RateTripRequest;
use App\Http\Resources\V1\User\DriverRateResources;

class TripController extends Controller
{
    protected $tripRepo;

    public function __construct(TripRepositoryInterface $tripRepo)
    {
        $this->tripRepo = $tripRepo;
    }

    public function createTripRequest(CreateTripRequest $request)
    {
        $request->validated();

        $data = $this->tripRepo->createTripRequest($request);
        if (!$data)
            return response()->json(msg(failed(), trans('lang.invalid_date')));

        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function cancelTripRequest(CancelTripRequest $request)
    {
        $request->validated();
        $data = $this->tripRepo->cancelTripRequest($request);

        if (!$data)
            return response()->json(msg(failed(), trans('lang.invalid_date')));

        return response()->json(msg(success(), trans('lang.success')));

    }

    public function getTripRequestHistory()
    {

        $data = $this->tripRepo->getTripRequestHistory();
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }

    public function rateTrip(RateTripRequest $request)
    {
        $request->validated();
        $data = $this->tripRepo->rateTrip($request);
        return response()->json(msg(success(), trans('lang.success')));

    }

    public function driverRate(DriverRateRequest $request)
    {
        $request->validated();
        $data = $this->tripRepo->driverRate($request);
        $data = DriverRateResources::collection($data);
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }

}
