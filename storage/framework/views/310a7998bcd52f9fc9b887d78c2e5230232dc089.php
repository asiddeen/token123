<?php $__env->startSection('title', trans('messages.environment.title')); ?>
<?php $__env->startSection('container'); ?>
    <?php if(session('message')): ?>
    <p class="alert"><?php echo e(session('message')); ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('LaravelInstaller::environmentSave')); ?>">
        <textarea class="textarea" name="envConfig"><?php echo e($envConfig); ?></textarea>
        <?php echo csrf_field(); ?>

        <div class="buttons buttons--right">
             <button class="button button--light" type="submit"><?php echo e(trans('messages.environment.save')); ?></button>
        </div>
    </form>
    <?php if(!isset($environment['errors'])): ?>
    <div class="buttons">
        <a class="button" href="<?php echo e(route('LaravelInstaller::requirements')); ?>">
            <?php echo e(trans('messages.next')); ?>

        </a>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>