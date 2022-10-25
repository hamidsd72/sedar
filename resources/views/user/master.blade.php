<!DOCTYPE HTML>
<html lang="en" dir="rtl">

@include('includes.head')

<style>
    body , .footer-bar-1, .header-fixed {
        max-width: 540px;
        margin: auto;
    }
</style>
<style>
    .checkbox-boxed + .checkbox-lable .image-boxed {
        background: #2f665f;
    }
    .checkbox-boxed:checked + .checkbox-lable .image-boxed {
        background: #DA4453;
    }
    [data-gradient=body-default] #page, .background-changer .body-default {
        background: #F3F7FA !important;
    }
    .theme-light #preloader {
        background: #F3F7FA !important;
    }
    .btn-info {
        background-color: #80D4FF;
        box-shadow: 0 3px 10px rgb(128 212 255 / 50%);
        -webkit-box-shadow: 0 3px 10px rgb(128 212 255 / 50%);
        color: white;
    }
    button.btn:hover , a.btn:hover {
        color: white !important;
    }
    body , main , .page-content {
        /* background: #F3F7FA !important; */
        background: #ececec !important;
    }
    .btn-info {
        background: #fe5722 !important;
    }
    .btn-danger {
        background: #20364b !important;
    }
    .flex-shrink-0 h4.mb-4 {
        color: #20364b;
    }
    .flex-shrink-0 .floating-form-group > .floating-label {
        width: 100%;
    }
    .flex-shrink-0 .floating-form-group .floating-input:focus + .floating-label, .floating-form-group .floating-input:focus:active + .floating-label{
        color: #20364b;
    }
    .bg-dark {
        background: #20364b !important;
    }
    .text-dark {
        color: #20364b !important;
    }
    .balabala div {
        background: #20364b;
        color: white;
        border-radius: 16px;
    }
    .balabala div img.img-fluid {
        border-radius: 15px 15px 0px 0px;
    }
    .footer .box .fab , .footer .box .fa {
        color: #20364b !important;
    }
</style>

<body class="theme-light body-scroll d-flex flex-column h-100 menu-overlay" data-highlight="highlight-red" data-gradient="body-default">

@include('includes.preLoader')

<div id="page" >
    
    @if (auth()->user())
        @include('includes.header')
        @include('includes.bottomNavigationBar')
        {{-- @unless (\Request::route()->getName() == 'user.index' || \Request::route()->getName() == 'user.find-store')
            <a class="bg-secondary text-light p-1 pt-2 px-3 rounded mx-1" href="{{url()->previous()}}">
                <i class="fa fa-arrow-left"></i>
            </a>
        @endif --}}
    @endif
    @if (session()->has('message'))
        <div class="text-center p-0 m-0 mt-5 pt-4 pb-2 alert alert-{{session()->get('status') }}" role="alert">
            {!! session()->get('message') !!}
            <button type="button" class="close h6" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <script>
            setTimeout(function() { $(".alert").alert('close') }, 5000);
        </script>
    @endif
    
    {{-- <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 text-white mb-4">
                        <img src="{{ asset('assets/app/icons/fav.png') }}" alt="welcome" style="width: 100px;border-radius: 50px;">
                    </div>
                    <div class="h6" style="color: #2F2D51 !important">آی مشاور</div>
                    <div class="loader-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="page-content header-clear-medium" style="padding-top: 0px !important;">
        <main class="flex-shrink-0 pt-2" >
            @yield('content')
        </main>
    </div>

</div>
    <script>
        $('.carousel').carousel({
            interval: 3000
        })
    </script>
    @include('includes.js')
</body>
  