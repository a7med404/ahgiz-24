<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
        {!! Form::text('name', null, ['id' => 'name', 'class' => "form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}", 'value' => "{{ old('name') }}", 'required', 'autofocus']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('mileage', 'Mileage', ['class' => 'form-label']) !!}
        {!! Form::text('mileage', null, ['id' => 'mileage', 'class' => "form-control  {{ $errors->has('mileage') ? ' is-invalid' : '' }}", 'value' => "{{ old('mileage') }}", 'required', 'autofocus']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('from_station_id', 'from_station_id', ['class' => 'control-label']) !!}
        {!! Form::select('from_station_id', getSelect('station'), null, ['id' => 'from_station_id', 'class' => "form-control {{ $errors->has('from_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('from_station_id') }}", 'required']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('to_station_id', 'to_station_id', ['class' => 'control-label']) !!}
        {!! Form::select('to_station_id', getSelect('station'), null, ['id' => 'to_station_id', 'class' => "form-control {{ $errors->has('to_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('to_station_id') }}", 'required']) !!}
    </div>
</div>

@if(isset($routeInfo))
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
