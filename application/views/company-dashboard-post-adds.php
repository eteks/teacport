<?php
include ('include/header.php');
include ('include/menus.php');
 ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                   
                    <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>
                                </li>
                                <li class="active">Post Ads</li>
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
                            <div class="panel panel-border">
                                <div class="dashboard-logo-sidebar">
                                     <?php if (@getimagesize($organization['organization_logo'])) { ?>
                                    <img src="<?php echo $organization['organization_logo']; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } else { ?>
                                	<img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } ?>
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4><?php echo $organization['organization_name']; ?></h4>
                                </div>
                            </div>
                            <!--include left panel menu-->
                            <?php
								include ('include/company_dashboard_sidebar.php');
 							?>
                        </div>
                        <div id="post_adds" class="col-md-8 col-sm-8 col-xs-12">
                        	 <div class="visible-lg visible-md">
                        	 	<div class="heading-inner first-heading">
                                	<p class="title">Post Ads</p>
                            	</div>
                            	<div class="form-group">
                        			<div class="info" style="margin: 6px 10px;">
                        				<i class="fa fa-info-circle" aria-hidden="true"></i> Uploading adds will be posted at the Premium adds area ! <a class="preview_post_ad_image txt_blue">Preview</a>
                        			</div>
                        		</div>	
                        		<div class=" col-sm-8 col-xs-8 postad_preview">
                        			<h6><span>*</span>This image is <strong> illustrative</strong></h6>
		                        	<div class="page_layout">
		                        		<div class="header_part"></div>
			                        	<div class="body_content">
			                        		<div class="post_adds_caurosel"></div>
			                        		<div class="featured_jobs_area">
			                        		 <ul>	
			                        			<li class="fjob pull-left"></li>
			                        			<li class="fjob pull-left"></li>
			                        			<li class="fjob pull-left"></li>
			                        			<li class="clearfix"> </li>
			                        		 </ul>	
			                        		</div>
			                        		<div class="counter_area"> </div>
			                        	</div>	
		                        		<div class="footer_section"></div>
		                        		<div class="footer"> </div>	
			                        </div>
		                       </div> 
		                       <div class="col-sm-4 col-xs-4">
	                              	<h6>You can,</h6>
	                              	<ul class="list-banner">
	                              		<li><i class="fa fa-thumb-tack" aria-hidden="true"></i> Display targeted ads </li>
	                              		<li><i class="fa fa-thumb-tack" aria-hidden="true"></i> Reach people seeking information</li>
	                              		<li><i class="fa fa-thumb-tack" aria-hidden="true"></i> Build recognition </li>
	                              	</ul>
                                </div>
	                        </div> </br>
                         	<div class="profile-edit">
                        		<?php echo form_open_multipart('provider/postad', 'class="form-horizontal post_adds_fields provider_form"'); ?>
                            		<?php 
		                            if(isset($error)) :
		                                if($error == 2) {
		                                    echo "<p class='val_status val_success db'> <i class='fa fa-check' aria-hidden='true'></i> $premiumad_server_msg </p>";
		                                }
		                                else {
		                                    echo "<p class='val_status val_error db'> <i class='fa fa-times' aria-hidden='true'></i> $premiumad_server_msg </p>";
		                                }
		                            else :
		                                echo "<p class='val_status'>  </p>";
		                            endif;
		                            ?>
	                            	<div class="form-group">
	                            		<div class="col-sm-9 pull-right"><?php echo form_error('provider_ad_title'); ?></div>
	                            		<div class="clearfix"> </div>
	                            		<label class="col-sm-3">Title of Ad :<sup class="alert">*</sup></label>
	                            		<div class="col-sm-9">
	                            			<input type="text" placeholder="Ad Title" class="form-control form_inputs" data-name= "Title" data-minlength="3" maxlength="50" name="provider_ad_title">
	                            		</div>	
	                            	</div>
	                            	<div id="provider_add_upload" class="form-group ">
	                            		<div class="col-sm-9 pull-right"><?php echo form_error('provider_premium_ad_image'); ?><?php if(isset($provider_premium_ad_error)) echo '<div class="uploaderror">'.$provider_premium_ad_error.'</div>'; ?></div>
	                            		<div class="clearfix"> </div>
										<label class="col-sm-3">Upload Image :<sup class="alert">*</sup></label>
	                                    <div class="col-sm-9">
	                                    	<div class="input-group image-preview">
	                                        	<input id="insti_adds" type="text" class="form-control image-preview-filename form_inputs uploadimage_act" placeholder="Upload ad image" disabled="disabled">
	                                        	<span class="input-group-btn">
	                               					<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
	                                    				<span class="glyphicon glyphicon-remove"></span> Clear
	                                        		</button>
	                                            	<div class="btn btn-default image-preview-input">
	                                               	 	<span class="glyphicon glyphicon-folder-open"></span>
	                                               		<span class="image-preview-input-title">Browse</span>
	                                                	<input class="image_upload_holder" class="btn_browse_adds" type="file" accept="file_extension" name="provider_premium_ad_image" />
	                                            	</div>
	                                        	</span>
	                                    	</div>
	                                    </div>
		                            </div>
		                            <div class="col-sm-offset-4 col-sm-8">
		                            	<div class="imagepreview_act"> </div>
		                            </div>	
		                            <div class="clearfix"> </div>
		                            <div class="form-group">
	                            		<div class="col-sm-6"> </div>
	                            		<div class="col-sm-6">
	                            			<button class="btn btn-default pull-right" type="submit">SUBMIT</button>
	                            		</div>	
	                            	</div>	                            	
	                            <?php  echo form_close(); ?>
	                        </div><br> <!--profile edit-->
	                    </div> <!--Right panel-->
                    </div>
                </div>
            </div>
        </section>
<?php
include ('include/footermenu.php');
include ('include/footer.php');
 ?>
 <?php include('include/footercustom.php'); ?>