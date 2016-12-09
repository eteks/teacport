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
								<img src="<?php echo $user_type['registrant_logo'] ;?>" alt="user-img" class="img-circle" width="36">
			                    <span class="hidden-xs hidden-sm"><?php echo $user_type['registrant_name'] ;?> </span>
			                    <i class="fa fa-angle-down fa-indicator"></i> 
			                </a>
				            <ul class="drop-down-multilevel left-side">
				                <li><a href="<?php echo base_url(); ?>provider/dashboard"><i class="fa fa-user"></i> Dashboard</a></li>
				                <li><a href="<?php echo base_url(); ?>provider/dashboard/editprofile"><i class="fa fa-gear"></i> Edit Profile</a></li>
				                <li><a href="<?php echo base_url(); ?>provider/logout"></i> Logout</a></li>
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
				                <li><a href="<?php echo base_url(); ?>seeker/logout"></i> Logout</a></li>
				            </ul>
          	<?php 
					}
					else
					{ 
			?>
						<li class="profile-pic">                        
			        		<a href="javascript:void(0)"> 
								<img src="<?php echo !empty($user_data['registrant_logo'])?$user_data['registrant_logo']:base_url().'assets/images/admin.jpg'; ?>" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm"><?php echo $user_data['registrant_name']; ?> </span><i class="fa fa-angle-down fa-indicator"></i>
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
			<?php
				}
			?>

        </ul>
    </section>
</nav>
<div class="clearfix"></div>
        