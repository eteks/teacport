 <?php include('include/header.php'); ?>
 <div class="signuppage_body">
        <section class="login-page-4 loginbox_parallex">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-container">
                        	
                            <!--provider login-->
                            <div id="provider-signin" class="loginbox">
                            	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;">
                            	  Job Providers Login
                            	  <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                                </div>
                                <p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>
                                <!-- <img src="images/logo.png" alt="logo" class="img-responsive center-block"> -->
                                <?php echo form_open('login/provider/', 'id="provider_login_form" class="provider_login_form form-group form-validate"'); ?>
	                                <p class="registration_status"> </p>
	                                <?php echo form_error('registrant_email_id'); ?>
	                                <div class="form-group">
	                                    <label>Email or Mobile: <span class="">*</span></label>
	                                    <input placeholder="" name="registrant_email_id" class="form-control" id="email" type="text" value="<?php echo set_value('registrant_email_id'); ?>">
	                                </div>
	                                <?php echo form_error('registrant_password'); ?>
	                                <div class="form-group">
	                                    <label>Password: <span class="required">*</span></label>
	                                    <input placeholder="" name="registrant_password" class="form-control" id="password" type="password" value="<?php echo set_value('registrant_password'); ?>">
	                                </div>
	                                <div class="loginbox-forgot propwd-forgot">
	                                    <a class="txt_blue">Forgot Password?</a>
	                                </div>
	                                <div class="loginbox-submit">
	                                    <a><input type="submit" class="btn btn-default btn-block" id="provider_login" value="Login"></a>
	                                </div>
	                                 <div class="loginbox-or">
	                                    <div class="or-line"></div>
	                                    <div class="or">OR</div>
	                                </div>
	                                <div class="loginbox-title">sign in using social accounts</div>
                                    <ul class="social-network social-circle onwhite">
	                                    <li><a href="<?php echo site_url('login/facebook');;?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/google'); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
	                                </ul>
	                                <div class="loginbox-signup">New User ? <a class="txt_blue"> Sign Up</a></div>
	                            <?php echo form_close(); ?>    
                             </div>
                             
                              <!--Forgot Password-->
                            <div id="provider-forgotpwd" class="loginbox" style="display: none;" >
                            	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;"> 
                            		Forgot Password 
                            		<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                            	</div><br>
                            	<p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>
                                 <span class="error_test"> Please fill Enter Valid Email </span> 
                                 <?php echo form_open('job_provider/forgot_password', 'id="forgotpass-form" class="forgotpass-form"'); ?>
                                    <p class="registration_status"> </p>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Email address </label>
                                        <?php echo form_error('forget_email'); ?>
                                        <input id="forget_email" name="forget_email" class="form-control input" size="20" placeholder="Enter Email" type="text">
                                    </div>
                                    <button type="submit" class="btn btn-default btn-block">
                                        <i class="fa fa-unlock"> </i> Retrieve Password
                                    </button>
                                <?php echo form_close(); ?>
	                            <div class="clear clearfix">
	                                <ul class="pager">
	                                    <li class="previous pull-right">
	                                        <a href="<?php echo base_url(); ?>"> &larr; Back to Home </a>
	                                    </li>
	                                </ul>
	                            </div>
                            </div> <!--End  forgot pwd--> 
                             
                             
                             
                             <!--Provider- signup-->
                             <div id="provider-signup" class="loginbox" style="display:none;">
                            	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;"> 
                            	  Let's Get Started
                            	  <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                                </div><br>
                                <?php echo form_open('signup/provider',array('id'=>'form')); ?>
								<div class="form-group">
                                    <label>Institution: <span class="required">*</span></label>
                                    <select name="registrant_institution_type" id="institution_type" class="form-control">')
								<?php
                                	foreach ($institutiontype as $institution) {
										echo "<option value=".$institution['institution_type_id'].">".$institution['institution_type_name']."</option>";
									}
	                            ?> 
	                           		</select>     
                            	</div>
								<div class="form-group">
									<?php echo form_label('Name :'); echo form_error('registrant_name'); ?>
									<?php echo form_input(array('id' => 'registrant_name','class' => 'form-control', 'name' => 'registrant_name')); ?>
								</div>
								<div class="form-group">	
									<?php echo form_label('Email :'); echo form_error('registrant_email_id'); ?>
									<?php echo form_input(array('id' => 'registrant_email_id','class' => 'form-control', 'name' => 'registrant_email_id')); ?>
								</div>
								<div class="form-group">	
									<?php echo form_label('Mobile No. :'); echo form_error('registrant_mobile_no'); ?>
									<?php echo form_input(array('id' => 'registrant_mobile_no','class' => 'form-control','name' => 'registrant_mobile_no')); ?>
								</div>	
								<div class="form-group">
									<?php echo form_label('Captcha. :'); echo form_error('captcha_value'); ?>
									<?php echo ('<div class="form-group"><img class="captcha-img" id="captcha_img" src="'.$captcha['image_src'].'" />')?>
                                	<a title="reload" class="reload-captcha" href="#"><img class="loading" src="<?php echo base_url();?>assets/images/refresh.png"></a>
                                </div>	
                                <div class="form-group">
                        			<?php echo form_input(array('id' => 'captcha_value','class' => 'form-control','name' => 'captcha_value')); ?>
                        		</div>
								<div class="loginbox-terms">
									<label class="checkbox_word"><input type="checkbox"> I accept</label> <a href="terms.php" class="txt_blue">Term and conditions?</a>
								</div>	
								<p id="submit" class="btn btn-default btn-block">Register</p>
								<div class="loginbox-or">
                                    <div class="or-line"></div>
                                    <div class="or">OR</div>
                                </div>
								<div class="loginbox-title">Sign Up using social accounts </div>
								<ul class="social-network social-circle onwhite">
                                    <li><a href="<?php echo site_url('login/facebook');?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo site_url('login/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo site_url('login/google'); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="<?php echo site_url('login/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
								<div class="loginbox-signin pull-right"> Already have account ? <a class="txt_blue"> Sign in</a></div>
                            	<?php echo form_close(); ?>
                              </div>
                              
                            
                        </div> <!--End .login-container -->
                    </div>
                </div>
            </div>
        </section>
  </div>      

 <?php include('include/footer.php'); ?>
 
 
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




 <?php include('include/header.php'); ?>
        <section class="login-page-4 loginbox_parallex">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-container">
                        	<!--provider login-->
                            <div id="provider-signin" class="loginbox">
                            	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;">
                            	  Job Providers Login
                            	  <a class="pull-right" href="index.html"><i class="fa fa-close"></i></a>
                                </div><br>
                                <!-- <img src="images/logo.png" alt="logo" class="img-responsive center-block"> -->
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="email">
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="password">
                                </div>
                                <div class="loginbox-forgot propwd-forgot">
                                    <a class="txt_blue">Forgot Password?</a>
                                </div>
                                <div class="loginbox-submit">
                                    <a href="company-dashboard.html"><input type="button" class="btn btn-default btn-block" value="Login"></a>
                                </div>
                                <div class="loginbox-or">
                                    <div class="or-line"></div>
                                    <div class="or">OR</div>
                                </div>
                                <div class="loginbox-title">sign in using social accounts</div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="login-4.html#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="login-4.html#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="login-4.html#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="login-4.html#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <div class="loginbox-signup">New User ? <a class="txt_blue"> Sign Up</a></div>
                                
                             </div>
                             <!--Forgot password-->
                             <div id="provider-forgotpwd" class="loginbox" style="display:none;">  
                             	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;"> 
                            	  Forgot Password 
                            	  <a class="pull-right" href="index.html"><i class="fa fa-close"></i></a>
                                </div><br>
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="email">
                                </div>  
                                <div class="loginbox-submit">
                                    <a href="company-dashboard.html"><input type="button" class="btn btn-default btn-block" value="Retrive Password"></a>
                                </div>               
                             </div>
                             <!--Provider- signup-->
                             <div id="provider-signup" class="loginbox" style="display:none;" >
                            	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;"> 
                            	  Let's Get Started
                            	  <a class="pull-right" href="index.html"><i class="fa fa-close"></i></a>
                                </div><br>
                                <div class="form-group">
                                    <label>Username: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="email">
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password: <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="password">
                                </div>
                                <div class="loginbox-terms">
                                    <label class="checkbox_word"><input type="checkbox"> I accept </label><a href="register-4.html" class="txt_blue"> Term and conditions?</a>
                                </div>
                                <div class="loginbox-submit">
                                    <a href="company-dashboard.html"><input type="button" class="btn btn-default btn-block" value="Register"></a>
                                </div>
                                
                                <div class="loginbox-or">
                                    <div class="or-line"></div>
                                    <div class="or">OR</div>
                                </div>
                                <div class="loginbox-title">Sign Up using social accounts</div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="register-4.html#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="register-4.html#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="register-4.html#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="register-4.html#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                 </ul>
                                 <div class="loginbox-signin"> Already have account <a class="txt_blue">Sign in</a></div><br>
                              </div>
                         </div>
                     </div>
                 </div>
             </div>
        </section>

 <?php include('include/footer.php'); ?>

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

    