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
<section>
    <div class="container">
        <div class="card">
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
                                        <p class="city">الخرطوم</p>
                                        <p class="time">11:50 PM</p>
                                        <p class="date">الثلاثاء, 12مايو 2019</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        {{-- <img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img1.png') }}"> --}}
                                        <p class="city"><span>11:50</span> | <span>400 كم</span></p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="city">برتسودان</p>
                                        <p class="time">11:50 PM</p>
                                        <p class="date">الثلاثاء, 12مايو 2019</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">شركة النقل</p>
                                        <p class="value">جاسكابو للنقل البري</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">نقطة الانطلاق</p>
                                        <p class="value">الميناء البري الخرطوم</p>
                                        <p class="city">11:50 PM</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">المقاعد المختارة:</p>
                                        <p class="value">[ 22, 12, 9 ]</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الباص</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <form class="form" action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="for-middel form-group">
                                                        <label class="control-label" for="first_name">الاسم </label>
                                                        <input id="first_name" name="first_name" type="text"><span
                                                            class="border-middel"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="for-middel form-group">
                                                        <label class="control-label" for="last_name">اسم الوالد</label>
                                                        <input id="last_name" name="last_name" type="text"><span
                                                            class="border-middel"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="for-middel form-group">
                                                <label class="control-label" for="phone_number">رقم الموبايل</label>
                                                <input id="phone_number" placeholder="xxx xxx xxxx" name="phone_number" type="text" autofocus><span class="border-middel"></span>
                                            </div>
                                            <div class="feed-back">سوف يتم ارسال بيانات الحجز الي هذا الرقم.</div>
                                            <div class="form-group text-uppercase remember">
                                                <input id="remember" name="remember" type="checkbox">
                                                <label for="remember">لديك حساب بالفعل.</label>
                                            </div>
                                            <div class="for-middel form-group">
                                                <label class="control-label" for="password">كلمة السر</label>
                                                <input id="password" name="password" type="password"><span class="border-middel"></span>
                                            </div>
                                            <input class="btn btn-custom text-uppercase" id="name" type="submit" value="انشاء حساب">
                                        </form>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="social-register">
                                            <button class="btn btn-custom text-uppercase"> <i class="fa fa-facebook"></i> التسجيل عن طريق فيسبوك</button>
                                        </div>
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
                                <p class="price">2500 ج.س</p>
                                <p class="date">الثلاثاء, 12مايو 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
