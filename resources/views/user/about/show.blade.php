@extends('layouts.user')
@section('content')


    <section class="main-banner-in">
    <span class="shape-1 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">
        <img src="{{url('source/asset/user/images/shape-1.png')}}" alt="shape">
    </span>
        <span class="shape-2 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">
        <img src="{{url('source/asset/user/images/shape-2.png')}}" alt="shape">
    </span>
        <span class="shape-3 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">
        <img src="{{url('source/asset/user/images/shape-3.png')}}" alt="shape">
    </span>
        <span class="shape-4 animate-this" style="transform: translateX(-17.5782px) translateY(-9.99425px);">
        <img src="{{url('source/asset/user/images/shape-4.png')}}" alt="shape">
    </span>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="h1-title">درباره ما</h1>
                </div>
            </div>
        </div>
    </section>
    <!--Banner End-->

    <!--Banner Breadcrum Start-->
    <div class="main-banner-breadcrum">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-breadcrum">
                        <ul>
                            <li><a href="{{url('/')}}">خانه</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li><a href="{{route('user.about.show')}}">درباره ما</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="main-course-detail-in">
        <div class="container">
            <div class="row justify-content-center" dir="rtl">
                <!--Course Detail Info Start-->

                <div class="col-xl-8 col-lg-7">
                    <div class="course-detail-box">
                        <h2 class="h2-title">درباره ما</h2>
                        <div class="course-detail-user-box">
                            <div class="row align-items-center">
                                <div class="col-xxl-5 col-xl-12 col-lg-12">
                                    <div class="course-detail-instructor-date-box">

                                    </div>
                                </div>
                                <div class="col-xxl-7 col-xl-12 col-lg-12">

                                </div>
                            </div>
                        </div>
                        <div class="course-detail-img wow fadeInUp  animated" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <img src="{{url($item->pic)}}" alt="course">
                        </div>
                        {!! $item->text!!}
                    </div>

                </div>
                <!--Course Detail Info End-->
                <!--Sidebar Start-->
                <!--Sidebar End-->
            </div>
        </div>
    </section>

{{--    <!--Banner Breadcru

    <div class="container mt-5" >
        <h5 class="mt-5 text-right dir-rtl" data-aos="fade-up" data-aos-delay="500">درباره ما</h5>
        <hr data-aos="fade-up" data-aos-delay="500">
        <div class="row dir-rtl">
            <div class="col-md-2"></div>
            <div class="col-md-8 img_about" data-aos="fade-down" data-aos-delay="1000">
                <img src="{{url($item->pic)}}" alt="سدارکارت">
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row dir-rtl">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-justify dir-rtl mt-4" data-aos="fade-up" data-aos-delay="1500">
                <h5 class="text-right dir-rtl">@item($item->title)</h5>
                {!! $item->text!!}
            </div>
            <div class="col-md-2"></div>

        </div>
        @foreach($items as $key=>$itemss)
            <div class="row mt-5 {{$key%2==0? 'dir-ltr' :'dir-rtl'}}">
                <div class="col-md-5 img_about" @if($key%2==0) data-aos="fade-up" @else data-aos="fade-down" @endif data-aos-delay="1000">
                    <img src="{{url($itemss->pic)}}" alt="سدارکارت">
                </div>
                <div class="col-md-7 text-justify dir-rtl mt-4"  @if($key%2==0) data-aos="fade-up" @else data-aos="fade-down" @endif data-aos-delay="1500">
                    <h5 class="text-right dir-rtl">@item($itemss->title)</h5>
                    {!! $itemss->text!!}
                </div>
            </div>
        @endforeach
    </div>--}}
@endsection
