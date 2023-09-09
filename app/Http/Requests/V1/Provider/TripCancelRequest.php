<?php

namespace App\Http\Requests\V1\Provider;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TripCancelRequest extends FormRequest
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
            'id' => 'required|exists:trips,id,driver_id,' . driver_id(),
            'cancel_reason' => 'nullable|string',

        ];
    }
}
