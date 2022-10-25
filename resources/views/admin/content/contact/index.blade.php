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
                            </div>

                            @if($items&&$items->count())
                                @foreach($items as $item)
                                    <div class="card-body res_table_in border mx-2 my-1 rounded">
                                        {{-- <span>
                                            نوع : 
                                            @if($item->answered == "yes")
                                                <span class="reply_email_ok text-success">دریافتی</span>
                                            @else
                                                <span class="reply_email_no">ارسالی</span>
                                            @endif
                                        </span> --}}
                                        <span >
                                            وضعیت : 
                                            {{-- @if($item->answered == "no") --}}
                                                @if($item->reply>0)
                                                    <span class="reply_email_ok text-success">پاسخ داده شده</span>
                                                @else
                                                    <span class="reply_email_no">در انتظار پاسخ</span>
                                                @endif
                                            {{-- @else
                                                <span class="reply_email_no text-info">پیام از مشاور</span>
                                            @endif --}}
                                        </span>
                                        <h6 class="pt-1">{{' دسته ی : '.$item->category}}</h6>
                                        <h6 class="pt-1">{{' موضوع : '.$item->subject}}</h6>
                                        <p class="m-0">{{' توضیحات : '.$item->text}}</p>
                                        @if ($item->attach)
                                            <a class="text-dark pt-1" href="/{{ $item->attach }}" target="_blank">
                                                <i class="fa fa-paperclip mt-2"></i>
                                                مشاهده فایل پیوست شده
                                            </a>
                                        @endif

                                        @foreach($sub_items->where('belongs_to_item', '=', $item->id) as $sub_item)
                                            <div class="card-body res_table_in border mx-1 my-1 rounded">
                                                <span>
                                                    وضعیت : 
                                                    @if($sub_item->reply>0)
                                                        <span class="reply_email_ok text-success">پاسخ داده شده</span>
                                                    @else
                                                        <span class="reply_email_no">در انتظار پاسخ</span>
                                                    @endif
                                                </span>
                                                <h6 class="pt-1">{{' دسته ی : '.$sub_item->category}}</h6>
                                                <h6 class="pt-1">{{' موضوع : '.$sub_item->subject}}</h6>
                                                <p class="m-0">{{' توضیحات : '.$sub_item->text}}</p>
                                                @if ($sub_item->attach)
                                                    <a class="text-dark pt-1" href="/{{ $sub_item->attach }}" target="_blank">
                                                        <i class="fa fa-paperclip mt-2"></i>
                                                        مشاهده فایل پیوست شده
                                                    </a>
                                                @endif
                                            </div>
                                        @endforeach
                                        <a href="#" href="javascript:void(0);" data-toggle="modal" data-target="#ModalAnsweTicket{{$item->id}}" 
                                        class="float-left text-dark border border-secondary rounded p-1 px-3">پاسخ تیکت مشاوره</a>
                                    </div> 
                                @endforeach
                            @else
                                <div>
                                    <td colspan="3" class="text-center">موردی یافت نشد</td>
                                </div>
                            @endif

                            <!-- /.card-header -->
                            {{-- <div class="card-body res_table_in">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>نام کاربر</th>
                                        <th>موضوع</th>
                                        <th>پاسخ</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($items)>0)
                                        @foreach($items as $item)
                                            <tr>
                                                <td class="vertical-align-middle">@item($item->full_name)</td>
                                                <td class="vertical-align-middle">@item($item->subject)</td>
                                                <td class="vertical-align-middle">
                                                    @if($item->reply>0)
                                                        <span class="reply_email_ok">پاسخ داده شده</span>
                                                    @else
                                                        <span class="reply_email_no">پاسخ داده نشده</span>
                                                    @endif
                                                </td>
                                                <td class="text-center vertical-align-middle">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal_{{$item->id}}" class="badge bg-primary ml-1" title="مشاهده"><i class="fa fa-eye"></i> </a>

                                                    <a href="javascript:void(0);" onclick="del_row('{{$item->id}}')" class="badge bg-danger ml-1" title="حذف"><i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal_{{$item->id}}" role="dialog">
                                                <div class="modal-dialog"> 

                                                    <!-- Modal content-->
                                                    <div class="modal-content"> 
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">{{$item->full_name}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="dir-rtl text-justify">{{$item->text}}</p>
                                                            @if($item->reply<=0)
                                                                <form action="{{route('admin.contact.send.ticket',$item->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <textarea class="form-control col-12" rows="4" name="text" placeholder="پاسخ به تیکت کاربر" required></textarea>
                                                                    <input type="file" name="attach" id="attach" class="mt-3">
                                                                    الحاق فایل
                                                                    <button type="submit" class="btn btn-outline-info float-left mt-5">ارسال به کاربر</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">موردی یافت نشد</td>
                                        </tr>
                                    @endif
                                </table>
                            </div> --}}
                            <!-- /.card-body -->
                        </div>
                        <div class="pag_ul">
                            {{ $items?$items->links():'' }}
                        </div>
                    </div>
                </div>
        </div>

        @if ($items)
            @foreach($items as $item)
                <div class="modal fade" id="ModalAnsweTicket{{$item->id}}" role="dialog">
                    <div class="modal-dialog">
    
                        <div class="modal-content"> 
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h6 class="modal-title">تیکت مشاوره {{$item->subject}}</h6>
                            </div>
                            <div class="modal-body">
                                <div class="content">
                                        <form method="post" action="{{ route('admin.contact.send.ticket',$item->id) }}" enctype="multipart/form-data">
                                            @csrf
                                        <fieldset>
                                            <input type="hidden" name="belongs_to_item" value="{{$item->id}}" id="contactbelongs_to_itemField">
                                            <input type="hidden" name="category" value="{{$item->category}}" id="contactbelongs_to_itemField">

                                            <div class="form-field form-email">
                                                <label class="contactEmailField color-theme" for="contactEmailField">موضوع:<span>(required)</span></label>
                                                <input type="text" name="subject" value="{{$item->subject}}" class="round-small form-control" id="contactEmailField">
                                            </div>
                                            <div class="form-field form-text">
                                                <label class="contactMessageTextarea color-theme" for="contactMessageTextarea">متن:<span>(required)</span></label>
                                                <textarea name="text" class="round-small form-control" id="contactMessageTextarea"></textarea>
                                            </div>
                                            <div class="my-4">
                                                <input type="file" name="attach" id="attach">  الحاق فایل  
                                            </div>
                                            <div class="form-button">
                                                <input type="submit" class="btn bg-highlight text-uppercase font-900 btn-m btn-full rounded-sm  shadow-xl contactSubmitButton" value="ارسال پیام" data-formid="contactForm">
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        @endif

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
                location.href = '{{url('/')}}/admin/contact-destroy/'+id;
            }
        })
    }
</script>
@endsection