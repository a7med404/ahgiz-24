
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
