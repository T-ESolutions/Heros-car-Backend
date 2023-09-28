<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\DepartmentRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    protected $viewPath = 'admin.pages.departments';
    private $route = 'admin.departments';

    public function index()
    {
        return view($this->viewPath . '.index');
    }

    public function datatable($id = null)
    {

        $model = Department::query()->where('parent_id', $id);

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return '<a class="symbol symbol-50px"><span class="symbol-label" style="background-image:url(' . $row->image . ');"></span></a>';
            })
            ->editColumn('active', function ($row) {
                if ($row->active == 1) {
                    return "<b class='badge badge-success'>مفعل</b>";
                } else {
                    return "<b class='badge badge-danger'>غير مفعل</b>";
                }
            })
            ->addColumn('status', $this->viewPath . '.parts.active_btn')
            ->addColumn('actions', $this->viewPath . '.parts.action_buttons')
            ->rawColumns(['actions', 'image', 'active', 'status'])
            ->make();

    }


    public function edit($id)
    {

        $row = Department::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        return view($this->viewPath . '.edit', compact('row'));
    }

    public function show($id)
    {
        return view($this->viewPath . '.index',compact('id'));
    }

    public function update(DepartmentRequest $request)
    {

        $data = $request->validated();

        if (isset($data['image'])) {
            $img_name = upload($data['image'], 'department');
            $data['image'] = $img_name;
        }
        Department::whereId($data['id'])->update($data);
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
