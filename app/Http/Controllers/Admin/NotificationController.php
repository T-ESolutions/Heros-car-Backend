<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{


    public function create()
    {
        $users = User::orderBy('id', 'desc')->select('id', 'name', 'phone')->get();
        return view('admin.pages.notifications.create',
            compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_ar' => 'required',
            'body_ar' => 'required',
            'title_en' => 'required',
            'body_en' => 'required',
            'user_id' => 'sometimes',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $user_tokens = [];
        if (isset($request->user_id) && sizeof($request->user_id) > 0) {
            foreach ($request->user_id as $user_id) {
                $data = [
                    'title_ar' => $request->title_ar,
                    'body_ar' => $request->body_ar,
                    'title_en' => $request->title_en,
                    'body_en' => $request->body_en,
                    'user_id' => $user_id,
                ];
                $user_token = User::whereId($request->user_id[0])->select('fcm_token')->first()->fcm_token;
                if (!empty($user_token) && $user_token != Null) {
                    array_push($user_tokens, $user_token);
                }
            }
        } else {
            $users = User::whereSuspend(0)->whereActive(1)->whereNotNull('fcm_token')
                ->select('id', 'fcm_token')->get();
            foreach ($users as $user) {
                $data = [
                    'title_ar' => $request->title_ar,
                    'body_ar' => $request->body_ar,
                    'title_en' => $request->title_en,
                    'body_en' => $request->body_en,
                    'user_id' => $user->id,
                ];
                if (!empty($user_token) && $user_token != Null) {
                    array_push($user_tokens, $user->fcm_token);
                }
            }
        }
        send($user_tokens, $request->title_ar, $request->body_ar, $request->model_type, $data);

        session()->flash('success', 'تم الإضافة بنجاح');
        return redirect()->back();
    }


}
