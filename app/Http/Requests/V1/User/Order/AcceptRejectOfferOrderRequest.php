<?php

namespace App\Http\Requests\V1\User\Order;

use App\Models\CancelReason;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JWTAuth;
use TymonJWTAuthExceptionsJWTException;

class AcceptRejectOfferOrderRequest extends FormRequest
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
        $user = JWTAuth::user();
        return [
            'order_id' => ['required','exists:orders,id,user_id,'.$user->id],
            'provider_id' => ['required','exists:providers,id'],
            'status' => ['required','in:accepted,rejected'],
            'offer' => ['required','numeric'],
        ];
    }
}
