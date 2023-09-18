@extends('admin.index')

@section('style')
@endsection

@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center fw-bolder fs-3 my-1" style="color: #F48120">
                        تعديل وجبة الباقة
                    </h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.package-meals',[$package_id])}}" class="text-muted text-hover-primary">وجبات الباقات</a>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('home')}}" class="text-muted text-hover-primary">الرئيسية</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Form-->
                <form action="{{route('admin.package-meals.update')}}" method="post" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" >
                @csrf
                    <input type="hidden" name="row_id" value="{{$row->id}}">
                <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">
                        <!--begin::week-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>اختر الاسبوع</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select name="week" required class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="إختر الحالة" id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    <option value="1" {{$row->week == 1 ? "selected" : ""}}>الاسبوع الاول</option>
                                    <option value="2" {{$row->week == 2 ? "selected" : ""}}>الاسبوع الثاني</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                            {{--                                <div class="text-muted fs-7">Set the product status.</div>--}}
                            <!--end::Description-->
                                <!--begin::Datepicker-->
                            {{--                                <div class="d-none mt-10">--}}
                            {{--                                    <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>--}}
                            {{--                                    <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time" />--}}
                            {{--                                </div>--}}
                            <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::week-->

                        <!--begin::day-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>اختر اليوم</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select name="day" required class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="إختر الحالة" id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    <option value="Saturday" {{$row->day == "Saturday" ? "selected" : ""}}>السبت</option>
                                    <option value="Sunday" {{$row->day == "Sunday" ? "selected" : ""}}>الاحد</option>
                                    <option value="Monday" {{$row->day == "Monday" ? "selected" : ""}}>الاثنين</option>
                                    <option value="Tuesday" {{$row->day == "Tuesday" ? "selected" : ""}}>الثلاثاء</option>
                                    <option value="Wednesday" {{$row->day == "Wednesday" ? "selected" : ""}}>الاربعاء</option>
                                    <option value="Thursday" {{$row->day == "Thursday" ? "selected" : ""}}>الخميس</option>
                                    <option value="Friday" {{$row->day == "Friday" ? "selected" : ""}}>الجمعة</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                            {{--                                <div class="text-muted fs-7">Set the product status.</div>--}}
                            <!--end::Description-->
                                <!--begin::Datepicker-->
                            {{--                                <div class="d-none mt-10">--}}
                            {{--                                    <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>--}}
                            {{--                                    <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time" />--}}
                            {{--                                </div>--}}
                            <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::day-->

                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
{{--                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">--}}
{{--                            <!--begin:::Tab item-->--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link text-active-warning pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">بيانات البيانات الوجبة للباقة</a>--}}
{{--                            </li>--}}
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>--}}
                        {{--                            </li>--}}
                        <!--end:::Tab item-->
{{--                        </ul>--}}
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>بيانات وجبة الباقة</h2>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">

                                            <div class="card-body pt-0">

                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root ">
                                                        <!--begin::Label-->
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <label class="required form-label">اختر الباقة</label>
                                                                <!--end::Label-->
                                                                <!--begin::Select2-->
                                                                <select class="form-select mb-2" name="package_id" data-control="select2" data-hide-search="false" data-placeholder="إختر الباقة">
                                                                    @foreach($packages as $key => $package)
                                                                        <option value="{{$package->id}}" {{$package->id == $row->package_id ? 'selected' : ''}}>{{$package->title_ar}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!--end::Select2-->
                                                            </div>
                                                        </div>

                                                        <!--begin::Description-->
                                                    {{--                                                    <div class="text-muted fs-7">Set the product tax class.</div>--}}
                                                    <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>

                                                <br>

                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root ">
                                                        <!--begin::Label-->
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <label class="required form-label">إختر نوع الباقة</label>
                                                                <!--end::Label-->
                                                                <!--begin::Select2-->
                                                                <!--begin::Input-->
                                                                <select name="main_package_type_id" required
                                                                        class="main_package_type_id form-select mb-2" data-control="select2"
                                                                        data-hide-search="false"
                                                                        data-placeholder="إختر نوع الباقة">
                                                                    <option></option>
                                                                    @foreach($package_types as $key => $package_type)
                                                                        <option
                                                                            value="{{$package_type->id}}" {{$package_type->id == $row->package_type_id ? "selected" : ""}}>{{$package_type->title_ar}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!--end::Select2-->
                                                            </div>
                                                        </div>

                                                        <!--begin::Description-->
                                                    {{--                                                    <div class="text-muted fs-7">Set the product tax class.</div>--}}
                                                    <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <label class="required form-label">إختر  النوع الفرعي</label>
                                                        <!--end::Label-->
                                                        <!--begin::Select2-->
                                                        <!--begin::Input-->
                                                        <select name="package_type_id" required
                                                                class="sub_type_id form-control mb-2"
                                                                data-control="" data-hide-search="false"
                                                                data-placeholder="إختر النوع الفرعي">
                                                            <option></option>
                                                            @foreach($sub_types as $key => $sub_type)
                                                                <option
                                                                    value="{{$sub_type->id}}" {{$sub_type->id == $row->package_type_id ? 'selected' : ''}}>{{$sub_type->title_ar}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--end::Select2-->
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="d-flex flex-wrap gap-5">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root ">
                                                        <!--begin::Label-->
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <label class="required form-label">إختر الفترة</label>
                                                                <!--end::Label-->
                                                                <!--begin::Select2-->
                                                                <!--begin::Input-->
                                                                <select name="meal_type_id" required class="meal_type_id form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="إختر الفترة" >
                                                                    @foreach($meal_types as $key => $meal_type)
                                                                        <option value="{{$meal_type->id}}" {{$meal_type->id == $row->meal_type_id ? 'selected' : ''}}>{{$meal_type->title_ar}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!--end::Select2-->
                                                            </div>
                                                        </div>

                                                        <!--begin::Description-->
                                                    {{--                                                    <div class="text-muted fs-7">Set the product tax class.</div>--}}
                                                    <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>

                                                <br>

                                                <!--begin::Label-->
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <label class="required form-label">إختر الوجبة</label>
                                                        <!--end::Label-->
                                                        <!--begin::Select2-->
                                                        <!--begin::Input-->
                                                        <select name="meal_id" required class="meal_id form-control mb-2" data-control="" data-hide-search="false" data-placeholder="إختر الوجبة" >
                                                            @foreach($meals as $key => $meal)
                                                                <option value="{{$meal->id}}" {{$meal->id == $row->meal_id ? 'selected' : ''}}>{{$meal->title_ar}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--end::Select2-->
                                                    </div>
                                                </div>

                                                <!--begin::Description-->


                                            </div>

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->

                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('admin.package-meals',[$package_id])}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">عودة</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-secondary">
                                <span class="indicator-label">حفظ</span>
                                <span class="indicator-progress">إنتظر قليلا . . .
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

@endsection



@section('script')

    <script>
        $(document).on('change', '.main_package_type_id', function () {
            var package_type_id = $(this).val();
            if (package_type_id) {
                $.ajax({
                    type: "GET",
                    url: "{{asset('admin/package-type-prices/get/sub-types')}}?package_type_id=" + package_type_id,
                    success: function (res) {
                        if (res) {
                            console.log(res);
                            $(".sub_type_id").empty();
                            $.each(res, function (key, value) {
                                $(".sub_type_id").append('<option value="' + value.id + '" >' + value.title_ar + '</option>');
                            });
                        }

                    }
                });
            }
        });

    </script>

    <script>
        $(document).on('change', '.meal_type_id', function () {
            var meal_type_id = $(this).val();
            if(meal_type_id){
                $.ajax({
                    type:"GET",
                    url:"{{asset('admin/package-meals/get/meals')}}?meal_type_id="+meal_type_id,
                    success:function(res){
                        if(res){
                            console.log(res);
                            $(".meal_id").empty();
                            $.each(res,function(key,value){
                                $(".meal_id").append('<option value="'+value.id+'" >'+value.title_ar+'</option>');
                            });
                        }

                    }
                });
            }
        });

    </script>
@endsection

