@extends('layouts.admin')
@section('css')

@endsection
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                @role('مدیر')
                <div class="card res_table">
                    <div class="card-body res_table_in">
                        @endrole
                        @role('مدیر')
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    فیلتر بر اساس تور
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($category as $c)
                                        <li><a href="{{route('user.ads-tours-index-filter',$c->id)}}" title="Courses">{{$c->title}}</a></li>
                                    @endforeach
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>نام تور</th>
                                        <th>خریدار</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>تعداد کل</th>
                                        <th>قیمت واحد</th>
                                        <th>کدملی</th>
                                        <th>شماره تماس</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($tours)>0)
                                    @foreach($tours as $item)
                                        <tr>
                                            <td>
                                                <div class="d-none">{{$cat = $category->where('id',$item->tour_id)->first()}}</div>
                                                @if ($cat && $cat->slug)
                                                    <a href="{{route('user.ads-tours-show-guest', $cat->slug)}}">{{$cat->title}}</a>
                                                @else
                                                    ____
                                                @endif
                                            </td>
                                            <td>{{$as_user->where('id',$item->user_id)->first()->last_name ?? '____'}}</td>
                                            <td>{{$item->first_name.' '.$item->last_name}}</td>
                                            <td><span>{{$item->total_user}}</span> نفر </td>
                                            <td><span>{{$item->amount_each_person}}</span> تومان </td>
                                            <td>{{$item->national_code}}</td>
                                            <td>{{$item->number}}<br>{{$item->necessary_number}}</td>
                                            <td>
                                                @if($item->cancel and $item->cancel=='cancel')
                                                    <span class="text-dark">این بلیط کنسل شده</span>
                                                @elseif($item->cancel and $item->cancel=='waitingForPayment')
                                                    <span class="text-warning">در انتظار پرداخت</span>
                                                @else
                                                    <span class="text-success">فعال</span>
                                                    <a href="javascript:void(0);" onclick="active_row('{{$item->id}}','pending')" class="badge bg-danger ml-1" title="بلیط کنسل میشود"><i class="fa fa-close"></i> </a>
                                                @endif
                                            </td> 
                                            <td class="text-center">
                                                <a href="javascript:void(0);" onclick="del_row('{{$item->id}}')" class="badge bg-danger ml-1" title="حذف"><i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">موردی یافت نشد</td>
                                    </tr>
                                @endif
                            </table>
                        @endrole
                        @if( auth()->user()->getRoleNames()->first() != "مدیر")
                            @if(count($tours)>0)
                                @foreach($tours as $item)
                                    <div class="card res_table">
                                        <div class="card-body res_table_in">
                                            <div>{{$item->first_name.' '.$item->last_name}}</div>
                                            <div class="my-2">{{$item->amount_each_person.' تومان - '.$item->national_code}}</div>
                                            <div class="mb-2">{{$item->number.' - '.$item->necessary_number}}</div>
                                            <div>
                                                وضعیت بلیط : 
                                                @if($item->cancel and $item->cancel=='cancel')
                                                    <span class="text-dark">این بلیط کنسل شده</span>
                                                @elseif($item->cancel and $item->cancel=='waitingForPayment')
                                                    <span class="text-warning">در انتظار پرداخت</span>
                                                @else
                                                    <span class="text-success">فعال</span>
                                                @endif
                                                {{$item->total_user.' نفره '}}

                                            </div> 
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">موردی یافت نشد</td>
                                </tr>
                            @endif
                        @endif
                        @role('مدیر')
                    </div>
                </div>
                @endrole
                <div class="pag_ul">
                    {{ $tours->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
    function active_row(id) {
        Swal.fire({
            title: ' کنسل کردن بلیط' ,
            text: 'برای کنسل کردن بلیط مطمئن هستید؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = '{{url('/')}}/user-tours/'+id+'/edit';
            }
        })
    }
    function del_row(id) {
        Swal.fire({
            text: 'برای حذف بلیط مطمئن هستید؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = '{{url('/')}}/ads/tours/service-destroy/'+id;
            }
        })
    }
</script>
@endsection
