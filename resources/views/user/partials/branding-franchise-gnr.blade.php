<style>
    div.left input {
        text-align: left !important;
    }
</style>
<h4 class="mb-4">فرم شرکت در برنامه ها</h4>
<div class="box">
    <p class="m-0">کاربر محترم</p>
    <p class="m-0">با سلام</p>
    <p class="m-0">ضمن خوش آمدگویی به شما و تشکر از انتخاب این سامانه به منظور ارایه ی هر جه بهتر خدمات حقوقی, خواهشمندیم در تکمیل این فرم ما را یاری کنید</p>
</div>
{{ Form::open(array('route' => 'user.forms.store', 'method' => 'POST', 'files' => true)) }}
    <div id="cou_head9">مرحله 
        <span id="counter9">۱</span>
        از ۵
    </div>
    <div class="row">
        <input type="hidden" id="form_type" name="form_type" value="شرکت در برنامه ها">
        <div id="first_name9" class="col-md-6">
            <div class="form-group">
                {{ Form::label('first_name', '* نام') }}
                {{ Form::text('first_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_first_name9')) }}
            </div>
        </div>
        <div id="last_name9" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('last_name', '* نام خانوادگی') }}
                {{ Form::text('last_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_last_name9')) }}
            </div>
        </div>
        <div id="company_name9" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('company_name', '* نام مجموعه ') }}
                {{ Form::text('company_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_company_name9')) }}
            </div>
        </div>
        <div id="whatsapp9" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('whatsapp', '* شماره واتس اپ') }}
                {{ Form::text('whatsapp',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_whatsapp9')) }}
            </div>
        </div>
        <div id="code9" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('code', '* شماره کد برنامه مد نظر شما') }}
                {{ Form::text('code',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_code9')) }}
            </div>
        </div>
        
    </div>
    <p id="alert9" class="text-center d-none">ابتدا فیلد فرم را وارد کنید</p>
    <div class="row mb-3">
        <div class="col">
            <button id="confirm9" type="submit" class="btn btn-info col-12 d-none" >تایید</button>
            <button id="next9" type="button" class="btn btn-danger col-12" onclick="nextStep9()">بعدی</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-secondary col-12" data-dismiss="modal">انصراف</button>
        </div>
    </div>
{{ Form::close() }} 
<script>
    var counter9 = 1;
    function nextStep9() {
        var access = false;
        switch (counter9) {
            case 1:
                if( (document.getElementById("inp_first_name9").value).length > 0) {
                    document.getElementById("first_name9").classList.add("d-none");
                    document.getElementById("last_name9").classList.remove("d-none");
                    access = true;
                }
                break;
            case 2:
                if( (document.getElementById("inp_last_name9").value).length > 0) {
                    document.getElementById("last_name9").classList.add("d-none");
                    document.getElementById("company_name9").classList.remove("d-none");
                    access = true;
                }
                break;
            case 3:
                if( (document.getElementById("inp_company_name9").value).length > 0) {
                    document.getElementById("company_name9").classList.add("d-none");
                    document.getElementById("whatsapp9").classList.remove("d-none");
                    access = true;
                }
                break;
            case 4:
                if( (document.getElementById("inp_whatsapp9").value).length > 0) {
                    document.getElementById("whatsapp9").classList.add("d-none");
                    document.getElementById("code9").classList.remove("d-none");
                    access = true;
                }
                break;
        }
        if (access) {
            document.getElementById("alert9").classList.add("d-none");
            counter9 += 1;
            var num = '۲';
            switch (counter9) {
                case 3:
                    num = '۳';
                    break;
                case 4:
                    num = '۴';
                    break;
                case 5:
                    num = '۵';
                    break;
            }
            document.getElementById("counter9").innerHTML = num;
            if (counter9==5) {
                document.getElementById("confirm9").classList.remove("d-none");
                document.getElementById("next9").classList.add("d-none");
            }
        } else {
            document.getElementById("alert9").classList.remove("d-none");
        }
    }
</script>