@extends('website::layouts.master')
@section('title')
Home
@stop

@section('content')
<section class="card">
    <div class="text-center">
        <h3 class="text-capitalize l-r-border">filter  <span>resulte</span></h3>
    </div>
</section>
<section>
    <div class="container">
        <div class="card more-shadow box-shadow">
            <div class="bus-details">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الباص</h4>
                            </div>
                            <div class="panel-body">
                                <p class="price">تم اكمال عملية الحجز بنجاح</p>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a type="submit" class="btn btn-custom text-uppercase" type="button" href="{{ route('print',  ['id' => $reservation->id]) }}">طباعة <i class="fa fa-print"></i></a>
                                    
                                        <a type="submit" class="btn btn-custom text-uppercase" type="button" href="{{ route('print',  ['id' => $reservation->id]) }}">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></a>
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
