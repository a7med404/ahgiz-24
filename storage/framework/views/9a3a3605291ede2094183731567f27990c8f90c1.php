

    
<div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12">
        <div class="form-group">
            <?php echo Form::label('company_id', 'الشركة', ['class' => 'control-label']); ?>

            <?php echo Form::select('company_id', getSelect('company'), null, ['id' => 'company_id', 'class' => "select2 form-control  <?php echo e($errors->has('company_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('company_id')); ?>", 'required']); ?>

        </div>
    </div>
</div>
<div class="row">
        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo Form::label('from_station_id', 'المسار(من)', ['class' => 'control-label']); ?>

                <?php echo Form::select('from_station_id', getSelect('station'), null, ['id' => 'from_station_id', 'class' => "select2 form-control  <?php echo e($errors->has('from_station_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('from_station_id')); ?>", 'required']); ?>

            </div>
        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo Form::label('to_station_id', 'المسار(الي)', ['class' => 'control-label']); ?>

                <?php echo Form::select('to_station_id', getSelect('station'), null, ['id' => 'to_station_id', 'class' => "select2 form-control  <?php echo e($errors->has('to_station_id') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('to_station_id')); ?>", 'required']); ?>

            </div>
        </div>
    </div>
<div class="row">
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <?php echo Form::label('date', 'تاريخ الرحلة', ['class' => 'control-label']); ?>

                <div class="input-group">
                    <?php echo Form::text('date', null, ['id' => 'date', 'class' => "form-control  <?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('date')); ?>", 'required', 'autofocus']); ?>

                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <?php echo Form::label('departure_time', 'زمن انطلاق الرحلة', ['class' => 'control-label']); ?>

                <div class="input-group">
                    <?php echo Form::text('departure_time', null, ['id' => 'departure_time', 'class' => "form-control  <?php echo e($errors->has('departure_time') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('departure_time')); ?>", 'required', 'autofocus']); ?>

                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <?php echo Form::label('arrive_time', 'زمن وصول الرحلة', ['class' => 'control-label']); ?>

                <div class="input-group">
                    <?php echo Form::text('arrive_time', null, ['id' => 'arrive_time', 'class' => "form-control  <?php echo e($errors->has('arrive_time') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('arrive_time')); ?>", 'required', 'autofocus']); ?>

                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo Form::label('price', 'سعر التذكرة', ['class' => 'control-label']); ?>

            <?php echo Form::text('price', null, ['id' => 'price', 'class' => "form-control  <?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('price')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo Form::label('saleprice', 'سعر  بيع التذكرة', ['class' => 'control-label']); ?>

            <?php echo Form::text('saleprice', null, ['id' => 'saleprice', 'class' => "form-control
            <?php echo e($errors->has('saleprice') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('saleprice')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div>
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo Form::label('seats_number', 'عدد المقاعد', ['class' => 'control-label']); ?>

            <?php echo Form::text('seats_number', null, ['id' => 'seats_number', 'class' => "form-control  <?php echo e($errors->has('seats_number') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('seats_number') ? 49 : old('seats_number')); ?>", 'required', 'autofocus']); ?>

        </div>
    </div> 
    <div class="col col-xl-4 col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo Form::label('status', 'الحالة', ['class' => 'control-label']); ?>

            <?php echo Form::select('status', tripStatus(), null, ['id' => 'status', 'class' => "form-control <?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('status')); ?>", 'required']); ?>

        </div>
    </div> 
</div>
<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group">
            <?php echo Form::label('description', 'description', ['class' => 'control-label']); ?>

            <?php echo Form::textarea('description', null, ['id' => 'description', 'class' => "form-control  <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('description')); ?>", 'autofocus']); ?>

        </div>
    </div>
</div>

<?php if(isset($vehicleInfo)): ?>
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
<?php /**PATH C:\xampp\htdocs\ahgiz-24\Modules\Vehicle\Providers/../Resources/views/trips/form.blade.php ENDPATH**/ ?>