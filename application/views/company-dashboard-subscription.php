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
                                <li><a href="<?php echo base_url(); ?>job_provider/dashboard">Dashboard</a>
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
									<img class="img-responsive center-block" src="<?php echo $organization['organization_logo'];?>" alt="Image">
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
                            <div class="subscription">
                                <!--Select Pricing Plan-->
                                <form id="form-school" class="form-horizontal" action="" name="" autocomplete="false" method="post" accept-charset="utf-8">
                                	<div class="form-group">
										<label class="col-sm-3" for="subpack">Select Subscription : </label>
										<div class="col-sm-6">
											<select id="subpack_act" class="form-control" name="subpack">
												<option> Select Package </option>
												<?php foreach ($subcription_plan as $plan) {
													$startdate = strtotime($plan['subcription_valid_start_date']);$enddate = strtotime($plan['subcription_valid_end_date']);$datediff = $enddate-$startdate;
													echo "<option value='".$plan['subscription_id']."' data-name='".$plan['subscription_plan']."' data-amount='".$plan['subscription_price']."'>".$plan['subscription_plan']." Membership plan @ ".floor(($datediff / (60 * 60 * 24))+1)." days Rs. ".$plan['subscription_price']." </option>";
												} ?>
											</select>
											<p>
												<b> + 15%</b>
												service tax applicable
											</p>
										</div>
										<div class="col-sm-3">
											<a href="<?php echo base_url(); ?>" target="_blank" class="btn btn-info btn-large">View Details &amp; Features</a>
								     </div>
								     </div>
							    </form> <!--End Select Pricing Plan-->
                                
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
		                    <!--Proceed to payment-->
		                    <div class="col-sm-offset-9 col-sm-1">
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
								echo form_input(array('name' => 'udf2', 'type'=>'hidden', 'id' =>'payu_planid','value'=>''));
								echo form_input(array('name' => 'udf5', 'type'=>'hidden', 'id' =>'payu_csrf','value'=>$this->security->get_csrf_hash()));
	                    		?>
	                    		<button type='submit' class="btn btn-default payu_submit"> Proceed to pay </button>
		                    	<?php echo form_close(); ?>
		                    </div>
                        </div> <!--End right panel-->
                    </div>
                </div> <!--row-->
            </div>
        </section>
<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>