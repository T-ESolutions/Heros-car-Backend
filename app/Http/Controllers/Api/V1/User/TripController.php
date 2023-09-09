<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\HomeRepositoryInterface;
use App\Http\Controllers\Interfaces\V1\User\TripRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Trip\CancelTripRequest;
use App\Http\Requests\V1\User\Trip\CreateTripRequest;
use App\Http\Requests\V1\User\Trip\DriverRateRequest;
use App\Http\Requests\V1\User\Trip\RateTripRequest;
use App\Http\Requests\V1\User\Trip\SearchTripRequest;
use App\Http\Requests\V1\User\Trip\TripDetailsRequest;
use App\Http\Resources\V1\User\DriverRateResources;
use App\Http\Resources\V1\User\HomepageTripResources;
use App\Http\Resources\V1\User\TripDetailsResources;
use App\Http\Resources\V1\User\TripRequestHistoryResources;

class TripController extends Controller
{
    protected $tripRepo;
    protected $homeRepo;

    public function __construct(
        TripRepositoryInterface $tripRepo,
        HomeRepositoryInterface $homeRepo
    )
    {
        $this->tripRepo = $tripRepo;
        $this->homeRepo = $homeRepo;
    }

    public function createTripRequest(CreateTripRequest $request)
    {
        $request->validated();

        $data = $this->tripRepo->createTripRequest($request);
        if (!$data)
            return response()->json(msg(failed(), trans('lang.invalid_date')));

        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function searchTrip(SearchTripRequest $request)
    {
        $request->validated();

        $data = HomepageTripResources::collection($this->tripRepo->searchTrip($request))->response()->getData(true);
        if (!$data)
            $data = HomepageTripResources::collection($this->homeRepo->getTripsByDepartment($request))->response()->getData(true);

        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function tripDetails(TripDetailsRequest $request)
    {
        $request->validated();

        if (!$this->tripRepo->checkUserOfTrip($request))
            return response()->json(msg(not_authoize(), trans('lang.not_authorize')));

        $data = new TripDetailsResources($this->tripRepo->tripDetails($request));

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
        $data = TripRequestHistoryResources::collection($data)->response()->getData(true);

        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }

    public function rateTrip(RateTripRequest $request)
    {
        $request->validated();
        $this->tripRepo->rateTrip($request);
        return response()->json(msg(success(), trans('lang.success')));

    }

    public function driverRate(DriverRateRequest $request)
    {
        $request->validated();
        $data = DriverRateResources::collection($this->tripRepo->driverRate($request));
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }

}
