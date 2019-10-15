
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
        {!! Form::text('name', null, ['id' => 'name', 'class' => "form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}", 'value' => "{{ old('name') }}", 'required', 'autofocus']) !!}
    </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('type', 'نوع المحطة', ['class' => 'control-label']) !!}
            {!! Form::select('type', StationType(), null, ['id' => 'type', 'class' => "select2 form-control  {{ $errors->has('type') ? ' is-invalid' : '' }}", 'value' => "{{ old('type') }}", 'required']) !!}
        </div>
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('city', 'المدينة', ['class' => 'control-label']) !!}
        {!! Form::select('city', getCity(), null, ['id' => 'city', 'class' => "form-control {{ $errors->has('city') ? ' is-invalid' : '' }}", 'value' => "{{ old('city') }}", 'required']) !!}
    </div>
</div>

@if(isset($stationInfo))
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
