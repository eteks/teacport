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
                <li> <a href="<?php echo base_url(); ?>"> Home </a>
                	<ul class="drop-down-multilevel">
                		<li><a href="<?php echo base_url(); ?>about/"><i class="fa fa-angle-right"></i> About Us</a></li>
                    </ul>		
                    <!-- <ul class="drop-down-multilevel">
                        <li><a href="index.php"><i class="fa fa-angle-right"></i> Home Default</a></li>
                        <li><a href="index2.php"><i class="fa fa-angle-right"></i> Home Text Rotator</a></li>
                        <li><a href="index3.php"><i class="fa fa-angle-right"></i> Home Transparent</a></li>
                        <li><a href="index4.php"><i class="fa fa-angle-right"></i> Home With Slider</a></li>
                        <li><a href="index5.php"><i class="fa fa-angle-right"></i> Home 5 (Static Sections)</a></li>
                        <li><a href="index6.php"><i class="fa fa-angle-right"></i> Home Advance Search</a></li>
                        <li><a href="javascript:void(0)">Headers <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                <li><a href="index7.php"> <i class="fa fa-forumbee"></i> Fixed Menu </a></li>
                                <li><a href="index.php"> <i class="fa fa-hotel"></i> Fixed Search </a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Breadcrumb <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                <li><a href="aboutus.php"> <i class="fa fa-forumbee"></i> Breadcrumb style 1</a></li>
                                <li><a href="breadcrumb-2.php"> <i class="fa fa-hotel"></i> Breadcrumb style 2</a></li>
                                <li><a href="breadcrumb-3.php"> <i class="fa fa-automobile"></i> Breadcrumb style 3</a></li>
                                <li><a href="breadcrumb-4.php"> <i class="fa fa-automobile"></i> Breadcrumb style 4</a></li>
                                <li><a href="breadcrumb-5.php"> <i class="fa fa-automobile"></i> Breadcrumb style 5</a></li>
                                <li><a href="breadcrumb-6.php"> <i class="fa fa-automobile"></i> Breadcrumb style 6</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Footer <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                <li><a href="footer-fixed.php"> <i class="fa fa-forumbee"></i> Footer Fixed</a></li>
                                <li><a href="footer-normal.php"> <i class="fa fa-hotel"></i> Footer Normal</a></li>
                                <li><a href="footer-small.php"> <i class="fa fa-automobile"></i> Footer Small</a></li>
                            </ul>
                        </li>
                    </ul> -->
                </li>
                <li><a href="javascript:void(0)">Job Seekers<i class="fa fa-angle-down fa-indicator"></i></a> 
                    
                    <ul class="drop-down-multilevel">
                    	<li><a href="<?php echo base_url(); ?>regcandidate/">Register</a></li>
                        <li><a href="<?php echo base_url(); ?>logincandidate/">Login</a></li>
                        <li><a href="javascript:void(0)">Jobs <i class="fa fa-angle-right fa-indicator"></i></a>
                        	<ul class="drop-down-multilevel left-side">
                        		 <li><a href="<?php echo base_url(); ?>browsejobs/"><i class="fa fa-forumbee"></i>Browse Jobs</a></li>
                        		 <li><a href="<?php echo base_url(); ?>jobsbycategory/"><i class="fa fa-forumbee"></i>Jobs by category</a></li>
                        	</ul>
                        </li>	
                        <li><a href="<?php echo base_url(); ?>faq/">FAQ</a></li>
                        <!-- <li><a href="javascript:void(0)">Jobs <i class="fa fa-angle-right fa-indicator"></i> </a> 
                             <ul class="drop-down-multilevel left-side">
                                <li><a href="aboutus.php"> <i class="fa fa-forumbee"></i> About Us 1</a></li>
                                <li><a href="aboutus2.php"> <i class="fa fa-hotel"></i> About Us 2</a></li>
                                <li><a href="aboutus3.php"> <i class="fa fa-automobile"></i> About Us 3</a></li>
                            </ul>
                        </li> -->
                        <!-- <li><a href="javascript:void(0)">Contact Us <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="contactus.php"> <i class="fa fa-forumbee"></i> Contact Us 1</a></li>
                                <li><a href="contactus2.php"> <i class="fa fa-hotel"></i> Contact Us 2</a></li>
                                <li><a href="contactus3.php"> <i class="fa fa-automobile"></i> Contact Us 3</a></li>
                                <li><a href="contactus4.php"> <i class="fa fa-bookmark"></i> Contact Us 4</a></li>
                                <li><a href="contactus5.php"> <i class="fa fa-bell"></i> Contact Us 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Login pages <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="login.php"> <i class="fa fa-forumbee"></i> Login Style 1</a></li>
                                <li><a href="login-2.php"> <i class="fa fa-hotel"></i> Login Style 2</a></li>
                                <li><a href="login-3.php"> <i class="fa fa-automobile"></i> Login Style 3</a></li>
                                <li><a href="login-4.php"> <i class="fa fa-bookmark"></i> Login Style 4</a></li>
                                <li><a href="login-5.php"> <i class="fa fa-bell"></i> Login Style 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Registration pages <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="register.php"> <i class="fa fa-forumbee"></i> Register Style 1</a></li>
                                <li><a href="register-2.php"> <i class="fa fa-hotel"></i> Register Style 2</a></li>
                                <li><a href="register-3.php"> <i class="fa fa-automobile"></i> Register Style 3</a></li>
                                <li><a href="register-4.php"> <i class="fa fa-bookmark"></i> Register Style 4</a></li>
                                <li><a href="register-5.php"> <i class="fa fa-bell"></i> Register Style 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Coming Soon Pages <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="comingsoon.php"> <i class="fa fa-forumbee"></i> Coming Soon 1</a></li>
                                <li><a href="comingsoon2.php"> <i class="fa fa-hotel"></i> Coming Soon 2</a></li>
                                <li><a href="comingsoon3.php"> <i class="fa fa-automobile"></i> Coming Soon 3</a></li>
                                <li><a href="comingsoon4.php"> <i class="fa fa-bookmark"></i> Coming Soon 4</a></li>
                                <li><a href="http://templates.scriptsbundle.com/opportunities/demo/comingsoon5.php"> <i class="fa fa-bell"></i> Coming Soon 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Error 404 Pages<i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="404.php"> <i class="fa fa-forumbee"></i> 404 Style 1</a></li>
                                <li><a href="404-2.php"> <i class="fa fa-hotel"></i> 404 Style 2</a></li>
                                <li><a href="404-3.php"> <i class="fa fa-automobile"></i> 404 Style 3</a></li>
                                <li><a href="404-4.php"> <i class="fa fa-bookmark"></i> 404 Style 4</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </li>
                <li><a href="javascript:void(0)">Schools<i class="fa fa-angle-down fa-indicator"></i></a> 
                	<ul class="drop-down-multilevel">
                    	<li><a href="<?php echo base_url(); ?>regschool/">Register</a></li>
                        <li><a href="<?php echo base_url(); ?>logschool/">Login</a></li>
                        <!-- <li><a href=".php">Registered Schools</a></li> -->
                         <li><a href="<?php echo base_url(); ?>faq/">FAQ</a></li>
                     </ul>    
                    <!-- <div class="grid-col-12 drop-down"> 
                        <div class="grid-row"> 
                            <div class="grid-col-2">
                                <h4>Company Pages</h4>
                                <ul>
                                    <li><a href="company-dashboard.php"> <i class="fa fa-angle-right"></i> Dashboard</a></li>
                                    <li><a href="company-dashboard-edit-profile.php"> <i class="fa fa-angle-right"></i> Edit Profile</a></li>
                                    <li><a href="company-dashboard-active-jobs.php"> <i class="fa fa-angle-right"></i> Active Jobs</a></li>
                                    <li><a href="company-dashboard-followers.php"> <i class="fa fa-angle-right"></i> Followers</a></li>
                                    <li><a href="company-dashboard-resume.php"> <i class="fa fa-angle-right"></i> Job Resume</a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>User Pages</h4>
                                <ul>
                                    <li><a href="user-dashboard.php"> <i class="fa fa-angle-right"></i> User Dashboard</a></li>
                                    <li><a href="user-edit-profile.php"> <i class="fa fa-angle-right"></i> User Edit Profile</a></li>
                                    <li><a href="user-followed-companies.php"> <i class="fa fa-angle-right"></i> Followed Companies</a></li>
                                    <li><a href="user-job-applied.php"> <i class="fa fa-angle-right"></i> Job Applied</a></li>
                                    <li>
                                        <a href="user-resume.php"> <i class="fa fa-angle-right"></i> Use Resume</a>
                                    </li>
                                    <li>
                                        <a href="users.php"> <i class="fa fa-angle-right"></i> All Users </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Blog Pages</h4>
                                <ul>
                                    <li><a href="blog1.php"> <i class="fa fa-angle-right"></i> Grid Right sidebar</a></li>
                                    <li><a href="blog2.php"> <i class="fa fa-angle-right"></i> Blog No Sidebar</a></li>
                                    <li><a href="blog3.php"> <i class="fa fa-angle-right"></i> Blog Listing</a></li>
                                    <li><a href="blog4.php"> <i class="fa fa-angle-right"></i> Left Sidebar</a></li>
                                    <li><a href="blog5.php"> <i class="fa fa-angle-right"></i> Grid Right sidebar </a></li>
                                    <li><a href="blog-single.php"> <i class="fa fa-angle-right"></i> Single Blog 1</a></li>
                                    <li><a href="blog-single2.php"> <i class="fa fa-angle-right"></i> Single Blog 2</a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Job pages</h4>
                                <ul>
                                    <li><a href="job-category1.php"> <i class="fa fa-angle-right"></i> Job Listing 1</a></li>
                                    <li><a href="job-category2.php"> <i class="fa fa-angle-right"></i> Job Listing 2</a></li>
                                    <li><a href="post-job.php"> <i class="fa fa-angle-right"></i> Job Post 1</a></li>
                                    <li><a href="post-job2.php"> <i class="fa fa-angle-right"></i> Job Post 2</a></li>
                                    <li><a href="post-job3.php"> <i class="fa fa-angle-right"></i> Job Post 3 </a></li>
                                    <li><a href="post-job-wizard.php"> <i class="fa fa-angle-right"></i> Job Post Wizard</a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Resume Pages</h4>
                                <ul>
                                    <li><a href="resume.php"> <i class="fa fa-angle-right"></i> Resume Style 1</a></li>
                                    <li><a href="resume2.php"> <i class="fa fa-angle-right"></i> Resume Style 2</a></li>
                                    <li><a href="resume3.php"> <i class="fa fa-angle-right"></i> Resume Style 3</a></li>
                                    <li><a href="resume4.php"> <i class="fa fa-angle-right"></i> Resume Style 4</a></li>
                                    <li><a href="resume5.php"> <i class="fa fa-angle-right"></i> Resume Style 5 </a></li>
                                    <li><a href="resume6.php"> <i class="fa fa-angle-right"></i> Resume Style 6</a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Other pages</h4>
                                <ul>
                                    <li><a href="single-job.php"> <i class="fa fa-angle-right"></i> Single Job 1</a></li>
                                    <li><a href="single-job2.php"> <i class="fa fa-angle-right"></i> Single job 2</a></li>
                                    <li><a href="pricing.php"> <i class="fa fa-angle-right"></i> Pricing Tables</a></li>
                                    <li><a href="faq.php"> <i class="fa fa-angle-right"></i> FAQ's</a></li>
                                    <li><a href="all-categories.php"> <i class="fa fa-angle-right"></i> All Categories</a></li>
                                    <li><a href="all-company.php"> <i class="fa fa-angle-right"></i> All Companies</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </li>
                <li><a href="<?php echo base_url(); ?>contact/">Contact</a></li>
                <!-- <li class="no-bg"><a href="contactus.php" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li> -->
                <!--for login--->
                <!-- <li class="no-bg login-btn-no-bg"><a href="<?php echo base_url(); ?>" class="login-header-btn"><i class="fa fa-sign-in"></i>Register</a></li> -->
                
                <!--Display this once login-->
                <li class="profile-pic" style="display:none;">
                        <a href="javascript:void(0)"> <img src="images/admin.jpg" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm">Arslan </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                            <li><a href="<?php echo base_url(); ?>company-dashboard.html#"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>company-dashboard.html#"><i class="fa fa-mail-forward"></i> Inbox</a></li>
                            <li><a href="<?php echo base_url(); ?>company-dashboard.html#"><i class="fa fa-gear"></i> Account Setting</a></li>
                            <li><a href="<?php echo base_url(); ?>company-dashboard.html#"><i class="fa fa-power-off"></i> Logout</a></li>
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