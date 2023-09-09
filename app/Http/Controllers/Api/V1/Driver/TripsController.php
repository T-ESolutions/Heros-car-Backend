<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Interfaces\V1\Provider\TripsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Provider\RateTripRequest;
use App\Http\Requests\V1\Provider\ReplyRequestsEconomicRequest;
use App\Http\Requests\V1\Provider\StartTripRequest;
use App\Http\Requests\V1\Provider\TripCancelRequest;
use App\Http\Requests\V1\Provider\TripDetailsRequest;
use App\Http\Resources\V1\Driver\TripRequestHistoryResources;
use Illuminate\Support\Facades\Auth;


class TripsController extends Controller
{
    protected $tripRepo;

    public function __construct(TripsRepositoryInterface $tripRepo)
    {
        $this->tripRepo = $tripRepo;
    }

    public function trips()
    {
        $result = $this->tripRepo->trips();

        return response()->json(msgdata(success(), trans('lang.success'), $result));
    }

    public function create(StartTripRequest $request)
    {
        $data = $request->validated();
        $result = $this->tripRepo->create($data);
        if ($result == "driver_not_have_car") {
            return response()->json(msg(failed(), trans('lang.driver_not_have_car')));
        }
        return response()->json(msg(success(), trans('lang.success')));
    }

    public function start(TripDetailsRequest $request)
    {
        $data = $request->validated();
        $this->tripRepo->start($data);
        return response()->json(msg(success(), trans('lang.trip_started_s')));
    }

    public function cancel(TripCancelRequest $request)
    {
        $data = $request->validated();
        $this->tripRepo->cancel($data);
        return response()->json(msg(success(), trans('lang.trip_cancelled_s')));
    }

    public function finish(TripDetailsRequest $request)
    {
        $data = $request->validated();
        $this->tripRepo->finish($data);
        return response()->json(msg(success(), trans('lang.trip_finished_s')));
    }

    public function details(TripDetailsRequest $request)
    {
        $data = $request->validated();
        $result = $this->tripRepo->details($data);
        return response()->json(msgdata(success(), trans('lang.success'), $result));
    }

    public function requestsEconomic()
    {
        $result = $this->tripRepo->requestsEconomic();
        return response()->json(msgdata(success(), trans('lang.success'), $result));
    }

    public function replyRequestsEconomic(ReplyRequestsEconomicRequest $request)
    {
        $data = $request->validated();
        $response = $this->tripRepo->replyRequestsEconomic($data);
        if ($response == "trip_is_complete_now") {
            return response()->json(msg(failed(), trans('lang.trip_is_complete_now')));
        } elseif ($response == "request_updated") {
            return response()->json(msg(success(), trans('lang.success')));
        }
    }

    public function RateTrip(RateTripRequest $request)
    {
        $request->validated();
        $this->tripRepo->RateTrip($request);
        return response()->json(msg(success(), trans('lang.success')));

    }

    public function getTripRequestHistory()
    {

        $data = $this->tripRepo->getTripRequestHistory();
        $data = TripRequestHistoryResources::collection($data)->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }


}
