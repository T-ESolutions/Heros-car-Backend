<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\ChangePasswordRequest;
use App\Http\Requests\V1\Admin\ForgetChangePasswordRequest;
use App\Http\Requests\V1\Admin\ProfileUpdateRequest;
use App\Models\Admin;
use App\Models\Host;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        $row = Admin::where('id', \auth('admin')->user()->id)->first();
        return view('admin.pages.profile.index', compact('row'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            $img_name = upload($data['image'], 'admin');
            $data['image'] = $img_name;
        }
        Admin::whereId(\auth('admin')->user()->id)->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->back();
    }

    public function changePasswordPage()
    {
        return view('admin.pages.profile.change_password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->validated();
        $admin = Admin::whereId(auth('admin')->id())->first();

        if (\Hash::check($data['current_password'], $admin->password)) {
            $admin->password = $data['password'];
            $admin->save();
            session()->flash('success', 'تم التعديل بنجاح');
            return redirect()->back();
        } else {
            session()->flash('error', 'كلمة المرور الحالية غير صحيحة');
            return redirect()->back();
        }
    }

    public function sendSms()
    {
        if (config('app.env') == 'local') {
            $code = 9999;
        } else {
            $code = $token = rand(1000, 9999);
        }
        $phone = auth('admin')->user()->phone;
        DB::table('password_resets')->insert([
            'email' => $phone,
            'token' => $code,
            'created_at' => Carbon::now()
        ]);

        //TODO : SMS validation integration here ...

        //        Mail::send('email.forgetPassword', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
        //            $message->to($request->email);
        //            $message->subject('Reset Password');
        //        });
        return response()->json(['success' => true, 'status' => 200, 'msg' => trans('lang.code_resend_s')]);
    }

    public function checkCode(Request $request)
    {
        return response()->json(['success' => true, 'status' => 200, 'result' => 'here']);

        $phone =  auth('admin')->user()->phone;
        $exists_code = PasswordReset::where([
            'email' => $phone,
            'token' => $request->code,
        ])->first();
        if ($exists_code) {
            $exists_code->delete();
            return response()->json(['success' => true, 'status' => 200, 'result' => $exists_code]);
        } else {
            return response()->json(['success' => false, 'status' => 400, 'msg' => trans('lang.incorrect_code')]);
        }
    }

    public function forgetPasswordChangePassword(ForgetChangePasswordRequest $request)
    {
        $data = $request->validated();
        $host = Admin::whereId(auth('admin')->id())->first();
        $host->password = $data['password'];
        $host->save();
        return response()->json(['success' => true, 'status' => 200, 'msg' => trans('lang.password_changed_s')]);

    }


}
