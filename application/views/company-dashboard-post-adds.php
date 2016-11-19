<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Post Adds</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="company-dashboard-followers.html#">Home</a>
                                </li>
                                <li><a href="company-dashboard-followers.html#">Dashboard</a>
                                </li>
                                <li class="active">Post Adds</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="panel">
                                <div class="dashboard-logo-sidebar">
                                    <img class="img-responsive center-block" src="images/company/logo1.jpg" alt="Image">
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4>Your Companty Agency Pvt. Ltd</h4>
                                </div>
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/dashboard"> <i class="fa fa-user"></i> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/companydbd_resume"> <i class="fa fa-file-o"></i>Inbox </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/companydbd_browsejobs"> <i class="fa  fa-list-ul"></i> Browse Candidate</a>
                                        </li>
                                        <li class="provider-jobs">
                                            <a href="#"><i class="fa  fa-list-alt"></i> Jobs</a>
                                            <ul>
                                            	<li><a href="<?php echo base_url();?>job_provider/companydbd_postjobs"> <i class="fa  fa-list-alt"></i>New Jobs</a></li>
                                            	<li><a href="<?php echo base_url();?>job_provider/companydbd_postedjobs"> <i class="fa  fa-list-alt"></i>Posted Jobs</a></li>
                                            </ul>
                                        </li>
                                        <li class="active">
                                            <a href="<?php echo base_url();?>company-dashboard-post-jobs.php"> <i class="fa  fa-bookmark-o"></i> Post Adds </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-money"></i> Subcribe Plan</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-commenting-o"></i> Feedback </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	<div class="heading-inner first-heading">
                                <p class="title">Post Adds</p>
                            </div>
                            <form class="form-horizontal">
                            	<div class="form-group">
                            		<label class="col-sm-6"> Please enter the title of your Add:</label>
                            		<div class="col-sm-6">
                            			<input type="text" class="form-control">
                            		</div>	
                            	</div>
                            	<div class="form-group">
                            		<label class="col-sm-6">Please upload your add image:</br></label>
                            		<div class="col-sm-6">
                            			<input type="file" name="logo" class="uploadimage_act" />
										<div  class="form-control imagepreview_act"></div> <br>
										<span class="alert" style="padding-left: 0px;">( Upload image should not exceed size 400*350 )</span>
                            		</div>
                            		<div class="claerfix"> </div>	
                            	</div>
                            	<div class="form-group">
                            		<div class="col-sm-6"> </div>
                            		<div class="col-sm-6">
                            			<button class="btn btn-default">SUBMIT</button>
                            		</div>	
                            	</div>	                            	
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </section>
<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>