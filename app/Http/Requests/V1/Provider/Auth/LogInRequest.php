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
        return [
            'phone' => 'required|exists:drivers,phone',
            'password' => 'required|min:6',
            'fcm_token' => 'required',
        ];
    }
}
