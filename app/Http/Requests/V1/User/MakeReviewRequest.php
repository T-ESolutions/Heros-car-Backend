<?php

namespace App\Http\Requests\V1\User;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MakeReviewRequest extends FormRequest
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

            'order_id' => 'required|exists:orders,id,user_id,'.Auth::id(),
            'comment' => 'required|string',
            'rate' => 'required|numeric|max:5',
            'target_type' => ['required', 'string', Rule::in([
                Driver::class,
                User::class,
            ])],
            'target_id' => ['required', Rule::exists((new $this->target_type)->getTable(), 'id')],


        ];
    }
}
