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
                        تعديل خدمة
                        <!--end::Description-->
                    </h1>
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.services')}}" class="text-muted text-hover-primary">الخدمات</a>
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
                <form action="{{route('admin.services.update')}}" method="post" enctype="multipart/form-data"
                      class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10">
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
                                    <h2>مقدم الخدمة</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                            @if($row->provider)
                                <!--begin::Image input-->
                                    <div class="image-input image-input-empty image-input-outline mb-3"
                                         data-kt-image-input="true" style="">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-150px h-150px"
                                             style="background-image: url({{$row->provider->image}})"></div>
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Description-->
                                    <div class="text-success text-black-50 fs-7"><h2>{{$row->provider->name}}</h2>
                                    </div>
                                    <div class="center">
                                        <div class="rating justify-content-end">
                                            <div
                                                class="rating-label @if($row->provider->rate >= 1 && $row->provider->rate <= 5 ) checked @endif ">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label  @if($row->provider->rate >= 2 && $row->provider->rate <= 5 ) checked @endif ">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label @if($row->provider->rate >= 3 && $row->provider->rate <= 5 ) checked @endif">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label @if($row->provider->rate >= 4 && $row->provider->rate <= 5 ) checked @endif">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label @if($row->provider->rate >= 5 && $row->provider->rate <= 5 ) checked @endif ">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                        </div>
                                    </div>


                                @else
                                    <div class="text-success text-black-50 fs-7"><h2>لم يحدد مقدم خدمة بعد</h2>
                                    </div>
                            @endif
                            <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>العميل</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty image-input-outline mb-3"
                                     data-kt-image-input="true" style="">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px"
                                         style="background-image: url({{$row->user->image}})"></div>
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-success text-black-50 fs-7"><h2>{{$row->user->name}}</h2>
                                    <div class="center">
                                        <div class="rating justify-content-end">
                                            <div
                                                class="rating-label @if($row->user->rate >= 1 && $row->user->rate <= 5 ) checked @endif ">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label  @if($row->user->rate >= 2 && $row->user->rate <= 5 ) checked @endif ">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label @if($row->user->rate >= 3 && $row->user->rate <= 5 ) checked @endif">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label @if($row->user->rate >= 4 && $row->user->rate <= 5 ) checked @endif">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div
                                                class="rating-label @if($row->user->rate >= 5 && $row->user->rate <= 5 ) checked @endif ">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <h2> الحالة</h2>
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
                                <select name="active" required class="form-select mb-2" data-control="select2"
                                        data-hide-search="true" data-placeholder="إختر الحالة"
                                        id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    @foreach(\App\Models\Status::active()->get() as $status )
                                        <option
                                            value="{{$status->key}}" {{$status->key == $row->status_key ? "selected" : ""}}>{{$status->title_ar}}</option>
                                    @endforeach
                                </select>

                                {{--                                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-secondary">--}}
                                {{--                                    <span class="indicator-label">حفظ</span>--}}
                                {{--                                    <span class="indicator-progress">إنتظر قليلا . . .--}}
                                {{--												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
                                {{--                                </button>--}}
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
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                 role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">بيانات الطلب</div>
                                            <div class="fs-6 d-flex justify-content-between mb-4">
                                                <div class="fw-bold">رقم الطلب</div>
                                                <div class="d-flex fw-bolder">
                                                    {{$row->order_number}}
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed"></div>
                                            <div class="fs-6 d-flex justify-content-between my-4">
                                                <div class="fw-bold">تاريخ الطلب</div>
                                                <div class="d-flex fw-bolder">
                                                    {{$row->created_at->format('Y-m-d   g:i a')}}</div>
                                            </div>
                                            <div class="separator separator-dashed"></div>

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">ملخص الموقع</div>

                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed gy-5"
                                                       id="kt_table_users_login_session">
                                                    <!--begin::Table head-->
                                                    <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                                    <!--begin::Table row-->
                                                    <tr class="text-start text-muted text-uppercase gs-0">
                                                        <th class="min-w-100px">الموقع</th>
                                                        <th>العنوان</th>
                                                        <th>العنوان على الخريطة</th>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fs-6 fw-bold text-gray-600">
                                                    @if($row->orderAddress)
                                                        @if($row->orderAddress->pickup_address)
                                                            <tr>
                                                                <!--begin::Invoice=-->
                                                                <td>موقع الالتقاط</td>
                                                                <!--end::Invoice=-->
                                                                <!--begin::Status=-->
                                                                <td>{{$row->orderAddress->pickup_address}}</td>
                                                                <!--end::Status=-->
                                                                <!--begin::Amount=-->
                                                                <td>
                                                                    <a href="https://maps.google.com/maps?q={{$row->orderAddress->pickup_lat}},{{$row->orderAddress->pickup_lng}}&hl=es&z=14&amp;"
                                                                       target="_blank" class="btn btn-primary"
                                                                       title="{{$row->orderAddress->pickup_address}}">
                                                                        <i class="fa fa-map"></i>
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                        @endif
                                                        @if($row->orderAddress->pickup_address)

                                                            <tr>
                                                                <!--begin::Invoice=-->
                                                                <td>موقع الانزال</td>
                                                                <!--end::Invoice=-->
                                                                <!--begin::Status=-->
                                                                <td>{{$row->orderAddress->drop_off_address}}</td>
                                                                <!--end::Status=-->
                                                                <!--begin::Amount=-->
                                                                <td>
                                                                    <a href="https://maps.google.com/maps?q={{$row->orderAddress->drop_off_lat}},{{$row->orderAddress->drop_off_lng}}&hl=es&z=14&amp;"
                                                                       target="_blank" class="btn btn-primary"
                                                                       title="{{$row->orderAddress->drop_off_address}}">
                                                                        <i class="fa fa-map"></i>
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                        @endif
                                                        @if($row->orderAddress->provider_address)

                                                            <tr>
                                                                <!--begin::Invoice=-->
                                                                <td>موقع مقدم الخدمة</td>
                                                                <!--end::Invoice=-->
                                                                <!--begin::Status=-->
                                                                <td>{{$row->orderAddress->provider_address}}</td>
                                                                <!--end::Status=-->
                                                                <!--begin::Amount=-->
                                                                <td>
                                                                    <a href="https://maps.google.com/maps?q={{$row->orderAddress->provider_lat}},{{$row->orderAddress->provider_lng}}&hl=es&z=14&amp;"
                                                                       target="_blank" class="btn btn-primary"
                                                                       title="{{$row->orderAddress->provider_address}}">
                                                                        <i class="fa fa-map"></i>
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                        @endif

                                                    @endif
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">ملخص الخدمة</div>
                                            <div id="kt_schedule_day_0" class="tab-pane fade show active">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                                    <!--end::Bar-->
                                                    <!--begin::Info-->
                                                    <div class="fw-bold ms-5">
                                                        <!--end::Time-->
                                                        <!--begin::Title-->
                                                        <a href="javascript:void($this);"
                                                           class="fs-5 fw-bolder text-dark text-hover-primary mb-2">الخدمة</a>
                                                        <!--end::Title-->
                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            <a href="javascript:void($this);">{{$row->service->title_ar}}</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                                    <!--end::Bar-->
                                                    <!--begin::Info-->
                                                    <div class="fw-bold ms-5">
                                                        <!--end::Time-->
                                                        <!--begin::Title-->
                                                        <a href="javascript:void($this);"
                                                           class="fs-5 fw-bolder text-dark text-hover-primary mb-2">تكلفة
                                                            الخدمة</a>
                                                        <!--end::Title-->
                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            <a href="javascript:void($this);">{{$row->service_cost}} {{trans('lang.currency')}}</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>

                                            <div class="fs-2hx fw-bolder">الخدمات الاضافية</div>
                                            <div id="kt_schedule_day_0" class="tab-pane fade show active">
                                                <!--begin::Time-->
                                                @if(count($row->Order_extra_services) > 0 )
                                                    @foreach($row->Order_extra_services as $extra_service)
                                                        <div class="d-flex flex-stack position-relative mt-6">
                                                            <!--begin::Bar-->
                                                            <div
                                                                class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                                            <!--end::Bar-->
                                                            <!--begin::Info-->
                                                            <div class="fw-bold ms-5">
                                                                <!--end::Time-->
                                                                <!--begin::Title-->
                                                                <a href="javascript:void($this);"
                                                                   class="fs-5 fw-bolder text-dark text-hover-primary mb-2">{{$extra_service->name}}</a>
                                                                <!--end::Title-->
                                                                <!--begin::User-->
                                                                <div class="fs-7 text-muted">
                                                                    <a href="javascript:void($this);">{{$extra_service->price}} {{trans('lang.currency')}} </a>
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <h6>لا يوجد خدمات اضافية</h6>
                                            @endif
                                            <!--end::Time-->
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">بيانات المركبة</div>
                                            <div class="fs-6 d-flex justify-content-between mb-4">
                                                <div class="fw-bold">المركة</div>
                                                <div class="d-flex fw-bolder">
                                                    {{json_decode($row->brand_data)->title_ar}}
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed"></div>
                                            <div class="fs-6 d-flex justify-content-between my-4">
                                                <div class="fw-bold">الموديل</div>
                                                <div class="d-flex fw-bolder">
                                                    {{json_decode($row->modell_data)->title_ar}}</div>
                                            </div>
                                            <div class="separator separator-dashed"></div>
                                            <div class="fs-6 d-flex justify-content-between mt-4">
                                                <div class="fw-bold">سنة الصنع</div>
                                                <div class="d-flex fw-bolder">
                                                    {{$row->car_year}}</div>
                                            </div>
                                            <div class="separator separator-dashed"></div>
                                            <div class="fs-6 d-flex justify-content-between mt-4">
                                                <div class="fw-bold">لون المركبة</div>
                                                <div class="d-flex fw-bolder">
                                                    {{$row->car_color}}</div>
                                            </div>

                                        </div>
                                        <!--end::Card header-->
                                    </div>

                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">بيانات اضافية</div>
                                            <div
                                                class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                            @foreach($row->User_Order_images as $image)
                                                <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px"
                                                                 src="{{$image->image}}">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                    <!--end::Item-->
                                                @endforeach
                                            </div>
                                            <div class="separator separator-dashed"></div>
                                            <div class="fs-6 d-flex justify-content-between my-4">
                                                <div class="fw-bold">ملاحظات</div>
                                                <div class="d-flex fw-bolder">
                                                    {{$row->notes}}</div>
                                            </div>
                                            <div class="separator separator-dashed"></div>

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">صور السياره من الاربع اتجاهات</div>
                                            <div
                                                class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                            @foreach($row->Provider_Order_images as $image)
                                                <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px"
                                                                 src="{{$image->image}}">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                    <!--end::Item-->
                                                @endforeach
                                            </div>
                                            <div class="separator separator-dashed"></div>
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">الاسئلة</div>
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                                   id="kt_ecommerce_products_table">
                                                <!--begin::Table head-->
                                                <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-200px">السؤال</th>
                                                    <th class="text-end min-w-100px">الاجابة</th>
                                                    <th class="text-end min-w-70px"> موافقة مقدم الخدمة</th>
                                                    <th class="text-end min-w-100px">سبب الرفض</th>
                                                </tr>
                                                <!--end::Table row-->
                                                </thead>
                                                <!--end::Table head-->
                                                <tbody class="fw-bold text-gray-600">
                                                <!--begin::Table row-->
                                                @foreach($row->Order_Questions as $question)
                                                    <tr>
                                                        <!--begin::Category=-->
                                                        <td class="text-end pe-0">
                                                            <span class="fw-bolder">{{$question->title_ar}}</span>
                                                        </td>
                                                        <!--end::Category=-->
                                                        <!--begin::SKU=-->
                                                        <td class="text-end pe-0">
                                                            <span class="fw-bolder">{{$question->answer->answer}}</span>
                                                        </td>
                                                        <!--end::SKU=-->
                                                        <!--begin::Qty=-->
                                                        <td class="text-end pe-0">
                                                            <span
                                                                class="fw-bolder">  {{$question->answer->provider_approval}}</span>
                                                        </td>
                                                        <!--end::Qty=-->
                                                        <!--begin::Price=-->
                                                        <td class="text-end pe-0">
                                                            <span
                                                                class="fw-bolder"> {{$question->answer->reject_reason}}</span>
                                                        </td>
                                                        <!--end::Price=-->
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="card card-xl-stretch">
                                        <!--begin::Body-->
                                        <div class="card-body pt-5">
                                            <!--begin::Timeline-->
                                            <div class="timeline-label">
                                            @foreach($row->Order_status as $row_status)
                                                @if($row_status->status_date)
                                                    <!--begin::Item-->
                                                        <div class="timeline-item">
                                                            <!--begin::Label-->
                                                            <div
                                                                class="timeline-label fw-bolder text-gray-800 fs-6">@if($row_status->status_date){{date('H:i',strtotime($row_status->status_date))}} @endif
                                                            </div>
                                                            <!--end::Label-->
                                                            <!--begin::Badge-->
                                                            <div class="timeline-badge">
                                                                <i class="fa fa-genderless @if($row->status_key == $row_status->status_key) text-danger @else  @if($row_status->status_date) text-success @else text-warning @endif  @endif fs-1"></i>
                                                            </div>
                                                            <!--end::Badge-->
                                                            <!--begin::Text-->
                                                            <div class="fw-mormal timeline-content text-muted ps-3">
                                                                {{$row_status->status_ar}}
                                                            </div>
                                                            <!--end::Text-->
                                                        </div>
                                                @endif
                                            @endforeach
                                            <!--end::Item-->
                                            </div>
                                            <!--end::Timeline-->
                                        </div>
                                        <!--end: Card Body-->
                                    </div>

                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">مقدمين الخدمه الرافضين للطلب</div>
                                            @if(count($row->ProvidersRejectedOrders) > 0)
                                            @foreach($row->ProvidersRejectedOrders as $provider)
                                                <div class="fs-6 d-flex justify-content-between mb-4">
                                                    <div class="fw-bold">{{$provider->provider->name}}</div>
                                                    <div class="d-flex fw-bolder">
                                                        {{$provider->created_at->format('Y-m-d | g:i a')}}
                                                    </div>
                                                </div>
                                                <div class="separator separator-dashed"></div>
                                            @endforeach
                                            @else
                                                <h6>لا يوجد رافضين للطلب</h6>
                                            @endif

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="fs-2hx fw-bolder">تقييمات الطلب</div>
                                            @if(count($row->reviews) > 0)
                                            @foreach($row->reviews as $review)
                                                <div class="fs-6 d-flex justify-content-between mb-4">
                                                    <div class="fw-bold">{{$review->target->name}}</div>
                                                    <div class="fw-bold">
                                                        <div class="center">
                                                            <div class="rating justify-content-end">
                                                                <div
                                                                    class="rating-label @if($review->rate >= 1 && $review->rate <= 5 ) checked @endif ">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                                    <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <div
                                                                    class="rating-label  @if($review->rate >= 2 && $review->rate <= 5 ) checked @endif ">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                                    <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <div
                                                                    class="rating-label @if($review->rate >= 3 && $review->rate <= 5 ) checked @endif">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                                    <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <div
                                                                    class="rating-label @if($review->rate >= 4 && $review->rate <= 5 ) checked @endif">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                                    <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                                <div
                                                                    class="rating-label @if($review->rate >= 5 && $review->rate <= 5 ) checked @endif ">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                                                                    <span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        </div>
                                                    <div class="fw-bold">{{$review->comment}}</div>
                                                    <div class="d-flex fw-bolder">
                                                        {{$review->created_at->format('Y-m-d | g:i a')}}
                                                    </div>
                                                </div>
                                                <div class="separator separator-dashed"></div>
                                            @endforeach
                                            @else
                                                <h6>لا يوجد تقييمات</h6>
                                            @endif
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('admin.screens')}}" id="kt_ecommerce_add_product_cancel"
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


@endsection
