<?php include('include/header.php'); ?>
<?php include('include/menus.php');?>
<section class="job-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home</a> </li>
                            <li><a href="<?php echo base_url(); ?>">Institution</a> </li>
                            <li class="active">Institutions Details</li>
                        </ol>
                    </div>
                </div>
                
            </div>
        </div>
</section>
<!--Organisation Details--> 
<section class="organisation_detail light-grey">
    <div class="container">
        <div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
        		<div class="Heading-title black">
                   <h1><?php 
                        if(!empty($company_details['organization_name'])) :
                        ?>
                        <?php echo $company_details['organization_name']; ?>
                        <?php
                        endif;
                        ?>
                    </h1>                           
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                	<div class="single-job-page">
                		<div class="job-short-detail">
                            <!-- <div class="heading-inner">
                                <p class="title">Job Details</p>
                            </div> -->
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <dl>
                                	<?php
                                    if(!empty($this->session->userdata("login_status")) && $this->session->userdata("login_status") == TRUE){ 
                                        $user_type = $this->session->userdata("login_session");
                                    }
                                    else{
                                        $user_type = array('user_type'=>'guest');
                                    }
                                	if(!empty($company_details)) :
                                	?>
                                	<?php 
                                	if(!empty($company_details['organization_name'])) :
                                	?>
                                    <dt>Organisation Name</dt>
                                    <dd> <?php echo $company_details['organization_name']; ?> </dd>
                                    <?php
                                    endif;
                                    ?>
                                    <?php 
                                	if(!empty($company_details['organization_address_1'])) :
                                	?>
                                    <dt>Organisation Address1</dt>
                                    <dd><?php echo $company_details['organization_address_1']; ?></dd>
                                    <?php
                                    endif;
                                    ?>
                                    <?php 
                                	if(!empty($company_details['organization_address_2'])) :
                                	?>
                                    <dt>Organisation Address2</dt>
                                    <dd><?php echo $company_details['organization_address_2']; ?></dd>
                                    <?php
                                    endif;
                                    ?>
                                    <?php 
                                	if(!empty($company_details['organization_address_3'])) :
                                	?>
                                    <dt>Organisation Address3</dt>
                                    <dd><?php echo $company_details['organization_address_3']; ?></dd>
                                    <?php
                                    endif;
                                    ?>
                                    <?php 
                                    if(!empty($company_details['organization_state_id'])) :
                                    ?>
                                    <dt>Organisation State</dt>
                                    <dd><?php echo $company_details['state_name']; ?></dd>
                                    <?php
                                    endif;
                                    ?>
                                    <?php 
                                	if(!empty($company_details['organization_district_id'])) :
                                	?>
                                    <dt>Organisation District</dt>
                                    <dd><?php echo $company_details['district_name']; ?></dd>
                                    <?php
                                    endif;
                                    ?>
                                    <?php 
                                	if(!empty($company_details['organization_institution_type_id'])) :
                                	?>
                                    <dt>Institution Type</dt>
                                    <dd><?php echo $company_details['institution_type_name']; ?></dd>
                                    <?php
                                    endif;
                                    ?>
                            		<?php
                            		endif;
                            		?>
                                </dl>
                            </div>
                        </div>
                  	</div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                	<aside>
	                   	<div class="company-detail">
	                        <div class="company-img">
	                         	<div class="img-holder">	
			                        <?php
			                        if(!empty($company_details['organization_logo'])) :
			                        ?>
			                        <img src="<?php echo $company_details['organization_logo']; ?>" class="img-responsive" alt="Not Found"> 
			                        <?php
			                        else :
			                        ?>
			                        <img src="<?php echo base_url()."assets/images/institution.png"; ?>" class="img-responsive" alt="Institution Logo">
			                        <?php
			                        endif;
			                        ?>
								</div>  
							</div>
	                        <!-- <div class="single-job-map">
	                            <div id="map-contact">Organisation Map</div>
	                       	</div>  -->                                
	                    </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section> 
<!--End of Organisation Details-->
<!--Recently posted Jobs--> 
<section class="featured-jobs">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="Heading-title black">
                        <h1>Recently Posted Jobs</h1>
                        <p>Wondering which jobs might best suit you? Browse our advice on career planning and careers open to you with your degree for ideas. You can also sign up to Teacherportal for vacancy alerts based on career areas that interest you.</p>
                    </div>
                </div>
            </div> 
            <div class="owl-testimonial-2">     
                <?php
                if(!empty($recent_vacancy_details)) :
                foreach ($recent_vacancy_details as $rec_val) :
					
                ?>
                <div class="slide-featured-jobs">	                    	
	             	<div class="featured-image-box">
	                    <div class="content-area">
	                        <div class="">
	                            <h4> <?php echo $rec_val['vacancies_job_title']; ?> </h4>
	                            <p>  <?php echo $rec_val['organization_name']; ?> </p>
                                <p> <i class="fa fa-clock-o"></i> <?php echo ($rec_val['vacancy_type'] == "full" ? "Full Time" : ($rec_val['vacancy_type'] == "part" ? "Part Time" : "Not Mention")); ?> </p>
	                        </div>
	                        <div class="feature-post-meta">
	                            <i class="fa fa-clock-o"> 
                                <?php
                                $vac_date = date_create(date('Y-m-d',strtotime($rec_val['vacancies_created_date']))); 
                                $today = date_create(date('Y-m-d'));
                                $days = date_diff($vac_date,$today);
                                echo $days->d;
                                if($days->d <= 1) {
                                    echo " day ago";
                                }
                                else {
                                    echo " days ago";
                                }
                                ?>
                                </i>
						    </div>
							<!--Only required rule to the whole div clickable work--> 	     
                            <?php 
                            if($user_type['user_type'] =='provider' ){
                            ?>
                                <div class="feature-post-meta-bottom"><a class="apply pull-right">View</a> </div>
                            <?php   
                            }
                            else {
                            ?>
                                <div class="feature-post-meta-bottom"><a class="apply pull-right"> Apply Now</a> </div>
                            <?php
                            }
                            ?>
						</div>
                        <?php 
                        if($user_type['user_type'] =='provider' ){
                        ?>
                        <a href="<?php echo base_url(); ?>provider/postedjobdetail/<?php echo $rec_val['vacancies_id'];?>" >
                            <span class='featured-jobs-grid-link'></span>
                        </a>
                        <?php   
                        }
                        else {
                        ?>
                        <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $rec_val['vacancies_id'];?>" >
                            <span class='featured-jobs-grid-link'></span>
                        </a>
                        <?php
                        }
                        ?>
						<!--end rule-->
                    </div> 
                </div>
                <?php
                endforeach;
                else :
                ?>
                <div class="text-center">
                    <h1><strong>No recent jobs available</strong></h1>
                </div>
                <?php
                endif;
                ?>

            </div>	                 	                 	                   	              	                       
	    </div>      
        <!-- <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="load-more-btn">
                <a class="btn btn-default" href="#"> View All <i class="fa fa-angle-right"></i> </a>
            </div>
        </div> -->
    </div>
<!-- </div> -->
</section>  
<!--End of Recently Posted jobs-->
<!--Posted Jobs-->
<section id="insititution_profile_detail" class="featured-jobs">
    	<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
          			 <div class="Heading-title black">
			                <h1>Posted Jobs</h1>
			                <p>Wondering which jobs might best suit you? Browse our advice on career planning and careers open to you with your degree for ideas.</p>
			         </div>
                	 <div class="widget">
                        <!-- <div class="widget-heading"><span class="title">Posted Jobs</span></div> -->
                        <ul class="related-post">
                            <?php
                            if(!empty($vacancy_details)) :
                            $recent_jobs = array_slice($vacancy_details,-5,5,true);
                            foreach ($vacancy_details as $vac_val) :
                            ?>
	                        <li>
	                           	<div class="pull-left">
                                    <?php 
                                    if($user_type['user_type'] =='provider' ){
                                    ?>
                                    <a href="<?php echo base_url(); ?>provider/postedjobdetail/<?php echo $vac_val['vacancies_id'];?>"> <?php echo $vac_val['vacancies_job_title']; ?> </a>
                                    <?php   
                                    }
                                    else {
                                    ?>
                                    <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $vac_val['vacancies_id'];?>"> <?php echo $vac_val['vacancies_job_title']; ?> </a>
                                    <?php
                                    }
                                    ?>
                                </div>
	                            <span class="pull-right"><i class="fa fa-calendar"></i> <?php echo date('d M Y',strtotime($vac_val['vacancies_open_date'])); ?> </span>
                                <p class="pull-right"> <i class="fa fa-clock-o"></i> <?php echo ($vac_val['vacancy_type'] == "full" ? "Full Time" : ($vac_val['vacancy_type'] == "part" ? "Part Time" : "Not Mention")); ?> </p>
	                            <div class="clearfix"> </div>
	                            <p><?php echo substr($vac_val['vacancies_instruction'], 0, 100); ?>...</p>
	                            <span><i class="fa fa-rupee"></i> <?php echo number_format($vac_val['vacancies_start_salary']); ?> - <?php echo number_format($vac_val['vacancies_end_salary']); ?> </span>
	                        </li>
                            <?php
                            endforeach;
                            else :
                            ?>
                            <li class="text-center">
                                <strong>No posted jobs available</strong> 
                            </li>
                            <?php
                            endif;
                            ?>
                        </ul>
                    </div> <!--End .widget-->
                    <?php
                    if(!empty($links)) :
                        echo "<div class='col-md-12 col-sm-12 col-xs-12 nopadding'><div class='pagination-box clearfix'>" .$links . "</div></div>";
                    endif;
                    ?>
				</div> <!--col-sm-12-->
			</div> <!--row-->
		</div> <!--container-->
</section>
<!--End Posted Jobs-->
        
<?php include('include/footermenu.php'); ?>	
<?php include('include/footer.php'); ?>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbuVxM8vd876DdJ3vDZMakcC98TUwOGYs&callback=initMap" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/counterup.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
	<?php include('include/footercustom.php'); ?>
	 <script type="application/javascript">
	 $(document).ready(function() {
	 	$('.counter').counterUp({
	        delay: 10,
	        time: 2000
	    });
	    $(".owl-testimonial-2").owlCarousel({
	        autoPlay: true,
	        slideSpeed: 2000,
	        pagination: false,
	        navigation: false,
	        loop: true,
	        items: 3,
	        itemsDesktop: [1199, 3],
	        itemsDesktopSmall: [980, 2],
	        itemsTablet: [768, 2],
	        itemsTabletSmall: false,
	        itemsMobile: [479, 1]
	    });
	 });		 	
	 </script>
	
	 
	 <script type="application/javascript">
			function initialize() {
				var mapOptions = {
					zoom : 17,
					scrollwheel : false,
					center : new google.maps.LatLng(11.942160, 79.795164)
				};
				var map = new google.maps.Map(document.getElementById('map-contact'), mapOptions);				
			}
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
