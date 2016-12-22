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
	<link rel="icon" href="<?php echo base_url(); ?>assets/admin/img/favicon.ico" type="image/x-icon">
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

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<?php 
$is_super_admin = $this->config->item('is_super_admin');
// $access_rights = $this->config->item('access_rights');
if(!$is_super_admin){
  $access_permission=$this->config->item('current_page_rights');    
  $current_page_rights = $access_permission['access_permission'];
  $access_rights = explode(',',$current_page_rights);
}
else{
  $access_rights = $this->config->item('access_rights');
}
$feedback_data = $this->config->item('feedback_data');
?>
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- BEGIN LOGO -->
                <a class="brand" href="<?php echo base_url(); ?>admin/dashboard">
                    <img src="<?php echo base_url(); ?>assets/admin/img/logo_new.png" alt="Admin Lab" />
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
                <div id="top_menu" class="nav notify-row">
                    <!-- BEGIN NOTIFICATION -->
                    <ul class="nav top-menu">
                        <!-- BEGIN SETTINGS -->
                        <!-- <li class="dropdown">
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?php echo base_url(); ?>admin/dashboard" data-original-title="Settings">
                                <i class="icon-cog"></i>
                            </a>
                        </li> -->
                        <!-- END SETTINGS -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <li class="dropdown" id="header_inbox_bar">
                            <a href="<?php echo base_url(); ?>admin/dashboard" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-envelope-alt"></i>     
                                <span class="badge badge-important">5</span>
                            </a>
                            
                            <ul class="dropdown-menu extended inbox">
                                <li>
                                    <!-- <p>You have 5 new messages</p> -->
                                </li>
                                <li>
                             <?php
                                foreach ($feedback_data as $feed) :
                                if($feed['is_viewed'] == 0){  ?>
                                    <a class="job_full_view popup_fields" data-href="other_module/get_feedback_full_view"  data-mode="full_view"  data-popup-open="popup_section">
                                        <!-- <span class="photo"><img src="<?php echo base_url(); ?>assets/admin/img/avatar-mini.png" alt="avatar" /></span> -->
									<!-- <span class="subject">
									<span class="from">Dulal Khan</span> -->
									<span class="time"><?php echo $feed['feedback_form_created_date']; ?></span>
									<!-- </span> -->
									<span class="message">
									    <?php echo $feed['feedback_form_message']; ?>
									</span>
                                    </a>
                                    <?php }  endforeach;    ?>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/feedback_form">See all messages</a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- <li class="dropdown" id="header_notification_bar">
                            <a href="<?php echo base_url(); ?>admin/dashboard" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="icon-bell-alt"></i>
                                <span class="badge badge-warning">7</span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <li>
                                    <p>You have 7 new notifications</p>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Server #3 overloaded.
                                        <span class="small italic">34 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="label label-warning"><i class="icon-bell"></i></span>
                                        Server #10 not respoding.
                                        <span class="small italic">1 Hours</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Database overloaded 24%.
                                        <span class="small italic">4 hrs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="label label-success"><i class="icon-plus"></i></span>
                                        New user registered.
                                        <span class="small italic">Just now</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                        Application error.
                                        <span class="small italic">10 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">See all notifications</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- END NOTIFICATION DROPDOWN -->

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
                            <!-- <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?php echo base_url(); ?>admin/dashboard" data-original-title="Help">
                                <i class="icon-headphones"></i>
                            </a> -->
                        </li>
                        <!-- END SUPPORT -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>admin/dashboard" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>assets/admin/img/profile-pic.jpg" alt="" class="profile_picture">
                                <?php
                                    $session_data = $this->session->userdata("admin_login_session");
                                ?>
                                <span class="username"> <?php echo $session_data['admin_user_name']; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                               <li><a href="<?php echo base_url(); ?>admin/edit_profile"><i class="icon-edit"></i>  Edit Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/change_password"><i class="icon-exchange"></i>  Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>admin/logout"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
	<!-- END HEADER -->
    <?php 
        // echo "access_rights";
        // echo "<pre>";
        // print_r($this->config->item('admin_operation_rights'));
        // echo "</pre>";
        // echo "<pre>";
        // print_r($this->config->item('current_page_rights'));
        // echo "</pre>";
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
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->