<?php

namespace App\Http\Requests\V1\Provider\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LogInRequest extends FormRequest
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
//        request()->user_phone = request()->country_code . '' . request()->phone;
        return [
//            'country_code' => 'required', //+20
//            'phone' => 'required',
//            'user_phone' => 'required|exists:users,user_phone',
            'drive_licence' => 'required|exists:providers,drive_licence,accept,1',
            'password' => 'required|min:6',
            'fcm_token' => 'required',
        ];
    }
}
