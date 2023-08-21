<?php

namespace App\Http\Requests\V1\Provider;

use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class CarStoreRequest extends FormRequest
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
            'car_image' => 'required|image|mimes:png,jpg,jpeg,webp,svg,jfif',
            'car_licence_image' => 'required|image|mimes:png,svg,jfif,jpeg,jpg',
            'brand_id' => 'required|exists:brands,id',
            'modell_id' => 'required|exists:modells,id,brand_id,'. $this->brand_id,
            'document_image' => 'nullable|image|mimes:png,svg,jfif,jpeg,jpg',
            'factory_year' => 'required|numeric',
            'color_id' => 'required|exists:colors,id',
            'car_plate_num' => 'required|numeric',
            'car_plate_txt' => 'required|string',
            'car_body_id' => 'required|string|unique:driver_cars,car_body_id',
            'chairs' => 'required|numeric|min:1',
            'air_cond' => 'required|in:0,1',
            'bags' => 'required|in:0,1',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'address_ar' => 'required|string',
            'address_en' => 'required|string',

            'use_my_data' => 'required|in:0,1',
            'name' => 'nullable|string|max:255|required_if:use_my_data,0',
            'phone' => 'nullable|unique:drivers,phone|required_if:use_my_data,0',
            'password' => 'nullable|min:6|required_if:use_my_data,0',
            'id_number' => 'nullable|unique:drivers,id_number|required_if:use_my_data,0',
            'gender' => 'nullable|in:male,female|required_if:use_my_data,0',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp,svg,jfif|required_if:use_my_data,0',
            'driver_licence_image' => 'nullable|image|mimes:png,jpg,jpeg,webp,svg,jfif|required_if:use_my_data,0',

            'departments' => 'required|array',
            'departments.*' => 'required|exists:departments,id',




        ];
    }
}
