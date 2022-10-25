<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | {{$setting->title}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{url($setting->icon_site)}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-rtl.min.css')}}">
    
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{asset('admin/css/custom-style.css')}}">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="{{asset('admin/css/persian-datepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/new/style.css') }}">
    <style>
        @font-face {
            font-family: 'Vazirmatn';
            src: url({{ asset('fonts/webfonts/Vazirmatn-Light.woff2') }}); /* IE9 Compat Modes */
            src: url({{ asset('fonts/webfonts/Vazirmatn-Light.woff2') }}) format('embedded-opentype'), /* IE6-IE8 */
            url({{ asset('fonts/webfonts/Vazirmatn-Light.woff2') }}) format('woff2'), /* Super Modern Browsers */
            url({{ asset('fonts/webfonts/Vazirmatn-Light.woff2') }}) format('woff'), /* Pretty Modern Browsers */
            url({{ asset('fonts/ttf/Vazirmatn-Light.ttf') }})  format('truetype'), /* Safari, Android, iOS */
        }
        body {
            font-size: 13px;
            font-family: "Vazirmatn" !important;
            line-height: 26px !important;
            color: #6c6c6c !important;
            background-color: #f0f0f0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .btn {
            font-weight: normal !important;
            font-family: "Vazirmatn" !important;
        }
    </style>
    @yield('css')
    <style>
        .sidebar {
            overflow-y: initial;
            padding-top: 0.5rem;
        }
        .sidebar-dark-primary , .navbar-expand , .navbar-expand .navbar-nav .dropdown-menu {
            background-color: #2F2D51 !important;
        }
        .sidebar-dark-primary .sidebar a , .sidebar-dark-primary .nav-treeview>.nav-item>.nav-link , .dropdown-item , .navbar-light .navbar-nav .nav-link {
            color: white;
        }
        #lorem a { 
            color: rgba(0, 0, 0, 0.719);
        }
        a.nav-link:hover {
            color: white !important;
        }
        .card-primary.card-outline , .res_table{
            border-radius: 20px;
        }
        .main-sidebar .brand-text, .sidebar .nav-link p, .sidebar .user-panel .info {
            color: white !important;
        }
        .footer-bar-1 .active-nav i, .footer-bar-1 .active-nav span, .footer-bar-3 .active-nav i{
            color: #2F2D51 !important;
        }
        .form-control {
            height: auto !important;
        }
        .small-box .icon {
            top: 10px;
            font-size: 60px;
        }
        .btn-info {
            background: #fe5722 !important;
        }
        .btn-danger {
            background: #20364b !important;
        }
        .bg-dark {
            background: #20364b !important;
        }
        .text-dark {
            color: #20364b !important;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('user.index')}}" target="_blank" class="nav-link">@item($setting->title)</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown has-treeview">
                <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user ml-1"></i>
                        @item(Auth::user()->first_name) @item(auth()->user()->last_name)
                        <i class="right fa fa-angle-down mr-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-sm">
                    <a href="{{route('admin.profile.show')}}" class="dropdown-item">
                        <i class="fa fa-user ml-1"></i>
                        پروفایل
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off ml-1"></i>
                        خروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="javascript:void(0);" class="brand-link">
            <img src="{{url($setting->logo_site)}}" alt="AdminLTE Logo" class="brand-image">
            @role('مدیر')
            <span class="brand-text font-weight-light">پنل مدیریت</span>
            @endrole
            @role('حقوقی')
            <span class="brand-text font-weight-light">پنل کارشناس حقوقی</span>
            @endrole
            @role('ویزا')
            <span class="brand-text font-weight-light">پنل کارشناس ویزا</span>
            @endrole
            @role('استعدادیابی')
            <span class="brand-text font-weight-light">پنل کارشناس استعدادیابی</span>
            @endrole
            @role('تور')
            <span class="brand-text font-weight-light">پنل کارشناس تور و گردشگری</span>
            @endrole
            @role('کاربر')
            <span class="brand-text font-weight-light">پنل کاربری</span>
            @endrole
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{Auth::user()->photo? url(Auth::user()->photo->path) :asset('admin/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('admin.profile.show')}}" title="نمایش پروفایل" class="d-block">@item(Auth::user()->first_name) @item(auth()->user()->last_name)</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <a href="{{route('user.index')}}" class="nav-link">
                            <i class="fa fa-home" style="font-size: 24px;"></i>
                            <p class="px-1">صفحه اصلی</p>
                        </a>
                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    داشبورد
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview border-bottom">
                                <li class="nav-item">
                                    <a href="{{route('admin.profile.edit')}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>ویرایش پروفایل</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{route('admin.password.edit')}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>ویرایش رمز عبور</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                            
                        @role( 'استعدادیابی' )
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-cog"></i>
                                    <p>
                                        محتوا اپلیکیشن
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.notification.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ارسال اعلان و پیام</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.contact.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تیکت مشاوره</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        دسته بندی
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>آیتم های دسته بندی ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.package.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>کارگاه ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole

                        @role( 'ویزا' )
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-cog"></i>
                                    <p>
                                        محتوا اپلیکیشن
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.notification.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ارسال اعلان و پیام</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.contact.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تیکت مشاوره</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        دسته بندی
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>آیتم های دسته بندی ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.package.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>کارگاه ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole

                        @role( 'برندینگ و فرنچایز' )
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-cog"></i>
                                    <p>
                                        محتوا اپلیکیشن
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.notification.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ارسال اعلان و پیام</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.contact.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تیکت مشاوره</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        دسته بندی
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>آیتم های دسته بندی ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.package.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>کارگاه ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole

                        @role( 'تور' )
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-cog"></i>
                                    <p>
                                        محتوا اپلیکیشن
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.notification.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ارسال اعلان و پیام</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.slider.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تبلیغات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.ads-tours.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تورهای گردشگری</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.contact.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تیکت مشاوره</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @endrole
                        
                        @role('مدیر')
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-user"></i>
                                    <p>
                                        کاربران
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.user.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست کاربران</p>
                                        </a>
                                    </li>
                                    {{--<li class="nav-item">--}}
                                        {{--<a href="{{route('admin.marketer.list')}}" class="nav-link">--}}
                                            {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                            {{--<p>لیست بازاریاب ها</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a href="{{route('admin.agent.list')}}" class="nav-link">--}}
                                            {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                            {{--<p>لیست نمایندگان</p>--}}
                                            {{--@if($agent>0)--}}
                                                {{--<span class="right badge badge-danger">جدید</span>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a href="{{route('admin.agent.request.list')}}" class="nav-link">--}}
                                            {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                            {{--<p>درخواست نمایندگی</p>--}}
                                            {{--@if($agent_request>0)--}}
                                                {{--<span class="right badge badge-danger">جدید</span>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-cog"></i>
                                    <p>
                                        محتوا اپلیکیشن
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.notification.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ارسال اعلان و پیام</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.slider.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تبلیغات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.ads-tours.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تورهای گردشگری</p>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{route('admin.customer.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>مشتریان</p>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{route('admin.contact.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تیکت مشاوره</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.about.edit')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>درباره ما</p>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{route('admin.guide.edit')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>راهنمای نحوه خرید</p>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{route('admin.rule.edit')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>قوانین آی مشاور</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.off.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>کد های تخفیف</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        دسته بندی
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.category.list')}}" class="nav-link ">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>دسته بندی های اصلی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>آیتم های دسته بندی ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.package.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>کارگاه ها</p>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{route('admin.service.learn.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست خدمات آموزشگاهی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.learn.package.category.list')}}" class="nav-link ">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>دسته بندی پکیج ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.learn.package.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>پکیج آموزشگاهی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.service.buy.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                لیست خرید
                                                @if($order>0)
                                                        <span class="right badge badge-danger">جدید</span>
                                                @endif
                                            </p>
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        فرم ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.forms.show', 1)}}" class="nav-link ">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>عریضه ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.forms.show', 2)}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>مشاوره های خصوصی حقوقی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.forms.show', 3)}}" class="nav-link ">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>همه وبینارها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item px-3">
                                        <a href="{{route('admin.forms.show', 7)}}" class="nav-link ">
                                            <i class="fa fa-circle-o nav-icon text-info"></i>
                                            <p>وبینارهای حقوقی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item px-3">
                                        <a href="{{route('admin.forms.show', 8)}}" class="nav-link ">
                                            <i class="fa fa-circle-o nav-icon text-info"></i>
                                            <p>وبینارهای ویزا</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.forms.show', 4)}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>مشاوره های خصوصی ویزا</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.forms.show', 5)}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>فرم استعدادیابی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.forms.show', 6)}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>درخواست عقد قرارداد</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-pie-chart"></i>
                                    <p>
                                        گزارشات
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.report.transaction.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p> تراکنش ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-icon fa fa-cog"></i>
                                    <p>
                                        تنظیمات اپلیکیشن
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview border-bottom">
                                    <li class="nav-item">
                                        <a href="{{route('admin.form-price.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>قیمت فرم ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.network-setting.index')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>شبکه های اجتماعی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.setting.edit')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تنظیمات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.meta.list')}}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Meta</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$title1}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li id="lorem" class="breadcrumb-item active">
                                @if (\Request::route()->getName()=='admin.profile.show')
                                    <a href="{{route('user.index')}}">
                                @elseif (\Request::route()->getName()=='user.forms.index')
                                    <a href="{{route('admin.profile.show')}}">
                                @else
                                    <a href="{{url()->previous()}}">
                                @endif
                                        {{-- {{ \Request::route()->getName() }} --}}
                                        {!! $title2 !!}
                                        <i class='fa fa-arrow-left'></i>
                                    </a>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr class="mt-0">
        <!-- /.content-header -->

        <!-- Content Header (Page header) -->
        <div class="d-lg-none">
            @include('includes.bottomNavigationBar')
        </div>
        @yield('content')
    </div>

    <footer class="main-footer text-left mb-5 pb-4 mb-lg-0" style="font-size: smaller;">
        <strong>copyright &copy; 2022 <a href="https://adib-it.com/">Adib Group</a></strong>
    </footer>
</div>

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}
{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{--<!-- Morris.js charts -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>--}}
{{--<script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>--}}
{{--<!-- jvectormap -->--}}
{{--<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
{{--<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>--}}
{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="{{asset('admin/plugins/knob/jquery.knob.js')}}"></script>--}}
{{--<!-- daterangepicker -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>--}}
{{--<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>--}}
{{--<!-- datepicker -->--}}
{{--<script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>--}}

{{--<!-- Slimscroll -->--}}
{{--<script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>--}}
<!-- FastClick -->
{{--<script src="{{asset('admin/plugins/fastclick/fastclick.js')}}"></script>--}}
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/js/demo.js')}}"></script>
<!-- Persian Data Picker -->
<script src="{{asset('admin/js/persian-date.min.js')}}"></script>
<script src="{{asset('admin/js/persian-datepicker.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

<script>
    new ClipboardJS('.copy_btn');
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    @if(session()->has('err_message'))
    $(document).ready(function () {
        Swal.fire({
            title: "ناموفق",
            text: "{{ session('err_message') }}",
            icon: "warning",
            timer: 6000,
            timerProgressBar: true,
        })
    });
    @endif
    @if(session()->has('err_message'))
    $(document).ready(function () {
        Swal.fire({
            title: "ناموفق",
            text: "{{ session('err_message') }}",
            icon: "warning",
            timer: 6000,
            timerProgressBar: true,
        })
    });
    @endif
    @if(session()->has('flash_message'))
    $(document).ready(function () {
        Swal.fire({
            title: "موفق",
            text: "{{ session('flash_message') }}",
            icon: "success",
            timer: 6000,
            timerProgressBar: true,
        })
    })
    ;@endif
    @if (count($errors) > 0)
    $(document).ready(function () {
        Swal.fire({
            title: "ناموفق",
            icon: "warning",
            html:
                @foreach ($errors->all() as $key => $error)
                '<p class="text-right mt-2 ml-5" dir="rtl"> {{$key+1}} : '  +
                    '{{ $error }}'+
                '</p>'+
                @endforeach
                '<p class="text-right mt-2 ml-5" dir="rtl">' +
                    '</p>',
            timer:  @if(count($errors)>3)parseInt('{{count($errors)}}') * 1500 @else 6000 @endif,
            timerProgressBar: true,
        })
    });
    @endif


    $(document).ready(function () {
        $('.numberPrice').text(function (index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
</script>
@yield('js')
</body>
</html>
                        