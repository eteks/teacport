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
                                     <?php if (@getimagesize($organization['organization_logo'])) { ?>
                                    <img src="<?php echo $organization['organization_logo']; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } else { ?>
                                	<img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive">
                                    <?php } ?>
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
													<div class="col-sm-7">	<?php echo ucfirst($candidate['personnal']['candidate_name']); ?> </div>
												</div>											
												<div class="display_seeker_details">
													<span class="col-sm-4">Gender </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['candidate_gender']); ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Date of Birth </span>
													<span class="col-sm-1"> : </span>
													<div class="col-sm-7"> <?php echo substr($candidate['personnal']['candidate_date_of_birth'], 8, 2).'.'.substr($candidate['personnal']['candidate_date_of_birth'], 5, 2).'.'.substr($candidate['personnal']['candidate_date_of_birth'], 0, 4); ?> </div>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Father's Name </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['candidate_father_name']); ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Marital Status </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['candidate_marital_status']); ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Native District  </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['living_district']); ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Mother Tongue</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['language_name']); ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Nationality  </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['candidate_nationality']); ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Religion </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['candidate_religion']); ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Communal Category </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo ucfirst($candidate['personnal']['candidate_community']); ?> </span>
												</div>
												<?php if(isset($candidate['personnal']['candidate_is_physically_challenged'])){ ?>
												<div class="display_seeker_details">
													<span class="col-sm-4">Physically Handicapped Person</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_is_physically_challenged']; ?> </span>
												</div>
												<?php } ?>
											</div> <br> <!---End personal profile-->	
											<!--Post Preference-->
											<?php
											 $applied_posting = '';
											 foreach ($candidate['appliedposting'] as $posting) {
												 $applied_posting .= $posting['posting_name'].', ';
											 }
											 $trimed_posting = trim($applied_posting, ", ");
											 $whising_class = '';
											 foreach ($candidate['willingclass'] as $willing_calss) {
												 $whising_class .= $willing_calss['class_level'].', ';
											 }
											 $trimmed_class = trim($whising_class, ", ");
											?>
			     							 <div>
			     							 	<h5>Post Preference</h5>
				                           	 	<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Post Applying For</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	<?php echo $trimed_posting; ?> </div>
												</div>											
												<div class="display_seeker_details">
													<span class="col-sm-4">Expected Monthly Salary</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['preferance']['candidate_expecting_start_salary']; ?> to <?php echo $candidate['preferance']['candidate_expecting_end_salary']; ?>  </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Wish to Work in District </span>
													<span class="col-sm-1"> : </span>
													<div class="col-sm-7"> <?php echo $candidate['personnal']['willing_district']; ?> </div>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Wish to take Classes For </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $trimmed_class; ?> </span>
												</div>
											</div> <br> <!---End Post Preference-->	
											<!--Educatinaol Profile-->
			     							 <div>
			     							 	<h5>Educational Profile</h5>
				                           	 	<div class="table-responsive">
													<table class="table seeker_edu-details">
														<thead>
															<th>Qualification</th>
															<th>Year of Passing </th>
															<th>Medium Of Instruction</th>
															<th>Board/university</th>
															<th>% of Marks</th>
														</thead>
														<tbody>
															<?php foreach ($candidate['education'] as $education) { ?>
															<tr>
																<td><?php echo $education['qualification']; ?></td>
																<td><?php echo $education['passedout']; ?> </td>
																<td><?php echo $education['medium']; ?> </td>
																<td><?php echo $education['boardname']; ?></td>
																<td><?php echo $education['percentage']; ?>%</td>
															<tr>
															<?php } ?>
														</tbody>
													</table>
												</div> <!--.table-responsive-->
												<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">TET Exam Status</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	<?php if($candidate['personnal']['candidate_tet_exam_status']) echo 'Pass'; else echo 'Nil'; ?> </div>
												</div>
												<?php
													if(!empty($candidate['extracurricular'])){
														$extra_curricular = '';
														foreach ($candidate['extracurricular'] as $ecurricular) {
															$extra_curricular .= $ecurricular['extra_curricular'].', ';
														}
														$trimmed_extracullar = trim($extra_curricular, ", ");
												?>
												<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Extra Curricular Skills </span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7"><?php echo $trimmed_extracullar; ?></div>
												</div>
												<?php } ?>
												<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Is experienced </span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7"><?php if($candidate['personnal']['candidate_is_fresher'] != 1) echo 'Yes'; else echo 'No, I am a fresher'; ?></div>
												</div>
											</div> <br>
											<!---End Educational Profile -->
											<?php if($candidate['personnal']['candidate_is_fresher'] != 1){ ?>
											<!--Professional Profile-->
			     							 <div>
			     							 	<h5>Professional Profile</h5>
												<div class="table-responsive">
													<table class="table">
														<thead>
															<th>Level</th>
															<th>Board </th>
															<th>No. of Years</th>
														</thead>
														<tbody>
															<?php foreach ($candidate['experience'] as $experience) { ?>
																<tr>
																	<td><?php echo $experience['classlevel']; ?></td>
																	<td><?php echo $experience['experienceboard']; ?> </td>
																	<td><?php echo $experience['experienceyear']; ?></td>
																<tr>
															<?php } ?>
															
														</tbody>
													</table>
												 </div> <!--.table-responsive-->
											  </div> <br> <!---End Professional Profile-->
											  <?php } ?>
											  <?php if(!empty($subscrib_plan)){?>
											  <!--Communication Information-->
			     							 <div>
			     							 	<h5>Communication Information</h5>
				                           	 	<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Door No.</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	<?php echo $candidate['personnal']['candidate_address_1']; ?> </div>
												</div>											
												<div class="display_seeker_details">
													<span class="col-sm-4">Post/Village/Taluk</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_address_2']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">District </span>
													<span class="col-sm-1"> : </span>
													<div class="col-sm-7"> <?php echo $candidate['personnal']['living_district']; ?> </div>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">State</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['livestate']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Pin-Code</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_pincode']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Email ID</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_email']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Mobile No</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_mobile_no']; ?> </span>
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
                                  					<a data-name="sms" class="btn btn-default btn-medium pull-right candidate_sms" data-toggle="tooltip" title="You sent <?php echo $subscrib_plan['organization_sms_count'] - $subscrib_plan['organization_sms_remaining_count']; ?> sms, still you can send <?php echo $subscrib_plan['organization_sms_remaining_count']; ?> more,else you can upgrade the Sms plan" candidate-id="<?php echo $candidate['personnal']['candidate_id'];?>">Sms</a>
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
                                  					<a data-name="email" class="btn btn-default btn-medium pull-right candidate_email" data-toggle="tooltip" title="You used <?php echo $subscrib_plan['organization_email_count'] - $subscrib_plan['organization_email_remaining_count']; ?> Email, still you can send <?php echo $subscrib_plan['organization_email_remaining_count']; ?>  more, else you can upgrade the Email plan" candidate-id="<?php echo $candidate['personnal']['candidate_id'];?>">Email</a>
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
                                  					<a data-name="resume" class="btn btn-default btn-medium pull-right candidate_resume" data-toggle="tooltip" title="You used <?php echo $subscrib_plan['organization_resume_download_count'] - $subscrib_plan['organization_remaining_resume_download_count']; ?> Download, still you can download <?php echo $subscrib_plan['organization_remaining_resume_download_count']; ?> more, else you can upgrade the Resume download plan" candidate-id="<?php echo $candidate['personnal']['candidate_id'];?>">Resume</a>
                                  					<a class="dn" id="hidden_download" target="_blank" href="#" download> </a>
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
											<?php } else{ ?>
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
			 	<input type="submit" class="btn btn-default alert_yes_btn" value="Proceed">
			 	<input type="submit" class="btn btn-default alert_no_btn" value="Cancel">
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

$(document).ready(function(){

	/* error popup - added by Akila */
	$('.candidate_email,.candidate_sms,.candidate_resume').on('click',function() {
		var error = 0;
		var id =  parseInt($(this).attr('candidate-id'));
		var name = $(this).data('name');
		if(!$(this).attr('href')) {
    		var error = 1;
    	}
    	if(id && error ==1 && (name == "sms" || name == "email" || name == "resume")) {
			confirm_alert("Are you sure want to proceed ?", function yes() {
			if(name == "sms") {
				ajax_sms_send(id);
			}
			else if(name == "email") {
				ajax_email_send(id);
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