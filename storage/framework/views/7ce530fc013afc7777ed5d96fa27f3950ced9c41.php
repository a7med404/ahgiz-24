
<div class="loading-container">
    <div class="loading">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
</div>
<nav class="all-nav navbar-fixed-top">
  <div class="top-nav">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="top-start">
            <ul class="list-unstyled">
              <li class="text-uppercase"> <i class="fa fa-home"></i><?php echo e(getSetting('main_address')); ?></li>
              <li class="text-uppercase"><i class="fa fa-phone"></i><?php echo e(getSetting('mobile')); ?> </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="top-end"> 
            <ul class="list-unstyled">
              <?php if(auth()->guard('customer')->check()): ?>
                <li class="">
                  <a href="<?php echo e(route('profile')); ?>" title="">
                      مرحبا 
                    <?php echo e(Auth::guard('customer')->user()->first_name); ?>

                  </a>
                </li>
                <li class="text-uppercase"><i class="fa fa-phone"></i><?php echo e(getSetting('hot_line')); ?> </li>
              <?php else: ?>
                <li class="text-uppercase">
                  <a href="<?php echo e(route('singin')); ?>" title="">
                    <svg class="olymp-login-icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-login-icon')); ?>"></use></svg>
                    تسجيل دخول
                  </a>
                </li>
                <li class="text-uppercase">
                  <a href="<?php echo e(route('singup')); ?>" title="">
                    <svg class="olymp-register-icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-register-icon')); ?>"></use></svg>
                    إنشاء حساب
                  </a>
                </li>
              <?php endif; ?>
              
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar">
    <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#3t_nav" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
          <svg class="olymp-menu-icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-menu-icon')); ?>"></use></svg>
        </button><a class="smoothscroll navbar-brand text-uppercase" href="/">
          <img class="img-responsive a7giz-logo" src="<?php echo e(asset('modules/master/website/images/tmb_img.png')); ?>">
        </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="3t_nav"> 
        <ul class="nav navbar-nav navbar-right text-uppercase">
          <li><a class="smoothscroll transition hsg-nav__link-wrapper"  href="<?php echo e(url('/')); ?>#header">الرئيسية</a></li>
          <li><a class="smoothscroll transition hsg-nav__link-wrapper"  href="<?php echo e(url('/')); ?>#services">كيف يعمل</a></li>
          <li><a class="smoothscroll transition hsg-nav__link-wrapper"  href="<?php echo e(url('/')); ?>#testimonials">اراء العملاء</a></li>
          <li><a class="smoothscroll transition hsg-nav__link-wrapper"  href="<?php echo e(url('/')); ?>#testimonials">وجهات السفر</a></li>
          
              
              
              
              
          <li class="nav-item dropdown" role="presentation"><a class="dropdown-toggle smoothscroll transition" href="javascript:;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo e(Auth::guard('customer')->user() ? Auth::guard('customer')->user()->first_name : 'الحساب'); ?> <i class="caret"></i></a>
            <ul class="dropdown-menu speesh" id="menu1" role="menu">
                <?php if(auth()->guard('customer')->check()): ?>
                <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>">ادارة الحساب</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('my-reservations')); ?>">حجوزاتي</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('concel-reservation')); ?>">الغاء حجز</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('customer-logout')); ?>">تسجيل خروج</a></li>
              <?php else: ?>
                <li><a class="dropdown-item" href="<?php echo e(route('singin')); ?>">تسجيل دخول</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('singup')); ?>">إنشاء حساب</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</nav><?php /**PATH C:\xampp\htdocs\ahgiz-24\Modules\Website\Providers/../Resources/views/partials/nav.blade.php ENDPATH**/ ?>