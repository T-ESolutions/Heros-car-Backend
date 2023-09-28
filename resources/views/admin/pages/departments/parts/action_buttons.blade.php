
    <a href="{{route('admin.departments.edit',$id)}}" class="btn btn-primary btn-circle btn-sm m-1" title="تعديل">
        <i class="fa fa-edit"></i>
    </a>
    @if($parent_id == null)
    <a  href="{{route('admin.departments.show',$id)}}"  class="btn btn-warning btn-sm btn-circle m-1" data-id="{{$id}}"  title="التفاصيل الداخلية">
        <i class="fa fa-eye"></i>
    </a>
    @endif

{{--    <a class="btn btn-danger btn-sm delete btn-circle m-1" data-id="{{$id}}"  title="حذف">--}}
{{--        <i class="fa fa-trash"></i>--}}
{{--    </a>--}}

