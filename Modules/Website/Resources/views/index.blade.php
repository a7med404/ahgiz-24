@extends('website::layouts.master')
@section('title')
{{getSetting()}}
@stop

@section('content')
    @section('slider-content')
    <div class="slider">
        <div class="layout">
            <div class="container content">
            <h3 class="l-r-border text-uppercase"><span> احجـز24 </span>تميــز معنا</h3>
            <h1 class="text-capitalize">with Us fine your dream car</h1>
            <p class="text-uppercase">اكثر من <span>200</span> رحلة يوميا</p><a class="smoothscroll btn btn-custom text-uppercase" href="#search">احجـز الان <i class="fa fa-chevron-left"></i></a>
            </div>
        </div>
    </div>
    @endsection
    <!-- Start search section-->
    {{-- <search></search> --}}
    <section class="search" id="search">
        <div class="content">
            <div class="tabs">
            {{-- <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
                <li class="nav-item active"><a class="nav-link" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">Buses</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="true">Flights</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-used-tab" data-toggle="pill" href="#pills-used" role="tab" aria-controls="pills-used" aria-selected="true">trains</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-used-tab" data-toggle="pill" href="car-details.html"><i class="fa fa-search"></i></a></li>
            </ul> --}}
            <div class="tab-content sections-contents" id="pills-tabContent">
                <div class="tab-pane fade active in" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"> 

                        {{-- <div class="inline-items search-list">
                            <div class="search-event">
                                <span class="h6 search-friend"> Marie Davidson </span>
                            </div>
                            <span class="search-icon">
                                <svg class="olymp-small-pin-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon') }}"></use></svg>
                            </span>
                        </div> --}}

                <form class="form" action="{{route('search-post')}}" method="get"> 
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
                            @foreach ($stations as $station)
                                <option title="{{$station->name}}" data-content=
                                    '<div class="inline-items"> <div class="h6 search-friend">{{$station->name}}</div> </div>'> {{$station->id}}
                                </option>
                            @endforeach
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
                            @foreach ($stations as $station)
                                <option title="{{$station->name}}" data-content=
                                    '<div class="inline-items"> <div class="h6 search-friend">{{$station->name}}</div> </div>'> {{$station->id}}
                                </option>
                            @endforeach
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
    {{-- <section class="under-search"></section> --}}
    <!-- Start services section-->
    <section class="services" id="services">
    <div class="container">
        <div class="content text-center">
        <h3 class="text-capitalize l-r-border">احصل علي تذكرتك في  <span>ثلاثة خطوات</span> </h3>
        <div class="service">
            <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="stap"><img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img1.png') }}">
                <h3 class="text-uppercase">اختيار الوجهات و التاريــخ</h3>
                <p>search for  search for the car do you want</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="stap"><img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img2.png') }}">
                <h3 class="text-uppercase">احصل علي كل الرحلات</h3>
                <p>search for the car do want search for the car do you want</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="stap"><img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img3.png') }}">
                <h3 class="text-uppercase">اختيار الرحلة المفضلة لك </h3>
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
            <h3 class="text-capitalize l-r-border">بعض من شركائنا <span>المميزيين</span> </h3>
            <p class="lead">استمتع بتجربة افضل مع اكبر شركات النقل في السودان</p>
            <ul class="list-unstyled">
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
        <h3 class="text-capitalize l-r-border">اراء العملاء بعد تجربة <span>افضل</span></h3>
        <p class="line"></p>
        <div class="testimonial">
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
    <section class="help" id="help">
    <div class="container">
        <p><i class="fa fa-phone"></i> اتصل علي الخـط الساخـن <span> ({{getSetting('hot_line')}}) </span></p>
    </div>
    </section>
    <!-- /.content -->
@stop
