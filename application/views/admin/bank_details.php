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
                       <li><a href="<?php echo base_url(); ?>main/edit_profile">Feed Bank Details</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> Feed Bank Details </h4>
                            <span class="loader_holder hide_loader"> </span>
                        </div>
                        <div class="widget-body form">
                          <form class="form-horizontal">
                            <p class="admin_status_sms"> </p>
	                          <div class="control-group">
	                            <label class="control-label">Name of the Bank</label>
	                            <div class="controls">
                                <input name="" type="text" value="" class="span6" placeholder="" />
                                <span class="password_shower"> <i class="icon-eye-open"></i> </span>
	                            </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Name of the Acccount Holder</label>
	                            <div class="controls">
                                <input name="" type="text" value="" class="span6" placeholder="" />
                                <span class="password_shower"> <i class="icon-eye-open"></i> </span>
	                            </div>
	                          </div>
                            <div class="control-group">
                              <label class="control-label">Account Number</label>
                              <div class="controls">
                                <input name="" type="text" value="" class="span6" placeholder="" />
                                <span class="password_shower"> <i class="icon-eye-open"></i> </span>
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">IFSC Code</label>
                              <div class="controls">
                                  <input name="" type="text" value="" class="span6" placeholder="" />
                                  <span class="password_shower"> <i class="icon-eye-open"></i> </span>
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Branch Name</label>
                              <div class="controls">
                                  <input name="" type="text" value="" class="span6" placeholder="" />
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Branch Code</label>
                              <div class="controls">
                                  <input name="" type="text" value="" class="span6" placeholder="normal" />
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Mobile Number</label>
                              <div class="controls">
                                  <input name="" type="text" value="" class="span6" placeholder="normal" />
                                  <span class="password_shower"> <i class="icon-eye-open"></i> </span>
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Email Id</label>
                              <div class="controls">
                                  <input name="" type="text" value="" class="span6" placeholder="normal" />
                               </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Address</label>
                              <div class="controls">
                                  <textarea name="" type="text" value="" class="span6" resize="none"></textarea>
                               </div>
                            </div>
	                          <div class="form-actions">
	                            <button type="submit" class="btn btn-success">Save</button>
	                            <!-- <button type="button" class="btn">Cancel</button> -->
                            </div>
                            <input name="hidden_id_settings" type="hidden" class="hidden_id" value="" />
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

