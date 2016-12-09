<?phpinclude ('include/header.php');include ('include/menus.php');?><section class="job-breadcrumb">	<div class="container">		<div class="row">			<div class="col-md-6 col-sm-7 co-xs-12 text-left">				<h3>Your Feedback</h3>			</div>			<div class="col-md-6 col-sm-5 co-xs-12 text-right">				<div class="bread">					<ol class="breadcrumb">						<li>							<a href="<?php echo base_url();?>">Home</a>						</li>						<li>							<a href="<?php echo base_url();?>provider/dashboard">Dashboard</a>						</li>						<li class="active">							Feedback						</li>					</ol>				</div>			</div>		</div>	</div></section><section class="dashboard-body">	<div class="container">		<div class="row">			<div class="col-md-12 col-sm-12 col-xs-12 nopadding">				<div class="col-md-4 col-sm-4 col-xs-12">					<div class="panel">						<div class="dashboard-logo-sidebar">							<img class="img-responsive center-block" src="<?php echo $organization['organization_logo'];?>" alt="Image">						</div>						<div class="text-center dashboard-logo-sidebar-title">							<h4><?php echo $organization['organization_name']; ?></h4>						</div>					</div>					<!--include left panel menu-->					<?php						include ('include/company_dashboard_sidebar.php'); 					?>				</div>				<div class="col-md-8 col-sm-8 col-xs-12">					<div class="heading-inner first-heading">						<p class="title">							Submit Feedback						</p>					</div>					<p class="success_server_msg"><?php if(isset($feedback_server_msg)) echo $feedback_server_msg; ?></p>					<div class="follower-section">						<?php echo form_open('provider/feedback', 'id="provider_feedback_form" class="profile-edit"'); ?>							<div class="form-group">								<div class="col-sm-9 pull-right"><?php echo form_error('feedback_subject'); ?></div>								<div class="clearfix"> </div>								<label class="col-sm-3">Subject :</label>								<div class="col-sm-9">									<input type="text" maxlength="20" class="form-control" id="subject" name="feedback_subject" placeholder="Subject regarding">								</div>							</div>							<div class="form-group">								<div class="col-sm-9 pull-right"><?php echo form_error('feedback_content'); ?></div>								<div class="clearfix"> </div>								<label class="col-sm-3">Feedback :</label>								<div class="col-sm-9">									<textarea rows="10"  cols="10" class="form-control" id="feedbck" name="feedback_content" style=" border: 1px solid #c1c1c1; margin: 10px 0; padding: 20px;resize: none; "> </textarea>								</div>							</div>							<div class="heading-inner">								<span class="col-sm-3"> </span>								<div class="col-sm-9">									<span class="info"><i class="fa fa-info-circle" aria-hidden="true"></i> If you are about to upload any screenshots please visit<a href="http://www.snag.gy" target="_blank"> SNAGGY</a></span>								</div>							</div>							<div class="col-md-12 col-sm-12 col-xs-12">								<div class="pull-right">									<input type="submit" class="btn btn-default" value="SUBMIT">								</div>							</div>						<?php echo form_close(); ?>					</div>				</div>			</div>		</div>	</div></section><?php	include ('include/footermenu.php');	include ('include/footer.php');?>