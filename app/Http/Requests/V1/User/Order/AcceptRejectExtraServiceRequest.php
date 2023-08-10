<?php

namespace App\Http\Requests\V1\User\Order;

use App\Models\CancelReason;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JWTAuth;
use TymonJWTAuthExceptionsJWTException;

class AcceptRejectExtraServiceRequest extends FormRequest
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
            'order_extra_service_id' => ['required', 'exists:order_extra_services,id'],
            'user_approval' => ['required', 'in:0,1'],
            'reject_reason' => ['required_if:user_approval,0'],
        ];
    }
}
