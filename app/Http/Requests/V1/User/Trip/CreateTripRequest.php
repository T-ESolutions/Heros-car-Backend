<?php

namespace App\Http\Requests\V1\User\Trip;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'department_id'     => 'required|exists:departments,id',
            'driver_car_id'     => 'required|exists:driver_cars,id',
            'trip_id'           => 'required|numeric',
            'chairs'            => 'required|numeric|min:1',

            'trip_date'         => 'required|date_format:Y-m-d',
            'trip_time'         => 'required|date_format:H:i',
            'num_of_hours'      => 'sometimes|numeric|min:1',
            'wait_hours'        => 'sometimes|numeric|min:1',
            'from_lat'          => 'required',
            'from_lng'          => 'required',
            'from_address_ar'   => 'required',
            'from_address_en'   => 'required',
            'to_lat'            => 'required',
            'to_lng'            => 'required',
            'to_address_ar'     => 'required',
            'to_address_en'     => 'required',
            'end_lat'           => 'sometimes',
            'end_lng'           => 'sometimes',
            'end_address_ar'    => 'sometimes',
            'end_address_en'    => 'sometimes',
        ];
    }
}
