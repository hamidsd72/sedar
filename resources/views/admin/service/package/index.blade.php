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
                            <a href="{{route('admin.service.package.create')}}" class="float-left btn btn-info"><i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن</a>
                        </div>
                        <div class="card-body res_table_in">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>پکیج</th>
                                    {{-- <th>خدمات</th> --}}
                                    <th>هزینه</th>
                                    <th>ترتیب سرویس ها</th>
                                    <th>صفحه اصلی</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($items)>0)
                                    @foreach($items as $key=>$item)
                                        <div class="modal fade" id="modal_{{$item->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title dir-rtl">{{$item->title}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row alert alert-info row_head">
                                                            <div class="col-md-6">نام خدمت</div>
                                                            <div class="col-md-6">ترتیب نمایش</div>
                                                        </div>


                                                    {{ Form::open(array('route' => ['admin.sort.by.join'], 'method' => 'POST', 'files' => true)) }}

                                                            @foreach($item->joins as $key=> $join)

                                                                <div class="row row_tabale alert alert-secondary mb-0">
                                                                    <div class="col-md-6">
                                                                        {{-- {{$join->service->title}} --}}
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        {{ Form::number('id_join[]',$join->id, array('class' => 'form-control text-left','hidden')) }}
                                                                        {{ Form::number('key_join',$key+1, array('class' => 'form-control text-left','hidden')) }}
                                                                        {{ Form::number('sort_by[]',$join->sort_by, array('class' => 'form-control text-center')) }}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        <br>
                                                        {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>تنظیم ترتیب', array('type' => 'submit', 'class' => 'btn btn-outline-info float-left')) }}
                                                        {{ Form::close() }}

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">بستن
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <tr class="{{$item->custom==1?'backgrond_tb':''}}"> --}}
                                        <tr >
                                            <td>@item($item->title)
                                                <br>
                                                {{-- {{$item->custom==1?'(پکیج ویژه)':''}} --}}
                                            </td>
                                            {{-- <td>@foreach($item->joins as $key1=>$join) @if($key1>0) , @endif
                                                @item($join->service?$join->service->title:'__')
                                                ({{$join->service && $join->service->category?$join->service->category->title:''}})
                                                @endforeach</td> --}}
                                            <td><span>@item(price($item->price))</span> تومان</td>
                                            <td>
                                                <a href="javascript:void(0);" data-toggle="modal"
                                                   data-target="#modal_{{$item->id}}"
                                                   class="badge bg-primary ml-1"
                                                   title="مشاهده"><i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                {{$item->home_view==1?'نمایش':'عدم نمایش'}}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('admin.service.package.edit',$item->id)}}"
                                                   class="badge bg-primary ml-1" title="ویرایش"><i
                                                            class="fa fa-edit"></i> </a>
                                                <a href="javascript:void(0);" onclick="del_row('{{$item->id}}')"
                                                   class="badge bg-danger ml-1" title="حذف"><i class="fa fa-trash"></i>
                                                </a>
                                                @if($item->status=='active')
                                                    <a href="javascript:void(0);"
                                                       onclick="active_row('{{$item->id}}','pending')"
                                                       class="badge bg-success ml-1"
                                                       title=" نمایش فعال است غیرفعال شود؟"><i class="fa fa-check"></i>
                                                    </a>
                                                @endif
                                                @if($item->status=='pending')
                                                    <a href="javascript:void(0);"
                                                       onclick="active_row('{{$item->id}}','active')"
                                                       class="badge bg-warning ml-1"
                                                       title="نمایش غیر فعال است فعال شود؟"><i class="fa fa-close"></i>
                                                    </a>
                                                @endif
                                               {{-- <a ا href="{{route('admin.service.package.video.list',$item->id)}}"
                                                  class="badge bg-warning ml-1"
                                                  title="ویدئو ها"><i class="fa fa-film"></i>
                                               </a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">موردی یافت نشد</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="pag_ul">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        function active_row(id, type) {
            if (type == 'pending') {
                var text_user = ' نمایش غیرفعال می شود';
            }
            if (type == 'active') {
                var text_user = ' نمایش فعال می شود';
            }
            Swal.fire({
                title: text_user,
                text: 'برای تغییر وضعیت مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = '{{url('/')}}/admin/service-package-active/' + id + '/' + type;
                }
            })
        }

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
                    location.href = '{{url('/')}}/admin/service-package-destroy/' + id;
                }
            })
        }
    </script>
@endsection