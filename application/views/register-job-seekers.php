<?php include('include/header.php'); ?>
    <section class="login-page-4 loginbox_parallex full-page">
        <div class="container">
	        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="login-container">
    		            <!--Seeker Signup-->
                        <div id="seeker-signup" class="loginbox">
            		       	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;" >
                    			Let's Get Started
                            	<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                            </div><br>
                            <?php echo form_open('signup/seeker','id="form" class="reg_login_form"'); ?>
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
			                        <?php echo ('<div class="form-group"> <label>Institution<sup class="alert">*</sup></label> <select name="candidate_institution_type" id="institution_type" class="form-control form_inputs">');?>
			                        <?php
			                        foreach ($institutiontype as $institution) {
			                            echo "<option value=".$institution['institution_type_id'].">".$institution['institution_type_name']."</option>";
			                        }
			                        echo('</div> </select>')
			                        ?>
			                        <div class="form-group">
			                            <?php echo form_label('Name <sup class="alert">*</sup>'); ?> <?php echo form_error('candidate_name'); ?>
			                        <?php echo form_input(array('id' => 'candidate_name','data-minlength' => '3','data-name' => 'Name' ,'maxlength' => '50','placeholder' => 'Name','class' => 'form-control form_inputs alpha_value', 'name' => 'candidate_name')); ?>
			                        </div>
			                        <div class="form-group">
			                            <?php echo form_label('Email <sup class="alert">*</sup>'); ?>
			                        	<?php echo form_input(array('id' => 'candidate_email','placeholder' => 'Email','class' => 'form-control form_inputs email_value', 'name' => 'candidate_email')); ?>
		                            </div>
		                            <div class="form-group">
		                                <?php echo form_label('Mobile No.<sup class="alert">*</sup>'); ?> <?php echo form_error('candidate_mobile_no'); ?>
		                            <?php echo form_input(array('id' => 'candidate_mobile_no','data-minlength' => '10','maxlength' => '10','data-name' => 'Mobile','placeholder' => 'Mobile','class' => 'form-control form_inputs numeric_value','name' => 'candidate_mobile_no')); ?>
		                            </div>
		                            <div class="form-group">
										<?php echo form_label('Captcha'); echo form_error('captcha_value'); ?>
										<?php echo ('<div class="form-group"><img class="captcha-img" id="captcha_img" src="'.$captcha['image_src'].'" />')?>
		                            	<a title="reload" class="reload-captcha" href="#"><img class="loading" src="<?php echo base_url();?>assets/images/refresh.png"></a>
		                            </div>
		                            <div class="col-sm-6 captcha_holder nopadding captcha_des_act">
		                            	<label>Enter captcha Value :<span class="alert">*</span></label>
		                            	 <?php echo form_input(array('id' => 'captcha_value','placeholder' => 'Captcha Value','class' => 'form-control form_inputs','name' => 'captcha_value')); ?>
		                            </div>
			                        <div class="clearfix"> </div>
			                    </div>    
		                        <div class="loginbox-terms">
		                           <label class="checkbox_word">
		                           <?php echo form_input(array('type' => 'checkbox','value' => '1','name' => 'accept_terms', 'class' => 'form_dec')); ?> I accept <a href="#" class="txt_blue">Term and conditions?</a>
	                            </div>
	                            <div class="loginbox-submit">
	                                <input type="submit" class="btn btn-default btn-block" value="Register">
	                            </div>
	                       	<?php echo form_close(); ?>
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
	                <div class="clearfix"> </div> 
               	</div> <!--End Signup-->
                <!--Forgot Password-->
                <div id="seeker-forgotpwd" class="loginbox" style="display:none;">
                  	<div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;"> 
                  		Forgot Password 
                  		<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                  	</div><br>
                    <?php echo form_open('login/seeker/forgotpassword', 'id="forgotpass-form" class="forgotpass-form reg_login_form"'); ?>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Email address <sup class="alert">*</sup> </label>
                            <?php echo form_error('forget_email'); ?>
                            <input id="forget_email" name="forget_email" class="form-control form_inputs email_value input" size="20" placeholder="Enter Email" type="text">
                        </div>
                        <button id="submit" type="submit" class="btn btn-default btn-block">
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
                <!--Seeker SignIn-->
                <div id="seeker-signin" class="loginbox" style="display:none;">
                    <div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;">
                      	Job Seekers Login<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                    </div>
                    <?php echo form_open('login/seeker/', 'id="seeker_login_form" class="seeker_login_form reg_login_form form-group"'); ?>
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
	                        <div class="form-group">
		                        <label>Email or Mobile<sup class="alert">*</sup></label>
    	                        <input placeholder="Email or Mobile" name="candidate_email" class="form-control form_inputs email_mobile_value" id="email" type="text">
                            </div>
                            <div class="form-group">
                                <label>Password<sup class="alert">*</sup></label>
                                <input placeholder="Password" name="candidate_password" class="form-control form_inputs" id="password" type="password">
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
            </div>  <!--End login-container-->  
        </div>   
    </div>
    </div>
  </section>

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