@extends('user.master')
@section('content')
<style>
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
    #demo .carousel-inner .carousel-item img {
        height: 240px;
        border-radius: 0px 0px 20px 20px;
    }
    @media only screen and (max-width: 640px) {
        #demo .carousel-inner .carousel-item img {
            height: 200px;
        }
    }
    h6 {
        color: #20364b;
    }
</style>
    <div class="card bg-white mt-2 mb-0" style="border-radius: 20px;">

        @if (session('status'))
            <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
                <h6 class="text-center mt-2">{{ session('message') }}</h6>
            </div>
            <script>
                setTimeout(function() { 
                        $(".alert").alert('close')
                }, 5000);
            </script>
        @endif

        <div id="demo" class="carousel slide pt-2 mt-5" data-ride="carousel">
            <ul class="carousel-indicators">
                @for ($i = 0; $i < $items->count(); $i++)
                    <li data-target="#demo" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li> 
                @endfor
            </ul>
            <div class="carousel-inner">
                @foreach ($items as $key => $slider)
                    <div class="carousel-item {{$key==0?'active':''}}">
                        <img src="{{url($slider->path)}}" alt="{{$tour->title}}">
                        <div class="carousel-caption p-0 pt-2">
                            <a href="#" target="_blank" class="p-1 px-2 h5 text-white" style="font-weight: bold;">{{$tour->title}}</a>
                        </div>   
                    </div>
                @endforeach
            </div> 
        </div>
    
    </div>

    <!-- page content start -->
    <div class="container top-30">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <p>{{$tour->title}}</p>
                    </div>
                    <div class="col-auto">
                        <p class="small text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16" viewBox="0 0 512 512">
                                <title>ionicons-v5-l</title>
                                <rect x="32" y="80" width="448" height="256" rx="16" ry="16" transform="translate(512 416) rotate(180)" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect>
                                <line x1="64" y1="384" x2="448" y2="384" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                <line x1="96" y1="432" x2="416" y2="432" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                <circle cx="256" cy="208" r="80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></circle>
                                <path d="M480,160a80,80,0,0,1-80-80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                <path d="M32,160a80,80,0,0,0,80-80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                <path d="M480,256a80,80,0,0,0-80,80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                <path d="M32,256a80,80,0,0,1,80,80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                            </svg>
                        </p>

                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col">
                        <p class="small vm">
                            <span class=" text-secondary">{{$tour->time.' نفر دیگر '}}</span>
                            <span class=" text-secondary"> ظرفیت دارد</span>
                        </p>
                    </div>
                    <div class="col-auto">
                        <p class="small text-secondary">
                            {{$tour->price}}
                        </p>
                    </div>
                </div>
            </div>
            @if ($count ?? '')
                <div class="card-body border-top border-color">
                    <form action="{{route('user.user-tours.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$tour->id}}">
                        <input type="hidden" name="count" id="count" value="{{$count}}">
                        <h6 class="mb-3">مشخصات را وارد کنید</h6>
                        @for ($i = 1; $i <= $count; $i++)
                            <div class="text-secondary pt-4">تکمیل بلیط شماره {{$i+1}}</div>
                            <div class="login-box px-3">
                                <div class="form-group floating-form-group">
                                    <label class="floating-label"></label>
                                    <input type="text" placeholder="نام" name="fn{{$i}}" class="form-control floating-input" required>
                                </div>
                                <div class="form-group floating-form-group">
                                    <label class="floating-label"></label>
                                    <input type="text" placeholder="نام خانوادگی" name="ln{{$i}}" class="form-control floating-input" required>
                                </div>
                                <div class="form-group floating-form-group">
                                    <label class="floating-label"></label>
                                    <input type="number" placeholder="شماره تماس" name="pn{{$i}}" class="form-control floating-input" required>
                                </div>
                                <div class="form-group floating-form-group">
                                    <label class="floating-label"></label>
                                    <input type="number" placeholder="شماره تماس ضروری" name="en{{$i}}" class="form-control floating-input" required>
                                </div>
                                <div class="form-group floating-form-group">
                                    <label class="floating-label"></label>
                                    <input type="text" placeholder="شماره ملی" name="cm{{$i}}" class="form-control floating-input" required>
                                </div>
                            </div>
                        @endfor
                        <button type="submit" class="btn btn-info col-12 mt-3">پرداخت و رزرو این تور</button>
                    </form>
                </div>
            @endif

            <div class="card-body border-top border-color">
                <h6><i class="far fa-clock"></i> زمان برگزاری</h6>
                <div class="text-secondary px-4 pt-2">
                    {{my_jdate($tour->start_tour,'d F Y')}}
                    {{substr($tour->start_tour,11,10)}}
                </div>
                <div class="text-secondary px-4 pt-2">
                    <p><i class="fa fa-share"></i> زمان حرکت</p>
                    {{my_jdate($tour->move_time,'d F Y')}}
                    {{substr($tour->move_time,11,10)}}    
                </div>
                <div class="text-secondary px-4 pt-2">
                    <p><i class="fa fa-reply"></i> زمان بازگشت </p>
                    {{my_jdate($tour->back_time,'d F Y')}}
                    {{substr($tour->back_time,11,10)}}
                </div>
            </div>
            <div class="card-body border-top border-color">
                <h6><i class='fas fa-map-marked-alt'></i> برنامه سفر</h6>
                <div class="text-secondary px-4 pt-2">{!!$tour->description!!}</div>
            </div>
            <div class="card-body border-top border-color">
                <h6><i class='fas fa-umbrella-beach'></i> خدمات تور</h6>
                <div class="text-secondary px-4 pt-2">{{$tour->options}}</div>
            </div>
            <div class="card-body border-top border-color">
                <h6><i class='fas fa-luggage-cart'></i> لوازم ضروری</h6>
                <div class="text-secondary px-4 pt-2">{{$tour->accessories}}</div>
            </div>
            <div class="card-body border-top border-color">
                <h6><i class="fa fa-sort-numeric-asc"></i> درجه سختی</h6>
                <div class="text-secondary px-4 pt-2">{{$tour->hard_level}}</div>
            </div>
            <div class="card-body border-top border-color">
                <h6><i class='fas fa-plane-departure'></i> وسیله نقلیه</h6>
                <div class="text-secondary px-4 pt-2">{{$tour->car_type}}</div>
            </div>
            <div class="card-body border-top border-color">
                <h6><i class='fas fa-hotel'></i> نوع اقامتگاه</h6>
                <div class="text-secondary px-4 pt-2">{{$tour->residence}}</div>
            </div>
            @if ($is_active)
                @unless ($count ?? '')
                    <div class="m-4">
                        <button type="button" class="btn btn-info col-12 py-2 py-lg-3" style="border-radius: 30px !important;" data-toggle="modal" data-target="#myModal">
                            ثبت نام در این تور
                        </button>
                    </div>
                @endunless
            @else
                <div class="m-4">
                    <button type="button" class="btn btn-danger col-12 py-2 py-lg-3" style="border-radius: 30px !important;" disabled>
                        تاریخ برگزاری تور گذشته است
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content redu30 p-3" style="margin-top: 30%;">
                <form action="{{route('user.user-tours.update',$tour->id)}}" method="post" class="m-3">
                    <h4 class="modal-title mb-2">{{' رزرو تور '.$tour->title}}</h4>
                    @csrf
                    @method('patch')
                    <div class="login-box">
                        <div class="form-group floating-form-group">
                            <label class="floating-label">لطفا تعداد افراد را وارد کنید</label>
                            <input type="number" name="count" onkeyup="calculator()" id="validationCustom01" placeholder="عدد به لاتین مثلا '4'" class="form-control floating-input" required autofocus>
                        </div>
                        <div id="submit">
                            <button type="submit" class="btn col-12 btn-info mt-3">مرحله بعد</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function calculator(){
            var count  = parseInt(document.getElementById("validationCustom01").value) ;
            var time = parseInt("{{ $tour->capacity }}");
            if ( time < count ) {
                $("#submit").html("<p class='mb-3 text-center'>تعداد وارد شده بیش از ظرفیت میباشد</p><button class='btn btn-info col-12' disabled>مرحله بعد</button>");
            }
            else{
                $("#submit").html("<button class='btn btn-info col-12' type='submit'>مرحله بعد</button>");
            }
        };
    </script>

@endsection