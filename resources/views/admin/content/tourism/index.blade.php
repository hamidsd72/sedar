@extends('layouts.admin')
@section('css')

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
                                <h3 class="card-title float-right">{{$title2}}</h3>
                                <a href="{{route('admin.ads-tours.create')}}" class="float-left btn btn-info"><i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body res_table_in">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th>آدرس</th>
                                        <th>کپی آدرس</th>
                                        <th>وضعیت</th>
                                        <th>مدیریت تصاویر</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($tours)>0)
                                        @foreach($tours as $item)
                                        <tr>
                                            <td class="vertical-align-middle">{{$item->title}}</td>
                                            <td class="vertical-align-middle">
                                                {{-- {{url('/').'/ads/tours/'.$item->slug}}     --}}
                                                <input type="text" id="link{{$item->id}}" class="form-control " value="{{url('/').'/ads/tours/'.$item->slug}}">
                                            </td>
                                            <td>
                                                <button onclick="copy{{$item->id}}()" class="btn btn-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
                                                        <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                                                    </svg>
                                                </button>
                                                <script>
                                                    function copy{{$item->id}}() {
                                                        var copyText = document.getElementById("link{{$item->id}}");
                                                        copyText.select();
                                                        copyText.setSelectionRange(0, 99999)
                                                        document.execCommand("copy");
                                                        alert('آدرس تور در کلیپبورد ذخیره شد');
                                                    }
                                                </script>
                                            </td>
                                            <td class="vertical-align-middle">
                                                @if ($item->status=='active')
                                                    نمایش
                                                @else
                                                    عدم نمایش
                                                @endif
                                            </td>
                                            <td class="vertical-align-middle">
                                                <a href="{{route('admin.ads-tours-album.show',$item->id)}}" class=""><i class="fa fa-circle-o mtp-1 ml-1"></i>مدیریت تصاویر</a>
                                            </td>
                                            <td class="text-center vertical-align-middle">
                                                <div class="d-flex">
                                                    <form action="{{route('admin.ads-tours.show',$item->id)}}" method="GET">
                                                        @csrf
                                                        <button type="submit" class="px-1 rounded" style="@if ($item->status=='active') background: #ffc107; @else background: #28a745; @endif border: none;">
                                                            @if ($item->status=='active')
                                                                <i class="fa fa-eye-slash pt-1"></i>
                                                            @else
                                                                <i class="fa fa-eye pt-1"></i>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <a href="{{route('admin.ads-tours.edit',$item->id)}}" class="badge bg-primary mx-2" title="ویرایش">
                                                        <i class="fa fa-edit pt-1" style="font-size: 14px;"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="del_row('{{$item->id}}')" class="badge bg-danger px-2" title="حذف">
                                                        <i class="fa fa-trash pt-1" style="font-size: 14px;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">موردی یافت نشد</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="pag_ul">
                            {{ $tours->links() }}
                        </div>
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
                location.href = '{{url('/')}}/admin/ads-tours/'+id+'/destroy';
            }
        })
    }
</script>
@endsection