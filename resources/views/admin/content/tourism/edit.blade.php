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
                            {{ Form::open(array('route' => array('admin.ads-tours.update',$tour->id), 'method' => 'PATCH', 'files' => true)) }}
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('title', '* عنوان') }}
                                        {{ Form::text('title',$tour->title, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('slug', '* نامک') }}
                                        {{ Form::text('slug',$tour->slug, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('status', '* وضعیت') }}
                                        <select id="status" name="status" class="form-control">
                                            <option value="active" @if($tour->status=='active') selected @endif>نمایش</option>
                                            <option value="pending" @if($tour->status=='pending') selected @endif>عدم نمایش</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('price', '* قیمت') }}
                                        {{ Form::number('price',$tour->price, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('start_tour', '* زمان برگزاری') }}
                                        {{ Form::dateTimeLocal('start_tour',$tour->start_tour, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('move_time', '* زمان حرکت') }}
                                        {{ Form::dateTimeLocal('move_time',$tour->move_time, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div> 
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('location', '* محل حرکت') }}
                                        {{ Form::text('location',$tour->location, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('back_time', '* زمان بازگشت') }}
                                        {{ Form::dateTimeLocal('back_time',$tour->back_time, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('accessories', '* لوازم ضروری') }}
                                        {{ Form::text('accessories',$tour->accessories, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('residence', '* نوع اقامتگاه') }}
                                        {{ Form::text('residence',$tour->residence, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('car_type', '* وسیله نقلیه') }}
                                        {{ Form::text('car_type',$tour->car_type, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('capacity', '* ظرفیت') }}
                                        {{ Form::number('capacity',$tour->capacity, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('options', '* خدمات تور') }}
                                        {{ Form::text('options',$tour->options, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('hard_level', '* درجه سختی') }}
                                        {{ Form::text('hard_level',$tour->hard_level, array('class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                {{-- <div class="col-xl-4 col-md-6">
                                    <label for="exampleInputFile">* تصویر(350*1350)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="photo" multiple accept=".jpeg,.jpg,.png">
                                            <label class="custom-file-label" dir="ltr" for="exampleInputFile">انتخاب فایلها</label>
                                        </div>
                                    </div>
                                    @if($photos->count())
                                        @foreach ($photos as $photo)
                                            <img class="w-100 obj-contain" src="{{url($photo->path)}}" height="150">
                                        @endforeach
                                    @endif
                                </div> --}}
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        {{ Form::label('description', '* توضیحات') }}
                                        {{ Form::textarea('description',$tour->description, array('class' => 'form-control textarea', 'rows' => 3, 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    {{ Form::button('ویرایش', array('type' => 'submit', 'class' => 'btn btn-success col-12')) }}
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