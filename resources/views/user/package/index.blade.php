@extends('user.master')
@section('content')
    {{-- <h2 class="mx-3 mb-4">
        لیست کارگاه ها
    </h2> --}}
    <div class="container mt-5 pt-3">
        @if ($items->count())
            <p class="text-secondary text-center"> موارد یافت شده <br><span class="text-dark">{{$items->count()}} مورد </span> در حال برگزاری </p>
        @endif
        <div class="row">
            @foreach($items as $key => $package)
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card product-card-large w-100 mb-4">
                        <div class="card-body p-3">
                            <div class="product-image-large">
                                @if (\Request::route()->getName()=='user.user-tours.create')
                                    <div class="background" style="background-image: url( {{url( \App\Model\TourAlbum::where('display',true)->where('file_id',$package->id)->first()->path )}} );">
                                        <img src="{{url( \App\Model\TourAlbum::where('display',true)->where('file_id',$package->id)->first()->path )}}" alt="" style="display: none;">
                                    </div>
                                @else
                                    <div class="background" style="background-image: url({{url($package->pic_card)}});">
                                        <img src="{{url($package->pic_card)}}" alt="" style="display: none;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <p>{{ $package->title }}</p>
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
                            <div class="row">
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
                                        @if($package->price == 0)
                                            رایگان
                                        @else
                                            {{' قیمت '.number_format($package->price).' تومان '}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if (\Request::route()->getName()=='user.user-tours.create')
                            <div class="card-footer border-top border-color">
                                <div class="row mb-0">
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
                                        <p class="small"><small>{{ $package->car_type }}</small></p>
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
                                        <p class="small"><small>{{ $package->accessories }}</small></p>
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
                                        <p class="small"><small>{{ $package->hard_level }}</small></p>
                                    </div>
                                    <div class="col-auto ml-auto">
                                        <p class="small text-secondary">
                                            {{ $package->residence }}<br>{{ $package->options }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="card-footer border-top border-color">
                            <div class="row mb-0">
                                <div class="col my-auto">
                                    <a href="{{ \Request::route()->getName()=='user.user-tours.create'? route('user.ads-tours-show-guest',$package->slug) : route('user.package',$package->slug)}}" 
                                        class="small text-secondary">اطلاعات بیشتر</a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ \Request::route()->getName()=='user.user-tours.create'? route('user.ads-tours-show-guest',$package->slug) : route('user.package',$package->slug)}}" 
                                        class="btn border border-color btn-info">مشاهده</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

