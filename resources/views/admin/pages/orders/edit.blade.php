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
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center fw-bolder fs-3 my-1" style="color: #F48120">
                        بيانات الطلب
                    </h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('home')}}" class="text-muted text-hover-primary">الرئيسية</a>
                        </li>
                        <!--end::Item-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="
                                @if($status == 'pending')
                            {{route('admin.orders',['pending'])}}
                            @elseif($status == 'accepted')
                            {{route('admin.orders',['accepted'])}}
                            @elseif($status == 'canceled')
                            {{route('admin.orders',['canceled'])}}
                            @elseif($status == 'finished')
                            {{route('admin.orders',['finished'])}}
                            @endif" class="text-muted text-hover-primary">

                                الطلبات
                                @if($status == 'pending')
                                    قيد الموافقة
                                @elseif($status == 'accepted')
                                    المقبولة(الحالية)
                                @elseif($status == 'canceled')
                                    الملغية
                                @elseif($status == 'finished')
                                    المنتهية
                                @endif
                            </a>
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
                <form action="{{route('admin.orders.update')}}" method="post" enctype="multipart/form-data"
                      class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10">
                    @csrf
                    <input type="hidden" name="row_id" value="{{$row->id}}">
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">

                        <!--begin::date-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>تاريخ بدء الباقة</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-warning w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <input class="form-control mb-2" name="start_date" value="{{$row->start_date}}" type="date">
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
                        <!--end::date-->

                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>الباقة</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <span style="font-size: large"
                                      class="badge badge-secondary">
                                    {{$row->package_name_ar}}
                                </span>
                                <br>
                                <br>
                                <span style="font-size: small"
                                      class="badge badge-secondary">
                                    {{$row->package_type_ar}}
                                </span>
                                <!--end::Image input-->
                                <!--begin::Description-->
                            {{--                                <div class="text-danger fs-7"> *.png - *.jpg - *.jpeg </div>--}}
                            <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->

                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>الحالة</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select name="status" required class="form-select mb-2" data-control="select2"
                                        data-hide-search="true" data-placeholder="إختر الحالة"
                                        id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    <option value="pending" {{$row->status == "pending" ? "selected" : ""}}>قيد
                                        الموافقة
                                    </option>
                                    <option value="accepted" {{$row->status == "accepted" ? "selected" : ""}}>مقبول
                                    </option>
                                    <option value="finished" {{$row->status == "finished" ? "selected" : ""}}>مكتمل
                                    </option>
                                    <option value="canceled" {{$row->status == "canceled" ? "selected" : ""}}>ملغي
                                    </option>
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
                        <!--end::Status-->

                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>قيمة إلغاء الطلب</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-danger w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <input name="cancel_price" type="number"
                                       class="form-control mb-2" data-placeholder="القيمة التي ترد الي حساب العميل"
                                       value="{{$row->cancel_price}}">
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class=" fs-7" style="color: red">القيمة التي ترد الي حساب العميل في حالة الإلغاء
                                    للطلب
                                </div>
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
                        <!--end::Status-->

                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                    {{--                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">--}}
                    {{--                            <!--begin:::Tab item-->--}}
                    {{--                            <li class="nav-item">--}}
                    {{--                                <a class="nav-link text-active-warning pb-4 active" data-bs-toggle="tab"--}}
                    {{--                                   href="#kt_ecommerce_add_product_general">بيانات بيانات الطلب</a>--}}
                    {{--                            </li>--}}
                    {{--                            <!--end:::Tab item-->--}}
                    {{--                            <!--begin:::Tab item-->--}}
                    {{--                        --}}{{--                            <li class="nav-item">--}}
                    {{--                        --}}{{--                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>--}}
                    {{--                        --}}{{--                            </li>--}}
                    {{--                        <!--end:::Tab item-->--}}
                    {{--                        </ul>--}}
                    <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                 role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>بيانات الطلب: </h2>
                                                <span style="font-size: large"
                                                      class="badge badge-secondary">
                                                    {{$row->order_num}}
                                                </span>
                                            </div>
                                        </div>

                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">

                                                <hr>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <span style="font-size: large">
                                                            إسم العميل:
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <span style="font-size: large"
                                                          class="badge badge-secondary">
                                                        <a href="{{route('admin.users.edit',[$row->user_id])}}"
                                                           target="_blank">
                                                        {{$row->User->name}}
                                                        </a>
                                                    </span>
                                                    </div>

                                                    <div class="col-md-2"></div>

                                                    <div class="col-md-2">
                                                        <span style="font-size: large">
                                                            الجوال :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <span style="font-size: large"
                                                          class="badge badge-secondary">
                                                        {{$row->User->phone}}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <span style="font-size: large">
                                                            البريد الإلكتروني :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <span style="font-size: large"
                                                          class="badge badge-secondary">
                                                        {{$row->User->email}}
                                                    </span>
                                                    </div>

                                                    <div class="col-md-2"></div>

                                                    <div class="col-md-2">

                                                    </div>
                                                    <div class="col-md-3">

                                                    </div>
                                                </div>

                                                <hr>
                                            </div>

                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span style="font-size: large">
                                                            تاريخ إنشاء الطلب :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <span style="font-size: large"
                                                          class="badge badge-secondary">
                                                        {{\Carbon\Carbon::parse($row->created_at)->translatedFormat('Y-m-d H:i A')}}
                                                    </span>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <span style="font-size: large">
                                                            تاريخ بدء الباقة :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <span style="font-size: large"
                                                          class="badge badge-secondary">
                                                           {{\Carbon\Carbon::parse($row->start_date)->translatedFormat('Y-m-d l')}}
                                                    </span>
                                                    </div>
                                                </div>


                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span style="font-size: large">
                                                            طريقة إستلام الطلب :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">

                                                        @if(isset($row->lat) && isset($row->lng))
                                                            <a href="https://maps.google.com/maps?q={{$row->lat}},{{$row->lng}}&hl=es&z=14&amp;"
                                                               target="_blank" class="btn btn-primary"
                                                               title="{{$row->location_body}}">
                                                                <i class="fa fa-map"></i>

                                                            </a>
                                                        @else
                                                            <span style="font-size: large"
                                                                  class="badge badge-secondary">
                                                                إستلام من المقر&nbsp;
                                                            </span>
                                                        @endif
                                                    </div>


                                                    <div class="col-md-3">
                                                        <span style="font-size: large">
                                                            سعر الباقة :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span style="font-size: large"
                                                              class="badge badge-primary">
                                                            {{$row->package_price}}
                                                            &nbsp;
                                                            &nbsp;
                                                            ريال
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span style="font-size: large">
                                                            تكلفة الشحن :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">

                                                        @if(isset($row->lat) && isset($row->lng) && isset($row->shipping_price))
                                                            <span style="font-size: large"
                                                                  class="badge badge-primary">
                                                                {{$row->shipping_price}}&nbsp;
                                                                &nbsp;
                                                                ريال
                                                            </span>
                                                        @else
                                                            <span style="font-size: large"
                                                                  class="badge badge-primary">
                                                                0
                                                                &nbsp;
                                                                ريال
                                                            </span>
                                                        @endif
                                                    </div>


                                                    <div class="col-md-3">
                                                        <span style="font-size: large">
                                                            الخصم :
                                                        </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        @if(isset($row->discount_price))
                                                            <span style="font-size: large"
                                                                  class="badge badge-primary">
                                                                {{$row->discount_price}}&nbsp;
                                                                &nbsp;
                                                                ريال
                                                            </span>
                                                        @else
                                                            <span style="font-size: large"
                                                                  class="badge badge-primary">
                                                                0
                                                                &nbsp;
                                                                ريال
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            @if(isset($row->total_price))
                                                <div class="mb-10 fv-row">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                        <span style="font-size: large">
                                                            إجمالي التكلفة :
                                                        </span>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <span style="font-size: large"
                                                              class="badge badge-success">
                                                            {{$row->total_price}}&nbsp;
                                                            &nbsp;
                                                            ريال
                                                        </span>
                                                        </div>


                                                        <div class="col-md-3">
                                                            @if(isset($row->cancel_price) && $row->cancel_price > 0)
                                                                <span style="font-size: large">
                                                                    قيمة الإلغاء :
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                            @if(isset($row->cancel_price) && $row->cancel_price > 0)
                                                                <span style="font-size: large"
                                                                      class="badge badge-danger">
                                                            {{$row->cancel_price}}&nbsp;
                                                            &nbsp;
                                                            ريال
                                                            @endif
                                                        </span>
                                                        </div>
                                                    </div>
                                                    @endif

                                                    @if($row->OrderAdditions)
                                                        <br>
                                                        <div class="row">
                                                            <hr>
                                                            <div class="col-md-12">
                                                                <!--begin::Title-->
                                                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">

                                                                    <!--begin::Description-->
                                                                    <small class=" fs-3 fw-bold my-1 ms-1 badge badge-secondary" style="color: #F48120">
                                                                        إضافات الباقة:
                                                                    </small>
                                                                    <!--end::Description-->
                                                                </h1>
                                                                <br>

                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                        <div class="mb-10 fv-row">
                                                            <div class="row">
                                                                @foreach($row->OrderAdditions as $addition)
                                                                <div class="col-md-3">
                                                                    <span style="font-size: large">
                                                                        {{$addition->mealType->title_ar}}
                                                                    </span>
                                                                </div>
                                                                    <div class="col-md-3">
                                                                        <span style="font-size: large"
                                                                              class="badge badge-primary">
                                                                            {{$addition->price}}
                                                                            &nbsp;
                                                                            &nbsp;
                                                                            ريال
                                                                        </span>
                                                                    </div>

                                                                @endforeach
                                                            </div>
                                                            @endif


                                                </div>
                                                <!--end::Input group-->

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
                            <a href="{{route('admin.orders',[$row->status])}}" id="kt_ecommerce_add_product_cancel"
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

    <div class="clearfix">
        <hr>
    </div>
    <!--begin::Page title-->
    <!--begin::Title-->
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">

        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class=" fs-1 fw-bold my-1 ms-1 badge badge-white" style="color: #F48120">
            وجبات الباقة
        </small>
        <!--end::Description-->
    </h1>
    <!--end::Title-->
    <!--end::Page title-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                {{--                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">--}}
                {{--                        <!--begin::Card title-->--}}
                {{--                        <div class="card-title">--}}
                {{--                            <!--begin::Search-->--}}
                {{--                            <div class="d-flex align-items-center position-relative my-1">--}}
                {{--                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->--}}
                {{--                                <span class="svg-icon svg-icon-1 position-absolute ms-4">--}}
                {{--													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
                {{--														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />--}}
                {{--														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />--}}
                {{--													</svg>--}}
                {{--												</span>--}}
                {{--                                <!--end::Svg Icon-->--}}
                {{--                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />--}}
                {{--                            </div>--}}
                {{--                            <!--end::Search-->--}}
                {{--                        </div>--}}
                {{--                        <!--end::Card title-->--}}
                {{--                        <!--begin::Card toolbar-->--}}
                {{--                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">--}}
                {{--                            <div class="w-100 mw-150px">--}}
                {{--                                <!--begin::Select2-->--}}
                {{--                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">--}}
                {{--                                    <option></option>--}}
                {{--                                    <option value="all">All</option>--}}
                {{--                                    <option value="published">Published</option>--}}
                {{--                                    <option value="scheduled">Scheduled</option>--}}
                {{--                                    <option value="inactive">Inactive</option>--}}
                {{--                                </select>--}}
                {{--                                <!--end::Select2-->--}}
                {{--                            </div>--}}
                {{--                            <!--begin::Add product-->--}}
                {{--                            <a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">Add Product</a>--}}
                {{--                            <!--end::Add product-->--}}
                {{--                        </div>--}}
                {{--                        <!--end::Card toolbar-->--}}
                {{--                    </div>--}}
                <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="slider_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                {{--                                <th class="w-10px pe-2">--}}
                                {{--                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
                                {{--                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />--}}
                                {{--                                    </div>--}}
                                {{--                                </th>--}}
                                <th class=" min-w-10px">#</th>
                                <th class=" min-w-10px">الوجبة</th>
                                <th class=" min-w-10px">النوع</th>
                                <th class=" min-w-10px">تاريخ التسليم</th>
                                <th class=" min-w-10px">التاريخ القديم (المستبدل)</th>
                                <th class=" min-w-10px">الحالة</th>
                                <th class=" min-w-10px">تغيير حالة الوجبة</th>

                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

    <!--begin::Modal - change status-->
    <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Status-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>تغيير الحالة</h2>
                            &nbsp;
                            &nbsp;
                            ]
                            <h2>حالة الطلب:</h2>
                            <h2 id="statusText" class="text-primary"></h2>
                            [
                        </div>
                        <!--end::Card title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    @if($row->status == 'accepted')
                    <form id="submit_btn" method="post" action="{{route('admin.orders.changeOrderMealStatus')}}">
                        @csrf
                        <input type="hidden" name="row_id" id="row_id">
                        <div class="card-body pt-0">
                            <!--begin::Select2-->

                            <div class="row">
                                <div class="col-lg-6">
                                    <select name="status" required class="form-select mb-2" data-control="select2"
                                            data-hide-search="true" data-placeholder="إختر الحالة"
                                            id="kt_ecommerce_add_product_status_select">
                                        <option></option>
                                        <option value="pending" {{$row->status == "pending" ? "selected" : ""}}>قيد
                                            التسليم
                                        </option>
                                        <option value="delivered" {{$row->status == "delivered" ? "selected" : ""}}>تم
                                            التسليم
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Select2-->
                        </div>
                        <!--end::Card body-->
                        <div class="modal-footer">
                            <button type="submit" data-dismiss="modal" class="btn btn-primary submit_btn">تأكيد</button>
                        </div>
                    </form>
                    @else
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <div class="row" >
                                <div class=" fs-7" style="color: red">  يجب الموافقة علي الطلب اولا لامكانية تغيير حالة الوجبه ..!
                                </div>

                            </div>
                            <!--end::Select2-->
                        </div>
                    @endif
                </div>
                <!--end::Status-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - change status-->

    <!--begin::Modal - change status-->
    <div class="modal fade" id="kt_modal_create_app2" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Status-->
                <div class="card card2 card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>تغيير الوجبة</h2>
                            &nbsp;
                            &nbsp;
                            ]
                            <h2> نوع الوجبة:</h2>
                            <h2 id="mealTypeText" class="text-primary"></h2>
                            [
                            &nbsp;
                            &nbsp;
                            ]
                            <h2>اسم الوجبة:</h2>
                            <h2 id="mealNameText" class="text-primary"></h2>
                            [
                        </div>
                        <!--end::Card title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    @if($row->status == 'accepted')
                        <form id="submit_btn" method="post" action="{{route('admin.orders.changeOrderMeal')}}">
                            @csrf
                            <input type="hidden" name="row_id" id="row_id">
                            <div class="card-body pt-0">
                                <!--begin::Select2-->

                                <div class="row">
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
                                                    <select name="meal_type_id" required
                                                            class="meal_type_id form-select mb-2"
                                                            data-control="select2" data-hide-search="false"
                                                            data-placeholder="إختر الفترة">
                                                        <option></option>
                                                        @foreach($meal_types as $key => $meal_type)
                                                            <option
                                                                value="{{$meal_type->id}}" {{$key==0 ? 'selected' : ''}}>{{$meal_type->title_ar}}</option>
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
                                            <label class="required form-label">إختر الوجبة</label>
                                            <!--end::Label-->
                                            <!--begin::Select2-->
                                            <!--begin::Input-->
                                            <select name="meal_id" required
                                                    class="meal_id form-control mb-2"
                                                    data-control="" data-hide-search="false"
                                                    data-placeholder="إختر الوجبة">
                                                <option></option>
                                                @foreach($meals as $key => $meal)
                                                    <option
                                                        value="{{$meal->id}}" {{$key == 0 ? "selected" : ""}}>{{$meal->title_ar}}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Select2-->
                                        </div>
                                    </div>

                                </div>
                                <!--end::Select2-->
                            </div>
                            <!--end::Card body-->
                            <div class="modal-footer">
                                <button type="submit" data-dismiss="modal" class="btn btn-warning submit_btn">تأكيد</button>
                            </div>
                        </form>
                    @else
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <div class="row" >
                                <div class=" fs-7" style="color: red">  يجب الموافقة علي الطلب اولا لامكانية تغيير حالة الوجبه ..!
                                </div>

                            </div>
                            <!--end::Select2-->
                        </div>
                    @endif
                </div>
                <!--end::Status-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - change status-->

@endsection



@section('script')

    <script>
        $(document).ready(function () {

            $("#slider_table").DataTable({
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                processing: true,
                bLengthChange: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'أظهر العمود',
                        title: '',
                        className: 'btn btn-primary me-3',
                        customize: function (win) {
                            $(win.document)
                                .css('direction', 'rtl');
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-primary me-3',
                        text: '<i class="bi bi-printer-fill "></i>',
                        title: '',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl').prepend(
                                ' <table> ' +
                                '                        <tbody> ' +
                                '                                <tr>' +
                                '                                    <td style="text-align: center">  <p style="padding-right:150px">بروتين  شيف</p></td>' +
                                '                                    <td style="text-align: right"> <img src="{{asset('default.png')}}" width="150px" height="150px" /> </td>' +
                                '                                    <td style="text-align: right"><p>عنوان التقرير :  وجبات الباقة\n' +
                                '                            </p>' +
                                '                                                                  <p>تاريخ التقرير : {{ Carbon\Carbon::now()->translatedFormat('l Y/m/d') }}</p>' +
                                '                                                                  <p>وقت التقرير : {{ Carbon\Carbon::now()->translatedFormat('h:i a') }}</p></td>' +
                                '                                </tr> ' +
                                '                        </tbody>' +
                                '                    </table>'
                            );
                        },
                        exportOptions: {
                            columns: [0, ':visible'],
                            stripHtml: false
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-primary me-3',
                        text: '<i class="bi bi-file-earmark-spreadsheet-fill "></i>',
                        title: '',
                        customize: function (win) {
                            $(win.document)
                                .css('direction', 'rtl');
                        },
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },


                ],
                ajax: '{{ route('admin.orders.orderDetailsDatatable',[$row->id]) }}',
                "columns": [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', "searchable": false, "orderable": false},
                    {"data": "meal_title_ar", "searchable": false, "orderable": false},
                    {"data": "meal_type_name",name: 'meal_type_name', "searchable": true, "orderable": false},
                    {"data": "date", name: 'actions', "date": false, "orderable": false},
                    {"data": "old_date", name: 'actions', "old_date": false, "orderable": false},
                    {"data": "status", name: 'status', "searchable": false, "orderable": false},
                    {"data": 'actions', name: 'actions', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <script>

        $("#kt_ecommerce_products_table").find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).prop("checked", true);
                    $(this).parents('tr').addClass("active");
                } else {
                    $(this).prop("checked", false);
                    $(this).parents('tr').removeClass("active");
                }
            });
        });

        $("#kt_ecommerce_products_table").on('change', 'tbody tr .checkboxes', function () {
            $(this).parents('tr').toggleClass("active");
        });
    </script>

    {{-- change status --}}
    <script>
        $(document).on("click", ".changeStatus", function () {
            var row_id = $(this).data('id');
            var status_val = $(this).data('status');
            $(".card #row_id").val(row_id);
            if(status_val == 'pending')
                $(".card #statusText").html('لم يتم التسلبم بعد');
            else
                $(".card #statusText").html('تم التوصيل');
        });

        $('.submit_btn').on('click', function () {
            $('#submit_btn').submit();
        })
    </script>
    <script>
        $(document).on("click", ".changeMeal", function () {
            var row_id = $(this).data('id');
            var mealTypeText_val = $(this).data('mealtype');
            var mealNameText_val = $(this).data('mealname');
            $(".card2 #row_id").val(row_id);
            $(".card2 #mealTypeText").html(mealTypeText_val);
            $(".card2 #mealNameText").html(mealNameText_val);

        });

        $('.submit_btn').on('click', function () {
            $('#submit_btn').submit();
        })
    </script>

    <!--    Delete Multi-->

    <script>
        var $bulkDeleteBtn = $('#bulk_delete_btn');
        $bulkdeleteinput = $('#ids');

        $bulkDeleteBtn.click(function (e) {
            var $checkedBoxes = $('#kt_ecommerce_products_table input[type=checkbox]:checked').not('.select_all');
            var count = $checkedBoxes.length;
            if (count) {
                var myids = [];
                $bulkdeleteinput.val('');
                $.each($checkedBoxes, function () {
                    var value = $(this).val();
                    if (value !== 'on') {
                        myids.push(value);
                    }
                });
                // Set input value
                $bulkdeleteinput.val(myids);
                $('#dynamic').modal('show');
            } else {
                // No row selected
                toastr.warning('Choose At Least One');
            }
        });

        $('.delete_multi_btn').on('click', function () {
            $('#delete_multi_form').submit();
        })
    </script>

    <script>
        $(document).on("click", ".delete", function () {
            var id = $(this).data('id');
            var btn = $(this);
            Swal.fire({
                title: "تحذير.هل انت متأكد؟!",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{route('admin.orders.delete')}}',
                        type: "post",
                        data: {'row_id': id, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                btn.parents("tr").remove();
                                Swal.fire("نجاح", "تم الحذف بنجاح", "success");
                                // location.reload();
                            } else {
                                Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("ألغاء", "تم الالغاء", "error");
                }
            });
        });

    </script>

    <script>
        $(document).on('change', '.meal_type_id', function () {
            var meal_type_id = $(this).val();
            if (meal_type_id) {
                $.ajax({
                    type: "GET",
                    url: "{{asset('admin/package-meals/get/meals')}}?meal_type_id=" + meal_type_id,
                    success: function (res) {
                        if (res) {
                            console.log(res);
                            $(".meal_id").empty();
                            $.each(res, function (key, value) {
                                $(".meal_id").append('<option value="' + value.id + '" >' + value.title_ar + '</option>');
                            });
                        }

                    }
                });
            }
        });

    </script>

@endsection
