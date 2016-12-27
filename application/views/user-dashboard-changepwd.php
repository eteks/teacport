<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
       
<!--breadcrumb-->
<section class="job-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h3>My Feedback</h3>
            </div>
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>job_seeker/dashboard">Dashboard</a></li>
                        <li class="active">Feedback</li>
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
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <?php include('include/user_dashboard_sidemenu.php'); ?>
                </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="heading-inner first-heading">
                                <p class="title">Change Password</p>
                            </div>
                            <?php
                            if(!empty($status)) :
                                echo "<div class='error'> $status </div>";
                            endif;
                            ?>
                            <div class="profile-edit">
                                <?php echo form_open('seeker/password','class="form-horizontal"'); ?>
	                                <div class="form-group">
										<label class="col-sm-12">You can change your password below</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<label class="col-sm-6">Old Password<span class="alert">*</span></label>
                                            <?php echo form_error('old_pass'); ?>
											<div class="col-sm-6">
												<input id="" class="form-control" name="old_pass" size="25" type="password" value="<?php echo set_value('old_pass'); ?>">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<label class="col-sm-6">New Password<span class="alert">*</span></label>
                                            <?php echo form_error('new_pass'); ?>
											<div class="col-sm-6">
												<input id="" class="form-control" name="new_pass" size="25" type="password" value="<?php echo set_value('new_pass'); ?>">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<label class="col-sm-6">Confirm Password<span class="alert">*</span></label>
                                            <?php echo form_error('confirm_pass'); ?>
											<div class="col-sm-6">
												<input id="" class="form-control" name="confirm_pass" size="25" type="password" value="<?php echo set_value('confirm_pass'); ?>">
											</div>
										</div>
									</div>	
									<div class="col-sm-12">
										<button class="btn btn-default pull-right" type="submit">APPLY</button>
									</div>
									<div class="clearfix"> </div>		
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
         <div class="brand-logo-area clients-bg">
            <div class="clients-list light-blue">
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
            </div>
        </div>

<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>      