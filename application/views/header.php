<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title?></title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <link href="<?php echo base_url('/assets/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/css/animate.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/css/admin.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/plugins/data-tables/DT_bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/plugins/advanced-datatable/css/demo_table.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/plugins/advanced-datatable/css/demo_page.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/select2.css');?>" rel="stylesheet">
    <script src="<?php echo base_url('/assets/js/jquery-2.1.0.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
    <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/datepicker.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css'); ?>" rel="stylesheet" type="text/css" />


</head>
<body class="blue_thm  fixed_header left_nav_fixed">

<?php
if ($this->session->userdata('logged_in')!=false){
?>
<div class="header_bar">
    <div class="brand">
        <div class="logo" style="display:block"><span class="theme_color">КОЛЛЕЖ</span> Кадр</div>
        <div class="small_logo" style="display:none"><img src="<?php echo base_url()?>/assets/images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="<?php echo base_url()?>/assets/images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
    </div>
      <div class="header_top_bar">
            <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
        <div class="top_right_bar">
            <div class="top_right">
                <div class="top_right_menu">
                    <ul>
                        <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> Tasks <span class="badge badge">8</span> </a>
                            <ul class="drop_down_task dropdown-menu">
                                <div class="top_pointer"></div>
                                <li>
                                    <p class="number">You have 7 pending tasks</p>
                                </li>
                                <li> <a href="task.html" class="task">
                                        <div class="green_status task_height" style="width:80%;"></div>
                                        <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right green_label">80%</span> </div>
                                        <div class="task_detail">Task details goes here</div>
                                    </a> </li>
                                <li> <a href="task.html" class="task">
                                        <div class="yellow_status task_height" style="width:50%;"></div>
                                        <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right yellow_label">50%</span> </div>
                                        <div class="task_detail">Task details goes here</div>
                                    </a> </li>
                                <li> <a href="task.html" class="task">
                                        <div class="blue_status task_height" style="width:70%;"></div>
                                        <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right blue_label">70%</span> </div>
                                        <div class="task_detail">Task details goes here</div>
                                    </a> </li>
                                <li> <a href="task.html" class="task">
                                        <div class="red_status task_height" style="width:85%;"></div>
                                        <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right red_label">85%</span> </div>
                                        <div class="task_detail">Task details goes here</div>
                                    </a> </li>
                                <li> <span class="new"> <a href="task.html" class="pull_left">Create New</a> <a href="task.html" class="pull-right">View All</a> </span> </li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> Mail <span class="badge badge color_1">4</span> </a>
                            <ul class="drop_down_task dropdown-menu">
                                <div class="top_pointer"></div>
                                <li>
                                    <p class="number">You have 4 mails</p>
                                </li>
                                <li> <a href="readmail.html" class="mail"> <span class="photo"><img src="<?php echo base_url()?>/assets/images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>
                                <li> <a href="readmail.html" class="mail"> <span class="photo"><img src="<?php echo base_url()?>/assets/images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>
                                <li> <a href="readmail.html" class="mail red_color"> <span class="photo"><img src="<?php echo base_url()?>/assets/images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>
                                <li> <a href="readmail.html" class="mail"> <span class="photo"><img src="<?php echo base_url()?>/assets/images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img src="<?php echo base_url()?>/assets/images/user.png" /><span class="user_adminname"><?php echo $username['nname']?></span> <b class="caret"></b> </a>
                <ul class="dropdown-menu">
                    <div class="top_pointer"></div>
<!--                    <li> <a href="profile.html"><i class="fa fa-user"></i> Profile</a> </li>-->
<!--                    <li> <a href="help.html"><i class="fa fa-question-circle"></i> Help</a> </li>-->
<!--                    <li> <a href="settings.html"><i class="fa fa-cog"></i> Setting </a></li>-->
                    <li> <a href="<?php echo base_url('/users/logout')?>"><i class="fa fa-power-off"></i> Чиқиш</a> </li>
                </ul>
            </div>

<!--            <a href="javascript:;" class="toggle-menu menu-right push-body jPushMenuBtn rightbar-switch"><i class="fa fa-comment chat"></i></a>-->

        </div>
    </div>
    <!--\\\\\\\ header top bar end \\\\\\-->
</div>
<?php }?>
