<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_planeReservations')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<!-- icheck -->
<?php echo Html::style(asset('modules/master/plugins/icheck-1.x/all.css')); ?>

<!-- dataTable -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1><?php echo e(__('home/sidebar.all_planeReservations')); ?> <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\cpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.all_planeReservations')); ?> </li>
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
                
                <table id="table_id" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#id</th>
                            
                            <th><?php echo e(__('home/labels.company_name')); ?></th>
                            <th><?php echo e(__('home/labels.date')); ?></th>
                            
                            <th><?php echo e(__('home/labels.from')); ?></th> 

                            <th><?php echo e(__('home/labels.to')); ?></th> 
                            <th><?php echo e(__('home/labels.status')); ?></th>
                            
                            
                            <th><?php echo e(__('home/labels.options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>      
                        <?php $__empty_1 = true; $__currentLoopData = $planereservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planereservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($planereservation->id); ?></td>
                            <td><?php echo e($planereservation->company->name); ?></td>
                            
                            <td><?php echo e($planereservation->date); ?></td>
                            <td><?php echo e($planereservation->fromStation->name); ?></td>
                            <td><?php echo e($planereservation->toStation->name); ?></td>
                            
                            <td><?php echo e(reservationStatus()[$planereservation->status]); ?></td>
                            
                            
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="fa fa-ellipsis-h"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#}">استعراض</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(route('planeReservations.edit',  ['id' => $planereservation->id])); ?>">تعديل</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><?php echo e(__('home/sidebar.contacts')); ?></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" class="delete-confirm" href="<?php echo e(route('planeReservations.delete',['id' => $planereservation->id])); ?>">حذف</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7">
                                <div class="text-center">
                                    <p>لا توجد بيانات في هذا الجدول</p>
                                </div>
                            </td>
                        </tr>   
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <?php echo $__env->make('reservation::planereservation.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<!-- icheck -->
<?php echo Html::script(asset('modules/master/plugins/icheck.min.js')); ?>

<!-- dataTable -->

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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('cpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Reservation/Providers/../Resources/views/planereservation/index.blade.php ENDPATH**/ ?>