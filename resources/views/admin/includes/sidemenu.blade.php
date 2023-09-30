<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">

    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto h-160px" id="kt_aside_logo" style="background-color: white">
        <!--begin::Logo-->
        <a href="{{asset('/')}}">
            <img alt="Logo" src="{{asset('/')}}/default2.png" class="h-80px logo p-5"
                 width="200px" height="350px"/>
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<path opacity="0.5"
                                          d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                          fill="black"/>
									<path
                                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                        fill="black"/>
								</svg>
							</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div
                class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'home') active @endif" href="{{route('home')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Home.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                        fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الرئيسية</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">المستخدمين</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'users' ) active @endif"
                       href="{{route('admin.users')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg
                                   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                           </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">العملاء</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'admins' ) active @endif"
                       href="{{route('admin.admins')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Clothes\Tie.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M14.1124454,7.00625159 C14.0755336,7.00212117 14.0380145,7 14,7 L10,7 C9.96198549,7 9.92446641,7.00212117 9.88755465,7.00625159 L7.34761705,4.55799196 C6.95060373,4.17530866 6.9382927,3.54346816 7.32009765,3.14561006 L8.41948359,2 L15.5805164,2 L16.6799023,3.14561006 C17.0617073,3.54346816 17.0493963,4.17530866 16.6523829,4.55799196 L14.1124454,7.00625159 Z"
                                        fill="#000000"/>
                                    <path
                                        d="M13.7640285,9 L15.4853424,18.1494183 C15.5450675,18.4668794 15.4477627,18.7936387 15.2240963,19.0267093 L12.7215131,21.6345146 C12.7120098,21.6444174 12.7023037,21.6541236 12.6924008,21.6636269 C12.2939201,22.0460293 11.6608893,22.0329953 11.2784869,21.6345146 L8.77590372,19.0267093 C8.55223728,18.7936387 8.45493249,18.4668794 8.5146576,18.1494183 L10.2359715,9 L13.7640285,9 Z"
                                        fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">المشرفين</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الطلبات</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'pending' ) active @endif"
                       href="#">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                           <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path opacity="0.3"
                                          d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                          fill="black"/>
                                    <path
                                        d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                        fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الطلبات قيد الموافقة</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'accepted' ) active @endif"
                       href="#">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path opacity="0.3"
                                          d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                          fill="black"/>
                                    <path
                                        d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                        fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الطلبات الحالية</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'finished' ) active @endif"
                       href="#">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path opacity="0.3"
                                          d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                          fill="black"/>
                                    <path
                                        d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                        fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الطلبات المنتهية</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'canceled' ) active @endif"
                       href="#">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path opacity="0.3"
                                          d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                          fill="black"/>
                                    <path opacity="0.3"
                                          d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                          fill="black"/>
                                    <path
                                        d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                        fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الطلبات الملغية</span>
                    </a>
                </div>
                {{--                <div class="menu-item">--}}
                {{--                    <a class="menu-link @if(request()->segment(2) == 'cancel_requests') active @endif"--}}
                {{--                       href="{{route('admin.cancel_requests')}}">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->--}}
                {{--                            <i class="fa fa-recycle text-danger"></i>--}}
                {{--                            <!--end::Svg Icon-->--}}
                {{--                        </span>--}}
                {{--                        <span class="menu-title">طلبات الإلغاء</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الاساسيات</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'departments') active @endif"
                       href="{{route('admin.departments')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Dial-numbers.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="4" y="10" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="10" y="4" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="10" y="10" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="16" y="4" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="16" y="10" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="4" y="16" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="10" y="16" width="4" height="4" rx="2"/>
        <rect fill="#000000" x="16" y="16" width="4" height="4" rx="2"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الاقسام الرئيسية</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'brands') active @endif"
                       href="{{route('admin.brands')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet3.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
            fill="#000000"/>
        <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">مركات السيارات</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'colors') active @endif"
                       href="{{route('admin.colors')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Design\Color-profile.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <circle fill="#000000" cx="12" cy="9" r="5"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الوان السيارات</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الصفحات</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'screens') active @endif"
                       href="{{route('admin.screens')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\TV1.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path
                                            d="M4.5,6 L19.5,6 C20.8807119,6 22,6.97004971 22,8.16666667 L22,16.8333333 C22,18.0299503 20.8807119,19 19.5,19 L4.5,19 C3.11928813,19 2,18.0299503 2,16.8333333 L2,8.16666667 C2,6.97004971 3.11928813,6 4.5,6 Z M4,8 L4,17 L20,17 L20,8 L4,8 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <polygon fill="#000000" opacity="0.3" points="4 8 4 17 20 17 20 8"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="20" width="10" height="1" rx="0.5"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الشاشات الترحيبية</span>
                    </a>
                </div>
                {{--                <div class="menu-item">--}}
                {{--                    <a class="menu-link @if(request()->segment(2) == 'sliders') active @endif"--}}
                {{--                       href="{{route('admin.sliders')}}">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->--}}
                {{--                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Picture.svg--><svg--}}
                {{--                                    xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"--}}
                {{--                                        height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{--                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                {{--                                    <polygon points="0 0 24 0 24 24 0 24"/>--}}
                {{--                                    <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"/>--}}
                {{--                                    <polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"/>--}}
                {{--                                    <polygon fill="#000000" points="11 20 15.5 14 20 20"/>--}}
                {{--                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"/>--}}
                {{--                                </g>--}}
                {{--                            </svg><!--end::Svg Icon-->--}}
                {{--                            </span>--}}
                {{--                        </span>--}}
                {{--                        <span class="menu-title">السلايدر</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="menu-item">--}}
                {{--                    <a class="menu-link @if(request()->segment(2) == 'offers') active @endif"--}}
                {{--                       href="{{route('admin.offers')}}">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->--}}
                {{--                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Sale2.svg--><svg--}}
                {{--                                   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{--                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                {{--                                        <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                        <polygon fill="#000000" opacity="0.3"--}}
                {{--                                                 points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/>--}}
                {{--                                        <polygon fill="#000000"--}}
                {{--                                                 points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/>--}}
                {{--                                        <path--}}
                {{--                                            d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866"--}}
                {{--                                            fill="#000000" opacity="0.3"/>--}}
                {{--                                        <path--}}
                {{--                                            d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z"--}}
                {{--                                            fill="#000000" opacity="0.3"/>--}}
                {{--                                    </g>--}}
                {{--                                </svg><!--end::Svg Icon-->--}}
                {{--                           </span>--}}
                {{--                            <!--end::Svg Icon-->--}}
                {{--                        </span>--}}
                {{--                        <span class="menu-title">العروض</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="menu-item">--}}
                {{--                    <a class="menu-link @if(request()->segment(2) == 'coupons') active @endif"--}}
                {{--                       href="{{route('admin.coupons')}}">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->--}}
                {{--                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Ticket.svg--><svg--}}
                {{--                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{--                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                {{--                                        <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                        <path--}}
                {{--                                            d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z"--}}
                {{--                                            fill="#000000" opacity="0.3"--}}
                {{--                                            transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) "/>--}}
                {{--                                    </g>--}}
                {{--                                </svg><!--end::Svg Icon-->--}}
                {{--                                </span>--}}
                {{--                                <!--end::Svg Icon-->--}}
                {{--                            </span>--}}
                {{--                        <span class="menu-title">كوبونات الخصم</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'notifications') active @endif"
                       href="{{route('admin.notifications')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Notifications1.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <path
                                        d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z"
                                        fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الإشعارات</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">صفحات تطبيق المستخدم</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'pages' && request()->segment(4) == 'about'&& request()->segment(5) == 'user' ) active @endif"
                       href="{{route('admin.pages.edit',['about','user'])}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-check.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3"/>
                                    <path
                                        d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z"
                                        fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">من نحن</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'pages' && request()->segment(4) == 'terms'&& request()->segment(5) == 'user' ) active @endif"
                       href="{{route('admin.pages.edit',['terms','user'])}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-disabled.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3"/>
                                    <path
                                        d="M10.5857864,12 L9.17157288,10.5857864 C8.78104858,10.1952621 8.78104858,9.56209717 9.17157288,9.17157288 C9.56209717,8.78104858 10.1952621,8.78104858 10.5857864,9.17157288 L12,10.5857864 L13.4142136,9.17157288 C13.8047379,8.78104858 14.4379028,8.78104858 14.8284271,9.17157288 C15.2189514,9.56209717 15.2189514,10.1952621 14.8284271,10.5857864 L13.4142136,12 L14.8284271,13.4142136 C15.2189514,13.8047379 15.2189514,14.4379028 14.8284271,14.8284271 C14.4379028,15.2189514 13.8047379,15.2189514 13.4142136,14.8284271 L12,13.4142136 L10.5857864,14.8284271 C10.1952621,15.2189514 9.56209717,15.2189514 9.17157288,14.8284271 C8.78104858,14.4379028 8.78104858,13.8047379 9.17157288,13.4142136 L10.5857864,12 Z"
                                        fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الشروط والاحكام</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'pages' && request()->segment(4) == 'privacy'&& request()->segment(5) == 'user' ) active @endif"
                       href="{{route('admin.pages.edit',['privacy','user'])}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-protected.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3"/>
                                    <path
                                        d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z"
                                        fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">سياسة الخصوصية</span>
                    </a>
                </div>

{{--                driver pages                 --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">صفحات تطبيق السائق</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'pages' &&
request()->segment(4) == 'about'&& request()->segment(5) == 'driver' ) active @endif"
                       href="{{route('admin.pages.edit',['about','driver'])}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-check.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3"/>
                                    <path
                                        d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z"
                                        fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">من نحن</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'pages' &&
request()->segment(4) == 'terms'&& request()->segment(5) == 'driver' ) active @endif"
                       href="{{route('admin.pages.edit',['terms','driver'])}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-disabled.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3"/>
                                    <path
                                        d="M10.5857864,12 L9.17157288,10.5857864 C8.78104858,10.1952621 8.78104858,9.56209717 9.17157288,9.17157288 C9.56209717,8.78104858 10.1952621,8.78104858 10.5857864,9.17157288 L12,10.5857864 L13.4142136,9.17157288 C13.8047379,8.78104858 14.4379028,8.78104858 14.8284271,9.17157288 C15.2189514,9.56209717 15.2189514,10.1952621 14.8284271,10.5857864 L13.4142136,12 L14.8284271,13.4142136 C15.2189514,13.8047379 15.2189514,14.4379028 14.8284271,14.8284271 C14.4379028,15.2189514 13.8047379,15.2189514 13.4142136,14.8284271 L12,13.4142136 L10.5857864,14.8284271 C10.1952621,15.2189514 9.56209717,15.2189514 9.17157288,14.8284271 C8.78104858,14.4379028 8.78104858,13.8047379 9.17157288,13.4142136 L10.5857864,12 Z"
                                        fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الشروط والاحكام</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(request()->segment(2) == 'pages' &&
 request()->segment(4) == 'privacy'&& request()->segment(5) == 'driver' ) active @endif"
                       href="{{route('admin.pages.edit',['privacy','driver'])}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-protected.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3"/>
                                    <path
                                        d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z"
                                        fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">سياسة الخصوصية</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الإعدادات</span>
                    </div>
                </div>
                {{--                <div class="menu-item">--}}
                {{--                    <a class="menu-link @if(request()->segment(2) == 'settings' && request()->segment(3) == 'edit' ) active @endif"--}}
                {{--                       href="{{route('admin.settings')}}">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->--}}
                {{--                            <span class="svg-icon svg-icon-warning svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Settings-2.svg--><svg--}}
                {{--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{--                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                {{--                                    <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"--}}
                {{--                                        fill="#000000"/>--}}
                {{--                                </g>--}}
                {{--                            </svg><!--end::Svg Icon-->--}}
                {{--                            </span>--}}
                {{--                            <!--end::Svg Icon-->--}}
                {{--                        </span>--}}
                {{--                        <span class="menu-title">الإعدادات العامة</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="menu-item">--}}
                {{--                    <a class="menu-link @if(request()->segment(2) == 'settings' && request()->segment(3) == 'zones' ) active @endif"--}}
                {{--                       href="{{route('admin.settings.zones.edit', 1)}}">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->--}}
                {{--                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Map\Marker1.svg--><svg--}}
                {{--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{--                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                {{--                                    <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"--}}
                {{--                                        fill="#000000" fill-rule="nonzero"/>--}}
                {{--                                </g>--}}
                {{--                            </svg><!--end::Svg Icon-->--}}
                {{--                            </span>--}}
                {{--                            <!--end::Svg Icon-->--}}
                {{--                        </span>--}}
                {{--                        <span class="menu-title">إعدادات منطقة التوصيل</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="menu-item">--}}
                {{--                    <a class="menu-link @if( request()->segment(2) == 'notification-settings' ) active @endif"--}}
                {{--                       href="{{route('admin.notification-settings.edit')}}">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->--}}
                {{--                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Alarm-clock.svg--><svg--}}
                {{--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{--                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                {{--                                    <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M7.14319965,19.3575259 C7.67122143,19.7615175 8.25104409,20.1012165 8.87097532,20.3649307 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 L7.14319965,19.3575259 Z M15.1367085,20.3616573 C15.756345,20.0972995 16.3358198,19.7569961 16.8634386,19.3524415 L17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L15.1367085,20.3616573 Z"--}}
                {{--                                        fill="#000000"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z M19.068812,3.25407593 L20.8181344,5.00339833 C21.4039208,5.58918477 21.4039208,6.53893224 20.8181344,7.12471868 C20.2323479,7.71050512 19.2826005,7.71050512 18.696814,7.12471868 L16.9474916,5.37539627 C16.3617052,4.78960984 16.3617052,3.83986237 16.9474916,3.25407593 C17.5332781,2.66828949 18.4830255,2.66828949 19.068812,3.25407593 Z M5.29862906,2.88207799 C5.8844155,2.29629155 6.83416297,2.29629155 7.41994941,2.88207799 C8.00573585,3.46786443 8.00573585,4.4176119 7.41994941,5.00339833 L5.29862906,7.12471868 C4.71284263,7.71050512 3.76309516,7.71050512 3.17730872,7.12471868 C2.59152228,6.53893224 2.59152228,5.58918477 3.17730872,5.00339833 L5.29862906,2.88207799 Z"--}}
                {{--                                        fill="#000000" opacity="0.3"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z"--}}
                {{--                                        fill="#000000"/>--}}
                {{--                                </g>--}}
                {{--                            </svg><!--end::Svg Icon-->--}}
                {{--                            </span>--}}
                {{--                        </span>--}}
                {{--                        <span class="menu-title">إعدادات الإشعارات</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div data-kt-menu-trigger="click"--}}
                {{--                     class="menu-item menu-accordion @if(request()->segment(2) == 'package_types_settings') hover show  @endif">--}}
                {{--                    <span class="menu-link @if(request()->segment(2) == 'package_types_settings') active @endif">--}}
                {{--                        <span class="menu-icon">--}}
                {{--                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->--}}
                {{--                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Money.svg--><svg--}}
                {{--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                {{--        <rect x="0" y="0" width="24" height="24"/>--}}
                {{--        <path--}}
                {{--            d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z"--}}
                {{--            fill="#000000" opacity="0.3"--}}
                {{--            transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>--}}
                {{--        <path--}}
                {{--            d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z"--}}
                {{--            fill="#000000"/>--}}
                {{--    </g>--}}
                {{--</svg><!--end::Svg Icon--></span>--}}
                {{--                            <!--end::Svg Icon-->--}}
                {{--                        </span>--}}
                {{--                        <span class="menu-title">إعدادات انواع الباقات</span>--}}
                {{--                        <span class="menu-arrow"></span>--}}
                {{--                    </span>--}}
                {{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
                {{--                        <div class="menu-item">--}}
                {{--                            <a class="menu-link @if(request()->segment(2) == 'package_types_settings' && request()->segment(3) == 'dynamic_types') active @endif"--}}
                {{--                               href="{{route('admin.package_types_settings.dynamic_types')}}">--}}
                {{--												<span class="menu-bullet">--}}
                {{--													<span class="bullet bullet-dot"></span>--}}
                {{--												</span>--}}
                {{--                                <span class="menu-title">انواع الايام</span>--}}
                {{--                            </a>--}}
                {{--                        </div>--}}
                {{--                        <div class="menu-item">--}}
                {{--                            <a class="menu-link @if(request()->segment(2) == 'package_types_settings' && request()->segment(3) == 'dynamic_times') active @endif"--}}
                {{--                               href="{{route('admin.package_types_settings.dynamic_times')}}">--}}
                {{--												<span class="menu-bullet">--}}
                {{--													<span class="bullet bullet-dot"></span>--}}
                {{--												</span>--}}
                {{--                                <span class="menu-title">انواع التوقيت</span>--}}
                {{--                            </a>--}}
                {{--                        </div>--}}

                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pt-0 pb-5 px-5" id="kt_aside_footer">
        <a href="http://tesolutionspro.com" class="btn  btn-white w-100" target="_blank"
           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
           style="padding-top:5px;padding-bottom: 5px"
           title="TES شركة مصرية متخصصة في برمجة تطبيقات الجوال و المواقع الالكترونية">
            <span class="btn-label">
                <img alt="TES Logo" src="{{asset('/')}}/tes.png" class=" logo p-0"
                     style="width: 50%;height: 60%" ;/>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
