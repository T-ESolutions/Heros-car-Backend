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
                        إعدادات الإشعارات
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
                <form action="{{route('admin.notification-settings.update')}}" method="post" enctype="multipart/form-data"
                      class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10">
                    @csrf

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
                                                <h2>
                                                    إعدادات الإشعارات
                                                </h2>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="mb-10 row">
                                                @foreach($data as $row)
                                                <div class="mb-10 col-lg-6">
                                                    <label class="required form-label">
                                                        @if($row->type == 'other')
                                                            عنوان الإشعار العادي
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Order')
                                                            عنوان الإشعار الخاص بطلب
                                                            @if($row->status == 1)
                                                                ]
                                                            معلومات عن الطلب
                                                                [
                                                            @elseif($row->status == 2)
                                                                ]
                                                            تغيير حالة الطلب
                                                                [
                                                            @elseif($row->status == 3)
                                                                ]
                                                            تغيير حالة الوجبة
                                                                [
                                                            @elseif($row->status == 4)
                                                                ]
                                                            إلغاء الطلب
                                                                [
                                                            @endif
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Meal')
                                                            عنوان الإشعار الخاص بوجبة
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Offer')
                                                            عنوان الإشعار الخاص بعرض
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Coupon')
                                                            عنوان الإشعار الخاص بكوبون
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @endif
                                                    </label>
                                                    <input type="text" name="title_ar[{{$row->type}}][{{$row->status}}]"
                                                           value="{{$row->title_ar}}"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-10 col-lg-6">
                                                    <label class="required form-label">
                                                        @if($row->type == 'other')
                                                            عنوان الإشعار العادي
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Order')
                                                            عنوان الإشعار الخاص بطلب
                                                            @if($row->status == 1)
                                                                ]
                                                            معلومات عن الطلب
                                                                [
                                                            @elseif($row->status == 2)
                                                                ]
                                                            تغيير حالة الطلب
                                                                [
                                                            @elseif($row->status == 3)
                                                                ]
                                                            تغيير حالة الوجبة
                                                                [
                                                            @elseif($row->status == 4)
                                                                ]
                                                            إلغاء الطلب
                                                                [
                                                            @endif
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Meal')
                                                            عنوان الإشعار الخاص بوجبة
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Offer')
                                                            عنوان الإشعار الخاص بعرض
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Coupon')
                                                            عنوان الإشعار الخاص بكوبون
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @endif
                                                    </label>
                                                    <input type="text" name="title_en[{{$row->type}}][{{$row->status}}]"
                                                           value="{{$row->title_en}}"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-10 col-lg-6">
                                                    <label class="required form-label">
                                                        @if($row->type == 'other')
                                                            نص الإشعار العادي
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Order')
                                                            نص الإشعار الخاص بطلب
                                                            @if($row->status == 1)
                                                                ]
                                                            معلومات عن الطلب
                                                                [
                                                            @elseif($row->status == 2)
                                                                ]
                                                            تغيير حالة الطلب
                                                                [
                                                            @elseif($row->status == 3)
                                                                ]
                                                            تغيير حالة الوجبة
                                                                [
                                                            @elseif($row->status == 4)
                                                                ]
                                                            إلغاء الطلب
                                                                [
                                                            @endif
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Meal')
                                                            نص الإشعار الخاص بوجبة
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Offer')
                                                            نص الإشعار الخاص بعرض
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @elseif($row->type == 'Coupon')
                                                            نص الإشعار الخاص بكوبون
                                                            <span class="text-danger">
                                                            (بالعربي)
                                                            </span>
                                                        @endif
                                                    </label>
                                                    <textarea type="text" name="body_ar[{{$row->type}}][{{$row->status}}]"
                                                              class="form-control">{{$row->body_ar}}</textarea>
                                                </div>
                                                <div class="mb-10 col-lg-6">
                                                    <label class="required form-label">
                                                        @if($row->type == 'other')
                                                            نص الإشعار العادي
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Order')
                                                            نص الإشعار الخاص بطلب
                                                            @if($row->status == 1)
                                                                ]
                                                            معلومات عن الطلب
                                                                [
                                                            @elseif($row->status == 2)
                                                                ]
                                                            تغيير حالة الطلب
                                                                [
                                                            @elseif($row->status == 3)
                                                                ]
                                                            تغيير حالة الوجبة
                                                                [
                                                            @elseif($row->status == 4)
                                                                ]
                                                            إلغاء الطلب
                                                                [
                                                            @endif
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Meal')
                                                            نص الإشعار الخاص بوجبة
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Offer')
                                                            نص الإشعار الخاص بعرض
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @elseif($row->type == 'Coupon')
                                                            نص الإشعار الخاص بكوبون
                                                            <span class="text-danger">
                                                            (بالإنجليزي)
                                                            </span>
                                                        @endif
                                                    </label>
                                                    <textarea type="text" name="body_en[{{$row->type}}][{{$row->status}}]"
                                                              class="form-control">{{$row->body_en}}</textarea>
                                                </div>
                                                <hr>
                                                <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('home')}}" id="kt_ecommerce_add_product_cancel"
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
    <script src="{{ URL::asset('admin/dist/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script>
        var options = {selector: "#editor1"};

        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);
    </script>
    <script>
        var options = {selector: "#editor2"};

        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);
    </script>
@endsection
