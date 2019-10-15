<?php $__env->startSection('title'); ?>
الغاء حجز
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="card">
    <div class="text-center">
        <h3 class="text-capitalize l-r-border"> الغاء <span>الحجز</span></h3>
    </div>
</section>
<section>
    <div class="container">
        <div class="profile">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> الغاء الحجز </h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="contect">
                                            <div class="singup">
                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                        <div class="start-form text-capitalize">
                                                            <img class="img-responsive concel-img center-img" src="<?php echo e(asset('modules/master/website/images/cancel.svg')); ?>">
                                                            <p>لطلب اي مساعدة يمكنك الاتصال علي الرقم <span class="h-light"> <?php echo e(getSetting('hot_line')); ?>. </span></p>
                                                            <?php echo Form::open(['route' => ['concel-reservation-post'], 'method' => "POST", 'class' => 'form']); ?>

                                                                <div class="row"> 
                                                                    <div class="col-md-12">
                                                                    <div class="form-group for-middel">
                                                                        <?php echo Form::label('number', 'ادخل رقم الحجز', ['class' => 'form-label']); ?>

                                                                        <?php echo Form::text('number', null, ['id' => 'number', 'class' => "<?php echo e($errors->has('number') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('number')); ?>", 'required', 'autofocus']); ?>

                                                                        <span class="border-middel"></span>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group for-middel">
                                                                            <?php echo Form::label('phone_number', 'رقم الموبايل', ['class' => 'form-label']); ?>

                                                                            <?php echo Form::text('phone_number', Auth::guard('customer') ? Auth::guard('customer')->user()->phone_number : null , ['id' => 'phone_number', 'placeholder' => 'xxx xxx xxxx', 'class' => "<?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('phone_number')); ?>", 'required', 'autofocus']); ?>

                                                                            <span class="border-middel"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group for-middel">
                                                                            <?php echo Form::checkbox('t-c-concel-reservation', 1, ['id' => 't-c-concel-reservation', 'class' => "<?php echo e($errors->has('t-c-concel-reservation') ? ' is-invalid' : ''); ?>",  'checked' => 'checked', 'value' => "<?php echo e(old('t-c-concel-reservation')); ?>", 'required', 'autofocus']); ?>  
                                                                            <?php echo Form::label('t-c-concel-reservation', 'اوافق علي شروط و قوانين الغاء الحجز.', ['class' => 'form-label']); ?> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-custom text-uppercase" type="submit">تاكيد الغاء الحجز <i class="fa fa-chevron-left"></i></button>
                                                            <?php echo Form::close(); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="ads">
                                                            <div class="layout">
                                                                <p class="text-capitalize title">شروط و قوانين الغاء الحجز الخاص بشركات النقل.</p>
                                                                <p class="text-capitalize">this is your best place to fine your dream car.</p>
                                                                <p class="text-capitalize">this is your best place to fine your your dream car.</p>
                                                                <p class="text-capitalize">this is your best place to fine your dream car.</p>
                                                                <p class="text-capitalize">this is your best place to fine your fine your dream car.</p>
                                                                <p class="text-capitalize">this is your best place to fine your dream car.</p>
                                                                <p class="text-capitalize">this is your best place to fine your  fine your dream car.</p>
                                                                <p class="text-capitalize">this is your best place to fine youplace to fine your dream car.</p>
                                                                <p class="text-capitalize">this is your best place to fine your dream car.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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