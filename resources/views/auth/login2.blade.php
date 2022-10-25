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
    button.btn {
        padding: 12px 0px;
    }
    /* body {
        background: url("/source/asset/assets/images/back.jpg");
        background-position: center;
        background-repeat: no-repeat; 
        background-size: cover; 
    } */
    .theme-light input, select, textarea {
        border-color: rgba(0, 0, 0, 0.08) !important;
        border-color: black !important;
        padding: 10px;
        text-align: left;
    }
    .matn-right {
        text-align: right !important;
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
    .invate-form-big4 {
        position: fixed;
        bottom: 0px;
        width: 540px;
        background: #ffffff99;
    }
    .theme-light input, select, textarea {
        border-color: transparent !important;
        border-bottom-color: rgba(0, 0, 0, 0.08) !important;
    }
    input:hover, input:focus, input:active {
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
    .theme-light input, select, textarea, input:hover::placeholder {
        transition: 0.6s !important;
        font-size: 12px !important;
        color: #2f665f !important;
    }
</style>

    <form method="POST" action="/my-user/1">
        <main class="flex-shrink-0 mt-lg-5">
            <div class="container text-center mt-5">
                <div class="icon icon-100 text-white mb-4 text-center">
                    <img src="{{ asset('assets/app/icons/لوگو.png') }}" alt="welcome" style="width: 100px;border-radius: 50px;">
                </div>
                <h4 class="mb-4">آی مشاور</h4>
            </div>
            <div class="container">
                <div class="login-box">
                    <div class="form-group floating-form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control floating-input" style="text-align: right;" required autofocus>
                        <label class="floating-label">نام خود را وارد کنید</label>
                        <p class="text-danger text-center p-1">{{$ef ?? ''}}</p>
                    </div>
                    <div class="form-group floating-form-group">
                        <input type="text" name="last_name" id="last_name" class="form-control floating-input" style="text-align: right;" required>
                        <label class="floating-label">نام خانوادگی خود را وارد کنید</label>
                        <p class="text-danger text-center p-1">{{$el ?? ''}}</p>
                    </div>
                    <div class="form-group floating-form-group">
                        <input type="text" name="email" id="email" class="form-control floating-input"  required>
                        <label class="floating-label">ایمیل خود را وارد کنید</label>
                        <p class="text-danger text-center p-1">{{$ee ?? ''}}</p>
                    </div>
                    <button type="submit" class="btn btn-block col-12 btn-info mt-3">ارسال فرم مشخصات</button>
                </div>
            </div>
        </main>
        @csrf
        @method('patch')
    </form>

@endsection
