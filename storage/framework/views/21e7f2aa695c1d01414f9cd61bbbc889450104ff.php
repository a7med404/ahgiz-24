<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_reservations')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<!-- icheck -->
<?php echo Html::style(asset('modules/master/plugins/icheck-1.x/all.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1><?php echo e(__('home/sidebar.all_reservations')); ?> <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\cpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li><a href="<?php echo e(url('\cpanel\reservations')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.all_reservations')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.edit_reservation')); ?> <?php echo e($planereservationsInfo->name); ?> </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('home/sidebar.edit_reservation')); ?></h3>
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
                    <?php echo Form::model($planereservationsInfo, ['route' => ['planeReservations.update', $planereservationsInfo->id], 'method' => "PATCH", 'files' => true]); ?>

                    <?php echo $__env->make('reservation::planereservation.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
    
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<!-- icheck -->
<?php echo Html::script(asset('modules/master/plugins/icheck.min.js')); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Reservation/Providers/../Resources/views/planereservation/edit.blade.php ENDPATH**/ ?>