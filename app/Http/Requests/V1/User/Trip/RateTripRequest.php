<?php

namespace App\Http\Requests\V1\User\Trip;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RateTripRequest extends FormRequest
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
            'trip_request_id' => 'required|exists:trip_requests,id',
            'user_rate' => 'required|numeric|max:5',
            'user_rate_txt' => 'required|string',
        ];
    }
}
