@extends('admin.index')

@section('style')
    <link href="{{ asset('admin/dist/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
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
                        طلبات الإلغاء
                        <!--end::Description-->
                    </h1>
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->

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
                                <th class=" min-w-10px">الحالة</th>
                                <th class=" min-w-10px">الاسم</th>
                                <th class=" min-w-10px">iban</th>
                                <th class=" w-200px">اسم البنك</th>
                                <th class=" w-400px">ملاحظات</th>
                                <th class=" min-w-100px">العمليات</th>

                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">

                            </tbody>
                            <!--end::Table body-->
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
                            <h2>الحالة</h2>
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
                    <form id="submit_btn" method="post" action="{{route('admin.cancel_requests.changeCancelRequestStatus')}}">
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
                                        <option value="0" selected>
                                            جديد
                                        </option>
                                        <option value="1" >
                                            مقروء
                                        </option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-6">
                                    <textarea name="notes" class="form-control mb-2" placeholder="ملاحظات"></textarea>
                                </div>
                            </div>
                            <!--end::Select2-->
                        </div>
                        <!--end::Card body-->
                        <div class="modal-footer">
                            <button type="submit" data-dismiss="modal" class="btn btn-primary submit_btn">تأكيد</button>
                        </div>
                    </form>
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
    <script src="{{ asset('admin/dist/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>


    <!-- BEGIN PAGE LEVEL PLUGINS -->

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
                        text: '<i class="bi bi-printer-fill "></i>طباعة',
                        titleAttr: 'طباعة',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl').prepend(
                                ' <table> ' +
                                '                        <tbody> ' +
                                '                                <tr>' +
                                '                                    <td style="text-align: center">  <p style="padding-right:150px">بروتين  شيف</p></td>' +
                                '                                    <td style="text-align: right"> <img src="{{asset('default.png')}}" width="150px" height="150px" /> </td>' +
                                '                                    <td style="text-align: right"><p>عنوان التقرير : طلبات الإلغاء</p>' +
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
                        text: '<i class="bi bi-file-earmark-spreadsheet-fill "></i>تصدير لأكسيل',
                        titleAttr: 'تصدير لأكسيل',
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
                ajax: '{{ route('admin.cancel_requests.datatable') }}',
                "columns": [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', "searchable": false, "orderable": false},
                    {"data": "status", "searchable": false, "orderable": false},
                    {"data": "name", "searchable": false, "orderable": false},
                    {"data": "iban", "searchable": false, "orderable": false},
                    {"data": "bank_name", "searchable": false, "orderable": false},
                    {"data": "notes", "searchable": false, "orderable": false},
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
            $(".card #row_id").val(row_id);
        });

        $('.submit_btn').on('click', function () {
            $('#submit_btn').submit();
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
                        url: '{{route('admin.screens.delete')}}',
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

@endsection
