@extends('layouts.user')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endsection
@section('content')
    <div class="container pt-5  mt-5" dir="rtl">
        <div class="row" dir="rtl">
            <div class="col-md-6">
                <div class="img_box_reserve">
                    <img src="{{$item->pic_card!=null?url($item->pic_card):url($item->photo->path)}}"
                         alt="{{$item->title}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="info_service">
                    <ul>
                        <li><span>عنوان پکیج :</span>
                            {{$item->title}}
                        </li>
                        <li><span>قیمت پکیج :</span>
                            {{number_format($item->price) .' تومان'}}
                        </li>

                        @if($item->join)
                            <li><span>سرویس های این پکیج:</span>
                                <br>
                                @foreach($item->joins as $key=>$join_item)
                                    {{$join_item->service?'_'.$join_item->service->title:''}}
                                    <br>
                                @endforeach
                            </li>
                        @endif
                    </ul>
                        <div class="modal fade" id="my_modal_1" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                             @if($key%2==0) data-aos="fade-up"
                             @else data-aos="fade-down" @endif data-aos-delay="100">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            توجه!!!</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-right">
                                        @if (!Auth::check())
                                            برای خرید باید وارد پنل کاربری خود شوید!
                                            <hr/>
                                        @endif
                                        شما قصد خرید پکیج {{$item->title}} را با قیمت
                                        : <span id="price_package_{{$item->id}}"
                                                class="price_modal_span font-weight-bold">{{ number_format($item->price) }}</span>
                                        تومان  را دارید.

                                        <form method="GET" id="buy_1" class="frm_get_buy_package"
                                              action="{{route('user.login.package.buy',[$item->slug])}}">
                                            @csrf
                                            <input type="text" name="type" hidden id="type_1">
                                            <div class="alert alert-success text-center">
                                                سرویس های این پکیج :
                                            </div>
                                            @foreach($item->joins as $default_service)
                                                <div>

                                                    - {{$default_service->service->title}}
                                                    @if(count($default_service->service->plus_active))
                                                        <div class="{{count($default_service->service->plus_active)?'alert alert-warning':''}}">
                                                            <div class="alert alert-sucsses">توضیحات</div>
                                                            @foreach($default_service->service->plus_active as $plus)
                                                                <p class="mb-0">
                                                                    <input type="checkbox"
                                                                           name="plus[]" value="{{$plus->id}}"
                                                                           id="plus_{{$item->id}}_{{$default_service->service->id}}_{{$plus->id}}"
                                                                           class="plus_service">

                                                                    {{$plus->title.' با قیمت : '}}
                                                                    <span id="price_plus_{{$item->id}}_{{$default_service->service->id}}_{{$plus->id}}">{{price($plus->price)}}</span>
                                                                    تومان
                                                                </p>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                            @if($item->custom==1)
                                                {{--<hr>--}}
                                                <div class="alert alert-warning text-center">

                                                    @if (Auth::check())
                                                        حد اکثر {{$item->custom_service_count}}
                                                        سرویس مورد نظر خود را از سرویس های موجود
                                                        انتخاب کنید.
                                                    @else
                                                        ابتدا به تعداد حد
                                                        اکثر{{$item->custom_service_count}}
                                                        سرویس مورد نظر خود را از سرویس های موجود را
                                                        انتخاب کنید، سپس اقدام به ثبت نام یا ورود
                                                        فرمائید
                                                    @endif
                                                </div>
                                                <input type="text" value="{{$item->custom_service_count}}"
                                                       name="custom_cunt" id="custom_cunt" hidden>


                                                @foreach($service_custom as $key2=>$service)
                                                    @if($service->id!=11)
                                                        <div>
                                                        <span>
                                                            <input name="service[]" type="checkbox"
                                                                   value="{{$service->id}}" class="custom_service">
                                                            {{$service->title}}
                                                        </span>
                                                            @if(count($service->plus_active))
                                                                <div class="{{count($service->plus_active)?'alert alert-warning':''}} display_none"
                                                                     id="gold_service_plus_{{$service->id}}">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary mb-2"
                                                                            data-toggle="modal"
                                                                            data-target="#info_plus_{{$service->id}}">
                                                                        بیشتر بدانید...
                                                                    </button>

                                                                    <div class="modal fade info_plus"
                                                                         id="info_plus_{{$service->id}}" tabindex="-1"
                                                                         role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">شارژ پلاس
                                                                                        چیست؟</h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body text-right">
                                                                                    {{$service->info_plus}}
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">متوجه
                                                                                        شدم
                                                                                    </button>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    @foreach($service->plus_active as $plus)
                                                                        <p class="mb-0">
                                                                            <input type="checkbox" name="plus[]"
                                                                                   value="{{$plus->id}}"
                                                                                   id="plus_{{$item->id}}_{{$service->id}}_{{$plus->id}}"
                                                                                   class="plus_service gold_service_plus_{{$service->id}}">

                                                                            {{$plus->title.' با قیمت : '}}
                                                                            <span id="price_plus_{{$item->id}}_{{$service->id}}_{{$plus->id}}">{{price($plus->price)}}</span>
                                                                            تومان
                                                                        </p>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif

                                                @endforeach
                                            @endif
                                            <div class="alert alert-danger display_none" id="factor_{{$item->id}}">
                                                مبلغ نهائی قابل پرداخت برای پکیج :
                                                <span id="factor_price_{{$item->id}}">
                                                        {{ price($item->price)}}
                                                    </span>
                                                تومان
                                            </div>
                                            @if (Auth::check())
                                                <div class="container_fluid d_flex off_code_div my-4">
                                                    <input type="text" class="form-control input_off_code input_off_code_{{$item->id}} text-center" data-url="{{route('user.index')}}" data-price="{{$item->price}}" name="off_code" id="off_code" placeholder="کد تخفیف">
                                                    <a href="javascript:void(0);" data-id="{{$item->id}}" class="btn btn-success btn_off_code">اعمال</a>
                                                </div>
                                                <div class="container_fluid my-3 off_code_set off_code_set_{{$item->id}}" style="display: none">
                                                    <p class="p_class">تخفیف اعمال شده : <span class="percent_off percent_off_{{$item->id}}"></span> % </p>
                                                    <p>هزینه پکیج پس از تخفیف : <span class="price_off price_off_{{$item->id}}"></span> تومان </p>
                                                </div>
                                            @endif
                                        </form>


                                    </div>
                                    <div class="col-12 rule_check">
                                        <p class="d-flex">
                                            <input type="checkbox" class="form-control check_rule" value="1">
                                            <span><a href="{{route('user.rule.show')}}" target="_blank" rel="noreferrer">قوانین و مقررات </a> را مطالعه کرده و پذیرفتم </span>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        @if (Auth::check())
                                            <button onclick="send_form(1,'yes')"
                                                    class="btn btn-info">بله
                                            </button>
                                            <button onclick="send_form(1,'no')"
                                                    class="btn btn-outline-warning">خیر
                                            </button>
                                        @else
                                            <button onclick="send_form(1,'register')"
                                                    class="btn btn-info">ثبت نام
                                            </button>
                                            <button onclick="send_form(1,'login')"
                                                    class="btn btn-outline-warning">ورود
                                            </button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        @if (Auth::check())
                            <a href="javascript:void(0);" data-toggle="modal"
                               data-target="#my_modal_1"
                               class="mt-auto button_label mx-auto  my-2  ">خرید <span
                                        class="package_price package_price_span">{{ number_format($item->price) }}
                                 </span> تومان</a>
                        @else
                            <a href="javascript:void(0);" data-toggle="modal"
                               data-target="#my_modal_1"
                               class="mt-auto button_label mx-auto my-2 ">خرید <span
                                        class="package_price package_price_span">{{ number_format($item->price) }}
                                 </span> تومان</a>
                        @endif
                </div>
            </div>
            @if(count($item->video_learn)>0)
                <div class="col-md-6 mt-5">
                    <h5 class="text-right">لیست ویدئو ها</h5>
                    <table class="table">
                        @foreach($item->video_learn as $key=>$video)
                            <tr>
                                <td width="50" class="text-center">{{$key+1}}</td>
                                <td class="w-75 text-right">{{$video->title}}</td>
                                <td width="50" class="text-center p-0">
                                    <a
                                            @guest() href="javascript:void(0);" class="alert_video"
                                            data-title="{{$video->title}}" data-type="login" @endguest
                                            @auth()
                                            @if($video->type=='free')
                                            data-fancybox="gallery"
                                            href="{{url($video->path)}}"
                                            @else
                                            @if(!$item->sales)
                                            href="javascript:void(0);" class="alert_video"
                                            data-title="{{$video->title}}" data-type="false"
                                            @else data-fancybox="gallery"
                                            href="{{url($video->path)}}"
                                            @endif
                                            @endauth
                                            @endif
                                    >
                                        <img src="{{asset('user/pic/icon/video.png')}}" width="40"
                                             alt="{{$video->title}}">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
            <div class="@if(count($item->video_learn)>0) col-md-6 @else col-md-12 @endif  mt-5 text-justify">
                {!! $item->text !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection