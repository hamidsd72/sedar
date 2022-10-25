@extends('user.master')
@section('content')
    <section class="col-12 mt-5 p-3">
        <div class="card res_table" style="background: transparent;">
            <div class="card-header">
                <h3 class="card-title float-right mt-2">تیکت های مشاوره</h3>
                <a href="#" href="javascript:void(0);" data-toggle="modal" data-target="#ModalTicket" class="float-left btn btn-info">ارسال تیکت</a>
            </div>
            @if(count($items)>0)
                @foreach($items as $item)
                    <div class="radius20 bg-white card-body res_table_in m-2 p-3 redu20">
                        <div class="d-flex">
                            <h6 class="my-2">{{$item->subject}}</h6>
                            <span class="text-dark px-2 small">{{$item->mobile}}</span>
                        </div>
                        <a href="{{route('user.show-ticket',$item->id)}}" class="btn btn-danger col-12 mt-3">نمایش همه</a>
                    </div>
                @endforeach
            @else
                <div colspan="3" class="text-center">موردی یافت نشد</div>
            @endif
        </div>
        <div class="pag_ul">
            {{ $items->links() }}
        </div>

        <!-- Modal send ticket -->
        <div class="modal fade" id="ModalTicket" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content redu20"> 
                    <div class="modal-header">
                        <h4 class="modal-title">ارسال تیکت مشاوره</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        

                        <div class="content">
                                <form method="post" action="{{route('user.contact.post')}}" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-field form-text">
                                        <label class="contactMessageTextarea color-theme" for="category">دسته بندی</label>
                                        <select id="category" name="category" class="form-control mb-4 select2">
                                            @foreach ($serviceCat as $item)
                                                <option value="{{$item->title}}" @if($serviceCat[0]->id == $item->id) selected @endif>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-field form-text">
                                        <label class="contactEmailField color-theme" for="contactEmailField">موضوع:<span>(required)</span></label>
                                        <input type="text" name="subject" class="round-small col-12" id="contactEmailField">
                                    </div>
                                    <div class="form-field form-text">
                                        <label class="contactMessageTextarea color-theme" for="contactMessageTextarea">متن:<span>(required)</span></label>
                                        <textarea name="text" class="round-small" id="contactMessageTextarea"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <input type="file" name="attach" id="attach">  الحاق فایل  
                                    </div>
                                    <div class="form-button">
                                        <input type="submit" class="btn btn-info col-12" value="ارسال پیام" data-formid="contactForm">
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
