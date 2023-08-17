<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\HelperRepositoryInterface;
use App\Http\Requests\V1\Helper\ContactUsRequest;
use App\Http\Requests\V1\Helper\PageRequest;
use App\Http\Resources\V1\DepartmentResources;
use App\Http\Resources\V1\User\PagesResources;
use App\Http\Resources\V1\User\SettingResources;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\User;
use TymonJWTAuthExceptionsJWTException;
use JWTAuth;
use Auth;
use Mail;

class HelperController extends Controller
{
    protected $helperRepository;

    public function __construct(HelperRepositoryInterface $helperRepository)
    {
        $this->helperRepository = $helperRepository;
    }

    public function pages(PageRequest $request)
    {

        $request->validated();

        $data = $this->helperRepository->pages($request);

        if ($data) {
            $data = (new PagesResources($data));
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        } else {
            return response()->json(msg(not_found(), trans('lang.not_found')));
        }


    }

    public function departments()
    {
        $data = $this->helperRepository->departments();
        $data = DepartmentResources::collection($data);
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }

    public function socialMedia()
    {
        $data = $this->helperRepository->socialMedia();
        $data = SettingResources::collection($data);
        return response()->json(msgdata(success(), trans('lang.success'), $data));

    }

    public function userTripTerms()
    {
        $data = $this->helperRepository->userTripTerms();
        if ($data) {
            $data = (new SettingResources($data));
            return response()->json(msgdata(success(), trans('lang.success'), $data));
        } else {
            return response()->json(msg(not_found(), trans('lang.not_found')));
        }
    }

    public function contactUs(ContactUsRequest $request)
    {
        $request->validated();

        $this->helperRepository->contactUs($request);

        return response()->json(msg(success(), trans('lang.added_s')));

    }
}
