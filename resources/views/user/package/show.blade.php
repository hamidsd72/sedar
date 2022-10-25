@extends('user.master')
@section('content')
<style>
    .vebinar-show-post-img {
        height: 200px;

    }
    .product-image-top {
        height: 260px;
    }
</style>


<div class="product-image-top mt-5" style="border-radius: 0 0 30px 30px;">
    <div class="background" style="background-image: url('{{url($item->photo->path)}}');">
        <img src="{{url($item->photo->path)}}" alt="" style="display: none;">
    </div>
    {{-- <div class="tag-images-count text-white bg-dark">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16 vm" viewBox="0 0 512 512">
            <title>ionicons-v5-e</title>
            <path d="M432,112V96a48.14,48.14,0,0,0-48-48H64A48.14,48.14,0,0,0,16,96V352a48.14,48.14,0,0,0,48,48H80" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></path>
            <rect x="96" y="128" width="400" height="336" rx="45.99" ry="45.99" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect>
            <ellipse cx="372.92" cy="219.64" rx="30.77" ry="30.55" style="fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px"></ellipse>
            <path d="M342.15,372.17,255,285.78a30.93,30.93,0,0,0-42.18-1.21L96,387.64" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
            <path d="M265.23,464,383.82,346.27a31,31,0,0,1,41.46-1.87L496,402.91" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
        </svg>
        <span class="vm">10</span>
    </div>
    <div class="small-btn-wrap">
        <button class="small-btn btn btn-info text-white mr-2">
            <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-16 vm" viewBox='0 0 512 512'><title>ionicons-v5-f</title><circle cx='128' cy='256' r='48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><circle cx='384' cy='112' r='48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><circle cx='384' cy='400' r='48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='169.83' y1='279.53' x2='342.17' y2='376.47' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='342.17' y1='135.53' x2='169.83' y2='232.47' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>                    
        </button>
        <button class="small-btn btn btn-danger text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16 vm" viewBox="0 0 512 512">
                <title>ionicons-v5-f</title>
                <path d="M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
            </svg>
        </button>
    </div> --}}
</div>
<!-- page content start -->
<div class="container top-30">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <p>{{$item->title}}</p>
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
            <div class="row mb-1">
                <div class="col">
                    <p class="small vm">
                        <span class=" text-secondary">4.5</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-12 vm" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="#FFD500" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                        </svg>
                        <span class=" text-secondary">| فعال</span>
                    </p>
                </div>
                <div class="col-auto">
                    <p class="small text-secondary">
                        @if($item->price == 0)
                            رایگان
                        @else
                            {{' قیمت '.number_format($item->price).' تومان '}}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        {{-- <div class="card-body border-top border-color">
            <div class="row">
                <div class="col-auto text-dark text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-24" viewBox="0 0 512 512">
                        <title>ionicons-v5-h</title>
                        <path d="M469.71,234.6c-7.33-9.73-34.56-16.43-46.08-33.94s-20.95-55.43-50.27-70S288,112,256,112s-88,4-117.36,18.63-38.75,52.52-50.27,70S49.62,224.87,42.29,234.6,29.8,305.84,32.94,336s9,48,9,48h86c14.08,0,18.66-5.29,47.46-8C207,373,238,372,256,372s50,1,81.58,4c28.8,2.73,33.53,8,47.46,8h85s5.86-17.84,9-48S477,244.33,469.71,234.6Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                        <rect x="400" y="384" width="56" height="16" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></rect>
                        <rect x="56" y="384" width="56" height="16" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></rect>
                        <path d="M364.47,309.16c-5.91-6.83-25.17-12.53-50.67-16.35S279,288,256.2,288s-33.17,1.64-57.61,4.81-42.79,8.81-50.66,16.35C136.12,320.6,153.42,333.44,167,335c13.16,1.5,39.47.95,89.31.95s76.15.55,89.31-.95C359.18,333.35,375.24,321.4,364.47,309.16Z"></path>
                        <path d="M431.57,243.05a3.23,3.23,0,0,0-3.1-3c-11.81-.42-23.8.42-45.07,6.69a93.88,93.88,0,0,0-30.08,15.06c-2.28,1.78-1.47,6.59,1.39,7.1A455.32,455.32,0,0,0,407.53,272c10.59,0,21.52-3,23.55-12.44A52.41,52.41,0,0,0,431.57,243.05Z"></path>
                        <path d="M80.43,243.05a3.23,3.23,0,0,1,3.1-3c11.81-.42,23.8.42,45.07,6.69a93.88,93.88,0,0,1,30.08,15.06c2.28,1.78,1.47,6.59-1.39,7.1A455.32,455.32,0,0,1,104.47,272c-10.59,0-21.52-3-23.55-12.44A52.41,52.41,0,0,1,80.43,243.05Z"></path>
                        <line x1="432" y1="192" x2="448" y2="192" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                        <line x1="64" y1="192" x2="80" y2="192" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                        <path d="M78,211s46.35-12,178-12,178,12,178,12" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                    </svg>
                    <p class="small"><small>Parking</small></p>
                </div>
                <div class="col-auto text-dark text-center pl-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-24" viewBox="0 0 512 512">
                        <title>ionicons-v5-n</title>
                        <circle cx="256" cy="256" r="192" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></circle>
                        <polygon points="256 175.15 179.91 238.98 200 320 256 320 312 320 332.09 238.98 256 175.15" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polygon>
                        <polyline points="332.09 238.98 384.96 216.58 410.74 143.32" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                        <line x1="447" y1="269.97" x2="384.96" y2="216.58" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                        <polyline points="179.91 238.98 127.04 216.58 101.26 143.32" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                        <line x1="65" y1="269.97" x2="127.04" y2="216.58" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                        <polyline points="256 175.15 256 117.58 320 74.94" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                        <line x1="192" y1="74.93" x2="256" y2="117.58" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                        <polyline points="312 320 340 368 312 439" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                        <line x1="410.74" y1="368" x2="342" y2="368" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                        <polyline points="200 320 172 368 200.37 439.5" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                        <line x1="101.63" y1="368" x2="172" y2="368" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                    </svg>
                    <p class="small"><small>Sport</small></p>
                </div>
                <div class="col-auto text-dark text-center pl-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-24" viewBox="0 0 512 512">
                        <title>ionicons-v5-n</title>
                        <path d="M215.08,156.92c-4.89-24-10.77-56.27-10.77-73.23A51.36,51.36,0,0,1,256,32h0c28.55,0,51.69,23.69,51.69,51.69,0,16.5-5.85,48.95-10.77,73.23" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <path d="M215.08,355.08c-4.91,24.06-10.77,56.16-10.77,73.23A51.36,51.36,0,0,0,256,480h0c28.55,0,51.69-23.69,51.69-51.69,0-16.54-5.85-48.93-10.77-73.23" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <path d="M355.08,215.08c24.06-4.91,56.16-10.77,73.23-10.77A51.36,51.36,0,0,1,480,256h0c0,28.55-23.69,51.69-51.69,51.69-16.5,0-48.95-5.85-73.23-10.77" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <path d="M156.92,215.07c-24-4.89-56.25-10.76-73.23-10.76A51.36,51.36,0,0,0,32,256h0c0,28.55,23.69,51.69,51.69,51.69,16.5,0,48.95-5.85,73.23-10.77" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <path d="M296.92,156.92c13.55-20.48,32.3-47.25,44.37-59.31a51.35,51.35,0,0,1,73.1,0h0c20.19,20.19,19.8,53.3,0,73.1-11.66,11.67-38.67,30.67-59.31,44.37" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <path d="M156.92,296.92c-20.48,13.55-47.25,32.3-59.31,44.37a51.35,51.35,0,0,0,0,73.1h0c20.19,20.19,53.3,19.8,73.1,0,11.67-11.66,30.67-38.67,44.37-59.31" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <path d="M355.08,296.92c20.48,13.55,47.25,32.3,59.31,44.37a51.35,51.35,0,0,1,0,73.1h0c-20.19,20.19-53.3,19.8-73.1,0-11.69-11.69-30.66-38.65-44.37-59.31" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <path d="M215.08,156.92c-13.53-20.43-32.38-47.32-44.37-59.31a51.35,51.35,0,0,0-73.1,0h0c-20.19,20.19-19.8,53.3,0,73.1,11.61,11.61,38.7,30.68,59.31,44.37" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
                        <circle cx="256" cy="256" r="64" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></circle>
                    </svg>
                    <p class="small"><small>Garden</small></p>
                </div>
                <div class="col-auto ml-auto">
                    <p class="small text-secondary">
                        3BHK House<br>2400 sq. ft.
                    </p>
                </div>

            </div>
        </div> --}}
        <div class="card-body border-top border-color">
            {{-- <p class="small text-secondary">1124 Calvin Street, Keeseville,<br>NY 12924</p> --}}
            <!-- map -->
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1674.9494684683343!2d-1.458484208354475!3d53.580323542286514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1598610506292!5m2!1sen!2sin" class="map-box mb-4" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}

            <h6>{{ $item->title }}</h6>
            <div class="text-secondary p-4">
                {!! $item->text !!}
            </div>
            @if(auth()->check() && App\Model\Basket::where('user_id',auth()->user()->id)->where('sale_id',$item->id)->where('type','package')->where('status','active')->exists())
                <div class="btn btn-danger col-12 mt-2">
                    این کارگاه برای شما فعال است
                </div>
            @else
                <a href="{{route('user.add_basket',[$item->id,'package'])}}" class="mt-2 btn btn-info btn-block col-12">
                    شرکت در این کارگاه
                </a>
            @endif
        </div>
    </div>
</div>









    {{-- <div class="card card-style preload-img"
         data-src="{{ ($item->pic_card != '' && $item->pic_card != null) ? url($item->pic_card) : '' }}" data-card-height="400">
        <div class="card-bottom ms-3">
            <h1 class="font-40 font-900 line-height-xl mt-4 color-white">{{ $item->title }}</h1>
            <p class="mb-3"><i class="fa fa-tag font-11 me-2"></i>{{ $item->slug }}</p>
            <div class="d-flex">
                <div class="flex-grow-1">
						<span class="font-11">
							امتیاز 
						</span>
                    <p class="mt-n2 mb-3">
                        <strong class="color-white opacity-50 pe-2">4.9</strong>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                    </p>
                </div>
                <div class="flex-shrink-1 align-self-end">
                    <a href="#" class="btn btn-full btn-s mb-3 me-3 font-900 text-uppercase rounded-sm shadow-l bg-green-dark">خرید</a>
                </div>
            </div>
        </div>
        <div class="card-overlay bg-gradient"></div>
    </div> --}}

    {{-- <div class="col-11 mx-auto mb-2" style="text-align: left;">
        <a class="text-secondary h4 px-3" href="{{url()->previous()}}">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
    <div class="card card-style">
        <img src="/{{$item->pic_card}}" alt="{{$item->title}}" class="vebinar-show-post-img">
        <div class="content">

            <h4 class="text-right">{{$item->title}}</h4>
            <hr>


            {!! $item->text !!}

                       

            <div class="divider mt-3"></div> --}}

            {{-- <div class="d-flex">
                <div class="flex-grow-1">
                                       <span class="font-11">Share with the World </span>
                    <strong class="color-theme">اشتراک گذاری</strong>
                    <input type="text" style="border-color: transparent !important;color: white;max-width: 10px;" id="share" name="share" value="{{route('user.package',$item->slug)}}">
                </div>
                <div class="flex-shrink-1 mt-1">
                    <a href="#" onclick="copy()" class="icon icon-xs rounded-xl shadow-m ms-2 bg-blue-dark"><i class="fa fa-share-alt"></i></a>
                    <a href="#" data-menu="menu-share" class="icon icon-xs rounded-xl shadow-m ms-2 bg-red-dark"><i class="fa fa-heart"></i></a>
                </div>
            </div> --}}
{{--            <a href="#" class="btn btn-full btn-m font-900 text-uppercase rounded-sm shadow-l bg-green-dark mt-4">Purchase Today</a>--}}
            {{-- <div class="text-center pt-4"> --}}
                {{-- <div class="align-self-center">
                    <div class="stepper rounded-l">
                        <a href="#" class="stepper-sub"><i class="fa fa-minus color-theme opacity-40"></i></a>
                        <input type="number" min="1" max="99" value="1">
                        <a href="#" class="stepper-add"><i class="fa fa-plus color-theme opacity-40"></i></a>
                    </div>
                </div> --}}
                {{-- @if(auth()->check() && App\Model\Basket::where('user_id',auth()->user()->id)->where('sale_id',$item->id)->where('type','package')->where('status','active')->exists())
                    این کارگاه در لیست کارگاه های شما موجود است.
                @else
                    <div class="col-lg-8 col-10 mx-auto">
                        <a href="{{route('user.add_basket',[$item->id,'package'])}}" class="btn btn-full btn-s font-900 text-uppercase rounded-sm shadow-l bg-blue-dark">
                            شرکت در این کارگاه
                            @if ($item->price && $item->price > 0 )
                                 به مبلغ 
                                {{number_format($item->price)}}
                                تومان
                            @endif
                        </a>
                    </div>
                @endif
            </div>


        </div>
    </div> --}}
    <script>
        function copy() {
            var copyText = document.getElementById("share");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            alert('آدرس کارگاه در کلیپبورد ذخیره شد');
        }
    </script>
    {{--    <div class="card card-style">--}}
    {{--        <div class="content mb-0">--}}
    {{--            <h2>Product Gallery</h2>--}}
    {{--            <p>--}}
    {{--                Here are the best and most beautiful features our product has to offer. Just tap and move through the images.--}}
    {{--            </p>--}}
    {{--            <div class="row text-center row-cols-3 mb-0">--}}
    {{--                <a class="col mb-4" data-gallery="gallery-1" href="images/pictures/1t.jpg" title="Vynil and Typerwritter">--}}
    {{--                    <img src="images/empty.png" data-src="images/pictures/1s.jpg" class="img-fluid rounded-xs preload-img" alt="img">--}}
    {{--                </a>--}}
    {{--                <a class="col mb-4" data-gallery="gallery-1" href="images/pictures/2t.jpg" title="Cream Cookie">--}}
    {{--                    <img src="images/empty.png" data-src="images/pictures/2s.jpg" class="img-fluid rounded-xs preload-img" alt="img">--}}
    {{--                </a>--}}
    {{--                <a class="col mb-4" data-gallery="gallery-1" href="images/pictures/3t.jpg" title="Cookies and Flowers">--}}
    {{--                    <img src="images/empty.png" data-src="images/pictures/3s.jpg" class="img-fluid rounded-xs preload-img" alt="img">--}}
    {{--                </a>--}}
    {{--                <a class="col mb-4" data-gallery="gallery-1" href="images/pictures/4t.jpg" title="Pots and Pans">--}}
    {{--                    <img src="images/empty.png" data-src="images/pictures/4s.jpg" class="img-fluid rounded-xs preload-img" alt="img">--}}
    {{--                </a>--}}
    {{--                <a class="col mb-4" data-gallery="gallery-1" href="images/pictures/5t.jpg" title="Berries are Packed with Fiber">--}}
    {{--                    <img src="images/empty.png" data-src="images/pictures/5s.jpg" class="img-fluid rounded-xs preload-img" alt="img">--}}
    {{--                </a>--}}
    {{--                <a class="col mb-4" data-gallery="gallery-1" href="images/pictures/6t.jpg" title="A beautiful Retro Camera">--}}
    {{--                    <img src="images/empty.png" data-src="images/pictures/6s.jpg" class="img-fluid rounded-xs preload-img" alt="img">--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}

    <!-- New in 4.8.1-->
    {{--    <div class="card card-style">--}}
    {{--        <div class="content">--}}
    {{--            <h2 class="text-center mb-0">Customer Reactions</h2>--}}
    {{--            <p class="text-center font-11 mt-n1 mb-3">How our customers feel about our services</p>--}}
    {{--            <div class="d-flex">--}}
    {{--                <div class="m-auto text-center">--}}
    {{--                    <h1 class="font-30">😍</h1>--}}
    {{--                    <strong class="font-12 opacity-70 color-theme">97%</strong>--}}
    {{--                </div>--}}
    {{--                <div class="m-auto text-center">--}}
    {{--                    <h1 class="font-30">😃</h1>--}}
    {{--                    <strong class="font-12 opacity-70 color-theme">2%</strong>--}}
    {{--                </div>--}}
    {{--                <div class="m-auto text-center">--}}
    {{--                    <h1 class="font-30">😐</h1>--}}
    {{--                    <strong class="font-12 opacity-70 color-theme">1%</strong>--}}
    {{--                </div>--}}
    {{--                <div class="m-auto text-center">--}}
    {{--                    <h1 class="font-30">☹️</h1>--}}
    {{--                    <strong class="font-12 opacity-70 color-theme">0%</strong>--}}
    {{--                </div>--}}
    {{--                <div class="m-auto text-center">--}}
    {{--                    <h1 class="font-30">😡</h1>--}}
    {{--                    <strong class="font-12 opacity-70 color-theme">0%</strong>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}

    <!-- New in 4.8.1-->
    {{--    <div class="card card-style">--}}
    {{--        <div class="content">--}}
    {{--            <h1 class="text-center mb-0 font-900 font-40">4.99</h1>--}}
    {{--            <p class="mb-2 mt-0 text-center font-10 opacity-50">Based on 40 Customer Ratings</p>--}}
    {{--            <div class="rounded-xl text-center pb-3">--}}
    {{--                <i class="font-20 color-yellow-dark px-1 fa fa-star"></i>--}}
    {{--                <i class="font-20 color-yellow-dark px-1 fa fa-star"></i>--}}
    {{--                <i class="font-20 color-yellow-dark px-1 fa fa-star"></i>--}}
    {{--                <i class="font-20 color-yellow-dark px-1 fa fa-star"></i>--}}
    {{--                <i class="font-20 color-gray-dark px-1 fa fa-star-half"></i>--}}
    {{--            </div>--}}
    {{--            <div class="d-flex">--}}
    {{--                <div class="flex-grow-1 w-25 align-self-center"><strong class="color-theme">Perfect</strong></div>--}}
    {{--                <div class="w-75 align-self-center">--}}
    {{--                    <div class="ms-2 progress rounded-m" style="height:8px">--}}
    {{--                        <div class="progress-bar bg-green-dark" role="progressbar" style="width: 98%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="align-self-center"><strong class="color-theme ps-3">98%</strong></div>--}}
    {{--            </div>--}}
    {{--            <div class="d-flex">--}}
    {{--                <div class="flex-grow-1 w-25 align-self-center"><strong class="color-theme">Good</strong></div>--}}
    {{--                <div class="w-75 align-self-center">--}}
    {{--                    <div class="ms-2 progress rounded-m" style="height:8px">--}}
    {{--                        <div class="progress-bar bg-green-light" role="progressbar" style="width: 2%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="align-self-center"><strong class="color-theme ps-3">2%</strong></div>--}}
    {{--            </div>--}}
    {{--            <div class="d-flex">--}}
    {{--                <div class="flex-grow-1 w-25 align-self-center"><strong class="color-theme">Average</strong></div>--}}
    {{--                <div class="w-75 align-self-center">--}}
    {{--                    <div class="ms-2 progress rounded-m" style="height:8px">--}}
    {{--                        <div class="progress-bar bg-yellow-dark" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="align-self-center"><strong class="color-theme ps-3">0%</strong></div>--}}
    {{--            </div>--}}
    {{--            <div class="d-flex">--}}
    {{--                <div class="flex-grow-1 w-25 align-self-center"><strong class="color-theme">Bad</strong></div>--}}
    {{--                <div class="w-75 align-self-center">--}}
    {{--                    <div class="ms-2 progress rounded-m" style="height:8px">--}}
    {{--                        <div class="progress-bar bg-orange-light" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="align-self-center"><strong class="color-theme ps-3">0%</strong></div>--}}
    {{--            </div>--}}
    {{--            <div class="d-flex">--}}
    {{--                <div class="flex-grow-1 w-25 align-self-center"><strong class="color-theme">Horible</strong></div>--}}
    {{--                <div class="w-75 align-self-center">--}}
    {{--                    <div class="ms-2 progress rounded-m" style="height:8px">--}}
    {{--                        <div class="progress-bar bg-red-dark" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="align-self-center"><strong class="color-theme ps-3">0%</strong></div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection




























{{--@extends('layouts.user')--}}


{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">--}}


{{--@endsection--}}
{{--@section('content')--}}
{{--    <section class="main-banner-in">--}}
{{--    <span class="shape-1 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">--}}
{{--        <img src="{{url('source/asset/user/images/shape-1.png')}}" alt="shape">--}}
{{--    </span>--}}
{{--        <span class="shape-2 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">--}}
{{--        <img src="{{url('source/asset/user/images/shape-2.png')}}" alt="shape">--}}
{{--    </span>--}}
{{--        <span class="shape-3 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">--}}
{{--        <img src="{{url('source/asset/user/images/shape-3.png')}}" alt="shape">--}}
{{--    </span>--}}
{{--        <span class="shape-4 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">--}}
{{--        <img src="{{url('source/asset/user/images/shape-4.png')}}" alt="shape">--}}
{{--    </span>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <h1 class="h1-title">مشخصات پکیج</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!--Banner End-->--}}

{{--    <!--Banner Breadcrum Start-->--}}
{{--    <div class="main-banner-breadcrum">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="banner-breadcrum">--}}
{{--                        <ul>--}}
{{--                            <li><a href="index.html">خانه</a></li>--}}
{{--                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>--}}
{{--                            <li><a href="courses.html">پکیج ها</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--Banner Breadcrum End-->--}}

{{--    <!--Course Detail Start-->--}}
{{--    <section class="main-course-detail-in">--}}
{{--        <div class="container" dir="rtl">--}}
{{--            <div class="row">--}}
{{--                <!--Course Detail Info Start-->--}}
{{--                <div class="col-xl-8 col-lg-7">--}}
{{--                    <div class="course-detail-box">--}}
{{--                        <h2 class="h2-title">{{$item->title}}</h2>--}}
{{--                        <div class="course-detail-user-box">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col-xxl-5 col-xl-12 col-lg-12">--}}
{{--                                    <div class="course-detail-instructor-date-box">--}}
{{--                                        <div class="course-detail-instructor">--}}
{{--                                            <div class="course-detail-instructor-img">--}}
{{--                                                <img style="width: 50px;"--}}
{{--                                                     src="{{$admin->photo? url($admin->photo->path) :asset('admin/img/user.png')}}"--}}
{{--                                                     class="rounded-circle" alt="instructor">--}}
{{--                                            </div>--}}
{{--                                            <div class="course-detail-instructor-text">--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="course-detail-date">--}}
{{--                                            <a href="javascript:void(0);"><p dir="ltr">{{date('d M, Y',--}}
{{--                                                strtotime($item->created_at))}}</p></a>--}}
{{--                                            <span>آخرین اپدیت</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xxl-7 col-xl-12 col-lg-12">--}}
{{--                                    <div class="course-detail-rating-tag-box">--}}
{{--                                        <div class="course-detail-rating-box">--}}
{{--                                            <a href="javascript:void(0);">--}}
{{--                                                <div class="course-detail-rating-star">--}}
{{--                                                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                                                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                                                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                                                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                                                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                                                    <p>5.00(2k)</p>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                            <span></span>--}}
{{--                                        </div>--}}
{{--                                        <div class="course-detail-tag-box">--}}
{{--                                            <ul>--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="course-detail-img wow fadeInUp animated" data-wow-delay=".4s">--}}
{{--                            @if($item->pic_card != '' && $item->pic_card != null)--}}
{{--                                <img src="{{url($item->pic_card)}}" alt="course">--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <h3 class="h3-title">توضیحات</h3>--}}
{{--                        {!! $item->text !!}--}}
{{--                        <div class="course-detail-point">--}}
{{--                            @if(count($item->joins))--}}

{{--                                <h3 class="h3-title">سرویس های این پکیج</h3>--}}
{{--                                @if (Auth::check())--}}
{{--                                    @if(App\Model\Basket::where('user_id',auth()->user()->id)->where('sale_id',$item->id)->where('type','package')->where('status','active')->exists())--}}
{{--                                        @foreach($item->joins as $key=>$join_item)--}}
{{--                                            @if($join_item->service)--}}
{{--                                                <p> {{$join_item->service->title}}</p>--}}
{{--                                                <iframe style="width: 100%; height:300px;" allowfullscreen--}}
{{--                                                        src="{{$join_item->service->video_link}}">--}}
{{--                                                </iframe>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    @else--}}
{{--                                        <ul>--}}
{{--                                            @foreach($item->joins as $key=>$join_item)--}}

{{--                                                <li><i class="fa fa-check-circle" aria-hidden="true"></i>--}}
{{--                                                    <p> {{$join_item->service?''.$join_item->service->title:''}}</p>--}}
{{--                                                </li>--}}

{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    @endif--}}

{{--                                @else--}}
{{--                                    <ul>--}}
{{--                                        @foreach($item->joins as $key=>$join_item)--}}
{{--                                            @if($join_item->service)--}}
{{--                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i><a class="px-2"--}}
{{--                                                                                                        href="{{route("user.service",[$join_item->service->id,$join_item->service->slug])}}"> {{$join_item->service->title}}</a>--}}
{{--                                            </li>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                @endif--}}

{{--                            @endif--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Course Detail Info End-->--}}
{{--                <!--Sidebar Start-->--}}
{{--                <div class="col-xl-4 col-lg-5">--}}
{{--                    <div class="course-detail-sidebar">--}}
{{--                        <div class="get-the-course">--}}
{{--                            <div class="courses-sidebar-title">--}}
{{--                                <div class="sidebar-title-line"></div>--}}
{{--                                <h3 class="h3-title">همین حالا سفارش دهید</h3>--}}
{{--                            </div>--}}

{{--                            <div class="get-course-line"></div>--}}

{{--                            <div class="get-course-price">--}}
{{--                                <h3 class="h3-title">{{$item->price}}تومان </h3>--}}
{{--                            </div>--}}
{{--                            @if (!Auth::check())--}}
{{--                                برای خرید باید وارد پنل کاربری خود شوید!--}}
{{--                                <hr/>--}}
{{--                            @else--}}

{{--                                @if(App\Model\Basket::where('user_id',auth()->user()->id)->where('sale_id',$item->id)->where('type','package')->where('status','active')->exists())--}}
{{--                                    این پکیج در لیست خرید های شما موجود است.--}}
{{--                                @else--}}
{{--                                    <a href="{{route('user.add_basket',[$item->id,'package'])}}" class="sec-btn">اضافه--}}
{{--                                        به سبد خرید</a>--}}
{{--                                @endif--}}


{{--                            @endif--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Sidebar End-->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
{{--@section('scripts')--}}
{{--    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>--}}
{{--@endsection--}}
