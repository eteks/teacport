<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Post Adds</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="company-dashboard-followers.html#">Home</a>
                                </li>
                                <li><a href="company-dashboard-followers.html#">Dashboard</a>
                                </li>
                                <li class="active">Post Adds</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="panel">
                                <div class="dashboard-logo-sidebar">
                                    <img class="img-responsive center-block" src="images/company/logo1.jpg" alt="Image">
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4>Your Companty Agency Pvt. Ltd</h4>
                                </div>
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/dashboard"> <i class="fa fa-user"></i> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/companydbd_resume"> <i class="fa fa-file-o"></i>Inbox </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/companydbd_browsejobs"> <i class="fa  fa-list-ul"></i> Browse Candidate</a>
                                        </li>
                                        <li class="provider-jobs">
                                            <a href="#"><i class="fa  fa-list-alt"></i> Jobs</a>
                                            <ul>
                                            	<li><a href="<?php echo base_url();?>job_provider/companydbd_postjobs"> <i class="fa  fa-list-alt"></i>New Jobs</a></li>
                                            	<li><a href="<?php echo base_url();?>job_provider/companydbd_postedjobs"> <i class="fa  fa-list-alt"></i>Posted Jobs</a></li>
                                            </ul>
                                        </li>
                                        <li class="active">
                                            <a href="<?php echo base_url();?>company-dashboard-post-jobs.php"> <i class="fa  fa-bookmark-o"></i> Post Adds </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-money"></i> Subcribe Plan</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-commenting-o"></i> Feedback </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="post_adds" class="col-md-8 col-sm-8 col-xs-12">
                        	 <div class="visible-lg visible-md">
                        	 	<div class="heading-inner first-heading">
                                	<p class="title">Adds</p>
                            	</div>
	                        	<h6><span>*</span>This image is <strong> illustrative</strong></h6>
                        		<div class=" col-sm-8 col-xs-8">
		                        	<div class="page_layout">
		                        		<div class="header_part"></div>
			                        	<div class="body_content">
			                        		<div class="home_slider"></div>
			                        		<div class="featured_jobs_area">
			                        		 <ul>	
			                        			<li class="fjob pull-left"></li>
			                        			<li class="fjob pull-left"></li>
			                        			<li class="fjob pull-left"></li>
			                        			<li class="clearfix"> </li>
			                        		 </ul>	
			                        		</div>
			                        		<div class="counter_area"> </div>
			                        		<div class="post_adds_caurosel"></div>
			                        	</div>	
		                        		<div class="footer_section"></div>
		                        		<div class="footer"> </div>	
			                        </div>
		                       </div> 
		                        <div class="col-sm-4 col-xs-4">
	                              	<h5><strong>Banner</strong></h5>
	                              	<ul class="list-banner">
	                              		<li><i class="fa fa-thumb-tack" aria-hidden="true"></i> Display targeted ads </li>
	                              		<li><i class="fa fa-thumb-tack" aria-hidden="true"></i> Reach people seeking information</li>
	                              		<li><i class="fa fa-thumb-tack" aria-hidden="true"></i> Build recognition </li>
	                              	</ul>
                                </div>
	                         </div><br>
	                         <div class="heading-inner first-heading">
                                <p class="title">Post Adds</p>
                              </div>
                              <div style="margin: 10px;"> </div>
                         	<div class="profile-edit">
                            	<form class="form-horizontal post_adds_fields">
                            		<div class="form-group">
                            			<div class="info" style="margin: 6px 10px;">
                            				<i class="fa fa-info-circle" aria-hidden="true"></i> Uploading adds will be posted at the Premium adds area !
                            			</div>
                            		</div>	
	                            	<div class="form-group">
	                            		<label class="col-sm-3">Title of Add :<sup class="alert">*</sup></label>
	                            		<div class="col-sm-9">
	                            			<input type="text" class="form-control">
	                            		</div>	
	                            	</div>
	                            	<div id="provider_add_upload" class="form-group ">
										<label class="col-sm-3">Upload Logo :<sup class="alert">*</sup></label>
	                                    <div class="col-sm-9">
	                                    	<div class="input-group image-preview">
	                                        	<input id="insti_adds" type="text" class="form-control image-preview-filename uploadimage_act" placeholder="Upload add image" disabled="disabled">
	                                        	<span class="input-group-btn">
	                               					<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
	                                    				<span class="glyphicon glyphicon-remove"></span> Clear
	                                        		</button>
	                                            	<div class="btn btn-default image-preview-input">
	                                               	 	<span class="glyphicon glyphicon-folder-open"></span>
	                                               		<span class="image-preview-input-title">Browse</span>
	                                                	<input class="btn_browse_adds" type="file" accept="file_extension" name="input-file-preview" />
	                                            	</div>
	                                        	</span>
	                                    	</div>
	                                    </div>	
		                            </div>
		                            <div class="col-sm-12 imagepreview_act pull-right"> </div>
		                            
		                            <div class="clearfix"> </div>
		                            <div class="form-group">
	                            		<div class="col-sm-6"> </div>
	                            		<div class="col-sm-6">
	                            			<button class="btn btn-default pull-right">SUBMIT</button>
	                            		</div>	
	                            	</div>	                            	
	                            </form>
	                        </div><br> <!--profile edit-->
	                   </div>
                    </div>
                </div>
            </div>
        </section>
<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>