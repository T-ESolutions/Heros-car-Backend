<?php

namespace App\Http\Controllers\Api\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\AuthRepositoryInterface;
use App\Http\Requests\V1\Provider\Auth\ChangePasswordRequest;
use App\Http\Requests\V1\Provider\Auth\ForgetPasswordRequest;
use App\Http\Requests\V1\Provider\Auth\UpdateProfileRequest;
use App\Http\Requests\V1\Provider\Auth\SocialLoginRequest;
use App\Http\Requests\V1\Provider\Auth\ResendCodeRequest;
use App\Http\Resources\V1\Provider\ProvidersResources;
use App\Http\Requests\V1\Provider\Auth\SignUpRequest;
use App\Http\Requests\V1\Provider\Auth\VerifyRequest;
use App\Http\Requests\V1\Provider\Auth\LogInRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use JWTAuth;
use TymonJWTAuthExceptionsJWTException;
use Mail;

class AuthController extends Controller
{
    protected $userAuthRepository;

    public function __construct(AuthRepositoryInterface $userAuthRepository)
    {
        $this->userAuthRepository = $userAuthRepository;
    }

    public function unauthrized(Request $request)
    {
        return response()->json(msg(not_authoize(), trans('lang.not_authorize')));
    }

    public function logIn(LogInRequest $request)
    {
        $data = $request->validated();
        $data = $this->userAuthRepository->logIn($data);
        if (is_string($data)) {
            if ($data == "driveLicenceOrPasswordIncorrect") {
                return response()->json(msg(failed(), trans('lang.driveLicenceOrPasswordIncorrect')));
            } elseif ($data = "not_accepted") {
                return response()->json(msg(not_active(), trans('lang.not_accepted')));
            } elseif ($data = "suspended") {
                return response()->json(msg(suspend(), trans('lang.suspended')));
            } elseif ($data = "not_active") {
                return response()->json(msg(not_active(), trans('lang.not_active')));
            }
        } else {
            $data = (new ProvidersResources($data))->token($data->jwt);
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        }
    }

    public function logout()
    {
        $this->userAuthRepository->logout();
        return response()->json(msg(success(), trans('lang.success')));
    }

    public function signUp(SignUpRequest $request)
    {
        $data = $request->validated();
        $data['country_code'] = '+20';
//        $data['user_phone'] = request()->country_code . '' . request()->phone;
        $data['user_phone'] = $data['country_code'] . '' . request()->phone;
        if (config('app.env') == 'local') {
            $data['accept'] = 1;
        }
        $this->userAuthRepository->signUp($data);
        return response()->json(msg(success(), trans('lang.CodeSent')));

    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $data = $request->validated();

        $this->userAuthRepository->sendCode($request->phone, "reset");
        return response()->json(msg(success(), trans('lang.CodeSent')));

    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->validated();

        $result = $this->userAuthRepository->changePassword($data);
        if (!$result) {
            return response()->json(msg(failed(), trans('lang.old_passwordError')));

        }
        $data = (new ProvidersResources($result));
        return response()->json(msgdata(success(), trans('lang.passwordChangedSuccess'), $data));
    }

    public function profile()
    {
        $user = auth('providers')->user();
        $data = (new ProvidersResources($user));
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        $result = $this->userAuthRepository->updateProfile($data);
        $data = (new ProvidersResources($result));
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function verify(VerifyRequest $request)
    {
        $data = $request->validated();

        $result = $this->userAuthRepository->verify($data);
        if ($result) {
            if (is_string($result) && $result = "suspended") {
                return response()->json(msg(suspend(), trans('lang.suspended')));
            }
            $data = (new ProvidersResources($result));
            return response()->json(msgdata(success(), trans('lang.Verified_success'), $data));
        }
        return response()->json(msg(failed(), trans('lang.codeError')));
    }

    public function resendCode(ResendCodeRequest $request)
    {
        $data = $request->validated();

        $this->userAuthRepository->resendCode($data);
        return response()->json(msg(success(), trans('lang.success')));

    }

    public function socialLogin(SocialLoginRequest $request)
    {
        $data = $request->validated();

        $result = $this->userAuthRepository->socialLogin($data);

        if ($result) {
            $data = (new ProvidersResources($result));
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        }
        return response()->json(msg(failed(), trans('lang.error')));

    }

    public function deleteAccount()
    {
        //Todo delete account
        return response()->json(msg(success(), trans('lang.success')));
    }
}
