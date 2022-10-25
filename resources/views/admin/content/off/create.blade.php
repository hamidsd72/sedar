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
                            {{ Form::open(array('route' => 'admin.off.store', 'method' => 'POST', 'files' => true)) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::label('user_id', 'مورد استفاده کاربران') }}
                                        <select name="user_id" class="form-control user_selected_off select2">
                                            <option value="0">همه کاربران</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" {{old('user_id')==$user->id?'selected':''}}>{{$user->first_name.' '.$user->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::label('title', '* عنوان') }}
                                        {{ Form::text('title',null, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::label('code', '* کد تخفیف') }}
                                        {{ Form::text('code',null, array('class' => 'form-control text-left dir-ltr','placeholder'=>'بین 5 تا 10 کاراکتر')) }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::label('percent', '* درصد تخفیف') }}
                                        {{ Form::number('percent',null, array('class' => 'form-control text-left dir-ltr','placeholder'=>'بین 1 تا 100 ')) }}
                                    </div>
                                </div>
                                <div class="col-sm-6 inventory_off">
                                    <div class="form-group">
                                        {{ Form::label('inventory', '* تعداد اعتبار') }}
                                        {{ Form::number('inventory',null, array('class' => 'form-control text-left dir-ltr','placeholder'=>'حداقل 1 عدد و حداکثر تعداد کاربران  ')) }}
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
@endsection