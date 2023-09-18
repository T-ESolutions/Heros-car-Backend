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
                        إضافة كوبون خصم
                        <!--end::Description-->
                    </h1>
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.coupons')}}" class="text-muted text-hover-primary">كوبونات الخصم</a>
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
                <form action="{{route('admin.coupons.store')}}" method="post" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" >
                    @csrf
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">
                        <!--begin::date-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>تاريخ إنتهاء الصلاحية</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" type="date"  name="expired_at" placeholder="إحتر التاريخ" id="kt_calendar_datepicker_end_date" />                                <!--end::Input-->                                <!--end::Input-->
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

                        <!--begin::date-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>قيمة الخصم</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-primary w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input-->
                                <!--begin::Input-->
                                <input type="number" required name="amount" class="form-control mb-2" placeholder="قيمة الكوبون" value="" />
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

                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>نوع الخصم</h2>
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
                                <select name="type" required class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="إختر الحالة" id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    <option value="fixed" selected="selected">خصم ثابت</option>
                                    <option value="percent">خصم نسبة</option>
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

                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
{{--                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">--}}
{{--                            <!--begin:::Tab item-->--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link text-active-warning pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">--}}
{{--                                    بيانات كوبون الخصم--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <!--end:::Tab item-->--}}
{{--                            <!--begin:::Tab item-->--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>--}}
{{--                            </li>--}}
{{--                            <!--end:::Tab item-->--}}
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
                                                <h2>بيانات كوبون الخصم</h2>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">كود الخصم</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required name="code" class="form-control mb-2" placeholder="كود الخصم" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
</div>
                                            <!--end::Input group-->

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">أقل قيمة للطلب لتطبيق الخصم</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" required name="min_order_total" class="form-control mb-2" placeholder="أقل قيمة للطلب لتطبيق الخصم" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            {{--                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                            <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class=" form-label">إختر المستخدمين ]إذا كنت تريد إرسال الكوبون لمستخدم بعينه[</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <select name="user_id[]" class="form-select mb-2 js-example-basic-multiple" multiple="multiple" data-control="select2" data-hide-search="false" data-placeholder="إختر المستخدمين" id="kt_ecommerce_add_product_status_select">
                                                            <option></option>
                                                            @foreach($users as $user)
                                                                <option value="{{$user->id}}" >{{$user->name}} ( {{$user->phone}} )</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-danger fs-7">ملحوظة: إذا لم تقم بتحديد المستخدمين سيتم إرسال الكوبون لجميع المستخدمين</div>
                                            <!--end::Description-->
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
                            <a href="{{route('admin.coupons')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">عودة</a>
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

@endsection
