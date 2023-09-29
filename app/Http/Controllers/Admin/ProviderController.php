<?php

namespace App\Http\Controllers\Admin;


use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{
    public function index()
    {
        return view('admin.pages.providers.index');
    }


    public function create()
    {
        return view('admin.pages.providers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required|in:fixed,percent',
            'amount' => 'required|numeric|min:1',
            'min_order_total' => 'required|numeric|min:1',
            'expired_at' => 'required',
            'user_id' => 'sometimes',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $row = Driver::create([
            'code' => $request->code,
            'type' => $request->type,
            'amount' => $request->amount,
            'min_order_total' => $request->min_order_total,
            'expired_at' => $request->expired_at,
        ]);
        if(sizeof($request->user_id) > 0){
            foreach ($request->user_id as $user_id){
                Driver::create([
                    'user_id' => $user_id ,
                    'coupon_id' => $row->id ,
                    'used' => 0,
                ]);
            }
        }
            session()->flash('success', 'تم الإضافة بنجاح');
        return redirect()->route('admin.users');
    }

    public function edit($id)
    {
        $row = Driver::where('id',$id)->first();
        if (!$row){
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        return view('admin.pages.providers.edit',compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:users,id',
            'active' => 'required|in:0,1',
            'suspend' => 'required|in:0,1',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

//        if ($request->has('image') && is_file($request->image)){
//            if (!empty($city->getOriginal('image'))){
//                unlinkFile($city->getOriginal('image'), 'cities');
//            }
//        }
        $row = Driver::whereId($request->row_id)->first();
        $row->update(['active' => $request->active , 'suspend' => $request->suspend]);
        $row->save();

        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.users');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:coupons,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return response()->json(['message' => 'Failed']);
        }

        $row = Driver::where('id',$request->row_id)->first();
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
            $delete =$this->destroy($id);
            if (!$delete){
                session()->flash('success', 'حدث خطأ ما');
                return redirect()->back();
            }
        }
        session()->flash('success', 'تم الحذف بنجاح');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $row = Driver::where('id',$id)->first();
//        if (!empty($city->getOriginal('image'))){
//            unlinkFile($city->getOriginal('image'), 'cities');
//        }
        return $row->delete();
    }

    public function getData()
    {
        $auth = Auth::guard('admin')->user();
        $model = Driver::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('image',function ($row){
                return '<a class="symbol symbol-50px"><span class="symbol-label" style="background-image:url('.$row->image.');"></span></a>';
            })
            ->editColumn('active',function ($row){
                if ($row->active == 1){
                    return "<b class='badge badge-success'>مفعل</b>";
                }else{
                    return "<b class='badge badge-danger'>غير مفعل</b>";
                }
            })
            ->editColumn('suspend',function ($row){
                if ($row->suspend == 1){
                    return "<b class='badge badge-success'>موقوف</b>";
                }else{
                    return "<b class='badge badge-danger'>غير موقوف</b>";
                }
            })
            ->editColumn('created_at',function ($row){
                return Carbon::parse($row->created_at)->translatedFormat("Y-m-d (h:i) a");
            })
//            ->addColumn('select',function ($row){
//                return '<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
//                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="'.$row->id.'" />
//                                    </div>';
//            })
            ->addColumn('actions', function ($row) use ($auth){
                $buttons = '';
//                if ($auth->can('sliders.update')) {
                    $buttons .= '<a href="'.route('admin.users.edit',[$row->id]).'" class="btn btn-primary btn-circle btn-sm m-1" title="تعديل">
                            <i class="fa fa-edit"></i>
                        </a>';
//                }
//                if ($auth->can('sliders.delete')) {
                    $buttons .= '<a href="'.route('admin.users.orders',[$row->id]).'" class="btn btn-warning btn-sm btn-circle m-1" title="الطلبات">
                            <i class="fa fa-cart-plus"></i>
                        </a>';
//                }

                return $buttons;
            })
            ->rawColumns(['actions','active','suspend','created_at'])
            ->make();

    }


    public function userOrders($user_id)
    {
        $user_name = Driver::whereId($user_id)->select('name')->first()->name;
        return view('admin.pages.providers.orders',compact('user_id','user_name'));
    }

    public function getUserOrdersData($user_id)
    {
        $auth = Auth::guard('admin')->user();
        $model = Order::query()->orderBy('id','desc')->where('provider_id',$user_id);

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

}
