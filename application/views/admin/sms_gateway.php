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
  <div id="container" class="row-fluid sub_pre_section">
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
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
                           <a href="#">Setting</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>main/edit_profile">SMS Gateway Setting</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> SMS Gateway Setting</h4>
                            <span class="loader_holder hide_loader"> </span>
                        </div>
                        <div class="widget-body form">
                          <form action="sms_gateway" class="form-horizontal sms_gateway_act" method="POST">
                            <p class="admin_status"> </p>
	                          <div class="control-group">
	                            <label class="control-label">SMS API URL</label>
	                            <div class="controls">
	                              <input name="sms_api_url" type="text" value="<?php if(!empty($payment_values['sms_api_url'])) echo $payment_values['sms_api_url']; ?>" class="span6" />
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">SMS API Key</label>
	                            <div class="controls">
	                              <input name="sms_api_key" type="text" value="<?php if(!empty($payment_values['sms_api_key'])) echo $payment_values['sms_api_key']; ?>" class="span6" />
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Authentication Token</label>
	                            <div class="controls">
	                              <input name="sms_authentication_token" type="text" value="<?php if(!empty($payment_values['sms_authentication_token'])) echo $payment_values['sms_authentication_token']; ?>" class="span6" />
	                             </div>
	                          </div>
	                          <div class="form-actions">
	                            <button type="submit" class="btn btn-success">Save</button>
	                            <!-- <button type="button" class="btn">Cancel</button> -->
                            </div>
                            <input name="hidden_id_settings" type="hidden" class="hidden_id" value="<?php if(!empty($payment_values['sms_gateway_id'])) echo $payment_values['sms_gateway_id']; ?>" />
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

