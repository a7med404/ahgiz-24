@extends('website::layouts.master')
@section('title')
Home
@stop

@section('content')
<!-- Start Content section-->
{{-- <BusDetails :tripdetails="{{$trip}}"></BusDetails> --}}
<section class="card">
    <div class="text-center">
        <h3 class="text-capitalize l-r-border">filter  <span>resulte</span></h3>
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
                                        <p class="name">المقاعد المختارة:</p>
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
                                <p class="value">{{ $trip->fromStation->name }}</p>
                                <p class="city">{{ $trip->departure_time }}</p>
                                <p class="price"> {{ $trip->price * $seats.' ج.س ' }} </p>
                                <p class="date">{{ $trip->date }}</p>
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
                                        <div class="passenger">
                                            @csrf
                                            <?php $number = 1 ?>
                                            <input name="seats" value="{{$seats}}" type="hidden">
                                            <input name="trip_id" value="{{$trip->id}}" type="hidden">
                                            @while ((int)$seats)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="for-middel form-group">
                                                            <label class="control-label" for="name">اسم المسافر رقم {{$number++}} </label>
                                                            <input id="name" name="{{$seats.'-name'}}" type="text"><span class="border-middel"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-uppercase remember">
                                                    <label class="control-label">النوع </label><br>
                                                    <input id="{{$seats.'-gender'}}" value="1" name="{{$seats.'-gender'}}" type="radio">
                                                    <label for="{{$seats.'-gender'}}">ذكـر.</label>
                                                    <input id="{{$seats.'-gender'}}" value="0" name="{{$seats.'-gender'}}" type="radio">
                                                    <label for="{{$seats.'-gender'}}">انثي.</label>
                                                </div>
                                                <?php $seats-- ?>
                                            @endwhile
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                            <p>بيانات الاتصال</p>
                                            <div class="for-middel form-group">
                                                <label class="control-label" for="phone_number">رقم الموبايل</label>
                                                <input id="phone_number" placeholder="xxx xxx xxxx" name="phone_number" type="text" autofocus><span class="border-middel"></span>
                                            </div>
                                            <div class="feed-back">سوف يتم ارسال بيانات الحجز الي هذا الرقم.</div>
                                            <div class="for-middel form-group">
                                                <label class="control-label" for="email">البريد الالكتروني</label>
                                                <input id="email" placeholder="" name="email" type="text" autofocus><span class="border-middel"></span>
                                            </div>
                                            <input class="btn btn-custom text-uppercase" id="name" type="submit" value="انشاء حساب">
                                        </form>
                                        <div class="social-register">
                                            <button class="btn btn-custom text-uppercase"> <i class="fa fa-facebook"></i> التسجيل عن طريق فيسبوك</button>
                                        </div>
                                    </div>
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
