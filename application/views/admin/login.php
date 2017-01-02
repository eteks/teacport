<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.3
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Teachers Recruit - Login page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link rel="icon" href="<?php echo base_url(); ?>assets/admin/img/tr_favicon.ico" type="image/x-icon">
  <link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/css/style_default.css" rel="stylesheet" id="style_color" />
  <!--My custom Fonts--> 
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
      <div id="logo" class="center">
          <a class="brand" href="<?php echo base_url(); ?>main/dashboard">
	            <img class="tr_logo pull-left" src="<?php echo base_url(); ?>assets/admin/img/teachers_recruit_logo.png" alt="Admin Lab" height="30px;" width="30px;" />
	            <h4 class="pull-left"><strong><span class="logo_firstword">Teachers</span> <span class="logo_secondword">Recruit</span></strong></h4>
	            <span class="clearfix"> </span>
	        </a>
      </div>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form id="admin_login_form" class="form-vertical no-padding no-margin admin_login_form" action="admin_login">
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
          <h4>User Login</h4>
          <p class="admin_status"></p>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on">
                        <i class="icon-user"></i>
                      </span>
                      <input id="input-username" type="text" name="username" value="<?php if(!empty($remember_value)) echo $remember_value; ?>" placeholder="Username" />
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on">
                        <i class="icon-key"></i>
                      </span>
                      <input id="input-password" type="password" name="password" placeholder="Password" />
                  </div>
                  <div class="mtop10">
                      <div class="block-hint pull-left small">
                          <input type="checkbox" id="" name="remember_me"> Remember Me
                      </div>
                      <div class="block-hint pull-right">
                        <a href="javascript:;" class="" id="forget-password">Forgot Password?</a>
                      </div>
                  </div>
                  <div class="clearfix space5"></div>
              </div>
          </div>
      </div>
      <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide admin_login_form" action="admin_login/admin_forget">
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <p class="admin_status"></p>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on">
              <i class="icon-envelope"></i>
            </span>
            <input id="input-email" type="text" name="useremail" placeholder="Email"  />
          </div>
          <div class="">
               <div class="block-hint pull-right">
                    <a href="javascript:;" class="" id="cancel">Cancel</a>
               </div>
         </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="submit" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      2016 &copy; Teacher Recruit.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/jquery.blockui.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/ajax_call.js"></script> 
  <script>
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    var admin_baseurl = "<?php echo base_url(); ?>main/"; // Route path
    var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
  </script>

  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
