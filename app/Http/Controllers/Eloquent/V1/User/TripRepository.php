<?php

namespace App\Http\Controllers\Eloquent\V1\User;


use App\Http\Controllers\Interfaces\V1\User\TripRepositoryInterface;
use App\Models\Answer;
use App\Models\Brand;
use App\Models\CancelReason;
use App\Models\CarCategory;
use App\Models\Department;
use App\Models\DriverCarDepartment;
use App\Models\ModellYear;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderImage;
use App\Models\OrderOfferRequest;
use App\Models\OrderQuestion;
use App\Models\OrderQuestionAnswer;
use App\Models\OrderStatus;
use App\Models\Question;
use App\Models\Service;
use App\Models\Status;
use App\Models\Trip;
use App\Models\TripRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TripRepository implements TripRepositoryInterface
{
    public function createTripRequest($request){

        $department = Department::whereId($request->department_id)->first();
        if($request->department_id == 2 || $department->parent_id == 2){
            $trip_id = null;
            $carCategoryId = DriverCarDepartment::whereDepartmentId($request->department_id)
                ->whereDriverCarId($request->driver_car_id)->first()->car_category_id;
            $carCategory = CarCategory::whereId($carCategoryId)->first();
            $price = ($carCategory->km_price * $request->num_of_hours) + ($carCategory->wait_price * $request->wait_hours);
            $numOfHours = isset($request->num_of_hours) && $request->num_of_hours > 0 ? $request->num_of_hours : 1;
            $waitHours = isset($request->wait_hours) && $request->wait_hours > 0 ? $request->wait_hours : 0;

        }else{
            $trip_id = $request->trip_id;
            $trip = Trip::whereId($trip_id)->first();
            if($trip->trip_date != $request->trip_date)
                return false;

            $price = $trip->price_per_person;
            $numOfHours = 0;
            $waitHours = 0;

        }
        $chairs = isset($request->chairs) && $request->chairs > 0 ? $request->chairs : 1;

        return TripRequest::create([
            'user_id'               => Auth::id(),
            'driver_id'             => $request->driver_id,
            'department_id'         => $request->department_id,
            'driver_car_id'         => $request->driver_car_id,
            'trip_id'               => $trip_id,
            'trip_date'             => $request->trip_date,
            'trip_time'             => $request->trip_time,
            'price'                 => $price,
            'chairs'                => $chairs,
            'num_of_hours'          => $numOfHours,
            'wait_hours'            => $waitHours,
            'accept_at'             => null,
            'reject_at'             => null,
            'user_cancel_at'        => null,
            'user_cancel_reason'    => null,
            'user_rate'             => null,
            'user_rate_txt'         => null,
            'driver_rate'           => null,
            'driver_rate_txt'       => null,
            'from_lat'              => $request->from_lat,
            'from_lng'              => $request->from_lng,
            'from_address_ar'       => $request->from_address_ar,
            'from_address_en'       => $request->from_address_en,
            'to_lat'                => $request->to_lat,
            'to_lng'                => $request->to_lng,
            'to_address_ar'         => $request->to_address_ar,
            'to_address_en'         => $request->to_address_en,
            'end_lat'               => $request->end_lat,
            'end_lng'               => $request->end_lng,
            'end_address_ar'        => $request->end_address_ar,
            'end_address_en'        => $request->end_address_en,
        ]);


    }


}