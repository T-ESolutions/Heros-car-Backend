<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class OrdersController extends Controller
{
    public function index()
    {
        return view('admin.pages.orders.index');
    }

    public function getData()
    {
        $auth = Auth::guard('admin')->user();
        $model = Order::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('provider', function ($row) {
                if ($row->provider) {
                    return '<div class="d-flex align-items-center">
                        <div class="symbol symbol-45px me-5">
                            <img src="' . $row->provider->image . '" alt="">
                        </div>
                        <div class="d-flex justify-content-start flex-column">
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">' . $row->provider->name . '</a>
                            <span style="direction: ltr;"  class="text-muted fw-bold text-muted d-block fs-7">' . $row->provider->user_phone . '</span>
                        </div>
                    </div>';
                } else {
                    return "";
                }
            })
            ->addColumn('user', function ($row) {
                if ($row->user) {
                    return '<div class="d-flex align-items-center">
                        <div class="symbol symbol-45px me-5">
                            <img src="' . $row->user->image . '" alt="">
                        </div>
                        <div class="d-flex justify-content-start flex-column">
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">' . $row->user->name . '</a>
                            <span style="direction: ltr;" class="text-muted fw-bold text-muted d-block fs-7">' . $row->user->user_phone . '</span>
                        </div>
                    </div>';
                } else {
                    return "";
                }
            })
            ->addColumn('selected_status', function ($row) {
                if ($row->selected_status) {
                    return $row->selected_status->title_ar;
                } else {
                    return "---";
                }
            })
            ->addColumn('actions', function ($row) use ($auth) {
                $buttons = '';
                $buttons .= '<a href="' . route('admin.orders.details', [$row->id]) . '" class="btn btn-warning btn-circle btn-sm m-1" title="عرض بيانات الطلب">
                            <i class="fa fa-eye"></i>
                        </a>';

                return $buttons;
            })
            ->rawColumns(['actions', 'provider', 'user', 'selected_status'])
            ->make();

    }

    public function details($id)
    {

        $row = Order::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الطلب غير موجود');
            return redirect()->back();
        }
        return view('admin.pages.orders.details', compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:orders,id',
            'title_ar' => 'required',
            'title_en' => 'required',
            'is_drop_off' => 'required|in:0,1',
            'price' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $row = Order::whereId($request->row_id)->first();
        $row->update($request->except('row_id', '_token', 'image'));
        if ($request->has('image') && is_file($request->image)) {
            $row->update(['image' => $request->image]);
        }
        $row->save();

        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.orders');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:orders,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return response()->json(['message' => 'Failed']);
        }

        $row = Order::where('id', $request->row_id)->first();
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
        $row = Order::where('id', $id)->first();
//        if (!empty($city->getOriginal('image'))){
//            unlinkFile($city->getOriginal('image'), 'cities');
//        }
        return $row->delete();
    }


}
