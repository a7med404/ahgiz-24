<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_trips')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<!-- icheck -->
<?php echo Html::style(asset('modules/master/plugins/icheck-1.x/all.css')); ?>

<!-- dataTable -->
<?php echo Html::style(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.css')); ?>

<?php echo Html::style(asset('modules/master/plugins/datatables/jquery.dataTables.min.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1><?php echo e(__('home/sidebar.all_trips')); ?> <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\cpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.all_trips')); ?> </li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
<div class="box box-info">
<div class="box-header with-border">
    
    <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-info"> <i
            class="fa fa-user-plus"></i> <?php echo e(__('home/sidebar.add_trip')); ?> </button>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
            title="Remove"><i class="fa fa-times"></i></button>
    </div>
</div>
<div class="box-body">
        
        <form  role="form">

        <?php echo Form::hidden('filter', null, ['value' => "<?php echo e(old('filter')); ?>"]); ?>

<div class="row">
    <div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="form-group">
            <?php echo Form::label('from_station_id', 'المسار(من)', ['class' => 'control-label']); ?>

            <?php echo Form::select('from_station_id', getSelect('station'), null, ['id' => 'from_station_id', 'class' => "select2 form-control  <?php echo e($errors->has('from_station_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('from_station_id')); ?>"]); ?>

        </div>
    </div>
    <div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="form-group">
            <?php echo Form::label('to_station_id', 'المسار(الي)', ['class' => 'control-label']); ?>

            <?php echo Form::select('to_station_id', getSelect('station'), null, ['id' => 'to_station_id', 'class' => "select2 form-control  <?php echo e($errors->has('to_station_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('to_station_id')); ?>"]); ?>

        </div>
    </div>
    <div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <?php echo Form::label('date_from', 'من تاريخ', ['class' => 'control-label']); ?>

                <div class="input-group">
                    <?php echo Form::text('date_from', null, ['id' => 'date_from', 'class' => "form-control  <?php echo e($errors->has('date_from') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('date_from')); ?>", 'autofocus']); ?>

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
                <?php echo Form::label('date_to', 'الى تاريخ', ['class' => 'control-label']); ?>

                <div class="input-group">
                    <?php echo Form::text('date_to', null, ['id' => 'date_to', 'class' => "form-control  <?php echo e($errors->has('date_to') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('date_to')); ?>", 'autofocus']); ?>

                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 

<!--    <div class="col col-xl-2 col-lg-2 col-md-2">
            <div class="form-group">
                
            </div>
        </div>
    -->
        <div class="col col-xl-2 col-lg-3 col-md-3">
                <div class="form-group">
                    <?php echo Form::label('company_id', 'الشركة', ['class' => 'control-label']); ?>

                    <?php echo Form::select('company_id', getSelect('company'), null, ['id' => 'company_id', 'class' => "select2 form-control  <?php echo e($errors->has('company_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('company_id')); ?>"]); ?>

                </div>
            </div>
                
        <div class="col col-lg-1 col-md-1 col-sm-1 col-1">
                <div class="form-group m-t-25"><button href="#" class="btn btn-primary search-btn" type="submit">بحــث</button>
                </div>            
        </div>
            </div>
           <?php echo Form::close(); ?>

            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                                <th>#ID</th>
                            <th><?php echo e(__('home/labels.date')); ?></th>
                            <th><?php echo e(__('home/labels.departure_time')); ?></th>
                            <th><?php echo e(__('home/labels.available_seat')); ?></th>
                            <th><?php echo e(__('home/labels.ticket_price')); ?></th>
                            <th><?php echo e(__('home/labels.company')); ?></th>
                            <th><?php echo e(__('home/labels.from')); ?></th>
                            <th><?php echo e(__('home/labels.to')); ?></th>
                            <th><?php echo e(__('home/labels.status')); ?></th>
                            <th><?php echo e(__('home/labels.options')); ?></th>
                        </tr>

                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th><?php echo e(__('home/labels.date')); ?></th>
                            <th><?php echo e(__('home/labels.departure_time')); ?></th>
                            <th><?php echo e(__('home/labels.available_seat')); ?></th>
                            <th><?php echo e(__('home/labels.ticket_price')); ?></th>
                            <th><?php echo e(__('home/labels.company')); ?></th>
                            <th><?php echo e(__('home/labels.from')); ?></th>
                            <th><?php echo e(__('home/labels.to')); ?></th>
                            <th><?php echo e(__('home/labels.status')); ?></th>
                            <th><?php echo e(__('home/labels.options')); ?></th>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    <?php echo $__env->make('vehicle::stations.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<!-- icheck -->
<?php echo Html::script(asset('modules/master/plugins/icheck.min.js')); ?>

<!-- dataTable -->
<?php echo Html::script(asset('modules/master/plugins/datatables/jquery.dataTables.min.js')); ?>

<?php echo Html::script(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js')); ?>

<?php echo Html::script('https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js'); ?>

<?php echo Html::script('https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js'); ?>

<?php echo Html::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'); ?>

<?php echo Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'); ?>

<?php echo Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'); ?>

<?php echo Html::script('https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js'); ?>

<?php echo Html::script('https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js'); ?>

<script type="text/javascript">
    var lastIdx = null;

        $('#data tfoot th').each( function () {
            if($(this).index() < 9){
                var classname = $(this).index() == 9  ?  'filter-select' : 'filter-input';
                var title = $(this).html();
                if($(this).index() == 0 || $(this).index() == 7 || $(this).index() ==  6 ){
                    $(this).html( '<input type="text" style="max-width:70px;" data-column="'+ $(this).index() +'" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
                }else{
                    $(this).html( '<input type="text" style="max-width:180px;" data-column="'+ $(this).index() +'" class="' + classname + '" data-value="'+ $(this).index() +'"placeholder=" البحث '+title+'" />' );
                }
            }
        });

        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            select: true,
            ajax: '<?php echo route('trip-dataTables'); ?>',
            columns: [
                { data: 'id', name: 'id', "width": "10%"},
                { data: 'date', name: 'date', "width": "15%" },
                { data: 'departure_time', name: 'departure_time', "width": "10%"},
                { data: 'seats_number', name: 'seats_number', "width": "10%"},
                { data: 'price', name: 'price', "width": "20%" },
                { data: 'company_id', name: 'company_id', "width": "20%" },
                { data: 'from_station_id', name: 'from_station_id', "width": "10%"},
                { data: 'to_station_id', name: 'to_station_id', "width": "10%"},
                { data: 'status', name: 'status', "width": "10%"},
                { data: 'options', name: 'options', orderable: false, "width": "10%"},
            ],
            "language": {
                "url": "<?php echo e(asset('modules/master/data/Arabic.json')); ?>"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            'searchDelay' : 350,
            bAutoWidth: false,
            aLengthMenu: [
                [10, 25, 50, 100, 200, -1],
                [10, 25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 10,
            fixedHeader: true,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    title: 'Test Data export',
                    exportOptions: {columns: "thead th:not(.noExport)"}
                },
                {
                    extend: 'excel',
                    title: 'Test Data export',
                    exportOptions: {columns: "thead th:not(.noExport)"}
                },
                {
                    extend: 'print',
                    title: 'Test Data export',
                    exportOptions: {columns: "thead th:not(.noExport)"}

                },
                {
                    extend: 'csv',
                    title: 'Test Data export',
                    exportOptions: {columns: "thead th:not(.noExport)"}
                },
                {
                    extend: 'copy',
                    title: 'Test copy export',
                    exportOptions: {columns: "thead th:not(.noExport)"}
                }
            ],
            initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        $('.filter-select').change(function(){
            table.column($(this).data('column'))
            .search($(this).val())
            .draw();

        });

        $('.filter-input').keyup(function(){
            table.column($(this).data('column'))
            .search($(this).val())
            .draw();
        });


        $('#data tbody').on( 'mouseover', 'td', function () {
            var colIdx = table.cell(this).index().column;
            if ( colIdx !== lastIdx ) {
                $( table.cells().nodes() ).removeClass( 'highlight' );
                $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
            }
        })
        .on( 'mouseleave', function () {
            $( table.cells().nodes() ).removeClass( 'highlight' );
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminCpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Vehicle/Providers/../Resources/views/trips/index.blade.php ENDPATH**/ ?>