@extends('user.master')

@section('content')
<style>
    .opacity-80 {
        background: #2F2D51 !important;
    }
</style>
    <div class="container pt-5 mt-3">

        <div class="card card-style preload-img entered loaded mt-4 mb-3" data-src="{{$about->pic_home?$about->pic_home:'images/pictures/18w.jpg'}}" data-card-height="180" data-ll-status="loaded" style="height: 180px; background-image: url({{$about->pic_home?$about->pic_home:'images/pictures/18w.jpg'}});">
            <div class="card-center ms-3">
                <h1 class="color-white mb-0">{{ $about->title_home }}</h1>
                <p class="color-white mt-n1 mb-0"></p>
            </div>
            <div class="card-center me-3">
            </div>
            <div class="card-overlay opacity-80"></div>
        </div>
        <div class="card card-style">
            <div class="content">
                <h4>{{ $about->title_home }}</h4>
                    {!! $about->text_home !!}
            </div>
        </div>
        
    </div>
    @include('includes.footer')

    {{-- <div class="card card-style contact-form">
        <div class="content">
                <form method="post" action="{{route('user.contact.post')}}">
                    @csrf
                <fieldset>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="contactNameField">نام:<span>(required)</span></label>
                        <input type="text" name="full_name" value="" class="round-small" id="contactNameField">
                    </div>
                    <div class="form-field form-email">
                        <label class="contactEmailField color-theme" for="contactEmailField">ایمیل:<span>(required)</span></label>
                        <input type="text" name="email" value="" class="round-small" id="contactEmailField">
                    </div>
                    <div class="form-field form-email">
                        <label class="contactEmailField color-theme" for="contactEmailField">موضوع:<span>(required)</span></label>
                        <input type="text" name="subject" value="" class="round-small" id="contactEmailField">
                    </div>
                    <div class="form-field form-text">
                        <label class="contactMessageTextarea color-theme" for="contactMessageTextarea">متن:<span>(required)</span></label>
                        <textarea name="text" class="round-small" id="contactMessageTextarea"></textarea>
                    </div>
                    <div class="form-button">
                        <input type="submit" class="btn bg-highlight text-uppercase font-900 btn-m btn-full rounded-sm  shadow-xl contactSubmitButton" value="ارسال پیام" data-formid="contactForm">
                    </div>
                </fieldset>
            </form>
        </div>
    </div> --}}
 
    {{-- <section class="social-network col-11 mx-auto text-center">
        <div class="row bg-white text-secondary p-3 mb-2 py-4" style="border-radius: 20px;">
            <h2 class="col-12 text-dark text-uppercase py-1">i moshaver</h2>
            
            <div class="col-12">
                @foreach ($network as $net)
                    <a href="{{$net->address}}" class="box mx-1">
                        @switch($net->config)
                            @case("instagram")
                                <i class="fab fa-instagram"></i>
                                @break
                            @case("whatsapp")
                                <i class="fab fa-whatsapp"></i>
                                @break
                            @case("email")
                                <i class="fa fa-envelope-o"></i>
                                @break
                        @endswitch
                    </a>
                @endforeach
            </div>

            <small class="col-12 pt-1 mt-1 border-top">شرایط و قوانین آی مشاور</small>

        </div>
    </section>
     --}}
    {{-- <div class="footer card card-style">
        <a href="#" class="footer-title"><span class="color-highlight">Connections</span></a>
        <p class="footer-text">here set your connections</p>
        <div class="text-center mb-3">
            <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-phone"><i class="fa fa-phone"></i></a>
        </div>
        <div class="clear"></div>
    </div> --}}
@endsection






















{{--@extends('layouts.user')--}}
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
{{--                    <h1 class="h1-title">تماس با ما</h1>--}}
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
{{--                            <li><a href="{{url('/')}}">خانه</a></li>--}}
{{--                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>--}}
{{--                            <li><a href="{{route('user.contact.show')}}">تماس با ما</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <section class="main-contact-page-in">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-5">--}}
{{--                    <div class="contact-detail-box">--}}
{{--                        <h3 class="h3-title">راه های ارتباط با مجموعه سدار کارت</h3>--}}
{{--                        <p></p>--}}
{{--                        <ul>--}}
{{--                            --}}{{--<li>--}}
{{--                                <div class="contact-detail-icon">--}}
{{--                                    <img src="{{url('source/asset/user/images/contact-location.png')}}" alt="location">--}}
{{--                                </div>--}}
{{--                                <div class="contact-detail-content">--}}
{{--                                    <p>آدرس</p>--}}
{{--                                    شهرک غرب بلوار دادمان خیابان درختی انتهای خیابان سپهر گلبرگ سوم بن بست رضایی پلاک ۱۱۰ واحد ۸ طبقه چهارم--}}
{{--                                    <h3 class="contact-text">--}}
{{--                                    </h3>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="contact-detail-icon">--}}
{{--                                    <img src="{{url('source/asset/user/images/contact-call.png')}}" alt="location">--}}
{{--                                </div>--}}
{{--                                <div class="contact-detail-content">--}}
{{--                                    <p>شماره تماس</p>--}}
{{--                                    <p class="contact-text"> +982128422024 </p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="contact-detail-icon">--}}
{{--                                    <img src="{{url('source/asset/user/images/contact-location.png')}}" alt="location">--}}
{{--                                </div>--}}
{{--                                <div class="contact-detail-content">--}}
{{--                                    <p>مربوط به کشور آلمان</p>--}}
{{--                                    <h3 class="contact-text">Kapstadtring 7, 22297 Hamburg</h3>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="contact-detail-icon">--}}
{{--                                    <img src="{{url('source/asset/user/images/contact-call.png')}}" alt="location">--}}
{{--                                </div>--}}
{{--                                <div class="contact-detail-content">--}}
{{--                                    <p>شماره تماس</p>--}}
{{--                                    <p class="contact-text">+4915739396989 | +491636698708 </p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-7">--}}
{{--                    <div class="get-touch-box">--}}
{{--                        <div class="get-touch-title">--}}
{{--                            <h2 class="h2-subtitle"></h2>--}}
{{--                            <h2 class="h2-title">فرم ارسال پیام</h2>--}}
{{--                        </div>--}}
{{--                        <div class="get-touch-form">--}}
{{--                            <form method="post" action="{{route('user.contact.post')}}">--}}
{{--                                @csrf--}}
{{--                                <div class="row" dir="rtl">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-box">--}}
{{--                                            <input type="text" name="full_name" class="form-input" placeholder="نام شما" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-box">--}}
{{--                                            <input type="email" name="email" class="form-input" placeholder="پست الکترونیک" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-box">--}}
{{--                                            <input type="text" name="subject" class="form-input" placeholder="موضوع پیام" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="form-box">--}}
{{--                                            <textarea name="text" class="form-input" placeholder="متن پیام"></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="form-box mb-0">--}}
{{--                                            <button type="submit" class="sec-btn"><span>ارسال پیام</span></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <div class="main-contact-map-in">--}}
{{--        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2367.413828138834!2d10.026386260986328!3d53.603919982910156!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b1891eb1b74e5f%3A0x1513132dc876600c!2sRegus%20-%20Hamburg%2C%20City%20Nord!5e0!3m2!1sen!2sua!4v1645642067501!5m2!1sen!2sua" width="416" height="570" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
{{--    </div>--}}

{{--   --}}{{-- <div class=" mt-3">--}}
{{--        <div class="target_index">--}}
{{--            <div class="container mt-5">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12 text-right">--}}
{{--                        <h5>راه های ارتباط با مجموعه سدار کارت</h5>--}}
{{--                        <hr>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="contact_item_box" data-aos="fade-up" data-aos-delay="100">--}}
{{--                            <div class="contact_item_icon_box">--}}
{{--                                <div>--}}
{{--                                    <a href="mailto:info@sedarholding.com">--}}
{{--                                        <img src="{{asset('user/pic/social/email.png')}}" alt="سدارکارتً">--}}

{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="contact_item_text_box mt-2">--}}
{{--                                <a href="mailto:info@sedarholding.com" data-aos="zoom-in" data-aos-delay="200">--}}
{{--                                <span>--}}
{{--                                    info@sedarcard.com--}}
{{--                                </span>--}}
{{--                                </a>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="contact_item_box" data-aos="fade-down" data-aos-delay="300">--}}
{{--                            <div class="contact_item_icon_box">--}}
{{--                                <div>--}}
{{--                                    <a href="https://www.instagram.com/sedarcard/">--}}
{{--                                        <img src="{{asset('user/pic/social/ins.png')}}" alt="سدارکارت">--}}

{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="contact_item_text_box mt-2">--}}

{{--                                <a href="https://www.instagram.com/sedarcard/" data-aos="zoom-in" data-aos-delay="400">--}}
{{--                                <span>--}}
{{--                                    sedarcard--}}
{{--                                </span>--}}
{{--                                </a>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="contact_item_box" data-aos="fade-up" data-aos-delay="500">--}}
{{--                            <div class="contact_item_icon_box">--}}
{{--                                <div>--}}
{{--                                    <a href="https://t.me/mohammad1984hashemi">--}}
{{--                                        <img src="{{asset('user/pic/social/tel.png')}}" alt="سدارکارت">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="contact_item_text_box mt-2">--}}
{{--                                <a href="https://t.me/sedarcard" data-aos="zoom-in" data-aos-delay="600">--}}
{{--                                <span>--}}
{{--                                    sedarcard@--}}
{{--                                </span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="contact_item_box" data-aos="fade-down" data-aos-delay="700">--}}
{{--                            <div class="contact_item_icon_box">--}}
{{--                                <div>--}}
{{--                                    <a href="tel:02188692770">--}}

{{--                                        <img src="{{asset('user/pic/social/phon.png')}}" alt="سدارکارت">--}}

{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="contact_item_text_box mt-2">--}}
{{--                                <a href="tel:02188692770" data-aos="zoom-in" data-aos-delay="800">--}}
{{--                                <span>--}}
{{--                                 021-88692770--}}
{{--                                </span>--}}
{{--                                </a>--}}
{{--                                <a href="tel:02188692771" data-aos="zoom-in" data-aos-delay="900">--}}
{{--                                <span>--}}
{{--                                    021-88692771--}}
{{--                                </span>--}}
{{--                                </a>--}}
{{--                                <a href="tel:02188692772" data-aos="zoom-in" data-aos-delay="1000">--}}
{{--                                <span>--}}
{{--                                    021-88692772--}}
{{--                                </span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="container  mt-2" data-aos="fade-up" data-aos-delay="1100">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 title-h5 text-center mb-5">--}}
{{--                    <h5 class="contact1-form-title pb-0">فرم ارسال پیام</h5>--}}
{{--                    <img class="mt-n1" src="{{asset('user/pic/h2_title.png')}}" alt="سدارکارت">--}}
{{--                </div>--}}
{{--                <div class="col-md-6 contact1-pic js-tilt" data-tilt>--}}
{{--                    <img src="{{asset('user/pic/contact/img-01.png')}}" alt="سدارکارت">--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}
{{--                    <form method="post" action="{{route('user.contact.post')}}" class="contact1-form validate-form">--}}
{{--                        @csrf--}}
{{--                        <div class="wrap-input1 validate-input" data-validate="لطفا نام خود را وارد کنید! ">--}}
{{--                            <input class="input1" type="text" name="full_name" placeholder="نام شما" >--}}
{{--                            <span class="shadow-input1"></span>--}}
{{--                        </div>--}}
{{--                        <div class="wrap-input1 validate-input" data-validate="لطفا ایمیل خود را وارد کنید! ">--}}
{{--                            <input class="input1" type="email" name="email" placeholder="پست الکترونیک" >--}}
{{--                            <span class="shadow-input1"></span>--}}
{{--                        </div>--}}
{{--                        <div class="wrap-input1 validate-input" data-validate="لطفا موضوع پیام را وارد کنید! ">--}}
{{--                            <input class="input1" type="text" name="subject" placeholder="موضوع پیام">--}}
{{--                            <span class="shadow-input1"></span>--}}
{{--                        </div>--}}
{{--                        <div class="wrap-input1 validate-input" data-validate="لطفا پیام خود را وارد کنید! ">--}}
{{--                            <textarea class="input1" name="text" placeholder="متن پیام"></textarea>--}}
{{--                            <span class="shadow-input1"></span>--}}
{{--                        </div>--}}
{{--                        <div class="container-contact1-form-btn">--}}
{{--                            <button class="contact1-form-btn">--}}
{{--							<span>ارسال پیام--}}
{{--								<i class="fa fa-long-arrow-left" aria-hidden="true"></i>--}}
{{--							</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="container mt-2">--}}
{{--            <hr>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12 p-2 content_address_box" data-aos="fade-up">--}}
{{--                    <div class="mb-3 mt-3 text-center">--}}
{{--                        <span>--}}
{{--                            <i class="fa fa-map-marker" aria-hidden="true"></i>--}}
{{--آدرس :--}}
{{--                        </span>--}}

{{--                        تهران - سعادت آباد پایین تر از میدان کاج نبش خیابان 33--}}
{{--                        بالای بانک سرمایه طبقه 4 واحد 6--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
