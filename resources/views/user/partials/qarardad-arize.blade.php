<style>
    div.left input {
        text-align: left !important;
    }
</style>
<h4 class="mb-4">ثبت فرم استعدادیابی</h4>
{{ Form::open(array('route' => 'user.forms.store', 'method' => 'POST', 'files' => true)) }}
    <div class="row">
        <input type="hidden" id="form_type" name="form_type" value="فرم استعدادیابی">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('first_name', '* نام') }}
                {{ Form::text('first_name',null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('last_name', '* نام خانوادگی') }}
                {{ Form::text('last_name',null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        نام پدر 
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('birthday', '* سن') }}
                {{ Form::dateTimeLocal('birthday',null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group left">
                {{ Form::label('code_meli', '* شماره ملی') }}
                {{ Form::text('code_meli',null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        محل سکونت 
        تلفن ثابت 
        <div class="col-md-6">
            <div class="form-group left">
                {{ Form::label('whatsapp', '* شماره واتس اپ') }}
                {{ Form::number('whatsapp',null, array('class' => 'form-control ', 'required' => 'required')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('address', '* نشانی') }}
                {{ Form::text('address',null, array('class' => 'form-control','required' => 'required')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('moaref', '* معرف شما به این سامانه') }}
                {{ Form::text('moaref',null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div class="col-md-6">
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
        بلیغات:
مراجعه حضوری به مراکز : 

        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('description', '* شرح مختصر بر اساس استعداد مورد نظر') }}
                {{ Form::textarea('description',null, array('class' => 'form-control textarea', 'required' => 'required')) }}
            </div>
        </div>
    </div>
<button type="button" class="btn btn-outline-danger" data-dismiss="modal">انصراف</button>
{{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>تایید', array('type' => 'submit', 'class' => 'btn btn-outline-success mr-3')) }}
{{ Form::close() }} 


