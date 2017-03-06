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
                          <?php echo form_open('main/sms_gateway','class=form-horizontal'); ?>
                            <p class="admin_status_sms"> <?php if(!empty($status)) echo $status; ?> </p>
	                          <div class="control-group">
	                            <label class="control-label">SMS API URL</label>
	                            <div class="controls">
                                <?php echo form_error('sms_api_url'); ?>
	                              <input name="sms_api_url" type="text" value="<?php echo !empty(set_value('sms_api_url')) ? set_value('sms_api_url') : (!empty($payment_values['sms_api_url']) ? $payment_values['sms_api_url'] : '');  ?>" class="span6" placeholder="http://bhashsms.com/api/sendmsg.php" />
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">User Name</label>
	                            <div class="controls">
                                <?php echo form_error('sms_username'); ?>
	                              <input name="sms_username" type="text" value="<?php echo !empty(set_value('sms_username')) ? set_value('sms_username') : (!empty($payment_values['sms_username']) ? $payment_values['sms_username'] : '');  ?>" class="span6" placeholder="xxxxxx" />
	                             </div>
	                          </div>
                            <div class="control-group">
                              <label class="control-label">Password</label>
                              <div class="controls">
                                <?php echo form_error('sms_password'); ?>
                                <input name="sms_password" type="password" value="<?php echo !empty(set_value('sms_password')) ? set_value('sms_password') : (!empty($payment_values['sms_password']) ? $payment_values['sms_password'] : '');  ?>" class="span6" placeholder="******" />
                                <span class="password_shower"> <i class="icon-eye-open"></i> </span>
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Sender</label>
                              <div class="controls">
                                <?php echo form_error('sms_senderid'); ?>
                                <input name="sms_senderid" type="text" value="<?php echo !empty(set_value('sms_senderid')) ? set_value('sms_senderid') : (!empty($payment_values['sms_senderid']) ? $payment_values['sms_senderid'] : '');  ?>" class="span6" placeholder="TCHRCT" />
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Priority</label>
                              <div class="controls">
                                <?php echo form_error('sms_priority'); ?>
                                <input name="sms_priority" type="text" value="<?php echo !empty(set_value('sms_priority')) ? set_value('sms_priority') : (!empty($payment_values['sms_priority']) ? $payment_values['sms_priority'] : '');  ?>" class="span6" placeholder="ndnd or dnd" />
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Type</label>
                              <div class="controls">
                                <?php echo form_error('sms_type'); ?>
                                <input name="sms_type" type="text" value="<?php echo !empty(set_value('sms_type')) ? set_value('sms_type') : (!empty($payment_values['sms_type']) ? $payment_values['sms_type'] : '');  ?>" class="span6" placeholder="normal" />
                               </div>
                            </div>
	                          <div class="form-actions">
	                            <button type="submit" class="btn btn-success">Save</button>
	                            <!-- <button type="button" class="btn">Cancel</button> -->
                            </div>
                            <input name="hidden_id_settings" type="hidden" class="hidden_id" value="<?php if(!empty($payment_values['sms_gateway_id'])) echo $payment_values['sms_gateway_id']; ?>" />
                          <?php echo form_close(); ?>
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

