<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\DepartmentRequest;
use App\Http\Requests\V1\Admin\SettingsRequest;
use App\Models\ContactUs;
use App\Models\Setting;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Department;

class ContactUsController extends Controller
{
    protected $viewPath = 'admin.pages.contact';
    private $route = 'admin.contact';

    public function index()
    {
        return view($this->viewPath . '.index');
    }

    public function datatable()
    {

        $model = ContactUs::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->diffForHumans();
            })
            ->addColumn('actions', $this->viewPath . '.parts.action_buttons')
            ->rawColumns(['actions'])
            ->make();

    }


    public function edit($id)
    {

        $row = ContactUs::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        $row->is_read = 1;
        $row->save();
        return view($this->viewPath . '.edit', compact('row'));
    }


    public function update(SettingsRequest $request)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $img_name = upload($data['image'], 'Settings');
            $data['image'] = $img_name;
        }
        Setting::whereId($data['id'])->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route($this->route);
    }

    public function changeActive(Request $request)
    {
        $data['active'] = $request->status;
        Department::where('id', $request->id)->update($data);
        return 1;
    }


}
