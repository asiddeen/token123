<?php $__env->startSection('title', trans('messages.change').' '.trans('messages.users.password')); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.add')); ?> <?php echo e(trans('messages.mainapp.menu.users')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('users.index')); ?>"><?php echo e(trans('messages.mainapp.menu.users')); ?></a></li>
                        <li class="active"><?php echo e(trans('messages.change')); ?> <?php echo e(trans('messages.users.password')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3" style="padding-top:10px;padding-bottom:10px">
                <a class="btn-floating waves-effect waves-light orange tooltipped right" href="<?php echo e(route('users.index')); ?>" data-position="top" data-tooltip="<?php echo e(trans('messages.cancel')); ?>"><i class="mdi-navigation-arrow-back"></i></a>
                <form id="pass" action="<?php echo e(route('post_user_password', ['users' => $cuser->id])); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password"><?php echo e(trans('messages.users.password')); ?></label>
                            <input id="password" type="password" name="password" placeholder="<?php echo e(trans('messages.users.password')); ?>" value="<?php echo e(old('password')); ?>" data-error=".password">
                            <div class="password">
                                <?php if($errors->has('password')): ?><div id="name-error" class="error"><?php echo e($errors->first('password')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password_confirmation"><?php echo e(trans('messages.users.confirm')); ?> <?php echo e(trans('messages.users.password')); ?></label>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="<?php echo e(trans('messages.users.confirm')); ?> <?php echo e(trans('messages.users.password')); ?>" value="<?php echo e(old('password_confirmation')); ?>" data-error=".password_confirmation">
                            <div class="password_confirmation">
                                <?php if($errors->has('password_confirmation')): ?><div id="name-error" class="error"><?php echo e($errors->first('password_confirmation')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right" type="submit">
                                <?php echo e(trans('messages.update')); ?><i class="mdi-action-swap-vert left"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $("#pass").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>