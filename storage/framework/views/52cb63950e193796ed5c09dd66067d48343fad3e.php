<?php $__env->startSection('title', trans('messages.permissions.title')); ?>
<?php $__env->startSection('container'); ?>

<ul class="list">
    <?php $__currentLoopData = $permissions['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li class="list__item list__item--permissions <?php if($permission['isSet']): ?> success <?php else: ?> error <?php endif; ?>">
        <?php echo e($permission['folder']); ?><span><?php echo e($permission['permission']); ?></span>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>

<?php if(!isset($permissions['errors'])): ?>
<div class="buttons">
    <a class="button" href="<?php echo e(route('LaravelInstaller::database')); ?>">
        <?php echo e(trans('messages.finish')); ?>

    </a>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.installer.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>