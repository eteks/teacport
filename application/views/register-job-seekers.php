 <?php include('include/header.php'); ?>  <?php include('include/menus.php'); ?>        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Registration Page</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="register.html#">Home</a> </li>                                <li class="active">Registeration</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="login-page light-blue">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12">                    <form id="seeker_register_form" class="seeker_register_form form-group" method="POST" action="job_seeker/register_job_seeker">                        <div class="login-container">                            <div class="loginbox">                                <div class="loginbox-title">                                     <span>Let's Get Strated</span>
                                     <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>                                </div>                                <p class="registration_status"> </p>                                <div class="form-group">                                    <label>Username: <span class="required">*</span></label>                                    <input placeholder="" name="candidate_name" class="form-control" id="username1" type="text">                                </div>                                <div class="form-group">                                    <label>Email: <span class="required">*</span></label>                                    <input placeholder="" name="candidate_email" class="form-control" id="email" type="text">                                </div>                                <div class="form-group">                                    <label>Password: <span class="required">*</span></label>                                    <input placeholder="" name="candidate_password" class="form-control" id="register_password" type="password">                                </div>                                <div class="form-group">                                    <label>Confirm Password: <span class="required">*</span></label>                                    <input placeholder="" name="candidate_password" class="form-control" id="confirm_password" type="password">                                </div>                                <div class="loginbox-forgot">                                    <input type="checkbox"> I accept <a href="register.html">Term and consitions?</a>                                </div>                                <div class="loginbox-submit">                                    <a href="user-dashboard.html"><input type="submit" class="btn btn-default btn-block" value="Register"></a>                                </div>                                <div class="loginbox-or">                                    <div class="or-line"></div>                                    <div class="or">OR</div>                                </div>                                <div class="loginbox-title">Sign Up using social accounts</div>                                <ul class="social-network social-circle onwhite">
                                    <li><a href="<?php echo $fbloginurl;?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo site_url('login/twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="register.html#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="<?php echo site_url('login/linkedin');?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>                                <div class="loginbox-or">                                    <div class="or-line"></div>                                    <div class="or">OR</div>                                </div>                                <div class="loginbox-signup"> Already have account <a href="login.html">Sign in</a> </div>                            </div>                        </div>                        </form>                    </div>                </div>            </div>        </section>               <?php include('include/footermenu.php'); ?>        <?php include('include/footer.php'); ?>