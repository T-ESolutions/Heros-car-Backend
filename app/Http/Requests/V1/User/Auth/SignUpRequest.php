<?php

namespace App\Http\Requests\V1\User\Auth;

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
            'image' => 'nullable|image|mimes:png,svg,jpeg,jpg',
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'fcm_token' => 'required',
            'gender' => 'required|in:male,female',
        ];
    }
}
