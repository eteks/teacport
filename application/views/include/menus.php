<nav id="menu-1" class="mega-menu fa-change-black" data-color="">
	<section class="menu-list-items">
        <ul class="menu-logo">
            <li>
                <a href="<?php echo base_url(); ?>" id="webpage_title"> 
                	<h4><strong style="color: #2ae; font-size: 30px; font-family: 'Kaushan Script', cursive;">Teachers Recruit</strong></h4>
                	<!-- <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" class="img-responsive"> --> 
                </a>
            </li>
        </ul>
        <ul class="menu-links pull-right">
            <?php 
            	if(!empty($this->session->userdata("login_status")) && $this->session->userdata("login_status") == TRUE){ 
            		$user_type = $this->session->userdata("login_session"); 
            		if($user_type['user_type'] =='provider' ){
        	?>
        				<li> <a href="<?php echo base_url();?>"> Home </a> </li>
			        	<li> <a href="<?php echo base_url();?>aboutus"> About Us </a> </li>
			        	<li><a href="javascript:void(0)"> Job Providers <i class="fa fa-angle-down fa-indicator"></i></a> 
			            	<ul class="drop-down-multilevel">
			                    <li><a href="<?php echo base_url();?>pricing">Pricing</a></li>
			             	</ul>
			          	</li>
			          	<li> <a href="<?php echo base_url(); ?>allinstitutions"> Institutions </a> </li>
			          	<li> <a href="<?php echo base_url(); ?>vacancies"> Vacancies </a> </li>
			          	<li> <a href="<?php echo base_url();?>home/contactus"> Contact Us </a> </li>
			          	<li class="no-bg"><a href="<?php echo base_url(); ?>provider/postjob" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
						<li class="profile-pic">
							<a href="javascript:void(0)">
								<img src="<?php echo isset($organization['registrant_logo'])?$organization['registrant_logo']:$user_type['registrant_logo'] ;?>" alt="user-img" class="img-circle" width="36">
			                    <span class="hidden-xs hidden-sm"><?php echo isset($user_type['registrant_name'])?$user_type['registrant_name']:$organization['registrant_name'] ;?> </span>
			                    <i class="fa fa-angle-down fa-indicator"></i> 
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
			        	<li><a href="javascript:void(0)"> Job Providers <i class="fa fa-angle-down fa-indicator"></i></a> 
			            	<ul class="drop-down-multilevel">
			                    <li><a href="<?php echo base_url();?>pricing">Pricing</a></li>
			             	</ul>
			          	</li>
			          	<li><a href="javascript:void(0)"> Job Seekers <i class="fa fa-angle-down fa-indicator"></i></a> 
			            	<ul class="drop-down-multilevel">
			                    <li><a href="<?php echo base_url(); ?>faq">FAQ's</a></li>
			             	</ul>
			          	</li>
			          	<li> <a href="<?php echo base_url(); ?>allinstitutions"> Institutions </a> </li>
			          	<li> <a href="<?php echo base_url(); ?>vacancies"> Vacancies </a> </li>
			          	<li> <a href="<?php echo base_url();?>home/contactus"> Contact Us </a> </li>
			           <li class="profile-pic">
			              	<a href="javascript:void(0)"> 
			                  	<img src="<?php echo !empty($user_type['candidate_image_path'])?$user_type['candidate_image_path']:base_url().'assets/images/admin.jpg';?>" alt="user-img" class="img-circle" width="36">
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
		          	<li> <a href="<?php echo base_url(); ?>vacancies"> Vacancies </a> </li>
		          	<li> <a href="<?php echo base_url();?>home/contactus"> Contact Us </a> </li>
		          	<li class="no-bg login-btn-no-bg">
		          	   <a class="login-header-btn" data-toggle="modal" data-target="#login_home_btn"  data-backdrop="static" data-keyboard="false">
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
  <div class="modal-content">
    <div class="modal-header">
    	<a class="pull-right" href=""><i class="fa fa-close"></i></a>
      <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      <h4 class="modal-title">Provider &amp; Seeker Login</h4>
    </div>
    <div class="modal-body profile-edit">
    	<form class="">
    				<div class="form-group">
						<label class="pull-left">Select :<sup class="required alert">*</sup></label>
						<div class="provider_radio pull-left">
							<input class="" type="radio">Job Provider
						</div>
						<div class="seeker_radio pull-left">
							<input class="" type="radio">Job Seeker
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form-group">
                        <label>Email / Mobile No. : <sup class="required alert">*</sup></label>
                        <input placeholder="" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label>Password : <sup class="required alert">*</sup></label>
                        <input placeholder="" class="form-control" type="password">
                    </div>
                    <div class="loginbox-submit">
                        <a href="company-dashboard.html"><input type="button" class="btn btn-default btn-block" value="Login"></a>
                    </div>
                  
                 </form>    
    </div>
    <div class="modal-footer">
    	<div class="home_sociallogin text-center">Sign in using social accounts</div>
                    <ul class="social-network social-circle onwhite">
                        <li><a href="login-4.html#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="login-4.html#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="login-4.html#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="login-4.html#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
       <div class="loginbox-signup">New User ? <a class="txt_blue" href="<?php echo base_url() ?>signup/seeker"> Sign Up</a></div>
    </div>
  </div>
 </div>
  </div>

        