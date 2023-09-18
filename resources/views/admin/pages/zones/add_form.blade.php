<form action="{{route('admin.settings.zones.store')}}" method="post" enctype="multipart/form-data"
      class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" style="display: none;">
@csrf
<!--begin::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
            <!--begin:::Tab item-->
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>--}}
        {{--                            </li>--}}
        <!--end:::Tab item-->
        </ul>
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
                                <h2>إضافة منطقة جديدة</h2>
                            </div>
                        </div>
                        <br>
                        <br>
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">اسم المنطقة</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" required name="name"
                                               class="form-control mb-2"
                                               placeholder="مثال : المنطقه الاولى"
                                               value=""/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                    {{--                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                    <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">الإحداثيات (ارسم منطقتك على
                                            الخريطة)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea type="text" rows="8" name="coordinates"
                                                  id="coordinates" class="form-control"
                                                  readonly></textarea>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                    {{--                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                    <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col-md-7">
                                    <input id="pac-input" class="controls rounded"
                                           style="height: 3em;width:fit-content;"
                                           title="ابحث عن موقعك هنا" type="text" placeholder="بحث"/>
                                    <div id="map-canvas"
                                         style="height: 100%; margin:0px; padding: 0px;"></div>
                                </div>
                            </div>

                        </div>
                        <!--end::Card header-->
                        <div class="card-footer">
                            <button type="submit" id="kt_ecommerce_add_product_submit"
                                    class="btn btn-secondary">

                                <span class="indicator-label">حفظ</span>
                                <span class="indicator-progress">إنتظر قليلا . . .
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <a href="{{route('admin.settings.zones')}}" id="kt_ecommerce_add_product_cancel"
                               class="btn btn-light me-5">عودة</a>
                        </div>
                    </div>
                    <!--end::General options-->

                </div>
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Main column-->
</form>
