<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 22/05/2019
 * Time: 01:53 م
 */

namespace App\Http\Controllers\Eloquent\V1\User;

use App\Http\Controllers\Interfaces\V1\User\HomeRepositoryInterface;
use App\Http\Resources\V1\User\HomepageTripResources;
use App\Models\CarCategory;
use App\Models\Department;
use App\Models\DriverCar;
use App\Models\DriverCarDepartment;
use App\Models\Trip;

class HomeRepository implements HomeRepositoryInterface
{

    public function activeMainDepartments(){
        return Department::WithoutParent()->active()->get();
    }

    public function suggestedTrips($activeMainDepartments,$request){
        //ToDo need to get suggested trips based on customer location
        $data['suggested_trips'] = [];
        $item = [];
        foreach ($activeMainDepartments as $activeMainDepartment){
            $item['id'] = $activeMainDepartment->id;
            $item['title'] = $activeMainDepartment->title;
            $item['trips'] = HomepageTripResources::collection($this->getTripsForHomepage($activeMainDepartment->id));
            array_push($data['suggested_trips'],$item);
        }
        return $data;
    }

    public function getTripsForHomepage($activeMainDepartmentId){
        //ToDo need to get suggested trips based on customer location
        if($activeMainDepartmentId == 2){ //rent car department
            $driverCarDepartments = DriverCarDepartment::whereDepartmentId($activeMainDepartmentId)
                ->pluck('driver_car_id');
            $driverCars =  DriverCar::whereIn('id',$driverCarDepartments)
                ->take(20)
                ->get();
            foreach ($driverCars as $driverCar){
                $carCategoryId = DriverCarDepartment::whereDepartmentId($activeMainDepartmentId)
                    ->whereDriverCarId($driverCar->id)->first()->car_category_id;
                $pricePerPerson = CarCategory::whereId($carCategoryId)->first()->wait_price;

                $driverCar->department_id       = $activeMainDepartmentId;
                $driverCar->driver_car_id       = $driverCar->id;
                $driverCar->from_lat            = $driverCar->lat;
                $driverCar->from_lng            = $driverCar->lng;
                $driverCar->from_address_ar     = $driverCar->address_ar;
                $driverCar->from_address_en     = $driverCar->address_en;
                $driverCar->price_per_person    = $pricePerPerson;
            }
            return $driverCars;
        }else{ //other departments
            return Trip::whereDepartmentId($activeMainDepartmentId)
                ->whereNull('started_at')
                ->whereNull('finished_at')
                ->whereNull('cancelled_at')
                ->whereNull('cancel_reason')
                ->take(20)
                ->get();
        }

    }

    public function getTripsByDepartment($request){
        $departmentId = $request->department_id;
        //ToDo need to get suggested trips based on customer location
        if($departmentId == 2){ //rent car department
            $driverCarDepartments = DriverCarDepartment::whereDepartmentId($departmentId)
                ->pluck('driver_car_id');
            $driverCars =  DriverCar::whereIn('id',$driverCarDepartments)
                ->paginate(20);
            foreach ($driverCars as $driverCar){
                $carCategoryId = DriverCarDepartment::whereDepartmentId($departmentId)
                    ->whereDriverCarId($driverCar->id)->first()->car_category_id;
                $pricePerPerson = CarCategory::whereId($carCategoryId)->first()->wait_price;

                $driverCar->department_id       = $departmentId;
                $driverCar->driver_car_id       = $driverCar->id;
                $driverCar->from_lat            = $driverCar->lat;
                $driverCar->from_lng            = $driverCar->lng;
                $driverCar->from_address_ar     = $driverCar->address_ar;
                $driverCar->from_address_en     = $driverCar->address_en;
                $driverCar->price_per_person    = $pricePerPerson;
            }
            return $driverCars;
        }else{ //other departments
            return Trip::whereDepartmentId($departmentId)
                ->whereNull('started_at')
                ->whereNull('finished_at')
                ->whereNull('cancelled_at')
                ->whereNull('cancel_reason')
                ->paginate(20);
        }

    }
}
