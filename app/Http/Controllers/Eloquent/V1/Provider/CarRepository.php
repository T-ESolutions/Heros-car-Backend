<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\CarRepositoryInterface;

use Auth;
use JWTAuth;


class CarRepository implements CarRepositoryInterface
{

    public function store($request)
    {
        $credentials = [
            'phone' => $request['phone'],
            'password' => $request['password']
        ];

        if (!$jwt_token = JWTAuth::attempt($credentials, false)) {
            return "driveLicenceOrPasswordIncorrect";
        } else {
            $user = JWTAuth::user();

            if ($user->accept == 0) {

                return "not_accepted";
            }
            if ($user->suspend == 1) {
                return "suspended";
            }
            if ($user->active == 0) {
                return "not_active";
            }

            $user->fcm_token = $request['fcm_token'];
            $user->save();
            $user->jwt = $jwt_token;
            return $user;
        }
    }

}
