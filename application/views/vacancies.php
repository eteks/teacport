<?php include('include/header.php'); ?><?php include('include/menus.php'); ?><section class="job-breadcrumb">    <div class="container">	   	<div class="row">    	    <div class="col-md-12 col-sm-12 co-xs-12 text-left">       			<div class="bread">                    <ol class="breadcrumb">                        <li><a href="<?php echo base_url() ?>">Home</a> </li>            	        <li class="active">Vacancies</li>                    </ol>                </div>            </div>        </div>    </div></section><?php // echo "<pre>";// print_r($search_results);// echo "</pre>";?><!--Advanced Search--><section id="vacancies_page" class="advance-search footer-grey-color">    <div class="container">        <div class="row">        	<div class="Heading-title black">                <h1>Vacancies</h1>               <p>Please find the list of vacancies for all institutions and posts.</p>            </div>            <div class="col-md-12 col-sm-12 col-xs-12 nopadding vacancy_search_section">            	<?php echo form_open('teachersvacancy','class="form-inline"'); ?>            		<div class="col-md-3 col-sm-3 col-xs-12 nopadding">                        <div class="form-group">                            <label>Keyword</label>	                        <input class="form-control" id="hook_name" name="search_keyword" placeholder="Organization Name or Job Title" type="text" value="<?php if(!empty($search_inputs['keyword'])) echo $search_inputs['keyword']; ?>">	                    </div>	                </div>                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding salary_width">	                    <div class="form-group">	                        <label>Salary</label>	                        <input class="form-control numeric_value" id="" name="search_min_amount" placeholder="Minimum Salary" type="text" maxlength="9" value="<?php if(!empty($search_inputs['min_amount'])) echo $search_inputs['min_amount']; ?>">	                		<!-- <select name="search_min_amount" class="select-category form-control">								<option value="">&nbsp;</option>								<option value="5000"> 5000 +</option>								<option value="10000"> 10000 + </option>								<option value="15000"> 15000 + </option>								<option value="20000"> 20000 + </option>								<option value="25000"> 25000 + </option>							</select> -->	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12 nopadding salary_width">	                    <div class="form-group">	                    	<label>Salary</label>	                        <input class="form-control numeric_value search_max_amount" maxlength="9" id="" name="search_max_amount" placeholder="Maximum Salary" type="text" value="<?php if(!empty($search_inputs['max_amount'])) echo $search_inputs['max_amount']; ?>">	                		<!-- <select name="search_max_amount" class="select-category form-control">								<option value="">&nbsp;</option>								<option value="25000"> 25000 +</option>								<option value="35000"> 35000 + </option>								<option value="55000"> 55000 + </option>								<option value="70000"> 70000 + </option>								<option value="100000"> 100000 + </option>							</select> -->	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                    <div class="form-group">	                        <label>Location </label>	                        <select name="search_location" class="select-location form-control">								<option value="">Job location</option>								<?php								if(!empty($alldistrict)) :								foreach ($alldistrict as $district) {									if(!empty($search_inputs['location']) && $search_inputs['location'] == $district['district_id']) {										echo '<option value="'.$district['district_id'].'" selected>'.$district['district_name'].'</option>';									}									else {										echo '<option value="'.$district['district_id'].'">'.$district['district_name'].'</option>';									}															}								endif;								?>							</select>       	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12 nopadding posting_section">	                    <div class="form-group">	                        <label>Category </label>	                        <select name="search_posting" class="select-category form-control">                                <option value="">&nbsp;</option>                                <?php                                if(!empty($applicable_postings)) :                                foreach ($applicable_postings as $post_val) {                                    if(!empty($search_inputs['posting']) && $search_inputs['posting'] == $post_val['posting_id']) {                                        echo '<option value="'.$post_val['posting_id'].'" selected>'.$post_val['posting_name'].'</option>';                                    }                                    else {                                        echo '<option value="'.$post_val['posting_id'].'">'.$post_val['posting_name'].'</option>';                                    }                                                           }                                endif;                                ?>                            </select>       	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12 nopadding institution_section">	                    <div class="form-group">	                        <label>Institution </label>	                        <select name="search_institution" class="select-institution form-control select_institution_event">                                <option value="">&nbsp;</option>                                <?php                                if(!empty($institution_values)) :                                foreach ($institution_values as $ins_val) {                                    if(!empty($search_inputs['institution']) && $search_inputs['institution'] == $ins_val['institution_type_id']) {                                        echo '<option value="'.$ins_val['institution_type_id'].'" selected>'.$ins_val['institution_type_name'].'</option>';                                    }                                    else {                                        echo '<option value="'.$ins_val['institution_type_id'].'">'.$ins_val['institution_type_name'].'</option>';                                    }                                                           }                                endif;                                ?>                            </select>       	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12 nopadding qualification_section">	                    <div class="form-group">	                        <label>Qualification </label>	                        <select name="search_qualification" class="select-qualification form-control">	                            <option value="">&nbsp;</option>	                            <?php	                            if(!empty($qualifications)) :	                            foreach ($qualifications as $qua_val) {	                                if(!empty($search_inputs['qualification']) && $search_inputs['qualification'] == $qua_val['educational_qualification_id']) 	                                {	                                    echo '<option value="'.$qua_val['educational_qualification_id'].'" selected>'.$qua_val['educational_qualification'].'</option>';	                                }	                                else {	                                    echo '<option value="'.$qua_val['educational_qualification_id'].'">'.$qua_val['educational_qualification'].'</option>';	                                }                           	                            }	                            endif;	                            ?>	                        </select>      	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                    <div class="form-group">	                        <label>Employment Type </label>	                       	<select class="form-control select-type" name="candidate_work_type">                                <option value="">Select Type</option>                                <option value="full" <?php echo (isset($search_inputs['candidate_work_type']) && $search_inputs['candidate_work_type']=="full" ? "selected" : ""); ?>>Full Time</option>                                <option value="part" <?php echo (isset($search_inputs['candidate_work_type']) && $search_inputs['candidate_work_type']=="part" ? "selected" : ""); ?>>Part Time</option>                            </select>     	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                    <div class="form-group">	                        <label>Experience </label>	                        <select name="search_exp" class="select-experience form-control">                                <option value="">&nbsp;</option>                                <option value="0" <?php if($search_inputs['experience']!='' && $search_inputs['experience'] == '0') echo "selected"; ?>>Fresher</option>                                <option value="1" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '1') echo "selected"; ?>>1 + Year</option>                                <option value="2" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '2') echo "selected"; ?>>2 + Year</option>                                <option value="3" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '3') echo "selected"; ?>>3 + Year</option>                                <option value="4" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '4') echo "selected"; ?>>4 + Year</option>                                <option value="">&nbsp;</option>                                <option value="5" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '5') echo "selected"; ?>>5 + Year</option>                                <option value="6" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '6') echo "selected"; ?>>6 + Year</option>                                <option value="7" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '7') echo "selected"; ?>>7 + Year</option>                                <option value="8" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '8') echo "selected"; ?>>8 + Year</option>                                <option value="9" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '9') echo "selected"; ?>>9 + Year</option>                                <option value="10" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '10') echo "selected"; ?>>10 + Year</option>                                <option value="11" <?php if(!empty($search_inputs['experience']) && $search_inputs['experience'] == '11') echo "selected"; ?>> Above 10 + year</option>                            </select>      	                    </div>	                </div>			        <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                    <div class="form-group form-action">	                        <button type="submit" class="btn btn-default btn-block srch_btn"><i class="fa fa-search"></i>Search Job</button>	                    </div>	                </div>	            <?php echo form_close(); ?>	        </div>	    </div>	</div></section><!--End of advanced Search-->     <section class="categories-list-page light-grey">    <div class="container">        <div class="row">	        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">	        	<?php                 if(!empty($search_results)) :				?>	            <div class="col-md-9 col-sm-12 col-xs-12">	                <h4 class="search-result-text"></h4>	            </div>                <div class="search-list" id="searchlist">					<?php	                foreach ($search_results as $sear_key => $sear_val) :	                ?>	            	<div class="col-md-12 col-sm-12 col-xs-12">	                	<div class="all-jobs-list-box2">                        	<div class="job-box job-box-2">                        		<div class="col-md-2 col-sm-2 col-xs-12 hidden-sm hidden-xs">                                	<div class="comp-logo">							            <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" target="_blank">							            	<?php	                                        if(!empty($sear_val['organization_logo'])) :	                                            $thumb_image = explode('.', end(explode('/',$sear_val['organization_logo'])));	                                            $thumb = $thumb_image[0]."_thumb.".$thumb_image[1];	                                        ?>	                                        <img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive" target="_blank" alt="Not Found">	                                        <?php	                                        else :	                                        ?>	                                        <img src="<?php echo base_url()."assets/images/institution.png"; ?>" class="img-responsive" target="_blank" alt="Not Found">	                                        <?php	                                        endif;                                        	?> 							            </a>							         </div>                            	</div>                            	<div class="col-md-8 col-sm-8 col-xs-12">                                	<div class="job-title-box">                                                               <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" target="_blank">                                            <div class="job-title"><?php echo $sear_val['vacancies_job_title']; ?></div>                                        </a>                                        <p class="org_name_search"> <?php echo $sear_val['organization_name']; ?> </p>                                   </div>                                	<p>                                		<?php echo substr($sear_val['vacancies_instruction'], 0, 100); ?>...                                		<a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" target="_blank">Read More</a>                                	</p>	                            </div>	                            <div class="col-md-2 col-sm-2 col-xs-12">		                            <div class="job-salary">		                                <div>		                                	<span class="dollar_sign"><i class="fa fa-inr" aria-hidden="true"></i></span>		                                	<?php echo $sear_val['vacancies_start_salary']. " To " . $sear_val['vacancies_end_salary']; ?>		                                </div>		                                <p> <i class="fa fa-clock-o"></i> <?php echo ($sear_val['vacancy_type'] == "full" ? "Full Time" : ($sear_val['vacancy_type'] == "part" ? "Part Time" : "Not Mentioned")); ?> </p>		                                <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" target="_blank"><span class="comp-name"><?php echo $sear_val['vacancies_available']; ?></span></a>	                                    <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" target="_blank" class="job-type jt-full-time-color">	                                	<?php echo ($sear_val['vacancies_available']>0?"Vacancies Available":"Vacancies Unvailable"); ?>	                                    </a>	                                    <!-- <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" class="mata-detail full-time">Full Time</a> -->		                                <!-- <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" class="mata-detail full-time">Part Time</a> -->		                            </div>		                        </div>               				</div>                        </div>                    </div>                    <?php         			endforeach;        			if(!empty($links)) :            			echo "<div class='col-md-12 col-sm-12 col-xs-12 nopadding'><div class='pagination-box clearfix'>" .$links . "</div></div>";        			endif;					?>				</div>				<?php      			else :					echo "<h1 class='text-center' style='color:#808080'>No jobs matched your specific search criteria.</h1>";    			endif;            	?>              	            </div>        </div>	</div></section><?phpif(!empty($provider_values)) :?><div class="brand-logo-area clients-bg">    <div class="clients-list">        <?php        foreach ($provider_values as $val) :        if(!empty($val['organization_logo'])) :        	$thumb_image = explode('.', end(explode('/',$val['organization_logo'])));            $thumb = $thumb_image[0]."_thumb.".$thumb_image[1];        ?>        <div class="client-logo">            <a href="<?php echo base_url()."user-followed-companies/".$val['organization_id']; ?>"><img src="<?php echo base_url().PROVIDER_UPLOAD.$thumb; ?>" class="img-responsive" alt="Organization Logo" title="<?php echo $val['organization_name']; ?>" /></a>        </div>		<?php        endif;        endforeach;        ?>    </div></div><?phpendif;?><?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?> <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script><?php include('include/footercustom.php'); ?> <script type="application/javascript"> $(document).ready(function() { 	$(".clients-list").owlCarousel({        autoPlay: true,        slideSpeed: 2000,        pagination: false,        navigation: false,        loop: true,        items: 6,        itemsDesktop: [1199, 4],        itemsDesktopSmall: [980, 3],        itemsTablet: [768, 4],        itemsTabletSmall: false,        itemsMobile: [479, 2],    }); }); </script>