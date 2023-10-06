<?php

namespace App\Http\Requests\V1\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class ForgetChangePasswordRequest extends FormRequest
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
            'password' => ['required', 'confirmed', Password::min(6)],
        ];
    }

    public function messages(){
        return [
            'password.confirmed' => 'should be unique symbol',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = implode('- ',$validator->errors()->all());
        throw new HttpResponseException(
            response()->json(['success' => false, 'status' => 400,'msg'=>$error])
        );
    }
}
