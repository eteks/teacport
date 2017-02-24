<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
<?php //echo "<pre>";print_r($subscrib_plan);echo "</pre>"; ?>
<?php
if($this->uri->segment(4)) {
	$vac_id = $this->uri->segment(4);
}
else {
	$vac_id = '';
}
?>
<section class="job-breadcrumb">
    <div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-12 co-xs-12 text-left">
	            <div class="bread">
	                <ol class="breadcrumb">
	                    <li><a href="<?php echo base_url(); ?>">Home</a>
	                    </li>
	                    <li><a href="<?php echo base_url(); ?>job_provider/dashboard">Dashboard</a>
	                    </li>
	                    <li class="active">Candidate Detail</li>
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
                        <div class="dashboard-logo-sidebar center-block">
                        	<?php
                            if(!empty($organization['organization_logo'])) :
                                $thumb_image = explode('.', end(explode('/',$organization['organization_logo'])));
                                $thumb = $thumb_image[0]."_thumb.".$thumb_image[1];
                            ?>
                            <img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive center-block" />
                            <?php
                            else :
                            ?>
                            <img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive center-block" />
                            <?php
                            endif;
                            ?> 
                        </div>
                        <div class="text-center dashboard-logo-sidebar-title">
                            <h4><?php echo $organization['organization_name']; ?></h4>
                        </div>
                    </div>
                    <!--include left panel menu-->
                    <?php include('include/company_dashboard_sidebar.php'); ?>
                </div>
                <div id="company-browse-candidate" class="col-md-8 col-sm-8 col-xs-12">
                	<div class="heading-inner first-heading">
                        <p class="title">Profile Detail</p>
                    </div>
                    <div class="all-jobs-list-box2">
                        <div class="job-box job-box-2">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            	<div class="seeker_individual_profile">
                                	<!--Personal Profile-->
     							 	<div>
	     							 	<h5> Personal Profile</h5>
		                           	 	<div class="display_seeker_details">
		                           	 		<span class="col-sm-4">Name of the Candidate</span>
		                           	 		<span class="col-sm-1"> : </span>
											<div class="col-sm-7">	<?php echo ucfirst($candidate[0]['candidate_name']); ?> </div>
										</div>											
										<div class="display_seeker_details">
											<span class="col-sm-4">Gender </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['candidate_gender']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Date of Birth </span>
											<span class="col-sm-1"> : </span>
											<div class="col-sm-7"> <?php echo date('d M Y',strtotime($candidate[0]['candidate_date_of_birth'])); ?> </div>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Father's Name </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['candidate_father_name']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Marital Status </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['candidate_marital_status']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Native State  </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['state_name']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Native District  </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['district_name']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Mother Tongue</span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['language_name']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Known Languages </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php 
									            $known_lang = explode(',',$candidate[0]['candidate_language_known']);
									            $i = 1;
									            foreach ($known_languages as $lan_key => $lan_val) {
									               if(in_array($lan_val['language_id'],$known_lang)) {
									                    echo $lan_val['language_name'];
									                    if($i < count($known_lang)) {
									                        echo ",";
									                    }
									                    $i++;
									               }
									            }
									            ?> 
									        </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Nationality  </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['candidate_nationality']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Religion </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo ucfirst($candidate[0]['candidate_religion']); ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Communal Category </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php 
									            $community = unserialize(COMMUNAL);
									            echo $community[$candidate[0]['candidate_community']]; 
									            ?> 
									        </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Physically Challenged </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php if($candidate[0]['candidate_is_physically_challenged']=="yes") echo "Yes"; else echo "No"; ?>
									        </span>
										</div>
									</div> <br> <!---End personal profile-->	
									<!--Post Preference-->
	    							<div>
		     							<h5>Post Preference</h5>
		                         	 	<div class="display_seeker_details">
		                           	 		<span class="col-sm-4">Post Applying For</span>
		                           	 		<span class="col-sm-1"> : </span>
											<div class="col-sm-7">	<?php 
									            $pos = explode(',',$candidate[0]['candidate_posting_applied_for']);
									            $i = 1;
									            foreach ($posting_values as $pos_key => $pos_val) {
									               if(in_array($pos_val['posting_id'],$pos)) {
									                    echo $pos_val['posting_name'];
									                    if($i < count($pos)) {
									                        echo ",";
									                    }
									                    $i++;
									               }
									            }
									            ?> 
									        </div>
										</div>	
										<div class="display_seeker_details">
											<span class="col-sm-4">Wish to take Classes For </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php 
									            $cls = explode(',',$candidate[0]['candidate_willing_class_level_id']);
									            $i = 1;
									            foreach ($class_values as $cls_key => $cls_val) {
									               if(in_array($cls_val['class_level_id'],$cls)) {
									                    echo $cls_val['class_level'];
									                    if($i < count($cls)) {
									                        echo ",";
									                    }
									                    $i++;
									               }
									            }
									            ?> 
									        </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Wish to take Subject For </span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php 
									            $sub = explode(',',$candidate[0]['candidate_willing_subject_id']);
									            $i = 1;
									            foreach ($subject_values as $sub_key => $sub_val) {
									               if(in_array($sub_val['subject_id'],$sub)) {
									                    echo $sub_val['subject_name'];
									                    if($i < count($sub)) {
									                        echo ",";
									                    }
									                    $i++;
									               }
									            }
									            ?> 
									        </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Expected Monthly Salary</span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo $candidate[0]['candidate_expecting_start_salary']; ?> to <?php echo $candidate[0]['candidate_expecting_end_salary']; ?>  </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Wish to Work in State </span>
											<span class="col-sm-1"> : </span>
											<div class="col-sm-7"> <?php echo (!empty($candidate[0]['willing_state']) ? $candidate[0]['willing_state'] : "Not mentioned" ); ?> </div>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Wish to Work in District </span>
											<span class="col-sm-1"> : </span>
											<div class="col-sm-7"> <?php echo (!empty($candidate[0]['willing_district']) ? $candidate[0]['willing_district'] : "Not mentioned" ); ?> </div>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Employment Type </span>
											<span class="col-sm-1"> : </span>
											<div class="col-sm-7"> <?php echo ($candidate[0]['candidate_type'] == "full" ? "Full Time" : ($candidate[0]['candidate_type'] == "part" ? "Part Time" : "Not Mentioned")); ?> </div>
										</div>
									</div> <br> <!---End Post Preference-->	
									<!--Educatinaol Profile-->
     							 	<div>
     							 		<h5>Educational Profile</h5>
		                           	 	<div class="table-responsive">
											<table class="table seeker_edu-details">
												<thead>
													<th>Qualification</th>
													<th>YOP</th>
													<th>Medium</th>
													<th>Department</th>
													<th>Board/university</th>
													<th>% of Marks</th>
												</thead>
												<tbody>
													<?php 
													foreach ($candidate[0]['education_details'] as $edu_key => $edu_val) :
													?>
													<tr>
														<td><?php echo $edu_val['edu_qualification']; ?></td>
														<td><?php echo $edu_val['candidate_education_yop']; ?> </td>
														<td><?php echo $edu_val['edu_medium']; ?> </td>
														<td><?php echo (!empty($edu_val['edu_department']) ? $edu_val['edu_department']:'-'); ?></td>
														<td><?php echo $edu_val['edu_board']; ?></td>
														<td><?php echo $edu_val['candidate_education_percentage']; ?> %</td>
													<tr>
													<?php 
													endforeach;
													?>
												</tbody>
											</table>
										</div> <!--.table-responsive-->
										<div class="display_seeker_details">
		                           	 		<span class="col-sm-4">TET Exam Status</span>
		                           	 		<span class="col-sm-1"> : </span>
											<div class="col-sm-7">	<?php if($candidate[0]['candidate_tet_exam_status']=="1") echo "Yes"; else echo "No"; ?> </div>
										</div>
										<div class="display_seeker_details">
		                           	 		<span class="col-sm-4">Extra Curricular Skills </span>
		                           	 		<span class="col-sm-1"> : </span>
											<div class="col-sm-7">  <?php 
									            $ext = explode(',',$candidate[0]['candidate_extra_curricular_id']);
									            $i = 1;
									            foreach ($extra_curricular_values as $ext_key => $ext_val) {
									               if(in_array($ext_val['extra_curricular_id'],$ext)) {
									                    echo $ext_val['extra_curricular'];
									                    if($i < count($ext)) {
									                        echo ",";
									                    }
									                    $i++;
									               }
									            }
									            ?>
									        </div>
										</div>
									</div> <br>
									<!---End Educational Profile -->
									<!--Professional Profile-->
	     							<div>  							
	     							 	<h5>Professional Profile</h5>
	     							 	<div class="display_seeker_details">
		                           	 		<span class="col-sm-4">Fresh Candidate</span>
		                           	 		<span class="col-sm-1"> : </span>
											<div class="col-sm-7">	<?php if($candidate[0]['candidate_is_fresher']=="1") echo "Yes"; else echo "No"; ?> </div>
										</div>
										<?php
										if($candidate[0]['candidate_is_fresher']==0 && !empty($candidate[0]['experience_details'])) :
										?>
										<div class="table-responsive">
											<table class="table">
												<thead>
													<th>Class Level</th>
													<th> Subject </th>
													<th> Board </th>
													<th> No.of Years </th>
												</thead>
												<tbody>
													<?php 
													foreach ($candidate[0]['experience_details'] as $exp_key => $exp_val) :
													?>
														<tr>
															<td><?php echo $exp_val['exp_class']; ?></td>
															<td><?php echo $exp_val['exp_subject']; ?> </td>
															<td><?php echo $exp_val['exp_board']; ?></td>
															<td><?php echo $exp_val['candidate_experience_year']; ?></td>
														<tr>
													<?php 
													endforeach;
													?>
												</tbody>
											</table>
										</div> <!--.table-responsive-->
										<?php
										endif;
										?>
								  	</div> <br> <!---End Professional Profile-->
									<?php if(!empty($subscrib_plan)){?>
									<!--Communication Information-->
			     					<div>
			     						<h5>Communication Information</h5>
		                          	 	<div class="display_seeker_details">
		                           	 		<span class="col-sm-4">Door No.</span>
		                           	 		<span class="col-sm-1"> : </span>
											<div class="col-sm-7">	<?php echo !empty($candidate[0]['candidate_address_1']) ? $candidate[0]['candidate_address_1'] : "Not Mentioned"; ?> </div>
										</div>											
										<div class="display_seeker_details">
											<span class="col-sm-4">Post/Village/Taluk</span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo !empty($candidate[0]['candidate_address_2']) ? $candidate[0]['candidate_address_2'] : "Not Mentioned"; ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Pin-Code</span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo !empty($candidate[0]['candidate_pincode']) ? $candidate[0]['candidate_pincode'] : "Not Mentioned"; ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Email ID</span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo $candidate[0]['candidate_email']; ?> </span>
										</div>
										<div class="display_seeker_details">
											<span class="col-sm-4">Mobile No</span>
											<span class="col-sm-1"> : </span>
											<span class="col-sm-7"> <?php echo $candidate[0]['candidate_mobile_no']; ?> </span>
										</div>
										<div class="loginbox-submit pull-right subscription_action_message">
										</div>
										<div class="clearfix"> </div>
										<div class="loginbox-submit">
											<?php 
											$start_date = date_create($subscrib_plan['org_sub_validity_end_date']);
                               				$days = date_diff(date_create('today'),$start_date);
                            				if($days->invert == 1) {
                            					$text = "Renewal";
                            				}
                            				else {
                            					$text = "Upgrade";
                            				}
											if($subscrib_plan['is_sms_validity']) { 
											?>
                                  					<a data-name="sms" class="btn btn-default btn-medium pull-right candidate_sms" data-toggle="tooltip" title="You sent <?php echo $subscrib_plan['organization_sms_count'] - $subscrib_plan['organization_sms_remaining_count']; ?> sms, still you can send <?php echo $subscrib_plan['organization_sms_remaining_count']; ?> more,else you can upgrade the Sms plan" candidate-id="<?php echo $candidate[0]['candidate_id'];?>">Sms</a>
                              						<?php 
                              						} 
                              						else 
                              						{
                              						?>
                              						<a data-name="sms" href="<?php echo base_url(); ?>provider/subscription" class="btn btn-default btn-medium pull-right" data-toggle="tooltip" title="No remaning sms count, you can <?php echo $text; ?> the Sms plan" > <?php echo $text; ?> </a>
                              						<?php
                              						}
                              						?>
													<?php if($subscrib_plan['is_email_validity']){ ?>
                                  					<a data-name="email" class="btn btn-default btn-medium pull-right candidate_email" data-toggle="tooltip" title="You used <?php echo $subscrib_plan['organization_email_count'] - $subscrib_plan['organization_email_remaining_count']; ?> Email, still you can send <?php echo $subscrib_plan['organization_email_remaining_count']; ?>  more, else you can upgrade the Email plan" candidate-id="<?php echo $candidate[0]['candidate_id'];?>">Email</a>
                                  					<?php 
                              						} 
                              						else 
                              						{
                              						?>
                              						<a data-name="email" href="<?php echo base_url(); ?>provider/subscription" class="btn btn-default btn-medium pull-right" data-toggle="tooltip" title="No remaning email count, you can <?php echo $text; ?> the Email plan" > <?php echo $text; ?> </a>
                              						<?php
                              						}
                              						?>                               					
													<?php if($subscrib_plan['is_resume_validity']){ ?>
                                  					<a data-name="resume" class="btn btn-default btn-medium pull-right candidate_resume" data-toggle="tooltip" title="You used <?php echo $subscrib_plan['organization_resume_download_count'] - $subscrib_plan['organization_remaining_resume_download_count']; ?> Download, still you can download <?php echo $subscrib_plan['organization_remaining_resume_download_count']; ?> more, else you can upgrade the Resume download plan" candidate-id="<?php echo $candidate[0]['candidate_id'];?>">Resume</a>
                                  					<a class="dn" id="hidden_download" target="_blank" href="#" download> </a>
                                  					<a data-name="template_resume" class="btn btn-default btn-medium pull-right candidate_resume" data-toggle="tooltip" title="You used <?php echo $subscrib_plan['organization_resume_download_count'] - $subscrib_plan['organization_remaining_resume_download_count']; ?> Download, still you can download <?php echo $subscrib_plan['organization_remaining_resume_download_count']; ?> more, else you can upgrade the Resume download plan" candidate-id="<?php echo $candidate[0]['candidate_id'];?>"> Templated Resume</a>

                                  					<?php 
                              						} 
                              						else 
                              						{
                              						?>
                              						<a data-name="resume" href="<?php echo base_url(); ?>provider/subscription" class="btn btn-default btn-medium pull-right" data-toggle="tooltip" title="No remaning download count, you can <?php echo $text; ?> the Download plan" > <?php echo $text; ?> </a>
                              						<?php
                              						}
                              						?>
                     					</div>
									</div> <br> <!---Communication Information-->	
									<?php 
									} else{ 
									?>
									<div class="personnal_information">
									</div><br>
									<?php } ?>
								</div> <!--.seeker_induvidual_profile-->
	                                </div>
	                                <!-- <div class="job-salary">
	                                    <i class="fa fa-money"></i> $400 - $500
	                                </div> -->
                                </div>
                            </div>
                        </div><!--#company-browse-candidate-->
                    </div>
                </div>
            </div>
            <!---Pop up error msg-->
            <div id="sitebodyoverlay"> </div><!--overlay-->
            <!--popup-->
			<div class="popup_fade cancel_btn"></div> 
		 	<div class="error_popup_msg">
		 		<!-- <a class="cancel_btn pull-right" href="#">
		 			<i class="fa fa-close"></i>
		 		</a> -->
		 		<div class="clearfix"></div>
			 	<div class="success-alert">
			 		<span class="message">Are you sure to proceed ?</span>
			 	</div><!--- -->
			 	<div class="text-center">
			 		<input type="submit" class="btn btn-default alert_yes_btn" value="Proceed">
			 		<input type="submit" class="btn btn-default alert_no_btn" value="Cancel">
			 	</div>	
		 	</div><!--success_msg-->
		 	<!---End Pop up error msg -->
 </section>

<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?> 
<?php include('include/footercustom.php'); ?>
<?php if(!empty($subscrib_plan)){?>
<script type="text/javascript"> 
function confirm_alert(msg, yesFn, noFn) {
    var confirmBox = $(".error_popup_msg");
    var overlay = $(".popup_fade");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".alert_yes_btn,.alert_no_btn").unbind().click(function() {
    	document.body.style.overflow = 'auto';
        confirmBox.hide();
        overlay.hide();
    });
    /* close error popup when click ok button or popupfade - added by Akila*/
    confirmBox.find(".alert_yes_btn").click(yesFn);
    confirmBox.find(".alert_no_btn").click(noFn);
    // var height=$('.error_popup_msg').height();
    // var width=$('.error_popup_msg').width();
    // $('.error_popup_msg').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
  	overlay.fadeIn(350);
    confirmBox.fadeIn(350);
    document.body.style.overflow = 'hidden';
}
function ajax_sms_send(id) {
   	var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
	var url = '<?php echo base_url(); ?>';
	var vac_id = '<?php echo $vac_id; ?>';
	var org_id = <?php echo $organization['organization_id']; ?>;
	var this_tag = $('.candidate_sms');
	$.ajax({
       	type: "POST",
       	url: url+"provider/sendsms",
       	data:{ candidate_id : id ,org_id : org_id,vac_id :vac_id, csrf_token : csrf},
       	cache: false,
       	async: false,
       	success: function(data) {
       		var obj = JSON.parse(data);
       		var sub = obj.subscribe_details;
       		if(obj.status == "failure"){
       			$('.subscription_action_message').text('Message not sent successfully!. Please try again later.');
       		}
       		else {
       			$('.subscription_action_message').text('Message sent successfully!');
       		}
       		var start = new Date(sub.org_sub_validity_end_date);
		    end   = new Date(),
		    diff  = new Date(start - end),
		    days  = diff/(1000*60*60*24);
		    if(days < 0) {
		    	var text = "Renewal";
		    }
		    else {
		    	var text = "Upgrade";
		    }
		 	if(sub.organization_sms_remaining_count <= 0) {
       			this_tag.text(text);
       			this_tag.attr('href',url+'provider/subscription');
       			this_tag.attr('data-original-title','No remaning sms count, you can '+text+' the Sms plan');		
       		}
       		else {
       			this_tag.attr('data-original-title','You sent '+(sub.organization_sms_count - sub.organization_sms_remaining_count)+' sms, still you can download '+sub.organization_sms_remaining_count+' more,else you can upgrade the Sms plan');
       		}
		}
 	});
}
function ajax_email_send(id) {
	var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
   	var url = '<?php echo base_url(); ?>';
   	var vac_id = '<?php echo $vac_id; ?>';
   	var this_tag = $('.candidate_email');
   	var org_id = <?php echo $organization['organization_id']; ?>;
 	$.ajax({
	    type: "POST",
		url: url+"provider/sendmail",
	    data:{ candidate_id : id ,org_id : org_id,vac_id :vac_id, csrf_token : csrf},
	    cache: false,
	    async: false,
	    success: function(data) {
			var obj = JSON.parse(data);
			var sub = obj.subscribe_details;
	  		if(obj.status == "failure"){
   				$('.subscription_action_message').text('Email not sent successfully!');
       		}
       		else {
       			$('.subscription_action_message').text('Email sent successfully!');
       		}
       		if(sub.organization_email_remaining_count <= 0) {
       			this_tag.text("Upgrade");
       			this_tag.attr('href',url+'provider/subscription');
       			this_tag.attr('data-original-title','No remaning email count, you can upgrade the Email plan');		
       		}
       		else {
       			this_tag.attr('data-original-title','You used '+(sub.organization_email_count - sub.organization_email_remaining_count)+' Email, still you can send '+sub.organization_email_remaining_count+'  more, else you can upgrade the Email plan');
       		}
       	}
 	});
}
function ajax_resume_download(id) {
   	var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
	var url = '<?php echo base_url(); ?>';
	var vac_id = '<?php echo $vac_id; ?>';
	var this_tag = $('.candidate_resume');
	var org_id = <?php echo $organization['organization_id']; ?>;
	$.ajax({
       type: "POST",
       url: url+"provider/resume",
       data:{ candidate_id : id ,org_id : org_id, vac_id :vac_id, csrf_token : csrf},
       cache: false,
       async: false,
       success: function(data) {
       		var obj = JSON.parse(data);
       		var sub = obj.subscribe_details;
       		if(obj.status == "failure"){
       			$('.subscription_action_message').text('Resume not download!');
       		}
       		else {
       			$('#hidden_download').attr('href',obj.status);
       			$('#hidden_download')[0].click();
       			$('.subscription_action_message').text('Resume download successfully!');
       		}
       		if(sub.organization_remaining_resume_download_count <= 0) {
       			this_tag.text("Upgrade");
       			this_tag.attr('href',url+'provider/subscription');
       			this_tag.attr('data-original-title','No remaning download count, you can upgrade the Upgrade plan');		
       		}
       		else {
       			this_tag.attr('data-original-title','You used '+(sub.organization_resume_download_count - sub.organization_remaining_resume_download_count)+' Download, still you can download '+sub.organization_remaining_resume_download_count+'  more, else you can upgrade the Resume download plan');
       		}
       }
 	});
}

$(document).ready(function() {

	/* error popup - added by Akila */
	$('.candidate_email,.candidate_sms,.candidate_resume').on('click',function() {
		var error = 0;
		var url = '<?php echo base_url(); ?>';
		var id =  parseInt($(this).attr('candidate-id'));
		var org_id = <?php echo $organization['organization_id']; ?>;
		var name = $(this).data('name');
		if(!$(this).attr('href')) {
    		var error = 1;
    	}
    	if(id && error ==1 && (name == "sms" || name == "email" || name == "resume" || name == "template_resume")) {
    		if(name == "template_resume" || name == "resume") {
    			var msg= "Are you sure want to proceed. It will be reduce your resume count ?";
    		}
    		else {
    			var msg= "Are you sure want to proceed ?";
    		}
			confirm_alert(msg, function yes() {
			if(name == "sms") {
				ajax_sms_send(id);
			}
			else if(name == "email") {
				ajax_email_send(id);
			}
			else if(name == "template_resume") {
				window.open (url+"provider/templated_resume_download/"+id+"/"+org_id);
				location.reload();
			}
			else {
				ajax_resume_download(id);
			}
			}, function no() {
	            // do nothing
	        });
	    }
	    else if (error == 1) {
	    	alert("something went wrong. Please try again later!")
	    }
	});
});
</script>
<?php } ?>