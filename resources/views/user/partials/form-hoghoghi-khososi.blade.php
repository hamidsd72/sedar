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
    <div id="cou_head4">مرحله 
        <span id="counter4">۱</span>
        از ۹
    </div>
    <div class="row">
        <input type="hidden" id="form_type" name="form_type" value="مشاوره خصوصی برندینگ و فرنچایز">
        <div id="first_name4" class="col-md-6">
            <div class="form-group">
                {{ Form::label('first_name', '* نام') }}
                {{ Form::text('first_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_first_name4')) }}
            </div>
        </div>
        <div id="last_name4" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('last_name', '* نام خانوادگی') }}
                {{ Form::text('last_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_last_name4')) }}
            </div>
        </div>
        <div id="child4" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('child', '* فرزند') }}
                {{ Form::text('child',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_child4')) }}
            </div>
        </div>
        <div id="code_meli4" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('code_meli', '* شماره ملی') }}
                {{ Form::text('code_meli',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_code_meli4')) }}
            </div>
        </div>
        <div id="address4" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('address', '* نشانی') }}
                {{ Form::text('address',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_address4')) }}
            </div>
        </div>
        <div id="ashnaie4" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('ashnaie', '* نحوه آشنایی با این سامانه') }}
                <select id="ashnaie" name="ashnaie" class="form-control select2">
                    <option value="اینترنت" selected>اینترنت</option>
                    <option value="شبکه های اجتماعی">شبکه های اجتماعی</option>
                    <option value="دوستان و آشنایان">دوستان و آشنایان</option>
                    <option value="سایر موارد">سایر موارد</option>
                </select>
            </div>
        </div>
        <div id="moaref4" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('moaref', '* معرف شما به این سامانه') }}
                {{ Form::text('moaref',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_moaref4')) }}
            </div>
        </div>
        <div id="sabeghe_vekalat4" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('sabeghe_vekalat', '* آیا تا به حال از خدمات وکالتی استفاده نموده اید') }}
                <select id="sabeghe_vekalat" name="sabeghe_vekalat" class="form-control select2">
                    <option value="بله" selected>بله</option>
                    <option value="خیر">خیر</option>
                </select>
            </div>
        </div>
        <div id="description4" class="col-md-12 d-none">
            <div class="form-group">
                {{ Form::label('description', '* لطفا مختصری از علت مراجعه به این سامانه (موضوع مشاوره یا وکالت) را بیان فرمایید') }}
                {{ Form::textarea('description',null, array('class' => 'form-control textarea', 'required' => 'required', 'id' => 'inp_description4')) }}
            </div>
        </div>
        
    </div>
    <p id="alert4" class="text-center d-none">ابتدا فیلد فرم را وارد کنید</p>
    <div class="row mb-3">
        <div class="col">
            <button id="confirm4" type="submit" class="btn btn-info col-12 d-none" >تایید</button>
            <button id="next4" type="button" class="btn btn-danger col-12" onclick="nextStep4()">بعدی</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-secondary col-12" data-dismiss="modal">انصراف</button>
        </div>
    </div>
{{ Form::close() }} 
<script>
    var counter4 = 1;
    function nextStep4() {
        var access = false;
        switch (counter4) {
            case 1:
                if( (document.getElementById("inp_first_name4").value).length > 0) {
                    document.getElementById("first_name4").classList.add("d-none");
                    document.getElementById("last_name4").classList.remove("d-none");
                    access = true;
                }
                break;
            case 2:
                if( (document.getElementById("inp_last_name4").value).length > 0) {
                    document.getElementById("last_name4").classList.add("d-none");
                    document.getElementById("child4").classList.remove("d-none");
                    access = true;
                }
                break;
            case 3:
                if( (document.getElementById("inp_child4").value).length > 0) {
                    document.getElementById("child4").classList.add("d-none");
                    document.getElementById("code_meli4").classList.remove("d-none");
                    access = true;
                }
                break;
            case 4:
                if( (document.getElementById("inp_code_meli4").value).length > 0) {
                    document.getElementById("code_meli4").classList.add("d-none");
                    document.getElementById("address4").classList.remove("d-none");
                    access = true;
                }
                break;
            case 5:
                if( (document.getElementById("inp_address4").value).length > 0) {
                    document.getElementById("address4").classList.add("d-none");
                    document.getElementById("ashnaie4").classList.remove("d-none");
                    access = true;
                }
                break;
            case 6:
                document.getElementById("ashnaie4").classList.add("d-none");
                document.getElementById("moaref4").classList.remove("d-none");
                access = true;
                break;
            case 7:
                if( (document.getElementById("inp_moaref4").value).length > 0) {
                    document.getElementById("moaref4").classList.add("d-none");
                    document.getElementById("sabeghe_vekalat4").classList.remove("d-none");
                    access = true;
                }
                break;
            case 8:
                document.getElementById("sabeghe_vekalat4").classList.add("d-none");
                document.getElementById("description4").classList.remove("d-none");
                access = true;
                break;
        }
        if (access) {
            document.getElementById("alert4").classList.add("d-none");
            counter4 += 1;
            var num = '۲';
            switch (counter4) {
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
            }
            document.getElementById("counter4").innerHTML = num;
            if (counter4==9) {
                document.getElementById("confirm4").classList.remove("d-none");
                document.getElementById("next4").classList.add("d-none");
            }
        } else {
            document.getElementById("alert4").classList.remove("d-none");
        }
    }
</script>