@extends('layouts.user')
@section('content')
    <div class="login_page_head"></div>
    <div class="login_pag" style="margin-top: 200px;margin-bottom: 100px;">
        <div class="container">
            <div class="row"  dir="rtl">
                <div class="col-md-5 carding m-auto">
                    <div class="col-md-6 ">
                        <h3 class="text-left">کد اعتبار سنجی</h3>
                    </div>
                    <div class="col-md-6">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('user.verify.post') }}">
                        @csrf
                        <div class="row">
                            <label class="col-md-3 label control-label">کد تایید</label>
                            <div class="col-md-9">
                                <input id="verify_code" type="text" class="form-control text-left @error('verify_code') is-invalid @enderror"
                                       name="verify_code" value="{{ old('verify_code') }}" required>

                                @error('verify_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label control-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-info"> تایید کد </button>
                                <a href="{{ route('user.mobile')}}" type="submit" class="btn btn-warning"> برگشت</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="login_page_footer"></div>

@endsection

