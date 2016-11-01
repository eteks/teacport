<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>Recruit Teachers</title>
    <link rel="icon" href="<?php echo base_url(); ?>images/tech-fav.ico" type="image/x-icon">

    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">

    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mega_menu.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/animate.min.css">

    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/owl.style.css">

    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/custom.css">

    <!-- FOR THIS PAGE ONLY -->
    <link href="<?php echo base_url(); ?>/css/select2.min.css" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    <!-- JavaScripts -->
    <script src="<?php echo base_url(); ?>/js/modernizr.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="page category-page">
        <div id="spinner">
            <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>
        <nav id="menu-1" class="mega-menu fa-change-black" data-color=""> 
         <section class="menu-list-items"> 
            <ul class="menu-logo">
                <li> <a href="index.php"> 
					 <img src="<?php echo base_url(); ?>images/recriut-teachers-logo.png" alt="logo" class="img-responsive">
                	<!-- <p style="font-size: 22px; color: #29AAFE;"><strong><i>Recruit Teachers</i></strong></p>  -->
                	</a> </li>
            </ul>
            <ul class="menu-links pull-right">
                <li> <a href="<?php echo base_url(); ?>home/"> Home </a>
                	<ul class="drop-down-multilevel">
                		<li><a href="<?php echo base_url(); ?>about/"><i class="fa fa-angle-right"></i> About Us</a></li>
                    </ul>		
                </li>
                <li><a href="javascript:void(0)">Job Seekers<i class="fa fa-angle-down fa-indicator"></i></a> 
                    
                    <ul class="drop-down-multilevel">
                    	<li><a href="<?php echo base_url(); ?>regcandidate/">Register</a></li>
                        <li><a href="<?php echo base_url(); ?>logincandidate/">Login</a></li>
                        <li><a href="javascript:void(0)">Jobs <i class="fa fa-angle-right fa-indicator"></i></a>
                        	<ul class="drop-down-multilevel right-side">
                        		 <li><a href="<?php echo base_url(); ?>browsejobs/"><i class="fa fa-forumbee"></i>Browse Jobs</a></li>
                        		 <li><a href="<?php echo base_url(); ?>jobsbycategory/"><i class="fa fa-forumbee"></i>Jobs by category</a></li>
                        	</ul>
                        </li>	
                        <li><a href="<?php echo base_url(); ?>faq/">FAQ</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)">Schools<i class="fa fa-angle-down fa-indicator"></i></a> 
                	<ul class="drop-down-multilevel">
                    	<li><a href="<?php echo base_url(); ?>regschool/">Register</a></li>
                        <li><a href="<?php echo base_url(); ?>logschool/">Login</a></li>
                        <!-- <li><a href=".php">Registered Schools</a></li> -->
                         <li><a href="<?php echo base_url(); ?>faq/">FAQ</a></li>
                     </ul>    
                </li>
                <li><a href="<?php echo base_url(); ?>contact/">Contact</a></li>
                <li class="no-bg"><a href="<?php echo base_url(); ?>postjob/" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
                <!--Display this once login-->
                <li class="profile-pic">
                        <a href="javascript:void(0)"> <img src="<?php echo base_url(); ?>images/admin.jpg" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm">School Name </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                            <li><a href="company-dashboard.html#"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="company-dashboard.html#"><i class="fa fa-mail-forward"></i> Inbox</a></li>
                            <li><a href="company-dashboard.html#"><i class="fa fa-gear"></i> Account Setting</a></li>
                            <li><a href="company-dashboard.html#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                 </li>
            </ul>
        </section>
    </nav>
    <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div class="search">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Filter By</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="company-dashboard-followers.html#">By Company</a></li>
                                    <li><a href="company-dashboard-followers.html#">By Function</a></li>
                                    <li><a href="company-dashboard-followers.html#">By City </a></li>
                                    <li><a href="company-dashboard-followers.html#">By Salary </a></li>
                                    <li><a href="company-dashboard-followers.html#">By Industry</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
       </div>