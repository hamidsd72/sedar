@extends('user.master')

@section('content')
    <div class="card card-style">
        <div class="content">
            <h4>سوالات متداول</h4>
            <p>
                در صورت نیاز میتوانید از لیست زیر برای سوالات احتمالی استفاده کنین.
            </p>
        </div>

        <div class="accordion" id="accordion-1">
            <div class="mb-">
                <button class="btn accordion-btn no-effect collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false">
                    <i class="fa fa-star color-yellow-dark me-2"></i>
                    بهترین زمان جهت اقدام ، برای اخذ ویزای شینگن چه زمانیست ؟
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse1" class="collapse" data-bs-parent="#accordion-1" style="">
                    <div class="pt-1 pb-2 ps-3 pe-3">
                        <p>برای اخذ ویزای شینگن الزامیست حداقل 3 ماه قبل از تاریخ سفرتان اقدام فرمایید.</p>
                    </div>
                </div>
            </div>
            <div class="mb-0">
                <button class="btn accordion-btn no-effect collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false">
                    <i class="fa fa-star color-yellow-dark me-2"></i>
                    آیا سند ملکی جهت ارائه به سفارت فرانسه الزامی می باشد ؟
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse2" class="collapse" data-bs-parent="#accordion-1">
                    <div class="pt-1 pb-2 ps-3 pe-3">
                        <p>خیر، ولی همراه داشتن سند ملکی در روند کاری تاثیر گذار است.</p>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <button class="btn accordion-btn no-effect collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false">
                    <i class="fa fa-star color-yellow-dark me-2"></i>
                    آیا با در دست داشتن ویزای شینگن می توان به کشور کانادا هم وارد شد ؟
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse3" class="collapse" data-bs-parent="#accordion-1">
                    <div class="pt-1 pb-2 ps-3 pe-3">
                        <p>همانطور که از نامش بر می آید ویزای شینگن مجوزیست که با آن می توان وارد کشورهای محدوده شینگن شده و در آن کشورها تردد و اقامت محدود داشت و هیچگونه اعتباری در کشورهای دیگر ندارد.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
