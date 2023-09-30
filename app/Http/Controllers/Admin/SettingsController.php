<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\DepartmentRequest;
use App\Http\Requests\V1\Admin\SettingsRequest;
use App\Models\Setting;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Department;

class SettingsController extends Controller
{
    protected $viewPath = 'admin.pages.settings';
    private $route = 'admin.settings';

    public function index()
    {
        return view($this->viewPath . '.index');
    }

    public function datatable()
    {

        $model = Setting::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return '<a class="symbol symbol-50px"><span class="symbol-label" style="background-image:url(' . $row->image . ');"></span></a>';
            })
            ->addColumn('actions', $this->viewPath . '.parts.action_buttons')
            ->rawColumns(['actions', 'image'])
            ->make();

    }


    public function edit($id)
    {

        $row = Setting::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
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
