<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Company Feedback</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
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
                        	<div class="panel">
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
                            <?php include('include/company_dashboard_sidebar.php'); ?>                           
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	<div class="heading-inner first-heading">
                                <p class="title">Choose Your Plan</p>
                            </div>
                            <p class="success_server_msg"><?php if(isset($subscription_server_msg)) echo $subscription_server_msg; ?><?php if($this->session->userdata('subscription_server_msg')!=''){ echo $this->session->userdata('subscription_server_msg');$this->session->unset_userdata('subscription_server_msg');} ?></p>
                            <?php if (!empty($subcription_plan)) { ?>
                            <div class="subscription">
                                <!--Select Pricing Plan-->
	                        	<div class="form-group">
									<label class="col-sm-3 nopadding" for="subpack">Select Subscription : </label>
									<div class="col-sm-6">
										<select id="subpack_act" class="form-control" name="subpack">
											<option value=""> Select Package </option>
											<?php foreach ($subcription_plan as $plan) {
												$startdate = strtotime($plan['subcription_valid_start_date']);$enddate = strtotime($plan['subcription_valid_end_date']);$datediff = $enddate-$startdate;
												echo "<option class='subplan_act' value='".$plan['subscription_id']."' data-name='".$plan['subscription_plan']."' data-amount='".$plan['subscription_price']."'>".$plan['subscription_plan']." Membership plan @ ".floor(($datediff / (60 * 60 * 24))+1)." days Rs. ".$plan['subscription_price']." </option>";
											} ?>
										</select>
										<p>
											<b> + 15%</b>
											service tax applicable
										</p>
									</div>
									<div class="col-sm-3 nopadding">
										<?php 
				                    	echo form_open('provider/payment','id="provider_subscription_form"');
										echo form_input(array('name' => 'firstname', 'type'=>'hidden', 'id' =>'payu_firstname','value'=>$organization['registrant_name']));
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
			                    		?>
			                    		<button type='submit' class="btn btn-default payu_submit pull-right" style="margin: 0px !important;"> Proceed to pay </button>
				                    	<?php echo form_close(); ?>
										<a href="<?php echo base_url(); ?>pricing" target="_blank" class="txt_blue pull-right margin_10">View Details &amp; Features</a>
							     </div>
							     </div>
							   <!--End Select Pricing Plan-->
                                
                                <!--Display Chosen Plan-->
                                <div class="pricing-section-1 subscription_plan_description">
                                	<!--Basic Plan-->
                                	<?php 
                                		foreach ($subcription_plan as $plan) {
                                			$startdate = strtotime($plan['subcription_valid_start_date']);$enddate = strtotime($plan['subcription_valid_end_date']);$datediff = $enddate-$startdate; 
                                	?>
                                	<div id="<?php echo $plan['subscription_plan'];?>" class="col-md-12 col-sm-12 col-xs-12 light-grey dn subscription_plan">
                                		<div class="heading-inner">
                                    		<span class="info"><i class="fa fa-info-circle" aria-hidden="true"></i> You have selected <?php echo $plan['subscription_plan'];?> plan</span>
                                		</div>
			                            <div class="ui_box">
			                                <div class="ui_box__inner">
			                                    <h2> <?php echo $plan['subscription_plan'];?> Plan </h2>
			                                    <div class="price-rates"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $plan['subscription_price']; ?> <small>for <?php echo floor(($datediff / (60 * 60 * 24))+1);?> days</small> </div>
			                                    <div class="features_left">
			                                        <ul>
			                                        	<?php
			                                        	$planfeatures = explode(',', $plan['subscription_features']);
														foreach ($planfeatures as $features) {
														?>
			                                            <li> <?php echo ucfirst($features); ?> </li>
			                                            <?php } ?>
			                                        </ul>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <?php } ?>
			                    </div> 
			                 </div>  
		                    <?php } else {?>
			                 	<div><h2>No subscription plan available!</h2></div>
			                 <?php } ?>
			                 
			                 
			                 
			                 
			                  <div class="col-sm-6 dn">
			                 	<button class="btn" data-toggle="modal" data-target="#plandetail_act"  data-backdrop="static" data-keyboard="false"> View Plan Details </button>
			                 </div>	
			                 
			                 <!-- Modal -->
					  <div class="modal fade" id="plandetail_act" role="dialog">
					    <div class="modal-dialog">
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					        	<a class="pull-right"><i class="fa fa-close"></i></a>
					          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
					          <h3 class="modal-title">You are on <strong class="info"> BASIC PLAN ! </strong> </h3>
					        </div>
					        <div class="modal-body">
					        	
					        	<!--PlanDetail Content Carousel Starts-->
					        	<div id="ca-container" class="ca-container">
					        	<div class="ca-wrapper">
					        		<div class="ca-item ca-item-1">
										<div class="ca-item-main">
											<h3><span class="plan_status"><i class="fa fa-check" aria-hidden="true"></i></span> Active Plan</h3>
											<h4>
												<span class="ca-quote">&ldquo;</span>
												<span class=""> Subscription Price </span><br>
										        <span class=""> Subscription Start Date </span><br>
										        <span class=""> Subscription End Date </span><br>
										        <span class=""> Transaction Id </span><br>
										        <span class=""> Subscription Status </span><br>
										        <span class=""> Subscription Created Date </span>
											</h4>
											<ul class="col-sm-6 plan_options">
												<li><a href="#">Upgrade</a></li>
												<li><a href="#">Renew</a></li>
												<li><a href="#">Inactive</a></li>
											</ul>	
										</div>
									</div>
									<div class="ca-item ca-item-2">
										<div class="ca-item-main">
											<h3>Upgrade Plan</h3>
											<h4>
												<span class="ca-quote">&ldquo;</span>
												<span class=""> Subscription Price </span><br>
										        <span class=""> Subscription Start Date </span><br>
										        <span class=""> Subscription End Date </span><br>
										        <span class=""> Transaction Id </span><br>
										        <span class=""> Subscription Status </span><br>
										        <span class=""> Subscription Created Date </span>
											</h4>
											<ul>
												<li><a href="#">Upgrade</a></li>
												<li><a href="#">Renew</a></li>
												<li><a href="#">Inactive</a></li>
											</ul>
										</div>
									</div>
									<div class="ca-item ca-item-3">
										<div class="ca-item-main">
											<h3>Renewal Plan</h3>
											<h4>
												<span class="ca-quote">&ldquo;</span>
												<span class=""> Subscription Price </span><br>
										        <span class=""> Subscription Start Date </span><br>
										        <span class=""> Subscription End Date </span><br>
										        <span class=""> Transaction Id </span><br>
										        <span class=""> Subscription Status </span><br>
										        <span class=""> Subscription Created Date </span>
											</h4>
											<ul>
												<li><a href="#">Upgrade</a></li>
												<li><a href="#">Renew</a></li>
												<li><a href="#">Inactive</a></li>
											</ul>
										</div>
									</div>
									<div class="ca-item ca-item-4">
										<div class="ca-item-main">
											<h3>Upgrade Plan</h3>
											<h4>
												<span class="ca-quote">&ldquo;</span>
												<span class=""> Subscription Price </span><br>
										        <span class=""> Subscription Start Date </span><br>
										        <span class=""> Subscription End Date </span><br>
										        <span class=""> Transaction Id </span><br>
										        <span class=""> Subscription Status </span><br>
										        <span class=""> Subscription Created Date </span>
											</h4>
											<ul>
												<li><a href="#">Upgrade</a></li>
												<li><a href="#">Renew</a></li>
												<li><a href="#">Inactive</a></li>
											</ul>
										</div>
									</div>
									<div class="ca-item ca-item-5">
										<div class="ca-item-main">
											<h3>Renewal Plan</h3>
											<h4>
												<span class="ca-quote">&ldquo;</span>
												<span class=""> Subscription Price </span><br>
										        <span class=""> Subscription Start Date </span><br>
										        <span class=""> Subscription End Date </span><br>
										        <span class=""> Transaction Id </span><br>
										        <span class=""> Subscription Status </span><br>
										        <span class=""> Subscription Created Date </span>
												
											</h4>
											<ul>
												<li><a href="#">Upgrade</a></li>
												<li><a href="#">Renew</a></li>
												<li><a href="#">Inactive</a></li>
											</ul>
										</div>
								 	</div>
								 </div>
							</div>  <!--PlanDetail Content Carousel Ends-->
			                 
			                 
			                 
			                 
                        </div> <!--End right panel-->
                    </div>
                </div> <!--row-->
            </div>
        </section>
<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>