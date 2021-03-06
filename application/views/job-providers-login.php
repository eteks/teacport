 <?php include('include/header.php'); ?>
 <div class="signuppage_body">
        <section class="login-page-4 loginbox_parallex full-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-container">
                        	
                            <!--provider login-->
                            <div id="provider-signin" class="loginbox">
                            	<div class="loginbox-title kaushanscript_font_title">
                            	  Job Providers Login
                            	  <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                                </div>
                                <!-- <img src="images/logo.png" alt="logo" class="img-responsive center-block"> -->
                                <?php echo form_open('login/provider/', 'id="provider_login_form" class="provider_login_form form-group form-validate reg_login_form"'); ?>
                                	<?php 
				                    if(isset($error)) :
			    		                if($error == 2) {
			                                echo "<p class='val_status val_success db'> <i class='fa fa-check' aria-hidden='true'></i> $reg_server_msg </p>";
			                            }
			                            else {
			                                echo "<p class='val_status val_error db'> <i class='fa fa-times' aria-hidden='true'></i> $reg_server_msg </p>";
			                            }
			                        else :
			            	            echo "<p class='val_status'>  </p>";
			                        endif;
			                        ?>
	                                <div class="col-sm-6 pull-left">
		                                <?php echo form_error('registrant_email_id'); ?>
		                                <div class="form-group">
		                                    <label>Email or Mobile <sup class="alert">*</sup></label>
		                                    <input placeholder="Email or Mobile" name="registrant_email_id" class="form-control form_inputs email_mobile_value" id="email" type="text" value="<?php echo set_value('registrant_email_id'); ?>">
		                                </div>
		                                <?php echo form_error('registrant_password'); ?>
		                                <div class="form-group">
		                                    <label>Password <sup class="alert">*</sup></label>
		                                    <input placeholder="Password" name="registrant_password" class="form-control form_inputs" id="password" type="password" value="<?php echo set_value('registrant_password'); ?>">
		                                </div>
		                                <div class="loginbox-forgot propwd-forgot">
		                                    <a class="txt_blue remove_error_message_act">Forgot Password?</a>
		                                </div>
		                                <div class="loginbox-submit">
		                                    <a><input type="submit" class="btn btn-default btn-block" id="provider_login" value="Login"></a>
		                                </div>
		                             </div> 
		                             <div class="col-sm-6 pull-left">  
		                                 <div class="loginbox-title">sign in using social accounts</div>
		                                 <ul class="social-network social-circle onwhite">
		                                    <li><a href="<?php echo site_url('login/facebook');;?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		                                    <li><a href="<?php echo site_url('login/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		                                    <li><a href="<?php echo site_url('login/google'); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
		                                    <li><a href="<?php echo site_url('login/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
			                             </ul>
		                                <div class="loginbox-signup">New User ? <a class="txt_blue remove_error_message_act"> Sign Up</a></div>
		                             </div>   
		                             <div class="pull-left"> </div>
	                            <?php echo form_close(); ?>    
                             </div>                            
                            <!--Forgot Password-->
                            <div id="provider-forgotpwd" class="loginbox" style="display: none;" >
                            	<div class="loginbox-title kaushanscript_font_title"> 
                            		Forgot Password 
                            		<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                            	</div><br>
                                <?php echo form_open('login/provider/forgotpassword', 'id="forgotpass-form" class="forgotpass-form reg_login_form"'); ?>
                                 	<?php 
				                    if(isset($error)) :
			    		                if($error == 2) {
			                                echo "<p class='val_status'>  </p>";
			                            }
			                            else {
			                                echo "<p class='val_status'>  </p>";
			                            }
			                        else :
			            	            echo "<p class='val_status'>  </p>";
			                        endif;
			                        ?>
                                    <div class="form-group">
	                                    <label for="exampleInputEmail1"> Email address <sup class="alert">*</sup></label>
	                                    <?php echo form_error('forget_email'); ?>
	                                    <input id="forget_email" name="forget_email" class="form-control input form_inputs email_value" size="20" placeholder="Enter Email" type="text">
	                                </div>
	                                <button type="submit" class="btn btn-default btn-block">
	                                    <i class="fa fa-unlock"> </i> Retrieve Password
	                                </button>
	                            <?php echo form_close(); ?>
                             	<ul class="pager">
                                    <li class="previous pull-right">
                                    	<a href="<?php echo base_url(); ?>"> &larr; Back to Home </a>
                                	</li>
                             	</ul>
                             	<div class="clear clearfix"> </div>
                          	</div> <!--End  forgot pwd--> 
			                <!--Provider- signup-->
                            <div id="provider-signup" class="loginbox" style="display:none;">
                            	<div class="loginbox-title kaushanscript_font_title"> Let's Get Started
                            	  	<a class="pull-right" href="<?php echo base_url();?>">
                            	  		<i class="fa fa-close"></i>
                            	  	</a>
                                </div><br>
                                <?php echo form_open('signup/provider','id="form" class="reg_login_form"'); ?>
                                	<?php 
	                                if(isset($error)) :
	                                    if($error == 2) {
	                                        echo "<p class='val_status'>  </p>";
	                                    }
	                                    else {
	                                        echo "<p class='val_status'>  </p>";
	                                    }
	                                else :
	                                    echo "<p class='val_status'>  </p>";
	                                endif;
	                                ?>
                                	<div class="col-sm-6 pull-left">
										<div class="form-group">
		                                    <label>Institution <sup class="alert">*</sup></label>
		                                    <select name="registrant_institution_type" id="institution_type" class="form-control form_inputs">
										<?php
		                                	foreach ($institutiontype as $institution) {
												echo "<option value=".$institution['institution_type_id'].">".$institution['institution_type_name']."</option>";
											}
			                            ?> 
			                           		</select>     
		                            	</div>
									<div class="form-group">
										<?php echo form_label('Name <sup class="alert">*</sup>'); echo form_error('organization_name'); ?>
										<?php echo form_input(array('id' => 'organization_name','class' => 'form-control form_inputs alpha_value', 'data-minlength' => '3','data-name' => 'Name' ,'maxlength' => '50','placeholder' => 'Organization Name','name' => 'organization_name')); ?>
									</div>
									<div class="form-group">	
										<?php echo form_label('Email <sup class="alert">*</sup>'); echo form_error('registrant_email_id'); ?>
										<?php echo form_input(array('id' => 'registrant_email_id','class' => 'form-control form_inputs email_value','placeholder' => 'Email', 'name' => 'registrant_email_id')); ?>
									</div>
									<div class="form-group">	
										<?php echo form_label('Mobile No. <sup class="alert">*</sup>'); echo form_error('registrant_mobile_no'); ?>
										<?php echo form_input(array('id' => 'registrant_mobile_no','class' => 'form-control form_inputs numeric_value','data-minlength' => '10','maxlength' => '10','data-name' => 'Mobile','placeholder' => 'Mobile','name' => 'registrant_mobile_no')); ?>
									</div>	
									<div class="form-group">
										<?php echo form_label('Captcha'); echo form_error('captcha_value'); ?>
										<?php echo ('<div class="form-group"><img class="captcha-img" id="captcha_img" src="'.$captcha['image_src'].'" />')?>
	                                	<a title="reload" class="reload-captcha" href="#"><img class="loading" src="<?php echo base_url();?>assets/images/refresh.png"></a>
	                                </div>	
	                                	<div class="col-sm-6 captcha_holder nopadding">
                                            <label class="captcha_label">Enter Captcha value <sup class="alert">*</sup></label>
                                            <?php echo form_input(array('id' => 'captcha_value','class' => 'form-control form_inputs','name' => 'captcha_value','placeholder' => 'Captcha Value','value'=>set_value('captcha_value'))); ?>
                                        </div>
	                        			<div class="clearfix"> </div>
	                        		</div>	
									<div class="loginbox-terms">
										<label class="checkbox_word">
										<?php echo form_input(array('type' => 'checkbox','value' => '1','name' => 'provider_term_and_condition','class' => 'form_dec')); ?>  I accept</label> <a href="<?php echo base_url(); ?>terms" class="txt_blue" target="_blank">Term and conditions?</a>
									</div>	
									<p id="submit" class="btn btn-default btn-block">Register</p>
								</div>
								<div class="col-sm-6 pull-left">	
									<div class="loginbox-title">Sign Up using social accounts </div>
									<ul class="social-network social-circle onwhite">
	                                    <li><a href="<?php echo site_url('login/facebook');?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/google'); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
	                                </ul>
									<div class="loginbox-signin pull-right"> Already have account ? <a class="txt_blue remove_error_message_act"> Sign in</a></div>
								</div>	
								<div class="clearfix"> </div>
                            	<?php echo form_close(); ?>
                            </div> <!--End Provider signup-->
                       </div> <!--End .login-container -->
                    </div>
                </div>
            </div>
        </section>
  </div>      

<?php include('include/footer.php'); ?>
<?php include('include/footercustom.php'); ?>
<script type="text/javascript">
  	$(".full-page").height($(window).height());
	$(window).resize(function() {
       $(".full-page").height($(window).height());
    });
    $(function(){
		$('.reload-captcha').click(function(event){
		    event.preventDefault();
		    $.ajax({
		        url:baseurl+'job_provider/reload_captcha?'+Math.random(),
				success:function(data){
			        if(data) {
			        	// alert(data);
			       		$('.captcha-img').attr('src', data);
			       	}
			    }
			});            
		});
	});
	$("#submit").click(function(){
		$("#form").submit();  // jQuey's submit function applied on form.
	});
</script>