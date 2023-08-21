<?php

namespace App\Http\Controllers\Api\V1\app;

use App\Http\Resources\V1\User\PageDetailsResources;
use App\Http\Resources\V1\User\ScreenResources;
use App\Http\Resources\V1\User\PagesResources;
use App\Http\Resources\V1\LinksResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Screen;
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


}
