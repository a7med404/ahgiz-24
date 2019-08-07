{!! Form::open(['route' => ['post-singin'], 'method' => "POST", 'class' => 'form']) !!}
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
        {!! Form::checkbox('remember_me', 1, ['id' => 'remember_me', 'class' => "{{ $errors->has('remember_me') ? ' is-invalid' : '' }}", 'value' => "{{ old('remember_me') }}", 'required', 'autofocus']) !!}
        {!! Form::label('remember_me', 'تذكرني.', ['class' => 'form-label']) !!}
    </div>
    <input class="btn btn-custom text-uppercase" id="name" type="submit" value="تسجيل الدخول">
{!! Form::close() !!}