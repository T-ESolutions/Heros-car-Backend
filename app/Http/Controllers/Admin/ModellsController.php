<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\ModellRequest;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modell;
use Illuminate\Support\Facades\File;


class ModellsController extends Controller
{
    protected $viewPath = 'admin.pages.modells';
    private $route = 'admin.modells';

    public function index($id)
    {
        $brand = Brand::whereId($id)->first();
        return view($this->viewPath . '.index', compact('id', 'brand'));
    }

    public function datatable($id)
    {

        $model = Modell::query()->where('brand_id', $id);
        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return '<a class="symbol symbol-50px"><span class="symbol-label" style="background-image:url(' . $row->image . ');"></span></a>';
            })
            ->addColumn('status', $this->viewPath . '.parts.active_btn')
            ->addColumn('actions', $this->viewPath . '.parts.action_buttons')
            ->rawColumns(['actions', 'image', 'status'])
            ->make();

    }

    public function create($id)
    {
        $brand = Brand::whereId($id)->first();
        return view($this->viewPath . '.create', compact('id', 'brand'));
    }

    public function store(ModellRequest $request)
    {
        $data = $request->validated();
        Modell::create($data);
        session()->flash('success', 'تم الاضافة بنجاح');
        return redirect()->route($this->route, ['id' => $data['brand_id']]);
    }


    public function edit($id)
    {

        $row = Modell::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        $id = $row->brand_id;

        $brand = Brand::whereId($id)->first();
        return view($this->viewPath . '.edit', compact('row', 'id', 'brand'));
    }

    public function update(ModellRequest $request)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $img_name = upload($data['image'], 'modells');
            $data['image'] = $img_name;
        }
        Modell::whereId($data['id'])->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route($this->route, ['id' => $data['brand_id']]);
    }

    public function changeActive(Request $request)
    {
        $data['active'] = $request->status;
        Modell::where('id', $request->id)->update($data);
        return 1;
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:modells,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return response()->json(['message' => 'Failed']);
        }

        $row = Modell::where('id', $request->row_id)->first();
//        if (!empty($row->getOriginal('image'))){
//            unlink($row->getOriginal('image'), 'modells');
//        }

//        if (File::exists('uploads/modells/' . $row->image)) {
//            unlink('uploads/modells/' . $row->image);
//        }
        $row->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return response()->json(['message' => 'Success']);
    }


}
