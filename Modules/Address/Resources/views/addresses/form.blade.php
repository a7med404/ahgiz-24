@if (isset($companyInfo))
    {!! Form::hidden('addressable_type', 'Modules\Company\Entities\Company', ['value' => "{{ old('addressable_type') }}"]) !!}
@else
    {!! Form::hidden('addressable_type', 'Modules\User\Entities\User', ['value' => "{{ old('addressable_type') }}"]) !!}
@endif
<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('street_1', 'الشارع', ['class' => 'control-label']) !!}
            {!! Form::text('street_1', null, ['id' => 'street_1', 'class' => "form-control  {{ $errors->has('street_1') ? ' is-invalid' : '' }}", 'value' => "{{ old('street_1') }}", 'required', 'autofocus']) !!}
        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('street_2', 'الشارع 2', ['class' => 'control-label']) !!}
            {!! Form::text('street_2', null, ['id' => 'street_2', 'class' => "form-control  {{ $errors->has('street_2') ? ' is-invalid' : '' }}", 'value' => "{{ old('street_2') }}", 'required', 'autofocus']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('city', 'المدينة', ['class' => 'control-label']) !!}
            {!! Form::select('city', getSelect('cities'), null, ['id' => 'city', 'class' => "form-control select2 {{ $errors->has('city') ? ' is-invalid' : '' }}", 'value' => "{{ old('city') }}", 'required']) !!}
        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            {!! Form::label('local', 'المحلية', ['class' => 'control-label']) !!}
            {!! Form::select('local', getSelect('sub_cities'), null, ['id' => 'local', 'class' => "form-control select2 {{ $errors->has('local') ? ' is-invalid' : '' }}", 'value' => "{{ old('local') }}", 'required']) !!}
        </div>
    </div>
</div>

@if(isset($addressInfo))

{!! Form::hidden('addressable_id', null, ['value' => "{{ old('addressable_id') }}"]) !!}
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button href="#" class="btn btn-primary">حـــفظ</button>
    </div>
</div>
@else
@if (isset($companyInfo))
    {!! Form::hidden('addressable_id', $companyInfo->id, ['value' => "{{ old('addressable_id') }}"]) !!}
@else
    {!! Form::hidden('addressable_id', $userInfo->id, ['value' => "{{ old('addressable_id') }}"]) !!}
@endif
<div class="row m-t-40">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button href="#" class="btn btn-primary">حـــفظ</button>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button type="button" class="btn btn-default pull-left"  data-dismiss="modal">اغلاق</button>
    </div>
</div>
@endif
