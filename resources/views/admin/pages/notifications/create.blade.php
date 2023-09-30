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
                        إضافة إشعار
                        <!--end::Description-->
                    </h1>
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->

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
                <form action="{{route('admin.notifications.store')}}" method="post" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" >
                    @csrf
                    <!--begin::Aside column-->


                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>بيانات الإشعار</h2>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">

                                            <div class="mb-10 fv-row" >
                                                <!--begin::Label-->
                                                <label class=" form-label">إختر المستخدمين ]إذا كنت تريد إرسال الإشعار لمستخدم بعينه[</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="row">
                                                    <div class="col-lg-6" >
                                                        <select name="user_id[]" class=" users_id form-select mb-2 js-example-basic-multiple" multiple="multiple" data-control="select2" data-hide-search="false" data-placeholder="إختر المستخدمين" >
                                                            <option></option>
                                                            @foreach($users as $user)
                                                                <option value="{{$user->id}}" >{{$user->name}} ( {{$user->phone}} )</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-danger fs-7">ملحوظة: إذا لم تقم بتحديد المستخدمين سيتم إرسال الإشعار لجميع المستخدمين</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">العنوان (بالعربي)</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required name="title_ar" class="form-control mb-2" placeholder="العنوان" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">العنوان (بالإنجليزي)</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required name="title_en" class="form-control mb-2" placeholder="العنوان" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">المحتوي (بالعربي)</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea required name="body_ar" class="form-control mb-2" placeholder="المحتوي"></textarea>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            {{--                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                            <!--end::Description-->
                                            </div>

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">المحتوي (بالإنجليزي)</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea required name="body_en" class="form-control mb-2" placeholder="المحتوي"></textarea>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            {{--                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
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
        $(document).on('change', '.notification_type_id', function () {
            var notification_type_id = $(this).val();
            var users_id = $('.users_id').val();

            if (notification_type_id == "Order"){
                $('.offers').css('display','none');
                $('.coupons').css('display','none');
                $('.orders').css('display','');
                $('.orders_id').empty();
            }
            if (notification_type_id == "Offer"){
                $('.offers').css('display','');
                $('.coupons').css('display','none');
                $('.orders').css('display','none');
                $('.orders_id').empty();
            }
            if (notification_type_id == "Coupon"){
                $('.offers').css('display','none');
                $('.orders').css('display','none');
                $('.coupons').css('display','');
                $('.orders_id').empty();
            }
            if (notification_type_id == "Order"){
                if (notification_type_id && users_id.length > 0) {
                    getData(notification_type_id,users_id);
                }
            }
        });

        $(document).on('change', '.users_id', function () {
            var users_id = $(this).val();
            var notification_type_id = $('.notification_type_id').val();
            if (notification_type_id == "Order"){
                if (notification_type_id && users_id.length > 0) {
                    getData(notification_type_id,users_id);
                }
            }
        });

    </script>
@endsection
