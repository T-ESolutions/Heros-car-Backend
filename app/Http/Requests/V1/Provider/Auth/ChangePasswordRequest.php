<?php

namespace App\Http\Requests\V1\Provider\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'old_password' => 'nullable',
        ];
    }
}
