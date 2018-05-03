<?php $__env->startSection('title', trans('messages.mainapp.menu.reports.monthly').' '.trans('messages.report')); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.mainapp.menu.reports.monthly')); ?> <?php echo e(trans('messages.report')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><?php echo e(trans('messages.mainapp.menu.reports.reports')); ?></li>
                        <li class="active"><?php echo e(trans('messages.mainapp.menu.reports.monthly')); ?> <?php echo e(trans('messages.report')); ?></li>
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
                        <div class="input-field col s12 m3">
                            <label for="sdate"><?php echo e(trans('messages.starting')); ?> <?php echo e(trans('messages.date')); ?></label>
                            <input id="sdate" class="date" type="text" placeholder="dd-mm-yyyy">
                        </div>
                        <div class="input-field col s12 m3">
                            <label for="edate"><?php echo e(trans('messages.ending')); ?> <?php echo e(trans('messages.date')); ?></label>
                            <input id="edate" class="date" type="text" placeholder="dd-mm-yyyy">
                        </div>
                        <div class="input-field col s12 m5">
                            <label for="department" class="active"><?php echo e(trans('messages.mainapp.menu.department')); ?></label>
                            <select id="department" class="browser-default">
                                <option value="all"><?php echo e(trans('messages.all')); ?> <?php echo e(trans('messages.mainapp.menu.department')); ?></option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
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
            from_$input = $('#sdate').pickadate({
                selectMonths: true,
                selectYears: 15,
                format: 'dd-mm-yyyy',
                clear: false,
                // onSet: function(ele) {
                //     if(ele.select) {
                //         this.close();
                //     }
                // },
                closeOnSelect: true,
                onClose: function() {
                    document.activeElement.blur();
                }
            });

            to_$input = $('#edate').pickadate({
                selectMonths: true,
                selectYears: 15,
                format: 'dd-mm-yyyy',
                clear: false,
                // onSet: function(ele) {
                //     if(ele.select) {
                //         this.close();
                //     }
                // },
                closeOnSelect: true,
                onClose: function() {
                    document.activeElement.blur();
                }
            });

            from_picker = from_$input.pickadate('picker');
            to_picker = to_$input.pickadate('picker');

            if (from_picker.get('value')) {
                to_picker.set('min', from_picker.get('select'));
            }
            if (to_picker.get('value')) {
                from_picker.set('max', to_picker.get('select'));
            }

            from_picker.on('set', function(event) {
                if (event.select ) {
                    to_picker.set('min', from_picker.get('select'));
                }
                else if ('clear' in event ) {
                    to_picker.set('min', false);
                }
            });
            to_picker.on('set', function(event) {
                if (event.select ) {
                    from_picker.set('max', to_picker.get('select'));
                }
                else if ( 'clear' in event ) {
                    from_picker.set('max', false);
                }
            });
        });

        $('#sdate, #edate, #department').change(function(event){
            var sdate = $('#sdate').val();
            var edate = $('#edate').val();
            var department = $('#department').val();

            action = '<?php echo e(url('reports/monthly/')); ?>/'+department+'/'+sdate+'/'+edate;

            if(sdate=='' || edate=='' || department=='') {
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