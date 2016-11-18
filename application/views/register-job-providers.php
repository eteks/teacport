 <?php include('include/header.php'); ?>        <section class="login-page-4 parallex">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12">                        <div class="login-container">                            <div class="loginbox">                                <div class="loginbox-title">Sign Up using social accounts <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a></div>                                <ul class="social-network social-circle onwhite">                                    <li><a href="<?php echo $fbloginurl;?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>                                    <li><a href="<?php echo site_url('login/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>                                    <li><a href="<?php echo $glogin_url; ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>                                    <li><a href="<?php echo site_url('login/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>                                </ul>								<?php echo form_open('signup/provider',array('id'=>'form')); ?>								<?php echo ('<div class="form-group">	                                    <label>Institution: <span class="required">*</span></label>	                                    <select name="registrant_institution_type" id="institution_type" class="form-control">');?>											<?php	                                    	foreach ($institutiontype as $institution) {												echo "<option value=".$institution['institution_type_id'].">".$institution['institution_type_name']."</option>";											}	                                    	                                    	echo('</div>	                                    </select>')	                                 ?>								<?php echo form_label('Name :'); ?> <?php echo form_error('registrant_name'); ?>								<?php echo form_input(array('id' => 'registrant_name','class' => 'form-control', 'name' => 'registrant_name')); ?>								<?php echo form_label('Email :'); ?> <?php echo form_error('registrant_email_id'); ?>								<?php echo form_input(array('id' => 'registrant_email_id','class' => 'form-control', 'name' => 'registrant_email_id')); ?>								<?php echo form_label('Mobile No. :'); ?> <?php echo form_error('registrant_mobile_no'); ?>								<?php echo form_input(array('id' => 'registrant_mobile_no','class' => 'form-control','name' => 'registrant_mobile_no')); ?>								<?php echo form_label('Captcha. :'); ?> <?php echo form_error('captcha_value'); ?>								<?php echo ('<div class="form-group"><img class="captcha-img" id="captcha_img" src="'.$captcha['image_src'].'" />')?>                                <a title="reload" class="reload-captcha" href="#"><img class="loading" src="<?php echo base_url();?>assets/images/refresh.png"></a>                                </div>                        		<?php echo form_input(array('id' => 'captcha_value','class' => 'form-control','name' => 'captcha_value')); ?>								<?php echo('<p>I accept <a href="register-4.html">Term and conditions?</a></p>'); ?>								<?php echo ('<p id="submit" class="btn btn-default btn-block">Register</p>'); ?>								<?php echo ('<p> Already have account<a href="<?php echo base_url();?>login/provider">Sign in</a></p>'); ?>                            	<?php echo form_close(); ?>                            </div>                        </div>                    </div>                </div>            </div>        </section>		 <?php include('include/footer.php'); ?>        <script type="text/javascript">            $(".full-page").height($(window).height());            $(window).resize(function() {                $(".full-page").height($(window).height());            });$(function(){    $('.reload-captcha').click(function(event){        event.preventDefault();        $.ajax({           url:baseurl+'job_provider/reload_captcha?'+Math.random(),           success:function(data){           	if(data) {           		// alert(data);           		$('.captcha-img').attr('src', data);           	}           }        });                });});$("#submit").click(function(){$("#form").submit();  // jQuey's submit function applied on form.});</script>