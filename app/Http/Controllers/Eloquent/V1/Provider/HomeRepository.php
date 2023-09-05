<?php

namespace App\Http\Controllers\Eloquent\V1\Provider;

use App\Http\Controllers\Interfaces\V1\Provider\HomeRepositoryInterface;
use App\Models\Driver;
use JWTAuth;
use Auth;


class HomeRepository implements HomeRepositoryInterface
{

    public function checkMessage()
    {
        $exists_car = Driver::where('id', auth()->user()->id)->first();
        if ($exists_car->message_ar) {
            if ($exists_car->message_is_seen != 1) {

                $exists_car->message_is_seen = 1;
                $exists_car->save();

                $array['message'] = $exists_car->message;
                $result = (object)$array;
                return $result;
            }
        }
        return false;
    }


}
