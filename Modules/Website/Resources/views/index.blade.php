@extends('website::layouts.master')
@section('title')
الرئيسية
@stop

@section('content')
    @section('slider-content')
    <div class="slider">
        <div class="layout">
            <div class="container content">
            <h3 class="l-r-border text-uppercase wow fadeInUp"><span> احجـز24 </span>تميــز معنا</h3>
            <h1 class="text-capitalize  wow fadeInUp">النقل بين المدن أكثر رفاهية</h1>
            <p class="text-uppercase wow fadeInUp">اكثر من <span>200</span> رحلة يوميا</p>
            {{-- <a class="smoothscroll btn btn-custom text-uppercase" href="#search">احجـز الان <i class="fa fa-chevron-left"></i></a> --}}
            </div>
        </div>
    </div>
    @endsection
    <!-- Start search section-->
    @include('website::booking-steps.search-form')
    <!-- Start services section-->
    <section class="services" id="services">
    <div class="container">
        <div class="content text-center">
        <h3 class="text-capitalize l-r-border wow fadeInUp">احصل علي تذكرتك في  <span>ثلاثة خطوات</span> </h3>
        <div class="service wow fadeInUp">
            <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="stap"><img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img1.png') }}">
                <h3 class="text-uppercase">ابحـث عن الرحلات</h3>
                <p>search for  search for the car do you want</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="stap"><img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img2.png') }}">
                <h3 class="text-uppercase">احجـز رحلتك المفضلة</h3>
                <p>search for the car do want search for the car do you want</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="stap"><img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img3.png') }}">
                <h3 class="text-uppercase">احصـل علي تذكرتك </h3>
                <p>search for the car do you  for the car do you want</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- Start brands section-->
    <section class="brands" id="barnds">
    <div class="layout">
        <div class="container">
        <div class="text-center scale">
            <h3 class="text-capitalize l-r-border wow fadeInUp">بعض من شركائنا <span>المميزيين</span> </h3>
            <p class="lead wow fadeInUp">استمتع بتجربة افضل مع اكبر شركات النقل في السودان</p>
            <ul class="list-unstyled wow fadeInUp">
            <li><a><img class="img-responsive" src="{{ asset('modules/master/website/images/mercedes-benz.svg') }}"></a></li>
            <li><a><img class="img-responsive" src="{{ asset('modules/master/website/images/honda.svg') }}"></a></li>
            <li><a><img class="img-responsive" src="{{ asset('modules/master/website/images/chevrolet.svg') }}"></a></li>
            <li><a><img class="img-responsive" src="{{ asset('modules/master/website/images/hyundai.svg') }}"></a></li>
            <li><a><img class="img-responsive" src="{{ asset('modules/master/website/images/toyota.svg') }}"></a></li>
            </ul>
            <button class="btn btn-custom text-uppercase">all brands <i class="fa fa-home"></i></button>
        </div>
        </div>
    </div>
    </section>
    <!-- Start testimonials section-->
    <section class="testimonials" id="testimonials">
    <div class="container">
        <div class="content text-center">
        <h3 class="text-capitalize l-r-border wow fadeInUp">اراء العملاء بعد تجربة <span>افضل</span></h3>
        <p class="line"></p>
        <div class="testimonial wow fadeInUp">
            <div class="div carousel slide" data-ride="carousel" id="quote-carousel">
            <div class="carousel-inner text-center">
                <?php $x = 0; ?>
                @foreach (getTestimonial() as $item)
                <div class="item {{ $x == 0 ? 'active' : ''}}">
                    <blockquote>
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <p>{{ $item->text }}</p>
                                <small class="text-capitalize">{{ $item->how }}</small>
                            </div>
                        </div>
                    </blockquote>
                    <?php $x++; ?>
                </div>
                @endforeach
            </div>
            <ol class="carousel-indicators">
                <?php $x = 0; ?>
                @foreach (getTestimonial() as $item)
                <li class="{{ $x == 0 ? 'active' : ''}}" data-target="#quote-carousel" data-slide-to="{{$x}}"> 
                    <?php $x++; ?>
                </li>
                @endforeach
            </ol>
            <a class="left carousel-control" data-slide="prev" href="#quote-carousel"><i class="fa fa-arrow-left"></i></a>
            <a class="right carousel-control" data-slide="next" href="#quote-carousel"><i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- Start help section-->
    <section class="help wow pulse" id="help">
    <div class="container">
        <img class="img-responsive center-img" src="{{ asset('modules/master/website/images/customer_care.png') }}">
        <p> اتصل علي الخـط الساخـن <span> ({{getSetting('hot_line')}}) </span></p>
    </div>
    </section> 
    <!-- /.content -->
@stop
