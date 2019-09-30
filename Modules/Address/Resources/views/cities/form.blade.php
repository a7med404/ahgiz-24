
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
        {!! Form::text('name', null, ['id' => 'name', 'class' => "form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}", 'value' => "{{ old('name') }}", 'required', 'autofocus']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('parent_id', 'المدينة', ['class' => 'control-label']) !!}
        {!! Form::select('parent_id', getCities(), null, ['id' => 'parent_id', 'class' => "form-control {{ $errors->has('parent_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('parent_id') }}"]) !!}
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
