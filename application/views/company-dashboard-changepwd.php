<?php 
	include('include/header.php');
	include('include/menus.php');
?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>
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
                            <div class="panel panel-border">
                                <div class="dashboard-logo-sidebar center-block">
                                     <?php if (@getimagesize($organization['organization_logo'])) { ?>
                                    <img src="<?php echo $organization['organization_logo']; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } else { ?>
                                	<img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive">
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
                            <div class="">
                            	<?php echo form_open('provider/password', 'class="form-horizontal profile-edit provider_form"'); ?>
                                    <?php 
                                    if(!empty($error)) :
                                        if($error == 2) {
                                            echo "<p class='val_status val_success db'> <i class='fa fa-check' aria-hidden='true'></i> $pasword_server_msg </p>";
                                        }
                                        else {
                                            echo "<p class='val_status val_error db'> <i class='fa fa-times' aria-hidden='true'></i> $pasword_server_msg </p>";
                                        }
                                    else :
                                        echo "<p class='val_status'>  </p>";
                                    endif;
                                    ?>
	                                <div class="form-group">
										<div class="col-sm-12">
											<div class="col-sm-6 pull-right"><?php echo form_error('provideroldpassword'); ?></div>
											<div class="clearfix"> </div>
											<label class="col-sm-6">Old Password<sup class="alert">*</sup></label>
											<div class="col-sm-6">
												<input id="old_pass" placeholder="Old Password" class="form-control form_inputs" name="provideroldpassword" size="25" type="password">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<div class="col-sm-6 pull-right"><?php echo form_error('providernewpassword'); ?></div>
											<div class="clearfix"> </div>
											<label class="col-sm-6">New Password<sup class="alert">*</sup></label>
											<div class="col-sm-6">
												<input id="new_pass" placeholder="New Password" data-minlength="8" data-name="New Password" class="form-control form_inputs" name="providernewpassword" max_length="20" size="25" type="password">
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<div class="col-sm-6 pull-right"><?php echo form_error('providerconfirmnewpassword'); ?></div>
											<div class="clearfix"> </div>
											<label class="col-sm-6">Confirm Password<sup class="alert">*</sup></label>
											<div class="col-sm-6">
												<input id="confirm_pass" data-minlength="8" placeholder="Confirm Password" data-name="Confirm Password" max_length="20" class="form-control form_inputs" name="providerconfirmnewpassword" size="25" type="password">
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
<?php include('include/footercustom.php'); ?>