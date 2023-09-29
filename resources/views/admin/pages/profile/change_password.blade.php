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
                        تغيير كلمة المرور
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

                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">بيانات كلمة المرور</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" action="{{route('admin.profile.password.update')}}"
                              method="post">
                        @csrf
                        <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label
                                        class="col-lg-4 col-form-label required fw-bold fs-6">كلمة المرور الحالية</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="current_password" required
                                               class="form-control form-control-lg form-control-solid"/>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#send_sms_modal"
                                           class="link-primary fs-6 fw-bolder">نسيت كلمة المرور ؟ </a>


                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">كلمة المرور الجديدة</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="{{trans('lang.password_info')}}"></i>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="password" required
                                               class="form-control form-control-lg form-control-solid"/>
                                        <!--begin::Hint-->
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6"> <span
                                            class="required">تأكيد كلمة المرور الجديدة</span></label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="password_confirmation" required
                                               class="form-control form-control-lg form-control-solid"/>
                                        <!--begin::Hint-->
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary"
                                        id="kt_account_profile_details_submit">حفظ التغيرات
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <div class="modal fade" tabindex="-1" id="send_sms_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('lang.reset_password')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" style="text-align: center;">
                    <p>{{trans('lang.sms_send_phone')}}</p>
                    <p style="    direction: ltr;">{{ auth('admin')->user()->phone }}</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{trans('lang.cancel')}}</button>
                    <button id="send_sms_btn" type="button" class="btn btn-primary">{{trans('lang.send')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="verify_code_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('lang.check_symbol')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" style="text-align: center;">
                    <p>{{trans('lang.message_send')}}</p>
                    <p style="    direction: ltr;">{{ auth('admin')->user()->phone }}</p>
                    <div class="mb-10">
                        <label for="" class="form-label"><b>{{trans('lang.please_enter_code')}}</b></label>
                        <input style="text-align: center;" class="form-control form-control-solid" id="sms_verify_txt"
                               name="code" inputmode="text">
                        <div class="form-text">{{trans('lang.are_y_received_code')}} <a href="javascript:void(0);" id="resend_sms_btn"
                                                                                        class="link-primary fs-6 fw-bolder">{{trans('lang.resend_code')}}</a>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{trans('lang.cancel')}}</button>
                    <button type="button" id="check_btn" class="btn btn-primary">{{trans('lang.check')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="change_password_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('lang.change_password')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" style="text-align: center;">
                    <p><b>{{trans('lang.phone_checked_s')}}</b></p>
                    <p>{{trans('lang.please_enter_new_password')}}</b></p>
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">{{trans('lang.new_password')}}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                               title="{{trans('lang.password_info')}}"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="password" id="psw2" name="password"
                                   class="form-control form-control-lg form-control-solid"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6"> <span
                                class="required">{{trans('lang.confirm_new_password')}}</span></label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="password" id="password_confirmation_txt" name="password_confirmation"
                                   class="form-control form-control-lg form-control-solid"/>
                            <!--begin::Hint-->
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{trans('lang.cancel')}}</button>
                    <button type="button" id="change_password_btn"
                            class="btn btn-primary">{{trans('lang.save_changes')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')

    <script>
        // Placeholder
        Inputmask({
            "mask": "9999",
            "placeholder": "____",
        }).mask("#sms_verify_txt");

        $(document).ready(function () {
            $('#send_sms_btn').click(function () {
                $.ajax({
                    url: "{{route('admin.profile.send_sms')}}",
                    type: "get"
                    ,
                    success: function (response) {
                        if (response.status === 200) {
                            $('#send_sms_modal').modal('hide');
                            $('#verify_code_modal').modal('show');
                        }
                    }
                })
            })

            $('#resend_sms_btn').click(function () {
                $.ajax({
                    url: "{{route('admin.profile.send_sms')}}",
                    type: "get"
                    ,
                    success: function (response) {
                        if (response.status === 200) {
                            toastr.success(response.msg);
                        }
                    }
                })
            })

            $('#check_btn').click(function () {
                code = $('#sms_verify_txt').val();
                $.ajax({
                    url: "{{route('admin.profile.forget_password.check_code')}}",
                    type: "post",
                    data: {
                        _token: '{{csrf_token()}}',
                        code: code
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status === 200) {
                            $('#verify_code_modal').modal('hide');
                            $('#change_password_modal').modal('show');
                        } else if (response.status === 400) {
                            toastr.error(response.msg);
                        }
                    }
                })
            })

            $('#change_password_btn').click(function () {
                password = $('#psw2').val();
                password_confirmation = $('#password_confirmation_txt').val();
                $.ajax({
                    url: "{{route('admin.profile.forget_password.change_password')}}",
                    type: "post",
                    data: {
                        _token: '{{csrf_token()}}',
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function (response) {
                        if (response.status === 200) {
                            $('#change_password_modal').modal('hide');
                            toastr.success(response.msg);
                        } else if (response.status === 400) {
                            toastr.error(response.msg);
                        }
                    }
                })
            })
        })
    </script>
@endsection
