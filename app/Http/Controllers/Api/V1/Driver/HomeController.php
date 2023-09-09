<?php

namespace App\Http\Controllers\Api\V1\Driver;
use App\Http\Controllers\Interfaces\V1\Provider\HomeRepositoryInterface;
use App\Http\Resources\V1\Driver\DriverResources;
use App\Http\Controllers\Controller;
use Auth;
use JWTAuth;
use TymonJWTAuthExceptionsJWTException;
use Mail;

class HomeController extends Controller
{
    protected $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function checkMessage()
    {
        $data = $this->homeRepository->checkMessage();

        if($data == false){
            return response()->json(msgdata(not_acceptable(), trans('lang.no_message_found'), (object)[] ));

        }else{
            return response()->json(msgdata(success(), trans('lang.success'), $data));

        }

    }

}
