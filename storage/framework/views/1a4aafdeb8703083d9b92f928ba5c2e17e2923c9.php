<div class="row">
    <div class="form-group col-md-6">
        <?php echo Form::label('how', 'How', ['class' => 'form-label']); ?>

        <?php echo Form::text('how', null, ['id' => 'how', 'class' => "form-control  <?php echo e($errors->has('how') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('how')); ?>", 'required', 'autofocus']); ?>

    </div>
</div>

<div class="row">
    <div class="col-md-12 custom-label-checkbox-radio">
        <?php echo Form::label('status', 'Status', ['class' => 'custom-label']); ?> <br />
        <span>Active</span>
        <?php echo Form::radio('status', 1, null, ['id' => 'status', 'placeholder' => 'status', 'class' => "<?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('status')); ?>", 'required']); ?> <br>
        <span>Disable</span> 
        <?php echo Form::radio('status', 0, null, ['id' => 'status', 'placeholder' => 'status', 'class' => " <?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('status')); ?>", 'required']); ?> 
    </div>
</div>
<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group">
            <?php echo Form::label('text', 'Text', ['class' => 'control-label']); ?>

            <?php echo Form::textarea('text', null, ['id' => 'text', 'class' => "form-control  <?php echo e($errors->has('text') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('text')); ?>", 'autofocus']); ?>

        </div>
    </div>
</div>
<?php if(isset($testimonialInfo)): ?>
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
<?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Setting/Providers/../Resources/views/testimonials/form.blade.php ENDPATH**/ ?>