<?php $__env->startSection('title'); ?>
إنشاء حساب
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
<section class="sing" id="sing">
    <div class="container">
        <div class="contect">
            <div class="singup">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ads">
                            <div class="layout"><img class="img-responsive"
                                    src="<?php echo e(asset('modules/master/website/images/writer.svg')); ?>">
                                <p class="text-capitalize">Welcome.</p>
                                <p class="text-capitalize">this is your best place to fine your dream car.</p>
                                <button class="btn btn-custom text-uppercase change-sing">تسجيل الدخول</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="start-form text-capitalize">
                            <h3 class="l-r-border text-uppercase"> انشاء حساب جديد</h3><small>افضل خيار لك لحجز التذاكر
                                اونلاين</small>
                            <?php echo $__env->make('website::customer.singup-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="singin">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ads">
                            <div class="layout"><img class="img-responsive"
                                    src="<?php echo e(asset('modules/master/website/images/tmb_img.png')); ?>">
                                <p class="text-capitalize">احجز 24</p>
                                <p class="text-capitalize">افضل خيار لك لحجز التذاكر اونلاين.</p>
                                <button class="btn btn-custom text-uppercase change-sing">انشاء حساب جديد</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="start-form text-capitalize">
                            <h3 class="l-r-border text-uppercase"> تسجيل الدخول</h3><small> <span
                                    class="h-light">احجز24</span> تميز معنا و استمتع بافضل خدمات الحجز </small>
                            <?php echo $__env->make('website::customer.singin-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of start Page-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>