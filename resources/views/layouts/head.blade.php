<head>
    <base href="">
    <title>
        Winch out
    </title>
    <meta charset="utf-8"/>
    <meta name="description" content="Proten Chef"/>
    <meta name="keywords" content="Proten Chef"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Proten Chef"/>
    <meta property="og:url" content="http://tesolutionspro.com/metronic"/>
    <meta property="og:site_name" content="Proten Chef"/>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
{{--<link rel="shortcut icon" href="{{url('/').'/uploads/Settings/'.\App\Models\Setting::where('key', 'fav_icon')->first()->value}}"/>--}}
<!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->

    <link href="{{ url('admin/dist/') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ url('admin/dist/') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ url('admin/dist/') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin/dist/') }}/assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <link href="{{asset('admin/dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/dist/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        .app-f-color {
            color: #f40001 !important;
        }

        .app-bg-color {
            background-color: #f40001 !important;
        }

        .svg-icon-orange {
            transition: fill 0.3s ease;
            fill: #f40001 !important;
        }

        @font-face {
            font-family: 'din';
            src: url({{asset('din.ttf')}}) format('opentype');
        }

        body, h1, h2, h3, h4, h5, h6, * {
            font-family: 'din';
        }

        /*.aside.aside-dark {*/
        /*    background-color: #5A55BF!important;*/
        /*}*/
        .aside-dark .menu .menu-item .menu-link .menu-title {
            color: white;
        }

        .aside-dark .menu .menu-item .menu-link.active {
            background-color: #292D32;
        }

        .btn-secondary {
            background-color: #f40001 !important;
        }

        .nav-line-tabs .nav-item .nav-link.active, .nav-line-tabs .nav-item.show .nav-link, .nav-line-tabs .nav-item .nav-link:hover:not(.disabled) {
            border-bottom: 2px solid #f40001 !important;
        }

        .aside-dark .menu .menu-item .menu-link.active {
            background-color: #f40001 !important;
        }

        .aside-dark .menu .menu-item .menu-section {
            color: white !important;
        }

        .aside.aside-dark .separator {
            border-bottom-color: white !important;
        }

        .aside.aside-dark .aside-logo {
            border: 7px solid #000000 !important;
            border-radius: 5px;
        }

        .btn-danger {
            background-color: #ea4335 !important;
        }

        .btn-warning {
            background-color: #f40001 !important;
        }

        .btn-success {
            background-color: #0ac630 !important;
        }

        .page-link {
            background-color: #f40001 !important;
            color: #3F4254 !important;
        }

    </style>

    @yield('style')
</head>
