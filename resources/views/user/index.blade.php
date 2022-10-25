@extends('user.master')
@section('content')
<style>
    .splide .splide__slide img {
        height: 120px !important;
    }
    .splide--draggable > .splide__track > .splide__list > .splide__slide {
        -webkit-user-select: none;
        user-select: none;
        width: 220px !important;
    }
    
</style>

    <!-- page content start -->
    <div class="container pt-4">
        <div class="form-group mb-0 pt-2">
            <form action="{{route('user.services-search')}}" method="post" class="mt-5">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control search" name="search" placeholder="جستجو در گروه های مشاوره">
                    </div>
                    {{-- <div class="col-auto pl-0">
                        <button class="sqaure-btn btn btn-info text-white filter-btn" type="button">
                            <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-24" viewBox='0 0 512 512'>
                                <title>ionicons-v5-i</title>
                                <line x1='368' y1='128' x2='448' y2='128' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='64' y1='128' x2='304' y2='128' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='368' y1='384' x2='448' y2='384' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='64' y1='384' x2='304' y2='384' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='208' y1='256' x2='448' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='64' y1='256' x2='144' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <circle cx='336' cy='128' r='32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <circle cx='176' cy='256' r='32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <circle cx='336' cy='384' r='32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                            </svg>
                        </button>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>

    <!-- demo slider top -->
    <div class="mb-4 container">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                @for ($i = 0; $i < $sliders->count(); $i++)
                    <li data-target="#demo" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li> 
                @endfor
            </ul>
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{$key==0?'active':''}}">
                        <a href="{{$slider->link}}" >
                            <img src="{{$slidersPhotos->where('pictures_id', $slider->id)->first()->path}}" alt="Los Angeles">
                            <div class="carousel-caption p-1 p-lg-2" style="background: #20364bad;right: 2%;width: 96%;bottom: 4% !important;border-radius: 12px">
                                <a href="{{$slider->link}}" class="px-2 text-white" style="font-size: 16px;">{{$slider->title}}</a>
                                <div class="float-left">
                                    <div class="tag-images-count text-white px-2">
                                        <span class="vm px-1">{{($key+1).' از '.$sliders->count()}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16 vm" viewBox="0 0 512 512">
                                            <title>ionicons-v5-e</title>
                                            <path d="M432,112V96a48.14,48.14,0,0,0-48-48H64A48.14,48.14,0,0,0,16,96V352a48.14,48.14,0,0,0,48,48H80" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></path>
                                            <rect x="96" y="128" width="400" height="336" rx="45.99" ry="45.99" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect>
                                            <ellipse cx="372.92" cy="219.64" rx="30.77" ry="30.55" style="fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px"></ellipse>
                                            <path d="M342.15,372.17,255,285.78a30.93,30.93,0,0,0-42.18-1.21L96,387.64" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                            <path d="M265.23,464,383.82,346.27a31,31,0,0,1,41.46-1.87L496,402.91" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                        </svg>
                                    </div>
                                </div>

                            </div>   
                        </a>
                    </div>
                @endforeach
            </div> 
        </div>
    </div>

    {{-- <div class="splide double-slider slider-no-dots text-center visible-slider ps-2" id="double-slider-1">
        <div class="splide__track">
            <div class="splide__list">
                @foreach($serviceCat as $service)
                    <div class="splide__slide">
                        <a href="/services/{{$service->id}}">
                            <div class="card card-style m-0" style="border-radius: 20px;">
                                <img src="{{url($service->pic)}}" alt="{{$service->title}}">
                                <a href="{{route('user.services',$service->id)}}" class="card-footer">
                                    <p class="text-dark mb-1" style="text-align: right;">{{'دسته ی '.$service->title}}</p>
                                    <p class="small text-secondary" style="text-align: right;">نمایش  این دسته </p>
                                </a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row mb-0">
                    <div class="col">
                        <h6 class="text-dark my-1">
                            <i class="fa fa-users"></i><span>
                            <span class="vm ml-2">گروه های مشاوره</span>
                        </h6>
                    </div>
                    {{-- <div class="col-auto">
                        <a class="dropdown-item" href="{{ route('user.packages') }}">نمایش همه</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row px-2 mb-0">
                    @foreach($serviceCat as $service)
                        <a href="{{ $service->slug=='تور' ? route('user.user-tours.create') : route('user.services',$service->id) }}" class="col-6 col-lg-4 px-2 mb-3 balabala">
                            <div>
                                {{-- <input type="radio" name="facilitiestype" class="checkbox-boxed" id="{{$service->title}}">
                                <label class="checkbox-lable" for="{{$service->title}}">
                                    <span class="image-boxed text-white"> --}}
                                        <img src="{{url($service->pic)}}" alt="{{$service->title}}" class="img-fluid shadow">
                                    {{-- </span> --}}
                                    <span class="p-2 h6">{{$service->title}}</span>
                                {{-- </label> --}}
                            </div>
                        </a>
                    @endforeach
                    {{-- @foreach($serviceCat as $service)
                        <div class="splide__slide">
                            <a href="/services/{{$service->id}}">
                                <div class="card card-style m-0" style="border-radius: 20px;">
                                    <img src="{{url($service->pic)}}" alt="{{$service->title}}">
                                    <a href="{{route('user.services',$service->id)}}" class="card-footer">
                                        <p class="text-dark mb-1" style="text-align: right;">{{'دسته ی '.$service->title}}</p>
                                        <p class="small text-secondary" style="text-align: right;">نمایش  این دسته </p>
                                    </a>
                                </div>
                            </a>
                        </div>
                    @endforeach --}}
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row mb-0">
                    <div class="col">
                        <h6 class="text-dark my-1">
                            <i class="fa fa-users"></i><span>
                            <span class="vm ml-2">کارگاه های جدید</span>
                        </h6>
                    </div>
                    <div class="col-auto">
                        <a class="dropdown-item" href="{{ route('user.packages') }}">نمایش همه</a>
                    </div>
                </div>
            </div>
            @foreach($packages as $key => $package)
                <div class="col-lg-12">
                    <div class="card product-card-small mb-3" style="box-shadow: none;">
                        <div class="card-body">
                            <div class="row mb-0">
                                <div class="col-auto">
                                    <div class="product-image-small">
                                        <div class="background" style="background-image: url('{{url($package->pic_card)}}');">
                                            <img src="{{url($package->pic_card)}}" alt="img" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-2" style="padding-left: 5%;">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <p ><a href="{{route('user.package',$package->slug)}}" class="text-dark">{{$package->title }}</a></p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="small vm">
                                                <span class=" text-secondary">4.5</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-12 vm" viewBox="0 0 24 24">
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path fill="#FFD500" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-0 no-gutters">
                                        <div class="col">
                                            <p class="small vm">
                                                <span class=" text-secondary">{{my_jdate($package->updated_at,'d F Y')}}</span>
                                            </p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="small text-secondary"><small>فعال</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="container mt-4">
        <div class="row">
            @foreach($packages as $key => $package)
                <div class="col-lg-12">
                    <div class="card product-card-small mb-3">
                        <div class="card-body">
                            <div class="row mb-0">
                                <div class="col-auto">
                                    <div class="product-image-small">
                                        <div class="background" style="background-image: url('{{url($package->pic_card)}}');">
                                            <img src="{{url($package->pic_card)}}" alt="img" style="display: none;">
                                        </div>
    
                                    </div>
                                </div>
                                <div class="col pl-0 mt-2">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <p ><a href="{{route('user.package',$package->slug)}}" class="text-dark">{{$package->title }}</a></p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="small vm">
                                                <span class=" text-secondary">4.5</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-12 vm" viewBox="0 0 24 24">
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path fill="#FFD500" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-0 no-gutters">
                                        <div class="col">
                                            <p class="small vm">
                                                <span class=" text-secondary">{{my_jdate($package->updated_at,'d F Y')}}</span>
                                            </p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="small text-secondary"><small>فعال</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    @include('includes.footer')

    <script>
        function ConvertNumberToPersion() {
            let persian = { 0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹' };
            function traverse(el) {
                if (el.nodeType == 3) {
                    var list = el.data.match(/[0-9]/g);
                    if (list != null && list.length != 0) {
                        for (var i = 0; i < list.length; i++)
                            el.data = el.data.replace(list[i], persian[list[i]]);
                    }
                }
                for (var i = 0; i < el.childNodes.length; i++) {
                    traverse(el.childNodes[i]);
                }
            }
            traverse(document.body);
        }
        ConvertNumberToPersion()
    </script>

@endsection
