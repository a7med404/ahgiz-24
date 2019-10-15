<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<style>
		.sing .contect .singup {
				display: block;
		}
		.sing .contect .singin {
				display: none;
		}
	</style>	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Start Content section-->
<section class="sing pay" id="sing">
    <div class="container">
        <div class="contect">
            <div class="tabs">
                <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
                    <li class="nav-item active"><a class="nav-link" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">نقــدي</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features" aria-selected="true">تطبيق بنكك</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="true">تطبيق سايبر</a></li>
                </ul>
                
                <div class="tab-content sections-contents" id="pills-tabContent">
                    <div class="tab-pane fade active in" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab"> 
                        <cashpay></cashpay>
                    </div>
                    <div class="tab-pane fade" id="pills-features" role="tabpanel" aria-labelledby="pills-features-tab">Features</div>
                    <div class="tab-pane fade" id="pills-specifications" role="tabpanel" aria-labelledby="pills-specifications-tab">Specifications</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of start Page-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Website/Providers/../Resources/views/booking-steps/pay.blade.php ENDPATH**/ ?>