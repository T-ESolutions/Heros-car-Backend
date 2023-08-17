<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 12/06/2019
 * Time: 08:32 ص
 */

namespace App\Http\Controllers\Eloquent\V1\User;


use App\Http\Controllers\Interfaces\V1\User\HelperRepositoryInterface;
use App\Models\Department;
use App\Models\Page;
use App\Models\Setting;

class HelperRepository implements HelperRepositoryInterface
{
    public function pages($request)
    {
        $page = Page::where('type', $request->page)->first();
        return $page;
    }

    public function departments()
    {
        $data = Department::parent()->active()->get();
        return $data;
    }

    public function userTrip()
    {
        $data = Setting::where('key', 'user_trip_terms_' . app()->getLocale())->first();
        return $data;
    }

    public function socialMedia()
    {
        $values = [
            'whatsapp',
            'facebook',
            'twitter',
            'instagram',
            'snapchat',
            'youtube',
        ];
        $data = Setting::whereIn('key', $values)->get();
        return $data;
    }

}
