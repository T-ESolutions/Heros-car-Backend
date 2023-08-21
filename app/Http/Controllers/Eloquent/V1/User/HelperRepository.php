<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 12/06/2019
 * Time: 08:32 ص
 */

namespace App\Http\Controllers\Eloquent\V1\User;


use App\Http\Controllers\Interfaces\V1\User\HelperRepositoryInterface;
use App\Http\Resources\V1\User\BrandsResources;
use App\Http\Resources\V1\User\ModellsResources;
use App\Http\Resources\V1\User\SettingResources;
use App\Models\Brand;
use App\Models\ContactUs;
use App\Models\Department;
use App\Models\Modell;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class HelperRepository implements HelperRepositoryInterface
{
    public function pages($request)
    {
        return Page::where('type', $request->page)
            ->where('target_type', $request->target_type)
            ->first();
    }

    public function departments()
    {
        return Department::withoutParent()->get();
    }

    public function userTripTerms()
    {
        return Setting::where('key', 'user_trip_terms_' . app()->getLocale())->first();
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
        return Setting::whereIn('key', $values)->get();
    }

    public function contactUs($request)
    {
        return ContactUs::create($request->all());

    }

    public function brands()
    {
        $data =  Brand::active()->orderBy('id', 'desc')->paginate(20);
        $data = BrandsResources::collection($data)->response()->getData(true);
        return $data ;

    }

    public function modells($request)
    {
        $screens = Modell::active()->where('brand_id', $request['brand_id'])->get();
        $screens = (ModellsResources::collection($screens));
        return $screens ;

    }

}
