@extends('layouts.admin')
@section('css')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                    <div class="col-12">
                        <div class="card res_table">
                            <div class="card-header">
                                <h3 class="card-title float-right">{{$title2}} {{$tour->title}}</h3>
                                <a href="#" class="float-left btn btn-primary" data-toggle="modal" data-target="#myModal">افزودن تصویر</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body res_table_in">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>آدرس</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                            <td class="vertical-align-middle">
                                                {{-- <a href="/{{$item->path}}" target="_blanck">دیدن تصویر شماره {{$item->id}}</a> --}}
                                                <img src="{{url($item->path)}}" class="mt-2" height="100">
                                            </td>
                                            <td class="vertical-align-middle">
                                                @if ($item->display)
                                                    نمایش
                                                @else
                                                    عدم نمایش
                                                @endif
                                            </td>
                                            <td class="text-center vertical-align-middle">
                                                <div class="d-flex">
                                                    <form action="{{route('admin.ads-tours-album.update',$item->id)}}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="rounded" style="@if ($item->display) background: #ffc107; @else background: #28a745; @endif border: none;">
                                                            @if ($item->display)
                                                                <i class="fa fa-eye-slash pt-1"></i>
                                                            @else
                                                                <i class="fa fa-eye pt-1"></i>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <a href="javascript:void(0);" onclick="del_row('{{$item->id}}')" class="badge bg-danger px-2 mx-2" title="حذف">
                                                        <i class="fa fa-trash pt-1" style="font-size: 14px;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{ Form::open(array('route' => 'admin.ads-tours-album.store', 'method' => 'POST', 'files' => true)) }}
                        <div class="modal-header">
                            <h4 class="modal-title">افزودن تصویر</h4>
                            <button type="button" class="close" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$tour->id}}">
                            <div class="btn btn-file border rounded col-12">
                                اضافه کردن تصویر
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="photo" accept=".jpeg,.jpg,.png" required>
                            </div>
                        </div>
                        <div class="modal-footer float-right">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">انصراف</button>
                            {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-outline-success mr-3')) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>

          
    </section>

@endsection
@section('js')
<script>
    function del_row(id) {
        Swal.fire({
            text: 'برای حذف مطمئن هستید؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = '{{url('/')}}/admin/ads-tours/album/'+id+'/destroy';
            }
        })
    }
</script>
@endsection