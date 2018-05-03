<?php if(session()->has('flash_notification.message')): ?>
    <script>
        $(document).ready(function() {
            Materialize.toast('<?php if(session('flash_notification.icon')): ?><i class="<?php echo e(session('flash_notification.icon')); ?>" style="margin-right:5px"></i><?php endif; ?> <?php echo e(session('flash_notification.message')); ?>', 3000, '<?php echo e(session('flash_notification.level')); ?>');
        })
    </script>
<?php endif; ?>
