@extends('website::layouts.master')
@section('title')
Home
@stop

@section('header')
	<style>
		.sing .contect .singup {
				display: block;
		}
		.sing .contect .singin {
				display: none;
		}
	</style>	
@endsection

@section('content')
<!-- Start Content section-->
<section class="sing pay" id="sing">
    <div class="container">
        <div class="contect">
            <div class="tabs">
                <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
                    <li class="nav-item active"><a class="nav-link" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">نقــدي</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features" aria-selected="true">تطبيق بنكك</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="true">تطبيق سايبر</a></li>
                </ul>
                <div class="tab-content sections-contents" id="pills-tabContent">
                    <div class="tab-pane fade active in" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab"> 
                    <div class="details text-capitalize">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">عملية الدفع النقدي</h4>
                                        {{-- <h3 class="text-capitalize l-r-border">اختار طريقة الدفع المناسبة لك</h3> --}}
                                    </div>
                                    <div class="panel-body">
                                        <p class="city m-b-30">قم باختيار المدينة و المحلية الخاصة بك للتواصل مع اقرب مندوب لك من مندوبينا المنتشرين في جميع المدن.</p>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <form class="form" action="{{route('search-post')}}" method="post"> 
                                                        @csrf
                                                    <div class="row">
                                                    <div class="level col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="phone_number">المدينة</label>
                                                            <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') }}"></use></svg>
                                                            <select name="from" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                                                                <option title="اختيار المدينة"  placeholder="اختيار المدينة" value="" data-content=
                                                                '<div class="inline-items">
                                                                    <div class="h6 search-friend">اختيار المدينة</div>
                                                                </div>'>
                                                                اختيار المدينة
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
                                                    </div>
                                                    <div class="level col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="phone_number">المحلية</label>
                                                            <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') }}"></use></svg>
                                                            <select name="to" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                                                                <option title="اختيار المحلية"  placeholder="اختيار المحلية" value="" data-content=
                                                                '<div class="inline-items">
                                                                    <div class="h6 search-friend">اختيار المحلية</div>
                                                                </div>'>
                                                                اختيار المحلية
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
                                                    </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <p class="name m-t-25">رقم المندوب</p>
                                                <p class="value"> +249-92826-4846 </p>
                                                <p class="city">يمكنك الاتصال برقم المندوب من تاكيد عملية الحجز.</p>
                                                <div class="social-register">
                                                    <button class="btn btn-custom text-uppercase"> حجـز </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="pills-features" role="tabpanel" aria-labelledby="pills-features-tab">Features</div>
                    <div class="tab-pane fade" id="pills-specifications" role="tabpanel" aria-labelledby="pills-specifications-tab">Specifications</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of start Page-->
@stop
