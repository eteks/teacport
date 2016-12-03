<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Change Password</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li><a href="company-dashboard-followers.html#">Dashboard</a>
                                </li>
                                <li class="active">Change Password</li>
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
                                    <h4>Your School Name</h4>
                                </div>
                            </div>
                            <!--include left panel menu-->
                            <?php include('include/company_dashboard_sidebar.php'); ?>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	<div class="heading-inner first-heading">
                                <p class="title">Change Password</p>
                            </div>
                            <div class="">
                                <form class="form-horizontal profile-edit">
	                                <div class="form-group">
										<label class="col-sm-12">You can change your password below</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<label class="col-sm-6">Old Password<span class="alert">*</span></label>
											<div class="col-sm-6">
												<input id="" class="form-control" name="" size="25" type="password">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<label class="col-sm-6">New Password<span class="alert">*</span></label>
											<div class="col-sm-6">
												<input id="" class="form-control" name="" size="25" type="password">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<label class="col-sm-6">Confirm Password<span class="alert">*</span></label>
											<div class="col-sm-6">
												<input id="" class="form-control" name="" size="25" type="password">
											</div>
										</div>
									</div>	
									<div class="col-sm-12">
										<a class="btn btn-default pull-right" type="submit" href="#">APPLY</a>
									</div>
									<div class="clearfix"> </div>		
                                </form>
                            </div>
                       </div> 
                  </div> <!--col-sm-12-->   
                </div> <!--row-->
            </div> <!--container->
        </section>
<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>