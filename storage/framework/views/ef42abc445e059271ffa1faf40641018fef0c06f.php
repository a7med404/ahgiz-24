
<div class="row">
    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('name', 'Company Name', ['class' => 'control-label']); ?>

            <?php echo Form::text('name', null, ['id' => 'name', 'class' => "form-control  <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('name')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>

        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo Form::label('type', 'نوع الشركة', ['class' => 'control-label']); ?>

                <?php echo Form::select('type', CompanyType(), null, ['id' => 'type', 'class' => "select2 form-control  <?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('type')); ?>", 'required']); ?>

            </div>
        </div>

    <div class="col col-xl-6 col-lg-6 col-md-6">
        <div class="form-group">
            <?php echo Form::label('logo', 'Logo', ['class' => 'control-label']); ?>

            <?php echo Form::file('logo', null, ['id' => 'logo', 'class' => "form-control  <?php echo e($errors->has('logo') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('logo')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>
</div>


<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group">
            <?php echo Form::label('note', 'Note', ['class' => 'control-label']); ?>

            <?php echo Form::textarea('note', null, ['id' => 'note', 'class' => "form-control  <?php echo e($errors->has('note') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('note')); ?>", 'autofocus']); ?>

        </div>
    </div>
</div>

<?php if(isset($companyInfo)): ?>
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
<?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Company/Providers/../Resources/views/companies/form.blade.php ENDPATH**/ ?>