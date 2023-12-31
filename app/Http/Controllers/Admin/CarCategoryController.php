<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarCategory;
use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Yajra\DataTables\Facades\DataTables;

class CarCategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.car_categories.index');
    }

    public function create()
    {
        return view('admin.pages.car_categories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_ar' => 'required',
            'title_en' => 'required',
            'active' => 'required|in:0,1',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $row = new CarCategory();
        $row->title_ar = $request->title_ar;
        $row->title_en = $request->title_en;
        $row->active = $request->active;
        $row->save();
        session()->flash('success', 'تم الإضافة بنجاح');
        return redirect()->route('admin.car-categories');
    }

    public function edit($id)
    {

        $row = CarCategory::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        return view('admin.pages.car_categories.edit', compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:car_categories,id',
            'title_ar' => 'required',
            'title_en' => 'required',
            'active' => 'required|in:0,1',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $row = CarCategory::whereId($request->row_id)->first();
        $row->update($request->except('row_id', '_token', 'image'));

        $row->save();

        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.car-categories');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:car_categories,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return response()->json(['message' => 'Failed']);
        }

        $row = CarCategory::where('id', $request->row_id)->first();
//        if (!empty($city->getOriginal('image'))){
//            unlinkFile($city->getOriginal('image'), 'cities');
//        }
        $row->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return response()->json(['message' => 'Success']);
    }

    public function deleteMulti(Request $request)
    {
        $ids_array = explode(',', $request->ids);
        foreach ($ids_array as $id) {
            $delete = $this->destroy($id);
            if (!$delete) {
                session()->flash('success', 'حدث خطأ ما');
                return redirect()->back();
            }
        }
        session()->flash('success', 'تم الحذف بنجاح');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $row = CarCategory::where('id', $id)->first();

        return $row->delete();
    }

    public function getData()
    {
        $auth = Auth::guard('admin')->user();
        $model = CarCategory::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('active', function ($row) {
                if ($row->active == 1) {
                    return "<b class='badge badge-success'>مفعل</b>";
                } else {
                    return "<b class='badge badge-danger'>غير مفعل</b>";
                }
            })
            ->addColumn('actions', function ($row) use ($auth) {
                $buttons = '';
//                if ($auth->can('sliders.update')) {
                $buttons .= '<a href="' . route('admin.car-categories.edit', [$row->id]) . '" class="btn btn-primary btn-circle btn-sm m-1" title="تعديل">
                            <i class="fa fa-edit"></i>
                        </a>';
//                }
//                if ($auth->can('sliders.delete')) {
                $buttons .= '<a class="btn btn-danger btn-sm delete btn-circle m-1" data-id="' . $row->id . '"  title="حذف">
                            <i class="fa fa-trash"></i>
                        </a>';
//                }
                return $buttons;
            })
            ->rawColumns(['actions', 'active'])
            ->make();

    }
}
