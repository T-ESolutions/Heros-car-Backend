<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\TripsRepositoryInterface;
use App\Http\Resources\V1\Driver\PassengersResources;
use App\Http\Resources\V1\Driver\TripDetailsResources;
use App\Http\Resources\V1\Driver\TripsResources;
use App\Models\Driver;
use App\Models\DriverCar;
use App\Models\Trip;
use App\Models\TripRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use JWTAuth;


class TripsRepository implements TripsRepositoryInterface
{

    public function trips()
    {
        $trips = Trip::where('driver_id', driver_id())->orderBy('created_at', 'desc')->paginate(10);
        $data = TripsResources::collection($trips)->response()->getData(true);
        return $data;
    }

    public function create($request)
    {
        $request['driver_id'] = driver_id();
        $request['trip_number'] = rand(100000000, 999999999);
        $driver_car = DriverCar::where('driver_id', driver_id())->first();
        if (!$driver_car) {
            return "driver_not_have_car";
        }
        $request['driver_car_id'] = $driver_car->id;
        $request['brand_id'] = $driver_car->brand->id;
        $request['modell_id'] = $driver_car->modell->id;
        $request['color_id'] = $driver_car->color->id;
        $request['price_per_person'] = 0;
        $trip = Trip::create($request);
        return $trip;
    }

    public function start($request)
    {
        $request['started_at'] = Carbon::now();
        $trip = Trip::where('id', $request['id'])->update($request);
        return $trip;
    }

    public function cancel($request)
    {
        $request['cancelled_at'] = Carbon::now();
        $trip = Trip::where('id', $request['id'])->update($request);
        return $trip;
    }

    public function finish($request)
    {
        $request['finished_at'] = Carbon::now();
        $trip = Trip::where('id', $request['id'])->update($request);
        return $trip;
    }

    public function details($request)
    {
        $trips = Trip::whereId($request['id'])->first();
        $data = new TripDetailsResources($trips);
        return $data;
    }

    public function requestsEconomic()
    {
        $requests = TripRequest::driver()->current()->get();
        $data = PassengersResources::collection($requests)->response()->getData(true);
        return $data;
    }

    public function replyRequestsEconomic($request)
    {
        $target = TripRequest::whereId($request['id'])->first();
        if ($request['action'] == 'accept') {
            if ($target->trip->chairs > count($target->trip->passengers)) {
                $target->accept_at = Carbon::now();
            } else {
                return "trip_is_complete_now";
            }
        } elseif ($request['action'] == 'reject') {
            $target->reject_at = Carbon::now();
        }
        $target->save();
        return "request_updated";
    }

    public function RateTrip($request)
    {
        $data = TripRequest::whereId($request->trip_request_id)
            ->first();
        $data->driver_rate = $request->driver_rate;
        $data->driver_rate_txt = $request->driver_rate_txt;
        $data->save();

        $user_rate = TripRequest::where('user_id', $data->user_id)->avg('driver_rate');
        $driver = User::whereId($data->user_id)->update([
            'rate' => $user_rate
        ]);

        return $data;
    }

    public function getTripRequestHistory()
    {


        $data = Trip::whereHas('tripRequests', function ($q) {
            $q->whereNotNull('accept_at');
        })->paginate(pagination_number());

        return $data;
    }


}
