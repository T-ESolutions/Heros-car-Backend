<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\ProfileUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

}
