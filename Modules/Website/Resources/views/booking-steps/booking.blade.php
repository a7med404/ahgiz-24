@extends('website::layouts.master')
@section('title')
Home
@stop

@section('content')
<!-- Start Content section-->
<section class="card">
    <div class="text-center">
        <h3 class="text-capitalize l-r-border">filter  <span>resulte</span></h3>
    </div>
</section>
<section class="car-details" id="car-details">
    <div class="container">
        <div class="card">
        <div class="overview">
            <h3 class="text-capitalize l-r-border">اختار طريقة الدفع المناسبة لك</h3>
            <div class="tabs">
            <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
                <li class="nav-item active"><a class="nav-link" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">نقــدي</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features" aria-selected="true">تطبيق بنكك</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="true">تطبيق سايبر</a></li>
            </ul>
            <div class="tab-content sections-contents" id="pills-tabContent">
                <div class="tab-pane fade active in" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab"> 
                <div class="details text-capitalize">
                    <div class="details-item"> 
                    <div class="details-item-name"><span>Vehicle</span></div>
                    <div class="details-item-value">V222 Sedan L 4dr 7G-TRONIC + 7sp 3.0TT [Jul] </div>
                    </div>
                    <div class="details-item"> 
                    <div class="details-item-name"><span>price</span></div>
                    <div class="details-item-value">$125,888</div>
                    </div>
                    <div class="details-item"> 
                    <div class="details-item-name"><span>Kilometers</span></div>
                    <div class="details-item-value">49,909 km </div>
                    </div>
                    <div class="details-item"> 
                    <div class="details-item-name"><span>Colour</span></div>
                    <div class="details-item-value">Silver </div>
                    </div>
                    <div class="details-item"> 
                    <div class="details-item-name"><span>Transmission</span></div>
                    <div class="details-item-value">7 speed Sports Automatic</div>
                    </div>
                    <div class="details-item"> 
                    <div class="details-item-name"><span>Body</span></div>
                    <div class="details-item-value">4 doors 5 seat Sedan </div>
                    </div>
                    <div class="details-item"> 
                    <div class="details-item-name"><span>Engine</span></div>
                    <div class="details-item-value">6 cylinder Petrol Twin Turbo Intercooled 3.0L </div>
                    </div>
                    <div class="details-item"> 
                    <div class="details-item-name"><span>Fuel Consumption Combined </span></div>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade" id="pills-features" role="tabpanel" aria-labelledby="pills-features-tab">Features</div>
                <div class="tab-pane fade" id="pills-specifications" role="tabpanel" aria-labelledby="pills-specifications-tab">Specifications</div>
            </div>
            </div>
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
                        <h3 class="text-capitalize l-r-border">filter  <span>resulte</span></h3>
                        <div class="cars-list scale">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="car-card text-center">
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
                                        <button class="btn btn-custom text-uppercase">read more <i class="fa fa-chevron-left"></i></button>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="car-card text-center">
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- End of start Page-->

@stop
