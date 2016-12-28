<?php include('include/header.php'); ?><?php include('include/menus.php'); ?><section class="job-breadcrumb">    <div class="container">	   	<div class="row">    	    <div class="col-md-6 col-sm-7 co-xs-12 text-left">       			<h3>Vacancies</h3>            </div>            <div class="col-md-6 col-sm-5 co-xs-12 text-right">                <div class="bread">                    <ol class="breadcrumb">                        <li><a href="<?php echo base_url() ?>">Home</a> </li>            	        <li class="active">Vacancies</li>                    </ol>                </div>            </div>        </div>    </div></section><?php // echo "<pre>";// print_r($search_results);// echo "</pre>";?><!--Advanced Search--><section class="advance-search light-blue">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">            	<?php echo form_open('vacancies','class="form-inline"'); ?>                    <div class="col-md-3 col-sm-3 col-xs-12">                        <div class="form-group">                            <label>Enter Keyword</label>	                        <input class="form-control" id="hook_name" name="search_keyword" placeholder="Organization Name or Job Title" type="text" value="<?php if(!empty($search_inputs['keyword'])) echo $search_inputs['keyword']; ?>">	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12">	                    <div class="form-group">	                        <label>Enter Minimum Salary</label>	                        <input class="form-control" id="" name="search_min_amount" placeholder="Mimimum Salary" type="text" value="<?php if(!empty($search_inputs['min_amount'])) echo $search_inputs['min_amount']; ?>">	                		<!-- <select name="search_min_amount" class="select-category form-control">								<option value="">&nbsp;</option>								<option value="5000"> 5000 +</option>								<option value="10000"> 10000 + </option>								<option value="15000"> 15000 + </option>								<option value="20000"> 20000 + </option>								<option value="25000"> 25000 + </option>							</select> -->	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12">	                    <div class="form-group">	                        <label>Enter Maximum Salary</label>	                        <input class="form-control" id="" name="search_max_amount" placeholder="Maximum Salary" type="text" value="<?php if(!empty($search_inputs['max_amount'])) echo $search_inputs['max_amount']; ?>">	                		<!-- <select name="search_max_amount" class="select-category form-control">								<option value="">&nbsp;</option>								<option value="25000"> 25000 +</option>								<option value="35000"> 35000 + </option>								<option value="55000"> 55000 + </option>								<option value="70000"> 70000 + </option>								<option value="100000"> 100000 + </option>							</select> -->	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12">	                    <div class="form-group">	                        <label> Select Location </label>	                        <select name="search_location" class="select-location form-control">								<option value="">Job location</option>								<?php								if(!empty($alldistrict)) :								foreach ($alldistrict as $district) {									if(!empty($search_inputs['location']) && $search_inputs['location'] == $district['district_id']) {										echo '<option value="'.$district['district_id'].'" selected>'.$district['district_name'].'</option>';									}									else {										echo '<option value="'.$district['district_id'].'">'.$district['district_name'].'</option>';									}															}								endif;								?>							</select>       	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12">	                    <div class="form-group">	                        <label> Select Experience </label>	                        <select name="search_exp" class="select-experience form-control">								<option value="">&nbsp;</option>								<option value="1" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '1')) echo "selected"; ?>>1 + Year</option>								<option value="2" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '2')) echo "selected"; ?>>2 + Year</option>								<option value="3" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '3')) echo "selected"; ?>>3 + Year</option>								<option value="4" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '4')) echo "selected"; ?>>4 + Year</option>								<option value="">&nbsp;</option>								<option value="5" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '5')) echo "selected"; ?>>5 + Year</option>								<option value="6" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '6')) echo "selected"; ?>>6 + Year</option>								<option value="7" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '7')) echo "selected"; ?>>7 + Year</option>								<option value="8" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '8')) echo "selected"; ?>>8 + Year</option>								<option value="9" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '9')) echo "selected"; ?>>9 + Year</option>								<option value="10" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '10')) echo "selected"; ?>>10 + Year</option>								<option value="11" <?php if(!empty($search_inputs['experience'] && $search_inputs['experience'] == '11')) echo "selected"; ?>> Above 10 + year</option>							</select>        	                    </div>	                </div>	                <div class="col-md-3 col-sm-3 col-xs-12">	                    <div class="form-group form-action">	                        <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i>Search Job</button>	                    </div>	                </div>	            <?php echo form_close(); ?>	        </div>	    </div>	</div></section><!--End of advanced Search-->     <section class="categories-list-page light-grey">    <div class="container">        <div class="row">	        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">	            <div class="col-md-9 col-sm-12 col-xs-12">	                <h4 class="search-result-text"></h4>	            </div>                <div class="search-list" id="searchlist">                	<?php 	                if(!empty($search_results)) :	                foreach ($search_results as $sear_key => $sear_val) :	                ?>	            	<div class="col-md-12 col-sm-12 col-xs-12">	                	<div class="all-jobs-list-box2">                        	<div class="job-box job-box-2">                        		<div class="col-md-2 col-sm-2 col-xs-12 hidden-sm hidden-xs">                                	<div class="comp-logo">							            <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>"><img src="<?php echo base_url().$sear_val['organization_logo']; ?>" class="img-responsive" alt="Provider logo"> </a>                            		</div>                            	</div>                            	<div class="col-md-10 col-sm-10 col-xs-12">                                	<div class="job-title-box">                                                               <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>">                                            <div class="job-title"><?php echo $sear_val['vacancies_job_title']; ?></div>                                        </a>                                        <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>"><span class="comp-name"><?php echo $sear_val['vacancies_available']; ?></span></a>                                        <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>" class="job-type jt-full-time-color">                                        	<?php                                        	if($sear_val['vacancies_available'] == 0) :                                        		echo "Vacncies Unavailable";                                        	else :                                        		echo "Vacncies Available";                                        	endif;                                        	?>                                        </a>                                	</div>                                	<p>                                		<?php echo substr($sear_val['vacancies_instruction'], 0, 100); ?>...                                		<a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $sear_val['vacancies_id'];?>">Read More</a>                                	</p>	                            </div>	                            <div class="job-salary">	                                 &#8377; <?php echo $sear_val['vacancies_start_salary']. " To " . $sear_val['vacancies_end_salary']; ?>	                                <p class="org_name_search"> <?php echo $sear_val['organization_name']; ?> </p>	                            </div>            				</div>                        </div>                    </div>                    <?php         			endforeach;        			if(!empty($links)) :            			echo "<div class='col-md-12 col-sm-12 col-xs-12 nopadding'><div class='pagination-box clearfix'>" .$links . "</div></div>";        			endif;          			else :						echo "<h2>Sorry, no more vacancy not available.</h2>";        			endif;                	?>              	</div>            </div>        </div>	</div></section><?phpif(!empty($provider_values)) :?><div class="brand-logo-area clients-bg">    <div class="clients-list">        <?php        foreach ($provider_values as $val) :        if(!empty($val['organization_logo'])) :        ?>        <div class="client-logo">            <a href="#"><img src="<?php echo base_url().$val['organization_logo']; ?>" class="img-responsive" alt="Organization Logo" title="<?php echo $val['organization_name']; ?>" /></a>        </div>        <?php        endif;        endforeach;        ?>    </div></div><?phpendif;?><?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?>

