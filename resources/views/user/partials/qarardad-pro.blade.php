<style>
    div.left input {
        text-align: left !important;
    }
</style>

<h4 class="mb-4">ثبت قرارداد مشاوره اختصاصی</h4>
{{ Form::open(array('route' => 'user.forms.store', 'method' => 'POST', 'files' => true)) }}
    <div id="cou_head2">مرحله 
        <span id="counter2">۱</span>
        از ۱۷
    </div>
    <div class="row">
        <input type="hidden" id="form_type" name="form_type" value="مشاوره خصوصی ویزا">
        <div id="first_name2" class="col-md-6">
            <div class="form-group">
                {{ Form::label('first_name', '* نام') }}
                {{ Form::text('first_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_first_name2')) }}
            </div>
        </div>
        <div id="last_name2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('last_name', '* نام خانوادگی') }}
                {{ Form::text('last_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_last_name2')) }}
            </div>
        </div>
        <div id="whatsapp2" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('whatsapp', '* شماره واتس اپ') }}
                {{ Form::text('whatsapp',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_whatsapp2')) }}
            </div>
        </div>  
        <div id="birthday2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('birthday', '* تاریخ تولد') }}
                {{ Form::text('birthday',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_birthday2')) }}
            </div>
        </div>
        <div id="education2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('education', '* آخرین مدرک تحصیلی') }}
                {{ Form::text('education',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_education2')) }}
            </div>
        </div>
        <div id="job2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('job', '* شغل و تخصص') }}
                {{ Form::text('job',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_job2')) }}
            </div>
        </div>
        <div id="bimeh2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('bimeh', '* سابقه بیمه') }}
                {{ Form::text('bimeh',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_bimeh2')) }}
            </div>
        </div>
        <div id="en_lang2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('en_lang', '* مدرک زبان انگیلیسی') }}
                {{ Form::text('en_lang',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_en_lang2')) }}
            </div>
        </div>
        <div id="en_level2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('en_level', '* سطح انگیلیسی') }}
                {{ Form::text('en_level',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_en_level2')) }}
            </div>
        </div>
        <div id="gr_lang2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('gr_lang', '* مدرک زبان آلمانی') }}
                {{ Form::text('gr_lang',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_gr_lang2')) }}
            </div>
        </div>
        <div id="gr_level2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('gr_level', '* سطح آلمانی') }}
                {{ Form::text('gr_level',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_gr_level2')) }}
            </div>
        </div>
        <div id="count2" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('count', '* تعداد متقاضیان') }}
                {{ Form::text('count',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_count2')) }}
            </div>
        </div>
        <div id="nesbat2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('nesbat', '* نسبت متقاضیان با شما') }}
                {{ Form::text('nesbat',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_nesbat2')) }}
            </div>
        </div>
        <div id="reject2" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('reject', '* سابقه ریجکتی') }}
                {{ Form::text('reject',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_reject2')) }}
            </div>
        </div>
        <div id="monthly_amount2" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('monthly_amount', '* میزان درآمد ماهانه') }}
                {{ Form::number('monthly_amount',null, array('class' => 'form-control','onkeyup'=>'number_price(this.value)', 'required' => 'required', 'id' => 'inp_monthly_amount2')) }}
                <span id="price_span" class="span_p"><span id="pp_price"></span> تومان </span>
            </div>
        </div>
        <div id="all_amount2" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('all_amount', '* میزان تمکن مالی') }}
                {{ Form::number('all_amount',null, array('class' => 'form-control','onkeyup'=>'number_price2(this.value)', 'required' => 'required', 'id' => 'inp_all_amount2')) }}
                <span id="price_span" class="span_p"><span id="pp_price_2"></span> تومان </span>
            </div>
        </div>
        <div id="description2" class="col-md-12 d-none">
            <div class="form-group">
                {{ Form::label('description', '* توضیحات موضوع مشاوره') }}
                {{ Form::textarea('description',null, array('class' => 'form-control textarea', 'required' => 'required', 'rows' => '3')) }}
            </div> 
        </div>
    </div>
    <p id="alert2" class="text-center d-none">ابتدا فیلد فرم را وارد کنید</p>
    <div class="row mb-3">
        <div class="col">
            <button id="confirm2" type="submit" class="btn btn-info col-12 d-none" >تایید</button>
            <button id="next2" type="button" class="btn btn-danger col-12" onclick="nextStep2()">بعدی</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-secondary col-12" data-dismiss="modal">انصراف</button>
        </div>
    </div>
{{ Form::close() }} 


<script>
    function number_price(a){
        $('#pp_price').text(a);
        $('#pp_price_1').text(a);
        $('#pp_price').text(function (e, n) {
            var lir1= n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return lir1;
        })
    }
    function number_price2(a){
        // $('#pp_pric').text(a);
        $('#pp_price_2').text(a);
        $('#pp_price_2').text(function (e, n) {
            var lir1= n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return lir1;
        })
    }
    var counter2 = 1;
    function nextStep2() {
        var access = false;
        switch (counter2) {
            case 1:
                if( (document.getElementById("inp_first_name2").value).length > 0) {
                    document.getElementById("first_name2").classList.add("d-none");
                    document.getElementById("last_name2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 2:
                if( (document.getElementById("inp_last_name2").value).length > 0) {
                    document.getElementById("last_name2").classList.add("d-none");
                    document.getElementById("whatsapp2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 3:
                if( (document.getElementById("inp_whatsapp2").value).length > 0) {
                    document.getElementById("whatsapp2").classList.add("d-none");
                    document.getElementById("birthday2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 4:
                if( (document.getElementById("inp_birthday2").value).length > 0) {
                    document.getElementById("birthday2").classList.add("d-none");
                    document.getElementById("education2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 5:
                if( (document.getElementById("inp_education2").value).length > 0) {
                    document.getElementById("education2").classList.add("d-none");
                    document.getElementById("job2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 6:
                if( (document.getElementById("inp_job2").value).length > 0) {
                    document.getElementById("job2").classList.add("d-none");
                    document.getElementById("bimeh2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 7:
                if( (document.getElementById("inp_bimeh2").value).length > 0) {
                    document.getElementById("bimeh2").classList.add("d-none");
                    document.getElementById("en_lang2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 8:
                if( (document.getElementById("inp_en_lang2").value).length > 0) {
                    document.getElementById("en_lang2").classList.add("d-none");
                    document.getElementById("en_level2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 9:
                if( (document.getElementById("inp_en_level2").value).length > 0) {
                    document.getElementById("en_level2").classList.add("d-none");
                    document.getElementById("gr_lang2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 10:
                if( (document.getElementById("inp_gr_lang2").value).length > 0) {
                    document.getElementById("gr_lang2").classList.add("d-none");
                    document.getElementById("gr_level2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 11:
                if( (document.getElementById("inp_gr_level2").value).length > 0) {
                    document.getElementById("gr_level2").classList.add("d-none");
                    document.getElementById("count2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 12:
                if( (document.getElementById("inp_count2").value).length > 0) {
                    document.getElementById("count2").classList.add("d-none");
                    document.getElementById("nesbat2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 13:
                if( (document.getElementById("inp_nesbat2").value).length > 0) {
                    document.getElementById("nesbat2").classList.add("d-none");
                    document.getElementById("reject2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 14:
                if( (document.getElementById("inp_reject2").value).length > 0) {
                    document.getElementById("reject2").classList.add("d-none");
                    document.getElementById("monthly_amount2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 15:
                if( (document.getElementById("inp_monthly_amount2").value).length > 0) {
                    document.getElementById("monthly_amount2").classList.add("d-none");
                    document.getElementById("all_amount2").classList.remove("d-none");
                    access = true;
                }
                break;
            case 16:
                if( (document.getElementById("inp_all_amount2").value).length > 0) {
                    document.getElementById("all_amount2").classList.add("d-none");
                    document.getElementById("description2").classList.remove("d-none");
                    access = true;
                }
                break;
        }
        if (access) {
            document.getElementById("alert2").classList.add("d-none");
            counter2 += 1;
            var num = '۲';
            switch (counter2) {
                case 3:
                    num = '۳';
                    break;
                case 4:
                    num = '۴';
                    break;
                case 5:
                    num = '۵';
                    break;
                case 6:
                    num = '۶';
                    break;
                case 7:
                    num = '۷';
                    break;
                case 8:
                    num = '۸';
                    break;
                case 9:
                    num = '۹';
                    break;
                case 10:
                    num = '۱۰';
                    break;
                case 11:
                    num = '۱۱';
                    break;
                case 12:
                    num = '۱۲';
                    break;
                case 13:
                    num = '۱۳';
                    break;
                case 14:
                    num = '۱۴';
                    break;
                case 15:
                    num = '۱۵';
                    break;
                case 16:
                    num = '۱۶';
                    break;
                case 17:
                    num = '۱۷';
                    break;
            }
            document.getElementById("counter2").innerHTML = num;
            if (counter2==17) {
                document.getElementById("confirm2").classList.remove("d-none");
                document.getElementById("next2").classList.add("d-none");
            }
        } else {
            document.getElementById("alert2").classList.remove("d-none");
        }
    }
</script>

