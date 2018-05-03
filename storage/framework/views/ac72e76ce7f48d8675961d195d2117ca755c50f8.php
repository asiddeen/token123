<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <title><?php echo $__env->yieldContent('title'); ?> | Queue</title>
        <link rel="icon" href="<?php echo e(asset('assets/fav.ico')); ?>">
        <link href="<?php echo e(asset('assets/css/materialize.min.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo e(asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
        <?php echo $__env->yieldContent('css'); ?>
        <link href="<?php echo e(asset('assets/css/style.min.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
    </head>

    <body>
        <!-- <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div> -->

        <header id="header" class="page-topbar">
            <div class="navbar-fixed">
                <nav class="navbar-color">
                    <div class="nav-wrapper">
                        <ul class="left">
                            <li><h1 class="logo-wrapper"><a href="<?php echo e(route('dashboard')); ?>" class="brand-logo darken-1">Queue</a><span class="logo-text">Queue</span></h1></li>
                        </ul>
                        <ul class="right hide-on-med-and-down">
                            <!-- <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown"><img src="<?php echo e(asset('assets/images/flag-icons/'.$clocale->image)); ?>" alt="<?php echo e($clocale->name); ?>" /></a></li> -->
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-editor-insert-link"></i></a></li>
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a></li>
                        </ul>
                        <ul id="translation-dropdown" class="dropdown-content" style="max-height:250px">
                            <li><h5 style="font-size:1rem;padding:0 1rem 0 1rem;font-weight:500"><?php echo e(trans('messages.mainapp.select_language')); ?></h5></li>
                            <li class="divider"></li>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <li<?php echo ($clocale->code==$language->code)?' class="active"':''; ?>><a href="<?php echo e(route('change_locale', ['locale' => $language->code])); ?>"><img src="<?php echo e(asset('assets/images/flag-icons/'.$language->image)); ?>" alt="<?php echo e($language->name); ?>" />  <span class="language-select"><?php echo e(trans('messages.locales.'.$clocale->code.'.'.$language->code)); ?></span></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                        <ul id="notifications-dropdown" class="dropdown-content">
                            <!-- <li><h5>LINKS</h5></li> -->
                            <li class="divider"></li>
                            <li><a href="<?php echo e(route('display')); ?>" target="_blank" style="font-weight:400"><?php echo e(trans('messages.mainapp.display_url')); ?></a></li>
                            <li><a href="<?php echo e(route('add_to_queue')); ?>" target="_blank" style="font-weight:400"><?php echo e(trans('messages.mainapp.issue_url')); ?></a></li>
                        </ul>
                        <ul class="right hide-on-med-and-down">
                            <span class="truncate" style="margin-right:20px;font-size:19px"><?php echo e($company_name); ?></span>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div id="main">
            <div class="wrapper">
                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img src="<?php echo e(asset('assets/images/avatar.jpg')); ?>" alt="" class="circle responsive-img valign profile-image">
                                </div>
                                <div class="col col s8 m8 l8">
                                    <ul id="profile-dropdown" class="dropdown-content">
                                        <!-- <li><a href="<?php echo e(route('settings')); ?>"><i class="mdi-action-settings"></i> <?php echo e(trans('messages.settings')); ?></a></li> -->
                                        <li class="divider"></li>
                                        <li><a class="frmsubmit" href="<?php echo e(route('logout')); ?>" message="false" method="post"><i class="mdi-hardware-keyboard-tab"></i> <?php echo e(trans('messages.mainapp.logout')); ?></a></li>
                                    </ul>
                                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn truncate" href="#" data-activates="profile-dropdown">
                                        <?php echo e($user->name); ?><i class="mdi-navigation-arrow-drop-down right"></i>
                                    </a>
                                    <p class="user-roal"><?php echo e($user->role_text); ?></p>
                                </div>
                            </div>
                        </li>
                        <?php echo $__env->yieldContent('menu'); ?>
                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only teal lighten-1"><i class="mdi-navigation-menu"></i></a>
                </aside>

                <section id="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </section>
            </div>
        </div>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    <span>Powered by <a class="grey-text text-lighten-3" href="#" target="_blank">Queue</a> All rights reserved.</span>
                    <span class="right"> <span class="grey-text text-lighten-3">Version</span> 1.5.0</span>
                </div>
            </div>
        </footer>
        <?php echo $__env->yieldContent('print'); ?>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/jquery-1.11.2.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/materialize.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('script'); ?>
        <script>
            $(function() {
                $('#main').css({'min-height': $(window).height()-134+'px'});
                $(window).resize(function() {
                    $('#main').css({'min-height': $(window).height()-134+'px'});
                });
                $('#translation-dropdown').perfectScrollbar();
                $('select').each(function() {
                    if(!$(this).parent().hasClass('picker__header')) {
                        $(this).select2();
                    }
                });
            });
            $(".frmsubmit").on("click",function(e) {
                var message = 'Are you sure you want to delete?';
                if(e.currentTarget.attributes.message!=undefined) message = e.currentTarget.attributes.message.value;
                var cnfrm = true;
                if(e.currentTarget.attributes.message!=undefined && e.currentTarget.attributes.message.value=='false') cnfrm = false;
                if (cnfrm) {
                    if(confirm(message)) {
                        e.preventDefault();
                        var myForm = '<form id="hidfrm" action="'+e.currentTarget.attributes.href.value+'" method="post"><?php echo e(csrf_field()); ?><input type="hidden" name="_method" value="'+e.currentTarget.attributes.method.value+'"></form>';
                        $('body').append(myForm);
                        myForm = $('#hidfrm');
                        myForm.submit();
                    }
                } else {
                    e.preventDefault();
                    var myForm = '<form id="hidfrm" action="'+e.currentTarget.attributes.href.value+'" method="post"><?php echo e(csrf_field()); ?><input type="hidden" name="_method" value="'+e.currentTarget.attributes.method.value+'"></form>';
                    $('body').append(myForm);
                    myForm = $('#hidfrm');
                    myForm.submit();
                }
                return false;
            });
            <?php if(!Request::is('calls*')): ?>
                $(document).ajaxStart(function() {
                    $("body").removeClass('loaded');
                    Pace.restart();
                });
                $(document).ajaxStop(function() {
                    $("body").addClass('loaded');
                });
            <?php endif; ?>
        </script>
        <?php echo $__env->make('common.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>
