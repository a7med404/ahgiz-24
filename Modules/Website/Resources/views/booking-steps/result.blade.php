@extends('website::layouts.master')
@section('title')
الرحلة المتوفرة
@stop
@section('header')
	<style>
        .search {
            top: 15%;
        }

        .filter .card {
            margin-top: 60px;
        }

	</style>	
@endsection
@section('content')
<!-- Start Content section-->
<section class="search" id="search">
    <div class="content">
        <div class="tabs">
        <div class="tab-content sections-contents" id="pills-tabContent">
            <div class="tab-pane fade active in" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"> 

                <form class="form" action="{{route('search-post')}}" method="post"> 
                    @csrf
                    <div class="row">
                    <div class="level col-md-3 col-sm-3">
                        <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                        <select name="from" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                            <option title="مــن"  placeholder="مــن" value="" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">مــن</div>
                            </div>'>
                            مــن
                            </option>
                            <option title="الخرطوم" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">الخرطوم</div>
                            </div>'>
                            1
                            </option>
                            <option title="بروتسودان" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">بروتسودان</div>
                            </div>'>
                            2
                            </option>
                            <option title="الخرطوم" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">الخرطوم</div>
                            </div>'>
                            3
                            </option>
                        </select>
                    </div>
                    <div class="level col-md-3 col-sm-3">
                        {{-- <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                        <input class="search-input text-uppercase"  type="text" placeholder="الــي"> --}}
                        <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                        <select name="to" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                            <option title="الــي"  placeholder="الــي" value="" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">الــي</div>
                            </div>'>
                            الــي
                            </option>
                            <option title="عطبرة" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">عطبرة</div>
                            </div>'>
                            4
                            </option>
                            <option title="بروتسودان" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">بروتسودان</div>
                            </div>'>
                            5
                            </option>
                            <option title="الخرطوم" data-content=
                            '<div class="inline-items">
                                <div class="h6 search-friend">الخرطوم</div>
                            </div>'>
                            6
                            </option>
                        </select>
                    </div>
                    <div class="level col-md-3 col-sm-3"> 
                        <svg class="olymp-month-calendar-icon icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon') }}"></use></svg>
                        <input name="date" class="search-input text-uppercase"  id="datepicker" type="text" placeholder="التاريــخ (اختياري)">
                    </div>
                    <div class="search-btn col-md-3 col-sm-3"> 
                        <input class="btn search-submit text-uppercase" id="name" type="submit" value="بحـــث">
                        <svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') }}"></use></svg>
                    </div>
                    </div>
                </form>
                
            </div>
            <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">new</div>
            <div class="tab-pane fade" id="pills-used" role="tabpanel" aria-labelledby="pills-used-tab">used</div>
        </div>
        </div>
    </div>
</section>
{{-- {{dd($trips)}} --}}
{{-- <result :trips="{{$trips}}"></result> --}}
<section class="filter" id="filter"> 
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--Start show-cars section-->
                <section class="show-cars card" id="show-cars">
                    <div class="text-center">
                        <h3 class="text-capitalize l-r-border">مـن <span> {{ getSelect('station')[$request->from] }} </span>الـي <span> {{ getSelect('station')[$request->to] }} </span></h3>
                        <p><span class="h-light">{{-- $tripsCount --}}</span> الرحلة المتوفرة </p>
                        <div class="cars-list scale">
                            <div class="row">
                                
                                @forelse ($trips as $trip)
                                    @php $reservedSeats = 0 @endphp 
                                    @foreach ($trip->reservations as $reservation)
                                        @if (!$reservation->canceled_at)
                                            @php $reservedSeats += $reservation->passengers->count() @endphp 
                                        @endif
                                    @endforeach
                                    @if (($trip->seats_number - $reservedSeats) > 0 )
                                        <div class="col-md-12 col-sm-12 col-xs-12 animated slideInRight fast">
                                            <div class="car-card text-center hover-box">
                                                {{-- <div class="car-img"><img class="img-responsive img-fluid" src="../images/pexels-photo-981041.jpeg"></div> --}}
                                                <div class="detail">
                                                    <h3 class="text-uppercase">{{ $trip->company->name }}</h3><span class="price"><a>{{ $trip->price }} ج.س  </a></span><span class="kilo"><a><i class="fa fa-user"></i>  <span class="h-light">{{ $trip->seats_number - $reservedSeats }}</span> مقعد متوفر</a></span>
                                                    <p class="time"><svg class="olymp-month-calendar-icon icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon') }}"></use></svg> تاريخ المغادرة <span class="h-light">({{ $trip->date }})</span> </p>
                                                    <ul class="list-unstyled">
                                                        <li>زمن انطلاق الباص:  <span> {{ $trip->departure_time }}<span></li>
                                                        <li>مدة السير: <span> 12:50<span></li>
                                                        <li>زمن وصول الباص:  <span> {{ $trip->arrive_time }}<span></li>
                                                        <li>المسافة: <span> 560<span> /كم</li>
                                                    </ul>
                                                    @auth('customer')
                                                        <button class="btn btn-custom text-uppercase" type="button" data-toggle="modal" data-target="#myModal-{{$trip->id}}"> اختيار المقاعد <i class="fa fa-chevron-left"></i></button>
                                                    @else
                                                        <button class="btn btn-custom text-uppercase" type="button" data-toggle="modal" data-target="#myModal-sing-in-out"> اختيار المقاعد <i class="fa fa-chevron-left"></i></button>                                                    
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="no-found"><img class="img-responsive" src="{{ asset('modules/master/website/images/no_bus.png') }}">
                                            <h3 class="text-uppercase">عفواَ, لا توجد تذاكر متوفرة </h3>
                                            <p><span class="h-light">جرب</span> مرة اخري </p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
                <div>
                    @if(count($trips) > 0)
                    <div class="text-center">
                        {{ $trips->appends(Request::except('page'))->render() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of start Page-->
@foreach ($trips as $trip)
    
<div class="modal fade" id="myModal-{{$trip->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title l-r-border text-uppercase"> اختيار المقاعد</h3>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="contect">
                    <div class="select-seats">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="ads">
                                    <div class="car-details">
                                        <div class="overview">
                                            <div class="details text-capitalize tabs">
                                                <div class="details-item"> 
                                                    <span class="details-item-name">{{ $trip->company->name }}</span>
                                                    <div class="details-item-value">{{ getSelect('station')[$request->from] }} </div>
                                                    <div class="details-item-value m-t-10">{{ $trip->date }} </div>
                                                    <div class="details-item-name">
                                                        <span> {{ $trip->departure_time }} </span>
                                                        <i class="fa fa-chevron-left"></i>
                                                        <span> {{ $trip->arrive_time }} </span>
                                                    </div>
                                                </div>
                                                {{-- <div class="details-item"> 
                                                    <div class="details-item-value"><span>المقاعد المختارة</span></div>
                                                    <div class="details-item-name">[ 22, 12, 9 ]</div>
                                                </div> --}}
                                                <div class="details-item"> 
                                                    <div class="details-item-value"><span>سعر التذكرة</span></div>
                                                    <div class="details-item-name">{{ $trip->price }} ج.س  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <a type="submit" class="btn btn-custom text-uppercase" type="button" href="{{ route('bus-details',  ['id' => $trip->id]) }}">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></a> --}}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="start-form text-capitalize">
                                    <section class="car-details" id="car-details">
                                        <div class="">
                                            <div class="card">
                                                <div class="overview">
                                                    <div class="-tabs">
                                                        {{-- <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
                                                            <li class="nav-item active"><a class="nav-link" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">اختيار المقاعد</a></li>
                                                            <li class="nav-item"><a class="nav-link" id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features" aria-selected="true">نقطة الصعود</a></li>
                                                            <li class="nav-item"><a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="true"> نتقة النزول</a></li>
                                                        </ul> --}}
                                                        <div class="tab-content sections-contents" id="pills-tabContent">
                                                            <div class="tab-pane fade active in" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab"> 
                                                                <div class="details text-capitalize center">
                                                                    <div class="booking-details">

                                                                        <p class="text-center"> قم باختيار مقعدك المفضل </p>
                                                                        <img class="img-responsive m-t-20 center" src="{{ asset('modules/master/website/images/Inventory.png') }}">
                                                                        {{-- <div id="legend" class="seatCharts-legend">
                                                                            <ul class="seatCharts-legendList">
                                                                                <li class="seatCharts-legendItem">
                                                                                    <div class="seatCharts-seat seatCharts-cell available"></div>
                                                                                    <span class="seatCharts-legendDescription">متوفرة</span>
                                                                                </li>
                                                                                <li class="seatCharts-legendItem">
                                                                                    <div class="seatCharts-seat seatCharts-cell ladies"></div>
                                                                                    <span class="seatCharts-legendDescription">متوفرة للسيدات</span>
                                                                                </li>
                                                                                <li class="seatCharts-legendItem">
                                                                                    <div class="seatCharts-seat seatCharts-cell selected"></div>
                                                                                    <span class="seatCharts-legendDescription">قمت باختياره</span>
                                                                                </li>

                                                                                <li class="seatCharts-legendItem">
                                                                                    <div class="seatCharts-seat seatCharts-cell unavailable"></div>
                                                                                    <span class="seatCharts-legendDescription">محجوز</span>
                                                                                </li>
                                                                            </ul>
                                                                        </div> --}}
                                                                    </div>

                                                                    {!! Form::open(['route' => ['save-seats'], 'method' => "POST", 'class' => 'form']) !!}
                                                                        <div class="col col-xl-6 col-lg-6 col-md-6">
                                                                            <div class="form-group">
                                                                                {!! Form::label('seats', 'عدد المقاعد', ['class' => 'control-label']) !!}
                                                                                {!! Form::select('seats', seatNumber($trip->seats_number - $reservedSeats), null, ['id' => 'seats', 'data-placeholder' => 'Select a State', 'class' => "form-control {{ $errors->has('seats') ? ' is-invalid' : '' }}", 'value' => "{{ old('seats') }}", 'required']) !!}
                                                                            </div>
                                                                        </div>
                                                                        @csrf
                                                                        {!! Form::hidden('trip_id', $trip->id, ['value' => "{{ $trip->id }}"]) !!}
                                                                        <div class="col col-xl-12 col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-custom text-uppercase">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="close" type="button" data-dismiss="modal">تراجع</button>
            </div>
        </div>
    </div>
</div>
@endforeach

    
<div class="modal fade sing-in-out" id="myModal-sing-in-out">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h3 class="modal-title l-r-border text-uppercase"> اختيار المقاعد</h3>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div> --}}
                <div class="modal-body">
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <section class="sing" id="sing">
                        <div class="">
                            <div class="contect">
                                <div class="singup">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="ads">
                                                <div class="layout"><img class="img-responsive"
                                                        src="{{ asset('modules/master/website/images/writer.svg') }}">
                                                    <p class="text-capitalize">Welcome.</p>
                                                    <p class="text-capitalize">this is your best place to fine your dream car.</p>
                                                    <button class="btn btn-custom text-uppercase change-sing">تسجيل الدخول</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="start-form text-capitalize">
                                                <h3 class="l-r-border text-uppercase"> انشاء حساب جديد</h3><small>افضل خيار لك لحجز التذاكر اونلاين</small>
                                                @include('website::customer.singup-form')
                                                <button class="btn btn-custom text-uppercase change change-sing">تسجيل الدخول</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="singin">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="ads">
                                                <div class="layout"><img class="img-responsive" src="{{ asset('modules/master/website/images/tmb_img.png') }}">
                                                    <p class="text-capitalize">احجز 24</p>
                                                    <p class="text-capitalize">افضل خيار لك لحجز التذاكر اونلاين.</p>
                                                    <button class="btn btn-custom text-uppercase change-sing">انشاء حساب جديد</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="start-form text-capitalize">
                                                <h3 class="l-r-border text-uppercase"> تسجيل الدخول</h3><small> <span class="h-light">احجز24</span> تميز معنا و استمتع بافضل خدمات الحجز </small>
                                                @include('website::customer.singin-form')
                                                <button class="btn btn-custom text-uppercase change change-sing">انشاء حساب جديد</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                {{-- <div class="modal-footer">
                    <button class="close" type="button" data-dismiss="modal">تراجع</button>
                </div> --}}
            </div>
        </div>
    </div>
@stop
