@extends('website::layouts.master')
@section('title')
Home
@stop

@section('content')
<!-- Start Content section-->

<section class="profile" id="porfile">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                <div class="info"><img class="img-responsive thumbnail" src="{{ asset('modules/master/website/images/profile-image.jpg') }}">
                    <p class="center text-capitalize">{{ $customerInfo->first_name }} {{ $customerInfo->last_name }}</p>
                    <hr>
                    <div class="row text-center">
                    <div class="col-md-4 col-xs-4">
                        <div class="data">
                        <p>{{ $customerInfo->reservations->count() }}</p><span>الحجوزات</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="data have-border">
                        <p>12</p><span>cars</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="data">
                            <p>12</p><span>cars</span>
                        </div>
                    </div>
                    </div>
                    <hr>
                    <h3 class="text-capitalize">البيانات الشخصية</h3>
                    <ul class="list-unstyled">
                    <li class="text-capitalize">الاسم: <span>{{ $customerInfo->first_name }} {{ $customerInfo->last_name }}</span> </li>
                    <li class="text-capitalize">رقم الهاتف: <span>{{ $customerInfo->phone_number }}</span> </li>
                    <li class="text-capitalize">البريد الالكتروني: <span>{{ $customerInfo->email }}</span> </li>
                    <li class="text-capitalize">النوع: <span>{{ $customerInfo->gender }}</span> </li>
                    <li class="text-capitalize">تاريخ الميلاد: <span>{{ $customerInfo->brithdate }}</span> </li>
                    </ul><a>
                    <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-custom text-uppercase">تعديل المعلومات الشخصية <i class="fa fa-chevron-left"></i></button></a>
                </div>
                </div>
            </div>
            <div class="col-md-8">
                <section class="filter" id="filter">
                    <div class="">
                        <div class="row">
                        <div class="col-sm-12">
                            <!--Start show-cars section-->
                            <section class="show-cars card">
                            <div class="text-center">
                                <h3 class="text-capitalize l-r-border"> الحجوزات التي قمت بها</h3>
                                @forelse($customerInfo->reservations as $reservation)
                                    <div class="cars-list scale">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="car-card text-center hover-box">
                                                <div class="detail">
                                                    <h3 class="text-uppercase">{{ $reservation->trip->company->name }}</h3>
                                                    <span class="price"><a>{{ $reservation->passengers->count() * $reservation->trip->price }} ج.س  </a>
                                                    </span><span class="kilo"><a> تاريخ الحجز {{ date('d-m H:i', strtotime($reservation->created_at)) }} </a></span>
                                                    </span><span class="kilo m-r-20"><a> عدد المقاعد  [ {{ $reservation->passengers->count() }} ]</a></span>
                                                    <p class="time"><svg class="olymp-month-calendar-icon icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon') }}"></use></svg> تاريخ المغادرة <span class="h-light">({{ $reservation->trip->date }})</span> </p>
                                                    <ul class="list-unstyled">
                                                        <li>زمن انطلاق الباص:  <span> {{ $reservation->trip->departure_time }}<span></li>
                                                        <li>مدة السير: <span> {{intval((strtotime(date($reservation->trip->arrive_time))-strtotime($reservation->trip->departure_time)))}}<span></li>
                                                        <li>زمن وصول الباص:  <span> {{ $reservation->trip->arrive_time }}<span></li>
                                                        <li>المسافة: <span> 560<span> /كم</li>
                                                    </ul>
                                                    <button class="btn btn-custom text-uppercase">تفاصيل الحجز <i class="fa fa-chevron-left"></i></button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h3 class="text-capitalize"> لم تقم باي حجز حتي الان</h3>
                                    <a href="{{url('/')}}" class="btn btn-custom text-uppercase">حجز الان <i class="fa fa-chevron-left"></i></a>
                                @endforelse
                            </div>
                            </section>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

<!-- Popup  -->
<div class="modal fade" id="popup-form">
    <div class="modal-dialog" tabindex="-1" role="dialog" aria-labelledby="popup-form" aria-hidden="true">
        <div class="modal-content modal-content-box">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="title">بيانات المستخدم</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($customerInfo, ['route' => ['customers.update', $customerInfo->id], 'method' => "PATCH"]) !!}
                
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('first_name', '{{ __("home/labels.f_name") }}', ['class' => 'form-label']) !!}
            {!! Form::text('first_name', null, ['id' => 'first_name', 'class' => "form-control  {{ $errors->has('first_name') ? ' is-invalid' : '' }}", 'value' => "{{ old('first_name') }}", 'required', 'autofocus']) !!}
        </div>
    
        <div class="form-group col-md-6">
            {!! Form::label('last_name', '{{ __("home/labels.l_name") }}', ['class' => 'form-label']) !!}
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
                    {{-- <div class="row">
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
                    <input class="btn btn-custom text-uppercase" id="name" type="submit" value="انشاء حساب"> --}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- ... end Popup  -->

</section>

@stop
