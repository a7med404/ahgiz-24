<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Start Content section-->

<section class="card">
    <div class="text-center">
        <h3 class="text-capitalize l-r-border">تفاصيل <span> الباص و المسافرين</span></h3>
    </div>
</section>
<section>
    
    <div class="container">
        <div class="card more-shadow box-shadow">
            <div class="bus-details">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الباص</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="city"><?php echo e($trip->fromStation->name); ?></p>
                                        <p class="time"><?php echo e($trip->departure_time); ?></p>
                                        <p class="date"><?php echo e($trip->date); ?></p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="city text-center"><span>11:50</span> | <span>400 كم</span></p>
                                        <img class="img-responsive m-t-20" src="<?php echo e(asset('modules/master/website/images/destHorSep.gif')); ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="city"><?php echo e($trip->toStation->name); ?></p>
                                        <p class="time"><?php echo e($trip->arrive_time); ?></p>
                                        <p class="date"><?php echo e($trip->date); ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">شركة النقل</p>
                                        <p class="value"><?php echo e($trip->company->name); ?></p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">نقطة الانطلاق</p>
                                        <p class="value"><?php echo e($trip->fromStation->name); ?></p>
                                        <p class="city"><?php echo e($trip->departure_time); ?></p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <p class="name">عدد المقاعد المختارة:</p>
                                        <p class="value">[ <?php echo e($seats); ?>

                                            
                                        ]
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الباص</h4>
                            </div>
                            <div class="panel-body">
                                <p>اجمالي تكلفة التذاكر</p>
                                <p class="price"> <?php echo e($trip->price * $seats.' ج.س '); ?> </p>
                                <p class="date"><?php echo e($trip->date); ?></p>
                                <p class="city"><?php echo e($trip->departure_time); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">تفاصيل الركاب</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form" action="<?php echo e(route('save-passenger')); ?>" method="post">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <p class="sub_title">بيانات الركاب:</p>
                                            <?php echo csrf_field(); ?>
                                            <?php $number = 2; $i = 1;
                                            \Session::put('isSameForm', Time().rand(0, 100))
                                            ?>
                                            <input name="number" value="<?php echo e(\Session::get('isSameForm')); ?>" type="hidden">
                                            <input name="seats" value="<?php echo e($seats); ?>" type="hidden">
                                            <input name="trip_id" value="<?php echo e($trip->id); ?>" type="hidden">

                                            
                                            <?php while( $i <= (int)$seats): ?>
                                            <?php if($i == 1): ?>
                                            <div class="passenger">
                                                <div class="row">
                                                    <div class="col-md-10"> 
                                                        <div class="for-middel form-group">
                                                            <?php echo Form::label('name', 'اسم المسافر رقم 1', ['class' => 'control-label']); ?>

                                                            <?php echo Form::text('1-name', Auth::guard('customer') ? Auth::guard('customer')->user()->first_name.' '.Auth::guard('customer')->user()->last_name : null , ['id' => 'name', 'class' => "<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('name')); ?>", 'required', 'autofocus']); ?>

                                                            <span class="border-middel"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-uppercase remember">
                                                    <label class="control-label">النوع </label><br>
                                                    <input id="1-gender" value="1" <?php echo e(Auth::guard('customer')->user()->gender === 1 ? 'checked' : ''); ?> name="1-gender" type="radio">
                                                    <label for="1-gender">ذكـر.</label>
                                                    <input id="1-gender" value="0" <?php echo e(Auth::guard('customer')->user()->gender === 0 ? 'checked' : ''); ?> name="1-gender" type="radio">
                                                    <label for="1-gender">انثي.</label>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="passenger">
                                                <div class="row">
                                                    <div class="col-md-10"> 
                                                        <div class="for-middel form-group">
                                                            <?php echo Form::label('name', ' اسم المسافر رقم '.$number++, ['class' => 'control-label']); ?>

                                                            <?php echo Form::text($i.'-name', null, ['id' => 'name', 'class' => "<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('name')); ?>", 'required', 'autofocus']); ?>

                                                            <span class="border-middel"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-uppercase remember">
                                                    <label class="control-label">النوع </label><br>
                                                    <input id="<?php echo e($i.'-gender'); ?>" value="1" name="<?php echo e($i.'-gender'); ?>" type="radio">
                                                    <label for="<?php echo e($i.'-gender'); ?>">ذكـر.</label>
                                                    <input id="<?php echo e($i.'-gender'); ?>" value="0" name="<?php echo e($i.'-gender'); ?>" type="radio">
                                                    <label for="<?php echo e($i.'-gender'); ?>">انثي.</label>
                                                </div>
                                            </div>

                                            <?php endif; ?>
                                            <?php $i++ ?>
                                            <?php endwhile; ?>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                <hr>
                                                <p class="sub_title">بيانات الاتصال:</p>
                                                <div class="feed-back">سوف يتم ارسال بيانات الحجز الي هذا الرقم.</div>
                                                <div class="for-middel form-group">
                                                    <?php echo Form::label('phone_number', 'رقم الموبايل', ['class' => 'control-label']); ?>

                                                    <?php if(Auth::guard('customer')->user()->phone_number): ?>
                                                        <?php echo Form::text('phone_number', Auth::guard('customer') ? Auth::guard('customer')->user()->phone_number : null , ['id' => 'phone_number', 'placeholder' => 'xxx xxx xxxx', 'disabled' => 'disabled', 'class' => "<?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('phone_number')); ?>", 'required', 'autofocus']); ?>

                                                    <?php else: ?>                                                    
                                                    <?php echo Form::text('phone_number', Auth::guard('customer') ? Auth::guard('customer')->user()->phone_number : null , ['id' => 'phone_number', 'placeholder' => 'xxx xxx xxxx', 'class' => "<?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('phone_number')); ?>", 'required', 'autofocus']); ?>

                                                     
                                                    <?php endif; ?>
                                                    <span class="border-middel"></span>
                                                </div>
                                                <div class="for-middel form-group">
                                                    <?php echo Form::label('email', 'البريد الالكتروني', ['class' => 'control-label']); ?>

                                                    <?php if(Auth::guard('customer')->user()->email): ?>
                                                        <?php echo Form::text('email', Auth::guard('customer') ? Auth::guard('customer')->user()->email : null, ['id' => 'email', 'placeholder' => 'exmple@exmple.com', 'disabled' =>'disabled', 'class' => "<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('email')); ?>", 'autofocus']); ?>

                                                    <?php else: ?>
                                                        <?php echo Form::text('email', Auth::guard('customer') ? Auth::guard('customer')->user()->email : null, ['id' => 'email', 'placeholder' => 'exmple@exmple.com', 'class' => "<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('email')); ?>", 'autofocus']); ?>                                                        
                                                    <?php endif; ?>
                                                    <span class="border-middel"></span>
                                                </div>
                                                <button type="submit" class="btn btn-block text-uppercase">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></button>
                                                
                                        </div>
                                    </form>
                                    
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

<?php echo $__env->make('website::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Website/Providers/../Resources/views/booking-steps/bus-details.blade.php ENDPATH**/ ?>