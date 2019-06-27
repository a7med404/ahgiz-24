@extends('website::layouts.master')
@section('title')
Home
@stop

@section('content')
<!-- Start Content section-->
<section class="sing" id="sing">
    <div class="container">
        <div class="contect">
            <div class="singup">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ads">
                            <div class="layout"><img class="img-responsive"
                                    src="{{ asset('modules/master/website/images/writer.svg') }}">
                                <p class="text-capitalize">Welcome.</p>
                                <p class="text-capitalize">this is your best place to fine your dream car.</p>
                                <button class="btn btn-custom text-uppercase change-sing">تسجيل الدخول</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="start-form text-capitalize">
                            <h3 class="l-r-border text-uppercase"> انشاء حساب جديد</h3><small>افضل خيار لك لحجز التذاكر
                                اونلاين</small>
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
                                    <input id="phone_number" name="phone_number" type="text" autofocus><span
                                        class="border-middel"></span>
                                </div>
                                <div class="for-middel form-group">
                                    <label class="control-label" for="password">كلمة السر</label>
                                    <input id="password" name="password" type="password"><span
                                        class="border-middel"></span>
                                </div>

                                <div class="form-group text-uppercase remember">
                                    <input id="remember" name="remember" type="checkbox">
                                    <label for="remember">I accept the <a href="#">Terms and Conditions</a> of the
                                        website</label>
                                </div>
                                <input class="btn btn-custom text-uppercase" id="name" type="submit" value="انشاء حساب">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="singin">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ads">
                            <div class="layout"><img class="img-responsive"
                                    src="{{ asset('modules/master/website/images/tmb_img.png') }}">
                                <p class="text-capitalize">احجز 24</p>
                                <p class="text-capitalize">افضل خيار لك لحجز التذاكر اونلاين.</p>
                                <button class="btn btn-custom text-uppercase change-sing">انشاء حساب جديد</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="start-form text-capitalize">
                            <h3 class="l-r-border text-uppercase"> تسجيل الدخول</h3><small> <span
                                    class="h-light">احجز24</span> تميز معنا و استمتع بافضل خدمات الحجز </small>
                            <form class="form" action="" method="post">
                                <div class="for-middel form-group">
                                    <label class="control-label" for="phone_number">رقم الموبايل</label>
                                    <input id="phone_number" name="phone_number" type="text" autofocus><span
                                        class="border-middel"></span>
                                </div>
                                <div class="for-middel form-group">
                                    <label class="control-label" for="password">كلمة السر</label>
                                    <input id="password" name="password" type="password"><span
                                        class="border-middel"></span>
                                </div>
                                <div class="form-group text-uppercase remember">
                                    <input id="remember" name="remember" type="checkbox">
                                    <label for="remember">تذكرني.</label>
                                </div>
                                <input class="btn btn-custom text-uppercase" id="name" type="submit"
                                    value="تسجيل الدخول">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of start Page-->
@stop
