<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.all_users')); ?>

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
    <h1><?php echo e($userInfo->name); ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\adminCpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.all_users')); ?> </li>
    </ol>
</section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo e(__('home/labels.name')); ?></strong>
              <p class="text-muted"><?php echo e($userInfo->name); ?></p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo e(__('home/labels.phone_number')); ?></strong>
              <p class="text-muted"><?php echo e($userInfo->phone_number); ?></p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo e(__('home/labels.email')); ?></strong>
              <p class="text-muted"><?php echo e($userInfo->email); ?></p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo e(__('home/labels.gender')); ?></strong>
              <p class="text-muted"><?php echo e($userInfo->gender); ?></p>
              <hr>
              <strong><i class="fa fa-pencil margin-r-5"></i> خطوط العمل </strong>
              <p>
                <?php $__currentLoopData = $userInfo->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="label label-info"><?php echo e($role->display_name); ?> </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </p>
              <hr>
              <strong><i class="fa fa-book margin-r-5"></i> <?php echo e(__('home/labels.note')); ?></strong>
              <p class="text-muted"> <?php echo e($userInfo->note); ?> </p>
              
              <a href="<?php echo e(route('users.edit',  ['id' => $userInfo->id])); ?>" class="btn btn-primary btn-block"><b>تعديل بيانات الشركة</b></a>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#address" data-toggle="tab">عنوان الشركة (المكاتب)</a></li>
              <li><a href="#contact" data-toggle="tab">بيانات الاتصال</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="address">
                <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-info"> <i class="fa fa-user-plus"></i> اضافة عنوان جديد </button>
                <hr>
                <div class="row">
                  <?php $__currentLoopData = $userInfo->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-4">
                    <div class="box box-success box-shadow">
                      <div class="box-header with-border">
                        <h3 class="box-title"><?php echo e(getSelect('cities')[$address->city]); ?> <i class="fa fa-map-marker"></i> </h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>
                      <div class="box-body">
                        <?php echo e(getSelect('cities')[$address->city]); ?> / 
                        <?php echo e(getSelect('sub_cities')[$address->local]); ?> / 
                        <?php echo e($address->street_2); ?> / 
                        <?php echo e($address->street_1); ?> / 
                        <?php echo e($address->number); ?> 
                      </div>
                      <div class="box-footer">
                        <a type="button" class="btn btn-box-tool pull-left delete-confirm" href="<?php echo e(route('addresses.delete',  ['id' => $address->id])); ?>"><i class="fa fa-times"></i></a>
                        <a type="button" class="btn btn-box-tool pull-left" href="<?php echo e(route('addresses.edit',  ['id' => $address->id])); ?>"><i class="fa fa-pencil"></i></a>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>

              <div class="tab-pane " id="contact">
                <button type="button" data-toggle="modal" data-target="#popup-form-contact" href="#" class="btn btn-info"> <i class="fa fa-user-plus"></i> اضافة جهة اتصال </button>
                <hr>
                <div class="row">
                  <?php $__currentLoopData = $userInfo->contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-4">
                    <div class="box box-success box-shadow">
                      <div class="box-header with-border">
                        <h3 class="box-title"> بيانات الاتصال <i class="fa fa-map-marker"></i> </h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                      </div>
                      <div class="box-body">
                        <?php echo e($contact->number_1); ?> / 
                        <?php echo e($contact->number_2); ?> / 
                        <?php echo e($contact->email); ?> / 
                        <?php echo e($contact->note); ?> 
                      </div>
                      <div class="box-footer">
                        <a type="button" class="btn btn-box-tool pull-left delete-confirm" href="<?php echo e(route('contacts.delete',  ['id' => $contact->id])); ?>"><i class="fa fa-times"></i></a>
                        <a type="button" class="btn btn-box-tool pull-left" href="<?php echo e(route('contacts.edit',  ['id' => $contact->id])); ?>"><i class="fa fa-pencil"></i></a>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php echo $__env->make('address::addresses.add', ['userInfo' => $userInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('address::contacts.add', ['userInfo' => $userInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<!-- icheck -->
<?php echo Html::script(asset('modules/master/plugins/icheck.min.js')); ?>

<!-- dataTable -->
<?php echo Html::script(asset('modules/master/plugins/datatables/jquery.dataTables.min.js')); ?>

<?php echo Html::script(asset('modules/master/plugins/datatables/dataTables.bootstrap.min.js')); ?>

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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('adminCpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/User/Providers/../Resources/views/users/show.blade.php ENDPATH**/ ?>