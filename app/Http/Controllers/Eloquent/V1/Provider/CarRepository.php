<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\CarRepositoryInterface;

use App\Http\Resources\V1\Driver\DriverCarDataResources;
use App\Http\Resources\V1\Driver\DriverCarDetailsResources;
use App\Http\Resources\V1\Driver\DriverCarResources;
use App\Models\Color;
use App\Models\Department;
use App\Models\Driver;
use App\Models\DriverCar;
use App\Models\DriverCarDepartment;
use Auth;
use JWTAuth;


class CarRepository implements CarRepositoryInterface
{

    public function store($request)
    {
        if ($request['use_my_data'] == 1) {
            //check first driver have car or not
            $exists_car = DriverCar::where('driver_id', auth()->user()->id)->first();
            if ($exists_car) {
                return 'driver_have_car_before';
            }
            $request['driver_id'] = auth()->user()->id;
        } else {
            $driver_data['name'] = $request['name'];
            $driver_data['phone'] = $request['phone'];
            $driver_data['password'] = $request['password'];
            $driver_data['id_number'] = $request['id_number'];
            $driver_data['gender'] = $request['gender'];
            $driver_data['image'] = $request['image'];
            $driver_data['car_image'] = $request['car_image'];
            $driver_data['driver_licence_image'] = $request['driver_licence_image'];
            $driver_data['parent_id'] = auth()->user()->id;
            $driver = Driver::create($driver_data);
            $request['driver_id'] = $driver->id;

        }
        $color = Color::where('id', $request['color_id'])->first();
        $request['color_ar'] = $color->title_ar;
        $request['color_en'] = $color->title_en;
        $driver_car = DriverCar::create($request);

        if ($driver_car) {
            foreach ($request['departments'] as $row) {
                $department = Department::where('id', $row)->first();
                if ($department->parent_id != null) {
                    $departments_data['department_parent_id'] = $department->parent_id;
                }

                $departments_data['driver_id'] = $driver_car->driver_id;
                $departments_data['department_id'] = $row;
                $departments_data['driver_car_id'] = $driver_car->id;
//                $departments_data['car_category_id'] =  ;
                DriverCarDepartment::create($departments_data);
            }
        }

        return true;
    }

    public function update($request)
    {
        $driver_car = DriverCar::whereId($request['id'])->first();
        if ($request['use_my_data'] == 1) {
            //check first driver have car or not
            $exists_car = DriverCar::where('id', '!=', $request['id'])->where('driver_id', auth()->user()->id)->first();
            if ($exists_car) {
                return 'driver_have_car_before';
            }
            $request['driver_id'] = auth()->user()->id;
        } else {
            $driver_data['name'] = $request['name'];
            $driver_data['phone'] = $request['phone'];
            if (isset($request['password'])) {
                $driver_data['password'] = $request['password'];
            }
            if(isset($request['id_number']))
                $driver_data['id_number'] = $request['id_number'];

            if(isset($request['gender']))
                $driver_data['gender'] = $request['gender'];

            if(isset($request['image']))
                $driver_data['image'] = $request['image'];

            if(isset($request['driver_licence_image']))
                $driver_data['driver_licence_image'] = $request['driver_licence_image'];

            if ($driver_car->driver_id == auth()->user()->id) {
                $driver = Driver::create($driver_data);
                $request['driver_id'] = $driver->id;
            } else {
                if (isset($request['image'])) {
                    if (is_file($request['image'])) {
                        $img_name = upload($request['image'], 'drivers');
                        $driver_data['image'] = $img_name;
                    }
                }

                if (isset($request['driver_licence_image'])) {
                    if (is_file($request['driver_licence_image'])) {
                        $img_name = upload($request['driver_licence_image'], 'driver_licences');
                        $driver_data['driver_licence_image'] = $img_name;
                    }
                }

                Driver::where('id', $driver_car->driver_id)->update($driver_data);
            }
        }
        $color = Color::where('id', $request['color_id'])->first();
        $request['color_ar'] = $color->title_ar;
        $request['color_en'] = $color->title_en;
        $departments = $request['departments'];
        unset($request['use_my_data']);
        unset($request['name']);
        unset($request['phone']);
        unset($request['password']);
        unset($request['id_number']);
        unset($request['gender']);
        unset($request['image']);
        unset($request['departments']);
        unset($request['driver_licence_image']);
        //to return car request to admin to check request first ...
        $request['approved'] = 0;
        //upload images
        if (isset($request['car_image'])) {
            if (is_file($request['car_image'])) {
                $img_name = upload($request['car_image'], 'car_images');
                $request['car_image'] = $img_name;
            }
        }

        if (isset($request['car_licence_image'])) {
            if (is_file($request['car_licence_image'])) {
                $car_licence_image_name = upload($request['car_licence_image'], 'car_licence_images');
                $request['car_licence_image'] = $car_licence_image_name;
            }
        }

        if (isset($request['document_image'])) {
            if (is_file($request['document_image'])) {
                $document_image_name = upload($request['document_image'], 'document_images');
                $request['document_image'] = $document_image_name;
            }
        }
        DriverCar::whereId($request['id'])->update($request);

        DriverCarDepartment::where('driver_car_id', $driver_car->id)->delete();
        foreach ($departments as $row) {
            $department = Department::where('id', $row)->first();
            if ($department->parent_id != null) {
                $departments_data['department_parent_id'] = $department->parent_id;
            }
            $departments_data['driver_id'] = $driver_car->driver_id;
            $departments_data['department_id'] = $row;
            $departments_data['driver_car_id'] = $driver_car->id;
            DriverCarDepartment::create($departments_data);
        }
        return true;
    }

    public function myCars()
    {
        $driver_id = auth()->user()->id;
        $data = DriverCar::whereHas('driver', function ($q) use ($driver_id) {
            $q->where('parent_id', $driver_id)->orWhere('id', $driver_id);
        })->orderBy('id', 'desc')->paginate(20);
        $data = DriverCarResources::collection($data)->response()->getData(true);
        return $data;
    }

    public function details($request)
    {
        $data = DriverCar::where('id', $request['id'])->first();
        $data = new DriverCarResources($data);
        return $data;
    }

    public function data($request)
    {
        $data = DriverCar::where('id', $request['id'])->first();
        $data = new DriverCarDataResources($data);
        return $data;
    }

}
