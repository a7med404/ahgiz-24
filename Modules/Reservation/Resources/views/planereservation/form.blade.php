
<div class="row">
    <div class="col col-xl-6 col-lg-12 col-md-12">
        <div class="form-group">
            {!! Form::label('customer_id', 'المستخدم', ['class' => 'control-label']) !!}
            {!! Form::select('customer_id', getSelect('customer'), null, ['id' => 'customer_id', 'class' => "select2 form-control  {{ $errors->has('customer_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('customer_id') }}", 'required']) !!}
        </div>
    </div>
</div>  
    <div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('from_station_id', 'مــن ', ['class' => 'control-label']) !!}
            {!! Form::select('from_station_id', getSelect('station'), null, ['id' => 'from_station_id', 'class' => "select2 form-control  {{ $errors->has('from_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('from_station_id') }}", 'required']) !!}
        </div>
    </div>
        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                {!! Form::label('to_station_id', 'إلــى', ['class' => 'control-label']) !!}
                {!! Form::select('to_station_id', getSelect('station'), null, ['id' => 'to_station_id', 'class' => "select2 form-control  {{ $errors->has('to_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('to_station_id') }}", 'required']) !!}
            </div>
        </div>

        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                {!! Form::label('company_id', 'اسم الشركة', ['class' => 'control-label']) !!}
                {!! Form::select('company_id', getSelect('company'), null, ['id' => 'company_id', 'class' => "select2 form-control  {{ $errors->has('company_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('company_id') }}", 'required']) !!}
            </div>
        </div>

        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                {!! Form::label('user_id', 'اسم المستخدم', ['class' => 'control-label']) !!}
                {!! Form::select('user_id', getSelect('company'), null, ['id' => 'user_id', 'class' => "select2 form-control  {{ $errors->has('user_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('user_id') }}", 'required']) !!}
            </div>
        </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('status', 'الحالة', ['class' => 'control-label']) !!}
            {!! Form::select('status', reservationStatus(), null, ['id' => 'status', 'class' => "select2 form-control {{ $errors->has('status') ? ' is-invalid' : '' }}", 'value' => "{{ old('status') }}", 'required']) !!}
        </div>
    </div> 
    {{-- <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('seat_id', 'المسار(من)', ['class' => 'control-label']) !!}
            {!! Form::select('seat_id[]', getSelect('seat'), null, ['id' => 'seat_id', 'multiple' => 'multiple', 'data-placeholder' => 'Select a State', 'class' => "select2 form-control  {{ $errors->has('seat_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('seat_id') }}", 'required']) !!}
        </div>
    </div> --}}
</div>

@if(isset($reservationInfo))
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
