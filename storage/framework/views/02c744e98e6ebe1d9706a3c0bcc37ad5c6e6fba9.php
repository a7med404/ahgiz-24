<?php $__env->startSection('title'); ?>
ادارة الحساب
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Start Content section-->

<section class="profile" id="porfile">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                <div class="info"><img class="img-responsive thumbnail" src="<?php echo e(asset('modules/master/website/images/profile-image.jpg')); ?>">
                    <p class="center text-capitalize"><?php echo e($customerInfo->first_name); ?> <?php echo e($customerInfo->last_name); ?></p>
                    <hr>
                    <div class="row text-center">
                    <div class="col-md-4 col-xs-4">
                        <div class="data">
                        <p><?php echo e($customerInfo->reservations->count()); ?></p><span>الحجوزات</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="data have-border">
                        <p>12</p><span>cars</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="data">
                            <p>12</p><span>cars</span>
                        </div>
                    </div>
                    </div>
                    <hr>
                    <h3 class="text-capitalize">البيانات الشخصية</h3>
                    <ul class="list-unstyled">
                    <li class="text-capitalize">الاسم: <span><?php echo e($customerInfo->first_name); ?> <?php echo e($customerInfo->last_name); ?></span> </li>
                    <li class="text-capitalize">رقم الهاتف: <span><?php echo e($customerInfo->phone_number); ?></span> </li>
                    <li class="text-capitalize">البريد الالكتروني: <span><?php echo e($customerInfo->email); ?></span> </li>
                    <li class="text-capitalize">النوع: <span><?php echo e($customerInfo->gender); ?></span> </li>
                    <li class="text-capitalize">تاريخ الميلاد: <span><?php echo e($customerInfo->brithdate); ?></span> </li>
                    </ul><a>
                    <button type="button" data-toggle="modal" data-target="#popup-form" href="#" class="btn btn-custom text-uppercase">تعديل المعلومات الشخصية <i class="fa fa-chevron-left"></i></button></a>
                </div>
                </div>
            </div>
            <div class="col-md-8">
                <section class="filter" id="filter">
                    <div class="">
                        <div class="row">
                        <div class="col-sm-12">
                            <!--Start show-cars section-->
                            <section class="show-cars card">
                            <div class="text-center">
                                <h3 class="text-capitalize l-r-border"> الحجوزات التي قمت بها</h3>
                                <?php $__empty_1 = true; $__currentLoopData = $customerInfo->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if(!$reservation->canceled_at): ?>
                                        <div class="cars-list scale">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="car-card text-center hover-box">
                                                    <div class="detail">
                                                        <h3 class="text-uppercase"><?php echo e($reservation->trip->company->name); ?></h3>
                                                        <span class="price"><a><?php echo e($reservation->passengers->count() * $reservation->trip->price); ?> ج.س  </a>
                                                        </span><span class="kilo"><a> تاريخ الحجز <?php echo e(date('d-m H:i', strtotime($reservation->created_at))); ?> </a></span>
                                                        <p class="time"><svg class="olymp-month-calendar-icon icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon')); ?>"></use></svg> تاريخ المغادرة <span class="h-light">(<?php echo e($reservation->trip->date); ?>)</span> </p>
                                                        <ul class="list-unstyled">
                                                            <li>زمن انطلاق الباص:  <br><span> <?php echo e($reservation->trip->departure_time); ?><span></li>
                                                            
                                                            <li>عدد المقاعد: <br><span> [ <?php echo e($reservation->passengers->count()); ?> ] <span></li>
                                                            <li>رقم الحجز:  <br><span> <?php echo e($reservation->number); ?><span></li>
                                                            <li>المسافة: <br><span> 560<span> /كم</li>
                                                        </ul>
                                                        <button class="btn btn-custom text-uppercase">تفاصيل الحجز <i class="fa fa-chevron-left"></i></button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <h3 class="text-capitalize"> لم تقم باي حجز حتي الان</h3>
                                    <a href="<?php echo e(url('/')); ?>" class="btn btn-custom text-uppercase">حجز الان <i class="fa fa-chevron-left"></i></a>
                                <?php endif; ?>
                            </div>
                            </section>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Popup  -->
    <div class="modal fade" id="popup-form">
        <div class="modal-dialog" tabindex="-1" role="dialog" aria-labelledby="popup-form" aria-hidden="true">
            <div class="modal-content modal-content-box">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="title">بيانات المستخدم</h4>
                </div>
                <div class="modal-body">
                    <?php echo Form::model($customerInfo, ['route' => ['customers.update', $customerInfo->id], 'method' => "PATCH"]); ?>

                    
        <div class="row">
            <div class="form-group col-md-6">
                <?php echo Form::label('first_name', '<?php echo e(__("home/labels.f_name")); ?>', ['class' => 'form-label']); ?>

                <?php echo Form::text('first_name', null, ['id' => 'first_name', 'class' => "form-control  <?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('first_name')); ?>", 'required', 'autofocus']); ?>

            </div>
        
            <div class="form-group col-md-6">
                <?php echo Form::label('last_name', '<?php echo e(__("home/labels.l_name")); ?>', ['class' => 'form-label']); ?>

                <?php echo Form::text('last_name', null, ['id' => 'last_name', 'class' => "form-control  <?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('last_name')); ?>", 'required', 'autofocus']); ?>

            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-6">
                <?php echo Form::label('phone_number', '<?php echo e(__("home/labels.phone_number")); ?>', ['class' => 'form-label']); ?>

                <?php echo Form::text('phone_number', null, ['id' => 'phone_number', 'class' => "form-control  <?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('phone_number')); ?>", 'required', 'autofocus']); ?>

            </div>
        
            <div class="form-group col-md-6">
                <?php echo Form::label('email', '<?php echo e(__("home/labels.email")); ?>', ['class' => 'form-label']); ?>

                <?php echo Form::text('email', null, ['id' => 'email', 'class' => "form-control  <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('email')); ?>", 'required', 'autofocus']); ?>

            </div>
        </div> 
        
        <?php if(isset($customerInfo)): ?>
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
                <button href="#" class="btn btn-primary">حـــفظ</button>
            </div>
        </div>
            
        <?php else: ?>
        <div class="row m-t-40">
            <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
                <button href="#" class="btn btn-primary">حـــفظ</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
                <button type="button" class="btn btn-default pull-left"  data-dismiss="modal">اغلاق</button>
            </div>
        </div>
        <?php endif; ?>
                        
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- ... end Popup  -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>