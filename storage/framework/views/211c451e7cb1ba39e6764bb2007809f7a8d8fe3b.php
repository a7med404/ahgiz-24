<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('reservation.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('reservation::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Reservation/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>