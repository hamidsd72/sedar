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
                            {{ Form::open(array('route' => 'admin.ads-tours.store', 'method' => 'POST', 'files' => true)) }}
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('title', '* عنوان') }}
                                        {{ Form::text('title',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('slug', '* نامک') }}
                                        {{ Form::text('slug',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('status', '* وضعیت') }}
                                        <select id="status" name="status" class="form-control">
                                            <option value="active"  selected>نمایش</option>
                                            <option value="pending" >عدم نمایش</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('price', '* قیمت') }}
                                        {{ Form::number('price',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('start_tour', '* زمان برگزاری') }}
                                        {{ Form::dateTimeLocal('start_tour',null, array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'دوشنبه ۱۰ اردیبهشت ۱۴۰۱')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('move_time', '* زمان حرکت') }}
                                        {{ Form::dateTimeLocal('move_time',null, array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'پنجشنبه ۱۵ اردیبهشت ۱۴۰۱ ساعت ۱۴:۲۰')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('location', '* محل حرکت') }}
                                        {{ Form::text('location',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('back_time', '* زمان بازگشت') }}
                                        {{ Form::dateTimeLocal('back_time',null, array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'شنبه ۲۱ خرداد ۱۴۰۱ ساعت ۸:۲۰')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('accessories', '* لوازم ضروری') }}
                                        {{ Form::text('accessories',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('residence', '* نوع اقامتگاه') }}
                                        {{ Form::text('residence',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('car_type', '* وسیله نقلیه') }}
                                        {{ Form::text('car_type',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('capacity', '* ظرفیت') }}
                                        {{ Form::number('capacity',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('options', '* خدمات تور') }}
                                        {{ Form::text('options',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('hard_level', '* درجه سختی') }}
                                        {{ Form::text('hard_level',null, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        {{ Form::label('description', '* توضیحات') }}
                                        {{ Form::textarea('description',null, array('class' => 'form-control textarea', 'rows' => 3, 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <a href="{{ URL::previous() }}" class="btn btn-rounded btn-outline-warning"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                            {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-outline-success mr-3')) }}
                            {{ Form::close() }}
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