<?php include('include/header.php'); ?><?php include('include/menus.php');?><!--Slider--><section class="slidershow-bg home-slidershow">	<div class="container">		<div class="row">			<ul class="cb-slideshow">				<li>					<span>Image 01</span>				</li>				<li>					<span>Image 02</span>				</li>				<li>					<span>Image 03</span>				</li>				<li>					<span>Image 04</span>				</li>				<li>					<span>Image 05</span>				</li>				<li>					<span>Image 06</span>				</li>			</ul>			<div id="search-icon" class="col-sm-offset-11 col-sm-1" style="display:none;" ><a><i class="fa fa-search"></i> Search..</a></div>          		<div  class="col-md-12 col-sm-12 col-xs-12  nopadding">                  <div class="set-srch-strip">                  	<a class="search-close" ><i class="fa fa-close"> </i></a>                   	<div id="home_search_bar" class="search-form-contaner" >                      	<?php echo form_open("vacancies");?>							<div class="col-md-4 col-sm-4 col-xs-12 nopadding">								<div class="form-group">									<input class="form-control" id="hook_name" name="search_keyword" placeholder="Job Title" type="text" value="">								</div>							</div>							<div class="col-md-3 col-sm-3 col-xs-12 nopadding">								<div class="form-group">									<input class="form-control numeric_value" id="" name="search_min_amount" placeholder="Minimum Salary" maxlength="9" type="text" value="">									<!-- <select name="search_min_amount" class="select-category form-control">												<option value="">Salary</option>												<option value="5000"> 5000 +</option>												<option value="10000"> 10000 + </option>												<option value="15000"> 15000 + </option>												<option value="20000"> 20000 + </option>												<option value="25000"> 25000 + </option>											</select> -->								</div>							</div>							<div class="col-md-3 col-sm-3 col-xs-12 nopadding">								<div class="form-group">									<select name="search_location" class="select-location form-control">										<option value="">Job location</option>										<?php										if(!empty($alldistrict)) :										foreach ($alldistrict as $district) {											echo '<option value="'.$district['district_id'].'">'.$district['district_name'].'</option>';										}										endif;										?>									</select>								</div>							</div>							<div class="col-md-2 col-sm-2 col-xs-12 nopadding">								<div class="form-group form-action">								<button class="btn btn-default btn-search-submit">Search									<i class="fa fa-angle-right"></i></a>									</button>								</div>							</div>						<?php echo form_close(); ?>                  	</div><!--#home-search-bar-->                 	</div> <!--set-srch-strip-->            </div><!--col-md-12-->        </div>    </div></section> <!--End of Slider--><!--Prmium adds & Latest Jobs--><section class="tr_latest_updates">    <div class="container">        <div class="row">	    	<div class="col-md-12 col-sm-12 col-xs-12">	    		<div class="Heading-title black">	                <h1>Latest Updates</h1>	            </div>	    		<!--Premium adds-->	            <div class="col-md-8 col-sm-8 col-xs-12 slide_premium_adds">	            	<div id="myCarousel" class="carousel slide" data-ride="carousel">					    <!-- Indicators -->					    <?php if(!empty($premiumads)){ ?>					    <ol class="carousel-indicators">					   	<?php				    	foreach($premiumads as $keys => $values){					 		if ($keys==0){					 		?>					 		 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>					 		<?php					 		}							else{							?>							<li data-target="#myCarousel" data-slide-to="<?php echo $keys; ?>"></li>						<?php						}}					 	?>					    </ol>						<?php } ?>					    <!-- Wrapper for slides -->					    <div class="carousel-inner" role="listbox">							<?php 							if(!empty($premiumads)){						 	foreach($premiumads as $key => $value){						 	if ($key==0){						 	?>							<div class="item active">							    <img src="<?php echo base_url();?>uploads/jobprovider/premiumad/<?php echo $value['ads_image_path']?>" alt="Chania" width="460" height="345">					      	</div>							<?php							}							else{							?>							<div class="item">							    <img src="<?php echo base_url();?>uploads/jobprovider/premiumad/<?php echo $value['ads_image_path']?>" alt="Chania" width="460" height="345">							</div>							<?php							}							?>			      							<?php }} else { ?>							<div class="item active">						        <img src="<?php echo base_url();?>assets/images/premiumads.png" alt="Chania" width="460" height="345">					      	</div>							<?php } ?>					    </div>					    <!-- Left and right controls -->					    <?php if(!empty($premiumads)){ ?>					    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">					      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>					      <span class="sr-only">Previous</span>					    </a>					    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">					      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>					      <span class="sr-only">Next</span>					    </a>					     <?php } ?>					</div>			    </div>    	        <!-- Latest News -->                   <div class="col-md-4 col-sm-4 col-xs-12">	                <?php					if(!empty($latest_news)) :					?>                	                    <div class="latest_news_1">                		<div id ="flash_updates_1">                			<div class="latest_news_head_1">                     			                  			                				<p class="pull-left"><i class="fa fa-bullhorn"></i> Latest News </p>                				<!-- <button class="btn view_all pull-right">View All</button>   -->                				<div class="clearfix"> </div>                 				                			</div>                			<div class="data_news">                    			<ul id="scroller">                    				<?php		                    		foreach ($latest_news as $news_val) :	                    			?>                    					<li class="latest_news_content_1">                    						<a target="_blank" href="<?php echo $news_val['latest_news_redirect_link']; ?>"><?php echo $news_val['latest_news_title']; ?></a>                    					</li>                    				<?php									endforeach;									?>	                    				                				</ul>                      		</div>                 			                		</div>                	</div>                   	<?php					else :					?>					<div class="latest_news">                		<div id = "flash_updates">                			<p class="latest_news_head">Latest News</p>                			<p class="latest_news_content"><img src="<?php echo base_url(); ?>assets/images/newspaper.png" height="120px" width="120px" alt="flash-news"><br>No News Available</p>                		</div>                	</div> 					<?php					endif;					?>                                  	                </div>                </div>        </div>    </div></section>       <!--Featured Jobs-->    <section class="featured-jobs">        <div class="container">            <div class="row">                <div class="col-md-12 col-sm-12 col-xs-12">                    <div class="col-md-12 col-sm-12 col-xs-12">                        <div class="Heading-title black">                            <h1>Featured Jobs</h1>                            <p>Wondering which jobs might best suit you? Browse our advice on career planning and careers open to you with your degree for ideas. You can also sign up to Teacherportal for vacancy alerts based on career areas that interest you.</p>                        </div>                    </div>                    <?php                    // echo "<pre>";						// print_r($job_results);						// echo "</pre>";					?>                    <div class="owl-testimonial-2">                    	<?php                     	if(!empty($this->session->userdata("login_status")) && $this->session->userdata("login_status") == TRUE){ 			            	$user_type = $this->session->userdata("login_session");						}						else{							$user_type = array('user_type'=>'guest');						}						if(!empty($job_results)) :                    	foreach ($job_results as $jobvalue):                     	?>              			<?php 			            if($user_type['user_type'] =='provider' ){			        	?>    					<div class="slide-featured-jobs" onclick='window.location = "<?php echo base_url(); ?>provider/postedjobdetail/<?php echo $jobvalue['vacancies_id'];?>"'>			       		<?php 							}						else {						?>						<div class="slide-featured-jobs" onclick='window.location = "<?php echo base_url(); ?>seeker/applynow/<?php echo $jobvalue['vacancies_id'];?>"'>						<?php						}						?>	                    	<div class="featured-image-box">	                            <div class="img-box">	                               	<?php		                            if(!empty($jobvalue['organization_logo'])) :		                                $thumb_image = explode('.', end(explode('/',$jobvalue['organization_logo'])));		                                $thumb = $thumb_image[0]."_thumb.".$thumb_image[1];		                            ?>		                            <img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive center-block" alt="">		                            <?php		                            else :		                            ?>		                            <img src="<?php echo base_url()."assets/images/institution.png"; ?>" class="img-responsive center-block" alt="Not Found">		                            <?php		                            endif;		                            ?>    	                            </div>                           	                            <div class="content-area">	                                <div class="">	                                    <h4><?php echo $jobvalue['vacancies_job_title']; ?></h4>	                                    <p><?php echo $jobvalue['organization_name']; ?></p>	                                </div>	                                <div class="feature-post-meta">	                                    <i class="fa fa-clock-o"> 	                                      	<?php			                                $vac_date = date_create(date('Y-m-d',strtotime($jobvalue['vacancies_created_date']))); 			                                $today = date_create(date('Y-m-d'));			                                $days = date_diff($vac_date,$today);			                                echo $days->d;			                                if($days->d <= 1) {			                                	echo " day ago";			                                }			                                else {			                                	echo " days ago";			                                }                                			?> 										</i>									</div>	                           	                            	<!--Only required rule to the whole div clickable work--> 		                            <?php 						            if($user_type['user_type'] =='provider' ){						        	?>			        					<div class="feature-post-meta-bottom"><a class="apply pull-right">View</a> </div>					        		<?php 										}									else {									?>										<div class="feature-post-meta-bottom"><a class="apply pull-right"> Apply Now</a> </div>									<?php									}									?>								</div>	                            <a href='javascript:void(0)' >        							<span class='featured-jobs-grid-link'></span>    							</a>    							<!--end rule-->                            </div>	                    </div>	                    <?php 	                    endforeach;	                    else :	                    ?>                		<h1 class="slide-featured-jobs text-center">	                		<strong>No Jobs available.</strong>	                	</h1>	                	<?php	                	endif;	                	?>	                </div>                    <div class="col-md-12 col-sm-12 col-xs-12">                        <div class="load-more-btn">	                        <?php	                        if($user_type['user_type'] =='seeker' && !empty($job_results)){	                        ?>	                        	<a class="btn btn-default" href="<?php echo base_url()."seeker/findjob"; ?>"> View All <i class="fa fa-angle-right"></i> </a>         	                           	                        <?php 	                    	}	                        else if($user_type['user_type'] =='guest' && !empty($job_results)){	                       	?>	                            <a class="btn btn-default" href="<?php echo base_url()."vacancies"; ?>"> View All <i class="fa fa-angle-right"></i> </a>	                       	<?php	                        }							?>	                    </div>                    </div>                </div>            </div>        </div>   </section>   <!--End of featured jobs-->					<!--Counter-->		<section class="facts">			<div class="container">				<div class="row">					<div class="col-sm-4 col-md-4 col-xs-4">						<div class="fact-box">							<div class="single-facts-area">								<div class="facts-icon">									<i class="icon-megaphone"></i>								</div>								<span class="counter"><?php echo($totalvacancy); ?></span>								<h3>Jobs</h3>							</div>						</div>					</div>					<div class="col-sm-4 col-md-4 col-xs-4">						<div class="fact-box">							<div class="single-facts-area">								<div class="facts-icon">									<i class="icon-profile-male"></i>								</div>								<span class="counter"><?php echo($totalcandidate); ?></span>								<h3>Members</h3>							</div>						</div>					</div>					<div class="col-sm-4 col-md-4 col-xs-4">						<div class="fact-box">							<div class="single-facts-area">								<div class="facts-icon">									<i class="icon-toolbox"></i>								</div>								<span class="counter"><?php echo($totalorganization); ?></span>								<h3>Company</h3>							</div>						</div>					</div>				</div>			</div>		</section>		<!--End of Counter-->		<?php		if(!empty($allposting)) :		?>		<section class="categories">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12">                        <div class="col-md-12 col-sm-12 col-xs-12">                            <div class="Heading-title black">                                <h1>Applicable posts</h1>                                <p>You can apply for the following posts at Schools through this website</p>                            </div>                        </div>                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                         	<div class="owl-testimonial-3">                         		<div class="col-md-12 col-sm-12 col-xs-12 nopadding">	                         		<?php	                         		$a = 1;	                         		foreach ($allposting as $pos_val) :	                         		?>	                         			<div class="app_post">	                                    <h5 class="icon_appli_post pull-left"><span class="fa-stack fa-lg">									    <i class="fa fa-circle-thin fa-stack-2x"></i>									    <i class="fa fa-paper-plane-o fa-stack-1x"></i>										</span></h5>										<p class="appli_post"><?php echo $pos_val['posting_name']; ?></p>	                                </div>                         			<?php                         			if($a % 2 == 0) {                         			?>                         			</div><div class="col-md-12 col-sm-12 col-xs-12 nopadding">                         			<?php                         			}                         			?>		                         	<?php		                         	$a++;		                         	endforeach;		                         	?>	                         	</div>		                        </div>		                        </div>                    </div>                </div>            </div>        </section>		<?php		endif;		?>			<!--End of Premium adds-->	<?php include('include/footermenu.php'); ?>		<?php include('include/footer.php'); ?>	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/counterup.js"></script>	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.simplyscroll.min.js"></script>		<?php include('include/footercustom.php'); ?>	 <script type="application/javascript">	 $(document).ready(function() {	 	$('.counter').counterUp({	        delay: 10,	        time: 2000	    });	    $(".owl-testimonial-2").owlCarousel({	        autoPlay: true,	        slideSpeed: 2000,	        pagination: false,	        navigation: false,	        loop: true,	        items: 3,	        itemsDesktop: [1199, 3],	        itemsDesktopSmall: [980, 2],	        itemsTablet: [768, 2],	        itemsTabletSmall: false,	        itemsMobile: [479, 1]	    });	    $(".owl-testimonial-3").owlCarousel({	        autoPlay: true,	        slideSpeed: 2000,	        pagination: false,	        navigation: false,	        loop: true,	        items: 3,	        itemsDesktop: [1199, 3],	        itemsDesktopSmall: [980, 2],	        itemsTablet: [768, 2],	        itemsTabletSmall: false,	        itemsMobile: [479, 1]	    });});</script>