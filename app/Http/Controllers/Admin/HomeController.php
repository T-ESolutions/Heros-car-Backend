<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale('ar');
        $statuses= [];
        $data= [];
        return view('admin.pages.home',compact('statuses','data'));
    }

}
