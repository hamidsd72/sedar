<style>
    div.left input {
        text-align: left !important;
    }
</style>
<h4 class="mb-4">ثبت فرم استعدادیابی</h4>
{{ Form::open(array('route' => 'user.forms.store', 'method' => 'POST', 'files' => true)) }}
    <div id="cou_head6">مرحله 
        <span id="counter6">۱</span>
        از ۱۱
    </div>
    <div class="row">
        <input type="hidden" id="form_type" name="form_type" value="فرم استعدادیابی">
        <div id="first_name6" class="col-md-6">
            <div class="form-group">
                {{ Form::label('first_name', '* نام') }}
                {{ Form::text('first_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_first_name6')) }}
            </div>
        </div>
        <div id="last_name6" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('last_name', '* نام خانوادگی') }}
                {{ Form::text('last_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_last_name6')) }}
            </div>
        </div>
        <div id="father_name6" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('father_name', '* نام پدر') }}
                {{ Form::text('father_name',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_father_name6')) }}
            </div>
        </div> 
        <div id="birthday6" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('birthday', '* سن') }}
                {{ Form::text('birthday',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_birthday6')) }}
            </div>
        </div>
        <div id="code_meli6" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('code_meli', '* شماره ملی') }}
                {{ Form::text('code_meli',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_code_meli6')) }}
            </div>
        </div>
        <div id="phone6" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('phone', '* شماره تلفن ثابت') }}
                {{ Form::number('phone',null, array('class' => 'form-control ', 'required' => 'required', 'id' => 'inp_phone6')) }}
            </div>
        </div> 
        <div id="whatsapp6" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('whatsapp', '* شماره واتس اپ') }}
                {{ Form::number('whatsapp',null, array('class' => 'form-control ', 'required' => 'required', 'id' => 'inp_whatsapp6')) }}
            </div>
        </div>
        <div id="address6" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('address', '* نشانی محل سکونت') }}
                {{ Form::text('address',null, array('class' => 'form-control','required' => 'required', 'id' => 'inp_address6')) }}
            </div>
        </div>
        <div id="moaref6" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('moaref', '* معرف شما به این سامانه') }}
                {{ Form::text('moaref',null, array('class' => 'form-control', 'required' => 'required', 'id' => 'inp_moaref6')) }}
            </div>
        </div>
        <div id="ashnaie6" class="col-md-6 d-none">
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
        <div id="description6" class="col-md-12 d-none">
            <div class="form-group">
                {{ Form::label('description', '* شرح مختصر بر اساس استعداد مورد نظر') }}
                {{ Form::textarea('description',null, array('class' => 'form-control textarea', 'required' => 'required', 'id' => 'inp_description6')) }}
            </div>
        </div>
    </div>
    <p id="alert6" class="text-center d-none">ابتدا فیلد فرم را وارد کنید</p>
    <div class="row mb-3">
        <div class="col">
            <button id="confirm6" type="submit" class="btn btn-info col-12 d-none" >تایید</button>
            <button id="next6" type="button" class="btn btn-danger col-12" onclick="nextStep6()">بعدی</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-secondary col-12" data-dismiss="modal">انصراف</button>
        </div>
    </div>
{{ Form::close() }} 
<script>
    var counter6 = 1;
    function nextStep6() {
        var access = false;
        switch (counter6) {
            case 1:
                if( (document.getElementById("inp_first_name6").value).length > 0) {
                    document.getElementById("first_name6").classList.add("d-none");
                    document.getElementById("last_name6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 2:
                if( (document.getElementById("inp_last_name6").value).length > 0) {
                    document.getElementById("last_name6").classList.add("d-none");
                    document.getElementById("father_name6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 3:
                if( (document.getElementById("inp_father_name6").value).length > 0) {
                    document.getElementById("father_name6").classList.add("d-none");
                    document.getElementById("birthday6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 4:
                if( (document.getElementById("inp_birthday6").value).length > 0) {
                    document.getElementById("birthday6").classList.add("d-none");
                    document.getElementById("code_meli6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 5:
                if( (document.getElementById("inp_code_meli6").value).length > 0) {
                    document.getElementById("code_meli6").classList.add("d-none");
                    document.getElementById("phone6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 6:
                if( (document.getElementById("inp_phone6").value).length > 0) {
                    document.getElementById("phone6").classList.add("d-none");
                    document.getElementById("whatsapp6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 7:
                if( (document.getElementById("inp_whatsapp6").value).length > 0) {
                    document.getElementById("whatsapp6").classList.add("d-none");
                    document.getElementById("address6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 8:
                if( (document.getElementById("inp_address6").value).length > 0) {
                    document.getElementById("address6").classList.add("d-none");
                    document.getElementById("moaref6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 9:
                if( (document.getElementById("inp_moaref6").value).length > 0) {
                    document.getElementById("moaref6").classList.add("d-none");
                    document.getElementById("ashnaie6").classList.remove("d-none");
                    access = true;
                }
                break;
            case 10:
                document.getElementById("ashnaie6").classList.add("d-none");
                document.getElementById("description6").classList.remove("d-none");
                access = true;
                break;
        }
        if (access) {
            document.getElementById("alert6").classList.add("d-none");
            counter6 += 1;
            var num = '۲';
            switch (counter6) {
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
            }
            document.getElementById("counter6").innerHTML = num;
            if (counter6==11) {
                document.getElementById("confirm6").classList.remove("d-none");
                document.getElementById("next6").classList.add("d-none");
            }
        } else {
            document.getElementById("alert6").classList.remove("d-none");
        }
    }
</script>