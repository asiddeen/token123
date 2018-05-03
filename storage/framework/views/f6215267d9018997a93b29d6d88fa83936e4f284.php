<?php $__env->startSection('title', trans('messages.mainapp.menu.reports.statistical').' '.trans('messages.report')); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.mainapp.menu.reports.statistical')); ?> <?php echo e(trans('messages.report')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><?php echo e(trans('messages.mainapp.menu.reports.reports')); ?></li>
                        <li class="active"><?php echo e(trans('messages.mainapp.menu.reports.statistical')); ?> <?php echo e(trans('messages.report')); ?></li>
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
                            <label for="date"><?php echo e(trans('messages.date')); ?></label>
                            <input id="date" type="text" placeholder="dd-mm-yyyy">
                        </div>
                        <div class="input-field col s12 m3">
                            <label for="user" class="active"><?php echo e(trans('messages.mainapp.menu.users')); ?></label>
                            <select id="user" class="browser-default">
                                <option value="all"><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.users')); ?></option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($cuser->id); ?>"><?php echo e($cuser->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="input-field col s12 m3">
                            <label for="department" class="active"><?php echo e(trans('messages.mainapp.menu.department')); ?></label>
                            <select id="department" class="browser-default">
                                <option value="all"><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.department')); ?></option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="input-field col s12 m3">
                            <label for="counter" class="active"><?php echo e(trans('messages.mainapp.menu.counter')); ?></label>
                            <select id="counter" class="browser-default">
                                <option value="all"><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.counter')); ?></option>
                                <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($counter->id); ?>"><?php echo e($counter->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="input-field col s12 m1">
                            <button id="gobtn" class="btn waves-effect waves-light right disabled" onclick="gobtn()"><?php echo e(trans('messages.go')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
        });

        $('#date, #user, #department, #counter').change(function(event){
            var date = $('#date').val();
            var user = $('#user').val();
            var department = $('#department').val();
            var counter = $('#counter').val();

            action = '<?php echo e(url('reports/statistical')); ?>/'+date+'/'+user+'/'+department+'/'+counter;

            if(date=='' || user=='' || department=='' || counter=='') {
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