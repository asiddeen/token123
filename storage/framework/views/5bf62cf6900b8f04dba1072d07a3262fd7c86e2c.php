<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <title>Forgot Password | Queue</title>
        <link rel="icon" href="<?php echo e(asset('assets/fav.ico')); ?>">

        <link href="<?php echo e(asset('assets/css/materialize.min.css')); ?>"type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo e(asset('assets/css/style.min.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo e(asset('assets/css/layouts/page-center.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo e(asset('assets/js/plugins/prism/prism.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo e(asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
    </head>

    <body class="teal">
        <!-- <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div> -->

        <?php if(count($errors)): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div id="card-alert" class="card red">
                    <div class="card-content white-text" style="padding-left:11px">
                        <p><?php echo e($error); ?></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close" style="right:3px">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
        <?php if($status): ?>
            <div id="card-alert" class="card green">
                <div class="card-content white-text" style="padding-left:11px">
                    <p><?php echo e(trans($status)); ?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close" style="right:3px">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>

        <div id="login-page" class="row">
            <div class="col s12 z-depth-4 card-panel">
                <form class="login-form" action="<?php echo e(route('post_email')); ?>" method="post" onsubmit="return load()">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="input-field col s12 center">
                            <p class="center login-form-text" style="font-size:23px;margin-top:5px">Queue</p>
                            <p class="center login-form-text" style="letter-spacing:1px">registered email</p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-communication-email prefix"></i>
                            <input id="email" type="text" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" autofocus>
                            <label for="email" class="active">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect waves-light col s12">Reset</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <p class="margin medium-small"><a href="<?php echo e(route('get_login')); ?>">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row center-align white-text" style="margin-bottom:0">
                <span>Powered by <a href="" target="_blank" style="color:#ccc">Queue</a></span>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/jquery-1.11.2.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/materialize.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/prism/prism.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins.min.js')); ?>"></script>
        <script>
            function load(){
                $('body').removeClass('loaded');
                return true;
            }
        </script>
        <?php echo $__env->make('common.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>
