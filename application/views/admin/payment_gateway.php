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
                       <li><a href="<?php echo base_url(); ?>main/payment_gateway">Payment Gateway Setting</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> Payment Gateway Setting</h4>
                            <span class="loader_holder hide_loader"> </span>
                        </div>
                        <div class="widget-body form">
                        <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                          <form action="<?php echo base_url(); ?>admin/setting/payment_gateway" class="form-horizontal" method="POST">
                            <!-- <p class="admin_status"> </p> -->
	                          <!-- <div class="control-group">
	                            <label class="control-label">Currency Symbol</label>
	                            <div class="controls">
	                              <div class="input-prepend input-append">
                                    <span class="add-on">$</span><input class=" " type="text" /><span class="add-on">.00</span>
                                 </div>
	                            </div>
	                          </div> -->
	                          <div class="control-group">
	                            <label class="control-label">Merchant Key</label>
	                            <div class="controls ">
	                              <input name="online_transfer_merchant_key" class="span6" value="" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Merchant Salt</label>
	                            <div class="controls">
	                              <input name="online_transfer_merchant_salt" class="span6" value="" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Payment url</label>
	                            <div class="controls">
	                            	<input name="online_transfer_payment_base_url" class="span6" value="" type="text">
	                             </div>
	                          </div>
	                          <!-- <div class="control-group">
	                            <label class="control-label">Cheques Address</label>
	                            <div class="controls">
	                                <textarea class="span6" rows="3"></textarea>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Cheques Address</label>
	                            <div class="controls">
	                                <textarea class="span6" rows="3"></textarea>
	                             </div>
	                          </div> -->
	                          <div class="control-group">
	                            <label class="control-label">Account Name</label>
	                            <div class="controls">
	                              <input name="bank_transfer_account_name" class="span6" value="" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Account Number</label>
	                            <div class="controls">
	                              <input name="bank_transfer_account_number" class="span6" value="" type="text">
	                             </div>
	                          </div>
	                          <!-- <div class="control-group">
	                            <label class="control-label">Access Key</label>
	                            <div class="controls">
	                              <input class="span6" type="text">
	                             </div>
	                          </div> -->
	                          <div class="control-group">
	                            <label class="control-label">IFSC Code</label>
	                            <div class="controls">
	                              <input name="bank_transfer_ifsc_code" class="span6" value="" type="text">
	                             </div>
	                          </div>
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

