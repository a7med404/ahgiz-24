<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_reservations')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<!-- icheck -->
<?php echo Html::style(asset('modules/master/plugins/icheck-1.x/all.css')); ?>

<!-- dataTable -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1><?php echo e(__('home/sidebar.all_reservations')); ?> <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\adminCpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.all_reservations')); ?> </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            
            <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-info"> <i
                    class="fa fa-user-plus"></i> <?php echo e(__('home/sidebar.add_reservation')); ?> </button>
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
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <?php echo Form::label('date_from', 'من تاريخ', ['class' => 'control-label']); ?>

                <div class="input-group">
                    <?php echo Form::date('date_from', null, ['id' => 'date_from', 'class' => "form-control  <?php echo e($errors->has('date_from') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('date_from')); ?>", 'autofocus']); ?>

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
                <?php echo Form::date('date_to', null, ['id' => 'date_to', 'class' => "form-control  <?php echo e($errors->has('date_to') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('date_to')); ?>", 'autofocus']); ?>

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

    <div class="col col-xl-2 col-lg-2 col-md-2">
        <div class="form-group">
            <?php echo Form::label('pay_method', 'رقم العمــيل', ['class' => 'control-label']); ?>

            <?php echo Form::select('pay_method', getSelect('customer'), null, ['id' => 'pay_method', 'class' => "select2 form-control  <?php echo e($errors->has('pay_method') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('pay_method')); ?>"]); ?>

        </div>
    </div>

        <div class="col col-xl-2 col-lg-2 col-md-2">
                <div class="form-group">
                    <?php echo Form::label('pay_method', 'طريقة الدفــع', ['class' => 'control-label']); ?>

                    <?php echo Form::select('pay_method', payMethod(), null, ['id' => 'pay_method', 'class' => "select2 form-control  <?php echo e($errors->has('pay_method') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('pay_method')); ?>"]); ?>

                </div>
            </div>

        <div class="col col-xl-3 col-lg-3 col-md-3">
            <div class="form-group">
                <?php echo Form::label('pay_method', 'الحالة', ['class' => 'control-label']); ?>

                <?php echo Form::select('pay_method', reservationStatus(), null, ['id' => 'pay_method', 'class' => "select2 form-control  <?php echo e($errors->has('pay_method') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('pay_method')); ?>"]); ?>

            </div>
        </div>

        <div class="col col-lg-1 col-md-1 col-sm-1 col-1">
                <div class="form-group m-t-25"><button href="#" class="btn btn-primary search-btn" type="submit">بحــث</button>
                </div>
        </div>
            </div>
           <?php echo Form::close(); ?>

            <div class="table-responsive">
                
                <table id="table_id" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#id</th>
                            
                            <th><?php echo e(__('home/labels.date')); ?></th>
                            <th><?php echo e(__('home/labels.trip_number')); ?></th>
                            <th><?php echo e(__('home/labels.departure_time')); ?></th>
                            
                            <th><?php echo e(__('home/labels.seats_number')); ?></th>
                            <th><?php echo e(__('home/labels.status')); ?></th>
                            
                            
                            <th><?php echo e(__('home/labels.options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($reservation->id); ?></td>
                            
                            <td><?php echo e($reservation->trip->date); ?></td>
                            <td ><span data-toggle="tooltip" data-original-title="<?php echo e($reservation->trip->fromStation->name .' - '. $reservation->trip->toStation->name); ?>"></span></td>
                            <td><?php echo e($reservation->trip->departure_time); ?></td>
                            
                            <td><?php echo e($reservation->passengers->count()); ?></td>
                            <td><?php echo e(reservationStatus()[$reservation->status]); ?></td>
                            
                            
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="fa fa-ellipsis-h"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(route('reservations.show',  ['id' => $reservation->id])); ?>">استعراض</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(route('reservations.edit',  ['id' => $reservation->id])); ?>">تعديل</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><?php echo e(__('home/sidebar.contacts')); ?></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" class="delete-confirm" href="<?php echo e(route('reservations.delete',['id' => $reservation->id])); ?>">حذف</a></li>
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
    <?php echo $__env->make('reservation::reservations.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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




<?php echo $__env->make('adminCpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Reservation/Providers/../Resources/views/reservations/index.blade.php ENDPATH**/ ?>