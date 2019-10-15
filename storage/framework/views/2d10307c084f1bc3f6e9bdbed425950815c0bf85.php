<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Start Content section-->

<section class="profile" id="porfile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="filter" id="filter">
                    <div class="">
                        <div class="row">
                        <div class="col-sm-12">
                            <!--Start show-cars section-->
                            <section class="show-cars card">
                            <div class="text-center">
                                <h3 class="text-capitalize l-r-border"> الحجوزات التي قمت بها</h3>
                                <?php $__empty_1 = true; $__currentLoopData = $customerInfo->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="cars-list scale">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="car-card text-center hover-box">
                                                <div class="detail">
                                                    <h3 class="text-uppercase"><?php echo e($reservation->trip->company->name); ?></h3>
                                                    <span class="price"><a><?php echo e($reservation->passengers->count() * $reservation->trip->price); ?> ج.س  </a>
                                                    </span><span class="kilo"><a> تاريخ الحجز <?php echo e(date('d-m H:i', strtotime($reservation->created_at))); ?> </a></span>
                                                    </span><span class="kilo m-r-20"><a> عدد المقاعد  [ <?php echo e($reservation->passengers->count()); ?> ]</a></span>
                                                    <p class="time"><svg class="olymp-month-calendar-icon icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon')); ?>"></use></svg> تاريخ المغادرة <span class="h-light">(<?php echo e($reservation->trip->date); ?>)</span> </p>
                                                    <ul class="list-unstyled">
                                                        <li>زمن انطلاق الباص:  <span> <?php echo e($reservation->trip->departure_time); ?><span></li>
                                                        <li>مدة السير: <span> <?php echo e(intval((strtotime(date($reservation->trip->arrive_time))-strtotime($reservation->trip->departure_time)))); ?><span></li>
                                                        <li>زمن وصول الباص:  <span> <?php echo e($reservation->trip->arrive_time); ?><span></li>
                                                        <li>المسافة: <span> 560<span> /كم</li>
                                                    </ul>
                                                    <button class="btn btn-custom text-uppercase">تفاصيل الحجز <i class="fa fa-chevron-left"></i></button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                    <?php echo $__env->make('customer::customers.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- ... end Popup  -->
        

    <div class="modal fade " id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title l-r-border text-uppercase"> الغاء الحجز</h3>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="contect">
                        <div class="singup">
                            <div class="row">
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
                                <div class="col-md-6">
                                    <div class="start-form text-capitalize">
                                        <p>افضل خيار لك لحجز التذاكر اونلاين</p>
                                        <form class="form" action="" method="post">
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                <div class="form-group for-middel">
                                                    <label class="" for="ticket_id_number">ادخل رقم الحجز</label>
                                                    <input id="ticket_id_number" name="ticket_id_number" type="text"><span class="border-middel"></span>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group for-middel">
                                                        <label class="" for="phone_number">رقم الموبايل</label>
                                                        <input id="phone_number" name="phone_number" type="text" autofocus><span class="border-middel"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-custom text-uppercase" type="submit">تاكيد الغاء الحجز <i class="fa fa-chevron-left"></i></button>
                                            <button class="btn btn-custom text-uppercase pull-left btn-cancel" type="button" data-dismiss="modal"> تراجع <i class="fa fa-chevron-left"></i></button>
                                        </form>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>