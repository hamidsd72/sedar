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
                            {{ Form::open(array('route' => 'admin.meta.store', 'method' => 'POST', 'files' => true)) }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('url', '* آدرس صفحه') }}
                                        {{ Form::text('url',null, array('class' => 'form-control dir-ltr')) }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::label('title', '* عنوان صفحه') }}
                                        {{ Form::text('title',null, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('key_word', '* کلمات کلیدی') }}
                                        {{ Form::textarea('key_word',null, array('class' => 'form-control','rows'=>4)) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('description', '* توضیحات') }}
                                        {{ Form::textarea('description',null, array('class' => 'form-control','rows'=>4 )) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    {{ Form::button('افزودن', array('type' => 'submit', 'class' => 'btn btn-success col-12')) }}
                                </div>
                                <div class="col">
                                    <a href="{{ URL::previous() }}" class="btn btn-secondary col-12">بازگشت</a>
                                </div>
                            </div>
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
    <script>
        $('.date_p').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.observer-example-alt',
            initialValue:false,
        });
        $(document).ready(function () {
            $('select[name=state_id]').on('change', function () {
                $.get("{{url('/')}}/city-ajax/" + $(this).val(), function (data, status) {
                    $('select[name=city_id]').empty();
                    $.each(data, function (key, value) {
                        $('select[name=city_id]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('select[name=city_id]').trigger('change');
                });
            });
        });
        $(document).ready(function () {
            $.get("{{url('/')}}/city-ajax/" + $('#state_id').val(), function (data, status) {
                $('select[name=city_id]').empty();
                @if(old('city_id'))
                    var old='{{old('city_id')}}';
                    @else
                    var old='';
                @endif
                $.each(data, function (key, value) {
                    if(old==value.id)
                    {
                        $('select[name=city_id]').append('<option selected value="' + value.id + '">' + value.name + '</option>');
                    }
                    else
                    {
                        $('select[name=city_id]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    }
                });
                $('select[name=city_id]').trigger('change');
            });
        })
    </script>
@endsection