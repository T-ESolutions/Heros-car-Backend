<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\AuthRepositoryInterface;
use App\Models\Driver;
use App\Models\Verfication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;
use JWTAuth;
use TymonJWTAuthExceptionsJWTException;
use Mail;

class AuthRepository implements AuthRepositoryInterface
{

    public function logIn($request)
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

    public function logout()
    {
        $forever = true;
        JWTAuth::parseToken()->invalidate($forever);
    }

    public function signUp($request)
    {
        $user = Driver::create($request);
        return $this->sendCode($user->phone, "activate");
    }

    public function sendCode($phone, $type)
    {
        if (env('APP_ENV') == 'local') {
            $code = 1111;
        } else {
            $code = rand(0000, 9999);
        }
        $verified = Verfication::updateOrcreate
        (
            [
                'phone' => $phone,
                'code' => $code,
                'type' => $type,
                'expired_at' => Carbon::now()->addHour()->toDateTimeString(),
                'user_type' => 'driver',
            ]
        );
//        Mail::to($email)->send(new SendCode($code));
        return true;
    }

    public function resendCode($request)
    {
        $user = Driver::where('phone', $request['phone'])->first();
        $type = $user->active == 0 ? "activate" : "reset";
        return $this->sendCode($request['phone'], $type);
    }

    public function verify($request)
    {
        $user = Driver::where('phone', $request['phone'])->first();
        if ($user->suspend == 1) {
            return "suspended";
        }
        if ($user->active == 0) {
            $verfication = Verfication::where('phone', $request['phone'])
                ->where('code', $request['code'])
                ->where('user_type', 'driver')
                ->first();
            if ($verfication) {
                if (!$verfication->expired_at > Carbon::now()->toDateTimeString()) {
                    return response()->json(msg(failed(), trans('lang.codeExpired')));
                }
                $user->active = 1;
                $user->email_verified_at = Carbon::now();
                $user->save();
                $user->jwt = JWTAuth::fromUser($user);
                //remove verify row ...
                    $verfication->delete();
                return $user;
            } else {
                return false;
            }
        } else {
            $user->jwt = JWTAuth::fromUser($user);
            return $user;
        }

    }

    public function socialLogin($request)
    {
        $user = User::where('social_id', $request['social_id'])
            ->where('social_type', $request['social_type'])
            ->first();
        if ($user) {
//            $userFound->email = $request->email;
            $user->fcm_token = $request['fcm_token'];
            $user->save();
        } else {
            $user = User::create([
                'name' => isset($request['name']) ? $request['name'] : 'User' . rand(10000, 99999),
                'social_id' => $request['social_id'],
                'fcm_token' => $request['fcm_token'],
                'email' => isset($request['email']) ? $request['email'] : null,
                'email_verified_at' => Carbon::now(),
                'active' => 1,
                'social_type' => $request['social_type']
            ]);
        }

        $user->jwt = JWTAuth::fromUser($user);
        return $user;

    }

    public function updateProfile($request)
    {
        $user = auth()->user();
        if (isset($request['name'])) {
            $user->name = $request['name'];
        }
        if (isset($request['email'])) {
            $user->email = $request['email'];
        }
        if (isset($request['image'])) {
            $user->image = $request['image'];
        }
        if (isset($request['phone'])) {
            $user->phone = $request['phone'];
        }
        if (isset($request['gender'])) {
            $user->gender = $request['gender'];
        }
        if (isset($request['fcm_token'])) {
            $user->fcm_token = $request['fcm_token'];
        }
        $user->save();
        $user->jwt = JWTAuth::fromUser($user);
        return $user;
    }

    public function changePassword($request)
    {
        $user = auth()->user();
        if (isset($request['old_password'])) {
            $old_password = Hash::check($request['old_password'], $user->password);
            if ($old_password != true) {
                return false;
            }
        }
        $user->password = $request['password'];
        $user->save();
        $user->jwt = JWTAuth::fromUser($user);
        return $user;
    }

}
