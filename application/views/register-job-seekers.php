 <?php include('include/header.php'); ?>  <?php include('include/menus.php'); ?>        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Registration Page</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="register.html#">Home</a> </li>                                <li class="active">Registeration</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="login-page light-blue">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12">                                            <div class="login-container">                            <div class="loginbox">                                <div class="loginbox-title">                                     <span>Let's Get Strated</span>                                     <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>                                </div>                                <p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>                                <p class="registration_status"> </p>                                <?php echo form_open('signup/seeker',array('id'=>'form')); ?>                                <?php echo ('<div class="form-group">                                        <label>Institution: <span class="required">*</span></label>                                        <select name="registrant_institution_type" id="institution_type" class="form-control">');?>                                            <?php                                            foreach ($institutiontype as $institution) {                                                echo "<option value=".$institution['institution_type_id'].">".$institution['institution_type_name']."</option>";                                            }                                                                                    echo('</div>                                        </select>')                                     ?>                                <?php echo form_label('Name :'); ?> <?php echo form_error('candidate_name'); ?>                                <?php echo form_input(array('id' => 'candidate_name','class' => 'form-control', 'name' => 'candidate_name')); ?>                                <?php echo form_label('Email :'); ?> <?php echo form_error('candidate_email'); ?>                                <?php echo form_input(array('id' => 'candidate_email','class' => 'form-control', 'name' => 'candidate_email')); ?>                                <?php echo form_label('Mobile No. :'); ?> <?php echo form_error('candidate_mobile_no'); ?>                                <?php echo form_input(array('id' => 'candidate_mobile_no','class' => 'form-control','name' => 'candidate_mobile_no')); ?>                                <?php echo form_label('Captcha. :'); ?> <?php echo form_error('captcha_value'); ?>                                <?php echo (' <div class="form-group"><img class="captcha-img" id="captcha_img" src="'.$captcha['image_src'].'" /><a title="reload" class="reload-captcha" href="#"><img class="loading" src="http://localhost/teacport/assets/images/refresh.png" /></a>                                        </div>');?>                                <?php echo form_input(array('id' => 'captcha_value','class' => 'form-control','name' => 'captcha_value')); ?>                                <?php echo('<p>I accept <a href="register-4.html">Term and conditions?</a></p>'); ?>                                <?php echo ('<p id="submit" class="btn btn-default btn-block">Register</p>'); ?>                                <?php echo ('<p> Already have account<a href="<?php echo base_url();?>login/seeker">Sign in</a></p>'); ?>                                <?php echo form_close(); ?>                            </div>                        </div>                                            </div>                </div>            </div>        </section>               <?php include('include/footermenu.php'); ?>        <?php include('include/footer.php'); ?>        <script>            $(function(){    $('.reload-captcha').click(function(event){        event.preventDefault();        $.ajax({           url:baseurl+'job_provider/reload_captcha?'+Math.random(),           success:function(data){            if(data) {                // alert(data);                $('.captcha-img').attr('src', data);            }           }        });                });});$("#submit").click(function(){$("#form").submit();  // jQuey's submit function applied on form.});        </script>