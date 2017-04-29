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
         <div class="container-fluid sub_pre_section">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <!-- <h3 class="page-title">
                     Teachers Recruit
                     <small>Setting</small>
                  </h3> -->
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a>Admin Users</a> <span class="divider">&nbsp;</span>
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
                            <span class="loader_holder hide_loader"> </span>
                        </div>
                        <div class="widget-body form">
                          <form action="configuration_option" class="form-horizontal configuration_option_act" method="POST">
                            <p class="admin_status"> </p>
                            <!-- System Settings -->
                          	<fieldset>
	                          	<legend> System Settings </legend>
	                          	<div class="control-group">
	                            	<label class="control-label">System Email Address</label>
	                            	<div class="controls">
	                              		<input name="system_email" value="<?php if(!empty($configuration['system_email_address'])) echo $configuration['system_email_address']; ?>" class="span6 " type="text">
	                             	</div>
	                          	</div>
	                          	<!-- <div class="control-group">
	                            	<label class="control-label">Website Time Zone</label>
	                            	<div class="controls">
	                            		<select id="timezone_act" class="form-control span6"></select>
	                             	</div>
	                          	</div> -->
                          	</fieldset>
                          	<!-- Social Settings -->
                          	<fieldset>
	                          	<legend> Social Settings </legend>
	                          	<div class="control-group">
	                            <label class="control-label">Enable Facebook Login</label>
	                            <div class="controls on_off_button_section">
	                              <ul class="on_off_button on_off_button_j">
	                              	<?php
	                              	if(isset($configuration['enable_facebook_login']) && $configuration['enable_facebook_login']!='' && $configuration['enable_facebook_login'] == 0) :
	                              	?>
	                              	<li data-value="1" class="on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	else :
	                              	?>
	                              	<li data-value="1" class="on on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	endif;
	                              	?>
	                              </ul>
	                              <input type="hidden" name="fb_status" class="verification" value="<?php if(isset($configuration['enable_facebook_login']) && $configuration['enable_facebook_login']!='' && $configuration['enable_facebook_login'] == 0) echo '0'; else echo '1'; ?>" />
	                            </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Facebook APP ID</label>
	                            <div class="controls">
	                              <input name="fb_id" value="<?php if(!empty($configuration['facebook_app_id'])) echo $configuration['facebook_app_id']; ?>" class="span6 " type="text" />
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Facebook Secret Key</label>
	                            <div class="controls">
	                              <input name="fb_key" class="span6" value="<?php if(!empty($configuration['facebook_app_secret'])) echo $configuration['facebook_app_secret']; ?>" type="text" />
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable Twitter Log In</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<?php
	                              	if(isset($configuration['enable_twitter_login']) && $configuration['enable_twitter_login']!='' && $configuration['enable_twitter_login'] == 0) :
	                              	?>
	                              	<li data-value="1" class="on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	else :
	                              	?>
	                              	<li data-value="1" class="on on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	endif;
	                              	?>
	                              </ul>
	                              <input type="hidden" name="tw_status" class="verification" value="<?php if(isset($configuration['enable_twitter_login']) && $configuration['enable_twitter_login']!='' && $configuration['enable_twitter_login'] == 0) echo '0'; else echo '1'; ?>" />
	                            </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Twitter ID</label>
	                            <div class="controls">
	                              <input name="tw_id" class="span6 " value="<?php if(!empty($configuration['twitter_app_id'])) echo $configuration['twitter_app_id']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Twitter Secret</label>
	                            <div class="controls">
	                              <input name="tw_key" class="span6" value="<?php if(!empty($configuration['twitter_app_secret'])) echo $configuration['twitter_app_secret']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable Google Log In</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<?php
	                              	if(isset($configuration['enable_google_login']) && $configuration['enable_google_login']!='' && $configuration['enable_google_login'] == 0) :
	                              	?>
	                              	<li data-value="1" class="on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	else :
	                              	?>
	                              	<li data-value="1" class="on on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	endif;
	                              	?>
	                              </ul>
	                              <input type="hidden" name="go_status" class="verification" value="<?php if(isset($configuration['enable_google_login']) && $configuration['enable_google_login']!='' && $configuration['enable_google_login'] == 0) echo '0'; else echo '1'; ?>" />
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Google ID </label>
	                            <div class="controls">
	                              <input name="go_id" class="span6" value="<?php if(!empty($configuration['google_app_id'])) echo $configuration['google_app_id']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">
	                            Google Secret</label>
	                            <div class="controls">
	                              <input name="go_key" class="span6" value="<?php if(!empty($configuration['google_app_secret'])) echo $configuration['google_app_secret']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">
	                            Google Developer Key</label>
	                            <div class="controls">
	                              <input name="go_dev_key" class="span6" value="<?php if(!empty($configuration['google_developer_key'])) echo $configuration['google_developer_key']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Enable LinkedIn Log In</label>
	                            <div class="controls">
	                              <ul class="on_off_button on_off_button_j">
	                              	<?php
	                              	if(isset($configuration['enable_linkedin_login']) && $configuration['enable_linkedin_login']!='' && $configuration['enable_linkedin_login'] == 0) :
	                              	?>
	                              	<li data-value="1" class="on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	else :
	                              	?>
	                              	<li data-value="1" class="on on_off_button_c"><a href="#">Yes</a></li> 
	                              	<li data-value="0" class="on_off_button_c"><a href="#">No</a></li>
	                              	<?php
	                              	endif;
	                              	?>
	                              </ul>
	                              <input type="hidden" name="li_status" class="verification" value="<?php if(isset($configuration['enable_linkedin_login']) && $configuration['enable_linkedin_login']!='' && $configuration['enable_linkedin_login'] == 0) echo '0'; else echo '1'; ?>" />
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">LinkedIn Key</label>
	                            <div class="controls">
	                              <input name="li_id" class="span6" value="<?php if(!empty($configuration['linkedin_app_id'])) echo $configuration['linkedin_app_id']; ?>" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">LinkedIn Secret</label>
	                            <div class="controls">
	                              <input name="li_key" class="span6" value="<?php if(!empty($configuration['linkedin_app_secret'])) echo $configuration['linkedin_app_secret']; ?>" type="text">
	                             </div>
	                          </div>
                          	</fieldset>
                          	<!-- Grace Period Settings -->
                          	<fieldset>
	                          	<legend> Grace Period Settings </legend>
	                          	<div class="control-group">
	                            	<label class="control-label"> Grace Period Validity Days </label>
	                            	<div class="controls">
	                              		<input name="grace_days" value="<?php if(!empty($configuration['plan_grace_period_days'])) echo $configuration['plan_grace_period_days']; ?>" class="span6 " type="text">
	                             	</div>
	                          	</div>
	                          	<div class="control-group">
	                            	<label class="control-label"> Grace Period Sms Count </label>
	                            	<div class="controls">
	                              		<input name="grace_sms" value="<?php if(!empty($configuration['grace_sms_count'])) echo $configuration['grace_sms_count']; ?>" class="span6 " type="text">
	                             	</div>
	                          	</div>
	                          	<div class="control-group">
	                            	<label class="control-label"> Grace Period Email Count </label>
	                            	<div class="controls">
	                              		<input name="grace_email" value="<?php if(!empty($configuration['grace_email_count'])) echo $configuration['grace_email_count']; ?>" class="span6 " type="text">
	                             	</div>
	                          	</div>
	                          	<div class="control-group">
	                            	<label class="control-label"> Grace Period Resume Count </label>
	                            	<div class="controls">
	                              		<input name="grace_resume" value="<?php if(!empty($configuration['grace_resume_count'])) echo $configuration['grace_resume_count']; ?>" class="span6 " type="text">
	                             	</div>
	                          	</div>
	                          	<div class="control-group">
	                            	<label class="control-label"> Grace Period Ad Count </label>
	                            	<div class="controls">
	                              		<input name="grace_ad" value="<?php if(!empty($configuration['grace_ad_count'])) echo $configuration['grace_ad_count']; ?>" class="span6 " type="text">
	                             	</div>
	                          	</div>
	                          	<div class="control-group">
	                            	<label class="control-label"> Grace Period Vacancy Count </label>
	                            	<div class="controls">
	                              		<input name="grace_vac" value="<?php if(!empty($configuration['grace_vacancy_count'])) echo $configuration['grace_vacancy_count']; ?>" class="span6 " type="text">
	                             	</div>
	                          	</div>
                          	</fieldset>
	                                             
                         	<div class="form-actions">
	                            <button type="submit" class="btn btn-success">Save</button>
	                            <!-- <button type="button" class="btn">Cancel</button> -->
                            </div>
                            <input name="hidden_id" type="hidden" class="hidden_id" value="<?php if(!empty($configuration['site_configuration_id'])) echo $configuration['site_configuration_id']; ?>" />
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

