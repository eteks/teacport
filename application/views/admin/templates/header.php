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

     
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" media="screen" rel="stylesheet" type="text/css" /> 
    <link href=" https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css " media="screen" rel="stylesheet" type="text/css" /> 
     

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
                                <?php
                                    $session_data = $this->session->userdata("login_session");
                                ?>
                                <span class="username"> <?php echo $session_data['admin_user_name']; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                               <li><a href="<?php echo base_url(); ?>admin/edit_profile"><i class="icon-edit"></i>  Edit Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/change_password"><i class="icon-exchange"></i>  Change Password</a></li>
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

                <?php
                if($this->uri->segment(2) == 'dashboard' ) :
                ?>
                <li class="has-sub active open">
                <?php
                else :
                ?>     
                <li class="has-sub">
                <?php
                endif;
                ?>  
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-home"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("home");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($this->uri->segment(2) == 'dashboard') echo "class='active_sidebar'"; ?>>
                            <a href="<?php echo base_url(); ?>admin/dashboard" class="module_details">
                                <!-- <span class="icon-box"> <i class="icon-dashboard"></i></span> --> <span class="sub_module_data">Dashboard</span><span class="sub_module_access">view</span>
                            <!-- <span class="arrow"></span> -->
                            </a>
                        </li>
                    </ul>
                </li>

                <?php
                if($this->uri->segment(2) == 'user_groups' || $this->uri->segment(2) == 'user_accounts' || $this->uri->segment(2) == 'privileges' ) :
                ?>
                <li class="has-sub active open">
                <?php
                else :
                ?>     
                <li class="has-sub">
                <?php
                endif;
                ?>
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-user"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("admin users");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($this->uri->segment(2) == 'user_groups') echo "class='active_sidebar'"; ?>><a class="module_details" href="<?php echo base_url(); ?>admin/user_groups"><span class="sub_module_data">User Groups</span><span class="sub_module_access">add,edit,delete,view</span></a></li>
                        <li <?php if($this->uri->segment(2) == 'user_accounts') echo "class='active_sidebar'"; ?>><a class="module_details" href="<?php echo base_url(); ?>admin/user_accounts"><span class="sub_module_data">User Accounts</span><span class="sub_module_access">add,edit,delete,view</span></a></li>
                        <li <?php if($this->uri->segment(2) == 'privileges') echo "class='active_sidebar'"; ?>><a class="module_details" href="<?php echo base_url(); ?>admin/privileges"><span class="sub_module_data">Privileges</span><span class="sub_module_access">edit,view</span></a></li>
                    </ul>
                </li>

                <?php
                if($this->uri->segment(2) == 'state' || $this->uri->segment(2) == 'district' || $this->uri->segment(2) == 'institution_types' || $this->uri->segment(2) == 'extra_curricular' || $this->uri->segment(2) == 'languages' || $this->uri->segment(2) == 'qualification' || $this->uri->segment(2) == 'class_level' || $this->uri->segment(2) == 'departments' || $this->uri->segment(2) == 'subject' || $this->uri->segment(2) == 'university' || $this->uri->segment(2) == 'postings') :
                ?>
                <li class="has-sub open active">
                <?php
                else :
                ?>     
                <li class="has-sub">
                <?php
                endif;
                ?>
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-th"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("master data");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($this->uri->segment(2) == 'state') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/state"><span class="sub_module_data">State</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'district') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/district"><span class="sub_module_data">District</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'institution_types') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/institution_types"><span class="sub_module_data">Institution Type</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'extra_curricular') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/extra_curricular"><span class="sub_module_data">Extra-Curricular</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'languages') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/languages"><span class="sub_module_data">Languages</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'qualification') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/qualification"><span class="sub_module_data">Qualification</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'class_level') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/class_level"><span class="sub_module_data">Class Level</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'departments') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/departments"><span class="sub_module_data">Department</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'subject') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/subject"><span class="sub_module_data">Subject</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'university') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/university"><span class="sub_module_data">University / Board</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'postings') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/postings">Job <span class="sub_module_data">Posting Details</span><span class="sub_module_access">add,edit,delete,view</span></a>
                        </li>
                    </ul>
                </li>

                <?php
                if($this->uri->segment(2) == 'job_provider_profile' || $this->uri->segment(2) == 'job_provider_vacancies' || $this->uri->segment(2) == 'jobprovider_activities' || $this->uri->segment(2) == 'jobprovider_activities' || $this->uri->segment(2) == 'jobprovider_mailstatus' || $this->uri->segment(2) == 'jobprovider_ads' ) :
                ?>
                <li class="has-sub open active">
                <?php
                else :
                ?>     
                <li class="has-sub">
                <?php
                endif;
                ?>    
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-sitemap"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("job providers");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($this->uri->segment(2) == 'job_provider_profile') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/job_provider_profile">
                                <span class="sub_module_data">Profile</span>
                                <span class="sub_module_access">edit,delete,view</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'job_provider_vacancies') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/job_provider_vacancies">
                                <span class="sub_module_data">Vacancies Posted</span>
                                <span class="sub_module_access">edit,delete,view</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'jobprovider_activities') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/jobprovider_activities">
                                <span class="sub_module_data">Organization Activities</span>
                                <span class="sub_module_access">edit,delete,view</span>
                            </a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'jobprovider_mailstatus') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/jobprovider_mailstatus"><span class="sub_module_data">Approved Job Mail Status</span>
                            <span class="sub_module_access">view</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'jobprovider_ads') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/jobprovider_ads">
                                <span class="sub_module_data">Ads Posted</span>
                                <span class="sub_module_access">edit,delete,view</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php
                if($this->uri->segment(2) == 'job_seeker_profile' || $this->uri->segment(2) == 'job_seeker_preference' || $this->uri->segment(2) == 'job_seeker_applied') :
                ?>
                <li class="has-sub open active">
                <?php
                else :
                ?>     
                <li class="has-sub">
                <?php
                endif;
                ?>   
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-search"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("job seekers");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($this->uri->segment(2) == 'job_seeker_profile') echo "class='active_sidebar'"; ?>><a class="module_details" href="<?php echo base_url(); ?>admin/job_seeker_profile"><span class="sub_module_data">Profile</span><span class="sub_module_access">edit,delete,view</span></a></li>
                        <li <?php if($this->uri->segment(2) == 'job_seeker_preference') echo "class='active_sidebar'"; ?>><a class="module_details" href="<?php echo base_url(); ?>admin/job_seeker_preference"><span class="sub_module_data">Job Preferences</span><span class="sub_module_access">edit,delete,view</span></a></li>                    
                        <li <?php if($this->uri->segment(2) == 'job_seeker_applied') echo "class='active_sidebar'"; ?>><a class="module_details" href="<?php echo base_url(); ?>admin/job_seeker_applied"><span class="sub_module_data">Job Applied</span><span class="sub_module_access">edit,delete,view</span></a></li>
                    </ul>
                </li>

                <?php
                if($this->uri->segment(2) == 'subscription_plans') :
                ?>
                <li class="has-sub open active">
                <?php
                else :
                ?>     
                <li class="has-sub">
                <?php
                endif;
                ?> 
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-wrench"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("plan settings");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($this->uri->segment(2) == 'subscription_plans') echo "class='active_sidebar'"; ?>>
                            <a class="module_details" href="<?php echo base_url(); ?>admin/subscription_plans">
                                <span class="sub_module_data">Plan Creation & Maintanence</span><span class="sub_module_access">add,edit,delete,view</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-cogs"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("settings");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="module_details" href="<?php echo base_url(); ?>admin/payment_gateway"><span class="sub_module_data">Payment Gateway Setting</span><span class="sub_module_access">view</span></a></li>
                        <li><a class="module_details" href="<?php echo base_url(); ?>admin/sms_gateway"><span class="sub_module_data">SMS Gateway Setting</span><span class="sub_module_access">view</span></a></li>
                        <li><a class="module_details" href="<?php echo base_url(); ?>admin/configuration_option"><span class="sub_module_data">Configuration Option</span><span class="sub_module_access">view</span></a></li>
                        <li><a class="module_details" href="<?php echo base_url(); ?>admin/template_logo"><span class="sub_module_data">Template Logo</span><span class="sub_module_access">view</span></a></li> 
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-tasks"></i></span> <span class="main_module_name main_module_data"><?php echo strtoupper("others");?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="module_details" href="<?php echo base_url(); ?>admin/feedback_form"><span class="sub_module_data">Feedback Form</span><span class="sub_module_access">edit,delete,view</span></a></li>
                        <li><a class="module_details" href="<?php echo base_url(); ?>admin/site_visit_tracking"><span class="sub_module_data">Site Visits Tracking</span><span class="sub_module_access">view</span></a></li>
                        <li><a class="module_details" href="<?php echo base_url(); ?>admin/dashboard"><span class="sub_module_data">Logs</span></a></li>
                    </ul>
                </li>            
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->