<?php $__env->startSection('menu'); ?>
    <li class="bold<?php echo Request::is('dashboard*') ? ' active' : ''; ?>"><a href="<?php echo e(route('dashboard')); ?>" class="waves-effect waves-cyan truncate">
        <i class="mdi-action-view-quilt"></i> <?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a>
    </li>

    <li class="bold<?php echo Request::is('calls*') ? ' active' : ''; ?>"><a href="<?php echo e(route('calls')); ?>" class="waves-effect waves-cyan truncate">
        <i class="mdi-action-settings-voice"></i> <?php echo e(trans('messages.mainapp.menu.call')); ?></a>
    </li>

    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('access', \App\Models\Department::class)): ?>
        <li class="bold<?php echo Request::is('departments*') ? ' active' : ''; ?>"><a href="<?php echo e(route('departments.index')); ?>" class="waves-effect waves-cyan truncate">
            <i class="mdi-action-markunread-mailbox"></i> <?php echo e(trans('messages.mainapp.menu.department')); ?></a>
        </li>
    <?php endif; ?>

    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('access', \App\Models\Counter::class)): ?>
        <li class="bold<?php echo Request::is('counters*') ? ' active' : ''; ?>"><a href="<?php echo e(route('counters.index')); ?>" class="waves-effect waves-cyan truncate">
            <i class="mdi-action-perm-contact-cal"></i> <?php echo e(trans('messages.mainapp.menu.counter')); ?></a>
        </li>
    <?php endif; ?>

    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('access', \App\Models\User::class)): ?>
        <li>
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan truncate<?php echo Request::is('reports*') ? ' active' : ''; ?>"><i class="mdi-editor-insert-chart"></i> <?php echo e(trans('messages.mainapp.menu.reports.reports')); ?></a>
                    <div class="collapsible-body">
                        <ul>
                            <li<?php echo Request::is('reports/user*') ? ' class="active"' : ''; ?>><a href="<?php echo e(route('reports::user')); ?>" class="truncate"> <?php echo e(trans('messages.mainapp.menu.reports.user_report')); ?></a></li>
                            <li<?php echo Request::is('reports/queuelist*') ? ' class="active"' : ''; ?>><a href="<?php echo e(route('reports::queue_list', ['date' => \Carbon\Carbon::now()->format('d-m-Y')])); ?>" class="truncate"> <?php echo e(trans('messages.mainapp.menu.reports.queue_list')); ?></a></li>
                            <li<?php echo Request::is('reports/monthly*') ? ' class="active"' : ''; ?>><a href="<?php echo e(route('reports::monthly')); ?>" class="truncate"> <?php echo e(trans('messages.mainapp.menu.reports.monthly')); ?></a></li>
                            <li<?php echo Request::is('reports/statistical*') ? ' class="active"' : ''; ?>><a href="<?php echo e(route('reports::statistical')); ?>" class="truncate"> <?php echo e(trans('messages.mainapp.menu.reports.statistical')); ?></a></li>
                            <li<?php echo Request::is('reports/missed-overtime*') ? ' class="active"' : ''; ?>><a href="<?php echo e(route('reports::missed')); ?>" class="truncate"> <?php echo e(trans('messages.mainapp.menu.reports.missed')); ?> / <?php echo e(trans('messages.mainapp.menu.reports.overtime')); ?></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    <?php endif; ?>

    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('access', \App\Models\User::class)): ?>
        <li class="bold<?php echo Request::is('users*') ? ' active' : ''; ?>"><a href="<?php echo e(route('users.index')); ?>" class="waves-effect waves-cyan truncate">
            <i class="mdi-social-group"></i> <?php echo e(trans('messages.mainapp.menu.users')); ?></a>
        </li>
    <?php endif; ?>

    <li class="bold<?php echo Request::is('settings*') ? ' active' : ''; ?>"><a href="<?php echo e(route('settings')); ?>" class="waves-effect waves-cyan truncate">
        <i class="mdi-action-settings"></i> <?php echo e(trans('messages.settings')); ?></a>
    </li>
    <br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mainapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>