@extends('user.master')
@section('content')
<style>
    p {
        margin: 0px 10px !important;
    }
    h2 {
        margin: 8px 0px;
    }
    .tour-box {
        border: 1px solid #ced4da;
        padding: 10px;
        margin-bottom: 28px;
        border-radius: 8px;
        background: white;
        box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);
    }
    .tour-input {
        border-radius: 8px;
        padding: 4px;
        margin: 0px 8px;
    }
    #demo img {
        border-radius: 4px;
    }
    #demo .carousel-caption {
        text-align: center;
        right: 0px;
        bottom: 0px !important;
        background: #00000070;
        left: 0px;
        font-weight: unset;
        top: 0px;
        border-radius: 16px;
        padding-top: 28% !important;
    }
    @media only screen and (max-width: 640px) {
        .date h2 {
            font-size: 16px;
            margin: 8px 0px 2px;
        }
    }
    @media only screen and (max-width: 640px) {
        .date p {
            font-size: 12px;
        }
    }
    .white-box {
        border: 1px solid #ced4da;
        border-radius: 8px;
        background: white;
        box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);
    }
</style>
    <div class="card bg-light" style="border-radius: 20px;">

        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                @for ($i = 0; $i < $items->count(); $i++)
                    @if ($i == 0)
                        <li data-target="#demo" data-slide-to="0" class="active"></li> 
                    @else
                        <li data-target="#demo" data-slide-to="{{$i}}"></li>
                    @endif
                @endfor
            </ul>
            <div class="carousel-inner">
                @foreach ($items as $slider)
                    @if ($items[0]->id == $slider->id)
                        <div class="carousel-item active">
                            <img src="{{url($slider->path)}}" alt="{{$tour->title}}">
                            <div class="carousel-caption p-0 pt-2">
                                <a href="#" target="_blank" class="p-1 px-2 h5 text-white" style="font-weight: bold;">{{$tour->title}}</a>
                            </div>   
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{url($slider->path)}}" alt="{{$tour->title}}">
                            <div class="carousel-caption p-0 pt-2">
                                <a href="#" target="_blank" class="p-1 px-2 h5 text-white" style="font-weight: bold;">{{$tour->title}}</a>
                            </div>   
                        </div>
                    @endif
                @endforeach
            </div> 
        </div>

        @if ($count ?? '')
            <form action="{{route('user.user-tours.store')}}" method="post" class="m-3">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$tour->id}}">
                <input type="hidden" name="count" id="count" value="{{$count}}">
                <h4 class="mb-3">لطفا برای ادامه مشخصات را تکمیل کنید</h4>
                @for ($i = 1; $i <= $count; $i++)
                    <div class="tour-box col-12">
                        <h5>مشخصات نفر {{$i}}</h5>
                        <div class="row m-0" style="padding-left: 14px;">
                            <div class="col-6">
                                <input type="text" class="form-control tour-input my-1" required placeholder="نام" name="fn{{$i}}">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control tour-input my-1" required placeholder="نام خانوادگی" name="ln{{$i}}">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control tour-input my-1" required placeholder="شماره تماس" name="pn{{$i}}">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control tour-input my-1" required placeholder="شماره تماس ضروری" name="en{{$i}}">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control tour-input my-1" required placeholder="شماره ملی" name="cm{{$i}}">
                            </div>
                        </div>
                    </div>
                @endfor
                <button type="submit" class="btn btn-danger px-4" style="border-radius: 8px !important;">پرداخت و رزرو این تور</button>
            </form>
        @endif

        <div class="row m-0 date mt-3 mx-2">
            <div class="col-4 p-0">
                <div class="white-box text-center mx-1">
                    <h2>زمان برگزاری </h2>
                    <p>{{my_jdate($tour->start_tour,'d F Y')}}</p>
                    <p>{{substr($tour->start_tour,10,10)}}</p>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="white-box text-center mx-1">
                    <h2>زمان حرکت </h2>
                    <p>{{my_jdate($tour->move_time,'d F Y')}}</p>
                    <p>{{substr($tour->move_time,10,10)}}</p>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="white-box text-center mx-1">
                    <h2>زمان بازگشت </h2>
                    <p>{{my_jdate($tour->back_time,'d F Y')}}</p>
                    <p>{{substr($tour->back_time,10,10)}}</p>
                </div>
            </div>
        </div>

        <div class="card-body box-profile">
            <h2>برنامه سفر</h2>
            <div class="tour-box">{!!$tour->description!!}</div>
            <h2>خدمات تور </h2>
            <div class="tour-box"><p>{{$tour->options}}</p></div>
            <h2>لوازم ضروری </h2>
            <div class="tour-box"><p>{{$tour->accessories}}</p></div>
            <h2>درجه سختی </h2>
            <div class="tour-box"><p>{{$tour->hard_level}}</p></div>
            <h2>وسیله نقلیه </h2>
            <div class="tour-box"><p>{{$tour->car_type}}</p></div>
            <h2>نوع اقامتگاه </h2>
            <div class="tour-box">
                <i class="icon__type icon"></i>
                <p>{{$tour->residence}}</p></div>
            <div class="row m-0">
                <div class="col-6">
                    <h2>قیمت </h2><div class="tour-box"><h6 style="margin: 5px;">{{$tour->price}}</h6></div>
                </div>
                <div class="col-6">
                    <h2>ظرفیت </h2><div class="tour-box"><h6 style="margin: 5px;">{{$tour->time.' نفر دیگر '}}</h6></div>
                </div>
            </div>
            @unless ($count ?? '')
                <div class="mx-3">
                    <button type="button" class="btn btn-danger col-12" style="border-radius: 8px !important;" data-toggle="modal" data-target="#myModal">
                        انتخاب این تور
                    </button>
                </div>
            @endunless
        </div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 30%;">
                <form action="{{route('user.user-tours.update',$tour->id)}}" method="post" class="m-3">
                    <h4 class="modal-title mb-2">{{$tour->title}}</h4>
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="count">لطفا تعداد افراد را وارد کنید</label>
                        <br>
                        <input type="number" name="count" id="count" placeholder="عدد به لاتین مثلا '4'" class="form-group tour-input m-0 mt-2">
                    </div>
                    <button type="submit" class="btn btn-primary px-4 px-lg-5" style="border-radius: 8px !important;">مرحله بعد</button>
                    <button type="button" class="btn btn-danger mx-3" style="border-radius: 8px !important;" data-dismiss="modal">انصراف</button>
                </form>
            </div>
        </div>
    </div>

@endsection