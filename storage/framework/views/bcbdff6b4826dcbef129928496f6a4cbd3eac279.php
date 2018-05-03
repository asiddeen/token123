<?php $__env->startSection('title', trans('messages.mainapp.menu.reports.queue_list')); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('assets/js/plugins/data-tables/css/jquery.dataTables.min.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.mainapp.menu.reports.queue_list')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><?php echo e(trans('messages.mainapp.menu.reports.reports')); ?></li>
                        <li class="active"><?php echo e(trans('messages.mainapp.menu.reports.queue_list')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s9">
                            <span style="line-height:0;font-size:22px;font-weight:300"><?php echo e(trans('messages.report')); ?></span>
                        </div>
                        <div class="col s3">
                            <input id="date" class="right" type="text" placeholder="dd-mm-yyyy" value="<?php echo e($date); ?>" onchange="datechange((this).value)" style="margin-bottom:0;height:1.5rem">
                        </div>
                    </div>
                    <div class="divider" style="margin:15px 0 10px 0"></div>
                    <table id="report-table" class="display" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:40px">#</th>
                                <th><?php echo e(trans('messages.mainapp.menu.department')); ?></th>
                                <th><?php echo e(trans('messages.call.number')); ?></th>
                                <th><?php echo e(trans('messages.call.called')); ?></th>
                                <th><?php echo e(trans('messages.call.user')); ?></th>
                                <th><?php echo e(trans('messages.mainapp.menu.counter')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $queues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $queue): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($queue->department->name); ?></td>
                                    <td><?php echo e(($queue->department->letter!='')?$queue->department->letter.'-':''); ?><?php echo e($queue->number); ?></td>
                                    <td><?php echo e($queue->called?'Yes':'No'); ?></td>
                                    <td><?php echo e($queue->called?$queue->call->user->name:'NIL'); ?></td>
                                    <td><?php echo e($queue->called?$queue->call->counter->name:'NIL'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
    <script>
        $(function() {
            picker = $('#date').pickadate({
                selectMonths: true,
                selectYears: 15,
                format: 'dd-mm-yyyy',
                clear: false,
                onSet: function(ele) {
                    if(ele.select) {
                        this.close();
                    }
                },
                onClose: function() {
                    document.activeElement.blur();
                }
            });
            $('#report-table').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Show _MENU_",
                    "sSearch": "Search"
                }
            });
        });
        function datechange(value) {
            if(value!='') {
                $('body').removeClass('loaded');
                window.location = '<?php echo e(url('reports/queuelist')); ?>/'+value;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>