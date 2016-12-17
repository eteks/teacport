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
                                <div class="loginbox-forgot">
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

    