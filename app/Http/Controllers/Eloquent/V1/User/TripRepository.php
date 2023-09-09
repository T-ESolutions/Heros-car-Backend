<?php

namespace App\Http\Controllers\Eloquent\V1\User;


use App\Http\Controllers\Interfaces\V1\User\TripRepositoryInterface;
use App\Models\Answer;
use App\Models\Brand;
use App\Models\CancelReason;
use App\Models\CarCategory;
use App\Models\Department;
use App\Models\Driver;
use App\Models\DriverCar;
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
    public function createTripRequest($request)
    {

        $department = Department::whereId($request->department_id)->first();

        if ($request->department_id == 2 || $department->parent_id == 2) {
            $trip_id = null;
            $carCategoryId = DriverCarDepartment::whereDepartmentId($request->department_id)
                ->whereDriverCarId($request->driver_car_id)->first()->car_category_id;
            $carCategory = CarCategory::whereId($carCategoryId)->first();
            $price = ($carCategory->km_price * $request->num_of_hours) + ($carCategory->wait_price * $request->wait_hours);
            $numOfHours = isset($request->num_of_hours) && $request->num_of_hours > 0 ? $request->num_of_hours : 1;
            $waitHours = isset($request->wait_hours) && $request->wait_hours > 0 ? $request->wait_hours : 0;

        } else {
            $trip_id = $request->trip_id;
            $trip = Trip::whereId($trip_id)->first();
            if ($trip->trip_date != $request->trip_date)
                return false;

            $price = $trip->price_per_person;
            $numOfHours = 0;
            $waitHours = 0;

        }
        $chairs = isset($request->chairs) && $request->chairs > 0 ? $request->chairs : 1;
        $bags = isset($request->bags) && $request->bags > 0 ? $request->bags : 0;


       
        return TripRequest::create([
            'user_id' => Auth::id(),
            'driver_id' => $request->driver_id,
            'department_id' => $request->department_id,
            'driver_car_id' => $request->driver_car_id,
            'trip_id' => $trip_id,
            'trip_date' => $request->trip_date,
            'trip_time' => $request->trip_time,
            'price' => $price,
            'chairs' => $chairs,
            'bags' => $bags,
            'num_of_hours' => $numOfHours,
            'wait_hours' => $waitHours,
            'started_at' => null,
            'finished_at' => null,
            'accept_at' => null,
            'reject_at' => null,
            'user_cancel_at' => null,
            'user_cancel_reason' => null,
            'user_rate' => null,
            'user_rate_txt' => null,
            'driver_rate' => null,
            'driver_rate_txt' => null,
            'from_lat' => $request->from_lat,
            'from_lng' => $request->from_lng,
            'from_address_ar' => $request->from_address_ar,
            'from_address_en' => $request->from_address_en,
            'to_lat' => $request->to_lat,
            'to_lng' => $request->to_lng,
            'to_address_ar' => $request->to_address_ar,
            'to_address_en' => $request->to_address_en,
            'end_lat' => $request->end_lat,
            'end_lng' => $request->end_lng,
            'end_address_ar' => $request->end_address_ar,
            'end_address_en' => $request->end_address_en,
        ]);


    }

    public function searchTrip($request)
    {
        $departmentId = $request->department_id;

        $department = Department::whereId($departmentId)->first();

        //ToDo need to get suggested trips based on customer location lat lng
        if ($departmentId == 2 || $department->parent_id == 2) { //rent car department
            $driverCarDepartments = DriverCarDepartment::whereDepartmentId($departmentId)
                ->pluck('driver_car_id');
            $driverCars = DriverCar::whereApproved(1)
                ->whereAvailable(1)
                ->whereIn('id', $driverCarDepartments)
                ->paginate(10);
            foreach ($driverCars as $driverCar) {
                $carCategoryId = DriverCarDepartment::whereDepartmentId($departmentId)
                    ->whereDriverCarId($driverCar->id)->first()->car_category_id;
                $pricePerPerson = CarCategory::whereId($carCategoryId)->first()->km_price;

                $driverCar->department_id = $departmentId;
                $driverCar->driver_car_id = $driverCar->id;
                $driverCar->from_lat = $driverCar->lat;
                $driverCar->from_lng = $driverCar->lng;
                $driverCar->from_address_ar = $driverCar->address_ar;
                $driverCar->from_address_en = $driverCar->address_en;
                $driverCar->price_per_person = $pricePerPerson;
                $driverCar->available_chairs = $driverCar->chairs;
            }

            return $driverCars;

        } else { //other departments
            return Trip::where('trip_date', $request->trip_date)
                ->whereDepartmentId($departmentId)
                ->whereNull('started_at')
                ->whereNull('finished_at')
                ->whereNull('cancelled_at')
                ->whereNull('cancel_reason')
                ->paginate(10);
        }
    }

    public function checkUserOfTrip($request)
    {
        return TripRequest::whereTripId($request->trip_id)->whereUserId(Auth::id())->first();
    }

    public function tripDetails($request)
    {
        return Trip::whereId($request->trip_id)->first();
    }

    public function cancelTripRequest($request)
    {

        $data = TripRequest::where('id', $request->trip_request_id)
            ->where('user_id', Auth::id())
            ->first();
        if ($data && $data->trip->started_at == null) {
            $data->update([
                "user_cancel_at" => Carbon::now(),
                "user_cancel_reason" => $request->cancel_reason
            ]);
            return $data;
        } else {
            return null;
        }


    }

    public function getTripRequestHistory()
    {
        $data = TripRequest::where('user_id', Auth::id())
            ->with('trip')
            ->paginate(pagination_number());

        return $data;

    }


    public function rateTrip($request)
    {
        $data = TripRequest::whereId($request->trip_request_id)
            ->first();
        $data->user_rate = $request->user_rate;
        $data->user_rate_txt = $request->user_rate_txt;
        $data->save();

        $driver_rate = TripRequest::where('driver_id', $data->driver_id)->avg('user_rate');
        $driver = Driver::whereId($data->driver_id)->update([
            'rate' => $driver_rate
        ]);

        return $data;

    }

    public function driverRate($request)
    {

        $data = TripRequest::where('driver_id', $request->driver_id)
            ->with('user')
            ->get();
        return $data;

    }

}
