<?php

namespace App\Http\Requests\V1\Provider\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'name' => 'nullable|max:255',
            'country_code' => [Rule::requiredIf($this->phone != null)],
            'phone' => 'nullable|unique:providers,phone,'.auth()->user()->id,
            'email' => 'nullable|email|unique:providers,email,'.auth()->user()->id,
            'fcm_token' => 'nullable|max:255',
        ];
    }
}
