<?php

namespace App\Http\Requests\V1\Admin;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' .\auth('admin')->user()->id,
            'phone' => 'required|unique:admins,phone,' . \auth('admin')->user()->id,
            'image' => 'sometimes|image|mimes:png,jpg,jpeg',

        ];
    }
}
