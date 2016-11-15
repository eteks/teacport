<nav id="menu-1" class="mega-menu fa-change-black" data-color="">
            <section class="menu-list-items">
                <ul class="menu-logo">
                    <li>
                        <a href="<?php echo base_url(); ?>"> 
                        	<h4 style="color: #2ae;"><strong>TEACHERS RECRUIT</strong></h4>
                        	<!-- <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" class="img-responsive"> --> </a>
                    </li>
                </ul>
                <ul class="menu-links pull-right">
                    <li> <a href="<?php echo base_url();?>"> Home </a> </li>
                <li> <a href="<?php echo base_url();?>aboutus"> About Us </a> </li>
                <li><a href="javascript:void(0)"> Job Providers <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <ul class="drop-down-multilevel">
                    	<li><a href="<?php echo base_url();?>login/provider">Sign In</a></li>
                        <li><a href="<?php echo base_url();?>signup/provider">Sign Up</a></li>
                        <li><a href="<?php echo base_url();?>pricing">Pricing</a></li>
                     </ul>
                  </li>
                  <li><a href="javascript:void(0)"> Job Seekers <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <ul class="drop-down-multilevel">
                    	<li><a href="<?php echo base_url();?>login/seeker">Sign In</a></li>
                        <li><a href="<?php echo base_url();?>signup/seeker">Sign Up</a></li>
                        <li><a href="<?php echo base_url(); ?>faq">FAQ's</a></li>
                     </ul>
                  </li>
                  <li> <a href="<?php echo base_url(); ?>allinstitutions"> Institutions </a> </li>
                  <li> <a href="<?php echo base_url(); ?>vacancies"> Vacancies </a> </li>
                  <li> <a href="<?php echo base_url();?>contactus"> Contact Us </a> </li>
                  <?php if(!empty($this->session->userdata("login_status")) && $this->session->userdata("login_status") == TRUE){ ?>
                  <li class="no-bg"><a href="company-dashboard-active-jobs.html" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
                  <li class="profile-pic">
                        <a href="javascript:void(0)"> <img src="<?php echo base_url(); ?>assets/images/admin.jpg" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm">Arslan </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                            <li><a href="company-dashboard-active-jobs.html#"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="company-dashboard-active-jobs.html#"><i class="fa fa-mail-forward"></i> Inbox</a></li>
                            <li><a href="company-dashboard-active-jobs.html#"><i class="fa fa-gear"></i> Account Setting</a></li>
                            <li><a href="<?php echo base_url();?>provider/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                </ul>
            </section>
        </nav>
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
                                    <li><a href="company-dashboard-active-jobs.html#">By Company</a></li>
                                    <li><a href="company-dashboard-active-jobs.html#">By Function</a></li>
                                    <li><a href="company-dashboard-active-jobs.html#">By City </a></li>
                                    <li><a href="company-dashboard-active-jobs.html#">By Salary </a></li>
                                    <li><a href="company-dashboard-active-jobs.html#">By Industry</a></li>
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