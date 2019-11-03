@extends('adminCpanel.layouts.master')
@section('title')
{{ __('home/sidebar.all_customers') }}
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
    <h1>{{ __('home/sidebar.all_customers') }} <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('\adminCpanel') }}"><i class="fa fa-dashboard"></i> {{ __('home/sidebar.HOME') }} </a></li>
        <li class="active"> {{ __('home/sidebar.all_customers') }} </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            {{-- <h3 class="box-title">Title</h3> --}}
            <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-info"> <i
                    class="fa fa-user-plus"></i> {{ __('home/sidebar.add_customer') }} </button>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="customers-table" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>{{ __('home/labels.name') }}</th>
                            <th>{{ __('home/labels.phone_number') }}</th>
                            <th>{{ __('home/labels.his_reservation') }}</th>
                            <th>{{ __('home/labels.options') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{-- العدد الكلي: {{$customers->count()}} --}}
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    @include('customer::customers.add')
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

        $(function() {
            $('#customers-table').DataTable({
                processing: true,
                serverSide: true,      
                responsive: true,          
                searching: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                // initComplete: alert("Table Draw Callback"),
                ajax: '{!! route('customers-dataTables') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'c_name', name: 'c_name' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'his_reservation', name: 'his_reservation' },                    
                    { data: 'options', name: 'options' },
                    // {
                    //     "className": 'details-control',
                    //     "orderable": false,
                    //     "searchable": false,
                    //     "data": null,
                    //     "defaultContent": ''
                    // },
                ],
                order: [[0, 'asc']]
            });
        });
        

    });

</script>
@endsection