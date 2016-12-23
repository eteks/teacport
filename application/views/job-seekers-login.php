 <?php include('include/header.php'); ?>
        <section class="login-page-4 loginbox_parallex full-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-container">
                       		<!--Seeker SignIn-->
                            <div id="seeker-signin" class="loginbox">
                                <div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;">
                                	Job Seekers Login<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                                </div>
                                <p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>
                                <p class="registration_status"> </p>
                                <?php echo form_open('login/seeker/', 'id="seeker_login_form" class="seeker_login_form form-group"'); ?>
                                <div class="col-sm-6 pull-left"> 
	                                <div class="form-group">
	                                    <label>Email or Mobile: <span class="required">*</span></label>
	                                    <input placeholder="" name="candidate_email" class="form-control" id="email" type="text">
	                                </div>
	                                <div class="form-group">
	                                    <label>Password: <span class="required">*</span></label>
	                                    <input placeholder="" name="candidate_password" class="form-control" id="password" type="password">
	                                </div>
	                                <div class="loginbox-forgot seekerpwd-forgot">
	                                    <a class="txt_blue remove_error_message_act">Forgot Password?</a>
	                                </div>
	                                <div class="loginbox-submit">
	                                    <a href="user-dashboard.html"><input type="submit" class="btn btn-default btn-block" value="Login"></a>
	                                </div>
	                            </div>    
                                <?php echo form_close(); ?>
                                <div class="col-sm-6 pull-left">
	                                <div class="loginbox-title">Sign in using social Accounts</div>
	                                <ul class="social-network social-circle onwhite">
	                                    <li><a href="<?php echo $fbloginurl; ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/seeker/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
	                                    <li><a href="<?php echo  site_url('login/seeker/google'); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/seeker/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
	                                </ul>
	                                <div class="loginbox-signup">New User ?
	                                    <a class="txt_blue remove_error_message_act">Sign Up</a>
	                                </div>
	                             </div>   
	                             <div class="clearfix"> </div>
                            </div> <!--End SignIn-->
                            
                             <!--Forgot Password-->
                            <div id="seeker-forgotpwd" class="loginbox" style="display:none;">
                            	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;"> 
                            		Forgot Password 
                            		<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                            	</div><br>
                            	<p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>
                                 <span class="error_test"> Please fill Enter Valid Email </span> 
                                 <?php echo form_open('login/forgot-password', 'id="forgotpass-form" class="forgotpass-form"'); ?>
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
                            	
                            <!--Seeker Signup-->
                            <div id="seeker-signup" class="loginbox" style="display:none;">
                            	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;" >
                            	  Let's Get Started
                            	  <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                                </div><br>
                                <p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>
                                <p class="registration_status"> </p>
                                <?php echo form_open('signup/seeker',array('id'=>'form')); ?>
                                <div class="col-sm-6 pull-left">
	                                <?php echo ('<div class="form-group">
	                                        <label>Institution: <span class="required">*</span></label>
	                                        <select name="candidate_institution_type" id="institution_type" class="form-control">');?>
	                                            <?php
	                                            foreach ($institutiontype as $institution) {
	                                                echo "<option value=".$institution['institution_type_id'].">".$institution['institution_type_name']."</option>";
	                                            }
	                                        
	                                            echo('</div>
	                                        </select>')
	                                 ?>
	                                <div class="form-group">
	                                    <?php echo form_label('Name :'); ?> <?php echo form_error('candidate_name'); ?>
	                                <?php echo form_input(array('id' => 'candidate_name','class' => 'form-control', 'name' => 'candidate_name')); ?>
	                                </div>
	                                <div class="form-group">
	                                    <?php echo form_label('Email :'); ?>
	                                	<?php echo form_input(array('id' => 'candidate_email','class' => 'form-control', 'name' => 'candidate_email')); ?>
	                                </div>
	                                <div class="form-group">
	                                    <?php echo form_label('Mobile No. :'); ?> <?php echo form_error('candidate_mobile_no'); ?>
	                                <?php echo form_input(array('id' => 'candidate_mobile_no','class' => 'form-control','name' => 'candidate_mobile_no')); ?>
	                                </div>
	                                <div class="form-group">
										<?php echo form_label('Captcha. :'); echo form_error('captcha_value'); ?>
										<?php echo ('<div class="form-group"><img class="captcha-img" id="captcha_img" src="'.$captcha['image_src'].'" />')?>
	                                	<a title="reload" class="reload-captcha" href="#"><img class="loading" src="<?php echo base_url();?>assets/images/refresh.png"></a>
	                                </div>	
	                                	<div class="col-sm-6 captcha_holder nopadding">
	                                		<label>Enter Captcha value :</label>
	                        				<?php echo form_input(array('id' => 'captcha_value','class' => 'form-control','name' => 'captcha_value')); ?>
	                        			</div>
	                        			<div class="clearfix"> </div>
	                        		</div>    
	                                <div class="loginbox-terms">
	                                   <label class="checkbox_word"><input type="checkbox"> I accept <a href="register-4.html" class="txt_blue" target="_blank">Term and conditions?</a>
	                                </div>
	                                <div class="loginbox-submit">
	                                    <input type="submit" class="btn btn-default btn-block" value="Register">
	                                </div>
	                              </div>
	                            </div>   
	                               
	                            <div class="col-sm-6 pull-left">
	                                <div class="loginbox-title">Sign Up using social accounts</div>
		                            <ul class="social-network social-circle onwhite">
	                                    <li><a href="<?php echo site_url('login/seeker/facebook');?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/google'); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
	                                    <li><a href="<?php echo site_url('login/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
	                                </ul> 
	                                <div class="loginbox-signin"> Already have account ?<a class="txt_blue remove_error_message_act"> Sign in</a> </div>
	                            </div>   
                            </div> <!--End Signup-->
                            
                           
                       </div>  <!--End login-container-->
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
 
 
 
