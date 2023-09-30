<?php

namespace App\Http\Controllers\Admin;

use App\Models\MealType;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function index($type)
    {
        return view('admin.pages.pages.index', compact('type'));
    }

    public function create($type)
    {
        return view('admin.pages.pages.create', compact('type'));
    }


    public function edit($type, $target_type)
    {

        $row = Page::where('type', $type)
            ->where('target_type', $target_type)
            ->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        return view('admin.pages.pages.edit', compact('row', 'type'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:pages,id',
            'body_ar' => 'required',
            'body_en' => 'required',
            'image' => 'sometimes|image|mimes:png,jpg,jpeg',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

//        if ($request->has('image') && is_file($request->image)){
//            if (!empty($city->getOriginal('image'))){
//                unlinkFile($city->getOriginal('image'), 'cities');
//            }
//        }
        $row = Page::whereId($request->row_id)->first();
        $row->update($request->except('row_id', '_token', 'image', 'type', 'target_type'));
        if ($request->has('image') && is_file($request->image)) {
            $row->update(['image' => $request->image]);
        }
        $row->save();

        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.pages.edit', [$row->type, $row->target_type]);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:meal_types,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return response()->json(['message' => 'Failed']);
        }

        $row = MealType::where('id', $request->row_id)->first();
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
        $row = MealType::where('id', $id)->first();
//        if (!empty($city->getOriginal('image'))){
//            unlinkFile($city->getOriginal('image'), 'cities');
//        }
        return $row->delete();
    }

    public function getData($type)
    {
        $auth = Auth::guard('admin')->user();
        $model = Page::query()->where('type', $type);

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return '<a class="symbol symbol-50px"><span class="symbol-label" style="background-image:url(' . $row->image . ');"></span></a>';
            })
//            ->addColumn('select',function ($row){
//                return '<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
//                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="'.$row->id.'" />
//                                    </div>';
//            })
            ->addColumn('actions', function ($row) use ($auth) {
                $buttons = '';
//                if ($auth->can('sliders.update')) {
                $buttons .= '<a href="' . route('admin.meal-types.edit', [$row->id]) . '" class="btn btn-primary btn-circle btn-sm m-1" title="تعديل">
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
            ->rawColumns(['actions', 'image'])
            ->make();

    }
}
