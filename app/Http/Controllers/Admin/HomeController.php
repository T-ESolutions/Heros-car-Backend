<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;

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
