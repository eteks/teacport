<nav id="menu-1" class="mega-menu fa-change-black" data-color="">
	<section class="menu-list-items">
    	<ul class="menu-logo">
            <li>
                <a href="<?php echo base_url(); ?>" id="webpage_title"> 
                	<img src="<?php echo base_url(); ?>assets/images/logo/new_logo.png" alt="logo" class="img-responsive tr_logo pull-left">
                	<!-- <h4 class="pull-left"><strong><span class="logo_firstword">Teachers</span> <span class="logo_secondword">Recruit</span></strong></h4> -->
                	<span class="clearfix"> </span>
                </a>
            </li>
        </ul>
        <ul class="menu-links pull-right">
            <?php 
        	if(!empty($this->session->userdata("login_status")) && $this->session->userdata("login_status") == TRUE) { 
    		$user_type = $this->session->userdata("login_session"); 
    		if($user_type['user_type'] =='provider' ) {
        	?>
			<li> <a href="<?php echo base_url();?>"> Home </a> </li>
        	<li> <a href="<?php echo base_url();?>aboutus"> About Us </a> </li>
        	<li><a href="<?php echo base_url(); ?>provider/dashboard"> Dashboard</a></li>
        	<li><a href="javascript:void(0)"> Job Providers <i class="fa fa-angle-down fa-indicator"></i></a> 
        	<ul class="drop-down-multilevel">
                    <li><a href="<?php echo base_url();?>pricing">Pricing</a></li>
             	</ul>
          	</li>
          	<li> <a href="<?php echo base_url(); ?>allinstitutions"> Institutions </a> </li>
          	<li> <a href="<?php echo base_url(); ?>provider/candidate"> Browse Candidate </a> </li>
          	<li> <a href="<?php echo base_url();?>home/contactus"> Contact Us </a> </li>
          	<!-- <li class="no-bg"><a href="<?php echo base_url(); ?>provider/postjob" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li> -->
			<li class="profile-pic">
			<a href="javascript:void(0)">
                <?php 
          		if(!empty($user_type['provider_image_path'])) :
          			$keyword = "uploads";
	    			// To check whether the image path is cdn or local path
			        if(strpos( $user_type['provider_image_path'] , $keyword ) !== false) {
	       				$thumb_image = explode('.', end(explode('/',$user_type['provider_image_path'])));
						$thumb = base_url().PROVIDER_UPLOAD.$thumb_image[0]."_thumb.".$thumb_image[1];
			        }
			        else {
			        	$thumb = $user_type['provider_image_path'];
			        }              			
				?>
				<img src="<?php echo $thumb; ?>" alt="user-img" class="img-circle pull-left" width="36" />
			    <?php
			    else :
			    ?>
				<img src="<?php echo base_url().'assets/images/admin.jpg' ;?>" alt="user-img" class="img-circle pull-left" width="36">
				<?php
			    endif;
			    ?>	
                <span id="org_profile_name" class="hidden-xs hidden-sm pull-right">
                <?php 
                echo !empty($user_type['registrant_name'])?$user_type['registrant_name']:(isset($user_type['organization_name'])?$user_type['organization_name']:'') ; ?> 
                <i class="fa fa-angle-down fa-indicator"></i> 
                </span>
                <div class="clearfix"></div>
            </a>
            <ul class="drop-down-multilevel left-side">
                <li><a href="<?php echo base_url(); ?>provider/dashboard"><i class="fa fa-user"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>provider/dashboard/editprofile"><i class="fa fa-gear"></i> Edit Profile</a></li>
                <li><a href="<?php echo base_url(); ?>provider/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
			<?php 
			}
			else if($user_type['user_type'] =='seeker' )
			{ 
			?>
			<li> <a href="<?php echo base_url();?>"> Home </a> </li>
        	<li> <a href="<?php echo base_url();?>aboutus"> About Us </a> </li>
        	<!-- <li><a href="javascript:void(0)"> Job Providers <i class="fa fa-angle-down fa-indicator"></i></a> 
	        	<ul class="drop-down-multilevel">
	                <li><a href="<?php echo base_url();?>pricing">Pricing</a></li>
	         	</ul>
	      	</li> -->
          	<li><a href="javascript:void(0)"> Job Seekers <i class="fa fa-angle-down fa-indicator"></i></a> 
            	<ul class="drop-down-multilevel">
                    <li><a href="<?php echo base_url(); ?>faq">FAQ's</a></li>
             	</ul>
          	</li>
          	<li> <a href="<?php echo base_url(); ?>allinstitutions"> Institutions </a> </li>
          	<li> <a href="<?php echo base_url(); ?>seeker/findjob"> Find Jobs </a> </li>
          	<li> <a href="<?php echo base_url();?>home/contactus"> Contact Us </a> </li>
           	<li class="profile-pic">
	          	<a href="javascript:void(0)"> 
	          		<?php 
	          		if(!empty($user_type['candidate_image_path'])) :
	          			$keyword = "uploads";
		    			// To check whether the image path is cdn or local path
				        if(strpos( $user_type['candidate_image_path'] , $keyword ) !== false) {
		       				$thumb_image = explode('.', end(explode('/',$user_type['candidate_image_path'])));
							$thumb = base_url().SEEKER_UPLOAD."pictures/".$thumb_image[0]."_thumb.".$thumb_image[1];
				        }
				        else {
				        	$thumb = $user_type['candidate_image_path'];
				        }              			
					?>
					<img src="<?php echo $thumb; ?>" alt="user-img" class="img-circle" width="36" />
				    <?php
				    else :
				    ?>
					<img src="<?php echo base_url().'assets/images/admin.jpg' ;?>" alt="user-img" class="img-circle" width="36">
					<?php
				    endif;
				    ?>	
	              	<span class="hidden-xs hidden-sm"><?php echo $user_type['candidate_name'];?> </span>
	              	<i class="fa fa-angle-down fa-indicator"></i> 
	        	</a>
            <ul class="drop-down-multilevel left-side">
                <li><a href="<?php echo base_url(); ?>seeker/dashboard"><i class="fa fa-user"></i> Dashboard </a></li>
                <li><a href="<?php echo base_url(); ?>seeker/editprofile"><i class="fa fa-gear"></i> Edit Profile</a></li>
                <li><a href="<?php echo base_url(); ?>seeker/logout"></i><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          	<?php 
			}
			else
			{ 
			?>
			<li class="profile-pic">                        
        		<a href="javascript:void(0)"> 
					<img src="<?php echo !empty($organization['registrant_logo'])?$organization['registrant_logo']:base_url().'assets/images/admin.jpg'; ?>" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm"><?php echo $organization['registrant_name']; ?> </span><i class="fa fa-angle-down fa-indicator"></i>
				</a>
            <?php 
			} 
			?>
			</li>
			<?php 
			}
			else 
			{
			?>
           	<li> <a href="<?php echo base_url();?>"> Home </a> </li>
        	<li> <a href="<?php echo base_url();?>aboutus"> About Us </a> </li>
        	<li><a href="javascript:void(0)"> Job Providers <i class="fa fa-angle-down fa-indicator"></i></a> 
            	<ul class="drop-down-multilevel">
                	<li><a href="<?php echo base_url();?>login/provider">Sign In</a></li>
                    <li><a href="<?php echo base_url();?>signup/provider">Sign Up</a></li>
                    <li><a href="<?php echo base_url();?>pricing">Pricing</a></li>
             	</ul>
          	</li>
          	<li><a href="javascript:void(0)"> Job Seekers <i class="fa fa-angle-down fa-indicator"></i></a> 
            	<ul class="drop-down-multilevel">
                	<li><a href="<?php echo base_url();?>login/seeker">Sign In</a></li>
                    <li><a href="<?php echo base_url();?>signup/seeker">Sign Up</a></li>
                    <li><a href="<?php echo base_url(); ?>faq">FAQ's</a></li>
             	</ul>
          	</li>
          	<li> <a href="<?php echo base_url(); ?>allinstitutions"> Institutions </a> </li>
          	<li> <a href="<?php echo base_url(); ?>teachersvacancy"> Vacancies </a> </li>
          	<li> <a href="<?php echo base_url();?>home/contactus"> Contact Us </a> </li>
	       	<li class="no-bg login-btn-no-bg">
          	   <a class="login-header-btn index_page_login" data-toggle="modal" data-target="#login_home_btn"  data-backdrop="static" data-keyboard="false">
          		<i class="fa fa-sign-in"></i> Log in
          	   </a>
            </li>
			<?php
			}
			?>
        </ul>
    </section>
</nav>
<div class="clearfix"></div>
<div class="modal fade" id="login_home_btn" role="dialog">
	<div class="modal-dialog">
  	<!-- Modal content-->
  		<div class="modal-content extra_login_menu">
    		<div class="modal-header">
    			<a class="pull-right" href="<?php echo base_url(); ?>"><i class="fa fa-close"></i></a>
      			<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      			<h4 class="modal-title">Provider / Seeker Login</h4>
    		</div>
    		<div class="modal-body profile-edit">
				<form class="" method="post" accept-charset="utf-8">
					<!--SignIn-->
					<div id="show_signin">
						<div style="display:none">
							<input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" name="csrf_token">
						</div>
	    				<div class="form-group">
	    					<label class="label_height pull-left">I Am a<sup class="required alert">*</sup></label>
							<div class="provider_radio pull-left">
								<input class="user_login_category" type="radio" name="user_category" value="provider">Job Provider
							</div>	
							<div class="seeker_radio pull-left">
								<input class="user_login_category" type="radio" name="user_category" value="seeker">Job Seeker
							</div>
							<div class="clearfix"> </div>
						</div>		
						<div class="form-group">
	                    	<label>Email / Mobile No. <sup class="required alert">*</sup></label>
	                    	<input placeholder="" class="form-control extra_login_menu_user_name" type="text">
	                	</div>
	                	<div class="form-group">
	                    	<label>Password <sup class="required alert">*</sup></label>
	                    	<input placeholder="" class="form-control extra_login_menu_password" type="password">
	                	</div>
	                	<!-- <a class="recover_password txt_blue">Forget Password ?</a> -->
	                	<div class="loginbox-submit">
	                    	<a><input type="submit" class="btn btn-default btn-block extra_login_menu_submit custom_disabled" value="Login"></a>
	                	</div>
	                	<!-- <div class="margin_10 pull-right">Not a registerd user? 
                			<a class="popup_signup txt_blue"> Sign up</a>
                		</div>  -->
                		<div class="clearfix"> </div>
	                </div>
	                <!--End SignIn-->
	                <!--SignUp-->
					<div id="show_signup" class="dn">
						<form class="" method="post" accept-charset="utf-8">
							<div class="form-group">
								<label class="label_height pull-left">I Am a<sup class="required alert">*</sup></label>
								<div class="provider_radio pull-left">
									<input class="user_login_category" type="radio" name="user_category" value="provider">Job Provider
								</div>	
								<div class="seeker_radio pull-left">
									<input class="user_login_category" type="radio" name="user_category" value="seeker">Job Seeker
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="form-group">
					        	<label>Institution<sup class="required alert">*</sup></label>
					        	<select class="form-control">
					        		<option>kinderGarden</option>
					        		<option>School</option>
					        		<option>Arts and Science</option>
					        		<option>Engineering</option>
					        		<option>Medical</option>
					        	</select>
					    	</div>	
							<div class="form-group">
					        	<label>Name<sup class="required alert">*</sup></label>
					        	<input placeholder="Organization Name" class="form-control" type="text">
					    	</div>	
							<div class="form-group">
					        	<label>Email <sup class="required alert">*</sup></label>
					        	<input placeholder="Register Email id" class="form-control extra_login_menu_user_name" type="text">
					    	</div>
					    	<div class="form-group">
					        	<label>Mobile No. <sup class="required alert">*</sup></label>
					        	<input placeholder="Mobile Number" class="form-control" type="text">
					    	</div>
					    	<div class="form-group">
					        	<label>Captacha<sup class="required alert">*</sup></label>
					        	<input class="form-control" type="text">
					    	</div>
					    	<div class="form-group">
					        	<label>Enter Captacha value <sup class="required alert">*</sup></label>
					        	<input placeholder="Captacha Value" class="form-control" type="password">
					    	</div>
					    	<div class="loginbox-submit">
					        	<a><input type="submit" class="btn btn-default btn-block extra_login_menu_submit custom_disabled" value="Sign Up"></a>
					    	</div>
					    </form>
					    <div class="margin_10 pull-right">Already have an account?
					    	<a class="popup_signin txt_blue"> Sign In</a>
					    </div>   
					    <div class="clearfix"> </div> 
					</div>
					<!--End Sign up-->
					<!--Password-->
					<div id="show_pwd" class="dn">
						<div class="form-group">
				        	<label>Email Id<sup class="required alert">*</sup></label>
				        	<input class="form-control" type="text">
				    	</div>
				    	 <button type="submit" class="btn btn-default btn-block">
                            <i class="fa fa-unlock"> </i> Retrieve Password
                        </button>
					</div>	
                </form>
                   
    		</div>
    		<div class="modal-footer">
    			<div class="home_sociallogin text-center">SignIn/SignUp using social accounts</div>
        		<ul class="social-network social-circle onwhite social_login_links_home custom_disabled">
            		<li><a href="" class="icoFacebook social_login_home_facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            		<li><a href="" class="icoTwitter social_login_home_twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
        			<li><a href="" class="icoGoogle social_login_home_google" title="Google +"><i class="fa fa-google-plus"></i></a></li>
            		<li><a href="" class="icoLinkedin social_login_home_linkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
        		</ul>
			</div>
		</div>
	</div>
</div>
