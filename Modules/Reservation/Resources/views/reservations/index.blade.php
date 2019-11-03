@extends('cpanel.layouts.master')
@section('title')
{{ __('home/sidebar.all_reservations') }}
@endsection
@section('header')
<!-- icheck -->
{!! Html::style(asset('modules/master/plugins/icheck-1.x/all.css')) !!}
<!-- dataTable -->
{{-- {!! Html::style(asset('modules/master/plugins/datatables/jquery.dataTables.min.css')) !!}
{!! Html::style(asset('modules/master/plugins/datatables/jquery.dataTables.min.css')) !!} --}}
@endsection
@section('content')
<section class="content-header">
    <h1>{{ __('home/sidebar.all_reservations') }} <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('\cpanel') }}"><i class="fa fa-dashboard"></i> {{ __('home/sidebar.HOME') }} </a></li>
        <li class="active"> {{ __('home/sidebar.all_reservations') }} </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            {{-- <h3 class="box-title">Title</h3> --}}
            <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-info"> <i
                    class="fa fa-user-plus"></i> {{ __('home/sidebar.add_reservation') }} </button>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

<div class="box-body">
    {{-- {!! Form::open(['route' => 'trips.search', 'method' => "POST"]) !!} --}}
    <form  role="form">

        {!! Form::hidden('filter', null, ['value' => "{{ old('filter') }}"]) !!}
<div class="row">

<div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                {!! Form::label('date_from', 'من تاريخ', ['class' => 'control-label']) !!}
                <div class="input-group">
                    {!! Form::date('date_from', null, ['id' => 'date_from', 'class' => "form-control  {{ $errors->has('date_from') ? ' is-invalid' : '' }}", 'value' => "{{ old('date_from') }}", 'autofocus']) !!}
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col col-xl-2 col-lg-2 col-md-2">
    <div class="bootstrap-timepicker">
        <div class="form-group">
            {!! Form::label('date_to', 'الى تاريخ', ['class' => 'control-label']) !!}
            <div class="input-group">
                {!! Form::date('date_to', null, ['id' => 'date_to', 'class' => "form-control  {{ $errors->has('date_to') ? ' is-invalid' : '' }}", 'value' => "{{ old('date_to') }}", 'autofocus']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!--    <div class="col col-xl-2 col-lg-2 col-md-2">
            <div class="form-group">
                {{-- {!! Form::label('price', 'سعر التذكرة', ['class' => 'control-label']) !!}
                {!! Form::text('price', null, ['id' => 'price', 'class' => "form-control  {{ $errors->has('price') ? ' is-invalid' : '' }}", 'value' => "{{ old('price') }}", 'autofocus']) !!} --}}
            </div>
        </div>
    -->

    <div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="form-group">
            {!! Form::label('pay_method', 'رقم العمــيل', ['class' => 'control-label']) !!}
            {!! Form::select('pay_method', getSelect('customer'), null, ['id' => 'pay_method', 'class' => "select2 form-control  {{ $errors->has('pay_method') ? ' is-invalid' : '' }}", 'value' => "{{ old('pay_method') }}"]) !!}
        </div>
    </div>

        <div class="col col-xl-2 col-lg-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('pay_method', 'طريقة الدفــع', ['class' => 'control-label']) !!}
                    {!! Form::select('pay_method', payMethod(), null, ['id' => 'pay_method', 'class' => "select2 form-control  {{ $errors->has('pay_method') ? ' is-invalid' : '' }}", 'value' => "{{ old('pay_method') }}"]) !!}
                </div>
            </div>

        <div class="col col-xl-3 col-lg-3 col-md-3">
            <div class="form-group">
                {!! Form::label('pay_method', 'الحالة', ['class' => 'control-label']) !!}
                {!! Form::select('pay_method', reservationStatus(), null, ['id' => 'pay_method', 'class' => "select2 form-control  {{ $errors->has('pay_method') ? ' is-invalid' : '' }}", 'value' => "{{ old('pay_method') }}"]) !!}
            </div>
        </div>

        <div class="col col-lg-1 col-md-1 col-sm-1 col-1">
                <div class="form-group m-t-25"><button href="#" class="btn btn-primary search-btn" type="submit">بحــث</button>
                </div>
        </div>
            </div>
           {!! Form::close() !!}
            <div class="table-responsive">
                {{-- <reservation></reservation> --}}
                <table id="table_id" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#id</th>
                            {{-- <th>{{ __('home/labels.cusromer') }}</th> --}}
                            <th>{{ __('home/labels.date') }}</th>
                            <th>{{ __('home/labels.trip_number') }}</th>
                            <th>{{ __('home/labels.departure_time') }}</th>
                            {{-- <th>{{ __('home/labels.company') }}</th> --}}
                            <th>{{ __('home/labels.seats_number') }}</th>
                            <th>{{ __('home/labels.status') }}</th>
                            {{-- <th>{{ __('home/labels.pay_method') }}</th> --}}
                            {{-- <th>{{ __('home/labels.user') }}</th> --}}
                            <th>{{ __('home/labels.options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            {{-- <td ><span data-toggle="tooltip" data-original-title="{{$reservation->customer->first_name .' '. $reservation->customer->last_name}}"></span></td> --}}
                            <td>{{ $reservation->trip->date }}</td>
                            <td ><span data-toggle="tooltip" data-original-title="{{$reservation->trip->fromStation->name .' - '. $reservation->trip->toStation->name}}"></span></td>
                            <td>{{ $reservation->trip->departure_time }}</td>
                            {{-- <td>{{ $reservation->trip->company->name }}</td> --}}
                            <td>{{ $reservation->passengers->count() }}</td>
                            <td>{{ reservationStatus()[$reservation->status] }}</td>
                            {{-- <td>{{ payMethod()[$reservation->pay_method] }}</td> --}}
                            {{-- <td>{{ $reservation->user->name }}</td> --}}
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="fa fa-ellipsis-h"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('reservations.show',  ['id' => $reservation->id]) }}">استعراض</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('reservations.edit',  ['id' => $reservation->id]) }}">تعديل</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ __('home/sidebar.contacts') }}</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" class="delete-confirm" href="{{ route('reservations.delete',['id' => $reservation->id]) }}">حذف</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="text-center">
                                    <p>لا توجد بيانات في هذا الجدول</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @include('reservation::reservations.add')
</section>
<!-- /.content -->

@stop
@section('footer')
<!-- icheck -->
{!! Html::script(asset('modules/master/plugins/icheck.min.js')) !!}
<!-- dataTable -->
{{-- {!! Html::script(asset('modules/master/plugins/datatables/jquery.dataTables.min.js')) !!}
{!! Html::script(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js')) !!} --}}
<script>

    $(document).ready(function () {
        /*
            For iCheck =====================================>
        */
        $("input").iCheck({
            checkboxClass: "icheckbox_square-red",
            radioClass: "iradio_square-yellow",
            increaseArea: "20%" // optional
        });

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
    });


</script>
@endsection



