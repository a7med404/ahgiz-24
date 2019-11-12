
<div class="row">
    <div class="form-group col-md-6">
        <?php echo Form::label('name', 'Name', ['class' => 'form-label']); ?>

        <?php echo Form::text('name', null, ['id' => 'name', 'class' => "form-control  <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('name')); ?>", 'required', 'autofocus']); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo Form::label('parent_id', 'المدينة', ['class' => 'control-label']); ?>

        <?php echo Form::select('parent_id', getCities(), null, ['id' => 'parent_id', 'class' => "select2 form-control <?php echo e($errors->has('parent_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('parent_id')); ?>"]); ?>

    </div>
</div>

<?php if(isset($stationInfo)): ?>
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
<?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Address/Providers/../Resources/views/cities/form.blade.php ENDPATH**/ ?>