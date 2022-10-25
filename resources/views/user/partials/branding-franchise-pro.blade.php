<style>
    div.left input {
        text-align: left !important;
    }
</style>
<h4 class="mb-4">فرم مشاوره خصوصی برندینگ و فرنچایز</h4>
<div class="box">
    <p class="m-0">کاربر محترم</p>
    <p class="m-0">با سلام</p>
    <p class="m-0">ضمن خوش آمدگویی به شما و تشکر از انتخاب این سامانه به منظور ارایه ی هر جه بهتر خدمات حقوقی, خواهشمندیم در تکمیل این فرم ما را یاری کنید</p>
</div>
{{ Form::open(array('route' => 'user.forms.store', 'method' => 'POST', 'files' => true)) }}
    <div id="cou_head8">مرحله 
        <span id="counter8">۱</span>
        از ۶
    </div>
    <div class="row">
        <input type="hidden" id="form_type" name="form_type" value="مشاوره خصوصی برندینگ و فرنچایز">
        <div id="first_name8" class="col-md-6">
            <div class="form-group">
                {{ Form::label('first_name', '* نام') }}
                {{ Form::text('first_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_first_name8')) }}
            </div>
        </div>
        <div id="last_name8" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('last_name', '* نام خانوادگی') }}
                {{ Form::text('last_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_last_name8')) }}
            </div>
        </div>
        <div id="company_name8" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('company_name', '* نام مجموعه ') }}
                {{ Form::text('company_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_company_name8')) }}
            </div>
        </div>
        <div id="created_year8" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('created_year', '* سال تاسیس') }}
                {{ Form::text('created_year',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_created_year8')) }}
            </div>
        </div>
        <div id="whatsapp8" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('whatsapp', '* شماره واتس اپ') }}
                {{ Form::text('whatsapp',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_whatsapp8')) }}
            </div>
        </div>  
        <div id="address8" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('address', '* نشانی') }}
                {{ Form::text('address',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_address8')) }}
            </div>
        </div>
    </div>
    <p id="alert8" class="text-center d-none">ابتدا فیلد فرم را وارد کنید</p>
    <div class="row mb-3">
        <div class="col">
            <button id="confirm8" type="submit" class="btn btn-info col-12 d-none" >تایید</button>
            <button id="next8" type="button" class="btn btn-danger col-12" onclick="nextStep8()">بعدی</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-secondary col-12" data-dismiss="modal">انصراف</button>
        </div>
    </div>
{{ Form::close() }} 
<script>
    var counter8 = 1;
    function nextStep8() {
        var access = false;
        switch (counter8) {
            case 1:
                if( (document.getElementById("inp_first_name8").value).length > 0) {
                    document.getElementById("first_name8").classList.add("d-none");
                    document.getElementById("last_name8").classList.remove("d-none");
                    access = true;
                }
                break;
            case 2:
                if( (document.getElementById("inp_last_name8").value).length > 0) {
                    document.getElementById("last_name8").classList.add("d-none");
                    document.getElementById("company_name8").classList.remove("d-none");
                    access = true;
                }
                break;
            case 3:
                if( (document.getElementById("inp_company_name8").value).length > 0) {
                    document.getElementById("company_name8").classList.add("d-none");
                    document.getElementById("created_year8").classList.remove("d-none");
                    access = true;
                }
                break;
            case 4:
                if( (document.getElementById("inp_created_year8").value).length > 0) {
                    document.getElementById("created_year8").classList.add("d-none");
                    document.getElementById("whatsapp8").classList.remove("d-none");
                    access = true;
                }
                break;
            case 5:
                if( (document.getElementById("inp_whatsapp8").value).length > 0) {
                    document.getElementById("whatsapp8").classList.add("d-none");
                    document.getElementById("address8").classList.remove("d-none");
                    access = true;
                }
                break;
        }
        if (access) {
            document.getElementById("alert8").classList.add("d-none");
            counter8 += 1;
            var num = '۲';
            switch (counter8) {
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
            }
            document.getElementById("counter8").innerHTML = num;
            if (counter8==6) {
                document.getElementById("confirm8").classList.remove("d-none");
                document.getElementById("next8").classList.add("d-none");
            }
        } else {
            document.getElementById("alert8").classList.remove("d-none");
        }
    }
</script>

