<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.3
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title> Teachers Recruit </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="icon" href="<?php echo base_url(); ?>assets/admin/img/tr_favicon.ico" type="image/x-icon">
	<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style_default.css" rel="stylesheet" id="style_color" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo base_url(); ?>assets/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/uniform/css/uniform.default.css" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" /> 
    <!-- Css import link for charts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/charts/chart.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/charts/xcharts.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/charts/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/daterangepicker.css">    
	<!--My custom Fonts--> 
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/default.css" type="text/css"> 

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

	<!-- BEGIN HEADER -->
	    <div id="header" class="navbar navbar-inverse navbar-fixed-top sub_pre_section">
        <div class="top_layer"></div><!-- top_layer -->
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- BEGIN LOGO -->
                <a class="brand" href="<?php echo base_url(); ?>main/dashboard">
                    <img class="tr_logo pull-left" src="<?php echo base_url(); ?>assets/admin/img/new_logo.png" alt="Logo" />
                    <!-- <h4 class="pull-left"><strong><span class="logo_firstword">Teachers</span> <span class="logo_secondword">Recruit</span></strong></h4> -->
                    <span class="clearfix"> </span>
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="arrow"></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <?php if(!empty($this->session->userdata("admin_login_status")) && strpos($_SERVER['REQUEST_URI'], 'admin') === FALSE): ?>
                    <div id="top_menu" class="nav notify-row">
                        <!-- BEGIN NOTIFICATION -->
                        <ul class="nav top-menu">
                        
                            <!-- BEGIN SETTINGS -->
                            <!-- <li class="dropdown">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?php echo base_url(); ?>main/dashboard" data-original-title="Settings">
                                    <i class="icon-cog"></i>
                                </a>
                            </li> 
                            <!-- END SETTINGS -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown" id="header_inbox_bar">
                            <i class="icon-caret-up caret-up"></i>
                                    <div class="clear_both"></div>
                                <a class="dropdown-toggle pa dropdown_toggle_act">
                                    <i class="icon-envelope-alt"></i>     
                                    <span id="not_count" class="badge badge-important"><?php echo $this->config->item('feedback_count'); ?></span>
                                </a>                              
                                <ul class="dropdown-menu extended inbox">
                                    <li>
                                        <!-- <p>You have 5 new messages</p> -->
                                    </li>
                                    <li>
                                 <?php
                                    foreach ($feedback_data as $feed) :
                                    if($feed['is_viewed'] == 0){  ?>
                                        <a class="job_full_view popup_fields" data-id="<?php echo $feed['feedback_form_id']; ?>" data-href="get_feedback_full_view"  data-mode="full_view"  data-popup-open="popup_section" data-section="header">
                                            <!-- <span class="photo"><img src="<?php echo base_url(); ?>assets/admin/img/avatar-mini.png" alt="avatar" /></span> -->
    									<!-- <span class="subject">
    									<span class="from">Dulal Khan</span> -->
    									<span class="time time_act"><?php echo $feed['feedback_form_created_date']; ?></span>
    									<!-- </span> -->
    									<span class="message message_res">
    									    <?php echo $feed['feedback_form_message']; ?>
    									</span>
                                        </a>
                                        <?php }  endforeach;    ?>
                                    </li> 
                                    <li>
                                        <a href="<?php echo base_url(); ?>main/feedback_form">See all messages</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN SUPPORT -->
                            <!-- <li class="dropdown mtop5">

                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="index.php#" data-original-title="Chat">
                                    <i class="icon-comments-alt"></i>
                                </a>
                            </li> -->
                            <li class="dropdown mtop5">
                                <!-- <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?php echo base_url(); ?>main/dashboard" data-original-title="Help">
                                    <i class="icon-headphones"></i>
                                </a> -->
                            </li>
                            <!-- END SUPPORT -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="<?php echo base_url(); ?>main/dashboard" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>assets/admin/img/profile-pic.jpg" alt="" class="profile_picture">
                                    <?php
                                        $session_data = $this->session->userdata("admin_login_session");
                                    ?>
                                    <span class="username"> <?php echo $session_data['admin_user_name']; ?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                   <li><a href="<?php echo base_url(); ?>main/edit_profile"><i class="icon-edit"></i>  Edit Profile</a></li>
                                    <li><a href="<?php echo base_url(); ?>main/change_password"><i class="icon-exchange"></i>  Change Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>main/logout"><i class="icon-key"></i> Log Out</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
   

    <div class="popup" data-popup="popup_section">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Feedback
              </h4>                        
            </div>
            <div class="widget-body form pop_details_section">
                              
            </div>
          </div>
          <p>
            <a class="popup_close_act" data-popup-close="popup_section" href="#">Close</a>
          </p>
          <a class="popup-close popup_close_act" data-popup-close="popup_section" href="#">x</a>
        </div>
      </div>
     <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->

    <?php 
        if(!empty($this->session->userdata("admin_login_status")) && strpos($_SERVER['REQUEST_URI'], 'admin') === FALSE):
            $is_super_admin = $this->session->userdata("admin_login_session")['is_super_admin'];
    ?>
        <!-- BEGIN SIDEBAR -->
            <div id="sidebar" class="nav-collapse collapse">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <div class="navbar-inverse">
                    <form class="navbar-search visible-phone">
                        <input type="text" class="search-query" placeholder="Search" />
                    </form>
                </div>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                <!-- BEGIN SIDEBAR MENU -->
              
                <ul class="sidebar-menu">
                    <?php 
                        $admin_modules = $this->config->item('admin_modules');
                        $admin_operation_rights = $this->config->item('admin_operation_rights');
                        foreach ($admin_modules as $key => $value):
                            $result = array();
                            array_walk($value['sub_module'], function($v) use(&$result) {
                                $result[] = $id = substr($v['route_url'], strrpos($v['route_url'], '/') + 1);
                            });
                            $main_module_exists = in_array($value['main_module'], array_column($admin_operation_rights, 'main_module'));
                            //if currently logged group has privilege access of this module, it will show in dashboard, otherwise won't show
                            if($main_module_exists || $is_super_admin):
                                if(in_array($this->uri->segment(2), $result)): ?>
                                    <li class="has-sub active open">
                                <?php
                                else :
                                ?>     
                                    <li class="has-sub">
                                <?php
                                endif;
                                ?>  
                                    <a href="javascript:;" class="">
                                        <span class="icon-box"> <i class="<?php echo $value['icon_name'] ?>"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper($value['main_module']);?></span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub sub_scroll_section">
                                        <?php 
                                        foreach ($value['sub_module'] as $det): 
                                        //Check loaded sub module access for this user group, here recursiveFind is custom function to search our searched value exists wherever in that mutlidimensional arry
                                        $sub_module_exists = recursiveFind($admin_operation_rights, $det['name']);
                                        if($sub_module_exists || $is_super_admin):
                                        ?>
                                            <li <?php if($this->uri->segment(2) == $det['name']) echo "class='active_sidebar'"; ?>>
                                                <a href="<?php echo $det['route_url']; ?>" class="module_details">
                                                    <!-- <span class="icon-box"> <i class="icon-dashboard"></i></span> --> <span class="sub_module_data"><?php echo ucwords($det['name']); ?></span><span class="sub_module_access"><?php echo $det['access_operation']; ?></span>
                                                <!-- <span class="arrow"></span> -->
                                                </a>
                                            </li>
                                        <?php 
                                        endif;
                                        endforeach; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                    <?php endforeach; ?>
                   </ul>
                <!-- END SIDEBAR MENU -->
               </div> 
          
            <!-- END SIDEBAR -->
        <?php endif; ?>

