<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\V1\Admin\ColorRequest;
use App\Models\Screen;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorsController extends Controller
{
    protected $viewPath = 'admin.pages.colors';
    private $route = 'admin.colors';

    public function index()
    {
        return view($this->viewPath . '.index');
    }

    public function datatable()
    {

        $model = Color::query();
        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('actions', $this->viewPath . '.parts.action_buttons')
            ->rawColumns(['actions'])
            ->make();

    }

    public function create()
    {
        return view($this->viewPath . '.create');
    }

    public function store(ColorRequest $request)
    {
        $data = $request->validated();
        Color::create($data);
        session()->flash('success', 'تم الاضافة بنجاح');
        return redirect()->route($this->route);
    }


    public function edit($id)
    {

        $row = Color::where('id', $id)->first();
        if (!$row) {
            session()->flash('error', 'الحقل غير موجود');
            return redirect()->back();
        }
        return view($this->viewPath . '.edit', compact('row'));
    }

    public function update(ColorRequest $request)
    {
        $data = $request->validated();
        Color::whereId($data['id'])->update($data);
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route($this->route);
    }


    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'row_id' => 'required|exists:colors,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return response()->json(['message' => 'Failed']);
        }

        $row = Color::where('id', $request->row_id)->first();
//        if (!empty($city->getOriginal('image'))){
//            unlinkFile($city->getOriginal('image'), 'cities');
//        }
        $row->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return response()->json(['message' => 'Success']);
    }


}
