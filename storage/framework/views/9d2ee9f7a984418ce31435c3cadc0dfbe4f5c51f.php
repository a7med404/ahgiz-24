<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('ticket.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ticket::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\a7giz-24\Modules\Ticket\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>