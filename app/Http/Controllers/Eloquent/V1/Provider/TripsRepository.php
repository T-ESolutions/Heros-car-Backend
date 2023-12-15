<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\TripsRepositoryInterface;
use App\Http\Resources\V1\Driver\PassengersResources;
use App\Http\Resources\V1\Driver\TripDetailsResources;
use App\Http\Resources\V1\Driver\TripsResources;
use App\Models\CarCategory;
use App\Models\Driver;
use App\Models\DriverCar;
use App\Models\DriverCarDepartment;
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
        $driver_car = DriverCar::where('driver_id', $request['driver_id'])->first();
        if (!$driver_car) {
            return "driver_not_have_car";
        }
        $request['driver_car_id'] = $driver_car->id;
        $request['brand_id'] = $driver_car->brand->id;
        $request['modell_id'] = $driver_car->modell->id;
        $request['color_id'] = $driver_car->color->id;

        $price_per_person = $this->calculatePricePerPersonCost($request['driver_id'],$request['driver_car_id'],$request['department_id']);
        $request['price_per_person'] = $price_per_person;
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
        $requests = TripRequest::where('driver_id', driver_id())->current()->get();
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

    public function calculatePricePerPersonCost($driver_id,$driver_car_id,$department_id){
        $driverCarDepartment = DriverCarDepartment::where('department_id',$department_id)
            ->where('driver_id',$driver_id)
            ->where('driver_car_id',$driver_car_id)
            ->first();
        //car_category_id
        $carCategory = CarCategory::whereId($driverCarDepartment->car_category_id)->first();
//        [
//            'department_id',
//            'title',
//            'start_price',
//            'min_price',
//            'km_price',
//            'wait_price',
//        ];
        $wait_time = 10;
        $distance = 50;
        $cost = $carCategory->start_price + ($wait_time * $carCategory->wait_price) + ($distance * $carCategory->km_price);
        return $cost;
    }


}
