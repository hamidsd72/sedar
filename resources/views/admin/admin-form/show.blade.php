@extends('layouts.admin')
@section('css')

@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            @role('مدیر')
                                {{ Form::model($item,array('route' => array('admin.forms.update', $item->id), 'method' => 'PATCH', 'files' => true)) }}
                            @endrole
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('category_id', '* دسته بندی خدمت') }}
                                        {{ Form::select('category_id' , Illuminate\Support\Arr::pluck($items,'title','id') , null, array('class' => 'form-control select2')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="service_type" >نوع خدمت</label>
                                        <select id="service_type" name="service_type" class="form-control">
                                            <option value="جلسات عمومی"  selected>(رایگان) جلسات عمومی</option>
                                            <option value="مشاوره اختصاصی" >مشاوره اختصاصی</option>
                                            <option value="عریضه نویسی" >عریضه نویسی</option>
                                        </select>
                                    </div>
                                </div>  --}}
                                

                                @if ($item->first_name)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('first_name', '* نام') }}
                                            {{ Form::text('first_name',$item->first_name, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->last_name)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('last_name', '* نام خانوادگی') }}
                                            {{ Form::text('last_name',$item->last_name, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->code_meli)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('code_meli', '* کد ملی') }}
                                            {{ Form::text('code_meli',$item->code_meli, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->whatsapp)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('whatsapp', 'شماره واتس اپ ') }}
                                        {{ Form::text('whatsapp',$item->whatsapp, array('class' => 'form-control text-left')) }}
                                    </div>
                                </div>
                               @endif
                               @if ($item->birthday)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('birthday', 'تاریخ تولد ') }}
                                        {{ Form::text('birthday',$item->birthday, array('class' => 'form-control text-left')) }}
                                    </div>
                                </div>
                               @endif
                               @if ($item->education)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('education', ' مدرک تحصیلی') }}
                                        {{ Form::text('education',$item->education, array('class' => 'form-control text-left')) }}
                                    </div>
                                </div>
                               @endif
                               @if ($item->visa_type)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('visa_type', '* نوع ویزا') }}
                                            {{ Form::text('visa_type',$item->visa_type, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->child)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('child', '* فرزند') }}
                                            {{ Form::text('child',$item->child, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->address)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('address', '* آدرس') }}
                                            {{ Form::text('address',$item->address, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->job)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('job', '*شغل و تخصص') }}
                                            {{ Form::text('job',$item->job, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->bimeh)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('bimeh', 'بیمه ') }}
                                        {{ Form::text('bimeh',$item->bimeh, array('class' => 'form-control text-left')) }}
                                    </div>
                                </div>
                               @endif
                               @if ($item->en_lang)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('en_lang', 'مدرک زبان انگیلیسی  ') }}
                                        {{ Form::text('en_lang',$item->en_lang, array('class' => 'form-control text-left')) }}
                                    </div>
                                </div>
                               @endif
                               @if ($item->en_level)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('en_level', ' سطح زبان انگیلیسی') }}
                                        {{ Form::text('en_level',$item->en_level, array('class' => 'form-control text-left')) }}
                                    </div>
                                </div>
                               @endif
                               @if ($item->gr_lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('gr_lang', '* مدرک زبان آلمانی') }}
                                            {{ Form::text('gr_lang',$item->gr_lang, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->gr_level)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('gr_level', '* سطح زبان آلمانی') }}
                                            {{ Form::text('gr_level',$item->gr_level, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->count)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('count', '* تعداد متقاضیان') }}
                                            {{ Form::text('count',$item->count, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->nesbat)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('nesbat', '*نسبت متقاضیان با کاربر') }}
                                            {{ Form::text('nesbat',$item->nesbat, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->reject)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('reject', 'سابقه رجکتی ') }}
                                            {{ Form::text('reject',$item->reject, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->monthly_amount)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('monthly_amount', 'میزان درآمد ماهانه  ') }}
                                            {{ Form::text('monthly_amount',$item->monthly_amount, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->all_amount)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('all_amount', ' تمکن مالی') }}
                                            {{ Form::text('all_amount',$item->all_amount, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->ashnaie)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('ashnaie', 'نحوه آشنایی ') }}
                                            {{ Form::text('ashnaie',$item->ashnaie, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->moaref)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('moaref', 'معرف کاربر  ') }}
                                            {{ Form::text('moaref',$item->moaref, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->sabeghe_vekalat)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('sabeghe_vekalat', ' سابقه استفاده از خدمات وکالتی') }}
                                            {{ Form::text('sabeghe_vekalat',$item->sabeghe_vekalat, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->status)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('status', 'وضعیت فورم') }}
                                            {{ Form::text('status',$item->status, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->time)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('time', 'زمان فورم') }}
                                            {{ Form::text('time',$item->time, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->company_name)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('company_name', ' نام مجموعه') }}
                                            {{ Form::text('company_name',$item->company_name, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->code)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('code', 'شماره کد برنامه') }}
                                            {{ Form::text('code',$item->code, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->created_year)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('created_year', 'سال تاسیس') }}
                                            {{ Form::text('created_year',$item->created_year, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                                @if ($item->description)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('description', '*نوضیحات') }}
                                            {{ Form::textarea('description',$item->description, array('class' => 'form-control text-left')) }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <a href="{{ URL::previous() }}" class="btn btn-secondary"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                            @role('مدیر')
                            {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-info mr-3')) }}
                            {{ Form::close() }}
                            @endrole
                        </div>
                        <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{ asset('editor/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('editor/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script>
        var textareaOptions = {
            filebrowserImageBrowseUrl: '{{ url('filemanager?type=Images') }}',
            filebrowserImageUploadUrl: '{{ url('filemanager/upload?type=Images&_token=') }}',
            filebrowserBrowseUrl: '{{ url('filemanager?type=Files') }}',
            filebrowserUploadUrl: '{{ url('filemanager/upload?type=Files&_token=') }}',
            language: 'fa'
        };
        $('.textarea').ckeditor(textareaOptions);
        slug('#title', '#slug');

        function number_price(a){
            $('#pp_price').text(a);
            $('#pp_price_1').text(a);
            $('#pp_price').text(function (e, n) {
                var lir1= n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return lir1;
            })
        }
        $(document).ready(function () {
            var a=$('#price').val();
            $('#pp_price').text(a);
            $('#pp_price_1').text(a);
            $('#pp_price').text(function (e, n) {
                var lir1= n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return lir1;
            })
        });
    </script>
@endsection
