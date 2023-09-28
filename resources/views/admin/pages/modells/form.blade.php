
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
                <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{$row->image ?? url('/').'/defaults/default_category.png'}})"></div>
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
</div>
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="tab-content">
        <!--begin::Tab pane-->
        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>بيانات الموديل</h2>
                        </div>
                    </div>
                    <br>
                    <br>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">اسم القسم بالعربية</label>
                            <input type="text" required name="title_ar" value="{{old('title_ar',$row->title_ar ?? '')}}" class="form-control mb-2" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">اسم القسم بالانجليزية</label>
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
        <a href="{{route('admin.'.$route,$id)}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">عودة</a>
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
