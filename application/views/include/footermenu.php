<!--footer-->
   <div class="small-footer">
   	    <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <div class="footer_block"> 
                        	<a href="<?php echo base_url(); ?>" id="webpage_title" class="footer_logo"> 
			                	<img src="<?php echo base_url(); ?>assets/images/logo/new_logo.png" alt="logo" class="img-responsive tr_logo pull-left">
			                	<!-- <h3	 class="pull-left"><strong><span class="logo_firstword">Teachers</span> <span class="logo_secondword">Recruit</span></strong></h3> -->
			                	<span class="clearfix"> </span>
               				</a>
                            <p>In line with growing demand of teacher jobs and to build a new bridge between employer-employees in the education institutions, Vision Achievers have launched teachersrecruit.com and  the vision of this website is to provide "Right Teacher, Right Institute for Right Students". Login with your subject expertise, with experience. </p>
                            <blockquote>"Arise, Awake and Stop Not till you reach your goal"<br-><span class="pull-right"> - Swami Vivekananda</span>
                            </blockquote>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2 col-xs-12">
                        <div class="footer_block">
                            <h4>Quick Links</h4>
                            <ul class="footer-links">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li> <a href="<?php echo base_url(); ?>aboutus">About Us</a> </li>
                                <li> <a href="<?php echo base_url(); ?>missingpage">Information</a> </li>
                                <li> <a href="<?php echo base_url(); ?>contactus">Contact Us</a> </li>
                                <li> <a href="<?php echo base_url(); ?>terms">Terms &amp; Conditions</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12">
                        <div class="footer_block dark_gry follow-on">
                            <h4>Teaching Jobs by District</h4>
                                <ul class="location_based_list">
                                    <li>
                                        <span class="pull-left"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <a href="#" class="float_location">Teacher Jobs in Delhi</a> 
                                        <span class="clearfix"></span>
                                    </li>
                                    <li>
                                        <span class="pull-left"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <a href="#" class="float_location">Teacher Jobs in Bangalore</a>
                                        <span class="clearfix"></span>
                                    </li>                      
                                    <li>
                                        <span class="pull-left"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <a href="#" class="float_location">Teacher Jobs in Hyderabad</a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li>
                                        <span class="pull-left"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <a href="#" class="float_location">Teacher Jobs in Pune</a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li>
                                        <span class="pull-left"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <a href="#" class="float_location">Teacher Jobs in Mumbai</a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li>
                                        <span class="pull-left"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <a href="#" class="float_location">Teacher Jobs in Chennai</a>
                                        <span class="clearfix"></span>
                                    </li>
                                
                                </ul>
                        </div> 
                              
                        
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12">
                        <div class="footer_block">
                            <h4>Contact Information</h4>
                            <ul class="personal-info">
                                <li><span class="pull-left"><i class="fa fa-map-marker"></i></span>
                                	<span class="pull-left foo_addr"> NO. 82/2, Thiruvalluvar Road,<br> Uthukottai Town &amp; Tk,<br> Thiruvallur District - 602026 </span>
                                	<span class="clearfix"> </span>
                                </li>
                                <li><a class="transform_lowercase" href="mailto:info@teachersrecruit.com"><i class="fa fa-envelope"></i> info@teachersrecruit.com</a></li>
                                <li><i class="fa fa-phone"></i> +91 95850 12949</li>
                                <li><i class="fa fa-clock-o"></i> Mon - Sun: 8:00 - 17:00</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <section class="footer-bottom-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <p>Copyright ©<?php echo date("Y"); ?> - Teachers Recruit All rights Reserved.<br/>
                                            Design and Developed By <a href="http://www.etekchnoservices.com">Etekchnoservices Pvt Ltd </a>
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                        
                                        <div class="visitor_count footer_block">
                                            <h4>Visitor Count</h4>
                                            <div class="visitor_no"> 
                                                <h4>
                                                    <?php
                                                        if(!empty($site_visit_count)) :
                                                            if(strlen($site_visit_count) <= 8) :
                                                                echo sprintf("%08d", $site_visit_count);
                                                                else :
                                                                    echo $site_visit_count;
                                                            endif;
                                                            else :
                                                                echo sprintf("%08d", 0);
                                                        endif;
                                                    ?>
                                                </h4>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                        <ul class="social-network social-circle onwhite">
                                            <li><a href="http://www.facebook.com/teachersrecruit/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="http://www.twitter.com/teacherecruit" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://plus.google.com/112001535695316053521" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="http://www.linkedin.com" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
       </div>
       <!--End of Footer-->
				