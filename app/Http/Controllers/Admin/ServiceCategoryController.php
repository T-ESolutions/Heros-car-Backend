<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarCategory;
use App\Models\Modell;
use App\Models\ModellYear;
use App\Models\Order;
use App\Models\Screen;
use App\Models\Service;
use App\Models\ServiceCarCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Yajra\DataTables\Facades\DataTables;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.service_car_categories.index');
    }

    public function create()
    {
        $services = Service::Active()->get();
        $car_categories = CarCategory::Active()->get();
        $brands = Brand::Active()->get();


        return view('admin.pages.service_car_categories.create',
            compact('services', 'car_categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'car_category_id' => 'required|exists:car_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'modell_id' => 'required|exists:modells,id',
            'year_id' => 'required|exists:modell_years,id',
            'price' => 'required|numeric',
            'price_km' => 'required|numeric',
            'free_km' => 'required|numeric',
            'vat' => 'required|numeric',


        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $row = new ServiceCarCategory();
        $row->service_id = $request->service_id;
        $row->car_category_id = $request->car_category_id;
        $row->brand_id = $request->brand_id;
        $row->modell_id = $request->modell_id;
        $row->year_id = $request->year_id;
        $row->price = $request->price;
        $row->price_km = $request->price_km;
        $row->free_km = $request->free_km;
        $row->vat = $request->vat;
        $row->save();
        session()->flash('success', 'تم الإضافة بنجاح');
        return redirect()->route('admin.service-car-categories');
    }

    public function edit($id)
    {

        $row = ServiceCarCategory::where('id', $id)->first();
        $services = Service::Active()->get();
        $car_categories = CarCategory::Active()->get();
        $brands = Brand::Active()->get();
        $modells = Modell::where('brand_id',$row->brand_id)->get();
        $years = ModellYear::where('modell_id',$row->modell_id)->get();


        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        return view('admin.pages.service_car_categories.edit',
            compact('row','services', 'car_categories', 'brands','modells','years'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:service_car_categories,id',
            'service_id' => 'required|exists:services,id',
            'car_category_id' => 'required|exists:car_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'modell_id' => 'required|exists:modells,id',
            'year_id' => 'required|exists:modell_years,id',
            'price' => 'required|numeric',
            'price_km' => 'required|numeric',
            'free_km' => 'required|numeric',
            'vat' => 'required|numeric',


        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $row = ServiceCarCategory::whereId($request->row_id)->first();
        $row->update($request->except('row_id', '_token'));
        $row->save();

        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.service-car-categories');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:service_car_categories,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return response()->json(['message' => 'Failed']);
        }

        $row = ServiceCarCategory::where('id', $request->row_id)->first();
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
        $row = ServiceCarCategory::where('id', $id)->first();

        return $row->delete();
    }

    public function getData()
    {
        $auth = Auth::guard('admin')->user();
        $model = ServiceCarCategory::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('price', function ($row) {
                return $row->price;
            })
            ->editColumn('price_km', function ($row) {
                return $row->price_km;
            })
            ->editColumn('free_km', function ($row) {
                return $row->free_km;
            })
            ->editColumn('vat', function ($row) {
                return $row->vat;
            })
            ->editColumn('service', function ($row) {
                return $row->service->title_ar;
            })
            ->editColumn('car_category', function ($row) {
                return $row->car_category->title_ar;
            })
            ->editColumn('brand', function ($row) {
                return $row->brand->title_ar;
            })
            ->editColumn('modell', function ($row) {
                return $row->modell->title_ar;
            })
            ->editColumn('year', function ($row) {
                return $row->year->year;
            })
            ->addColumn('actions', function ($row) use ($auth) {
                $buttons = '';
//                if ($auth->can('sliders.update')) {
                $buttons .= '<a href="' . route('admin.service-car-categories.edit', [$row->id]) . '" class="btn btn-primary btn-circle btn-sm m-1" title="تعديل">
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
            ->rawColumns(['actions',])
            ->make();

    }


    public function modellData(Request $request)
    {

        if (isset($request->brand_id)) {

            $modells = Modell::orderBy('id', 'desc')->where('brand_id', $request->brand_id)
                ->get();
            return response()->json($modells);

        }
        return response()->json([]);
    }

    public function yearData(Request $request)
    {

        if (isset($request->modell_id)) {

            $modells = ModellYear::orderBy('id', 'desc')->where('modell_id', $request->modell_id)
                ->get();
            return response()->json($modells);

        }
        return response()->json([]);
    }
}
