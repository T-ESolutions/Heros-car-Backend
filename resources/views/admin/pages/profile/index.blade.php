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
                        الملف الشخصي
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
                <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" >
                    @csrf
                    <input type="hidden" name="row_id" value="{{$row->id}}">
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>الصورة</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{$row->image}})"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="إختر الصورة">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden"  />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="إلغاء الصورة">
														<i class="bi bi-x fs-2"></i>
													</span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف الصورة">
														<i class="bi bi-x fs-2"></i>
													</span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-danger fs-7"> *.png - *.jpg - *.jpeg </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="card card-flush py-4">
                            <!--begin::Card body-->
                            <div class="card-body pt-0 " style="align-self: center;">
                                <a href="{{route('admin.profile.change_password')}}"  class="btn btn-secondary">
                                    <span class="indicator-label">تغيير كلمة المرور</span>

                                </a>
                            <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                    </div>
                    <!--end::Aside column-->
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
                                                <h2>الملف الشخصي</h2>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الاسم</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required name="name" class="form-control mb-2"
                                                       value="{{old('name',$row->name)}}"/>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">البريد الإلكتروني</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" required name="email" class="form-control mb-2"
                                                       value="{{old('email',$row->email)}}"/>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            {{--                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                            <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الجوال</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel" required name="phone" class="form-control mb-2"
                                                        value="{{old('phone',$row->phone)}}"/>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            {{--                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                            <!--end::Description-->
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
                            <a href="{{route('admin.admins')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">عودة</a>
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
