<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\HomeRepositoryInterface;
use App\Http\Resources\V1\Driver\TripDetailsResources;
use App\Models\Driver;
use App\Models\Trip;
use Carbon\Carbon;
use JWTAuth;
use Auth;


class HomeRepository implements HomeRepositoryInterface
{

    public function checkMessage()
    {
        $exists_car = Driver::where('id', auth()->user()->id)
            ->with('driverCar')
            ->with('approvedDriverCar')
            ->first();
        if ($exists_car) {
            if ($exists_car->message_is_seen != 1) {

                $exists_car->message_is_seen = 1;
                $exists_car->save();

                $getIncomingTrip = $this->getIncomingTrip(auth()->user()->id);

                $array['current_trip'] = $getIncomingTrip ? new TripDetailsResources($getIncomingTrip) : null;
                $array['action']['action_direction'] = isset($exists_car->approvedDriverCar->approved) && $exists_car->approvedDriverCar->approved == 1 ? 'new_shared_ride' : 'driver_cars_screen';
                $array['action']['action_text'] = isset($exists_car->approvedDriverCar->approved) && $exists_car->approvedDriverCar->approved == 1 ? 'Add New Trip' : 'Add New Car';
                $array['message'] = $exists_car->message;
                $array['driver_car'] = $exists_car->driverCar;
                $result = (object)$array;
                return $result;
            }
        }
        return false;
    }

    public function getIncomingTrip($driver_id)
    {
        return Trip::orderBy('trip_date','asc')
            ->whereDate('trip_date', '>=', Carbon::now())
            ->where('driver_id',$driver_id)
            ->whereNull('finished_at')
            ->whereNull('cancelled_at')
//            ->whereHas('tripRequests', function ($q) {
//                $q->whereDate('trip_date', '>=', Carbon::now())
//                    ->whereNotNull('accept_at')
//                    ->whereNull('user_cancel_at')
//                    ->whereNull('reject_at')
//                    ->whereNull('finished_at');
//            })
            ->first();
    }


}
