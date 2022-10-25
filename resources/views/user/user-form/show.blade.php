@extends('layouts.admin')
@section('css')

@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="row">
                            @if ($item->first_name)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('first_name', ' نام') }}
                                        {{ $item->first_name }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->last_name)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('last_name', ' نام خانوادگی') }}
                                        {{ $item->last_name }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->code_meli)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('code_meli', ' کد ملی') }}
                                        {{ $item->code_meli }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->whatsapp)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('whatsapp', 'شماره واتس اپ ') }}
                                        {{ $item->whatsapp }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->birthday)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('birthday', 'تاریخ تولد ') }}
                                        {{ $item->birthday }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->education)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('education', ' مدرک تحصیلی') }}
                                        {{ $item->education }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->visa_type)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('visa_type', ' نوع ویزا') }}
                                        {{ $item->visa_type }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->child)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('child', ' فرزند') }}
                                        {{ $item->child }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->address)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('address', ' آدرس') }}
                                        {{ $item->address }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->job)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('job', 'شغل و تخصص') }}
                                        {{ $item->job }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->bimeh)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('bimeh', 'بیمه ') }}
                                        {{ $item->bimeh }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->en_lang)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('en_lang', 'مدرک زبان انگیلیسی  ') }}
                                        {{ $item->en_lang }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->en_level)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('en_level', ' سطح زبان انگیلیسی') }}
                                        {{ $item->en_level }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->gr_lang)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('gr_lang', 'مدرک زبان آلمانی') }}
                                        {{ $item->gr_lang }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->gr_level)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('gr_level', 'سطح زبان آلمانی') }}
                                        {{ $item->gr_level }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->count)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('count', 'تعداد متقاضیان') }}
                                        {{ $item->count }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->nesbat)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('nesbat', 'نسبت متقاضیان با کاربر') }}
                                        {{ $item->nesbat }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->reject)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('reject', 'سابقه رجکتی ') }}
                                        {{ $item->reject }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->monthly_amount)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('monthly_amount', 'میزان درآمد ماهانه  ') }}
                                        {{ $item->monthly_amount }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->all_amount)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('all_amount', ' تمکن مالی') }}
                                        {{ $item->all_amount }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->ashnaie)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('ashnaie', 'نحوه آشنایی ') }}
                                        {{ $item->ashnaie }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->moaref)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('moaref', 'معرف کاربر  ') }}
                                        {{ $item->moaref }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->sabeghe_vekalat)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('sabeghe_vekalat', ' سابقه استفاده از خدمات وکالتی') }}
                                        {{ $item->sabeghe_vekalat }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->status)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('status', 'وضعیت فورم') }}
                                        {{ $item->status }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->time)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('time', 'زمان فورم') }}
                                        {{ $item->time }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->company_name)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('company_name', ' نام مجموعه') }}
                                        {{ $item->company_name }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->code)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('code', 'شماره کد برنامه') }}
                                        {{ $item->code }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->created_year)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('created_year', 'سال تاسیس') }}
                                        {{ $item->created_year }}
                                    </div>
                                </div>
                            @endif
                            @if ($item->description)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('description', 'نوضیحات') }}
                                        {{ $item->description }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <a href="{{ URL::previous() }}" class="btn btn-secondary col-12">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
@endsection
