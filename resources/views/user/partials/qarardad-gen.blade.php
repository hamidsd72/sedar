<style>
    div.left input {
        text-align: left !important;
    }
</style>
@if ($ServiceCat->title=='برندینگ و فرنچایز')
    <h4 class="mb-5">فرم درخواست شرکت در برنامه های آموزشی</h4>
@else
    <h4 class="mb-5">ثبت قرارداد جلسات عمومی</h4>
@endif
{{ Form::open(array('route' => 'user.forms.store', 'method' => 'POST', 'files' => true, 'id' => 'form_gen')) }}
    <div id="cou_head">مرحله 
        <span id="counter">۱</span>
        از ۶
    </div>
    <div class="row">
        <input type="hidden" id="form_type" name="form_type" value="قرارداد عمومی">
        <div id="firstname" class="col-md-6">
            <div class="form-group">
                {{ Form::label('first_name', '* نام') }}
                {{ Form::text('first_name',null, array('id' => 'inp_firstname', 'class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div id="lastname" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('last_name', '* نام خانوادگی') }}
                {{ Form::text('last_name',null, array('id' => 'inp_lastname', 'class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div id="birthday" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('birthday', '* سن') }}
                {{ Form::text('birthday',null, array('id' => 'inp_birthday', 'class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div id="education" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('education', '* تحصیلات') }}
                {{ Form::text('education',null, array('id' => 'inp_education', 'class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div id="visatype" class="col-md-6 d-none">
            <div class="form-group">
                {{ Form::label('visa_type', '* ویزای مورد نظر') }}
                {{ Form::text('visa_type',null, array('id' => 'inp_visatype', 'class' => 'form-control ', 'required' => 'required')) }}
            </div>
        </div>
        <div id="whatsapp" class="col-md-6 d-none">
            <div class="form-group left">
                {{ Form::label('whatsapp', '* شماره واتس اپ') }}
                {{ Form::number('whatsapp',null, array('id' => 'inp_whatsapp', 'class' => 'form-control ', 'required' => 'required')) }}
            </div>
        </div>
    </div>
    <p id="alert" class="text-center d-none">ابتدا فیلد فرم را وارد کنید</p>
    <div class="row mb-3">
        <div class="col">
            {{-- {{ Form::button('تایید', array('type' => 'submit', 'class' => 'btn btn-info col-12')) }} --}}
            <button id="confirm" type="submit" class="btn btn-info col-12 d-none" >تایید</button>
            <button id="next" type="button" class="btn btn-danger col-12" onclick="nextStep()">بعدی</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-secondary col-12" data-dismiss="modal">انصراف</button>
        </div>
    </div>
{{ Form::close() }} 

<script>
    var counter = 1;
    function nextStep() {
        var access = false;
        switch (counter) {
            case 1:
                if( (document.getElementById("inp_firstname").value).length > 0) {
                    document.getElementById("firstname").classList.add("d-none");
                    document.getElementById("lastname").classList.remove("d-none");
                    access = true;
                }
                break;
            case 2:
                if( (document.getElementById("inp_lastname").value).length > 0) {
                    document.getElementById("lastname").classList.add("d-none");
                    document.getElementById("birthday").classList.remove("d-none");
                    access = true;
                }
                break;
            case 3:
                if( (document.getElementById("inp_birthday").value).length > 0) {
                    document.getElementById("birthday").classList.add("d-none");
                    document.getElementById("education").classList.remove("d-none");
                    access = true;
                }
                break;
            case 4:
                if( (document.getElementById("inp_education").value).length > 0) {
                    document.getElementById("education").classList.add("d-none");
                    document.getElementById("visatype").classList.remove("d-none");
                    access = true;
                }
                break;
            case 5:
                if( (document.getElementById("inp_visatype").value).length > 0) {
                    document.getElementById("visatype").classList.add("d-none");
                    document.getElementById("whatsapp").classList.remove("d-none");
                    access = true;
                }
                break;
        }
        if (access) {
            document.getElementById("alert").classList.add("d-none");
            counter += 1;
            var num = '۲';
            switch (counter) {
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
            }
            document.getElementById("counter").innerHTML = num;
            if (counter==6) {
                document.getElementById("confirm").classList.remove("d-none");
                document.getElementById("next").classList.add("d-none");
            }
        } else {
            document.getElementById("alert").classList.remove("d-none");
        }
    }
</script>
