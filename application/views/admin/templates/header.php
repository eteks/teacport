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
	<link href="<?php echo base_url(); ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style_default.css" rel="stylesheet" id="style_color" />
	<!-- <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-multiselect/bootstrap-multiselect.css"></script> -->
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
                                <li><a href="<?php echo base_url(); ?>admin/login/index_login"><i class="icon-key"></i> Log Out</a></li>
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
                        <span class="icon-box"> <i class="icon-user"></i></span> Users
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Job Seeker</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Job Provider</a></li>
                        <!-- <li><a class="" href="jquery_ui.php">jQuery UI Component</a></li>
                        <li><a class="" href="ui_elements_tabs_accordions.php">Tabs & Accordions</a></li>
                        <li><a class="" href="ui_elements_typography.php">Typography</a></li>
                        <li><a class="" href="tree_view.php">Tree View</a></li>
                        <li><a class="" href="nestable.php">Nestable List</a></li> -->
                    </ul>
                </li>
                <!-- <li class="has-sub">
                    <a href="<?php echo base_url(); ?>admin/dashboard" class="">
                        <span class="icon-box"> <i class="icon-dashboard"></i></span> Institution                        
                    </a>                    
                </li> -->
               <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-globe"></i></span> Jobs
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Job Ads</a></li>
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Job Applications</a></li>
                        <!-- <li><a class="" href="jquery_ui.php">jQuery UI Component</a></li>
                        <li><a class="" href="ui_elements_tabs_accordions.php">Tabs & Accordions</a></li>
                        <li><a class="" href="ui_elements_typography.php">Typography</a></li>
                        <li><a class="" href="tree_view.php">Tree View</a></li>
                        <li><a class="" href="nestable.php">Nestable List</a></li> -->
                    </ul>
                </li>
                <!-- <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Location
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="ui_elements_general.php">State</a></li>
                        <li><a class="" href="ui_elements_buttons.php">District</a></li>                        
                    </ul>
                </li> -->
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-tasks"></i></span> Statistics
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url(); ?>admin/dashboard">Reports</a></li>
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
                    </ul>
                </li>
               <!--  <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Components
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="calendar.php">Calendar</a></li>
                        <li><a class="" href="grids.php">Grids</a></li>
                        <li><a class="" href="charts.php">Visual Charts</a></li>
                        <li><a class="" href="messengers.php">Conversations</a></li>
                        <li><a class="" href="gallery.php"> Gallery</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Form Stuff
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="form_layout.php">Form Layouts</a></li>
                        <li><a class="" href="form_component.php">Form Components</a></li>
                        <li><a class="" href="form_wizard.php">Form Wizard</a></li>
                        <li><a class="" href="form_validation.php">Form Validation</a></li>
                        <li><a class="" href="dropzone.php">Dropzone File Upload </a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-th"></i></span> Data Tables
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="basic_table.php">Basic Table</a></li>
                        <li><a class="" href="managed_table.php">Managed Table</a></li>
                        <li><a class="" href="editable_table.php">Editable Table</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class=" icon-qrcode"></i></span> Portlets
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="general_portlet.php">General Portlets</a></li>
                        <li><a class="" href="draggable_portlet.php">Draggable Portlets</a></li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-fire"></i></span> Icons
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="font_awesome.php">Font Awesome</a></li>
                        <li><a class="" href="glyphicons.php">Glyphicons</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-map-marker"></i></span> Maps
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="maps_google.php"> Google Maps</a></li>
                        <li><a class="" href="maps_vector.php"> Vector Maps</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-file-alt"></i></span> Sample Pages
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="blank.php">Blank Page</a></li>
                        <li><a class="" href="sidebar_closed.php">Sidebar Closed Page</a></li>
                        <li><a class="" href="coming_soon.php">Coming Soon</a></li>
                        <li><a class="" href="blog.php">Blog</a></li>
                        <li><a class="" href="news.php">News</a></li>
                        <li><a class="" href="about_us.php">About Us</a></li>
                        <li><a class="" href="contact_us.php">Contact Us</a></li>
                        <li><a class="" href="email_templates.php">Email Templates</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-glass"></i></span> Extra
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="lock.php">Lock Screen</a></li>
                        <li><a class="" href="profile.php">Profile</a></li>
                        <li><a class="" href="invoice.php">Invoice</a></li>
                        <li><a class="" href="pricing_tables.php">Pricing Tables</a></li>
                        <li><a class="" href="inbox.php">Inbox</a></li>
                        <li><a class="" href="search_result.php">Search Result</a></li>
                        <li><a class="" href="faq.php">FAQ</a></li>
                        <li><a class="" href="404.php">404 Error</a></li>
                        <li><a class="" href="500.php">500 Error</a></li>
                    </ul>
                </li>
                <li><a class="" href="login.php"><span class="icon-box"><i class="icon-user"></i></span> Login Page</a></li>  -->
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->