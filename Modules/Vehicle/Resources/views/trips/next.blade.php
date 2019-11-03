@extends('adminCpanel.layouts.master')
@section('title')
{{ __('home/sidebar.next_trips') }}
@endsection
@section('header')
<!-- icheck -->
{!! Html::style(asset('modules/master/plugins/icheck-1.x/all.css')) !!}
<!-- dataTable -->
{!! Html::style(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.css')) !!}
{!! Html::style(asset('modules/master/plugins/datatables/jquery.dataTables.min.css')) !!}
@endsection
@section('content')
<section class="content-header">
    <h1>عــدد {{ __('home/sidebar.next_trips') }} {{$trips->count() }}</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('\adminCpanel') }}"><i class="fa fa-dashboard"></i> {{ __('home/sidebar.HOME') }} </a></li>
        <li class="active"> {{ __('home/sidebar.next_trips') }} </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
<div class="box box-info">
<div class="box-header with-border">
    {{-- <h3 class="box-title">Title</h3> --}}
    <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-info"> <i
            class="fa fa-user-plus"></i> {{ __('home/sidebar.add_trip') }} </button>
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
        <div class="form-group">
            {!! Form::label('from_station_id', 'المسار(من)', ['class' => 'control-label']) !!}
            {!! Form::select('from_station_id', getSelect('station'), null, ['id' => 'from_station_id', 'class' => "select2 form-control  {{ $errors->has('from_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('from_station_id') }}"]) !!}
        </div>
    </div>
    <div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="form-group">
            {!! Form::label('to_station_id', 'المسار(الي)', ['class' => 'control-label']) !!}
            {!! Form::select('to_station_id', getSelect('station'), null, ['id' => 'to_station_id', 'class' => "select2 form-control  {{ $errors->has('to_station_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('to_station_id') }}"]) !!}
        </div>
    </div>
<div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                {!! Form::label('date_from', 'من تاريخ', ['class' => 'control-label']) !!}
                <div class="input-group">
                    {!! Form::text('date_from', null, ['id' => 'date_from', 'class' => "form-control  {{ $errors->has('date_from') ? ' is-invalid' : '' }}", 'value' => "{{ old('date_from') }}", 'autofocus']) !!}
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
                {!! Form::text('date_to', null, ['id' => 'date_to', 'class' => "form-control  {{ $errors->has('date_to') ? ' is-invalid' : '' }}", 'value' => "{{ old('date_to') }}", 'autofocus']) !!}
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
        <div class="col col-xl-2 col-lg-3 col-md-3">
                <div class="form-group">
                    {!! Form::label('company_id', 'الشركة', ['class' => 'control-label']) !!}
                    {!! Form::select('company_id', getSelect('company'), null, ['id' => 'company_id', 'class' => "select2 form-control  {{ $errors->has('company_id') ? ' is-invalid' : '' }}", 'value' => "{{ old('company_id') }}"]) !!}
                </div>
            </div>
                
        <div class="col col-lg-1 col-md-1 col-sm-1 col-1">
                <div class="form-group m-t-25"><button href="#" class="btn btn-primary search-btn" type="submit">بحــث</button>
                </div>            
        </div>
            </div>
           {!! Form::close() !!}
            <div class="table-responsive">
                <table id="table_id" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#number</th>
                            <th>{{ __('home/labels.date') }}</th>
                            <th>{{ __('home/labels.departure_time') }}</th>
                            <th>{{ __('home/labels.available_seat') }}</th>
                            <th>{{ __('home/labels.ticket_price') }}</th>
                            <th>{{ __('home/labels.company') }}</th>
                            <th>{{ __('home/labels.from') }}</th>
                            <th>{{ __('home/labels.to') }}</th>
                            <th>{{ __('home/labels.status') }}</th>
                            <th>{{ __('home/labels.options') }}</th>
                        </tr>
                    </thead>
                    <tbody>      
                        @forelse($trips as $trip)
                        <tr>
                            <td>{{ $trip->number }}</td>
                            <td>{{ $trip->date }}</td>
                            <td>{{ $trip->departure_time }}</td>
                            <td>{{ $trip->arrive_time }}</td>
                            <td>{{ $trip->price }}</td>
                            <td>{{ $trip->company->name }}</td>
                            <td>{{ $trip->fromStation->name }}</td>
                            <td>{{ $trip->toStation->name }}</td>
                            <td>{{ tripStatus()[$trip->status] }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="fa fa-ellipsis-h"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('trips.show',  ['id' => $trip->id]) }}">استعراض</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('trips.edit',  ['id' => $trip->id]) }}">تعديل</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ __('home/sidebar.contacts') }}</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" class="delete-confirm" href="{{ route('trips.delete',['id' => $trip->id]) }}">حذف</a></li>
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
    @include('vehicle::trips.add')
</section>
<!-- /.content -->

@stop
@section('footer')
<!-- icheck -->
{!! Html::script(asset('modules/master/plugins/icheck.min.js')) !!}
<!-- dataTable -->
{!! Html::script(asset('modules/master/plugins/datatables/jquery.dataTables.min.js')) !!}
{!! Html::script(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js')) !!}
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



    });

</script>
@endsection



