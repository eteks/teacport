<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
<section class="job-breadcrumb">
    <div class="container">
	    <div class="row">
    	    <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a> </li>
                        <li><a href="<?php echo base_url(); ?>seeker/dashboard">Dashboard</a> </li>
                        <li class="active">edit profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Content Area-->
<section class="dashboard-body">
    <div class="container">
        <div class="row">
	        <div class="col-md-12 col-sm-12 col-xs-12">
              	<!--Dashboard Left Panel-->
                <div class="col-md-4 col-sm-4 col-xs-12">
 		            <!--include left panel menu-->
                    <?php include('include/user_dashboard_sidemenu.php'); ?>
                </div>
                <?php
                if($edit_profile_visible_status == 1) :
                ?>
        	    <!--Dashboard-Right panel-Edit Profile-->
                <div class="col-md-8 col-sm-8 col-xs-12">
            	    <div class="heading-inner first-heading">
                        <p class="title">Edit Profile</p>
                    </div>
                	<div class="profile-edit edit_section_seeker">
                    	<?php echo form_open('seeker/editprofile',array('class' => 'form-horizontal seeker_edit_form','id' => 'candidate-form')); ?>
                    		<p class="val_status">  </p>
                		    <div class="row-form"> 
                	        	<!--accordian-tab1-->
	                            <div class="panel-group drop-accordion" id="accordion" role="tablist" aria-multiselectable="true">
	                            	<!--accordian Tab 1-->
	                                <div class="panel panel-default">
	                                    <div class="panel-heading tab-collapsed" role="tab" id="headingOne">
	                                        <h4 class="panel-title"> <a class="collapse-controle" data-toggle="collapse" data-parent="#accordion" href="faq.html#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Personal Profile <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
	                                    </div>
	                                    <!-- Personal Profile Details Start -->
				                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
	                                        <div class="panel-body">
	                                            <!--Personal Profile-->
	                                            <div class="form-group">
													<label class="col-sm-4">Candidate Name<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<input  maxlength="50" autocomplete="off" name="cand_firstname" type="text" size="50" data-minlength="3" data-name="Candidate Name" value="<?php echo $candidate_values['candidate_name']; ?>" placeholder="Name" class="form-control form_inputs alpha_value">
													</div>												
												</div>
												<div class="form-group">
													<label class="col-sm-4">Gender<sup class="alert">*</sup> </label>
													<div class="col-sm-2">
														<label>
															<input name="cand_gen" class="form_radio" value="male" type="radio" <?php if($candidate_values['candidate_gender']=='male') echo "checked"; ?> > Male
														</label>
													</div>
													<div class="col-sm-6">
														<label>
															<input name="cand_gen" class="form_radio" value="female" type="radio" <?php if($candidate_values['candidate_gender']=='female') echo "checked"; ?>> Female
														</label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4" form="dob">Date of Birth<sup class="alert">*</sup></label>
													<div class="col-sm-8 datepicker_section">
														<input placeholder="Date Of Birth" name="cand_dob" class="form-control date_of_birth form_inputs" type="text" value="<?php echo date('d/m/Y',strtotime($candidate_values['candidate_date_of_birth'])); ?>" >
													</div>											
												</div>
												<div class="form-group">
													<label class="col-sm-4">Father's Name<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<input maxlength="50" data-minlength="3" autocomplete="off" type="text" data-name="Father's Name" class="form-control form_inputs alpha_value" name="cand_fa_name"  size="50" value="<?php echo $candidate_values['candidate_father_name']; ?>" placeholder="Name">
													</div>
												</div>
												<div class="form-group image_upload_section">
													<label class="col-sm-4"> Profile Photo <sup class="alert"></sup></label>
													<?php
										  	 		$image_name = '';
										  	 		$old_name = '';
										  	 		if(!empty($candidate_values['candidate_image_path'])) :
        									  	 		$image_name = str_replace(base_url().SEEKER_UPLOAD."pictures/", '', $candidate_values['candidate_image_path']);
        									  	 		$old_name = str_replace(base_url(), '',$candidate_values['candidate_image_path']);
										  	 		endif;
										  	 		?>
													<div class="col-sm-8">
														<div class=" col-sm-10 input-group image-preview">
                               								<input type="text" disabled="disabled" class="form-control image-preview-filename" placeholder="Upload Your Photo" value="<?php echo $image_name; ?>">
                               								<span class="input-group-btn">
                               									<button id="image_preview_clear_profile" style="display: none;" class="btn-width btn btn-default image-preview-clear" type="button">
	                                        						<span class="glyphicon glyphicon-remove"></span> Clear
	                                        					</button>
						                                        <div class="btn-width btn btn-default image-preview-input">
						                                            <span class="glyphicon glyphicon-folder-open"></span>
						                                            <span class="image-preview-input-title">Browse</span>
						                                            <input id="file" class="image_upload_holder" type="file" accept="file_extension" name="cand_pic">
						                                            <input type="hidden" value="<?php echo $old_name; ?>" name="old_file_path" />
						                                        </div>
	                                    					</span>
                               							</div>
					                               		<div class="col-sm-2 col-sm-2 pull-right nopadding"> 
					                               			<?php
					                               			if(!empty($candidate_values['candidate_image_path'])) :
												   			$keyword = "uploads";
											    			// To check whether the image path is cdn or local path
													        if(strpos( $candidate_values['candidate_image_path'] , $keyword ) !== false) {
											       				$thumb_image = explode('.', end(explode('/',$candidate_values['candidate_image_path'])));
																$thumb = base_url().SEEKER_UPLOAD."pictures/".$thumb_image[0]."_thumb.".$thumb_image[1];
													        }
													        else {
													        	$thumb = $candidate_values['candidate_image_path'];
													        }         
					                               			?>
					                               			<img id="seeker-edit-image-preview" class="image_upload_profile" src="<?php echo $thumb; ?>" data-href = "<?php echo base_url();?>assets/images/placeholder.png" />
					                               			<?php
					                               			else :
					                               			?>
					                               			<img id="seeker-edit-image-preview" class="image_upload_profile" src="<?php echo base_url();?>assets/images/placeholder.png" data-href = "<?php echo base_url();?>assets/images/placeholder.png" />
					                               			<?php
					                               			endif;
					                               			?>
					                               		</div>                          
					                            	</div>
	                    							<p class="col-md-offset-4 col-md-8 info">Only png, jpg and jpeg files are accepted of size 2 MB</p>
												</div>	
												<div class="form-group">
													<label class="col-sm-4">Marital Status<sup class="alert">*</sup></label>
													<div class="col-sm-2">
														<input name="cand_marital" value="married" class="form_radio" type="radio" <?php if($candidate_values['candidate_marital_status']=='married') echo "checked"; ?>> Married
													</div>
													<div class="col-sm-6">
														<input  name="cand_marital" class="form_radio" value="unmarried" type="radio" <?php if($candidate_values['candidate_marital_status']=='unmarried') echo "checked"; ?>> Unmarried
													</div>								
												</div>
												<div class="form-group state_section">
													<label class="col-sm-4">State<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<select name="cand_native_state" class="select-state form-control form_inputs state_select" >
															<option value=""> Select State </option>
					                                        <?php
					                                        if(!empty($state_values)) :
					                                        foreach ($state_values as $sta_val) :
					                                        if($sta_val['state_id'] == $candidate_values['candidate_state_id']) {
						                                        echo "<option value='".$sta_val['state_id']."' selected>".$sta_val['state_name']."</option>";
						                                    }
						                                    else {
						                                    	echo "<option value='".$sta_val['state_id']."'> ".$sta_val['state_name']."</option>";
						                                    }
					                                        endforeach;
					                                        endif;
					                                        ?>
					                                    </select>
													</div>
												</div>
												<div class="form-group district_section">
													<label class="col-sm-4">Native District<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<select id="txtdistrict" class="select-district on_change_event_select form-control form_inputs" name="cand_native_dis">
															<option value=""> Select District </option>
															<?php
															if(!empty($district_values)) :
															foreach ($district_values as $dis_val) :
															if($dis_val['district_id'] == $candidate_values['candidate_district_id']) {
															echo '<option value='.$dis_val['district_id'].' selected>'.$dis_val['district_name'].' </option>';
															}
															else if($dis_val['district_state_id'] == $candidate_values['candidate_state_id']) {
																echo '<option value='.$dis_val['district_id'].'>'.$dis_val['district_name'].' </option>';
															}
															endforeach;
															endif;
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4">Mother Tongue<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<select id="txtmtongue" class="select-mothertongue on_change_event_select form-control form_inputs on_others_act" name="cand_mother_ton">
															<option value=""> Select </option>
															<?php
															if(!empty($mother_language_values)) :
															foreach ($mother_language_values as $ton_val) :
															if($ton_val['language_id'] == $candidate_values['candidate_mother_tongue']) {
															echo '<option value='.$ton_val['language_id'].' selected>'.$ton_val['language_name'].'  '.($ton_val['language_status'] == 2 ? '- Not Approved' : '').' </option>';
															}
															else if ($ton_val['language_status'] == 1){
																echo '<option value='.$ton_val['language_id'].'>'.$ton_val['language_name'].' </option>';
															}
															endforeach;
															endif;
															echo "<option value='others'>Others</option>";
															?>
														</select>
													</div><br/>
													<div class="col-sm-offset-4 col-sm-8">
														<input class="form-control others_txt_field dn alpha_value" type="text" data-minlength="3" data-name="Other Mother Tongue Name" maxlength="50" placeholder="Mother Tongue Name" name="other_mother_tongue">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4">Languages Known<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<?php
                            							$lan_array = explode(',',$candidate_values['candidate_language_known']);
                            							?>
														<select class="select-known-languages form-control form_inputs on_others_act" name="cand_known_lan[]" multiple="">
															<?php
															if(!empty($known_languages)) :
															foreach ($known_languages as $lan_val) :
                            								if(in_array($lan_val['language_id'], $lan_array)) {
                            									echo '<option value="'.$lan_val['language_id'].'" selected>'.$lan_val['language_name'].' '.($lan_val['language_status'] == 2 ? '- Not Approved' : '').'</option>';
                              								}
                              								else if ($lan_val['language_status'] == 1) {
                              									echo '<option value="'.$lan_val['language_id'].'">'.$lan_val['language_name'].'</option>';
                              								}
                              								endforeach;
                            								endif;
                            								echo "<option value='others'>Others</option>";
                            								?>
                            							</select>
													</div>
													<div class="col-sm-offset-4 col-sm-8">
														<input class="form-control others_txt_field dn alpha_value" type="text" name="other_known_lang" data-minlength="3" data-name="Other Known Language Name" placeholder="Known Language Name" maxlength="50">
													</div>
													<!-- <p class="col-md-offset-4 col-md-8 info">Specify using comma if you know more than one language</p> -->
												</div>
												<div class="form-group">
													<label class="col-sm-4">Nationality<sup class="alert">*</sup></label>
													<?php 
													if(!empty(unserialize(NATIONALITY))) :
													foreach (unserialize(NATIONALITY) as $key => $val): 
													?>
													<div class="col-sm-2">
														<input  name="cand_nation" value="<?php echo $key; ?>" type="radio" class="form_radio" <?php if($key == $candidate_values['candidate_nationality']) echo 'checked'; ?>> <?php echo $val; ?>
														</div>
													<?php 
													endforeach; 
													endif;
													?>
												</div>
												<div class="form-group">
													<label class="col-sm-4">Religion<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<select id="txtregl" class="select-religion on_change_event_select form-control form_inputs" name="cand_religion">
															<option value=""> Select </option>
															<?php 
															if(!empty(unserialize(RELIGION))):
															foreach (unserialize(RELIGION) as $key => $val):
															if($key == $candidate_values['candidate_religion']) {
															echo '<option value='.$key.' selected>'.$val.' </option>';
															}
															else {
															echo '<option value='.$key.'>'.$val.' </option>';
															}
															endforeach;
															endif;
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4">Communal Category<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<select id="txtccategory" class="select-community on_change_event_select form-control form_inputs" name="cand_communal">
															<option value=""> Select </option>
															<?php 
															if(!empty(unserialize(COMMUNAL))):
															foreach (unserialize(COMMUNAL) as $key => $val): 
															if($key == $candidate_values['candidate_community']) {
															echo '<option value='.$key.' selected>'.$val.' </option>';
															}
															else {
															echo '<option value='.$key.'>'.$val.' </option>';
															}
															endforeach; 
															endif;
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class=" col-sm-4">Physically Challenged ?<sup class="alert">*</sup></label>
													<div class="col-sm-2">
														<input id="" name="cand_phy" value="yes" class="form_radio" type="radio" <?php if($candidate_values['candidate_is_physically_challenged']=="yes") echo 'checked'; ?>>
													 	Yes
													</div>
													<div class="col-sm-6">
														<input id="" name="cand_phy" value="no" class="form_radio" type="radio" <?php if($candidate_values['candidate_is_physically_challenged']=="no") echo 'checked'; ?>>
														No
													</div>
												</div>	
		                                    </div> <!--panel-body-->
	                                    </div> <!--collapseone-->
	                                   	<!-- Personal Profile Details End -->
	                                   	<input type="hidden" name="cand_pro" value="<?php echo $candidate_values['candidate_id']; ?>" />
	                                </div> <!--panel-->
	                                <!--accordian-tab2-->
	                                <div class="panel panel-default">
	                                    <div class="panel-heading" role="tab" id="headingTwo">
	                                        <h4 class="panel-title"> <a class="collapse-controle collapsed" data-toggle="collapse" data-parent="#accordion" href="faq.html#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Post Preference <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
	                                    </div>
	                                    <!-- Post Preference Details Start -->
	                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
	                                        <div class="panel-body">
	                                        	<!--Post Preference-->
	                                        	<div class="form-group ins_cand_section">
													<label class=" col-sm-4">Preferred Institution<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<?php
                            							$ins_array = explode(',',$candidate_values['candidate_institution_type']);
                            							?>
														<select class="select_seeker_institution form-control form_inputs ins_cand_select" name="cand_ins[]" multiple="">
															<?php
															if(!empty($institution_values)) :
															foreach ($institution_values as $ins_val) :
                            								if(in_array($ins_val['institution_type_id'], $ins_array)) {
                            									echo '<option value="'.$ins_val['institution_type_id'].'" selected>'.$ins_val['institution_type_name'].'</option>';
                              								}
                              								else {
                              									echo '<option value="'.$ins_val['institution_type_id'].'">'.$ins_val['institution_type_name'].'</option>';
                              								}
                              								endforeach;
                            								endif;
                            								?>
                            							</select>
                            						</div>
											    </div>	
	                                            <div class="form-group ins_posting_section">
													<label class=" col-sm-4">Posts applying for<sup class="alert">*</sup></label>
													<div class="col-sm-8">
														<?php
                            							$job_array = explode(',',$candidate_values['candidate_posting_applied_for']);
                             							?>
														<select class="select-postings form-control form_inputs on_others_act" name="cand_posts[]" multiple="">				
															<?php
															if(!empty($posting_values)) :
															foreach ($posting_values as $pos_val) :
                            								if(in_array($pos_val['posting_id'], $job_array)) {
                            									echo '<option value="'.$pos_val['posting_id'].'" selected>'.$pos_val['posting_name'].' '.($pos_val['posting_status'] == 2 ? '- Not Approved' : '').'</option>';
                              								}
                              								else if ($pos_val['posting_status'] == 1) {
                              									echo '<option value="'.$pos_val['posting_id'].'">'.$pos_val['posting_name'].'</option>';
                              								}
                              								endforeach;
                            								endif;
                            								echo "<option value='others'>Others</option>";
                            								?>
                            							</select>
                            						</div>
                            						<div class="col-sm-offset-4 col-sm-8 col-xs-12">
														<input class="form-control others_txt_field dn alpha_value" type="text" name="other_posting" data-minlength="3" data-name="Other Posting Name" placeholder="Posting Name" maxlength="50">
													</div>
											    </div>	
												<div class="form-group">
													<label class="col-sm-4">Expected Monthly Salary </br>(in Rupees)<sup class="alert">*</sup> </label>
													<div class="col-sm-4">
														<input  maxlength="9" data-minlength="4" data-name="Minimum Salary" id="min_amount" name="cand_start_sal" class="inr_validation form-control form_inputs numeric_value" size="50" value="<?php echo $candidate_values['candidate_expecting_start_salary']; ?>" placeholder="Minimum Salary">
													</div>
													<div class="col-sm-4">
														<input  maxlength="9" data-minlength="4" data-name="Maximum Salary" id="max_amount" name="cand_end_sal" class="inr_validation form-control form_inputs numeric_value" size="50" value="<?php echo $candidate_values['candidate_expecting_end_salary']; ?>" placeholder="Maximum Salary">
													</div>														
												</div>
												<div class="form-group ins_class_section">
													<!-- <label class="col-sm-4">I wish to take classes for (select one or more options as your willingness to work)<span class="alert">*</span> </label> -->
													<label class="col-sm-4">Class Preferences<sup class="alert">*</sup> </label>
													<div class="col-sm-8 check-label-cursor ins_class_check">
														<?php
                            							$cls_array = explode(',',$candidate_values['candidate_willing_class_level_id']);
                            							if(!empty($class_values)) :
                            							foreach ($class_values as $cls_val) :
                            							if(in_array($cls_val['class_level_id'], $cls_array)) {
                              								echo '<label><input id="opt_anylevel" class="ace form_checkbox" name="cand_class[]" type="checkbox" value="'.$cls_val['class_level_id'].'" checked> <span class="lbl"> '.$cls_val['class_level'].' </span></label>';
                              							}
                              							else {
                              								echo '<label><input id="opt_anylevel" class="ace form_checkbox" name="cand_class[]" type="checkbox" value="'.$cls_val['class_level_id'].'"> <span class="lbl"> '.$cls_val['class_level'].' </span></label>';
                              							}
								                        endforeach;
                            							endif;
                            							?>
													</div>
												</div>
												<div class="form-group ins_subject_section">
													<!-- <label class="col-sm-4">I wish to take subject for (select one or more options as your willingness to work)<span class="alert">*</span> </label> -->
													<label class="col-sm-4">Subject/Course preferences<sup class="alert">*</sup> </label>
													<div class="col-sm-8">
														<?php
                            							$sub_array = explode(',',$candidate_values['candidate_willing_subject_id']);
                            							?>
														<select class="select-subjects form-control form_inputs on_others_act" name="cand_sub[]" multiple="">
															<?php
															if(!empty($subject_values)) :
															foreach ($subject_values as $sub_val) :
                           									if(in_array($sub_val['subject_id'], $sub_array)) {
                            									echo '<option value="'.$sub_val['subject_id'].'" selected>'.$sub_val['subject_name'].' '.($sub_val['subject_status'] == 2 ? '- Not Approved' : '').'</option>';
                              								}
                              								else if ($sub_val['subject_status'] == 1) {
                              									echo '<option value="'.$sub_val['subject_id'].'">'.$sub_val['subject_name'].'</option>';
                              								}
                              								endforeach;
                            								endif;
                            								echo "<option value='others'>Others </option>";
                            								?>
                            							</select>
                            						</div>
													<div class="col-sm-offset-4 col-sm-8">
														<input class="form-control others_txt_field dn alpha_value" type="text" name="other_subject" data-minlength="3" data-name="Other Subject Name" placeholder="Subject Name" maxlength="50">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4">Location preferences<sup class="alert">*</sup> </label>
													<div class="col-sm-8">
														<select class="select-location form-control form_inputs on_others_act" name="cand_loc_pre">
															<option value=""> select </option>
															<?php
															foreach (unserialize(AREA_PREFERENCE) as $key => $val) {
																if(!empty($candidate_values['candidate_location_preference']) && $key == $candidate_values['candidate_location_preference']) {
																	echo "<option value=".$key." selected> $val </option>";
																}
																else {
																	echo "<option value=".$key."> $val </option>";
																}											
															}
                            								?>
                            							</select>
                            						</div>
												</div>
												<div class="form-group" style="color:#999;">
													<label class="col-sm-12 info"><i class="fa fa-info-circle"></i> Notifications will be sent based on the choices provided in this section.</label>
												</div>
				                            </div> <!--panel-body-->
				                        </div> <!--#collapseTwo-->
				                        <!-- Post Preference Details End -->
				                        <input type="hidden" name="cand_pre" value="<?php echo $candidate_values['candidate_preferance_id']; ?>" />
	                               	</div><!--panel-->
	                               	<!--accordian-tab3-->
	                                <div id="edu_profile" class="panel panel-default">
	                                    <div class="panel-heading" role="tab" id="headingThree">
	                                        <h4 class="panel-title"> <a class="collapsed collapse-controle" data-toggle="collapse" data-parent="#accordion" href="faq.html#collapseThree" aria-expanded="false" aria-controls="collapseThree">Educational Profile  <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
	                                    </div>
	                                    <!-- Candidate Education Details Start -->
	                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
	                                        <div class="panel-body">
	                                            <!--Educational Profile-->
	                                            <div class="form-group">
				                            		<label class="col-sm-2">Qualification</label>
				                            		<label class="col-sm-2">Passedout Year</label>
				                            		<label class="col-sm-2">Medium</label>
				                            		<label class="col-sm-2">Department</label>
				                            		<label class="col-sm-2">Board</label>
				                            		<label class="col-sm-2">% of Marks</label>
				                            	</div>
				                            	<?php
				                            	if(!empty($education_values)) :
				                            		$i = 0;
				                            		$count = count($education_values);
				                            		$edu_set = array();
				                            	?>
				                            	<div class="clone_all_fields">
				                            	<?php
				                            	foreach ($education_values as $edu_val) :
				                            	$edu_set[] = $edu_val['candidate_education_id'];
				                            	?>
					                            	<div id="edu_clone_section<?php if($i != 0) echo $i; ?>" class="form-group clone_section education_clone">
					                            		<div class="col-sm-2 qualification_section">
					                            		 	<select name="cand_qual[]" class="form-control form_inputs education_qualification edit_inputs select_qualification">
																<option value=""> Select </option>
																<?php
																if(!empty($qualification_values)) :
																foreach ($qualification_values as $qua_val) :
																if($qua_val['educational_qualification_id'] == $edu_val['candidate_education_qualification_id']) {
																	echo '<option value='.$qua_val['educational_qualification_id'].' selected>
																	'.$qua_val['educational_qualification'].' </option>';
																}
																else {
																	echo '<option value='.$qua_val['educational_qualification_id'].'>
																	'.$qua_val['educational_qualification'].' </option>';
																}
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2">
														  	<input placeholder="" data-name="Year Of Passing" data-minlength="4" maxlength="4" name="cand_yop[]" class="edit_inputs form-control form_inputs numeric_value text-center" id="" type="text" value="<?php echo $edu_val['candidate_education_yop']; ?>" >
														</div>
														<div class="col-sm-2">
															<select id="" name="cand_med[]" class="form-control form_inputs">
																<option value=""> Select </option>
																<?php
																if(!empty($medium_language_values)) :
																foreach ($medium_language_values as $lan_val) :
																if($lan_val['language_id'] == $edu_val['candidate_medium_of_inst_id']) {
																	echo '<option value='.$lan_val['language_id'].' selected>
																	'.$lan_val['language_name'].' </option>';
																}
																else {
																	echo '<option value='.$lan_val['language_id'].'>
																	'.$lan_val['language_name'].' </option>';
																}
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2 department_section">			
															<select id="" name="cand_dept[]" class="form-control form_inputs education_department">
																<option value=""> Select </option>
																<?php
																if(!empty($department_values)) :
																if(!empty($edu_val['candidate_education_department_id'])) {	
																foreach ($department_values as $dep_val) :
																if($dep_val['departments_id'] == $edu_val['candidate_education_department_id']) {
																	echo '<option value='.$dep_val['departments_id'].' selected>'.$dep_val['departments_name'].' </option>';
																}
																else if(in_array($edu_val['candidate_education_qualification_id'], explode(',',$dep_val['department_educational_qualification_id']))) {
																	echo '<option value='.$dep_val['departments_id'].'>
																'.$dep_val['departments_name'].' </option>';
																}
																endforeach;
																}
																else {
																	echo '<option value="0" selected> None </option>';
																	// break;
																}
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2">
															<select id="" name="cand_board[]" class="form-control form_inputs">
																<option value="">Select</option>
																<?php
																if(!empty($board_values)) :
																foreach ($board_values as $boa_val) :
																if($boa_val['education_board_id'] == $edu_val['candidate_edu_board']) {
																	echo '<option value='.$boa_val['education_board_id'].' selected>
																	'.$boa_val['university_board_name'].' </option>';
																}
																else {
																	echo '<option value='.$boa_val['education_board_id'].'>
																	'.$boa_val['university_board_name'].' </option>';
																}
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-1 text-center np">
														  	<input type="text" name="cand_percen[]" value="<?php echo $edu_val['candidate_education_percentage']; ?>" class="np edit_inputs form-control edu_percen form_inputs numeric_dot text-center" maxlength="5" size="5" data-minlength="2" data-name="Percentage">
														</div>
													  	<div class="col-sm-1 actions">
															<?php
															if($count == $i+1) :
															?>
														  	<a class="edu_clone clone_icon"><strong><i id="edu_plus" class="fa fa-plus edu_plus"></i></strong></a>
														  	<?php
														  	else :
														  	?>
														  	<a class="edu_clone clone_icon dn"><strong><i class="fa fa-plus"></i></strong></a>
														  	<?php
														  	endif;
														  	?>
														  	<a class="edu_remove clone_icon"><strong><i class="fa fa-minus"></i></strong></a>
													  	</div>
														<input type="hidden" class="edit_inputs" name="cand_edu[]" value="<?php echo $edu_val['candidate_education_id']; ?>">
													</div>
												<?php
												$i++;
												endforeach;
												?>
												<input type="hidden" value="<?php echo implode(',',$edu_set); ?>" name="edu_set" />
												</div>	<!--append fields-->
												<?php
												else :	
												?>
												<div class="clone_all_fields">
					                            	<div id="edu_clone_section" class="form-group clone_section education_clone">
					                            		<div class="col-sm-2 qualification_section">
					                            		 	<select id="" name="cand_qual[]" class="form-control form_inputs select_qualification">
																<option value=""> Select </option>
																<?php
																if(!empty($qualification_values)) :
																foreach ($qualification_values as $qua_val) :
																	echo '<option value='.$qua_val['educational_qualification_id'].'>
																	'.$qua_val['educational_qualification'].' </option>';
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2 datepicker_section">
															<input placeholder="" data-name="Year Of Passing" data-minlength="4" maxlength="4" name="cand_yop[]" class="edit_inputs form-control form_inputs numeric_value text-center" id="" type="text" value="" >
														</div>
														<div class="col-sm-2">
															<select id="" name="cand_med[]" class="form-control form_inputs">
																<option value=""> Select </option>
																<?php
																if(!empty($medium_language_values)) :
																foreach ($medium_language_values as $lan_val) :
																	echo '<option value='.$lan_val['language_id'].'>
																	'.$lan_val['language_name'].' </option>';
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2 department_section">
															<select id="" name="cand_dept[]" class="form-control form_inputs">
																<option value="">Select</option>
																<?php
																if(!empty($department_values)) :
																foreach ($department_values as $dep_val) :
																	echo '<option value='.$dep_val['departments_id'].'>
																	'.$dep_val['departments_name'].' </option>';
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2">
															<select id="" name="cand_board[]" class="form-control form_inputs">
																<option value="">Select</option>
																<?php
																if(!empty($board_values)) :
																foreach ($board_values as $boa_val) :
																	echo '<option value='.$boa_val['education_board_id'].'>
																	'.$boa_val['university_board_name'].' </option>';
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-1 text-center np">
														  	<input type="text" class="edit_inputs edu_percen form-control form_inputs numeric_dot text-center np" name="cand_percen[]" value="" data-minlength="2" data-name="Percentage" maxlength="5" size="5">
														</div>
														<div class="col-sm-1 actions">
														  	<a class="edu_clone clone_icon"><strong><i class="fa fa-plus"></i></strong></a>
														  	<a class="edu_remove clone_icon"><strong><i class="fa fa-minus"></i></strong></a>
														</div>
														<input type="hidden" class="edit_inputs" name="cand_edu[]" value="">
													</div>
													<input type="hidden" value="" name="edu_set" />
												</div>	<!--append fields-->
												<?php
												endif;
												?>
					                            <div class="form-group">
													<label class="col-sm-6">
														Have you passed in Teacher Eligibility Test</br> (TET- State / Central)? <sup class="alert">*</sup>
													</label>
													<div class="col-sm-6">
														<select id="tet" class="select-tetexam form-control form_inputs" name="cand_tet" >
															<option value=""> Select </option>
															<option value="1" <?php if($candidate_values['candidate_tet_exam_status'] == '1' ) echo 'selected'; ?>> Yes </option>		
															<option value="0" <?php if($candidate_values['candidate_tet_exam_status'] == '0' ) echo 'selected'; ?>> No </option>
														</select>
													</div>
					                            </div>
					                            <div class="form-group">
													<label class="col-sm-6">
														Have you passed in State Eligibility Test</br> (SET) ? <sup class="alert">*</sup>
													</label>
													<div class="col-sm-6">
														<select id="tet" class="select-setexam form-control form_inputs" name="cand_set" >
															<option value=""> Select </option>
															<option value="1" <?php if($candidate_values['candidate_set_exam_status'] == '1' ) echo 'selected'; ?>> Yes </option>		
															<option value="0" <?php if($candidate_values['candidate_set_exam_status'] == '0' ) echo 'selected'; ?>> No </option>
														</select>
													</div>
					                            </div>
					                            <div class="form-group">
													<label class="col-sm-6">
														Have you passed in National Eligibility Test</br> (NET) ? <sup class="alert">*</sup>
													</label>
													<div class="col-sm-6">
														<select id="tet" class="select-netexam form-control form_inputs" name="cand_net" >
															<option value=""> Select </option>
															<option value="1" <?php if($candidate_values['candidate_net_exam_status'] == '1' ) echo 'selected'; ?>> Yes </option>		
															<option value="0" <?php if($candidate_values['candidate_net_exam_status'] == '0' ) echo 'selected'; ?>> No </option>
														</select>
													</div>
					                            </div>
					                            <!-- <div class="form-group">
													<label class="col-sm-8">
														Interested Subject
													</label>
													<div class="col-sm-4">
														<select id="" class="select-subject form-control form_inputs" name="cand_int_sub">
															<option value="">Select</option>
															<?php
															// if(!empty($subject_values)) :
															// foreach ($subject_values as $sub_val) :
															// if($sub_val['subject_id'] == $candidate_values['candidate_interest_subject_id']) {
															// 	echo '<option value='.$sub_val['subject_id'].' selected>
															// 		'.$sub_val['subject_name'].' </option>';
															// }
															// else {
															// 	echo '<option value='.$sub_val['subject_id'].'>
															// 		'.$sub_val['subject_name'].' </option>';
															// }
															// endforeach;
															// endif;
															?>
														</select>
													</div>
					                            </div> -->
					                            <?php
					                            if(!empty($extra_curricular_values)) :
                            					?>
					                            <div class="form-group">
					                             	<label class="col-sm-4">Extra Curricular skills <!-- <sup class="alert">*</sup> --> </label>
					                             	<div class="col-sm-8">
														<?php
                            							$ext_array = explode(',',$candidate_values['candidate_extra_curricular_id']);
                            							?>
														<select class="select-extracurricular form-control on_others_act" name="cand_extra_cur[]" multiple="">
															<?php
															foreach ($extra_curricular_values as $ext_val) :
                            								if(in_array($ext_val['extra_curricular_id'], $ext_array)) {
                            									echo '<option value="'.$ext_val['extra_curricular_id'].'" selected>'.$ext_val['extra_curricular'].' '.($ext_val['extra_curricular_status'] == 2 ? '- Not Approved' : '').'</option>';
                              								}
                              								else if ($ext_val['extra_curricular_status'] == 1) {
                              									echo '<option value="'.$ext_val['extra_curricular_id'].'">'.$ext_val['extra_curricular'].'</option>';
                              								}
                              								endforeach;
                            								?>
                            								<option value="others">Others </option>
                            							</select>
													</div>
													<div class="col-sm-offset-4 col-sm-8">
														<input class="form-control others_txt_field dn alpha_value" type="text" data-minlength="3" data-name="Other Extra Curricular Name" name="other_extracurricular" placeholder="Extra Curricular Name" maxlength="50">
													</div>
					                            </div>
					                            <?php
					                            endif;
                            					?>
	                                        </div><!--panel-body-->
	                                    </div> <!--#collapseThree-->
	                                    <!-- Candidate Education Details End -->
	                                </div><!--panel-->
	                                <!--accordian-tab4-->
	                                <div class="panel panel-default">
	                                    <div class="panel-heading" role="tab" id="headingfour">
	                                        <h4 class="panel-title"> <a class="collapse-controle collapsed" data-toggle="collapse" data-parent="#accordion" href="faq.html#collapsefour" aria-expanded="false" aria-controls="collapsefour">Professional Profile <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
	                                    </div>
	                                    <!-- Candidate Experience Details Start -->
	                                    <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour" aria-expanded="false">
	                                        <div class="panel-body">
	                                           <!--Professional Profile-->
                                           	   <label class="opt_fresh"> <input value="1" name="cand_fresh" type="checkbox" id="fresher_option" <?php if($candidate_values['candidate_is_fresher'] == 1) echo "checked"; ?>> I am a fresh candidate </label>
					               			   	<div class="professional_profile <?php if($candidate_values['candidate_is_fresher'] == 1) echo "dn"; ?>" data-type="<?php if($candidate_values['candidate_is_fresher'] == 1) echo "fresh"; else echo "exp"; ?>">
											   	<div class="form-group">
													<label class="col-sm-3"> Class Level </label>
													<label class="col-sm-3"> Subject </label>
													<label class="col-sm-3">Board</label>
													<label class="col-sm-3">No. of Years</label>
												</div>
												<?php
				                            	if(!empty($experience_values)) :
				                            	$i = 0;
				                            	$exp_count = count($experience_values);
				                            	$exp_set =array();
				                            	?>
				                            	<div class="clone_all_fields">
				                            	<?php
				                            	foreach ($experience_values as $exp_val) :
				                            	$exp_set[] = $exp_val['candidate_experience_id'];
				                            	?>
					                            	<div id="exp_clone_section<?php echo $i; ?>" class="form-group clone_section experience_clone">
					                            		<div class="col-sm-3 class_level_section">
															<select id="" name="cand_exp_class[]" class="form-control form_exp_inputs class_level_select">
																<option value=""> Select </option>
																<?php
																if(!empty($exp_class_values)) :
																foreach ($exp_class_values as $cls_val) :
																if($cls_val['class_level_id'] == $exp_val['candidate_experience_class_level_id']) {
																	echo '<option value='.$cls_val['class_level_id'].' selected>'.$cls_val['class_level'].' </option>';
																}
																else {
																	echo '<option value='.$cls_val['class_level_id'].'>
																			'.$cls_val['class_level'].' </option>';
																}
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-3">
															<select id="" name="cand_exp_sub[]" class="form-control form_exp_inputs">
																<option value=""> Select </option>
																<?php
																if(!empty($exp_subject_values)) :
																foreach ($exp_subject_values as $sub_val) :
																if($sub_val['subject_id'] == $exp_val['candidate_experience_subject_id']) {
																	echo '<option value='.$sub_val['subject_id'].' selected>
																			'.$sub_val['subject_name'].' </option>';
																}
																else {
																	echo '<option value='.$sub_val['subject_id'].'>
																			'.$sub_val['subject_name'].' </option>';
																}
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-3 university_section">
															<select id="" name="cand_exp_board[]" class="form-control form_exp_inputs">
																<option value=""> Select </option>
																<?php
																if(!empty($board_values)) :
																foreach ($board_values as $board_val) :
																if($board_val['education_board_id'] == $exp_val['candidate_experience_board']) {
																	echo '<option value='.$board_val['education_board_id'].' selected>
																			'.$board_val['university_board_name'].' </option>';
																}
																else if(in_array($exp_val['candidate_experience_class_level_id'], explode(',',$board_val['university_class_level_id']))) {		
																	echo '<option value='.$board_val['education_board_id'].'>
																			'.$board_val['university_board_name'].' </option>';
																}
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2">
															<input id="" size="4" value="<?php echo $exp_val['candidate_experience_year']; ?>" maxlength="5" name="cand_exp_yr[]" type="text" class="edit_inputs form-control form_exp_inputs numeric_dot_exp">
														</div>
														<div class="col-sm-1 actions">
															<?php
															if($exp_count == $i+1) :
															?>
														  	<a class="exp_clone clone_icon"><strong><i class="fa fa-plus"></i></strong></a>
														  	<?php
														  	else :
														  	?>
														  	<a class="exp_clone clone_icon dn"><strong><i class="fa fa-plus"></i></strong></a>
														  	<?php
														  	endif;
														  	?>
														  	<a class="exp_remove clone_icon"><strong><i class="fa fa-minus"></i></strong></a>
														</div>
														<input type="hidden" class="edit_inputs" name="cand_exp[]" value="<?php echo $exp_val['candidate_experience_id']; ?>">
													</div>
												<?php
												$i++;
				                            	endforeach;
				                            	?>
				                            	<input type="hidden" value="<?php echo implode(',',$exp_set); ?>" name="exp_set" />
												</div>	<!--append fields-->
				                            	<?php
				                            	else :
				                            	?>
				                            	<div class="clone_all_fields">
					                            	<div id="exp_clone_section" class="form-group clone_section experience_clone">
					                            		<div class="col-sm-3 class_level_section">
															<select id="" name="cand_exp_class[]" class="form-control form_exp_inputs class_level_select">
																<option value=""> Select </option>
																<?php
																if(!empty($exp_class_values)) :
																foreach ($exp_class_values as $cls_val) :
																	echo '<option value='.$cls_val['class_level_id'].'>
																			'.$cls_val['class_level'].' </option>';
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-3">
															<select id="" name="cand_exp_sub[]" class="form-control form_exp_inputs">
																<option value=""> Select </option>
																<?php
																if(!empty($exp_subject_values)) :
																foreach ($exp_subject_values as $sub_val) :
																	echo '<option value='.$sub_val['subject_id'].'>
																			'.$sub_val['subject_name'].' </option>';
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-3 university_section">
															<select id="" name="cand_exp_board[]" class="form-control form_exp_inputs">
																<option value=""> Select </option>
																<?php
																if(!empty($board_values)) :
																foreach ($board_values as $board_val) :
																	echo '<option value='.$board_val['education_board_id'].'>
																			'.$board_val['university_board_name'].' </option>';
																endforeach;
																endif;
																?>
															</select>
														</div>
														<div class="col-sm-2">
															<input id="" size="4" value="" class="edit_inputs form-control form_exp_inputs numeric_dot_exp" maxlength="5" name="cand_exp_yr[]" type="text">
														</div>
														<div class="col-sm-1 actions">
														 	<a class="exp_clone clone_icon"><strong><i class="fa fa-plus"></i></strong></a>
														  	<a class="exp_remove clone_icon"><strong><i class="fa fa-minus"></i></strong></a>
														</div>
														<input type="hidden" class="edit_inputs" name="cand_exp[]" value="">
													</div>
													<input type="hidden" value="" name="exp_set" />
												</div>	<!--append fields-->
												<?php
				                            	endif;
				                            	?>
												</div>
												<div class="form-group upload_section_file">
										  	 		<!--Upload Resume Popup-->
										  	 		<label class="col-md-4"> Add Resume <!-- <sup class="alert">*</sup> --> </label>
										  	 		<?php
										  	 		$resume_name = '';
										  	 		$old_name = '';
										  	 		if(!empty($candidate_values['candidate_resume_upload_path'])) :
										  	 			$resume_name = str_replace(base_url().SEEKER_UPLOAD."resume/", '', $candidate_values['candidate_resume_upload_path']);
										  	 			$old_name = str_replace(base_url(), '',$candidate_values['candidate_resume_upload_path']);
										  	 		endif;
										  	 		?>
						                            <div class="col-sm-8">
														<div class=" col-sm-12 input-group image-preview">
                               								<input type="text" disabled="disabled" class="form-control image-preview-filename" placeholder="Upload Your Resume" value="<?php echo $resume_name; ?>">
                               								<span class="input-group-btn">
                               									<button id="image_preview_clear_profile" style="display: none;" class="btn-width btn btn-default image-preview-clear" type="button">
	                                        						<span class="glyphicon glyphicon-remove"></span> Clear
	                                        					</button>
						                                        <div class="btn-width btn btn-default image-preview-input">
						                                            <span class="glyphicon glyphicon-folder-open"></span>
						                                            <span class="image-preview-input-title">Browse</span>
						                                            <input id="file" class="file_upload_holder" type="file" accept="file_extension" name="cand_resume">
						                                            <input type="hidden" value="<?php echo $old_name; ?>" name="prev_file_path" />
						                                        </div>
	                                    					</span>
                               							</div>                       
					                            	</div>
						                            <p class="col-md-offset-4 col-md-8 info">Only pdf, doc and docx files are accepted of size 1 MB</p>
											   	</div>  
	                         				</div> <!--panel-body-->
	                                    </div> <!--#collapseFour-->
	                                	<!-- Candidate Experience Details End -->
	                                </div><!--panel-->
	                                <!--accordian-tab5-->
	                                <div class="panel panel-default">
	                                    <div class="panel-heading" role="tab" id="headingFive">
	                                        <h4 class="panel-title"> <a class="collapsed collapse-controle" data-toggle="collapse" data-parent="#accordion" href="faq.html#collapseFive" aria-expanded="false" aria-controls="collapseFive">Communication Information <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
	                                    </div>
	                                    <!-- Candidate Communication Details Start -->
	                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">
	                                        <div class="panel-body">
	                                            <!--Communication Information-->
	                                            <div class="form-group">
												<label class="col-sm-4">Door / Building No / Street<sup class="alert"></sup></label>
												<div class="col-sm-8">
													<input id="address-line1" data-minlength="3" data-name="Address" maxlength="150" name="cand_addr1" size="40" value="<?php echo $candidate_values['candidate_address_1']; ?>" type="text" class="form-control form_inputs not-required">
												</div>
											</div>
				                        	<div class="form-group">
												<label class="col-sm-4">Post / Village / Taluk<sup class="alert"></sup></label>
												<div class="col-sm-8">
													<input id="address-line2" data-minlength="3" data-name="Address" maxlength="150" name="cand_addr2" size="40" value="<?php echo $candidate_values['candidate_address_2']; ?>" type="text" class="form-control form_inputs not-required">
												</div>
											</div>
											<div class="form-group state_section">
												<label class="col-sm-4">State<sup class="alert"></sup></label>
												<div class="col-sm-8">
													<select name="cand_live_state" class="select-state form-control state_select" >
				                                        <option value=""> Select State </option>
				                                        <?php
				                                        if(!empty($state_values)) :
				                                        foreach ($state_values as $sta_val) :
				                                        if($sta_val['state_id'] == $candidate_values['candidate_live_state_id']) {
					                                        echo "<option value='".$sta_val['state_id']."' selected> ".$sta_val['state_name']." </option>";
					                                    }
					                                    else {
					                                    	echo "<option value='".$sta_val['state_id']."'> ".$sta_val['state_name']." </option>";
					                                    }
				                                        endforeach;
				                                        endif;
				                                        ?>
				                                    </select>
												</div>
											</div>
				            				<div class="form-group district_section">
												<label class="col-sm-4">Current District<sup class="alert"></sup> </label>
												<div class="col-sm-8">
													<select id="pref_dist" class="form-control select-district" name="cand_live_dis">
														<option value=""> Select </option>
														<?php
														if(!empty($district_values)) :
														foreach ($district_values as $dis_val) :
														if($dis_val['district_id'] == $candidate_values['candidate_live_district_id']) {
														echo '<option value='.$dis_val['district_id'].' selected>'.$dis_val['district_name'].' </option>';
														}
														else if($dis_val['district_state_id'] == $candidate_values['candidate_live_state_id']) {
															echo '<option value='.$dis_val['district_id'].'>'.$dis_val['district_name'].' </option>';
														}
														endforeach;
														endif;
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-4">
													<label>Pin-Code<sup class="alert"></sup></label>
												</div>
												<div class="col-sm-8">
													<input id="postal-code" data-minlength="4" data-name="Pincode" maxlength="6" name="cand_pincode" value="<?php if($candidate_values['candidate_pincode']!=0) echo $candidate_values['candidate_pincode']; ?>" type="text" class="form-control form_inputs numeric_value not-required">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4">Email ID<sup class="alert">*</sup></label>
												<div class="col-sm-8">
													<input id="mail" maxlength="50" size="40" name="cand_email" onkeydown="" onkeypress="" value="<?php echo $candidate_values['candidate_email']; ?>" class="form-control form_inputs">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4">Mobile No.<sup class="alert">*</sup></label>
												<div class="col-sm-8">
													<input maxlength="10" data-minlength="10" data-name="Mobile" id="seeker_mobile" name="cand_mobile" value="<?php echo $candidate_values['candidate_mobile_no']; ?>" class="form-control form_inputs numeric_value">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4">Facebook Url</label>
												<div class="col-sm-8">
													<input id="facebook_url" maxlength="100" name="cand_facebook" onkeypress="" value="<?php echo $candidate_values['candidate_facebook_url']; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4">Google Plus Url</label>
												<div class="col-sm-8">
													<input id="googleplus_url" maxlength="100" name="cand_google" onkeypress="" value="<?php echo $candidate_values['candidate_googleplus_url']; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4">Linkedin Url</label>
												<div class="col-sm-8">
													<input id="linkedin_url" maxlength="100" name="cand_linkedin" onkeypress="" value="<?php echo $candidate_values['candidate_linkedin_url']; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-12 info"><i class="fa fa-info-circle"></i> Same mobile number can't be used to register more than one account.</label>
											</div>
	                                        </div><!--panel-body-->
	                                    </div><!--#collapseFive-->
	                                    <!-- Candidate Communication Details End -->
	                                </div><!--panel-->
	                                <div class="panel panel-default">
	                                    <div class="panel-heading" role="tab" id="headingSeven">
	                                        <h4 class="panel-title"> <a class="collapsed collapse-controle" data-toggle="collapse" data-parent="#accordion" href="faq.html#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Declaration <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
	                                    </div>
	                                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">
	                                        <div class="panel-body">
	                                            <!--Declaration-->
	                                            <div>
													<input id="declar_accept" class="ace form_checkbox" name="cand_accept" value="Y" type="checkbox" value="1" checked>
													<span class="lbl"></span>
													<sup class="alert">*</sup>I hereby declare that all the particulars furnished in this application are true, correct and complete to the best of my knowledge and belief.
													<!-- <span class="ta"> / இந்த விண்ணப்பத்தில் குறிப்பிட்டுள்ள விவரங்களனைத்தும் என் அறிவுக்கு எட்டியவரை உண்மை, சரியானவை மற்றும் முழுமையானவை என உறுதியளிக்கிறேன். </span> -->
												</div>
												<!-- <div>
													<p>
														<input id="optin_sms" class="ace" name="optin_sms" value="Y" type="checkbox">
														<span class="lbl"></span>
														<sup class="alert">*</sup>I accept to receive sms notifications & calls to the above specified mobile number.
														<!-- <span class="ta"> / இங்கு குறிப்பிட்டுள்ள கைபேசி எண்ணில் அறிவிப்பு குறுஞ்செய்திக மற்றும் அழைப்புகளை பெற ஒப்புதல் அளிக்கிறேன். </span> -->
													<!-- </p>										
												</div>
												<div>
													<p>
														<input id="optin_mail" class="ace" name="optin_mail" value="Y" type="checkbox">
														<span class="lbl"></span>
														<sup class="alert">*</sup>I accept to receive E-mail notifications (if provided).
														<!-- <span class="ta"> / மின்னஞ்சல் மூலம் அறிவிப்புகளை பெற ஒப்புதல் அளிக்கிறேன்.</span> -->
													<!-- </p>										
												</div> -->
	                                        </div> <!--panel-body-->
	                                    </div><!--#collapseSeven-->
	                                </div>	<!--panel-->  
							</div>	<!--panel-group-->
							<!--button-submit -->
		                      <div class="loginbox-submit">
		                      		<span class="edit_loader loader-dn"> </span>
                                  <input type="submit" class="btn btn-default btn-medium pull-right" value="Submit & Next">
                              </div>
						  </div> <!--row-form-->
				        <?php echo form_close(); ?>
					  </div>  <!--profile-edit-->
                </div><!--right panel BS outer div-->
                <?php
                else :
                ?>
            	<div class="text-center info"> Some Mandatory field(s) are empty </div>
            	<?php
                endif;
                ?>
            </div><!--dashboard BS outer div col-md-12-->
            </div><!--row-->
           </div> <!--dashboard container-->  
        </section><!--dashboard section-->
        <!--End of main Content--->
        <!---Brand Slider-->
        <?php
        if(!empty($provider_values)) :
        ?>
        <div class="brand-logo-area clients-bg">
            <div class="clients-list">
	            <?php
	            foreach ($provider_values as $val) :
	            if(!empty($val['organization_logo'])) :
				    $thumb_image = explode('.', end(explode('/',$val['organization_logo'])));
        			$thumb = $thumb_image[0]."_thumb.".$thumb_image[1];
   		        ?>
                <div class="client-logo">
                    <a href="<?php echo base_url()."user-followed-companies/".$val['organization_id']; ?>"><img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive" alt="Organization Logo" title="<?php echo $val['organization_name']; ?>" /></a>
                </div>
                <?php
                endif;
                endforeach;
                ?>
            </div>
        </div>
        <?php
        endif;
        ?>
<script>
	var departments_name_text = new Array("Select");
    var departments_name_value = new Array("");
    <?php
    if(!empty($department_values)) :
    foreach ($department_values as $dep_val) :
    ?>
      departments_name_text.push("<?php echo $dep_val['departments_name']; ?>");
      departments_name_value.push("<?php echo $dep_val['departments_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>
</script>               
        
<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>
<!--datepicker-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/zebra_datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
<?php include('include/footercustom.php'); ?>
 <script type="application/javascript">
 $(document).ready(function() {
 	$(".clients-list").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        loop: true,
        items: 6,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 4],
        itemsTabletSmall: false,
        itemsMobile: [479, 2],
    });
   	$('#candidate-form').bind('copy paste cut',function(e) { 
		e.preventDefault(); //disable cut,copy,paste
	});
});
/*Restrict over the year in datepicker End*/
$('.date_of_birth').Zebra_DatePicker({
  	format : 'd/m/Y',
    view: 'years',
    direction: false
});
$('.year_of_passing').Zebra_DatePicker({
 	format: 'Y'
});	 		
</script>
