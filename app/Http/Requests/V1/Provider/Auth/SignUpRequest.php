<?php

namespace App\Http\Requests\V1\Provider\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'image' => 'nullable',
            'name' => 'required|string|max:255',
//            'country_code' => 'required',
            'phone' => 'required|unique:providers,phone',
            'email' => 'required|email|unique:providers,email',
            'password' => 'required|min:6|confirmed',
            'fcm_token' => 'required',
            'drive_licence' => 'required|unique:providers,drive_licence',
        ];
    }
}
