<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Interfaces\V1\Provider\CarRepositoryInterface;
use App\Http\Requests\V1\Provider\CarDetailsRequest;
use App\Http\Requests\V1\Provider\CarStoreRequest;
use App\Http\Controllers\Controller;


class CarsController extends Controller
{
    protected $carRepo;

    public function __construct(CarRepositoryInterface $carRepo)
    {
        $this->carRepo = $carRepo;
    }

    public function store(CarStoreRequest $request)
    {
        $request = $request->validated();
        $result = $this->carRepo->store($request);
        if ($result == true) {
            return response()->json(msg(success(), trans('lang.added_s_wait_admin_to_approve')));
        }
        if ($result == 'driver_have_car_before') {
            return response()->json(msg(failed(), trans('lang.driver_have_car_before')));
        }
    }

    public function update(CarStoreRequest $request)
    {
        $request = $request->validated();
        $result = $this->carRepo->update($request);
        if ($result == true) {
            return response()->json(msg(success(), trans('lang.updated_s_wait_admin_to_approve')));
        }
        if ($result == 'driver_have_car_before') {
            return response()->json(msg(failed(), trans('lang.driver_have_car_before')));
        }
    }

    public function myCars()
    {
        $result = $this->carRepo->myCars();
        return response()->json(msgdata(success(), trans('lang.success'), $result));
    }

    public function details(CarDetailsRequest $request)
    {
        $request = $request->validated();

        $result = $this->carRepo->details($request);
        return response()->json(msgdata(success(), trans('lang.success'), $result));
    }

    public function data(CarDetailsRequest $request)
    {
        if (auth()->user()->prent_id != null){
            return response()->json(msg(failed(), trans('lang.you_dont_have_permission_to_edit_car_data')));
        }
        $request = $request->validated();

        $result = $this->carRepo->data($request);
        return response()->json(msgdata(success(), trans('lang.success'), $result));
    }


}
