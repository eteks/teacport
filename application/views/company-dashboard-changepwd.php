<?php 
	include('include/header.php');
	include('include/menus.php');
?>
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
                                <li><a href="<?php echo base_url(); ?>job_provider/dashboard">Dashboard</a>
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
                                     <?php if (@getimagesize($organization['organization_logo'])) { ?>
                                    <img src="<?php echo $organization['organization_logo']; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } else { ?>
                                	<img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } ?>
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4><?php echo $organization['organization_name']; ?></h4>
                                </div>
                            </div>
                            <!--include left panel menu-->
                            <?php include('include/company_dashboard_sidebar.php'); ?>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	<div class="heading-inner first-heading">
                                <p class="title">Change Password</p>
                            </div>
                            <p class="success_server_msg"><?php if(isset($pasword_server_msg)) echo $pasword_server_msg; ?></p>
                            <div class="">
                            	<?php echo form_open('provider/password', 'class="form-horizontal profile-edit"'); ?>
	                                <div class="form-group">
										<label class="col-sm-12">You can change your password below</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<div class="col-sm-6 pull-right"><?php echo form_error('provideroldpassword'); ?></div>
											<div class="clearfix"> </div>
											<label class="col-sm-6">Old Password<span class="alert">*</span></label>
											<div class="col-sm-6">
												<input id="" class="form-control" name="provideroldpassword" size="25" type="password">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<div class="col-sm-6 pull-right"><?php echo form_error('providernewpassword'); ?></div>
											<div class="clearfix"> </div>
											<label class="col-sm-6">New Password<span class="alert">*</span></label>
											<div class="col-sm-6">
												<input id="" class="form-control" name="providernewpassword" size="25" type="password">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<div class="col-sm-6 pull-right"><?php echo form_error('providerconfirmnewpassword'); ?></div>
											<div class="clearfix"> </div>
											<label class="col-sm-6">Confirm Password<span class="alert">*</span></label>
											<div class="col-sm-6">
												<input id="" class="form-control" name="providerconfirmnewpassword" size="25" type="password">
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
                  </div> <!--col-sm-12-->   
                </div> <!--row-->
            </div> <!--container-->
        </section>
<?php 
include('include/footermenu.php');
include('include/footer.php'); 
?>