<?php

namespace App\Http\Requests\V1\Provider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AcceptRejectOrderQuestionRequest extends FormRequest
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
            'order_id' => 'required|exists:orders,id,provider_id,'.Auth::id(),
            'id' => 'required|exists:order_questions,id,order_id,'.request()->order_id,
            'provider_approval' => 'required|in:0,1',
            'reject_reason' => 'sometimes',
        ];
    }
}
