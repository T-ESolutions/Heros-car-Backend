
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="tab-content">
        <!--begin::Tab pane-->
        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>بيانات اللون</h2>
                        </div>
                    </div>
                    <br>
                    <br>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">الاسم بالعربية</label>
                            <input type="text" required name="title_ar" value="{{old('title_ar',$row->title_ar ?? '')}}" class="form-control mb-2" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">الاسم بالانجليزية</label>
                            <input type="text" required name="title_en" value="{{old('title_en',$row->title_en ?? '')}}" class="form-control mb-2" />
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
        <a href="{{route('admin.'.$route)}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">عودة</a>
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
