@extends('user.master')

@section('content')
<style>
    .background-none {
        background: transparent;
    }
    .border-redius10{
        border-redius: 10px;
    }
    .text-zard {
        color: #ffc107 !important;
    }
    .bold {
        font-weight: bold;
    }
    [data-gradient=body-default] #page, .background-changer .body-default {
        background-image: none !important;
    } 
    /* body {
        background: url("/source/asset/assets/images/back.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
        background-size: 540px auto;
    } */
    .theme-light input, select, textarea {
        border-color: rgba(0, 0, 0, 0.08) !important;
        border-color: black !important;
        padding: 10px;
        text-align: left;
    }
    .body-login {
        position: fixed;
        bottom: 0px;
        background: white;
        padding: 0px;
        margin: 0px;
        width: 100%;
    }
    .welcome-logo {
        width: 220px;
        position: absolute;
        top: 40px;
    }
    .invate-form-big {
        position: fixed;
        bottom: 175px;
        width: 540px;
        background: #ffffff99;
    }
    .pwa section {
        padding: 8px 0px;
        font-size: 16px;
    }
    .logo-custom-pwa-one img {
        width: 100px;
    }
    .theme-light input, select, textarea {
        border-color: transparent !important;
        border-bottom-color: rgba(0, 0, 0, 0.08) !important;
    }
    .theme-light input:hover, input:focus, input:active {
        border: none;
        border-color: transparent !important;
        background: transparent !important;
        border-bottom: 1px solid #2f665f !important;
        padding-bottom: 18px;
        font-size: 12px !important;
        color: #2f665f !important;
        border-radius: 0px;

    }
    .theme-light input, select, textarea, input::placeholder {
        font-size: 18px !important;
    }
    input:hover::placeholder {
        /* transition: 0.6s !important; */
        /* font-size: 12px !important; */
        color: #2f665f !important;
    }
    button.btn {
        padding: 12px 0px;
    }
    button.btn:hover {
        color: white;
    }
</style>

    <form method="POST" action="/sign-up-using-mobile">
        <main class="flex-shrink-0">
            <div class="container text-center mt-4">
                <div class="icon icon-100 text-white mb-4 text-center">
                    <img src="{{ asset('assets/app/icons/لوگو.png') }}" alt="welcome" style="width: 100px;border-radius: 50px;">
                </div>
                <h4 class="mb-4">آی مشاور</h4>
            </div>
            <div class="container">
                <div class="login-box">
                    <div class="form-group floating-form-group">
                        <input type="text" name="mobile" id="mobile" class="form-control floating-input" required autofocus>
                        <label class="floating-label">شماره موبایل را وارد کنید</label>
                        <h6 class="text-danger text-center p-1">{{$error ?? ''}}</h6>
                    </div>
                    <div class="form-group my-4 text-secondary">
                        با کلیک روی دکمه زیر قوانین را مطالعه میکنم
                        <br>
                        <a href="#" data-toggle="modal" data-target="#modal" class="link">قوانین و مقررات</a>
                    </div>
                    <button type="submit" class="btn col-12 btn-block btn-info mt-2">ورود یا ثبت نام</button>
                </div>
            </div>
        </main>
        @csrf
    </form>

    <div class="modal" id="modal">
        <div class="modal-dialog modal-dialog-scrollable pt-4">
            <div class="modal-content" style="border-radius: 30px;">
                <div class="modal-body">
                    <h4 class="mb-3">{{App\Model\About::find(1)->title_rule}}</h4>
                    {!! App\Model\About::find(1)->text_rule !!}
                    <button data-dismiss="modal" class="btn btn-success col-12 btn-block mt-3">قوانین را قبول دارم </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $("input[name='mobile']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
    </script>
@endsection
























{{--@extends('layouts.user')--}}

{{--@section('content')--}}
{{--    <div class="login_page_head"></div>--}}
{{--    <div class="login_pag" style="margin-top: 200px;margin-bottom: 100px;">--}}
{{--        <div class="container">--}}
{{--            <div class="row" dir="rtl">--}}
{{--                <div class="col-md-5 m-auto carding">--}}
{{--                    <div class="col-md-6 ">--}}
{{--                        <h3 class="text-left"> ورود</h3>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <span class="glyphicon glyphicon-pencil"></span>--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}
{{--                    <div class="row">--}}
{{--                        <label class="col-md-2 label control-label">ایمیل</label>--}}
{{--                        <div class="col-md-10">--}}
{{--                            <input id="email" type="text" class="form-control text-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="mobile" autofocus>--}}

{{--                            @error('mobile')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row" style="margin-top: 15px;">--}}
{{--                        <label class="col-md-2 label control-label">رمز عبور</label>--}}
{{--                        <div class="col-md-10" >--}}
{{--                            <input id="password" type="password" class="form-control text-left @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                            @error('password')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                            <small> مرا بخاطر بسپار</small>--}}
{{--                            <br>--}}
{{--                            <a href="{{ route('user.reset.password.show')}}"  class="reset_password"> رمزعبور خود را فراموش کرده اید؟</a>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <label class="col-md-2 label control-label"></label>--}}
{{--                        <div class="col-md-10" style="margin-top: 20px;">--}}
{{--                            <button type="submit" class="btn btn-info"> ورود </button>--}}
{{--                            <a href="{{ route('user.mobile')}}" style="margin-right: 10px;"  class="btn btn-warning"> ثبت نام</a>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="login_page_footer"></div>--}}

{{--@endsection--}}
