<?php

namespace App\Http\Requests\V1\Admin;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ModellRequest extends FormRequest
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
            'id' => ['nullable','exists:modells,id',Rule::requiredIf($this->routeIs('modells.update'))],
            'brand_id' => ['required','exists:brands,id'],
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'sometimes|image|mimes:png,jpg,jpeg',

        ];
    }
}
