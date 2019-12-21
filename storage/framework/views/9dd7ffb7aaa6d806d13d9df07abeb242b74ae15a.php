
<div class="row">
    <div class="col col-xl-6 col-lg-12 col-md-12">
        <div class="form-group">
            <?php echo Form::label('customer_id', 'المستخدم', ['class' => 'control-label']); ?>

            <?php echo Form::select('customer_id', getSelect('customer'), null, ['id' => 'customer_id', 'class' => "select2 form-control  <?php echo e($errors->has('customer_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('customer_id')); ?>", 'required']); ?>

        </div>
    </div>
</div>
    <div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('from_station_id', 'مــن ', ['class' => 'control-label']); ?>

            <?php echo Form::select('from_station_id', getSelect('station'), null, ['id' => 'from_station_id', 'class' => "select2 form-control  <?php echo e($errors->has('from_station_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('from_station_id')); ?>", 'required']); ?>

        </div>
    </div>
        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo Form::label('to_station_id', 'إلــى', ['class' => 'control-label']); ?>

                <?php echo Form::select('to_station_id', getSelect('station'), null, ['id' => 'to_station_id', 'class' => "select2 form-control  <?php echo e($errors->has('to_station_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('to_station_id')); ?>", 'required']); ?>

            </div>
        </div>

        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo Form::label('company_id', 'اسم الشركة', ['class' => 'control-label']); ?>

                <?php echo Form::select('company_id', getSelect('company'), null, ['id' => 'company_id', 'class' => "select2 form-control  <?php echo e($errors->has('company_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('company_id')); ?>", 'required']); ?>

            </div>
        </div>

        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo Form::label('user_id', 'اسم المستخدم', ['class' => 'control-label']); ?>

                <?php echo Form::select('user_id', getSelect('company'), null, ['id' => 'user_id', 'class' => "select2 form-control  <?php echo e($errors->has('user_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('user_id')); ?>", 'required']); ?>

            </div>
        </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('status', 'الحالة', ['class' => 'control-label']); ?>

            <?php echo Form::select('status', reservationStatus(), null, ['id' => 'status', 'class' => "select2 form-control <?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('status')); ?>", 'required']); ?>

        </div>
    </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('from_date', 'من تاريخ', ['class' => 'control-label']); ?>

            <?php echo Form::date('from_date', null, ['id' => 'from_date', 'class' => " form-control <?php echo e($errors->has('from_date') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('from_date')); ?>", 'required']); ?>

        </div>
    </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('to_date', 'من تاريخ', ['class' => 'control-label']); ?>

            <?php echo Form::date('to_date', null, ['id' => 'to_date', 'class' => " form-control <?php echo e($errors->has('to_date') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('to_date')); ?>", 'required']); ?>

        </div>
    </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('seat', 'من تاريخ', ['class' => 'control-label']); ?>

            <?php echo Form::text('seat', null, ['id' => 'seat', 'class' => " form-control <?php echo e($errors->has('seat') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('seat')); ?>", 'required']); ?>

        </div>
    </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('note', 'من تاريخ', ['class' => 'control-label']); ?>

            <?php echo Form::textArea('note', null, ['id' => 'note', 'class' => " form-control <?php echo e($errors->has('note') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('note')); ?>", 'required']); ?>

        </div>
    </div>
    
</div>

<?php if(isset($reservationInfo)): ?>
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
<?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Reservation/Providers/../Resources/views/planereservation/form.blade.php ENDPATH**/ ?>