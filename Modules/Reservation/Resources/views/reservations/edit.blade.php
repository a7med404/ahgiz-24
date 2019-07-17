
@extends('cpanel.layouts.master')
@section('title')
{{ __('home/sidebar.all_reservations') }}
@endsection
@section('header')
<!-- icheck -->
{!! Html::style(asset('modules/master/plugins/icheck-1.x/all.css')) !!}
@endsection
@section('content')
<section class="content-header">
    <h1>{{ __('home/sidebar.all_reservations') }} <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('\cpanel') }}"><i class="fa fa-dashboard"></i> {{ __('home/sidebar.HOME') }} </a></li>
        <li><a href="{{ url('\cpanel\reservations') }}"><i class="fa fa-dashboard"></i> {{ __('home/sidebar.all_reservations') }} </a></li>
        <li class="active"> {{ __('home/sidebar.edit_reservation') }} {{ $reservationInfo->name }} </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('home/sidebar.edit_reservation') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($reservationInfo, ['route' => ['reservations.update', $reservationInfo->id], 'method' => "PATCH", 'files' => true]) !!}
                    @include('reservation::reservations.form')
                    {!! Form::close() !!}
                </div>
            </div>
    
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->

@stop
@section('footer')
<!-- icheck -->
{!! Html::script(asset('modules/master/plugins/icheck.min.js')) !!}
<script>

    $('#date').datepicker({
        autoclose: true,
        language: 'ar',
		rtl: true,
		startDate: 'toDay',
		format: 'yyyy-mm-dd'
    });

    //Timepicker
    $("#departure_time").timepicker({
        showInputs: false,
        language: 'ar',
    });
    $("#arrive_time").timepicker({
        showInputs: false,
        language: 'ar',
    });

</script>
@endsection