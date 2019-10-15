<?php echo Form::open(['route' => ['post-singin'], 'method' => "POST", 'class' => 'form']); ?>

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
        <?php echo Form::checkbox('remember_me', 1, ['id' => 'remember_me', 'class' => "<?php echo e($errors->has('remember_me') ? ' is-invalid' : ''); ?>", 'value' => "<?php echo e(old('remember_me')); ?>", 'required', 'autofocus']); ?>

        <?php echo Form::label('remember_me', 'تذكرني.', ['class' => 'form-label']); ?>

    </div>
    <input class="btn btn-custom text-uppercase" id="name" type="submit" value="تسجيل الدخول">
<?php echo Form::close(); ?>