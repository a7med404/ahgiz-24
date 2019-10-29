<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_customers')); ?>

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
    <h1><?php echo e(__('home/sidebar.all_customers')); ?> <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\adminCpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.all_customers')); ?> </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            
            <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-info"> <i
                    class="fa fa-user-plus"></i> <?php echo e(__('home/sidebar.add_customer')); ?> </button>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col col-xl-2 col-lg-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('gender', 'المسار(الي)', ['class' => 'control-label']); ?>

                    <?php echo Form::select('gender', getSelect('station'), null, ['id' => 'gender', 'class' => "select2
                    form-control <?php echo e($errors->has('gender') ? ' is-invalid' : ''); ?>", 'data-column' => '0', 'value' =>
                    "<?php echo e(old('gender')); ?>"]); ?>

                </div>
            </div>
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th><?php echo e(__('home/labels.name')); ?></th>
                            <th><?php echo e(__('home/labels.phone_number')); ?></th>
                            <th><?php echo e(__('home/labels.gender')); ?></th>
                            <th><?php echo e(__('home/labels.his_reservation')); ?></th>
                            <th><?php echo e(__('home/labels.options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th><?php echo e(__('home/labels.name')); ?></th>
                            <th><?php echo e(__('home/labels.phone_number')); ?></th>
                            <th><?php echo e(__('home/labels.gender')); ?></th>                            
                            <th><?php echo e(__('home/labels.his_reservation')); ?></th>
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
    <?php echo $__env->make('customer::customers.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<!-- icheck -->
<?php echo Html::script(asset('modules/master/plugins/icheck.min.js')); ?>

<!-- dataTable -->
<?php echo Html::script(asset('modules/master/plugins/datatables/jquery.dataTables.min.js')); ?>

<?php echo Html::script(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js')); ?>


<script type="text/javascript">
    var lastIdx = null;

        $('#data thead th').each( function () {
            if($(this).index() < 3 ){
                var classname = $(this).index() == 2  ?  'date' : 'dateslash';
                var title = $(this).html();
                if($(this).index() == 0 ){
                    $(this).html( '<input type="text" style="max-width:70px;" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
                }else{
                    $(this).html( '<input type="text" style="max-width:200px;" class="' + classname + '" data-value="'+ $(this).index() +'"placeholder=" البحث '+title+'" />' );
                }
            }else if($(this).index() == 3){
                $(this).html( '<select class="select2 form-control"><option value="0"> عضو </option><option value="1"> مدير الموقع </option></select>' );
            }
        });

        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            select: true,
            ajax: '<?php echo route('customers-dataTables'); ?>',
            columns: [
                { data: 'id', name: 'id'},
                { data: 'c_name', name: 'c_name' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'gender', name: 'gender', orderable: false },                
                { data: 'his_reservation', name: 'his_reservation', orderable: false },
                { data: 'options', name: 'options', orderable: false },
                // { data: 'created_at', name: 'created_at'},
            ],
            "language": {
                "url": "<?php echo e(asset('modules/master/data/Arabic.json')); ?>"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            'searchDelay' : 3500,
    
            bAutoWidth: false,
            // aoColumns : [
            // { sWidth: '15%' },
            // { sWidth: '15%' },
            // { sWidth: '15%' },
            // { sWidth: '15%' },
            // { sWidth: '10%' }
            // ],
            aLengthMenu: [
                [10, 25, 50, 100, 200, -1],
                [10, 25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 10,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible",
                    }
                ],

                "sSwfPath": "<?php echo e(asset('modules/master/data/copy_csv_xls_pdf.swf')); ?>"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
                {
                    var r = $('#data tfoot tr');
                    r.find('th').each(function(){
                        $(this).css('padding', 8);
                    });
                    $('#data thead').append(r);
                    $('#search_0').css('text-align', 'center');
                }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table.column(colIdx).search(this.value).draw();
            });
        });

        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table.column(colIdx).search(this.value).draw();
            });
            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        // table.columns().flatten().each( function ( colIdx ) {
        //     // Create the select list and search operation
        //     var select = $('<select />')
        //         .appendTo(
        //             table.column(colIdx).footer()
        //         )
        //         .on( 'change', function () {
        //             table
        //                 .column( colIdx )
        //                 .search( $(this).val() )
        //                 .draw();
        //         } );
        
        //     // Get the search data for the first column and add to the select list
        //     table
        //         .column( colIdx )
        //         .cache( 'search' )
        //         .sort()
        //         .unique()
        //         .each( function ( d ) {
        //             select.append( $('<option value="'+d+'">'+d+'</option>') );
        //         } );
        // } );

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
<?php echo $__env->make('adminCpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Customer/Providers/../Resources/views/customers/index3.blade.php ENDPATH**/ ?>