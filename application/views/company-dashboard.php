<?php include('include/header.php'); ?>   <?php include('include/menus.php');   //echo "<pre>"; print_r($subscrib_plan); echo "</pre>";		?>        <section class="company-dashboard">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="dashboard-header">                            <div class="col-md-6 col-sm-6 col-xs-12">                                <div class="dashboard-header-logo-box <?php if(!empty($subscrib_plan)) echo 'pos_rel'; ?>">                                	<h4 class="pull-right"><strong><i><?php echo $organization['organization_name'] ?></i></strong></h4>                                	<?php if(!empty($subscrib_plan)){ ?>                                	<img src="<?php echo base_url(); ?>assets/images/premium1.png" alt="" class="img-responsive pull-left premium_image hidden-xs">                                	<div class="clearfix"> </div>                                	<div class='subcription_plan_details pull-right'>                                		<span><i class="fa fa-handshake-o" aria-hidden="true"></i></span><br/>                                		<?php echo ucfirst($subscrib_plan['subscription_plan']); ?><br>                                                <?php                                                $curdate=strtotime("now");                                                $closedate=strtotime($subscrib_plan['org_sub_validity_end_date']);                                                if($curdate < $closedate){                                                ?>                                                                                                    <?php echo $subscrib_plan['org_sub_validity_start_date']; ?> to <?php echo $subscrib_plan['org_sub_validity_end_date']; ?>                                                                                                <?php }else { ?>                                                    <?php echo "Subscription Expired ";?>                                                    <?php } ?>                                	</div>                                    <?php } ?>                                    <div class="<?php if(!empty($subscrib_plan)) echo 'company-logo-premium'; else  echo 'company-logo';?>">                                        <?php                                        if(!empty($organization['organization_logo'])) :                                            $thumb_image = explode('.', end(explode('/',$organization['organization_logo'])));                                            $thumb = $thumb_image[0]."_thumb.".$thumb_image[1];                                        ?>                                        <img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive hidden-xs" />                                        <?php                                        else :                                        ?>                                        <img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive hidden-xs" />                                        <?php                                        endif;                                        ?>                                     </div>                               </div>                            </div>                            <div class="col-md-2 col-sm-3 col-xs-12">                            	<?php if(isset($subscrib_plan['organization_sms_count'])){ ?>                                <div class="rad-info-box">                                    <i class="icon icon-profile-male provider_icon0"></i>                                    <span class="title-dashboard">SMS</span>                                    <span class="value"><span><?php echo $subscrib_plan['organization_sms_count'] - $subscrib_plan['organization_sms_remaining_count']; ?>/<?php echo $subscrib_plan['organization_sms_count']; ?></span></span>                                </div>                                <?php } else{ ?>                            	<div class="rad-info-box">                                    <i class="icon icon-profile-male provider_icon0"></i>                                    <span class="title-dashboard">SMS</span>                                    <span class="value"><span>0</span></span>                                </div>                                <?php } ?>                                <?php if(isset($subscrib_plan['organization_post_vacancy_count'])){ ?>                                <div class="rad-info-box">                                    <i class="icon icon-presentation provider_icon2"></i>                                    <span class="title-dashboard">Jobs</span>                                    <span class="value"><span><?php echo $subscrib_plan['organization_post_vacancy_count'] - $subscrib_plan['organization_vacancy_remaining_count'];?>/<?php echo $subscrib_plan['organization_post_vacancy_count'];?></span></span>                                </div>                                <?php } else{ ?>                                <div class="rad-info-box">                                    <i class="icon icon-presentation provider_icon2"></i>                                    <span class="title-dashboard">Jobs</span>                                    <span class="value"><span>0</span></span>                                </div>                               	<?php } ?>                            </div>                            <div class="col-md-2 col-sm-3 col-xs-12">                            	<?php if(isset($subscrib_plan['organization_resume_download_count'])){ ?>                                <div class="rad-info-box">                                    <i class="icon icon-documents provider_icon0"></i>                                    <span class="title-dashboard">Resume</span>                                    <span class="value"><span><?php echo $subscrib_plan['organization_resume_download_count'] - $subscrib_plan['organization_remaining_resume_download_count']; ?>/<?php echo $subscrib_plan['organization_resume_download_count']; ?></span></span>                                </div>                                <?php } else{ ?>                            	<div class="rad-info-box">	                                <i class="icon icon-documents provider_icon0"></i>	                                <span class="title-dashboard">Resume</span>	                                <span class="value"><span>0</span></span>                                </div>                                <?php } ?>                                <?php if(isset($subscrib_plan['organization_email_count'])){ ?>                                <div class="rad-info-box">                                    <i class="icon icon-envelope provider_icon2"></i>                                    <span class="title-dashboard">Email</span>                                    <span class="value"><span><?php echo $subscrib_plan['organization_email_count'] - $subscrib_plan['organization_email_remaining_count']; ?>/<?php echo $subscrib_plan['organization_email_count']; ?></span></span>                                </div>                                <?php } else{ ?>                                <div class="rad-info-box">                                    <i class="icon icon-envelope provider_icon2"></i>                                    <span class="title-dashboard">Email</span>                                    <span class="value"><span>0</span></span>                                </div>                                <?php } ?>                            </div>                            <div class="col-md-2 col-sm-3 col-xs-12">                                <?php if(isset($subscrib_plan['organization_post_ad_count'])){ ?>                                <div class="rad-info-box">                                    <i class="icon icon-picture provider_icon0"></i>                                    <span class="title-dashboard">Ad</span>                                    <span class="value"><span><?php echo $subscrib_plan['organization_post_ad_count'] - $subscrib_plan['organization_ad_remaining_count']; ?>/<?php echo $subscrib_plan['organization_post_ad_count']; ?></span></span>                                </div>                                <?php } else{ ?>                                <div class="rad-info-box">                                    <i class="icon icon-picture provider_icon0"></i>                                    <span class="title-dashboard">Ad</span>                                    <span class="value"><span>0</span></span>                                </div>                                <?php } ?>                                <div class="rad-info-box">                                    <i class="icon icon-briefcase provider_icon2"></i>                                    <span class="title-dashboard">Visitors</span>                                    <span class="value"><?php                                if(!empty($visit_count)) :                                    if(strlen($visit_count) <= 8) :                                        echo sprintf("%08d", $visit_count);                                    else :                                        echo $visit_count;                                    endif;                                else :                                    echo sprintf("%08d", 0);                                endif;                                ?></span>                                </div>                            </div>                        </div>                    </div>                </div>            </div>        </section>                <section class="dashboard-body">            <div class="container">                <div class="row">                	 <!-- Modal -->                	 <?php if($initial_data == 'show_popup') {?>					  <div class="modal fade" id="dashboard_popup_act" role="dialog">					    <div class="modal-dialog">					     <!-- Modal content-->					      <div class="modal-content">					        <div class="modal-header">					          <h4 class="modal-title">You are few steps away, kindly fill the details below.</h4>					        </div>					        <?php echo form_open('provider/initialdata','class="provider_popup_form"'); ?>                                <p class='val_status'>  </p>                                <div class="modal-body profile-edit">					        		<div class="form-group">	                                    <label>Institution: <sup class="alert">*</sup></label>	                                     <?php echo form_error('registrant_institution_type'); ?>	                                     <select name="registrant_institution_type" id="institution_type" class="form-control select-institution form_inputs">	                                     	<option value="">Select institution</option>										<?php		                                	foreach ($institutiontype as $institution) {												echo "<option value=".$institution['institution_type_id'].">".$institution['institution_type_name']."</option>";											}			                            ?>		                           		</select>	                                </div>					          		<div class="form-group">	                                    <label>Name: <sup class="alert">*</sup></label>	                                    <input placeholder="" name="provider_name" class="form-control" id="username" type="text" value="<?php echo $organization['registrant_name']; ?>" disabled>	                                </div>	                                <div class="form-group">	                                    <label>Email: <sup class="alert">*</sup></label>	                                    <input placeholder="" name="provider_email_id" class="form-control" id="email" type="text" value="<?php echo $organization['registrant_email_id']; ?>" disabled>	                                </div>	                                <div class="form-group">	                                    <label>Mobile: <sup class="alert">*</sup></label>	                                    <?php echo form_error('provider_mobile_no'); ?>	                                    <input placeholder="Mobile" name="provider_mobile_no" class="form-control form_inputs numeric_value" data-minlength="10" data-name="Mobile" maxlength="10"  id="mobile" type="text">	                                </div>	                                <div class="form-group">	                                    <label>Password: <sup class="alert">*</sup></label>	                                    <?php echo form_error('providerpassword'); ?>	                                    <input placeholder="Password" name="providerpassword" class="form-control form_inputs" data-minlength="8" data-name="Password" maxlength="20" id="new_pass" type="password">	                                </div>	                                <div class="form-group">	                                    <label>Confirm Password: <sup class="alert">*</sup></label>	                                    <?php echo form_error('providerconfirmpassword'); ?>	                                    <input placeholder="Confirm Password" name="providerconfirmpassword" class="form-control form_inputs" id="confirm_pass" type="password" data-minlength="8" data-name="Confirm Password" maxlength="20">	                                    <input type="hidden" name="organizationid" value="<?php echo $organization['organization_id']; ?>">	                                </div>	                                <button type="submit" class="btn btn-default btn-block">Proceed</button>					        	</div>						      <?php echo form_close(); ?>					      </div> <!--modal-content-->					    </div> <!--modal-dialog-->					  </div><!---.modal-->				   <?php } ?>				 <!--End Popup for Dashboard-->                	                    <div class="col-md-12 col-sm-12 col-xs-12">                        <div class="col-md-4 col-sm-4 col-xs-12">                        	<!--include left panel menu-->                            <?php include('include/company_dashboard_sidebar.php'); ?>                        </div>                        <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="job-short-detail">                                <div class="heading-inner">                                    <p class="title">Profile detail</p>                                </div>                                <!--Profile Progress bar-->                                <div id="provider-profilebar">                                	<h6>Profile Completeness</h5>	                                <div class="progress">	                                	<div class="progress-bar progress-bar-info active" style="width:<?php echo (isset($organization['organization_profile_completeness'])?$organization['organization_profile_completeness']:'1'); ?>%;" role="progress-bar" aria-valuemin="0" aria-valuemax="100">	                                	  <?php echo $organization['organization_profile_completeness']; ?>%		                                	</div>	                                </div>                                </div><!--End Profile Progress bar-->                                <dl>                                    <dt>Institution type</dt>                                    <dd><?php echo isset($organization['institution_type_name'])?$organization['institution_type_name']:'Nil'; ?></dd>                                    <dt>Street</dt>                                    <dd><?php echo isset($organization['organization_address_1'])?$organization['organization_address_1']:'Nil'; ?></dd>                                    <dt>Area</dt>                                    <dd><?php echo !empty($organization['organization_address_2'])?$organization['organization_address_2']:'Nil'; ?></dd>                                                                        <dt>City</dt>                                    <dd><?php echo !empty($organization['organization_address_3'])?$organization['organization_address_3']:'Nil'; ?></dd>                                                                        <dt>District</dt>                                    <dd><?php echo isset($organization['district_name'])?$organization['district_name']:'Nil'; ?></dd>                                    <dt>State</dt>                                    <dd><?php echo isset($organization['state_name'])?$organization['state_name']:'Nil'; ?></dd>                                    <dt>Mobile number</dt>                                    <dd><?php echo isset($organization['registrant_mobile_no'])?$organization['registrant_mobile_no']:'Nil'; ?></dd>                                    <dt>Email</dt>                                    <dd><?php echo isset($organization['registrant_email_id'])?$organization['registrant_email_id']:'Nil'; ?></dd>                                </dl>                            </div>                            <!-- <div class="heading-inner">                                <p class="title">Some Line About Our Company</p>                            </div>                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet. </p> -->                        </div> <!--end of right panel-->                                                                                      </div>                                   </div>            </div>                    </section><?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?><?php include('include/footercustom.php'); ?>