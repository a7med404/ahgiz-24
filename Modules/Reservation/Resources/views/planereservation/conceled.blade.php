@extends('adminCpanel.layouts.master')
@section('title')
{{ __('home/sidebar.conceled') }}
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
    <h1>{{ __('home/sidebar.conceled') }} <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('\adminCpanel') }}"><i class="fa fa-dashboard"></i> {{ __('home/sidebar.HOME') }} </a></li>
        <li class="active"> {{ __('home/sidebar.conceled') }} </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="table-responsive">
                {{-- <reservation></reservation> --}}
                <table id="table_id" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#id</th>
                            {{-- <th>{{ __('home/labels.cusromer') }}</th> --}}
                            <th>{{ __('home/labels.company_name') }}</th>
                            <th>{{ __('home/labels.from_date') }}</th>
                            <th>{{ __('home/labels.to_date') }}</th>
                            <th>{{ __('home/labels.from') }}</th>
                            <th>{{ __('home/labels.to') }}</th>
                            <th>{{ __('home/labels.status') }}</th>
                            <th>{{ __('home/labels.note') }}</th>

                            <th>{{ __('home/labels.options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($planereservations as $planereservation)
                        <tr>
                            <td>{{ $planereservation->id }}</td>
                            <td>{{ $planereservation->company->name }}</td>
                            {{-- <td ><span data-toggle="tooltip" data-original-title="{{$reservation->customer->first_name .' '. $reservation->customer->last_name}}"></span></td> --}}
                            <td>{{ $planereservation->fom_date }}</td>
                            <td>{{ $planereservation->to_date}}</td>
                            <td>{{ $planereservation->fromStation->name }}</td>
                            <td>{{ $planereservation->toStation->name }}</td>
                            {{-- <td>{{ $reservation->trip->company->name }}</td> --}}
                            <td class="{{ toggleStatus()[$planereservation->status] }}">{{ reservationStatus()[$planereservation->status] }}</td>
                            <td>{{ $planereservation->note}}</td>

                            {{-- <td>{{ payMethod()[$reservation->pay_method] }}</td> --}}
                            {{-- <td>{{ $reservation->user->name }}</td> --}}
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="fa fa-ellipsis-h"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#}">استعراض</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('planeReservations.edit',  ['id' => $planereservation->id]) }}">تعديل</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ __('home/sidebar.contacts') }}</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" class="delete-confirm" href="{{ route('planeReservations.delete',['id' => $planereservation->id]) }}">حذف</a></li>
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
    });

</script>
@endsection



