<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_previous_trips')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_previous_trips')); ?>

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
<h1> عــدد <?php echo e(__('home/sidebar.all_previous_trips')); ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\adminCpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.all_previous_trips')); ?> </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
<div class="box box-info">
<div class="box-header with-border">
    
    
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
            title="Remove"><i class="fa fa-times"></i></button>
    </div>
</div>
        <div class="box-body">
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
            ajax: '<?php echo route('previous-dataTables'); ?>',
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

<?php echo $__env->make('adminCpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('adminCpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Vehicle/Providers/../Resources/views/trips/previous.blade.php ENDPATH**/ ?>