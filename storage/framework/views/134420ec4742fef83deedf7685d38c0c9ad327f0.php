<?php $__env->startSection('title', trans('messages.mainapp.menu.reports.missed').' / '.trans('messages.mainapp.menu.reports.overtime').' '.trans('messages.report')); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('assets/js/plugins/data-tables/css/jquery.dataTables.min.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.mainapp.menu.reports.missed')); ?> / <?php echo e(trans('messages.mainapp.menu.reports.overtime')); ?> <?php echo e(trans('messages.report')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><?php echo e(trans('messages.mainapp.menu.reports.reports')); ?></li>
                        <li class="active"><?php echo e(trans('messages.mainapp.menu.reports.missed')); ?> / <?php echo e(trans('messages.mainapp.menu.reports.overtime')); ?> <?php echo e(trans('messages.report')); ?></li>
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
                        <div class="input-field col s12 m2">
                            <label for="date"><?php echo e(trans('messages.starting')); ?> <?php echo e(trans('messages.date')); ?></label>
                            <input id="date" type="text" placeholder="dd-mm-yyyy" value="<?php echo e($date); ?>">
                        </div>
                        <div class="input-field col s12 m3">
                            <label for="user" class="active"><?php echo e(trans('messages.mainapp.menu.users')); ?></label>
                            <select id="user" class="browser-default">
                                <?php if(is_object($suser)): ?>
                                    <option value="all"><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.users')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($cuser->id); ?>"<?php echo $cuser->id==$suser->id?' selected':''; ?>><?php echo e($cuser->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php else: ?>
                                    <option value="all" selected><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.users')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($cuser->id); ?>"><?php echo e($cuser->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="input-field col s12 m3">
                            <label for="counter" class="active"><?php echo e(trans('messages.mainapp.menu.counter')); ?></label>
                            <select id="counter" class="browser-default">
                                <?php if(is_object($scounter)): ?>
                                    <option value="all"><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.counter')); ?></option>
                                    <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($counter->id); ?>"<?php echo $counter->id==$scounter->id?' selected':''; ?>><?php echo e($counter->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php else: ?>
                                    <option value="all" selected><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.counter')); ?></option>
                                    <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($counter->id); ?>"><?php echo e($counter->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="input-field col s12 m3">
                            <label for="type" class="active"><?php echo e(trans('messages.type')); ?></label>
                            <select id="type" class="browser-default">
                                <option value="all"<?php echo $type=='all'?' selected':''; ?>><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.types')); ?></option>
                                <option value="missed"<?php echo $type=='missed'?' selected':''; ?>><?php echo e(trans('messages.mainapp.menu.reports.missed')); ?></option>
                                <option value="overtime"<?php echo $type=='overtime'?' selected':''; ?>><?php echo e(trans('messages.mainapp.menu.reports.overtime')); ?></option>
                            </select>
                        </div>
                        <div class="input-field col s12 m1">
                            <button id="gobtn" class="btn waves-effect waves-light right disabled" onclick="gobtn()"><?php echo e(trans('messages.go')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card-panel">
                    <span style="line-height:0;font-size:22px;font-weight:300"><?php echo e(trans('messages.report')); ?></span>
                    <div class="divider" style="margin:15px 0 10px 0"></div>
                    <table id="report-table" class="display" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:40px">#</th>
                                <th><?php echo e(trans('messages.call.user')); ?></th>
                                <th><?php echo e(trans('messages.call.number')); ?></th>
                                <th><?php echo e(trans('messages.mainapp.menu.department')); ?></th>
                                <th><?php echo e(trans('messages.mainapp.menu.counter')); ?></th>
                                <th><?php echo e(trans('messages.issue')); ?> <?php echo e(trans('messages.time')); ?></th>
                                <th><?php echo e(trans('messages.serving')); ?> <?php echo e(trans('messages.start')); ?></th>
                                <th><?php echo e(trans('messages.serving')); ?> <?php echo e(trans('messages.end')); ?></th>
                                <th><?php echo e(trans('messages.served')); ?> <?php echo e(trans('messages.time')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $calls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $call): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($call->user->name); ?></td>
                                    <td><?php echo e(($call->department->letter!='')?$call->department->letter.'-':''); ?><?php echo e($call->number); ?></td>
                                    <td><?php echo e($call->department->name); ?></td>
                                    <td><?php echo e($call->counter->name); ?></td>
                                    <td><?php echo e($call->queue->created_at->format('h:i:s A')); ?></td>
                                    <td><?php echo e($call->created_at->format('h:i:s A')); ?></td>
                                    <td><?php echo e($call->serving_end->format('h:i:s A')); ?></td>
                                    <td><?php echo e($call->served_time); ?> Min</td>
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
            $('#date').pickadate({
                selectMonths: true,
                selectYears: 15,
                format: 'dd-mm-yyyy',
                clear: false,
                onSet: function(ele) {
                    if(ele.select) {
                        this.close();
                    }
                },
                closeOnSelect: true,
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

        $('#date, #user, #counter, #type').change(function(event){
            var date = $('#date').val();
            var user = $('#user').val();
            var counter = $('#counter').val();
            var type = $('#type').val();

            action = '<?php echo e(url('reports/missed-overtime')); ?>/'+date+'/'+user+'/'+counter+'/'+type;

            if(date=='' || user=='' || counter=='' || type=='') {
                $('#gobtn').addClass('disabled');
            } else {
                $('#gobtn').removeClass('disabled');
            }
        });

        function gobtn() {
            if (!$('#gobtn').hasClass('disabled')) {
                $('body').removeClass('loaded');
                window.location = action;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>