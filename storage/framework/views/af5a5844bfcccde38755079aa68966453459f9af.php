<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo e(getSetting('description')); ?>">
    <meta name="author" content="ahmed Ibrahim">
    <meta name="keyword" content="<?php echo e(getSetting('keyWord')); ?>">
    <link rel="icon" href="<?php echo e(asset('admin/images/visa.png')); ?>" type="image/ico" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(getSetting()); ?> || <?php echo $__env->yieldContent('title'); ?> </title>
    <?php echo $__env->make('website::partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('header'); ?>
  </head>
  
  <body>
    <div class="start-page" role="main" id="app">
      <header class="header" id="header">
        <?php echo $__env->make('website::partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('slider-content'); ?>
      </header>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
      <!-- /.content-wrapper -->
      <?php echo $__env->make('website::partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- ./wrapper -->

    <?php echo $__env->make('website::partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('footer'); ?> 
      <script>
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        language: 'ar',
        rtl: true,
        startDate: 'toDay',
        format: 'yyyy-mm-dd'
      });
      
      $('.selectpicker').selectpicker();

      </script>
    <?php echo $__env->make('website::partials.toastr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('website::partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>

<?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Website/Providers/../Resources/views/layouts/master.blade.php ENDPATH**/ ?>