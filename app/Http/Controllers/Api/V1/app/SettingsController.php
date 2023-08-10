<?php

namespace App\Http\Controllers\Api\V1\App;

use App\Http\Resources\V1\User\PageDetailsResources;
use App\Http\Resources\V1\User\ModellsResources;
use App\Http\Resources\V1\User\BrandsResources;
use App\Http\Resources\V1\User\ScreenResources;
use App\Http\Resources\V1\User\PagesResources;
use App\Http\Resources\V1\User\ServicesResources;
use App\Http\Resources\V1\User\YearsResources;
use App\Http\Resources\CancelReasonResources;
use App\Http\Resources\LinksResources;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\CancelReason;
use App\Models\ModellYear;
use App\Models\Screen;
use App\Models\Modell;
use App\Models\Brand;
use App\Models\Link;
use App\Models\Page;
use TymonJWTAuthExceptionsJWTException;
use JWTAuth;
use Auth;

class SettingsController extends Controller
{
    public function settings(Request $request)
    {
        $settings = Setting::get();
//        $screens = (ScreenResources::collection($screens));
        return response()->json(msgdata(success(), trans('lang.success'), $settings));
    }

    public function customSettings(Request $request, $key)
    {
        $key = $key . '_' . $request->header('lang');
        $data = Setting::where('key', $key)->first()->value;
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }


    public function pages()
    {
        $pages = Page::get();
        $data = (PagesResources::collection($pages));
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function pageDetails(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $data = (new PageDetailsResources($page));
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function cancelReasons(Request $request)
    {
        $data = CancelReason::active()->where('type', $request->type)->paginate(pagination_number());
        $data = (CancelReasonResources::collection($data))->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function links(Request $request)
    {
        $data = Link::all();
        $data = LinksResources::collection($data);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function screens()
    {
        $screens = Screen::get();
        $screens = (ScreenResources::collection($screens));
        return response()->json(msgdata(success(), trans('lang.success'), $screens));
    }

    public function brands()
    {
        $screens = Brand::active()->get();
        $screens = (BrandsResources::collection($screens));
        return response()->json(msgdata(success(), trans('lang.success'), $screens));
    }

    public function services()
    {
        $services = Service::active()->orderBy('id', 'asc')->get();
        $data = (ServicesResources::collection($services));
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function modells(Request $request)
    {
        $screens = Modell::active()->where('brand_id', $request->brand_id)->get();
        $screens = (ModellsResources::collection($screens));
        return response()->json(msgdata(success(), trans('lang.success'), $screens));
    }

    public function years(Request $request)
    {
        $screens = ModellYear::where('modell_id', $request->modell_id)->get();
        $screens = (YearsResources::collection($screens));
        return response()->json(msgdata(success(), trans('lang.success'), $screens));
    }
}
