
<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('customer_id', 'رقم العميل', ['class' => 'control-label']); ?>

            <?php echo Form::select('customer_id', getSelect('customer'), null, ['id' => 'customer_id', 'class' => "select2 form-control  <?php echo e($errors->has('customer_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('customer_id')); ?>", 'required']); ?>

        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('trip_id', 'الرحلة', ['class' => 'control-label']); ?>

            <?php echo Form::select('trip_id', getSelect('trip'), null, ['id' => 'trip_id', 'class' => "select2 form-control  <?php echo e($errors->has('trip_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('trip_id')); ?>", 'required']); ?>

        </div>
    </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('status', 'الحالة', ['class' => 'control-label']); ?>

            <?php echo Form::select('status', reservationStatus(), null, ['id' => 'status', 'class' => "select2 form-control <?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('status')); ?>", 'required']); ?>

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
<?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Reservation/Providers/../Resources/views/reservations/form.blade.php ENDPATH**/ ?>