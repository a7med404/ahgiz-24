@extends('website::layouts.master')
@section('title')
Home
@stop

@section('content')
<!-- Start Content section-->
{{-- <BusDetails :tripdetails="{{$trip}}"></BusDetails> --}}
<section class="card">
    <div class="text-center">
        <h3 class="text-capitalize l-r-border">تفاصيل <span> الباص و المسافرين</span></h3>
    </div>
</section>
<section>
    {{-- {{dd($reservation, $trip, $trip->fromStation->name)}} --}}
    <div class="container">
        <div class="card more-shadow box-shadow">
            <div class="bus-details">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الباص</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="city">{{ $trip->fromStation->name }}</p>
                                        <p class="time">{{ $trip->departure_time }}</p>
                                        <p class="date">{{ $trip->date }}</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="city text-center"><span>11:50</span> | <span>400 كم</span></p>
                                        <img class="img-responsive m-t-20" src="{{ asset('modules/master/website/images/destHorSep.gif') }}">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="city">{{ $trip->toStation->name }}</p>
                                        <p class="time">{{ $trip->arrive_time }}</p>
                                        <p class="date">{{ $trip->date }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">شركة النقل</p>
                                        <p class="value">{{ $trip->company->name }}</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">نقطة الانطلاق</p>
                                        <p class="value">{{ $trip->fromStation->name }}</p>
                                        <p class="city">{{ $trip->departure_time }}</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">عدد المقاعد المختارة:</p>
                                        <p class="value">[ {{$seats}}
                                            {{-- @foreach ($seats as $seat)
                                                {{ $seat.', ' }}
                                            @endforeach --}}
                                        ]
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الباص</h4>
                            </div>
                            <div class="panel-body">
                                <p>اجمالي تكلفة التذاكر</p>
                                <p class="price"> {{ $trip->price * $seats.' ج.س ' }} </p>
                                <p class="date">{{ $trip->date }}</p>
                                <p class="city">{{ $trip->departure_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <a type="submit" class="btn btn-custom text-uppercase" type="button" href="{{ route('pay-page',  ['id' => $reservation->id]) }}">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></a> --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الركاب</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form" action="{{route('save-passenger')}}" method="post">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <p class="sub_title">بيانات الركاب:</p>
                                            @csrf
                                            <?php $number = 2; $i = 1 ?>
                                            <input name="seats" value="{{$seats}}" type="hidden">
                                            <input name="trip_id" value="{{$trip->id}}" type="hidden">

                                            
                                            @while ( $i <= (int)$seats)
                                            @if ($i == 1)
                                            <div class="passenger">
                                                <div class="row">
                                                    <div class="col-md-10"> 
                                                        <div class="for-middel form-group">
                                                            {!! Form::label('name', 'اسم المسافر رقم 1', ['class' => 'control-label']) !!}
                                                            {!! Form::text('1-name', Auth::guard('customer') ? Auth::guard('customer')->user()->first_name.' '.Auth::guard('customer')->user()->last_name : null , ['id' => 'name', 'class' => "{{ $errors->has('name') ? ' is-invalid' : '' }}", 'value' => "{{ old('name') }}", 'required', 'autofocus']) !!}
                                                            <span class="border-middel"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-uppercase remember">
                                                    <label class="control-label">النوع </label><br>
                                                    <input id="1-gender" value="1" {{ Auth::guard('customer')->user()->gender === 1 ? 'checked' : '' }} name="1-gender" type="radio">
                                                    <label for="1-gender">ذكـر.</label>
                                                    <input id="1-gender" value="0" {{ Auth::guard('customer')->user()->gender === 0 ? 'checked' : '' }} name="1-gender" type="radio">
                                                    <label for="1-gender">انثي.</label>
                                                </div>
                                            </div>
                                            @else
                                            <div class="passenger">
                                                <div class="row">
                                                    <div class="col-md-10"> 
                                                        <div class="for-middel form-group">
                                                            {!! Form::label('name', ' اسم المسافر رقم '.$number++, ['class' => 'control-label']) !!}
                                                            {!! Form::text($i.'-name', null, ['id' => 'name', 'class' => "{{ $errors->has('name') ? ' is-invalid' : '' }}", 'value' => "{{ old('name') }}", 'required', 'autofocus']) !!}
                                                            <span class="border-middel"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-uppercase remember">
                                                    <label class="control-label">النوع </label><br>
                                                    <input id="{{$i.'-gender'}}" value="1" name="{{$i.'-gender'}}" type="radio">
                                                    <label for="{{$i.'-gender'}}">ذكـر.</label>
                                                    <input id="{{$i.'-gender'}}" value="0" name="{{$i.'-gender'}}" type="radio">
                                                    <label for="{{$i.'-gender'}}">انثي.</label>
                                                </div>
                                            </div>

                                            @endif
                                            <?php $i++ ?>
                                            @endwhile
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                <hr>
                                                <p class="sub_title">بيانات الاتصال:</p>
                                                <div class="feed-back">سوف يتم ارسال بيانات الحجز الي هذا الرقم.</div>
                                                <div class="for-middel form-group">
                                                    {!! Form::label('phone_number', 'رقم الموبايل', ['class' => 'control-label']) !!}
                                                    @if (Auth::guard('customer')->user()->phone_number)
                                                        {!! Form::text('phone_number', Auth::guard('customer') ? Auth::guard('customer')->user()->phone_number : null , ['id' => 'phone_number', 'placeholder' => 'xxx xxx xxxx', 'disabled' => 'disabled', 'class' => "{{ $errors->has('phone_number') ? ' is-invalid' : '' }}", 'value' => "{{ old('phone_number') }}", 'required', 'autofocus']) !!}
                                                    @else                                                    
                                                    {!! Form::text('phone_number', Auth::guard('customer') ? Auth::guard('customer')->user()->phone_number : null , ['id' => 'phone_number', 'placeholder' => 'xxx xxx xxxx', 'class' => "{{ $errors->has('phone_number') ? ' is-invalid' : '' }}", 'value' => "{{ old('phone_number') }}", 'required', 'autofocus']) !!}
                                                     
                                                    @endif
                                                    <span class="border-middel"></span>
                                                </div>
                                                <div class="for-middel form-group">
                                                    {!! Form::label('email', 'البريد الالكتروني', ['class' => 'control-label']) !!}
                                                    @if (Auth::guard('customer')->user()->email)
                                                        {!! Form::text('email', Auth::guard('customer') ? Auth::guard('customer')->user()->email : null, ['id' => 'email', 'placeholder' => 'exmple@exmple.com', 'disabled' =>'disabled', 'class' => "{{ $errors->has('email') ? ' is-invalid' : '' }}", 'value' => "{{ old('email') }}", 'autofocus']) !!}
                                                    @else
                                                        {!! Form::text('email', Auth::guard('customer') ? Auth::guard('customer')->user()->email : null, ['id' => 'email', 'placeholder' => 'exmple@exmple.com', 'class' => "{{ $errors->has('email') ? ' is-invalid' : '' }}", 'value' => "{{ old('email') }}", 'autofocus']) !!}                                                        
                                                    @endif
                                                    <span class="border-middel"></span>
                                                </div>
                                                <button type="submit" class="btn btn-block text-uppercase">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></button>
                                                {{-- <input class="btn btn-custom text-uppercase" id="name" type="submit" value="اكمال عملية الحجز"> --}}
                                        </div>
                                    </form>
                                    {{-- <div class="social-register">
                                        <button class="btn btn-custom text-uppercase"> <i class="fa fa-facebook"></i> التسجيل عن طريق فيسبوك</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of start Page-->


@stop
