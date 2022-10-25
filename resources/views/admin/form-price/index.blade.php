@extends('layouts.admin')
@section('css')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row"> 
                    <div class="col-12">
                        <div class="card res_table">
                            <div class="card-header">
                                <h3 class="card-title float-right">{{$title2}}</h3>
                            </div>
                            <div class="card-body res_table_in">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>نام فرم</th>
                                        <th>قیمت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($items)>0)
                                    @foreach($items as $index=>$item)
                                        {{ Form::model($item,array('route' => array('admin.form-price.update', $item->id), 'method' => 'PATCH', 'files' => true)) }}
                                            <tr>
                                                <td>@item($item->form_name)</td>
                                                <td>{{ Form::number('amount',$item->amount, array('class' => 'form-control col-6 col-lg-4 text-left')) }}</td>
                                                <td class="text-center">{{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-info')) }}</td>
                                            </tr>
                                        {{ Form::close() }}
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">موردی یافت نشد</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

@endsection
@section('js')
@endsection
