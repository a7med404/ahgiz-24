<?php if(isset($companyInfo)): ?>
    <?php echo Form::hidden('addressable_type', 'Modules\Company\Entities\Company', ['value' => "<?php echo e(old('addressable_type')); ?>"]); ?>

<?php else: ?>
    <?php echo Form::hidden('addressable_type', 'Modules\User\Entities\User', ['value' => "<?php echo e(old('addressable_type')); ?>"]); ?>

<?php endif; ?>
<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('street_1', 'الشارع', ['class' => 'control-label']); ?>

            <?php echo Form::text('street_1', null, ['id' => 'street_1', 'class' => "form-control  <?php echo e($errors->has('street_1') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('street_1')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('street_2', 'الشارع 2', ['class' => 'control-label']); ?>

            <?php echo Form::text('street_2', null, ['id' => 'street_2', 'class' => "form-control  <?php echo e($errors->has('street_2') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('street_2')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('city', 'المدينة', ['class' => 'control-label']); ?>

            <?php echo Form::select('city', getSelect('cities'), null, ['id' => 'city', 'class' => "form-control select2 <?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('city')); ?>", 'required']); ?>

        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('local', 'المحلية', ['class' => 'control-label']); ?>

            <?php echo Form::select('local', getSelect('sub_cities'), null, ['id' => 'local', 'class' => "form-control select2 <?php echo e($errors->has('local') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('local')); ?>", 'required']); ?>

        </div>
    </div>
</div>

<?php if(isset($addressInfo)): ?>

<?php echo Form::hidden('addressable_id', null, ['value' => "<?php echo e(old('addressable_id')); ?>"]); ?>

<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button href="#" class="btn btn-primary">حـــفظ</button>
    </div>
</div>
<?php else: ?>
<?php if(isset($companyInfo)): ?>
    <?php echo Form::hidden('addressable_id', $companyInfo->id, ['value' => "<?php echo e(old('addressable_id')); ?>"]); ?>

<?php else: ?>
    <?php echo Form::hidden('addressable_id', $userInfo->id, ['value' => "<?php echo e(old('addressable_id')); ?>"]); ?>

<?php endif; ?>
<div class="row m-t-40">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button href="#" class="btn btn-primary">حـــفظ</button>
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button type="button" class="btn btn-default pull-left"  data-dismiss="modal">اغلاق</button>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Address/Providers/../Resources/views/addresses/form.blade.php ENDPATH**/ ?>