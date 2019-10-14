
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('first_name','{{__("home/labels.f_name") }}', ['class' => 'form-label']) !!}
        {!! Form::text('first_name', null, ['id' => 'first_name', 'class' => "form-control  {{ $errors->has('first_name') ? ' is-invalid' : '' }}", 'value' => "{{ old('first_name') }}", 'required', 'autofocus']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('last_name','{{ __("home/labels.l_name") }}', ['class' => 'form-label']) !!}
        {!! Form::text('last_name', null, ['id' => 'last_name', 'class' => "form-control  {{ $errors->has('last_name') ? ' is-invalid' : '' }}", 'value' => "{{ old('last_name') }}", 'required', 'autofocus']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('phone_number', '{{ __("home/labels.phone_number") }}', ['class' => 'form-label']) !!}
        {!! Form::text('phone_number', null, ['id' => 'phone_number', 'class' => "form-control  {{ $errors->has('phone_number') ? ' is-invalid' : '' }}", 'value' => "{{ old('phone_number') }}", 'required', 'autofocus']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('email', '{{ __("home/labels.email") }}', ['class' => 'form-label']) !!}
        {!! Form::text('email', null, ['id' => 'email', 'class' => "form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}", 'value' => "{{ old('email') }}", 'required', 'autofocus']) !!}
    </div>
</div> 

@if(isset($customerInfo))
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button href="#" class="btn btn-primary">حـــفظ</button>
    </div>
</div>
    
@else
<div class="row m-t-40">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button href="#" class="btn btn-primary">حـــفظ</button>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button type="button" class="btn btn-default pull-left"  data-dismiss="modal">اغلاق</button>
    </div>
</div>
@endif
