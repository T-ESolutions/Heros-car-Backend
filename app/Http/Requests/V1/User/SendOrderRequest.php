<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class SendOrderRequest extends FormRequest
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
            'service_id' => 'required|exists:services,id',
            'pickup_lat' => 'required|numeric',
            'pickup_lng' => 'required|numeric',
            'pickup_address' => 'required|string',
            'drop_off_lat' => 'sometimes|numeric',
            'drop_off_lng' => 'sometimes|numeric',
            'drop_off_address' => 'sometimes|string',
            'images' => 'nullable|array|min:4',  // nullable when test only
            'notes' => 'nullable|string|max:900',
            'brand_id' => 'required|exists:brands,id',
            'modell_id' => 'required|exists:modells,id,brand_id,' . $this->brand_id,
            'year_id' => 'required|exists:modell_years,id,modell_id,' . $this->modell_id,
            'car_color' => 'required|string|max:255' ,
            'distance' => 'required|numeric',
            'price_km' => 'required|numeric',
            'price_km_cost' => 'required|numeric',
            'free_km' => 'required|numeric',
            'free_km_cost' => 'required|numeric',
            'total_distance_cost' => 'required|numeric',
            'car_category_cost' => 'required|numeric',
            'vat' => 'required|numeric',
            'service_cost' => 'required|numeric',
            'total_cost' => 'required|numeric',
            'questions.*' => 'required|array',
            'questions.*.id' => 'required|exists:questions,id,service_id,' . $this->service_id,
            'questions.*.answer_id' => 'required|array|exists:answers,id',
        ];
    }
}
