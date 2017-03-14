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
                        <form action="payment_gateway" class="form-horizontal payment_gateway_act" method="POST">
                        <p class="admin_status_sms"> <?php if(!empty($status)) echo $status; ?> </p>
                        <fieldset>
                          	<legend>Online Payment Gateway Settings</legend>
                            <p class="admin_status">  </p>
	                          <!-- <div class="control-group">
	                            <label class="control-label">Currency Symbol</label>
	                            <div class="controls">
	                              <div class="input-prepend input-append">
                                    <span class="add-on">$</span><input class=" " type="text" /><span class="add-on">.00</span>
                                 </div>
	                            </div>
	                          </div> -->
	                        <div class="control-group">
	                        	<label class="control-label">Merchant ID</label>
	                            <div class="controls ">
	                            	<input name="merchant_id" class="span6" value="<?php echo !empty(set_value('merchant_id')) ? set_value('merchant_id') : (!empty($payment_values['online_transfer_merchant_id']) ? $payment_values['online_transfer_merchant_id'] : '');  ?>" type="text" placeholder="Merchant ID">
                              </div>
	                        </div>
	                        <div class="control-group">
	                        	<label class="control-label">Merchant Access Code</label>
	                            <div class="controls">
                                <input name="merchant_accesscode" class="span6" value="<?php echo !empty(set_value('merchant_accesscode')) ? set_value('merchant_accesscode') : (!empty($payment_values['online_transfer_merchant_accesscode']) ? $payment_values['online_transfer_merchant_accesscode'] : '');  ?>" type="text" placeholder="Merchant Access Code">
                              </div>
	                        </div>
                          <div class="control-group">
                            <label class="control-label">Merchant Working Key</label>
                              <div class="controls">
                                <input name="merchant_workingkey" class="span6" value="<?php echo !empty(set_value('merchant_workingkey')) ? set_value('merchant_workingkey') : (!empty($payment_values['online_transfer_merchant_workingkey']) ? $payment_values['online_transfer_merchant_workingkey'] : '');  ?>" type="text" placeholder="Merchant Working Key">
                              </div>
                          </div>
	                        <div class="control-group">
	                        	<label class="control-label">Payment url</label>
	                           	<div class="controls">
                                <input name="payment_base_url" class="span6" value="<?php echo !empty(set_value('payment_base_url')) ? set_value('payment_base_url') : (!empty($payment_values['online_transfer_payment_base_url']) ? $payment_values['online_transfer_payment_base_url'] : '');  ?>" type="text" placeholder="Online Payment Url">
	                            </div>
	                        </div>
                        </fieldset> 

                        <!--Feed Bank Details-->
                        <fieldset>
                            <legend>Feed Bank Details</legend>
                            <p class="admin_status_sms"> </p>
	                        <div class="control-group">
	                         	<label class="control-label">Name of the Bank</label>
	                            <div class="controls">
                                <input name="bank_name" class="span6" value="<?php echo !empty(set_value('bank_name')) ? set_value('bank_name') : (!empty($payment_values['bank_transfer_bank_name']) ? $payment_values['bank_transfer_bank_name'] : '');  ?>" type="text" placeholder="Bank Name">
                             	</div>
	                        </div>
	                        <div class="control-group">
	                       		<label class="control-label">Name of the Acccount Holder</label>
	                            <div class="controls">
                                <input name="holder_name" class="span6" value="<?php echo !empty(set_value('holder_name')) ? set_value('holder_name') : (!empty($payment_values['bank_transfer_account_holder_name']) ? $payment_values['bank_transfer_account_holder_name'] : '');  ?>" type="text" placeholder="Account Holder Name">
                              </div>
	                        </div>
                            <div class="control-group">
                             	<label class="control-label">Account Number</label>
                              	<div class="controls">
                                  <input name="account_num" class="span6" value="<?php echo !empty(set_value('account_num')) ? set_value('account_num') : (!empty($payment_values['bank_transfer_account_number']) ? $payment_values['bank_transfer_account_number'] : '');  ?>" type="text" placeholder="Account Number">
                              	</div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label">IFSC Code</label>
                              	<div class="controls">
                                <input name="ifsc_code" class="span6" value="<?php echo !empty(set_value('ifsc_code')) ? set_value('ifsc_code') : (!empty($payment_values['bank_transfer_ifsc_code']) ? $payment_values['bank_transfer_ifsc_code'] : '');  ?>" type="text" placeholder="IFSC Code">
                                </div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label">Branch Name</label>
                            	<div class="controls">
                                <input name="branch_name" class="span6" value="<?php echo !empty(set_value('branch_name')) ? set_value('branch_name') : (!empty($payment_values['bank_transfer_branch_name']) ? $payment_values['bank_transfer_branch_name'] : '');  ?>" type="text" placeholder="Branch Name">
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label">Branch Code</label>
                              	<div class="controls">
                                  <input name="branch_code" class="span6" value="<?php echo !empty(set_value('branch_code')) ? set_value('branch_code') : (!empty($payment_values['bank_transfer_branch_code']) ? $payment_values['bank_transfer_branch_code'] : '');  ?>" type="text" placeholder="Branch Code">
                              	</div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label">Mobile Number</label>
                            	<div class="controls">
                                <input name="mobile_num" class="span6 numeric_act" value="<?php echo !empty(set_value('mobile_num')) ? set_value('mobile_num') : (!empty($payment_values['bank_transfer_mobile_number']) ? $payment_values['bank_transfer_mobile_number'] : '');  ?>" type="text" placeholder="Mobile Number" maxlength="10">
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label">Email Id</label>
                            	<div class="controls">
                                <input name="email" class="span6" value="<?php echo !empty(set_value('email')) ? set_value('email') : (!empty($payment_values['bank_transfer_email']) ? $payment_values['bank_transfer_email'] : '');  ?>" type="text" placeholder="Email ID">
                            	</div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label">Address</label>
                            	<div class="controls">
                                	<textarea name="address" type="text" value="" class="span6" resize="none"><?php echo !empty(set_value('address')) ? set_value('address') : (!empty($payment_values['bank_transfer_address']) ? $payment_values['bank_transfer_address'] : '');  ?></textarea>
                              	</div>
                            </div>
                        </fieldset>
                        <input name="hidden_id_settings" type="hidden" class="hidden_id" value="<?php if(!empty($payment_values['payment_gateway_id'])) echo $payment_values['payment_gateway_id']; ?>" />
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
<?php
else :
redirect(base_url().'main');
endif;
?>

