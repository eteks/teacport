<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
       
<!--breadcrumb-->
<section class="job-breadcrumb">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>seeker/dashboard">Dashboard</a></li>
                        <li class="active">Change password</li>
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
                    <div class="profile-edit">
                        <?php echo form_open('seeker/password','id="seeker_changepassword_form" class="form-horizontal seeker_form"'); ?>
                            <?php 
                            if(!empty($error)) :
                                if($error == 2) {
                                    echo "<p class='val_status val_success db'> <i class='fa fa-check' aria-hidden='true'></i> $status </p>";
                                }
                                else {
                                    echo "<p class='val_status val_error db'> <i class='fa fa-times' aria-hidden='true'></i> $status </p>";
                                }
                            else :
                                echo "<p class='val_status'>  </p>";
                            endif;
                            ?>
                            <div class="form-group">
    							<div class="col-sm-12">
    								<label class="col-sm-6">Old Password<sup class="alert">*</sup></label>
                                    <?php echo form_error('old_pass'); ?>
    								<div class="col-sm-6">
    									<input id="old_pass" placeholder="Old Password" class="form-control form_inputs" name="old_pass" size="25" type="password" value="<?php echo set_value('old_pass'); ?>">
    								</div>
    							</div>
    						</div>	
							<div class="form-group">
								<div class="col-sm-12">
									<label class="col-sm-6">New Password<sup class="alert">*</sup></label>
                                    <?php echo form_error('new_pass'); ?>
									<div class="col-sm-6">
										<input id="new_pass" placeholder="New Password" data-minlength="8" data-name="New Password" class="form-control form_inputs" name="new_pass" size="25" type="password" max_length="20" value="<?php echo set_value('new_pass'); ?>">
									</div>
								</div>
							</div>	
							<div class="form-group">
								<div class="col-sm-12">
									<label class="col-sm-6">Confirm Password<sup class="alert">*</sup></label>
                                    <?php echo form_error('confirm_pass'); ?>
									<div class="col-sm-6">
										<input id="confirm_pass" data-minlength="8" placeholder="Confirm Password" data-name="Confirm Password" max_length="20" class="form-control form_inputs" name="confirm_pass" size="25" type="password" value="<?php echo set_value('confirm_pass'); ?>">
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
        
<?php
if(!empty($provider_values)) :
?>
<div class="brand-logo-area clients-bg">
    <div class="clients-list">
        <?php
        foreach ($provider_values as $val) :
        if(!empty($val['organization_logo'])) :
            $thumb_image = explode('.', end(explode('/',$val['organization_logo'])));
            $thumb = $thumb_image[0]."_thumb.".$thumb_image[1];
        ?>
        <div class="client-logo">
            <a href="<?php echo base_url()."user-followed-companies/".$val['organization_id']; ?>"><img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive" alt="Organization Logo" title="<?php echo $val['organization_name']; ?>" /></a>
        </div>
        <?php
        endif;
        endforeach;
        ?>
    </div>
</div>
<?php
endif;
?>

<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
<?php include('include/footercustom.php'); ?>
 <script type="application/javascript">
 $(document).ready(function() {
 	$(".clients-list").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        loop: true,
        items: 6,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 4],
        itemsTabletSmall: false,
        itemsMobile: [479, 2],
    });
 });
 </script>   