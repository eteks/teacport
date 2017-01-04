<?php
$is_super_admin = $this->config->item('is_super_admin');
// $access_rights = $this->config->item('access_rights');
if(!$is_super_admin){
  $access_permission=$this->config->item('current_page_rights');    
  $current_page_rights = $access_permission['access_permission'];
  $access_rights = explode(',',$current_page_rights);
}
else{
  $access_rights = $this->config->item('access_rights');
}
$feedback_data = $this->config->item('feedback_data');
if(!empty($this->session->userdata("admin_login_status"))):
?>
<?php if(!$this->input->is_ajax_request()) { ?>
<?php include "templates/header.php" ?>
  <!-- BEGIN CONTAINER -->
  <div id="container" class="row-fluid">
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Teachers Recruit
                     <small>Setting</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Admin Users</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>main/edit_profile">Configuration Option</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Configuration Option</h4>
                        </div>
                        <div class="widget-body form">
                          <form action="configuration_option" class="form-horizontal configuration_option_act" method="POST">
                            <p class="admin_status"> </p>
	                          <!-- <div class="control-group">
	                            <label class="control-label">Facebook Page URL</label>
	                            <div class="controls">
	                              <input class="span6 " type="text">
	                            </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Twitter Page URL</label>
	                            <div class="controls">
	                              <input class="span6 " type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Google+ Page URL</label>
	                            <div class="controls">
	                              <input class="span6 " type="text">
	                             </div>
	                          </div> -->
	                          <div class="control-group">
	                            <label class="control-label">System Email Address</label>
	                            <div class="controls">
	                              <input name="system_email_address" value="<?php if(!empty($payment_values['system_email_address'])) echo $payment_values['system_email_address']; ?>" class="span6 " type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Website Time Zone</label>
	                            <div class="controls">
	                            	<select id="timezone_act" class="form-control span6"></select>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable Facebook Login</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<li data-value="1" class="on"><a href="#">Yes</a></li> 
	                              	<li data-value="0"><a href="#">No</a></li>
	                              </ul>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Facebook APP ID</label>
	                            <div class="controls">
	                              <input name="facebook_app_id" value="<?php if(!empty($payment_values['facebook_app_id'])) echo $payment_values['facebook_app_id']; ?>" class="span6 " type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Facebook Secret Key</label>
	                            <div class="controls">
	                              <input name="facebook_app_secret" class="span6" value="<?php if(!empty($payment_values['facebook_app_secret'])) echo $payment_values['facebook_app_secret']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable Twitter Log In</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<li data-value="1" class="on"><a href="#">Yes</a></li> 
	                              	<li data-value="0"><a href="#">No</a></li>
	                              </ul>
	                            </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Twitter Key</label>
	                            <div class="controls">
	                              <input name="twitter_app_id" class="span6 " value="<?php if(!empty($payment_values['twitter_app_id'])) echo $payment_values['twitter_app_id']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Twitter Secret</label>
	                            <div class="controls">
	                              <input name="twitter_app_secret" class="span6" value="<?php if(!empty($payment_values['	twitter_app_secret'])) echo $payment_values['	twitter_app_secret']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable Google Log In</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<li data-value="1" class="on"><a href="#">Yes</a></li> 
	                              	<li data-value="0"><a href="#">No</a></li>
	                              </ul>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Google Key</label>
	                            <div class="controls">
	                              <input name="google_app_id" class="span6" value="<?php if(!empty($payment_values['google_app_id'])) echo $payment_values['google_app_id']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">
	                            Google Secret</label>
	                            <div class="controls">
	                              <input name="google_app_secret" class="span6" value="<?php if(!empty($payment_values['google_app_secret'])) echo $payment_values['google_app_secret']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable LinkedIn Log In</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<li data-value="1" class="on"><a href="#">Yes</a></li> 
	                              	<li data-value="0"><a href="#">No</a></li>
	                              </ul>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">LinkedIn Key</label>
	                            <div class="controls">
	                              <input name="linkedin_app_id" class="span6" value="<?php if(!empty($payment_values['linkedin_app_id'])) echo $payment_values['linkedin_app_id']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">LinkedIn Secret</label>
	                            <div class="controls">
	                              <input name="linkedin_app_secret" class="span6" value="<?php if(!empty($payment_values['linkedin_app_secret'])) echo $payment_values['linkedin_app_secret']; ?>" type="text">
	                             </div>
	                          </div>
	                          <!-- <div class="control-group">
	                            <label class="control-label">Enable ZIP Field</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<li data-value="1" class="on"><a href="#">Yes</a></li> 
	                              	<li data-value="0"><a href="#">No</a></li>
	                              </ul>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable ZIP Distance Search</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<li data-value="1" class="on"><a href="#">Yes</a></li> 
	                              	<li data-value="0"><a href="#">No</a></li>
	                              </ul>
	                             </div>
	                          </div> -->
	                          <div class="form-actions">
	                            <button type="submit" class="btn btn-success">Save</button>
	                            <!-- <button type="button" class="btn">Cancel</button> -->
                            </div>
                          </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->    
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>

