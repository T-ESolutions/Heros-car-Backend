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
                        إعدادات منطقة التوصيل
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
{{--               Add form in blade--}}
                <!--end::Form-->
                <!--begin::Form-->
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
                                                <th class=" min-w-100px">اسم المنطقة</th>
                                                <th class=" min-w-100px">الحالة</th>
                                                <th class=" min-w-100px">تعديل</th>

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
                                </div>
                                <!--end::General options-->

                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Main column-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

@endsection



@section('script')
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
                        text: '<i class="bi bi-printer-fill "></i>',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl').prepend(
                                ' <table> ' +
                                '                        <tbody> ' +
                                '                                <tr>' +
                                '                                    <td style="text-align: center"><p>المملكة العربية السعودية</p> <p>وزارة الموارد البشرية والتنمية الاجتماعية</p> <p>الجمعية الخيرية لتحفيظ القرآن الكريم بمحافظه عنيزة</p></td>' +
                                '                                    <td style="text-align: right"> <img src="" width="150px" height="150px" /> </td>' +
                                '                                    <td style="text-align: right"><p>عنوان التقرير : {{ trans("s_admin.nav_students_reports")  }}</p>' +
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
                        text: '<i class="bi bi-file-earmark-spreadsheet-fill "></i>',
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
                ajax: '{{ route('admin.settings.zones.datatable') }}',
                "columns": [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', "searchable": false, "orderable": false},
                    {"data": "name", "searchable": false, "orderable": false},
                    {"data": "status", "searchable": false, "orderable": false},
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

    {{-- Delete --}}
    <script>
        $(document).on("click", ".delete", function () {
            var row_id = $(this).data('id');
            $(".modal-body #row_id").val(row_id);
        });

        $('.delete_btn').on('click', function () {
            $('#delete_form').submit();
        })
    </script>

    <!--    Delete Multi-->

    <script>
        var $bulkDeleteBtn = $('#bulk_delete_btn');
        $bulkdeleteinput = $('#ids');

        $bulkDeleteBtn.click(function (e) {
            var $checkedBoxes = $('#kt_ecommerce_products_table input[type=checkbox]:checked').not('.select_all');
            var count = $checkedBoxes.length;
            if (count) {
                var myids = [];
                $bulkdeleteinput.val('');
                $.each($checkedBoxes, function () {
                    var value = $(this).val();
                    if (value !== 'on') {
                        myids.push(value);
                    }
                });
                // Set input value
                $bulkdeleteinput.val(myids);
                $('#dynamic').modal('show');
            } else {
                // No row selected
                toastr.warning('Choose At Least One');
            }
        });

        $('.delete_multi_btn').on('click', function () {
            $('#delete_multi_form').submit();
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
                        url: '{{route('admin.settings.zones.delete')}}',
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

    {{--    for map--}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAi4yKthIBU-bHeuQHPgpJmdXnuLxKGc1s&libraries=drawing,places&v=3.45.8"></script>

    <script>
        var map; // Global declaration of the map
        var drawingManager;
        var lastpolygon = null;
        var polygons = [];

        function resetMap(controlDiv) {
            // Set CSS for the control border.
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginTop = "8px";
            controlUI.style.marginBottom = "22px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Reset map";
            controlDiv.appendChild(controlUI);
            // Set CSS for the control interior.
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25)";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "10px";
            controlText.style.lineHeight = "16px";
            controlText.style.paddingLeft = "2px";
            controlText.style.paddingRight = "2px";
            controlText.innerHTML = "X";
            controlUI.appendChild(controlText);
            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener("click", () => {
                lastpolygon.setMap(null);
                $('#coordinates').val('');

            });
        }

        function initialize() {

                @php
                    $default_location= settings('default_location') ;

                    $default_location = json_decode($default_location, true);
                @endphp

            var myLatlng = {
                    lat: {{$default_location?$default_location['lat']:'23.757989'}},
                    lng: {{$default_location?$default_location['lng']:'90.360587'}}
                };


            var myOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                },
                polygonOptions: {
                    editable: true
                }
            });
            drawingManager.setMap(map);


            //get current location block
            // infoWindow = new google.maps.InfoWindow();
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        map.setCenter(pos);
                    });
            }

            google.maps.event.addListener(drawingManager, "overlaycomplete", function (event) {
                if (lastpolygon) {
                    lastpolygon.setMap(null);
                }
                $('#coordinates').val(event.overlay.getPath().getArray());
                lastpolygon = event.overlay;
                auto_grow();
            });

            const resetDiv = document.createElement("div");
            resetMap(resetDiv, lastpolygon);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(resetDiv);

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);


        function set_all_zones() {
            $.get({
                url: '{{route('admin.settings.zones.zoneCoordinates')}}',
                dataType: 'json',
                success: function (data) {

                    console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        polygons.push(new google.maps.Polygon({
                            paths: data[i],
                            strokeColor: "#FF0000",
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: "#FF0000",
                            fillOpacity: 0.1,
                        }));
                        polygons[i].setMap(map);
                    }

                },
            });
        }

        $(document).on('ready', function () {
            set_all_zones();
        });

    </script>
    <script>
        $('#search-form').on('submit', function () {
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('admin.settings.zones.search')}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#set-rows').html(data.view);
                    $('#itemCount').html(data.total);
                    $('.page-area').hide();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        });
    </script>


@endsection
