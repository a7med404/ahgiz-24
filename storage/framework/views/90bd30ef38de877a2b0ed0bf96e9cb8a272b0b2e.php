
<?php if(isset($companyInfo)): ?>
    <?php echo Form::hidden('contactable_type', 'Modules\Company\Entities\Company', ['value' => "<?php echo e(old('contactable_type')); ?>"]); ?>

<?php else: ?>
    <?php echo Form::hidden('contactable_type', 'Modules\User\Entities\User', ['value' => "<?php echo e(old('contactable_type')); ?>"]); ?>

<?php endif; ?>
<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('number_1', 'تلفون الشركة', ['class' => 'control-label']); ?>

            <?php echo Form::text('number_1', null, ['id' => 'number_1', 'class' => "form-control  <?php echo e($errors->has('number_1') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('number_1')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('number_2', 'تلفون الطواري ', ['class' => 'control-label']); ?>

            <?php echo Form::text('number_2', null, ['id' => 'number_2', 'class' => "form-control  <?php echo e($errors->has('number_2') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('number_2')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('email', ' البريد الالكتروني ', ['class' => 'control-label']); ?>

            <?php echo Form::email('email', null, ['id' => 'email', 'class' => "form-control  <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('email')); ?>", 'autofocus']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12">
        <div class="form-group">
            <?php echo Form::label('note', 'ملاحظة', ['class' => 'control-label']); ?>

            <?php echo Form::textarea('note', null, ['id' => 'note', 'class' => "form-control  <?php echo e($errors->has('note') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('note')); ?>", 'autofocus']); ?>

        </div>
    </div>
</div>

<?php if(isset($contactInfo)): ?>
<?php echo Form::hidden('contactable_id', null, ['value' => "<?php echo e(old('contactable_id')); ?>"]); ?>

<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
        <button href="#" class="btn btn-primary">حـــفظ</button>
    </div>
</div>
<?php else: ?>
<?php if(isset($companyInfo)): ?>
    <?php echo Form::hidden('contactable_id', $companyInfo->id, ['value' => "<?php echo e(old('contactable_id')); ?>"]); ?>

<?php else: ?>
    <?php echo Form::hidden('contactable_id', $userInfo->id, ['value' => "<?php echo e(old('contactable_id')); ?>"]); ?>

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
<?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Address/Providers/../Resources/views/contacts/form.blade.php ENDPATH**/ ?>