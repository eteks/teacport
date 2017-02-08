<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
<section class="job-breadcrumb">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url();?>">Home</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>
                        </li>
                        <li class="active">Subscribe Plan</li>
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
                <div class="col-md-8 col-sm-8 col-xs-12">
                	<div class="heading-inner first-heading">
                        <p class="title">Choose Your Plan</p>
                    </div>
                    <p class="success_server_msg"><?php if(isset($subscription_server_msg)) echo $subscription_server_msg; ?><?php if($this->session->userdata('subscription_server_msg')!=''){ echo $this->session->userdata('subscription_server_msg');$this->session->unset_userdata('subscription_server_msg');} ?></p>
                    <?php 
                    if(!empty($subscription_upgrade_plan)) :
                	?>
                    <div class="subscription">
                        <!--Select Pricing Plan-->
                    	<div class="form-group">
							<label class="col-sm-3 nopadding" for="subpack">Select Subscription : </label>
							<div class="col-sm-6">
								<?php echo form_open('provider/subscription','id="provider_subscription_plan_form"'); ?>
								<select id="subpack_act" class="form-control select-plan" name="subpack">
									<option value=""> Select Package </option>
									<?php 
									foreach ($subscription_upgrade_plan as $sub_val) {
										if(!empty($chosen_plan) && $chosen_plan==$sub_val['sub_id']) {
											echo "<option class='subplan_act' value=".$sub_val['sub_id']." data-name=".$sub_val['subscription_plan']." data-amount=".$sub_val['subscription_price']." selected>".$sub_val['subscription_plan']." Membership plan @ ".$sub_val['subscription_validity_days']." days Rs. ".$sub_val['subscription_price']." </option>";
										}
										else if(isset($organization_chosen_plan['subscription_id']) && !empty($organization_chosen_plan['subscription_id']) && $sub_val['sub_id'] == $organization_chosen_plan['subscription_id'] && $chosen_plan=='') {
												echo "<option class='subplan_act' value=".$sub_val['sub_id']." data-name=".$sub_val['subscription_plan']." data-amount=".$sub_val['subscription_price']." selected>".$sub_val['subscription_plan']." Membership plan @ ".$sub_val['subscription_validity_days']." days Rs. ".$sub_val['subscription_price']." </option>";
										}
										else if(isset($_GET['reason']) && $_GET['reason']=='plan_selection' && $_GET['planid']==$sub_val['sub_id']){
												echo "<option class='subplan_act' value=".$sub_val['sub_id']." data-name=".$sub_val['subscription_plan']." data-amount=".$sub_val['subscription_price']." selected>".$sub_val['subscription_plan']." Membership plan @ ".$sub_val['subscription_validity_days']." days Rs. ".$sub_val['subscription_price']." </option>";
										}
										else if($sub_val['subscription_status'] == 1){
											echo "<option class='subplan_act' value='".$sub_val['sub_id']."' data-name='".$sub_val['subscription_plan']."' data-amount='".$sub_val['subscription_price']."'>".$sub_val['subscription_plan']." Membership plan @ ".$sub_val['subscription_validity_days']." days Rs. ".$sub_val['subscription_price']." </option>";
										}
									} 
									?>
								</select>
								<p>
									
								</p> 
								<button type='submit' class="btn btn-default payu_submit pull-right" style="margin-top: 20px !important;"> Proceed to choose </button>
								<?php echo form_close(); ?>
							</div>
							<div class="col-sm-3 nopadding">
								<?php 
		                    	echo form_open('provider/payment','id="provider_subscription_form"');
								echo form_input(array('name' => 'firstname', 'type'=>'hidden', 'id' =>'payu_firstname','value'=>(isset($organization['registrant_name']) && !empty($organization['registrant_name']))?$organization['registrant_name'] : $organization['organization_name']));
								echo form_input(array('name' => 'email', 'type'=>'hidden', 'id' =>'payu_email','value'=>$organization['registrant_email_id']));
								echo form_input(array('name' => 'phone', 'type'=>'hidden', 'id' =>'payu_phone','value'=>$organization['registrant_mobile_no']));
								echo form_input(array('name' => 'amount', 'type'=>'hidden', 'id' =>'payu_amount','value'=>''));
								echo form_input(array('name' => 'productinfo', 'type'=>'hidden', 'id' =>'payu_plan','value'=>''));
								echo form_input(array('name' => 'address1', 'type'=>'hidden', 'id' =>'payu_addr1','value'=>$organization['organization_address_1']));
								echo form_input(array('name' => 'address2', 'type'=>'hidden', 'id' =>'payu_addr2','value'=>$organization['organization_address_2']));
								echo form_input(array('name' => 'city', 'type'=>'hidden', 'id' =>'payu_city','value'=>$organization['district_name']));
								echo form_input(array('name' => 'state', 'type'=>'hidden', 'id' =>'payu_state','value'=>$organization['state_name']));
								echo form_input(array('name' => 'country', 'type'=>'hidden', 'id' =>'payu_country','value'=>'india'));
								echo form_input(array('name' => 'udf1', 'type'=>'hidden', 'id' =>'payu_userid','value'=>$this->session->userdata('login_session')['pro_userid']));
								echo form_input(array('name' => 'udf2', 'type'=>'hidden', 'id' =>'payu_planid','value'=>'""'));
								echo form_input(array('name' => 'udf5', 'type'=>'hidden', 'id' =>'payu_csrf','value'=>$this->security->get_csrf_hash()));
								echo form_input(array('name' => 'plan_option', 'type'=>'hidden', 'id' =>'plan_option','value'=>''));
								echo form_input(array('name' => 'sms_count', 'type'=>'hidden', 'id' =>'plan_sms','value'=>''));
								echo form_input(array('name' => 'email_count', 'type'=>'hidden', 'id' =>'plan_email','value'=>''));
								echo form_input(array('name' => 'resume_count', 'type'=>'hidden', 'id' =>'plan_resume','value'=>''));
	                    		?>
	                    		<!-- <button type='submit' class="btn btn-default payu_submit pull-right" style="margin: 0px !important;"> Proceed to pay </button> -->
		                    	<?php echo form_close(); ?>
								<a href="<?php echo base_url(); ?>pricing" target="_blank" class="txt_blue pull-right margin_10">View Details &amp; Features</a>
					     	</div>
					    </div>
						<!--End Select Pricing Plan-->
                                
                        <!--Display Chosen Plan-->
                        <!-- <div class="pricing-section-1 subscription_plan_description">
                    		<!-- Basic Plan -->
                        	<?php 
                    		// foreach ($subcription_plan as $plan) {
                        	?>
                    		<!-- <div id="<?php // echo $plan['subscription_plan'];?>" class="col-md-12 col-sm-12 col-xs-12 light-grey dn subscription_plan">
                        		<div class="heading-inner">
                            		<span class="info"><i class="fa fa-info-circle" aria-hidden="true"></i> You have selected <?php // echo $plan['subscription_plan'];?> plan</span>
                        		</div>
	                            <div class="ui_box">
	                                <div class="ui_box__inner">
	                                    <h2> <?php // echo $plan['subscription_plan'];?> Plan </h2>
	                                    <div class="price-rates"><i class="fa fa-inr" aria-hidden="true"></i> <?php // echo $plan['subscription_price']; ?> <small>for <?php // echo floor(($datediff / (60 * 60 * 24))+1);?> days</small> 
	                                    </div>
	                                    <div class="features_left">
	                                        <ul>
	                                        	<?php
	                                        	// $planfeatures = // explode(',', $plan['subscription_features']);
												// foreach ($planfeatures as $features) {
												?>
	                                            <li> <?php // echo ucfirst($features); ?> </li>
	                                            <?php // } ?>
	                                        </ul>
	                                    </div>
	                                </div>
	                            </div>
                        	</div>
	                        <?php // } ?>
	                    </div>  -->
	                </div>  
                    <?php
                    else :
                    ?>
			            <div class="subscription"><h2>No subscription plan available!</h2></div>
			        <?php
			        endif;
			        ?>
					<div class="col-sm-6 dn">
	                 	<button class="btn" data-toggle="modal" data-target="#plandetail_act"  data-backdrop="static" data-keyboard="false"> View Plan Details </button>
	                </div>	
	               	<!-- Pricing Table -->  
					<!--Pricing-->
					<?php 
                    if((!empty($subscription_upgrade_plan) && !empty($organization_chosen_plan)) || (!empty($subscription_upgrade_plan) && !empty($chosen_plan))) :
                    	$current = 0;
						// If the user already subscripe display current plan or not
		                $key = trim((isset($organization_chosen_plan['subscription_id']) && !empty($organization_chosen_plan['subscription_id']))?array_search($organization_chosen_plan['subscription_id'], array_column($subscription_upgrade_plan, 'sub_id')):'');
		                $original = $key;
		            	if((!empty($organization_chosen_plan['subscription_id']) && trim($chosen_plan) == $organization_chosen_plan['subscription_id']) || (trim($chosen_plan) == '' && $key!='')){
		            		$current = 1;
		            	}
		            	else {
		            		$key = trim((isset($chosen_plan) && !empty($chosen_plan))?array_search($chosen_plan, array_column($subscription_upgrade_plan, 'sub_id')):'');
		            	}
                	?>
			        <div class="subscribe">				           
		                <div class="row">
		                    <div class="col-md-12 col-sm-12 col-xs-12">			                    	
								<div class="col-md-4 col-sm-6 col-xs-12 plan_selection">
		                        	<div class="price_ui_box subscribe_plan">
			                            <div class="single-price even" id="featured-price">
			                                <div class="price-header text-center">
			                                    <p class="plan-title"><strong><?php echo $subscription_upgrade_plan[$key]['subscription_plan']; ?></strong></p>
			                                </div>
			                                <div class="plan-price text-center">
			                                    <h4><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $subscription_upgrade_plan[$key]['subscription_price']; ?>
			                                    <input type="hidden" class="price_hidden" value="<?php echo $subscription_upgrade_plan[$key]['subscription_price']; ?>" />
			                                    </h4>
			                                </div>
			                                <?php
			                                if($current == 1) {
			                                ?>
                            				<div class="price-days text-center">
                                				<strong>  
	                                				<?php 	
	                                				$start_date = date_create($organization_chosen_plan['org_sub_validity_end_date']);
	                                   				$days = date_diff(date_create(date('Y-m-d')),$start_date);
	                                				if($days->invert == 0 && $days->days > 1) {
	                                					echo "Remaining ".$days->days." days";
	                                				}
	                                				else if($days->invert == 0 && $days->days == 1){
														echo "Remaining ".$days->days." day";
	                                				}
	                                				else if($days->invert == 0 && $days->days == 0){
														echo "Last day";
	                                				}
	                                				else {
	                                					echo "Expired";
	                                				}
	                                				?>
                                				</strong>
                            				</div>
                                			<?php
                                            }
                                            else {
                                            ?>
                                            <div class="price-days text-center"><strong> For Next <?php echo $subscription_upgrade_plan[$key]['subscription_validity_days']; ?> days</strong></div>
                                            <?php
                                            }
                                            ?>
                                            <div class="price-features text-center">
			                                    <ul class="subs_count_act">
													<li>Max No of vacancy Posts: 
														<?php echo $current ==1 ?$organization_chosen_plan['organization_vacancy_remaining_count'] :$subscription_upgrade_plan[$key]['subscription_max_no_of_posts']; ?>
													</li>
													<li>Sms Counts: 
														<?php echo $current ==1 ?$organization_chosen_plan['organization_sms_remaining_count'] :$subscription_upgrade_plan[$key]['subcription_sms_counts']; ?>
													</li> 
													<li>Email-count: 
														<?php echo $current ==1 ?$organization_chosen_plan['organization_email_remaining_count'] :$subscription_upgrade_plan[$key]['subscription_email_counts']; ?>
													</li> 
													<li>Resume Download: 
														<?php echo $current ==1 ?$organization_chosen_plan['organization_remaining_resume_download_count'] :$subscription_upgrade_plan[$key]['subcription_resume_download_count']; ?>
													</li>
													<li>Max No of ads: 
														<?php echo $current ==1 ?$organization_chosen_plan['organization_ad_remaining_count'] :$subscription_upgrade_plan[$key]['subscription_max_no_of_ads']; ?>
													</li>
												</ul>
			                                </div>
		                            	</div>
		                        	</div>
		                        	<div class="make_payment_option"> <a class="subs_button prem_select <?php if($original !='') echo "disabled"; ?>" data-option="original" data-id="<?php echo $subscription_upgrade_plan[$key]['sub_id']; ?>" >Make Payment</a> </div>
		                        </div> 
		                        <div class="col-md-4 col-sm-6 col-xs-12 plan_selection <?php if($current == 1 && $organization_chosen_plan['status'] == 1) echo "active"; ?>">
		                        	<div class="price_ui_box subscribe_plan">
			                            <div class="single-price odd" id="featured-price">
			                                <div class="price-header text-center">
			                                    <p class="plan-title"><strong>Upgrade Plan</strong></p>
			                                </div>
			                                <div class="plan-price text-center">
			                                    <h4><span><i class="fa fa-inr" aria-hidden="true"></i></span><span id="upgrade_total_price" type="text"> 0 </span>
			                                    <input type="hidden" class="price_hidden" value="2.00" /></h4>
			                                </div>
			                                <?php
			                                $renewal = 0;
			                                $upgrade_disable = 0;
			                                if($current == 1) {
			                                ?>
                            				<div class="price-days text-center">
                                				<strong>  
	                                				<?php 	
	                                				$start_date = date_create($organization_chosen_plan['org_sub_validity_end_date']);
	                                   				$days = date_diff(date_create('today'),$start_date);

	                                				if($days->invert == 0 && $days->days > 1) {
	                                					echo "For Next ".$days->days." days";
	                                				}
	                                				else if($days->invert == 0 && $days->days == 1){
														echo "For Next ".$days->days." day";
	                                				}
	                                				else if($days->invert == 0 && $days->days == 0){
	                                					$renewal = 1;
														echo "Last day";
	                                				}
	                                				else {
	                                					$renewal = 1;
	                                					$upgrade_disable = 1;
	                                					echo "Expired";
	                                				}
	                                				?>
                                				</strong>
                            				</div>
                                			<?php
                                            }
                                            else {
                                            ?>
                                            <div class="price-days text-center"><strong> For Next <?php echo $subscription_upgrade_plan[$key]['subscription_validity_days']; ?> days</strong></div>
                                            <?php
                                            }
                                            ?>
			                                <div class="cost_plan">
                                            <?php
                                            $available = 0;
	                                        if(!empty($subscription_upgrade_plan[$key]['upgrade_options'])) :
                                            foreach ($subscription_upgrade_plan[$key]['upgrade_options'] as $up_key => $val) :
                                            ?>
			                                	<?php
			                                	if(!empty($val['upgrade_id']) && $val['upgrade_status']==1) {
			                                	$available = 1;
			                                	?>
			                                	<?php
			                                	if($val['upgrade_options'] == "sms") {
			                                	?>
			                                	<div class="sms_icon icon_box_common" data-toggle="sms_icon_tooltip" title="Cost Per SMS"><i class="glyphicon glyphicon-comment"></i> : <i class="fa fa-inr" aria-hidden="true"></i><span id="cost_per_sms" data-minvalue="<?php echo $val['upgrade_min_allowed']; ?>" data-maxvalue="<?php echo $val['upgrade_max_allowed']; ?>"><?php echo $val['upgrade_price']; ?></span></div> 
			                                	<?php
			                                	}
			                                	else if ($val['upgrade_options'] == "email") {
			                                	?>
			                                	<div class="email_icon icon_box_common" data-toggle="email_icon_tooltip" title="Cost per Email"> <i class="glyphicon glyphicon-envelope"></i> : <i class="fa fa-inr" aria-hidden="true"></i><span id="cost_per_email" data-minvalue="<?php echo $val['upgrade_min_allowed']; ?>" data-maxvalue="<?php echo $val['upgrade_max_allowed']; ?>"><?php echo $val['upgrade_price']; ?></span></br></div>
			                                	<?php
			                                	}
			                                	else if ($val['upgrade_options'] == "resume") {
			                                	?>
			                                	<div class="resume_icon icon_box_common" data-toggle="resume_icon_tooltip" title="Cost per Resume Download"> <i class="glyphicon glyphicon-cloud-download"></i> : <i class="fa fa-inr" aria-hidden="true"></i><span id="cost_per_resume" data-minvalue="<?php echo $val['upgrade_min_allowed']; ?>" data-maxvalue="<?php echo $val['upgrade_max_allowed']; ?>"><?php echo $val['upgrade_price']; ?></span></div>

			                                	<?php
			                                	}	
			                                	?>
			                                	<?php
			                                	}
			                                	?>
			                                <?php
			                                endforeach;
			                                endif;
			                                if(empty($subscription_upgrade_plan[$key]['upgrade_created_date']) && $available == 0) :
			                                	$upgrade_options = 0;
			                                	echo "No options available";
			                                endif;
			                                ?>
					                      	</div>
			                                <div class="sms_block common_box">              	
			                                	<input class="subs_input_val_upgact1 sms_count" type="text" disabled="disabled" data-toggle="sms_tooltip" title="No of sms you have selected"/>
			                                	<!-- <i class="glyphicon glyphicon-comment"></i> -->
			                                	<span id ="sms_icon"><i class="glyphicon glyphicon-remove-sign"></i></span>					                                	 
						                    </div>
			                                <div class="email_block common_box" >
			                                	<input class="subs_input_val_upgact2 email_count" type="text" disabled="disabled" data-toggle="email_tooltip" title="No of email you have selected"/>
			                                	<!-- <i class="glyphicon glyphicon-envelope"></i> -->
			                                	<span id ="email_icon"><i class="glyphicon glyphicon-remove-sign"></i></span>
			                                </div>
			                                <div class="resume_block common_box">
			                                	<input class="subs_input_val_upgact3 resume_count" type="text" disabled="disabled" data-toggle="resume_tooltip" title="No of resume you have selected"/>
			                                	<!-- <i class="glyphicon glyphicon-cloud-download"></i> -->
			                                	<span id ="resume_icon"><i class="glyphicon glyphicon-remove-sign"></i></span>
			                                </div>
			                                <div class="cb"></div>
			                                <div class="price-features text-center price2">
			                                    <ul class="subs_count_act <?php if($current == 0) echo "disabled"; ?>">
													<!-- <li>Max No of vacancy Posts: 20</li> -->
													<?php
													$upgrade_array = array_column($subscription_upgrade_plan[$key]['upgrade_options'],'upgrade_options');
													?>
 													<li id="subs_list_upg_sms" class="subs_list_act <?php if(!in_array('sms',$upgrade_array)) echo "disabled"; ?>" data-toggle="subs_tooltip" title="Click Here To Edit Plan!">Remaining Sms: <span class="sms_remain_value"><?php echo $current ==1 ?$organization_chosen_plan['organization_sms_remaining_count'] : 0; ?></span><span class="glyphicon glyphicon-edit subs_edit sub_sms"></span></li>
													<div id="popover-form" class="hide popover_form_upg_sms">
													    <form>
												            <div class="form-group">
													            <label>SMS COUNT</label>
												                <input id="popover-value" type="text" placeholder="Enter Value" class="form-control popover_value_upg_sms" name="sms_popvalue" maxlength="5" />
												            </div>
												            <button type="button" class="btn btn-success popover_upg_sms_save">Save</button>
											            </form>
											        </div>
													<li id="subs_list_upg_email" class="subs_list_act <?php if(!in_array('email',$upgrade_array)) echo "disabled"; ?>">Remaining Email: <?php echo $current ==1 ?$organization_chosen_plan['organization_email_remaining_count'] : 0; ?><span class="glyphicon glyphicon-edit subs_edit sub_email"></span></li>
													<div id="popover-form" class="hide popover_form_upg_email">
											            <form>
												            <label>EMAIL COUNT</label>
											            	<div class="form-group">
												                <input id="popover-value" type="text" placeholder="Enter Value" class="form-control popover_value_upg_email" name ="email_popvalue" maxlength="5" />
												            </div>
												            <button type="button" class="btn btn-success popover_upg_email_save">Save</button>
										            	</form>
											        </div>
													<li id="subs_list_upg_resume" class="subs_list_act <?php if(!in_array('resume',$upgrade_array)) echo "disabled"; ?>">Remaining Download: <?php echo $current ==1 ?$organization_chosen_plan['organization_remaining_resume_download_count'] :0; ?><span class="glyphicon glyphicon-edit subs_edit sub_resume"></span></li>
													<div id="popover-form" class="hide popover_form_upg_resume">
										           		<form>
														    <div class="form-group">
															    <label>RESUME COUNT</label>
														        <input id="popover-value" type="text" placeholder="Enter Value" class="form-control popover_value_upg_resume" name="resume_popvalue" maxlength="5" />
														    </div>
														    <button type="button" class="btn btn-success popover_save popover_upg_resume_save reset_value">Save</button>
														</form>
													</div>
													<!-- <li>Max No of ads: 20</li> -->
												</ul>                                   
			                                </div>
			                            </div>			                          
		                          	</div>
		                          	<div class="make_payment_option"> <a class="subs_button upg_select <?php if($current == 0 || ($renewal == 1 && $upgrade_disable == 1) || $available==0)  echo "disabled"; ?>" data-option="upgrade" data-id="<?php echo $subscription_upgrade_plan[$key]['sub_id']; ?>">Make Payment</a> </div>
			                           <button class="subs_reset upg_reset" type="reset" value="Reset">Reset</button>
		                       		</div>
		                        <div class="col-md-4 col-sm-6 col-xs-12 plan_selection">
		                        	<div class="price_ui_box subscribe_plan">
			                            <div class="single-price even" id="featured-price">
			                                <div class="price-header text-center">
			                                    <p class="plan-title"><strong>Renewal Plan</strong></p>
			                                </div>
			                                <div class="plan-price text-center">
			                                    <h4><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $subscription_upgrade_plan[$key]['subscription_price']; ?>
			                                    <input type="hidden" class="price_hidden" value="<?php echo $subscription_upgrade_plan[$key]['subscription_price']; ?>" />
			                                    </h4>
			                                </div>
			                                <div class="price-days text-center"><strong>For Next <?php echo $subscription_upgrade_plan[$key]['subscription_validity_days']; ?> days</strong></div>
		                                    <div class="price-features text-center">
		                                  		<ul class="subs_count_act">
													<li>Max No of vacancy Posts: <?php echo $subscription_upgrade_plan[$key]['subscription_max_no_of_posts']; ?></li>
													<li>Sms Counts: <?php echo $subscription_upgrade_plan[$key]['subcription_sms_counts']; ?></li> 
													<li>Email-count: <?php echo $subscription_upgrade_plan[$key]['subscription_email_counts']; ?></li> 
													<li>Resume Download: <?php echo $subscription_upgrade_plan[$key]['subcription_resume_download_count']; ?></li>
													<li>Max No of ads: <?php echo $subscription_upgrade_plan[$key]['subscription_max_no_of_ads']; ?></li>
												</ul>                    
			                                </div>
			                            </div>		                            	
		                        	</div>
		                        	<div class="make_payment_option"> <a class="subs_button renew_select <?php if($renewal == 0) echo "disabled"; ?>" data-option="renewal" data-id="<?php echo $subscription_upgrade_plan[$key]['sub_id']; ?>">Make Payment</a> </div>
		                        </div> 		                                              
		                    </div>
				        </div>					       			           
				    </div>	
				    <?php 
                    endif;
                	?>
		        	</div>
				</div>
			</div> 
		</div>
	</div>
</section>
<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>
<?php include('include/footercustom.php'); ?>
<script>
	$(document).ready(function(){
		<?php if(isset($_GET['reason']) && $_GET['reason']=='plan_selection'): ?>
			$('#provider_subscription_plan_form').submit();  
		<?php endif; ?> 
	});
</script>
