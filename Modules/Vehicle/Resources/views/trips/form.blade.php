
{{-- $table->string('number');
$table->tinyInteger('status'); --}}
    
<div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12">
        <div class="form-group">
            {!! Form::label('company_id', 'الشركة', ['class' => 'control-label']) !!}
            {!! Form::select('company_id', getSelect('company'), null, ['id' => 'company_id', 'class' => "select2 form-control  {{ $errors->has('company_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('company_id') }}", 'required']) !!}
        </div>
    </div>
</div>
<div class="row">
        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                {!! Form::label('from_station_id', 'المسار(من)', ['class' => 'control-label']) !!}
                {!! Form::select('from_station_id', getSelect('station'), null, ['id' => 'from_station_id', 'class' => "select2 form-control  {{ $errors->has('from_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('from_station_id') }}", 'required']) !!}
            </div>
        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                {!! Form::label('to_station_id', 'المسار(الي)', ['class' => 'control-label']) !!}
                {!! Form::select('to_station_id', getSelect('station'), null, ['id' => 'to_station_id', 'class' => "select2 form-control  {{ $errors->has('to_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('to_station_id') }}", 'required']) !!}
            </div>
        </div>
    </div>
<div class="row">
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                {!! Form::label('date', 'تاريخ الرحلة', ['class' => 'control-label']) !!}
                <div class="input-group">
                    {!! Form::text('date', null, ['id' => 'date', 'class' => "form-control  {{ $errors->has('date') ? ' is-invalid' : '' }}", 'value' => "{{ old('date') }}", 'required', 'autofocus']) !!}
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            {!! Form::label('date', '', ['class' => 'control-label']) !!}
            {!! Form::text('date', null, ['id' => 'date', 'class' => "form-control  {{ $errors->has('date') ? ' is-invalid' : '' }}", 'value' => "{{ old('date') }}", 'required', 'autofocus']) !!}
        </div>
    </div> --}}
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                {!! Form::label('departure_time', 'زمن انطلاق الرحلة', ['class' => 'control-label']) !!}
                <div class="input-group">
                    {!! Form::text('departure_time', null, ['id' => 'departure_time', 'class' => "form-control  {{ $errors->has('departure_time') ? ' is-invalid' : '' }}", 'value' => "{{ old('departure_time') }}", 'required', 'autofocus']) !!}
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                {!! Form::label('arrive_time', 'زمن وصول الرحلة', ['class' => 'control-label']) !!}
                <div class="input-group">
                    {!! Form::text('arrive_time', null, ['id' => 'arrive_time', 'class' => "form-control  {{ $errors->has('arrive_time') ? ' is-invalid' : '' }}", 'value' => "{{ old('arrive_time') }}", 'required', 'autofocus']) !!}
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            {!! Form::label('price', 'سعر التذكرة', ['class' => 'control-label']) !!}
            {!! Form::text('price', null, ['id' => 'price', 'class' => "form-control  {{ $errors->has('price') ? ' is-invalid' : '' }}", 'value' => "{{ old('price') }}", 'required', 'autofocus']) !!}
        </div>
    </div>
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            {!! Form::label('saleprice', 'سعر  بيع التذكرة', ['class' => 'control-label']) !!}
            {!! Form::text('saleprice', null, ['id' => 'saleprice', 'class' => "form-control
            {{ $errors->has('saleprice') ? ' is-invalid' : '' }}", 'value' => "{{ old('saleprice') }}", 'required', 'autofocus'])
            !!}
        </div>
    </div>
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            {!! Form::label('seats_number', 'عدد المقاعد', ['class' => 'control-label']) !!}
            {!! Form::text('seats_number', null, ['id' => 'seats_number', 'class' => "form-control  {{ $errors->has('seats_number') ? ' is-invalid' : '' }}", 'value' => "{{ old('seats_number') ? 49 : old('seats_number')}}", 'required', 'autofocus']) !!}
        </div>
    </div> 
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            {!! Form::label('status', 'الحالة', ['class' => 'control-label']) !!}
            {!! Form::select('status', tripStatus(), null, ['id' => 'status', 'class' => "form-control {{ $errors->has('status') ? ' is-invalid' : '' }}", 'value' => "{{ old('status') }}", 'required']) !!}
        </div>
    </div> 
</div>
<div class="row">
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
