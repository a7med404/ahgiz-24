<?php if($errors->any()): ?>
    <script>
        toastr.options = {
            "hideDuration": "5000",
        }
      </script>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            toastr.error("<?php echo e($error); ?>","Error")
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/resources/views/cpanel/partials/errors.blade.php ENDPATH**/ ?>