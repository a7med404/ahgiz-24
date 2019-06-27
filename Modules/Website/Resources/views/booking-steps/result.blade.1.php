@extends('website::layouts.master')
@section('title')
Home
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
<section class="filter" id="filter">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <!--Start show-cars section-->
            
            <section class="show-cars card" id="show-cars">
            <div class="text-center">
                <h3 class="text-capitalize l-r-border">مـن  <span>الخرطورم</span>الـي  <span>برتسودان</span></h3>
                <p><span class="h-light">6</span> من نتائج البحث </p>
                <div class="cars-list scale">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="car-card text-center hover-box">
                            {{-- <div class="car-img"><img class="img-responsive img-fluid" src="../images/pexels-photo-981041.jpeg"></div> --}}
                            <div class="detail">
                                <h3 class="text-uppercase">شركة جاسكابو للنقل البري</h3><span class="price"><a>35,50 ج.س  </a></span><span class="kilo"><a> 15 مقعد متوفر<i class="fa fa-char"></i></a></span>
                                <p class="time"><svg class="olymp-month-calendar-icon icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon') }}"></use></svg> تاريخ المغادرة <span class="h-light">(12/06/2019)</span> </p>
                                <ul class="list-unstyled">
                                <li>زمن انطلاق الباص:  <span> 12:50<span></li>
                                <li>مدة السير: <span> 12:50<span></li>
                                <li>زمن وصول الباص:  <span> 12:50<span></li>
                                <li>المسافة: <span> 560<span> /كم</li>
                                </ul>
                                <button class="btn btn-custom text-uppercase" type="button" data-toggle="modal" data-target="#myModal"> اختيار المقاعد <i class="fa fa-chevron-left"></i></button>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="car-card text-center hover-box">
                            {{-- <div class="car-img"><img class="img-responsive img-fluid" src="../images/pexels-photo-981041.jpeg"></div> --}}
                            <div class="detail">
                                <p class="time">5 minute a go <i class="fa fa-clock"></i> </p>
                                <h3 class="text-uppercase">شركة جاسكابو للنقل البري</h3><span class="price"><a>35,50 ج.س  </a></span><span class="kilo"><a> 15 مقعد متوفر<i class="fa fa-char"></i></a></span>
                                <ul class="list-unstyled">
                                <li>زمن انطلاق الباص  <span> 12:50<span></li>
                                <li>مدة السير <span> 12:50<span></li>
                                <li>زمن وصول الباص  <span> 12:50<span></li>
                                <li>المسافة <span> 560<span> /كم</li>
                                </ul>
                                <button class="btn btn-custom text-uppercase">read more <i class="fa fa-chevron-left"></i></button>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="no-found"><img class="img-responsive" src="{{ asset('modules/master/website/images/no_bus.png') }}">
                                <h3 class="text-uppercase">عفواَ, لا توجد تذاكر متوفرة </h3>
                                <p><span class="h-light">جرب</span> مرة اخري </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
        </div>
    </div>
</section>
<!-- End of start Page-->


<div class="modal fade " id="myModal">
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
                                                    <span class="details-item-name">شركة جاسكابو للنقل البري</span>
                                                    <div class="details-item-value">الخرطوم </div>

                                                    <div class="details-item-value m-t-10">الثلاثاء, 12مايو 2019 </div>
                                                    <div class="details-item-name">
                                                        <span> 11:50 PM </span>
                                                        <i class="fa fa-chevron-left"></i>
                                                        <span> 11:50 PM </span>
                                                    </div>
                                                </div>
                                                <div class="details-item"> 
                                                <div class="details-item-value"><span>المقاعد المختارة</span></div>
                                                <div class="details-item-name">[ 22, 12, 9 ]</div>
                                                </div>
                                                <div class="details-item"> 
                                                <div class="details-item-value"><span>اجمالي تكلفة التذاكر</span></div>
                                                <div class="details-item-name">2500 ج.س</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="start-form text-capitalize">
                                    <section class="car-details" id="car-details">
                                        <div class="">
                                            <div class="card">
                                            <div class="overview">
                                                <div class="tabs">
                                                <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
                                                    <li class="nav-item active"><a class="nav-link" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">اختيار المقاعد</a></li>
                                                    <li class="nav-item"><a class="nav-link" id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features" aria-selected="true">نقطة الصعود</a></li>
                                                    <li class="nav-item"><a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="true"> نتقة النزول</a></li>
                                                </ul>
                                                <div class="tab-content sections-contents" id="pills-tabContent">
                                                    <div class="tab-pane fade active in" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab"> 
                                                    <div class="details text-capitalize">
                                                        <div class="booking-details">

                                                            <div id="legend" class="seatCharts-legend">
                                                                <ul class="seatCharts-legendList">
                                                                    <li class="seatCharts-legendItem">
                                                                        <div class="seatCharts-seat seatCharts-cell available"></div>
                                                                        <span class="seatCharts-legendDescription">First Class</span>
                                                                    </li>
                                                                    <li class="seatCharts-legendItem">
                                                                        <div class="seatCharts-seat seatCharts-cell available economy-class"></div>
                                                                        <span class="seatCharts-legendDescription">Economy Class</span>
                                                                    </li>
                                                                    <li class="seatCharts-legendItem">
                                                                        <div class="seatCharts-seat seatCharts-cell unavailable first-class"></div>
                                                                        <span class="seatCharts-legendDescription">Already Booked</span>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        box of seats
                                                    </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-features" role="tabpanel" aria-labelledby="pills-features-tab">
                                                        
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-specifications" role="tabpanel" aria-labelledby="pills-specifications-tab">Specifications</div>
                                                </div>
                                                </div>

                                                <button class="btn btn-custom text-uppercase">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></button>
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
            {{-- <div class="modal-footer">
                <button class="close" type="button" data-dismiss="modal">تراجع</button>
            </div> --}}
        </div>
    </div>
</div>
@stop
