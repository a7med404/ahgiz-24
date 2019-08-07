{!! Form::open(['route' => ['post-singup'], 'method' => "POST", 'class' => 'form']) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="for-middel form-group">
                {!! Form::label('first_name', 'الاسم', ['class' => 'form-label']) !!}
                {!! Form::text('first_name', null, ['id' => 'first_name', 'class' => "{{ $errors->has('first_name') ? ' is-invalid' : '' }}", 'value' => "{{ old('first_name') }}", 'required', 'autofocus']) !!}
                <span class="border-middel"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="for-middel form-group">
                {!! Form::label('last_name', 'اسم الوالد', ['class' => 'form-label']) !!}
                {!! Form::text('last_name', null, ['id' => 'last_name', 'class' => "{{ $errors->has('last_name') ? ' is-invalid' : '' }}", 'value' => "{{ old('last_name') }}", 'required', 'autofocus']) !!}
                <span class="border-middel"></span>
            </div>
        </div>
    </div>
    <div class="for-middel form-group">
        {!! Form::label('phone_number', 'رقم الموبايل', ['class' => 'form-label']) !!}
        {!! Form::text('phone_number', null, ['id' => 'phone_number', 'class' => "{{ $errors->has('phone_number') ? ' is-invalid' : '' }}", 'value' => "{{ old('phone_number') }}", 'required', 'autofocus']) !!}
        <span class="border-middel"></span>
    </div>
    <div class="for-middel form-group">
        {!! Form::label('password', 'كلمة السر', ['class' => 'form-label']) !!}
        {!! Form::password('password', null, ['id' => 'password', 'class' => "{{ $errors->has('password') ? ' is-invalid' : '' }}", 'value' => "{{ old('password') }}", 'required', 'autofocus']) !!}
        <span class="border-middel"></span>
    </div>

    <div class="form-group text-uppercase remember">
        {!! Form::checkbox('terms-and-conditions', null, ['id' => 'terms-and-conditions', 'class' => "{{ $errors->has('terms-and-conditions') ? ' is-invalid' : '' }}", 'value' => "{{ old('terms-and-conditions') }}", 'required', 'autofocus']) !!}                                                        
        <label class = 'form-label' for="terms-and-conditions">I accept the <a href="#">Terms and Conditions</a></label>
    </div>
    <input class="btn btn-custom text-uppercase" id="name" type="submit" value="انشاء حساب">
{!! Form::close() !!}