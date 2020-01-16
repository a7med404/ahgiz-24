
        <?php if(Session::has('flash_massage')): ?>
          <?php echo e($i = Session::get('flash_massage_type')); ?>

          <?php switch($i):
              case (1): ?>
              <script>

                $(function () {
                    swal({
                        title: "Good job!",
                        text: "<?php echo e(Session::get('flash_massage')); ?>",
                        icon: "success",
                        button: "Ok",
                    });
                });

                //   toastr.success("<?php echo e(Session::get('flash_massage')); ?>","Sccess")
              </script>
                  <?php break; ?>
              <?php case (2): ?>
              <script>
                  toastr.info("<?php echo e(Session::get('flash_massage')); ?>","info")
              </script>
                  <?php break; ?>
              <?php case (3): ?>
              <script>
                  toastr.warning("<?php echo e(Session::get('flash_massage')); ?>","warning")
              </script>
                  <?php break; ?>
              <?php default: ?>
              <script>
                  toastr.error("<?php echo e(Session::get('flash_massage')); ?>","error")
              </script>
          <?php endswitch; ?>
        <?php endif; ?><?php /**PATH C:\xampp\htdocs\ahgiz-24\Modules\Website\Providers/../Resources/views/partials/toastr.blade.php ENDPATH**/ ?>