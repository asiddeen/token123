<?php $__env->startSection('title', trans('messages.mainapp.menu.call')); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('assets/js/plugins/data-tables/css/jquery.dataTables.min.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.mainapp.menu.call')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li class="active"><?php echo e(trans('messages.mainapp.menu.call')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.call.new_call')); ?></span>
                        <div class="divider" style="margin:10px 0 10px 0"></div>
                        <form id="new_call" action="<?php echo e(route('post_call')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php if(!$user->is_admin): ?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="user"><?php echo e(trans('messages.call.user')); ?></label>
                                        <input id="user" type="hidden" name="user" value="<?php echo e($user->id); ?>" data-error=".user">
                                        <input type="text" data-error=".user" value="<?php echo e($user->name); ?>" readonly>
                                        <div class="user">
                                            <?php if($errors->has('user')): ?><div class="error"><?php echo e($errors->first('user')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="user" class="active"><?php echo e(trans('messages.call.user')); ?></label>
                                        <select id="user" class="browser-default" name="user" data-error=".user">
                                            <option value=""><?php echo e(trans('messages.select')); ?> <?php echo e(trans('messages.call.user')); ?></option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($cuser->id); ?>"<?php echo $cuser->id==old('user')?' selected':''; ?>><?php echo e($cuser->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        <div class="user">
                                            <?php if($errors->has('user')): ?><div class="error"><?php echo e($errors->first('user')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="department" class="active"><?php echo e(trans('messages.mainapp.menu.department')); ?></label>
                                    <select id="department" class="browser-default" name="department" data-error=".department">
                                        <option value=""><?php echo e(trans('messages.select')); ?> <?php echo e(trans('messages.mainapp.menu.department')); ?></option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if(session()->has('department') && ($department->id==session()->get('department'))): ?>
                                                <option value="<?php echo e($department->id); ?>" selected><?php echo e($department->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <div class="department">
                                        <?php if($errors->has('department')): ?><div class="error"><?php echo e($errors->first('department')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="counter" class="active"><?php echo e(trans('messages.mainapp.menu.counter')); ?></label>
                                    <select id="counter" class="browser-default" name="counter" data-error=".counter">
                                        <option value=""><?php echo e(trans('messages.select')); ?> <?php echo e(trans('messages.mainapp.menu.counter')); ?></option>
                                        <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if(session()->has('counter') && ($counter->id==session()->get('counter'))): ?>
                                                <option value="<?php echo e($counter->id); ?>" selected><?php echo e($counter->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($counter->id); ?>"><?php echo e($counter->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <div class="counter">
                                        <?php if($errors->has('counter')): ?><div class="error"><?php echo e($errors->first('counter')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light right" type="submit">
                                        <?php echo e(trans('messages.call.call_next')); ?><i class="mdi-navigation-arrow-forward right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.call.click_department')); ?></span>
                        <div class="divider" style="margin:10px 0 10px 0"></div>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <span class="btn waves-effect waves-light" onclick="call_dept(<?php echo e($department->id); ?>)" style="margin-bottom:10px;margin-right:5px;text-transform:none"><?php echo e($department->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content" style="font-size:14px">
                        <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.call.todays_queue')); ?></span>
                        <div class="divider" style="margin:10px 0 10px 0"></div>
                        <table id="call-table" class="display" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('messages.mainapp.menu.department')); ?></th>
                                    <th><?php echo e(trans('messages.call.number')); ?></th>
                                    <th><?php echo e(trans('messages.call.called')); ?></th>
                                    <th><?php echo e(trans('messages.mainapp.menu.counter')); ?></th>
                                    <th><?php echo e(trans('messages.call.recall')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('print'); ?>
    <?php if(session()->has('department_name')): ?>
        <style>#printarea{display:none;text-align:center}@media  print{#loader-wrapper,header,#main,footer,#toast-container{display:none}#printarea{display:block;}}@page{margin:0}</style>
        <div id="printarea" style="line-height:1.25">
            <span style="font-size:27px; font-weight: bold"><?php echo e($company_name); ?></span><br>
            <span style="font-size:25px"><?php echo e(session()->get('department_name')); ?></span><br>
            <span style="font-size:20px">Your Priority Number</span><br>
            <span><h3 style="font-size:70px;font-weight:bold;margin:0;line-height:1.5"><?php echo e(session()->get('number')); ?></h3></span>
            <span style="font-size:20px">Please wait for your turn</span><br>
            <!-- <span style="font-size:20px">Total customer(s) waiting: <?php echo e(session()->get('total')-1); ?></span><br> -->
            <span><?php echo e(\Carbon\Carbon::now()->format('d-m-Y')); ?></span> | <span><?php echo e(\Carbon\Carbon::now()->format('h:i:s A')); ?></span>
        </div>
        <script>
            window.onload = function(){window.print();}
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
    <script>
        $("#new_call").validate({
            rules: {
                user: {
                    required: true,
                    digits: true
                },
                department: {
                    required: true,
                    digits: true
                },
                counter: {
                    required: true,
                    digits: true
                },
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
        function call_dept(value) {
            $('body').removeClass('loaded');
            var myForm1 = '<form id="hidfrm1" action="<?php echo e(url('calls/dept')); ?>/'+value+'" method="post"><?php echo e(csrf_field()); ?></form>';
            $('body').append(myForm1);
            myForm1 = $('#hidfrm1');
            myForm1.submit();
        }

        function recall(call_id) {
            $('body').removeClass('loaded');
            var data = 'call_id='+call_id+'&_token=<?php echo e(csrf_token()); ?>';
            $.ajax({
                type:"POST",
                url:"<?php echo e(route('post_recall')); ?>",
                data:data,
                cache:false,
                success: function(response) {
                    location.reload();
                }
            });
        }

        $(function() {
            var calltable = $('#call-table').dataTable({
                "oLanguage": {
                    "sLengthMenu": "Show _MENU_",
                    "sSearch": "Search"
                },
                "columnDefs": [{
                    "targets": [ -1 ],
                    "searchable": false,
                    "orderable": false
                }],
                "ajax": "<?php echo e(url('assets/files/call')); ?>",
                "columns": [
                    { "data": "id" },
                    { "data": "department" },
                    { "data": "number" },
                    { "data": "called" },
                    { "data": "counter" },
                    { "data": "recall" }
                ]
            });

            setInterval(function(){
                calltable.api().ajax.reload(null,false);
            }, 3000);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>