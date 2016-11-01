<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 10]> <html lang="en" class="ie10"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>General</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/style_responsive.css" rel="stylesheet" />
	<link href="css/style_default.css" rel="stylesheet" id="style_color" />

	<link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
	<link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

    <!-- jquery slider -->
    <link rel="stylesheet" href="assets/jslider/css/jslider.css" type="text/css">
    <link rel="stylesheet" href="assets/jslider/css/jslider.blue.css" type="text/css">
    <link rel="stylesheet" href="assets/jslider/css/jslider.plastic.css" type="text/css">
    <link rel="stylesheet" href="assets/jslider/css/jslider.round.css" type="text/css">
    <link rel="stylesheet" href="assets/jslider/css/jslider.round.plastic.css" type="text/css">
    <!-- end -->



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
                <a class="brand" href="index.php">
                    <img src="img/logo.png" alt="Admin Lab" />
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
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="ui_elements_general.php#" data-original-title="Settings">
                                <i class="icon-cog"></i>
                            </a>
                        </li>
                        <!-- END SETTINGS -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <li class="dropdown" id="header_inbox_bar">
                            <a href="ui_elements_general.php#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-envelope-alt"></i>
                                <span class="badge badge-important">5</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <li>
                                    <p>You have 5 new messages</p>
                                </li>
                                <li>
                                    <a href="ui_elements_general.php#">
                                        <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
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
                                    <a href="ui_elements_general.php#">
                                        <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
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
                                    <a href="ui_elements_general.php#">
                                        <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
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
                                    <a href="ui_elements_general.php#">
                                        <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
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
                                    <a href="ui_elements_general.php#">See all messages</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <li class="dropdown" id="header_notification_bar">
                            <a href="ui_elements_general.php#" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="icon-bell-alt"></i>
                                <span class="badge badge-warning">7</span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <li>
                                    <p>You have 7 new notifications</p>
                                </li>
                                <li>
                                    <a href="ui_elements_general.php#">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Server #3 overloaded.
                                        <span class="small italic">34 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="ui_elements_general.php#">
                                        <span class="label label-warning"><i class="icon-bell"></i></span>
                                        Server #10 not respoding.
                                        <span class="small italic">1 Hours</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="ui_elements_general.php#">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Database overloaded 24%.
                                        <span class="small italic">4 hrs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="ui_elements_general.php#">
                                        <span class="label label-success"><i class="icon-plus"></i></span>
                                        New user registered.
                                        <span class="small italic">Just now</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="ui_elements_general.php#">
                                        <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                        Application error.
                                        <span class="small italic">10 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="ui_elements_general.php#">See all notifications</a>
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
                        <li class="dropdown mtop5">

                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="ui_elements_general.php#" data-original-title="Chat">
                                <i class="icon-comments-alt"></i>
                            </a>
                        </li>
                        <li class="dropdown mtop5">
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="ui_elements_general.php#" data-original-title="Help">
                                <i class="icon-headphones"></i>
                            </a>
                        </li>
                        <!-- END SUPPORT -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown">
                            <a href="ui_elements_general.php#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="img/avatar1_small.jpg" alt="">
                                <span class="username">Mosaddek Hossain</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="ui_elements_general.php#"><i class="icon-user"></i> My Profile</a></li>
                                <li><a href="ui_elements_general.php#"><i class="icon-tasks"></i> My Tasks</a></li>
                                <li><a href="ui_elements_general.php#"><i class="icon-calendar"></i> Calendar</a></li>
                                <li class="divider"></li>
                                <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
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
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">

			<div class="sidebar-toggler hidden-phone"></div>	

			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<div class="navbar-inverse">
				<form class="navbar-search visible-phone">
					<input type="text" class="search-query" placeholder="Search" />
				</form>
			</div>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
			<!-- BEGIN SIDEBAR MENU -->
            <ul class="sidebar-menu">
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="index.php">Dashboard 1</a></li>
                        <li><a class="" href="index.php">Dashboard 2</a></li>

                    </ul>
                </li>
                <li class="has-sub active">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> UI Elements
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a class="" href="ui_elements_general.php">General</a></li>
                        <li><a class="" href="ui_elements_buttons.php">Buttons</a></li>
                        <li><a class="" href="jquery_ui.php">jQuery UI Component</a></li>
                        <li><a class="" href="ui_elements_tabs_accordions.php">Tabs & Accordions</a></li>
                        <li><a class="" href="ui_elements_typography.php">Typography</a></li>
                        <li><a class="" href="tree_view.php">Tree View</a></li>
                        <li><a class="" href="nestable.php">Nestable List</a></li>
                    </ul>
                </li>
                <li class="has-sub">
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
                <li><a class="" href="login.php"><span class="icon-box"><i class="icon-user"></i></span> Login Page</a></li>
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div id="main-content">
            <!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
                        <!-- BEGIN THEME CUSTOMIZER-->
                        <div id="theme-change" class="hidden-phone">
                            <i class="icon-cogs"></i>
                            <span class="settings">
                                <span class="text">Theme:</span>
                                <span class="colors">
                                    <span class="color-default" data-style="default"></span>
                                    <span class="color-gray" data-style="gray"></span>
                                    <span class="color-purple" data-style="purple"></span>
                                    <span class="color-navy-blue" data-style="navy-blue"></span>
                                </span>
                            </span>
                        </div>
                        <!-- END THEME CUSTOMIZER-->
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->							    			
						<h3 class="page-title">
							General
							<small>sliders, alerts, notifications and more</small>
						</h3>
                        <ul class="breadcrumb">
                            <li>
                                <a href="ui_elements_general.php#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                            </li>
                            <li>
                                <a href="ui_elements_general.php#">UI Elements</a> <span class="divider">&nbsp;</span>
                            </li>
                            <li><a href="ui_elements_general.php#">General</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page">
                    <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN SLIDER-->
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-plane"></i>Sliders</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                            </div>
                            <div class="widget-body">

                                <div class="form_inputs slider clearfix">
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <label class="control-label">Simple slider:</label>
                                        </div>

                                        <div class="span9">
                                            <input id="Slider1" type="slider" name="price" value="20" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form_inputs slider clearfix">
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <label class="control-label">Range slider:</label>
                                        </div>

                                        <div class="span9">
                                            <input id="Slider2" type="slider" name="price" value="10000;50000" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form_inputs slider clearfix">
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <label class="control-label">With scale:</label>
                                        </div>

                                        <div class="span9">
                                            <input id="Slider3" type="slider" name="area" value="2;10" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form_inputs slider clearfix">
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <label class="control-label">Time calculation:</label>
                                        </div>

                                        <div class="span9">
                                            <input id="Slider4" type="slider" name="area" value="600;720" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SLIDER-->
                    </div>
                </div>
					<div class="row-fluid">
						<div class="span12">
							<!-- BEGIN ALERTS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Alerts</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
								</div>
								<div class="widget-body">
									<div class="alert">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Warning!</strong> Your monthly traffic is reaching limit.
									</div>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Success!</strong> The page has been added.
									</div>
									<div class="alert alert-info">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Info!</strong> You have 198 unread messages.
									</div>
									<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Error!</strong> The daily cronjob has failed.
									</div>
								</div>
							</div>
							<!-- END ALERTS PORTLET-->

						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Inline Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>							
								</div>
								<div class="widget-body">
                                    <div class="alert alert-block alert-warning fade in">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <h4 class="alert-heading">Warning!</h4>
                                        <p>
                                            Duis mollis, est non commodo luctus,
                                            nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                                        </p>
                                    </div>
									<div class="alert alert-block alert-success fade in">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h4 class="alert-heading">Success!</h4>
										<p>
											Duis mollis, est non commodo luctus, 
											nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
										</p>
									</div>
									<div class="alert alert-block alert-info fade in">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h4 class="alert-heading">Info!</h4>
										<p>
											Duis mollis, est non commodo luctus, 
											nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
										</p>
									</div>
                                    <div class="alert alert-block alert-error fade in">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <h4 class="alert-heading">Error!</h4>
                                        <p>
                                            Duis mollis, est non commodo luctus,
                                            nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                                        </p>
                                    </div>
								</div>
							</div>
							<!-- END INLINE NOTIFICATIONS PORTLET-->

                            <!-- BEGIN LABELS AND BADGES PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Labels and Badges</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Badges</th>
                                            <th>Labels</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                Default
                                            </td>
                                            <td>
                                                <span class="badge">1</span>
                                            </td>
                                            <td>
                                                <span class="label">Default</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Success
                                            </td>
                                            <td>
                                                <span class="badge badge-success">2</span>
                                            </td>
                                            <td>
                                                <span class="label label-success">Success</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Warning
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">4</span>
                                            </td>
                                            <td>
                                                <span class="label label-warning">Warning</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Important
                                            </td>
                                            <td>
                                                <span class="badge badge-important">6</span>
                                            </td>
                                            <td>
                                                <span class="label label-important">Important</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Info
                                            </td>
                                            <td>
                                                <span class="badge badge-info">8</span>
                                            </td>
                                            <td>
                                                <span class="label label-info">Info</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Inverse
                                            </td>
                                            <td>
                                                <span class="badge badge-inverse">10</span>
                                            </td>
                                            <td>
                                                <span class="label label-inverse">Inverse</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END LABELS AND BADGES PORTLET-->
						</div>
						<div class="span6">
                            <!-- BEGIN TOOLTIPS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>tooltips</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <p>
                                        Tight pants next level keffiyeh
                                        <a href="ui_elements_general.php#" class="tooltips" data-original-title="Default tooltips">you probably</a> haven't heard of them.
                                        Photo booth beard raw denim letterpress vegan messenger bag stumptown.
                                        <a href="ui_elements_general.php#" class="tooltips" data-original-title="Another tooltips">have a</a>
                                        terry richardson vinyl chambray.
                                        <a href="ui_elements_general.php#" class="tooltips" data-original-title="The last tip!">twitter handle</a>
                                        freegan cred raw denim single-origin coffee viral.
                                    </p>
                                    <p class="">
                                        <button class="btn tooltips"  data-placement="top" data-original-title="tooltips in top">Top</button>
                                        <button class="btn tooltips"  data-placement="left" data-original-title="tooltips in left">Left</button>
                                        <button class="btn tooltips"  data-placement="right" data-original-title="tooltips in right">Right</button>
                                        <button class="btn tooltips"  data-placement="bottom" data-original-title="tooltips in bottom">Bottom</button>
                                    </p>
                                </div>
                            </div>
                            <!-- END TOOLTIPS PORTLET-->
                            <!-- BEGIN POPOVERS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>popovers</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <p>
                                        Tight pants next level keffiyeh
                                        <a href="javascript:;" class="popovers" data-placement="left" data-content="popovers body goes here! popovers body goes here!" data-original-title="Default popovers">trigger me on click</a> haven't heard of them.
                                        Photo booth beard raw denim letterpress vegan messenger bag stumptown. loem ipsum dolor
                                        <a href="javascript:;" class="popovers" data-placement="top" data-trigger="hover" data-content="popovers body goes here! popovers body goes here!" data-original-title="Another popovers">trigger me on hover</a>
                                        terry richardson vinyl chambray. Beard stumptown. Beard stumptown, cardigans banh mi lomo thundercats. Tofu biodiesel williamsburg marfa.
                                    </p>
                                    <p class="">
                                        <button class="btn popovers"   data-trigger="hover" data-placement="top" data-content="popovers body goes here! popovers body goes here!" data-original-title="popovers in top">Top</button>
                                        <button class="btn popovers"  data-trigger="hover" data-placement="left" data-content="popovers body goes here! popovers body goes here!" data-original-title="popovers in left">Left</button>
                                        <button class="btn popovers"  data-trigger="hover" data-placement="right" data-content="popovers body goes here! popovers body goes here!" data-original-title="popovers in right">Right</button>
                                        <button class="btn popovers" data-trigger="hover" data-placement="bottom" data-content="popovers body goes here! popovers body goes here!" data-original-title="popovers in bottom">Bottom</button>
                                    </p>
                                </div>
                            </div>
                            <!-- END POPOVERS PORTLET-->
                            <!-- BEGIN MODAL DIALOG PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Modal Dialogs</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body ">
                                    <h5>Click on below buttons to check it out.</h5>
                                    <!-- Button to trigger modal -->
                                    <a href="ui_elements_general.php#myModal1" role="button" class="btn btn-primary" data-toggle="modal">Dialog</a>
                                    <a href="ui_elements_general.php#myModal3" role="button" class="btn btn-warning" data-toggle="modal">Confirm</a>
                                    <a href="ui_elements_general.php#myModal4" role="button" class="btn btn-success" data-toggle="modal">Success</a>
                                    <a href="ui_elements_general.php#myModal2" role="button" class="btn btn-danger" data-toggle="modal">Alert</a>
                                    <!-- Modal -->
                                    <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel1">Modal Header</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Body goes here...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel2">Alert Header</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Body goes here...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-primary">OK</button>
                                        </div>
                                    </div>
                                    <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel3">Confirm Header</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Body goes here...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                            <button data-dismiss="modal" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                    <div id="myModal4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel4">Success Header</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Body goes here...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                            <button data-dismiss="modal" class="btn btn-success">Success</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL DIALOG PORTLET-->
							<!-- BEGIN PAGINATION PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Pagination</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>							
								</div>
								<div class="widget-body">
									<div class="pagination pagination-large">
										<ul>
											<li><a href="ui_elements_general.php#">«</a></li>
											<li><a href="ui_elements_general.php#">1</a></li>
											<li><a href="ui_elements_general.php#">2</a></li>
											<li><a href="ui_elements_general.php#">3</a></li>
											<li class="hidden-phone"><a href="ui_elements_general.php#">4</a></li>
											<li><a href="ui_elements_general.php#">»</a></li>
										</ul>
									</div>
									<div class="pagination">
										<ul>
											<li><a href="ui_elements_general.php#">«</a></li>
											<li><a href="ui_elements_general.php#">1</a></li>
											<li><a href="ui_elements_general.php#">2</a></li>
											<li><a href="ui_elements_general.php#">3</a></li>
											<li><a href="ui_elements_general.php#">4</a></li>
											<li><a href="ui_elements_general.php#">»</a></li>
										</ul>
									</div>
									<div class="pagination pagination-small">
										<ul>
											<li><a href="ui_elements_general.php#">«</a></li>
											<li><a href="ui_elements_general.php#">1</a></li>
											<li><a href="ui_elements_general.php#">2</a></li>
											<li><a href="ui_elements_general.php#">3</a></li>
											<li><a href="ui_elements_general.php#">4</a></li>
											<li><a href="ui_elements_general.php#">»</a></li>
										</ul>
									</div>
									<div class="pagination pagination-mini">
										<ul>
											<li><a href="ui_elements_general.php#">«</a></li>
											<li><a href="ui_elements_general.php#">1</a></li>
											<li><a href="ui_elements_general.php#">2</a></li>
											<li><a href="ui_elements_general.php#">3</a></li>
											<li><a href="ui_elements_general.php#">4</a></li>
											<li><a href="ui_elements_general.php#">»</a></li>
										</ul>
									</div>
                                    <div class="pagination pagination-mini pagination-centered">
                                        <ul>
                                            <li><a href="ui_elements_general.php#">«</a></li>
                                            <li><a href="ui_elements_general.php#">1</a></li>
                                            <li><a href="ui_elements_general.php#">2</a></li>
                                            <li><a href="ui_elements_general.php#">3</a></li>
                                            <li><a href="ui_elements_general.php#">4</a></li>
                                            <li><a href="ui_elements_general.php#">»</a></li>
                                        </ul>
                                    </div>
                                    <div class="pagination pagination-mini pagination-right">
                                        <ul>
                                            <li><a href="ui_elements_general.php#">«</a></li>
                                            <li><a href="ui_elements_general.php#">1</a></li>
                                            <li><a href="ui_elements_general.php#">2</a></li>
                                            <li><a href="ui_elements_general.php#">3</a></li>
                                            <li><a href="ui_elements_general.php#">4</a></li>
                                            <li><a href="ui_elements_general.php#">»</a></li>
                                        </ul>
                                    </div>
								</div>
							</div>
							<!-- END PAGINATION PORTLET-->

						</div>
					</div>

                    <div class="row-fluid">
                        <div class="span7">
                            <!-- BEGIN GRITTER NOTIFICATIONS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Gritter Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body ">
                                    <h5>Click on below buttons to check it out.</h5>
                                    <a href="javascript:;" class="btn " id="gritter-regular">Regular</a>
                                    <a href="javascript:;" class="btn btn-success" id="gritter-sticky">Sticky</a>
                                    <a href="javascript:;" class="btn btn-info" id="gritter-without-image">Imageless</a>
                                    <div class="space10 visible-phone visible-tablet"></div>
                                    <a href="javascript:;" class="btn btn-warning" id="gritter-light">Light</a>
                                    <a href="javascript:;" class="btn btn-success" id="gritter-max">Max of 3</a>
                                    <a href="ui_elements_general.php#" class="btn btn-info" id="gritter-remove-all">Remove all</a>
                                </div>
                            </div>
                            <!-- END GRITTER NOTIFICATIONS PORTLET-->
                        </div>
                        <div class="span5">
                            <!-- BEGIN PULSATE PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Pulsate</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body ">
                                    <h5>Click on below buttons to check it out.</h5>
                                    <a href="javascript:;" class="btn btn-success" id="pulsate-once">Pulsate once</a>
                                    <a href="javascript:;" class="btn btn-info" id="pulsate-hover">Pulsate hover</a>
                                    <div class="space10 visible-phone visible-tablet"></div>
                                    <a href="javascript:;" class="btn btn-danger" id="pulsate-crazy">Crazy pulsate :)</a>
                                </div>
                            </div>
                            <!-- END PULSATE PORTLET-->
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Basic Progress Bars</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div class="progress">
                                        <div style="width: 20%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-success">
                                        <div style="width: 40%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-warning">
                                        <div style="width: 60%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-danger">
                                        <div style="width: 80%;" class="bar"></div>
                                    </div>
                                    <h4>Stacked</h4>
                                    <div class="progress">
                                        <div class="bar bar-success" style="width: 25%;"></div>
                                        <div class="bar bar-warning" style="width: 30%;"></div>
                                        <div class="bar bar-danger" style="width: 15%;"></div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="bar bar-success" style="width: 25%;"></div>
                                        <div class="bar bar-warning" style="width: 30%;"></div>
                                        <div class="bar bar-danger" style="width: 15%;"></div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="bar bar-success" style="width: 25%;"></div>
                                        <div class="bar bar-warning" style="width: 30%;"></div>
                                        <div class="bar bar-danger" style="width: 15%;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROGRESS BARS PORTLET-->
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Animated Progress Bars</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div class="progress progress-striped active">
                                        <div style="width: 20%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped progress-success active">
                                        <div style="width: 40%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped progress-warning active">
                                        <div style="width: 60%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped progress-danger active">
                                        <div style="width: 80%;" class="bar"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Modal Dialogs PORTLET-->
                        </div>
                        <div class="span6">
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Striped Progress Bars</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div class="progress progress-striped">
                                        <div style="width: 20%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped progress-success">
                                        <div style="width: 40%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped progress-warning">
                                        <div style="width: 60%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped progress-danger">
                                        <div style="width: 80%;" class="bar"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROGRESS BARS PORTLET-->
                            <!-- BEGIN PRELOADER-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-magic"></i>Preloader</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <ul class="nav nav-pills list_items">
                                        <li><img src="assets/pre-loader/Whirlpool.gif" alt="Whirlpool"></li>
                                        <li><img src="assets/pre-loader/Broken&#32;ring.gif" alt="Broken ring"></li>
                                        <li><img src="assets/pre-loader/Storm.gif" alt="Storm"></li>
                                        <li><img src="assets/pre-loader/Twirl.gif" alt="Twirl"></li>
                                        <li><img src="assets/pre-loader/Snow&#32;with&#32;rain.gif" alt="Snow with rain"></li>
                                        <li><img src="assets/pre-loader/Atom.gif" alt="Atom"></li>
                                        <li><img src="assets/pre-loader/Nuclear&#32;alert.gif" alt="Nuclear alert"></li>
                                        <li><img src="assets/pre-loader/Radar.gif" alt="Radar"></li>
                                        <li><img src="assets/pre-loader/Kaleidoscope.gif" alt="Kaleidoscope"></li>
                                        <li><img src="assets/pre-loader/Spinning&#32;spiral.gif" alt="Spinning spiral"></li>
                                        <li><img src="assets/pre-loader/3D&#32;snake.gif" alt="3D snake"></li>
                                        <li><img src="assets/pre-loader/Surrounded&#32;segments.gif" alt="Surrounded segments"></li>
                                        <li><img src="assets/pre-loader/Pie&#32;chart.gif" alt="Pie chart"></li>
                                        <li><img src="assets/pre-loader/Searching.gif" alt="Searching"></li>
                                        <li><img src="assets/pre-loader/Water&#32;ripples.gif" alt="Water ripples"></li>
                                        <li><img src="assets/pre-loader/Drawing&#32;flower.gif" alt="Drawing flower"></li>
                                        <li><img src="assets/pre-loader/Spider&#32;web.gif" alt="Spider web"></li>
                                        <li><img src="assets/pre-loader/Sun.gif" alt="Sun"></li>
                                        <li><img src="assets/pre-loader/Rounded&#32;blocks.gif" alt="Rounded blocks"></li>
                                        <li><img src="assets/pre-loader/Thin&#32;fading&#32;line.gif" alt="Thin fading line"></li>
                                        <li><img src="assets/pre-loader/Snakes&#32;chasing.gif" alt="Snakes chasing"></li>
                                        <li><img src="assets/pre-loader/Thin&#32;broken&#32;ring.gif" alt="Thin broken ring"></li>
                                        <li><img src="assets/pre-loader/Triangles&#32;indicator.gif" alt="Triangles indicator"></li>
                                        <li><img src="assets/pre-loader/Snake.gif" alt="Snake"></li>
                                        <li><img src="assets/pre-loader/Fading&#32;squares.gif" alt="Fading squares"></li>
                                        <li><img src="assets/pre-loader/Spinning&#32;line.gif" alt="Spinning line"></li>
                                        <li><img src="assets/pre-loader/Velocity.gif" alt="Velocity"></li>
                                        <li><img src="assets/pre-loader/Ovals&#32;in&#32;circle.gif" alt="Ovals in circle"></li>
                                        <li><img src="assets/pre-loader/Rounded&#32;stripes.gif" alt="Rounded stripes"></li>
                                        <li><img src="assets/pre-loader/Search&#32;with&#32;arrow.gif" alt="Search with arrow"></li>
                                        <li><img src="assets/pre-loader/Ventilator.gif" alt="Ventilator"></li>
                                        <li><img src="assets/pre-loader/preview.gif" alt="preview"></li>
                                        <li><img src="assets/pre-loader/Clock&#32;with&#32;hands.gif" alt="Clock with hands"></li>
                                        <li><img src="assets/pre-loader/preview2.gif" alt="preview2"></li>
                                        <li><img src="assets/pre-loader/3D&#32;coffee&#32;cup.gif" alt="3D coffee cup"></li>
                                        <li><img src="assets/pre-loader/Hourglass.gif" alt="Hourglass"></li>
                                        <li><img src="assets/pre-loader/Tree&#32;on&#32;wind.gif" alt="Tree on wind"></li>
                                        <li><img src="assets/pre-loader/preview3.gif" alt="preview3"></li>
                                        <li><img src="assets/pre-loader/Bouncing&#32;ball.gif" alt="Bouncing ball"></li>
                                        <li><img src="assets/pre-loader/Linear&#32;star.gif" alt="Linear star"></li>
                                        <li><img src="assets/pre-loader/Fancy&#32;pants.gif" alt="Fancy pants"></li>
                                        <li><img src="assets/pre-loader/Drink&#32;in&#32;glass.gif" alt="Drink in glass"></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END PRELOADER-->
                        </div>
                    </div>


				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->			
		</div>
		<!-- BEGIN PAGE -->	 	
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div id="footer">
        2013 &copy; Admin Lab Dashboard.
		<div class="span pull-right">
			<span class="go-top"><i class="icon-arrow-up"></i></span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
	<!-- Load javascripts at bottom, this will reduce page load time -->
	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/jquery.blockui.js"></script>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="js/excanvas.js"></script>
	<script src="js/respond.js"></script>
	<![endif]-->
	<script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="js/jquery.pulsate.min.js"></script>
	<script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <!-- jquery slider -->
    <script type="text/javascript" src="assets/jslider/js/jshashtable-2.1_src.js"></script>
    <script type="text/javascript" src="assets/jslider/js/jquery.numberformatter-1.2.3.js"></script>
    <script type="text/javascript" src="assets/jslider/js/tmpl.js"></script>
    <script type="text/javascript" src="assets/jslider/js/jquery.dependClass-0.1.js"></script>
    <script type="text/javascript" src="assets/jslider/js/draggable-0.1.js"></script>
    <script type="text/javascript" src="assets/jslider/js/jquery.slider.js"></script>
    <!-- end -->

	<script src="js/scripts.js"></script>

	<script>
		jQuery(document).ready(function() {
			// initiate layout and plugins
			App.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>