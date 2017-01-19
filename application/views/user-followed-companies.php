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
                           <h3>Etekchnoservices Pvt Limited</h3>                           
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	<div class="single-job-page">
                        		<div class="job-short-detail">
                                    <!-- <div class="heading-inner">
                                        <p class="title">Job Details</p>
                                    </div> -->
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                        <dl>
                                            <dt>Organisation Name:</dt>
                                            <dd>ETekchno Services P Ltd</dd>

                                            <dt>Organisation Address1:</dt>
                                            <dd>#35, Subramaniyar Koil Street </dd>

                                            <dt>Organisation Address2:</dt>
                                            <dd>Kathirkamam </dd>

                                            <dt>Organisation Address3:</dt>
                                            <dd>Puducherry</dd>

                                            <dt>Organisation District</dt>
                                            <dd>Puducherry </dd>

                                            <dt>Institution Type:</dt>
                                            <dd>Engineering</dd>                                        
                                        </dl>
                                    </div>
                                </div>

                        	</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                        	<div class="company-detail">
                                    <div class="company-img">
                                        <img src="assets/images/company/white.jpg" class="img-responsive" alt="Institution Logo" class="img-responsive center-block">
                                    </div>
                                     <div class="single-job-map">
                               			 <div id="map-contact">Organisation Map</div>
                           			 </div>                                 
                                </div>
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
                    
                    <div class="owl-testimonial-2">                   
	                    <div class="slide-featured-jobs">	                    	
	                    	<div class="featured-image-box">
	                            <div class="img-box">	                            	
                                		<img src="assets/images/institution.png" alt="Teacher recruit" style="height: 119px" class="img-responsive center-block">
								</div>	                            
	                            <div class="content-area">
	                                <div class="">
	                                    <h4>Teacher</h4>
	                                    <p>Etekchoservices.com</p>
	                                </div>
	                                <div class="feature-post-meta">
	                                    <i class="fa fa-clock-o">2 days ago</i>
									</div>
									<!--Only required rule to the whole div clickable work--> 	                           
									<div class="feature-post-meta-bottom"><a class="apply pull-right">Apply Now</a> </div>
								</div>
	                            <a href='javascript:void(0)' >
        							<span class='featured-jobs-grid-link'></span>
    							</a>
    							<!--end rule-->
                            </div> 
                          </div>                           
	                    </div>	                   
	                </div>
	                
                    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="load-more-btn">
                            <a class="btn btn-default" href="#"> View All <i class="fa fa-angle-right"></i> </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
   </section>
   <!--End of Recently Posted jobs-->
			
        
<?php include('include/footermenu.php'); ?>	
	<?php include('include/footer.php'); ?>
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