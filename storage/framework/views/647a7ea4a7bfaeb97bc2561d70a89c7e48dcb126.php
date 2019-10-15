
<div class="row">
    <div class="form-group col-md-6">
        <?php echo Form::label('name', 'Name', ['class' => 'form-label']); ?>

        <?php echo Form::text('name', null, ['id' => 'name', 'class' => "form-control  <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('name')); ?>", 'required', 'autofocus']); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo Form::label('city', 'المدينة', ['class' => 'control-label']); ?>

        <?php echo Form::select('city', getCity(), null, ['id' => 'city', 'class' => "form-control <?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('city')); ?>", 'required']); ?>

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
