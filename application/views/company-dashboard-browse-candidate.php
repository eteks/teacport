<?phpinclude ('include/header.php');include ('include/menus.php');?><section class="job-breadcrumb">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 co-xs-12 text-left">                <div class="bread">                    <ol class="breadcrumb">		                <li><a href="<?php echo base_url(); ?>">Home</a>                        </li>                        <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>                        </li>                        <li class="active">Browse Candidate</li>                    </ol>                </div>            </div>        </div>    </div></section><section class="dashboard-body">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                <div class="col-md-4 col-sm-4 col-xs-12">                    <div class="panel panel-border">                        <div class="dashboard-logo-sidebar center-block">                            <?php                            if(!empty($organization['organization_logo'])) :                                $thumb_image = explode('.', end(explode('/',$organization['organization_logo'])));                                $thumb = $thumb_image[0]."_thumb.".$thumb_image[1];                            ?>                            <img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive center-block" />                            <?php                            else :                            ?>                            <img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive center-block" />                            <?php                            endif;                            ?>                         </div>                        <div class="text-center dashboard-logo-sidebar-title">                            <h4><?php echo $organization['organization_name']; ?></h4>                        </div>                    </div>                    <!-- dashboard side bar  -->                    <?php					include ('include/company_dashboard_sidebar.php');					?>                </div>                <!--right panel-->                <div id="company-browse-candidate" class="col-md-8 col-sm-8 col-xs-12">	                <div class="heading-inner first-heading">	                    <p class="title">Browse Candidate</p>	                </div>	                <!-- Normal Search-->	                <?php echo form_open('provider/candidate'); ?>	                <?php                    if(!empty($search_mode) && $search_mode == "advanced") {                        $nor_search = "dn";                        $adv_search = '';                    }                    else {                        $nor_search = '';                        $adv_search = "dn";                    }                    ?>	                <div class="breadcrumb-search <?php echo $nor_search; ?>" id="normalsearch_act">	                    <div class="search-form-contaner">	                    	<?php echo form_open('provider/candidate'); ?>	                            <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                                <div class="form-group">	                                    <select class="form-control select-posting" name="candidate_posting_name">	                                        <option value="">Selece posting</option>                                   	                                        <?php	                                        if(!empty($posting)) :											foreach ($posting as $postings) {												if(!empty($search_inputs['candidate_posting_name']) && $search_inputs['candidate_posting_name'] == $postings['posting_id']) {													echo "<option value='" . $postings['posting_id'] . "' selected>" . $postings['posting_name'] . "</option>";												}												else {													echo "<option value='" . $postings['posting_id'] . "'>" . $postings['posting_name'] . "</option>";												}											}											endif;                                            ?>                                        </select>                                    </div>                                </div>                                <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                    <div class="form-group ">                                    	<input class="form-control numeric_value" name="candidate_min_amount" placeholder="Minimum Salary" maxlength="9" type="text" value="<?php if(!empty($search_inputs['candidate_min_amount'])) echo $search_inputs['candidate_min_amount']; ?>">                                     </div>                                </div>                                <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                	<div class="form-group">                                        <select class="form-control select-location" name="candidate_willing_district">                                        	<option value=""> Select </option>                                            <?php                                            if(!empty($district)) :											foreach ($district as $districts) {												if(!empty($search_inputs['candidate_willing_district']) && $search_inputs['candidate_willing_district'] == $districts['district_id']) {													echo "<option value='" . $districts['district_id'] . "' selected>" . $districts['district_name'] . "</option>";												}												else {													echo "<option value='" . $districts['district_id'] . "'>" . $districts['district_name'] . "</option>";												}											}											endif;                                            ?>                                        </select>                                    </div>                                </div>                                <input type="hidden" name="candidate_search_type" value="normal" />                                <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                    <div class="form-group form-action">                                        <button type="submit" class="btn btn-default">Search <i class="fa fa-angle-right"></i> </button>                                        <?php // if(empty($candidates)) echo "disabled"; ?>                                    </div>                                </div>                  		 	<?php echo form_close(); ?>                            <a id="btn_advanced_act" class="advanced_search"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Advanced Search </a>                        </div>                   	</div>                    	<!--End of Normal Search-->                  	<!--Advanced Search-->                    <div class="breadcrumb-search <?php echo $adv_search; ?>" id="advancedsearch_act">                        <div class="search-form-contaner form-inline">                        	<?php echo form_open('provider/candidate'); ?>                    			<input type="hidden" name="candidate_search_type" value="advanced" />                    			<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-posting" name="candidate_posting_name">	                                        <option value="">Selece posting</option>                                   	                                        <?php	                                        if(!empty($posting)) :											foreach ($posting as $postings) {												if(!empty($search_inputs['candidate_posting_name']) && $search_inputs['candidate_posting_name'] == $postings['posting_id']) {													echo "<option value='" . $postings['posting_id'] . "' selected>" . $postings['posting_name'] . "</option>";												}												else {													echo "<option value='" . $postings['posting_id'] . "'>" . $postings['posting_name'] . "</option>";												}											}											endif;                                            ?>                                        </select>                                    </div>                                </div>                                     <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                    	<input class="form-control numeric_value" name="candidate_min_amount" placeholder="Mimimum Salary" maxlength="9" type="text" value="<?php if(!empty($search_inputs['candidate_min_amount'])) echo $search_inputs['candidate_min_amount']; ?>"> 	    	                        </div>    	                       	</div>    	                       	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                    	<input class="form-control numeric_value" name="candidate_max_amount" placeholder="Maximum Salary" maxlength="9" type="text" value="<?php if(!empty($search_inputs['candidate_max_amount'])) echo $search_inputs['candidate_max_amount']; ?>"> 	    	                        </div>    	                       	</div>                            	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                    	<select class="form-control select-location" name="candidate_willing_district">                                        	<option value=""> Select </option>                                            <?php                                            if(!empty($district)) :											foreach ($district as $districts) {												if(!empty($search_inputs['candidate_willing_district']) && $search_inputs['candidate_willing_district'] == $districts['district_id']) {													echo "<option value='" . $districts['district_id'] . "' selected>" . $districts['district_name'] . "</option>";												}												else {													echo "<option value='" . $districts['district_id'] . "'>" . $districts['district_name'] . "</option>";												}											}											endif;                                            ?>                                        </select>	    	                        </div>    	                       	</div>    	                       	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-tet" name="candidate_tet_status">                                        	<option value="">TET status</option>                                           	<option value="1" <?php if(!empty($search_inputs['candidate_tet_status']) && $search_inputs['candidate_tet_status']==1) echo "selected"; ?>>Attended</option>		                                   	<option value="0" <?php if(isset($search_inputs['candidate_tet_status']) && $search_inputs['candidate_tet_status']!='' && $search_inputs['candidate_tet_status']==0) echo "selected"; ?>>Did Not Attend</option>                                        </select>                                    </div>                             	</div>                                    <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-set" name="candidate_set_status">                                            <option value="">SET status</option>                                            <option value="1" <?php if(!empty($search_inputs['candidate_set_status']) && $search_inputs['candidate_set_status']==1) echo "selected"; ?>>Attended</option>                                            <option value="0" <?php if(isset($search_inputs['candidate_set_status']) && $search_inputs['candidate_set_status']!='' && $search_inputs['candidate_set_status']==0) echo "selected"; ?>>Did Not Attend</option>                                        </select>                                    </div>                                </div>                                    <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-net" name="candidate_net_status">                                            <option value="">NET status</option>                                            <option value="1" <?php if(!empty($search_inputs['candidate_net_status']) && $search_inputs['candidate_net_status']==1) echo "selected"; ?>>Attended</option>                                            <option value="0" <?php if(isset($search_inputs['candidate_net_status']) && $search_inputs['candidate_net_status']!='' &&  $search_inputs['candidate_net_status']==0) echo "selected"; ?>>Did Not Attend</option>                                        </select>                                    </div>                                </div>                             	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-classlevel" name="candidate_class">                                        	<option value="">Class</option>                                           	<?php                                           	if(!empty($class_level)) :											foreach ($class_level as $cls_val) {												if(!empty($search_inputs['candidate_class']) && $search_inputs['candidate_class'] == $cls_val['class_level_id']) {													echo "<option value='" . $cls_val['class_level_id'] . "' selected>" . ucfirst($cls_val['class_level']) . "</option>";												}												else {													echo "<option value='" . $cls_val['class_level_id'] . "'>" . ucfirst($cls_val['class_level']) . "</option>";												}											}											endif;											?>		                                </select>                                    </div>                             	</div>                             	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-subject" name="candidate_subject">                                        	<option value="">Subject</option>                                           	<?php                                           	if(!empty($subject)) :											foreach ($subject as $subjects) {												if(!empty($search_inputs['candidate_subject']) && $search_inputs['candidate_subject'] == $subjects['subject_id']) {													echo "<option value='" . $subjects['subject_id'] . "' selected>" . ucfirst($subjects['subject_name']) . "</option>";												}												else {													echo "<option value='" . $subjects['subject_id'] . "'>" . ucfirst($subjects['subject_name']) . "</option>";												}											}											endif;											?>		                                </select>                                    </div>                             	</div>                             	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-qualification" name="candidate_qualification">                                        	<option value="">Qualification</option>                                           	<?php                                           	if(!empty($qualification)) :											foreach ($qualification as $qualifications) {												if(!empty($search_inputs['candidate_qualification']) && $search_inputs['candidate_qualification'] == $qualifications['educational_qualification_id']) {													echo "<option value='" . $qualifications['educational_qualification_id'] . "' selected>" . ucfirst($qualifications['educational_qualification']) . "</option>";												}												else {													echo "<option value='" . $qualifications['educational_qualification_id'] . "'>" . ucfirst($qualifications['educational_qualification']) . "</option>";												}											}											endif;											?>		                                </select>                                    </div>                             	</div>                                <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-type" name="candidate_work_type">                                            <option value="">Select Type</option>                                            <option value="full" <?php echo (isset($search_inputs['candidate_work_type']) && $search_inputs['candidate_work_type']=="full" ? "selected" : ""); ?>>Full Time</option>                                            <option value="part" <?php echo (isset($search_inputs['candidate_work_type']) && $search_inputs['candidate_work_type']=="part" ? "selected" : ""); ?>>Part Time</option>                                        </select>                                    </div>                                </div>                                <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">                                    <div class="form-group">                                        <select class="form-control select-experience" name="candidate_experience">											<option value="">Select</option>											<option value="0" <?php if(isset($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] != '' && $search_inputs['candidate_experience'] == 0) echo "selected"; ?>>Fresher</option>                                            <option value="1" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '1') echo "selected"; ?>>1 + Year</option>                                            <option value="2" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '2') echo "selected"; ?>>2 + Year</option>                                            <option value="3" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '3') echo "selected"; ?>>3 + Year</option>                                            <option value="4" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '4') echo "selected"; ?>>4 + Year</option>                                            <option value="">&nbsp;</option>                                            <option value="5" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '5') echo "selected"; ?>>5 + Year</option>                                            <option value="6" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '6') echo "selected"; ?>>6 + Year</option>                                            <option value="7" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '7') echo "selected"; ?>>7 + Year</option>                                            <option value="8" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '8') echo "selected"; ?>>8 + Year</option>                                            <option value="9" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '9') echo "selected"; ?>>9 + Year</option>                                            <option value="10" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '10') echo "selected"; ?>>10 + Year</option>                                            <option value="11" <?php if(!empty($search_inputs['candidate_experience']) && $search_inputs['candidate_experience'] == '11') echo "selected"; ?>> Above 10 + year</option>		                                </select>                                    </div>                                </div> 								<div id="btn_normal_act" class="col-md-3 col-sm-3 col-xs-12 nopadding pull-left">	                            	<a type="button" class="advanced_search"> Normal Search <i class="fa fa-hand-o-left" aria-hidden="true"></i></a>	                            </div> 	                            <div class="clearfix"> </div>                                <div class="col-md-3 col-sm-3 col-xs-12 nopadding pull-right">	                                <button type="submit" class="btn btn-default advance_search_btn">Search <i class="fa fa-angle-right"></i> </button>	                                <?php // if(empty($candidates)) echo "disabled"; ?>                                </div>                            		<div class="clearfix"> </div>                           	<?php echo form_close(); ?>                   	  	</div>                   	</div>                   	<!--End of Advanced Search-->                    <div id="dashboard-jobs-grid" class="all-jobs-list-box2">                            	<?php                             	if(!empty($candidates)){                        		foreach ($candidates as $candidate) {                         		?>                                <div class="job-box job-box-2">                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">                                        <div class="comp-logo">                                            <?php                                             if(!empty($candidate['candidate_image_path'])) :                                                $keyword = "uploads";                                                // To check whether the image path is cdn or local path                                                if(strpos( $candidate['candidate_image_path'] , $keyword ) !== false) {                                                    $thumb_image = explode('.', end(explode('/',$candidate['candidate_image_path'])));                                                    $thumb = base_url().SEEKER_UPLOAD."pictures/".$thumb_image[0]."_thumb.".$thumb_image[1];                                                }                                                else {                                                    $thumb = $candidate['candidate_image_path'];                                                }                                                                   ?>                                            <img class="img-responsive center-block" src="<?php echo $thumb; ?>" alt="user-img" />                                            <?php                                            else :                                            ?>                                            <img class="img-responsive center-block" src="<?php echo base_url().'assets/images/admin.jpg' ;?>" alt="user-img" />                                            <?php                                            endif;                                            ?>                                          </div>                                    </div>                                    <div class="col-md-10 col-sm-10 col-xs-12">                                        <div class="job-title-box">                                            <a>                                                <div class="job-title"> <?php echo $candidate['candidate_name'] ?></div>                                            </a>                                            <a>                                                <span class="comp-name">                                                    <?php echo date_diff(date_create($candidate['candidate_date_of_birth']), date_create('today'))->y; ?> years ago,                                                     <?php echo " ".ucfirst($candidate['candidate_gender']); ?>,                                                     <?php echo ucfirst($candidate['educational_qualification']); ?>                                                 </span>                                            </a>                                        </div>                                        <p>Hi,  my native is <?php echo $candidate['district_name']; ?>.                                          <?php //echo $candidate['subject_name']; ?>                                         <!-- is the area where I am fascinated with.  -->                                        <?php echo $candidate['experience']>0?'I encompass '.$candidate['experience'].' years of experience.':'I am a fresher.'; ?> And my matrimonial status is <?php echo $candidate['candidate_marital_status']; ?>........<a>Read More</a> </p>                                    </div>                                    <div class="job-salary">                                        &#8377;<?php echo $candidate['candidate_expecting_start_salary']; ?> - &#8377;<?php echo $candidate['candidate_expecting_end_salary']; ?>                                        <p> <i class="fa fa-clock-o"></i> <?php echo ($candidate['candidate_type'] == "full" ? "Full Time" : ($candidate['candidate_type'] == "part" ? "Part Time" : "Not Mentioned")); ?> </p>                                    </div>                                    <a href="<?php echo base_url(); ?>provider/candidateprofile/<?php echo $candidate['candidate_id']; ?>" target="_blank">	                                	<span class="dashboard-jobs-grid-link"> </span>	                                </a>                                </div>                               <?php }} else { ?>                               	<h2>No candidate now! Please check it again later!!</h2>                               <?php } ?>                            </div>                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                <div class="pagination-box clearfix">                                    <ul class="pagination">                                        <?php foreach ($links as $link) {											echo "<li>". $link."</li>";										} ?>                                    </ul>                                </div>                            </div>                        </div> <!--End of right panel-->                   </div>                </div>            </div>        </section><?php	include ('include/footermenu.php');	include ('include/footer.php');?><?php include('include/footercustom.php'); ?>