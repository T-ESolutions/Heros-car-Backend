<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\BrandRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    protected $viewPath = 'admin.pages.brands';
    private $route = 'admin.brands';

    public function index()
    {
        return view($this->viewPath . '.index');
    }

    public function datatable()
    {

        $model = Brand::query();
        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return '<a class="symbol symbol-50px"><span class="symbol-label" style="background-image:url(' . $row->image . ');"></span></a>';
            })
            ->addColumn('status', $this->viewPath . '.parts.active_btn')
            ->addColumn('modell', $this->viewPath . '.parts.modell_btn')
            ->addColumn('actions', $this->viewPath . '.parts.action_buttons')
            ->rawColumns(['actions', 'image', 'status','modell'])
            ->make();

    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(BrandRequest $request)
    {
        $data = $request->validated();
        Brand::create($data);
        session()->flash('success', 'تم الاضافة بنجاح');
        return redirect()->route($this->route);
    }


    public function edit($id)
    {

        $row = Brand::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        return view($this->viewPath . '.edit', compact('row'));
    }

    public function update(BrandRequest $request)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $img_name = upload($data['image'], 'brands');
            $data['image'] = $img_name;
        }
        Brand::whereId($data['id'])->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route($this->route);
    }

    public function changeActive(Request $request)
    {
        $data['active'] = $request->status;
        Brand::where('id', $request->id)->update($data);
        return 1;
    }


}
