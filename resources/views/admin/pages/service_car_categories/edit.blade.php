@extends('layouts.app')

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
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center fw-bolder fs-3 my-1" style="color: #F48120">
                        إضافة شاشه ترحيبيه
                        <!--end::Description-->
                    </h1>
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.service-car-categories')}}" class="text-muted text-hover-primary">
                                خدمات انواع السيارات</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('home')}}" class="text-muted text-hover-primary">الرئيسية</a>
                        </li>
                    </ul>
                    <!--end::Title-->
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
                <form action="{{route('admin.service-car-categories.update')}}" method="post"
                      enctype="multipart/form-data"
                      class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10">
                @csrf
                <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">

                        <!--end::Thumbnail settings-->
                        <!--begin::Price-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>السعر</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="bi-currency-dollar w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <input type="number" required name="price" class="form-control mb-2"
                                       placeholder="السعر" value="{{$row->price}}"/>

                                <input type="hidden" required name="row_id" value="{{$row->id}}"/>
                                </select>

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Price-->
                        <!--begin::price_km-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>السعر لكل كم</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="bi-currency-dollar w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <input type="number" required name="price_km" class="form-control mb-2"
                                       placeholder="السعر لكل كم" value="{{$row->price_km}}"/>
                                </select>

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::price_km-->
                        <!--begin::free_km-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>المسافة المجانيه باكم</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="bi-currency-dollar w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <input type="number" required name="free_km" class="form-control mb-2"
                                       placeholder="المسافة المجانيه باكم" value="{{$row->free_km }}"/>
                                </select>

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::free_km-->
                        <!--begin::vat-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>الضريبة</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="bi-currency-dollar  w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <input type="number" required name="vat" class="form-control mb-2"
                                       placeholder="الضريبة" value="{{$row->vat}}"/>
                                </select>

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::vat-->

                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                 role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>بيانات خدمه نوع السيارة</h2>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الخدمة</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select required class="form-control mb-2" name="service_id"
                                                        data-control="select2" data-hide-search="false">
                                                    @foreach($services as $service)
                                                        <option @if($row->service_id == $service->id) selected
                                                                @endif  value="{{$service->id}}">{{$service->title_ar}}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->

                                            </div>
                                            <!--end::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">نوع السيارة</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select required class="form-control mb-2" name="car_category_id"
                                                        data-control="select2" data-hide-search="false">
                                                    @foreach($car_categories as $car_category)
                                                        <option @if($row->car_category_id == $car_category->id) selected
                                                                @endif
                                                                value="{{$car_category->id}}">{{$car_category->title_ar}}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->

                                            </div>
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">البراند</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select required class="form-control mb-2" id="brand" name="brand_id"
                                                        data-control="select2" data-hide-search="false">
                                                    <option value="" selected disabled>اختر</option>
                                                    @foreach($brands as $brand)
                                                        <option @if($row->brand_id == $brand->id) selected @endif
                                                        value="{{$brand->id}}">{{$brand->title_ar}}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->

                                            </div>

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الموديل</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select required class="form-control mb-2" id="modell" name="modell_id"
                                                        data-control="select2" data-hide-search="false">
                                                    @foreach($modells as $modell)
                                                        <option @if($row->modell_id == $modell->id) selected @endif
                                                        value="{{$modell->id}}">{{$modell->title_ar}}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->

                                            </div>

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">سنه الصنع</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select required class="form-control mb-2" id="year" name="year_id"
                                                        data-control="select2" data-hide-search="false">

                                                    @foreach($years as $year)
                                                        <option @if($row->year_id == $year->id) selected @endif
                                                        value="{{$year->id}}">{{$year->year}}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->

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
                            <a href="{{route('admin.car-categories')}}" id="kt_ecommerce_add_product_cancel"
                               class="btn btn-light me-5">عودة</a>
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
        $(document).on('change', '#brand', function () {
            var brand_id = $(this).val();
            //modell
            $.ajax({
                type: "GET",
                url: "{{asset('admin/service-car-categories/get/modell-data')}}?brand_id=" + brand_id,
                success: function (res) {
                    if (res) {
                        console.log(res);
                        $("#modell").empty();
                        $("#modell").append('<option value="" selected disabled > اختر </option>');
                        $.each(res, function (key, value) {
                            $("#modell").append('<option value="' + value.id + '" > ' + value.title_ar + ' </option>');
                        });
                    }

                }
            });
        });


        $(document).on('change', '#modell', function () {
            var modell_id = $(this).val();
            //year
            $.ajax({
                type: "GET",
                url: "{{asset('admin/service-car-categories/get/year-data')}}?modell_id=" + modell_id,
                success: function (res) {
                    if (res) {
                        console.log(res);
                        $("#year").empty();
                        $("#year").append('<option value="" selected disabled > اختر </option>');
                        $.each(res, function (key, value) {
                            $("#year").append('<option value="' + value.id + '" > ' + value.year + ' </option>');
                        });
                    }

                }
            });
        });
    </script>
@endsection
