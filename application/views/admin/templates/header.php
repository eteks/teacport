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
                        <li class="dropdown">
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?php echo base_url(); ?>admin/dashboard" data-original-title="Settings">
                                <i class="icon-cog"></i>
                            </a>
                        </li>
                        <!-- END SETTINGS -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <li class="dropdown" id="header_inbox_bar">
                            <a href="<?php echo base_url(); ?>admin/dashboard" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-envelope-alt"></i>
                                <span class="badge badge-important">5</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <li>
                                    <p>You have 5 new messages</p>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="photo"><img src="<?php echo base_url(); ?>assets/admin/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Dulal Khan</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
									    Hello, this is an example messages please check
									</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="photo"><img src="<?php echo base_url(); ?>assets/admin/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Rafiqul Islam</span>
									<span class="time">10 mins</span>
									</span>
									<span class="message">
									 Hi, Mosaddek Bhai how are you ?
									</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="photo"><img src="<?php echo base_url(); ?>assets/admin/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Sumon Ahmed</span>
									<span class="time">3 hrs</span>
									</span>
									<span class="message">
									    This is awesome dashboard templates
									</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">
                                        <span class="photo"><img src="<?php echo base_url(); ?>assets/admin/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Dulal Khan</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
									    Hello, this is an example messages please check
									</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/dashboard">See all messages</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <li class="dropdown" id="header_notification_bar">
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
                        </li>
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
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?php echo base_url(); ?>admin/dashboard" data-original-title="Help">
                                <i class="icon-headphones"></i>
                            </a>
                        </li>
                        <!-- END SUPPORT -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>admin/dashboard" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>assets/admin/img/profile-pic.jpg" alt="" class="profile_picture">
                                <span class="username">Administrator</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-user"></i> My Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-tasks"></i> My Tasks</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-calendar"></i> Calendar</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>admin/admin_login/teac_admin_logout"><i class="icon-key"></i> Log Out</a></li>
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
                <li class="has-sub active">
                    <a href="<?php echo base_url(); ?>admin/dashboard" class="">
                        <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                        <!-- <span class="arrow"></span> -->
                    </a>
                    <!-- <ul class="sub">
                        <li><a class="" href="index.php">Dashboard 1</a></li>
                        <li class="active"><a class="" href="index.php">Dashboard 2</a></li>

                    </ul> -->
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-user"></i></span> Admin Users
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/user_groups">User Groups</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">User Accounts</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Modules</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Privileges</a></li>
                        <!-- <li><a class="" href="jquery_ui.php">jQuery UI Component</a></li>
                        <li><a class="" href="ui_elements_tabs_accordions.php">Tabs & Accordions</a></li>
                        <li><a class="" href="ui_elements_typography.php">Typography</a></li>
                        <li><a class="" href="tree_view.php">Tree View</a></li>
                        <li><a class="" href="nestable.php">Nestable List</a></li> -->
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-th"></i></span> Master Data
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/state">State</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/district">District</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/institution_types">Institution Type</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/extra_curricular">Extra-Curricular</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/languages">Languages</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/qualification">Qualification</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/class_level">Class Level</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/departments">Department</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/subject">Subject</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/university">Job Posting Details</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-sitemap"></i></span> Job Providers
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="" href="<?php echo base_url(); ?>admin/job_provider_profile">Profile</a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url(); ?>admin/job_provider_vacancies">Vacancies Posted</a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url(); ?>admin/dashboard">Organization Activities</a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url(); ?>admin/dashboard">Mail Details & Status</a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url(); ?>admin/dashboard">Ads Posted</a>
                        </li>
                    </ul>
                </li>
               <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-search"></i></span> Job Seekers
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Profile</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Job Perferences</a></li>                    
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Job Applied</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Mail Details & Status</a></li> 
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-wrench"></i></span> Plan Settings
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Plan Creation & Maintanence</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-cogs"></i></span> Settings
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Payment Gateway Setting</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">SMS Gateway Setting</a></li>                    
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Configuration Option</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Template Logo</a></li> 
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-tasks"></i></span> Others
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Feedback Form</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Site Visits Tracking</a></li>                    
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Logs</a></li>
                    </ul>
                </li>            
               
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->