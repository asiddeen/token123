<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Queue Installation</title>
    <link rel="icon" href="<?php echo e(asset('assets/fav.ico')); ?>" sizes="16x16">
    <link href="<?php echo e(asset('assets/installer/css/style.min.css')); ?>" rel="stylesheet"/>
  </head>
  <body>
    <div class="master">
      <div class="box">
        <div class="header">
            <h1 class="header__title"><?php echo $__env->yieldContent('title'); ?></h1>
        </div>
        <ul class="step">
          <li class="step__divider"></li>
          <li class="step__item <?php echo e(isActive('LaravelInstaller::final')); ?>"><i class="step__icon database"></i></li>
          <li class="step__divider"></li>
          <li class="step__item <?php echo e(isActive('LaravelInstaller::permissions')); ?>"><i class="step__icon permissions"></i></li>
          <li class="step__divider"></li>
          <li class="step__item <?php echo e(isActive('LaravelInstaller::requirements')); ?>"><i class="step__icon requirements"></i></li>
          <li class="step__divider"></li>
          <li class="step__item <?php echo e(isActive('LaravelInstaller::environment')); ?>"><i class="step__icon update"></i></li>
          <li class="step__divider"></li>
          <li class="step__item <?php echo e(isActive('LaravelInstaller::welcome')); ?>"><i class="step__icon welcome"></i></li>
          <li class="step__divider"></li>
        </ul>
        <div class="main">
          <?php echo $__env->yieldContent('container'); ?>
        </div>
      </div>
    </div>
  </body>
</html>
