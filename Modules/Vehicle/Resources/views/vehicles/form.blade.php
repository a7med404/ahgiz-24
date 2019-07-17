
<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Company Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['id' => 'name', 'class' => "form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}", 'value' => "{{ old('name') }}", 'required', 'autofocus']) !!}
        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('seats_number', 'seats_number', ['class' => 'control-label']) !!}
            {!! Form::text('seats_number', null, ['id' => 'seats_number', 'class' => "form-control  {{ $errors->has('seats_number') ? ' is-invalid' : '' }}", 'value' => "{{ old('seats_number') }}", 'required', 'autofocus']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('company_id', 'company_id', ['class' => 'control-label']) !!}
        {!! Form::select('company_id', getSelect('company'), null, ['id' => 'company_id', 'class' => "select2 form-control  {{ $errors->has('company_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('company_id') }}", 'required']) !!}
    </div>
    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group">
            {!! Form::label('description', 'description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['id' => 'description', 'class' => "form-control  {{ $errors->has('description') ? ' is-invalid' : '' }}", 'value' => "{{ old('description') }}", 'autofocus']) !!}
        </div>
    </div>
</div>

@if(isset($vehicleInfo))
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
