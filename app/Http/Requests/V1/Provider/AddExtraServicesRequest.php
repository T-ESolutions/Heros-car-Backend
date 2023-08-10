<?php

namespace App\Http\Requests\V1\Provider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;

class AddExtraServicesRequest extends FormRequest
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
            'order_id' => 'required|exists:orders,id,provider_id,' . JWTAuth::user()->id . ',status_key,provider_arrived',
            'service_ids' => 'required|array|min:1|max:50',
            'service_ids.*' => ['required', 'integer', Rule::exists('services', 'id')->where('active', 1)],
            'name' => 'nullable',
            'price' => 'nullable',
        ];
    }
}
