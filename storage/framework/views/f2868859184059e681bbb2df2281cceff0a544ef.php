<?php $__env->startSection('title'); ?>
<?php echo e(__('home/sidebar.settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<!-- icheck -->
<?php echo Html::style(asset('modules/master/plugins/icheck-1.x/all.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1><?php echo e(__('home/sidebar.settings')); ?> <small>it all starts here</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('\cpanel')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('home/sidebar.HOME')); ?> </a></li>
        <li class="active"> <?php echo e(__('home/sidebar.settings')); ?> </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        <div class="box-header with-border">
            
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
          <?php echo Form::open(['route' => ['site-setting-update'], 'method' => "POST", 'file' => true]); ?>

          <?php $__currentLoopData = $stieSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
              <div class="row">
                <label for="<?php echo e($setting->name_setting); ?>" class="col-sm-12 col-form-label text-md-right"><?php echo e($setting->slug); ?></label>
                <div class="col-md-6 col-sm-12">
                  <?php if($setting->type == 1): ?>
                    <?php echo Form::text($setting->name_setting, $setting->value, ['id' => '<?php echo e($setting->name_setting); ?>', 'class' => "form-control <?php echo e($errors->has($setting->name_setting) ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old($setting->name_setting)); ?>", 'autofocus']); ?>

                  <?php elseif($setting->type == 0): ?>
                    <?php echo Form::textarea($setting->name_setting, $setting->value, ['id' => '<?php echo e($setting->name_setting); ?>', 'class' => "form-control <?php echo e($errors->has($setting->name_setting) ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old($setting->name_setting)); ?>", 'autofocus']); ?>

                  <?php elseif($setting->type == 3): ?>
                    <?php echo Form::select($setting->name_setting, getSettingSelect($setting->name_setting), null, ['placeholder' => $setting->slug, 'class' => "form-control <?php echo e($errors->has($setting->name_setting) ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old($setting->name_setting)); ?>", 'required']); ?>

                  <?php else: ?>
                    <?php echo Form::file($setting->name_setting, ['id' => '<?php echo e($setting->name_setting); ?>', 'class' => "form-control <?php echo e($errors->has($setting->name_setting) ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old($setting->name_setting)); ?>", 'autofocus']); ?>

                  <?php endif; ?>
                  <?php if($errors->has($setting->name_setting)): ?>
                    <span class="invalid-feedback">
                      <strong><?php echo e($errors->first($setting->name_setting)); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button name="submit" type="submit" class="btn btn-primary delete-confirm">
                Save Settings
              </button>
            </div>
          </div>
          <?php echo Form::close(); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            العدد الكلي: 
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<!-- icheck -->
<?php echo Html::script(asset('modules/master/plugins/icheck.min.js')); ?>

<script>
    $(document).ready(function () {
        $("input").iCheck({
            checkboxClass: "icheckbox_square-red",
            radioClass: "iradio_square-yellow",
            increaseArea: "20%" // optional
        });
    });

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('cpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Setting/Providers/../Resources/views/settings/index.blade.php ENDPATH**/ ?>