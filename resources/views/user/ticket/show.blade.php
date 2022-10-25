@extends('user.master')
@section('content')
<style>
    .bg-highlight {
        background: #80D4FF !important;
        border-radius: 30px;
    }
</style>
    <section class="col-12 mt-5 p-3">
        <div class="card res_table" style="background: transparent;">
            <div class="card-header">
                <h3 class="card-title float-right mt-2">تیکت های مشاوره</h3>
                <a href="#" href="javascript:void(0);" data-toggle="modal" data-target="#ModalTicket" class="float-left btn btn-info">ادامه مشاوره</a>
            </div>
            <div class="row mb-0">
                @if($item->answered == "yes")
                    <div class="col p-0"></div>
                @endif
                <div class="col-9 p-0 radius20 bg-white card-body res_table_in m-2 p-3 redu20">
                    <div class="card-body res_table_in py-0 redu20">
                        <p class="mb-2">
                            وضعیت : 
                            @if($item->answered == "no")
                                @if($item->reply>0)
                                    <span class="reply_email_ok text-dark">پاسخ داده شده</span>
                                @else
                                    <span class="reply_email_no">در انتظار پاسخ</span>
                                @endif
                            @else
                                <span class="reply_email_no">پیام از مشاور</span>
                            @endif
                            <span class="mx-4 text-dark">{{' دسته ی : '.$item->category}}</span>
                        </p>
                        <h4>{{$item->subject}}</h4>
                        <p class="py-2 m-0">{{$item->text}}</p>
                        @if ($item->attach)
                            <a class="text-primary" href="/{{ $item->attach }}" target="_blank">
                                <i class="fa fa-paperclip"></i>
                                مشاهده فایل پیوست شده
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col p-0"></div>
            </div>
            @foreach($items as $sub_item)
                <div class="row mb-0">
                    @if($sub_item->answered == "yes")
                        <div class="col p-0"></div>
                    @endif
                    <div class="col-9 p-0 radius20 bg-white card-body res_table_in m-2 p-3 redu20">
                        <div class="card-body res_table_in py-0 redu20">
                            <p class="mb-2">
                                وضعیت : 
                                @if($sub_item->answered == "no")
                                    @if($sub_item->reply>0)
                                        <span class="reply_email_ok text-dark">پاسخ داده شده</span>
                                    @else
                                        <span class="reply_email_no">در انتظار پاسخ</span>
                                    @endif
                                @else
                                    <span class="reply_email_no">پیام از مشاور</span>
                                @endif
                            </p>
                            <h4>{{$sub_item->subject}}</h4>
                            <p class="py-2 m-0">{{$sub_item->text}}</p>
                            @if ($sub_item->attach)
                                <a class="text-primary" target="_blank" href="/{{ $sub_item->attach }}" >
                                    <i class="fa fa-paperclip"></i>
                                    مشاهده فایل پیوست شده
                                </a>
                            @endif
                        </div>
                    </div>
                    @unless($sub_item->answered == "yes")
                        <div class="col p-0"></div>
                    @endunless
                </div>
            @endforeach
        </div>
        <div class="pag_ul">
            {{ $items->links() }}
        </div>

        <div class="modal fade" id="ModalTicket" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content redu20"> 
                    <div class="modal-header">
                        <h4 class="modal-title">ادامه تیکت مشاوره {{$item->subject}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="content">
                                <form method="post" action="{{route('user.contact.post')}}" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <input type="hidden" name="belongs_to_item" value="{{$item->id}}" id="contactbelongs_to_itemField">
                                    <input type="hidden" name="category" value="{{$serviceCat->id}}" id="category_to_itemField">
                                    <input type="hidden" name="subject" value="{{$item->subject}}" id="contactEmailField">
                                    <div class="form-field form-text">
                                        <label class="contactMessageTextarea color-theme" for="contactMessageTextarea">متن:<span>(required)</span></label>
                                        <textarea name="text" class="round-small" id="contactMessageTextarea"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <input type="file" name="attach" id="attach">  الحاق فایل  
                                    </div>
                                    <div class="form-button">
                                        <input type="submit" class="btn btn-info col-12 mt-2" value="ارسال پیام" data-formid="contactForm">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </section>



@endsection
