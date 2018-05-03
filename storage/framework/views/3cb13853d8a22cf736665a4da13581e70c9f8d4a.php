<?php $__env->startSection('title', trans('messages.settings')); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.settings')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li class="active"><?php echo e(trans('messages.settings')); ?></li>
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
                        <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.mainapp.menu.account')); ?></span>
                        <div class="divider" style="margin:10px 0 10px 0"></div>
                        <form id="account" action="<?php echo e(route('post_settings')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="name"><?php echo e(trans('messages.name')); ?></label>
                                    <input id="name" type="text" name="name" placeholder="<?php echo e(trans('messages.name')); ?>" value="<?php echo e($user->name); ?>" data-error=".name">
                                    <div class="name">
                                        <?php if($errors->has('name')): ?><div class="error"><?php echo e($errors->first('name')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="username"><?php echo e(trans('messages.users.username')); ?></label>
                                    <input id="username" type="text" name="username" placeholder="<?php echo e(trans('messages.users.username')); ?>" value="<?php echo e($user->username); ?>" data-error=".username">
                                    <div class="username">
                                        <?php if($errors->has('username')): ?><div class="error"><?php echo e($errors->first('username')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="role"><?php echo e(trans('messages.users.role')); ?></label>
                                    <input id="role" type="text" placeholder="<?php echo e(trans('messages.users.role')); ?>" value="<?php echo e($user->role_text); ?>" data-error=".role" readonly>
                                    <div class="role">
                                        <?php if($errors->has('role')): ?><div class="error"><?php echo e($errors->first('role')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="email"><?php echo e(trans('messages.users.email')); ?></label>
                                    <input id="email" type="text" name="email" placeholder="<?php echo e(trans('messages.users.email')); ?>" value="<?php echo e($user->email); ?>" data-error=".email">
                                    <div class="email">
                                        <?php if($errors->has('email')): ?><div id="name-error" class="error"><?php echo e($errors->first('email')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
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
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('access', $settings)): ?>
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.company.company')); ?> <?php echo e(trans('messages.settings')); ?></span>
                            <div class="divider" style="margin:10px 0 10px 0"></div>
                            <form id="company" action="<?php echo e(route('post_company')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="name"><?php echo e(trans('messages.name')); ?></label>
                                        <input id="name" type="text" name="name" placeholder="<?php echo e(trans('messages.name')); ?>" value="<?php echo e($settings->name); ?>" data-error=".cname">
                                        <div class="cname">
                                            <?php if($errors->has('name')): ?><div class="error"><?php echo e($errors->first('name')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="email"><?php echo e(trans('messages.users.email')); ?></label>
                                        <input id="email" type="text" name="email" placeholder="<?php echo e(trans('messages.users.email')); ?>" value="<?php echo e($settings->email); ?>" data-error=".cemail">
                                        <div class="cemail">
                                            <?php if($errors->has('email')): ?><div id="name-error" class="error"><?php echo e($errors->first('email')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="address"><?php echo e(trans('messages.company.address')); ?></label>
                                        <textarea id="address" class="materialize-textarea" name="address" placeholder="<?php echo e(trans('messages.company.address')); ?>" data-error=".address" style="min-height:67px"><?php echo e($settings->address); ?></textarea>
                                        <div class="address">
                                            <?php if($errors->has('address')): ?><div class="error"><?php echo e($errors->first('address')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="phone"><?php echo e(trans('messages.company.phone')); ?></label>
                                        <input id="phone" type="text" name="phone" placeholder="<?php echo e(trans('messages.company.phone')); ?>" value="<?php echo e($settings->phone); ?>" data-error=".phone">
                                        <div class="phone">
                                            <?php if($errors->has('phone')): ?><div id="name-error" class="error"><?php echo e($errors->first('phone')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="location"><?php echo e(trans('messages.company.location')); ?></label>
                                        <input id="location" type="text" name="location" placeholder="<?php echo e(trans('messages.company.location')); ?>" value="<?php echo e($settings->location); ?>" data-error=".location">
                                        <div class="location">
                                            <?php if($errors->has('location')): ?><div id="name-error" class="error"><?php echo e($errors->first('location')); ?></div><?php endif; ?>
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
            <?php endif; ?>
        </div>
        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('access', $settings)): ?>
            <div class="row">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.set')); ?> <?php echo e(trans('messages.mainapp.menu.reports.missed')); ?> <?php echo e(trans('messages.and')); ?> <?php echo e(trans('messages.mainapp.menu.reports.overtime')); ?></span>
                            <div class="divider" style="margin:10px 0 10px 0"></div>
                            <form id="overmissed" action="<?php echo e(route('post_over_missed')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="over_time"><?php echo e(trans('messages.mainapp.menu.reports.overtime')); ?> (<?php echo e(trans('messages.in_seconds')); ?>)</label>
                                        <input id="over_time" type="text" name="over_time" placeholder="<?php echo e(trans('messages.in_seconds')); ?>" value="<?php echo e($settings->over_time); ?>" data-error=".over_time">
                                        <div class="over_time">
                                            <?php if($errors->has('over_time')): ?><div class="error"><?php echo e($errors->first('over_time')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="missed_time"><?php echo e(trans('messages.mainapp.menu.reports.missed')); ?> <?php echo e(trans('messages.time')); ?> (<?php echo e(trans('messages.in_seconds')); ?>)</label>
                                        <input id="missed_time" type="text" name="missed_time" placeholder="<?php echo e(trans('messages.in_seconds')); ?>" value="<?php echo e($settings->missed_time); ?>" data-error=".missed_time">
                                        <div class="missed_time">
                                            <?php if($errors->has('missed_time')): ?><div class="error"><?php echo e($errors->first('missed_time')); ?></div><?php endif; ?>
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
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.change')); ?> <?php echo e(trans('messages.default')); ?> <?php echo e(trans('messages.language')); ?></span>
                            <div class="divider" style="margin:10px 0 10px 0"></div>
                            <form id="languagefrm" action="<?php echo e(route('post_locale')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="language" class="active"><?php echo e(trans('messages.select')); ?> <?php echo e(trans('messages.language')); ?></label>
                                        <select id="language" class="browser-default" name="language" data-error=".language">
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if($language->id==$settings->language_id): ?>
                                                    <option value="<?php echo e($language->id); ?>" selected><?php echo e(trans('messages.locales.'.$c_locale.'.'.$language->code)); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($language->id); ?>"><?php echo e(trans('messages.locales.'.$c_locale.'.'.$language->code)); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        <div class="language">
                                            <?php if($errors->has('language')): ?><div class="error"><?php echo e($errors->first('language')); ?></div><?php endif; ?>
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
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $("#account").validate({
            rules: {
                name: {
                    required: true
                },
                username: {
                    required: true,
                    minlength: 6
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6
                },
                password_confirmation: {
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
        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('access', $settings)): ?>
            $("#company").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        email: true
                    }
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
            $("#overmissed").validate({
                rules: {
                    over_time: {
                        required: true,
                        digits: true
                    },
                    missed_time: {
                        required: true,
                        digits: true
                    }
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
            $("#languagefrm").validate({
                rules: {
                    language: {
                        required: true,
                        digits: true
                    }
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
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>