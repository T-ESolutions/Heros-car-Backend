<!--begin::Header-->
<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                 id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
											<path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black"/>
											<path opacity="0.3"
                                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                  fill="black"/>
										</svg>
									</span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{route('home')}}" class="d-lg-none">
                <img alt="Logo" src="{{asset('/')}}/default.png" class="h-30px"/>
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                     data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
{{--                    <div--}}
{{--                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"--}}
{{--                        id="#kt_header_menu" data-kt-menu="true">--}}
{{--                        <div class="menu-item me-lg-1">--}}
{{--                            <a class="menu-link @if(request()->segment(2) == 'home') active @endif py-3"--}}
{{--                               href="{{route('home')}}">--}}
{{--                                <span class="menu-title">الرئيسية</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item me-lg-1">--}}
{{--                            <a class="menu-link @if(request()->segment(2) == 'reports') active @endif py-3"--}}
{{--                               href="{{route('admin.reports')}}">--}}
{{--                                <span class="menu-title">التقارير</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item me-lg-1">--}}
{{--                            <a class="menu-link @if(request()->segment(2) == 'users') active @endif py-3"--}}
{{--                               href="{{route('admin.users')}}">--}}
{{--                                <span class="menu-title">العملاء</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item me-lg-1">--}}
{{--                            <a class="menu-link @if(request()->segment(2) == 'admins') active @endif py-3"--}}
{{--                               href="{{route('admin.admins')}}">--}}
{{--                                <span class="menu-title">المشرفين</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"--}}
{{--                             class="menu-item menu-lg-down-accordion me-lg-1">--}}
{{--												<span--}}
{{--                                                    class="menu-link @if(request()->segment(2) == 'orders' ) active @endif py-3">--}}
{{--													<span class="menu-title">الطلبات</span>--}}
{{--													<span class="menu-arrow d-lg-none"></span>--}}
{{--												</span>--}}
{{--                            <div--}}
{{--                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'pending' ) active @endif py-3"--}}
{{--                                       href="#"--}}
{{--                                       title="طلبات جديدة في إنتظار الموافقة من مدير النظام" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: /icons/duotune/general/gen002.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">الطلبات قيد الموافقة</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'accepted' ) active @endif py-3"--}}
{{--                                       href="#"--}}
{{--                                       title="طلبات بها وجبات جاري تسليمها الي العملاء" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">الطلبات الحالية</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'finished' ) active @endif py-3"--}}
{{--                                       href="#"--}}
{{--                                       title="طلبات بها وجبات تم تسليمها الي العملاء" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path--}}
{{--                                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">الطلبات المنتهية</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'canceled' ) active @endif py-3"--}}
{{--                                       href="#" title="طلبات بها وجبات تم إلغائها"--}}
{{--                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"--}}
{{--                                       data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path--}}
{{--                                                                            d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">الطلبات الملغية</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'canceled' ) active @endif py-3"--}}
{{--                                       href="{{route('admin.cancel_requests')}}" title="طلبات الإلغاء"--}}
{{--                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"--}}
{{--                                       data-bs-placement="right">--}}
{{--                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}

{{--                                        <i class="fa fa-recycle text-danger"></i>--}}
{{--                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                                        <span class="menu-title text-danger" >طلبات الإلغاء</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"--}}
{{--                             class="menu-item menu-lg-down-accordion me-lg-1">--}}
{{--												<span--}}
{{--                                                    class="menu-link @if(request()->segment(2) == 'meals' ) active @endif py-3">--}}
{{--													<span class="menu-title"> الوجبات</span>--}}
{{--													<span class="menu-arrow d-lg-none"></span>--}}
{{--												</span>--}}
{{--                            <div--}}
{{--                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown w-100 w-lg-600px p-5 p-lg-5">--}}
{{--                                <!--begin:Row-->--}}
{{--                                <div class="row" data-kt-menu-dismiss="true">--}}
{{--                                    <!--begin:Col-->--}}
{{--                                    <div class="col-lg-4 border-left-lg-1">--}}
{{--                                        <div class="menu-inline menu-column menu-active-bg">--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--end:Col-->--}}
{{--                                    <!--begin:Col-->--}}
{{--                                    <div class="col-lg-4 border-left-lg-1">--}}
{{--                                        <div class="menu-inline menu-column menu-active-bg">--}}

{{--                                                    <div class="menu-item">--}}
{{--                                                        <a href="#"--}}
{{--                                                           class="menu-link @if(request()->segment(2) == 'meals' && request()->segment(3) == 'meal_type' || 1 ) active @endif">--}}
{{--                                                                            <span class="menu-bullet">--}}
{{--                                                                                <span class="bullet bullet-dot"></span>--}}
{{--                                                                            </span>--}}
{{--                                                            <span class="menu-title">title_ar</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--end:Col-->--}}
{{--                                    <!--begin:Col-->--}}
{{--                                    <div class="col-lg-4 border-left-lg-1">--}}
{{--                                        <div class="menu-inline menu-column menu-active-bg">--}}

{{--                                                    <div class="menu-item">--}}
{{--                                                        <a href="#"--}}
{{--                                                           class="menu-link @if(request()->segment(2) == 'meals' && request()->segment(3) == 'id' || 1 ) active @endif">--}}
{{--                                                                            <span class="menu-bullet">--}}
{{--                                                                                <span class="bullet bullet-dot"></span>--}}
{{--                                                                            </span>--}}
{{--                                                            <span class="menu-title">title_aruuu</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--end:Col-->--}}
{{--                                </div>--}}
{{--                                <!--end:Row-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"--}}
{{--                             class="menu-item menu-lg-down-accordion me-lg-1">--}}
{{--												<span--}}
{{--                                                    class="menu-link @if(request()->segment(2) == 'package-type-prices' ) active @endif py-3">--}}
{{--													<span class="menu-title">خطط أسعار الباقات</span>--}}
{{--													<span class="menu-arrow d-lg-none"></span>--}}
{{--												</span>--}}
{{--                            <div--}}
{{--                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">--}}
{{--                                    <div class="menu-item">--}}
{{--                                        <a class="menu-link @if(request()->segment(2) == 'package-type-prices' && request()->segment(3) == 'id' || 1 ) active @endif py-3"--}}
{{--                                           href="#"--}}
{{--                                           title="package_title_ar" data-bs-toggle="tooltip"--}}
{{--                                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                            <span class="menu-title">package_title_ar</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"--}}
{{--                             class="menu-item menu-lg-down-accordion me-lg-1">--}}
{{--												<span--}}
{{--                                                    class="menu-link @if(request()->segment(2) == 'package-meals' ) active @endif py-3">--}}
{{--													<span class="menu-title">وجبات الباقات</span>--}}
{{--													<span class="menu-arrow d-lg-none"></span>--}}
{{--												</span>--}}
{{--                            <div--}}
{{--                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">--}}
{{--                                    <div class="menu-item">--}}
{{--                                        <a class="menu-link @if(request()->segment(2) == 'package-meals' && request()->segment(3) == '$package->id' || 1) active @endif py-3"--}}
{{--                                           href="#}"--}}
{{--                                           title="package_title_ar" data-bs-toggle="tooltip"--}}
{{--                                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                            <span class="menu-title">--}}
{{--                                                وجبات--}}
{{--                                                &nbsp;--}}
{{--                                                package_title_ar--}}
{{--                                            </span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"--}}
{{--                             class="menu-item menu-lg-down-accordion me-lg-1">--}}
{{--												<span--}}
{{--                                                    class="menu-link py-3">--}}
{{--													<span class="menu-title">صفحات و إعدادات</span>--}}
{{--													<span class="menu-arrow d-lg-none"></span>--}}
{{--												</span>--}}
{{--                            <div--}}
{{--                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">--}}

{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'notifications' ) active @endif py-3"--}}
{{--                                       href="{{route('admin.notifications')}}"--}}
{{--                                       title="الإشعارات" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">الإشعارات</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'coupons' ) active @endif py-3"--}}
{{--                                       href="{{route('admin.coupons')}}"--}}
{{--                                       title="كوبونات الخصم" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">كوبونات الخصم</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'screens') active @endif py-3"--}}
{{--                                       href="{{route('admin.screens')}}"--}}
{{--                                       title="الشاشات الترحيبية" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">الشاشات الترحيبية</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'sliders') active @endif py-3"--}}
{{--                                       href="{{route('admin.sliders')}}"--}}
{{--                                       title="السلايدر" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">السلايدر</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'offers' ) active @endif py-3"--}}
{{--                                       href="{{route('admin.offers')}}"--}}
{{--                                       title="العروض" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">العروض</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'settings' && request()->segment(3) == 'edit' ) active @endif py-3"--}}
{{--                                       href="{{route('admin.settings')}}"--}}
{{--                                       title="الإعدادات العامة" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">الإعدادات العامة</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'notification-settings' && request()->segment(3) == 'edit' ) active @endif py-3"--}}
{{--                                       href="{{route('admin.notification-settings.edit')}}"--}}
{{--                                       title="إعدادات الإشعارات" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">إعدادات الإشعارات</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link @if(request()->segment(2) == 'settings' && request()->segment(3) == 'zones' ) active @endif py-3"--}}
{{--                                       href="{{route('admin.settings.zones.edit', 1)}}"--}}
{{--                                       title="إعدادات منطقة التوصيل" data-bs-toggle="tooltip"--}}
{{--                                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">--}}
{{--															<span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                                                              fill="black"/>--}}
{{--																		<path--}}
{{--                                                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                                                            fill="black"/>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                                                <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                                        <span class="menu-title">إعدادات منطقة التوصيل</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                        <div class="menu-item me-lg-1">--}}
{{--                            <a class="menu-link py-3" title="app store"--}}
{{--                               target="_blank" href="https://www.apple.com/eg-ar/app-store/">--}}
{{--                              <span class="symbol symbol-35">--}}
{{--                                <img alt="app store image" style="width: 35px; height: 35px;" src="{{url('/')}}/uploads/appstore.png"/>--}}
{{--                            </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item me-lg-1">--}}
{{--                            <a class="menu-link  py-3" title="google play"--}}
{{--                               target="_blank" href="https://play.google.com/store">--}}
{{--                              <span class="symbol symbol-35">--}}
{{--                                <img alt="google play image"  style="width: 35px; height: 35px;" src="{{url('/')}}/uploads/google_play.png"/>--}}
{{--                            </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item me-lg-1">--}}
{{--                            <a class="menu-link  py-3" title="huawei app gallery"--}}
{{--                               target="_blank" href="https://appgallery.huawei.com/Featured">--}}
{{--                              <span class="symbol symbol-35">--}}
{{--                                <img alt="huawei app gallery image"  style="width: 35px; height: 35px;" src="{{url('/')}}/uploads/huawei_appgallery.png"/>--}}
{{--                            </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="d-flex align-items-stretch flex-shrink-0">


                    <!--begin::cancel requests-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <!--begin::Menu wrapper-->
                        <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px"  title="طلبات الإلغاء">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                            <a class="menu-link @if(request()->segment(2) == 'cancel_requests') active @endif py-3"
                               href="{{route('admin.cancel_requests')}}"
                               title="طلبات الإلغاء" data-bs-toggle="tooltip"
                               data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">

                                <i class="fa fa-recycle text-danger"></i>
                                <span class="text-danger m-1">88</span>

                            </a>
                            <!--end::Svg Icon-->
                            @if(1)
                                <span class="bullet bullet-dot bg-danger h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                            @endif
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::cancel requests-->

                    <!--begin::cancel requests-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <!--begin::Menu wrapper-->
                        <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px"  title="طلبات قيد الموافقة">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                            <a class="menu-link @if(request()->segment(2) == 'orders' && request()->segment(3) == 'pending' ) active @endif py-3"
                               href="#"
                               title="طلبات قيد الموافقة" data-bs-toggle="tooltip"
                               data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">

                                <i class="fa fa-cart-plus text-primary"></i>
                                <span class="text-primary m-1">33</span>

                            </a>
                            <!--end::Svg Icon-->
                            @if(1)
                                <span class="bullet bullet-dot bg-primary h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                            @endif
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::cancel requests-->


                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                             data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            <img src="{{auth('admin')->user()->image}}" alt="user"/>
                        </div>
                        <!--begin::Menu-->
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{auth('admin')->user()->image}}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{auth()->user()->name}}
                                            <span
                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"></span>
                                        </div>
                                        <a href="javascript:void($this);"
                                           class="fw-bold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{route('admin.admins.edit', auth()->user()->id)}}" class="menu-link px-5">الملف
                                    الشخصي</a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{route('admin.logout')}}" class="menu-link px-5">تسجيل الخروج</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                    <!--begin::Heaeder menu toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                             id="kt_header_menu_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                            <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<path
                                                            d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                                            fill="black"/>
														<path opacity="0.3"
                                                              d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                                              fill="black"/>
													</svg>
												</span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Heaeder menu toggle-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
