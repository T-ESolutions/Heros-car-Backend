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
        $exists_car = Driver::where('id', auth()->user()->id)->first();
        if ($exists_car->message_ar) {
            if ($exists_car->message_is_seen != 1) {

                $exists_car->message_is_seen = 1;
                $exists_car->save();

                $getIncomingTrip = $this->getIncomingTrip(auth()->user()->id);

                $array['current_trip'] = new TripDetailsResources($getIncomingTrip);
                $array['message'] = $exists_car->message;
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
            ->whereNull('finished_at')
            ->whereNull('cancelled_at')
            ->whereHas('tripRequests', function ($q) {
                $q->whereDate('trip_date', '>=', Carbon::now())
                    ->whereNotNull('accept_at')
                    ->whereNull('user_cancel_at')
                    ->whereNull('reject_at')
                    ->whereNull('finished_at');
            })->first();
    }


}
