<?php

namespace App\Http\Controllers\Api\V1\User;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\User;
use TymonJWTAuthExceptionsJWTException;
use JWTAuth;
use Auth;
use Mail;

class UserController extends Controller
{


    public function addSuggestion(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 401, 'msg' => $validator->messages()->first()]);
        }
        $data['writer_type'] = User::class;
        $data['writer_id'] = auth('api')->user()->id;
        ContactUs::create($data);
        return response()->json(msg(success(), trans('lang.added_s')));

    }


}
