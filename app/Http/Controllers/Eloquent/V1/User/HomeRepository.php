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
use App\Models\Department;
use App\Models\DriverCar;
use App\Models\DriverCarDepartment;
use App\Models\Trip;

class HomeRepository implements HomeRepositoryInterface
{

    public function activeMainDepartments(){
        return Department::WithoutParent()->active()->get();
    }

    public function suggestedTrips($activeMainDepartments){
        //ToDo need to get suggested trips based on customer location
        $data['suggested_trips'] = [];
        $item = [];
        foreach ($activeMainDepartments as $activeMainDepartment){
            $item['id'] = $activeMainDepartment->id;
            $item['title'] = $activeMainDepartment->title;
            $item['trips'] = HomepageTripResources::collection($this->getTrips($activeMainDepartment->id));
            array_push($data['suggested_trips'],$item);
        }
        return $data;
    }

    public function getTrips($activeMainDepartmentId){
        //ToDo need to get suggested trips based on customer location
        if($activeMainDepartmentId == 2){ //rent car department
            $driverCars = DriverCarDepartment::whereDepartmentId($activeMainDepartmentId)
                ->pluck('driver_car_id');
            return DriverCar::whereIn('id',$driverCars)->get();
        }else{ //other departments
            return Trip::whereDepartmentId($activeMainDepartmentId)
                ->whereNull('started_at')
                ->whereNull('finished_at')
                ->whereNull('cancelled_at')
                ->whereNull('cancel_reason')
                ->get();
        }

    }
}
