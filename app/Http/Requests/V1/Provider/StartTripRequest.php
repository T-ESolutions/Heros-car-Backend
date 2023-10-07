<?php

namespace App\Http\Requests\V1\Provider;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StartTripRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        return [
            'trip_date' => 'required|date|after_or_equal:' . Carbon::now()->format('Y-m-d'),
            'trip_time_from' => 'required',
//            'trip_time_to' => 'required|after:'.$this->trip_time_from,
            'department_id' => 'required|in:1,3', //1=Economic Trip | 3=Bink Car
            'chairs' => 'required|numeric|min:1',
            'from_lat' => 'required',
            'from_lng' => 'required',
            'from_address_ar' => 'required',
            'from_address_en' => 'required',
            'to_lat' => 'required',
            'to_lng' => 'required',
            'to_address_ar' => 'required',
            'to_address_en' => 'required',
            'air_cond' => 'nullable|in:0,1',
            'bags' => 'nullable|in:0,1',
        ];
    }
}
