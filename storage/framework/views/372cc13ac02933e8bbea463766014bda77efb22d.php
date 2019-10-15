<?php echo Form::open(['route' => ['post-singup'], 'method' => "POST", 'class' => 'form']); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="for-middel form-group">
                <?php echo Form::label('first_name', 'الاسم', ['class' => 'form-label']); ?>

                <?php echo Form::text('first_name', null, ['id' => 'first_name', 'class' => "<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('first_name')); ?>", 'required', 'autofocus']); ?>

                <span class="border-middel"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="for-middel form-group">
                <?php echo Form::label('last_name', 'اسم الوالد', ['class' => 'form-label']); ?>

                <?php echo Form::text('last_name', null, ['id' => 'last_name', 'class' => "<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('last_name')); ?>", 'required', 'autofocus']); ?>

                <span class="border-middel"></span>
            </div>
        </div>
    </div>
    <div class="for-middel form-group">
        <?php echo Form::label('phone_number', 'رقم الموبايل', ['class' => 'form-label']); ?>

        <?php echo Form::text('phone_number', null, ['id' => 'phone_number', 'class' => "<?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('phone_number')); ?>", 'required', 'autofocus']); ?>

        <span class="border-middel"></span>
    </div>
    <div class="for-middel form-group">
        <?php echo Form::label('password', 'كلمة السر', ['class' => 'form-label']); ?>

        <?php echo Form::password('password', null, ['id' => 'password', 'class' => "<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('password')); ?>", 'required', 'autofocus']); ?>

        <span class="border-middel"></span>
    </div>

    <div class="form-group text-uppercase remember">
        <?php echo Form::checkbox('terms-and-conditions', null, ['id' => 'terms-and-conditions', 'class' => "<?php echo e($errors->has('terms-and-conditions') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('terms-and-conditions')); ?>", 'required', 'autofocus']); ?>                                                        
        <label class = 'form-label' for="terms-and-conditions">I accept the <a href="#">Terms and Conditions</a></label>
    </div>
    <input class="btn btn-custom text-uppercase" id="name" type="submit" value="انشاء حساب">
<?php echo Form::close(); ?>