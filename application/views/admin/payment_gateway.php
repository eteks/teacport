<?php
$is_super_admin = $this->config->item('is_super_admin');
// $access_rights = $this->config->item('access_rights');
if(!$is_super_admin){
  $access_permission=$this->config->item('current_page_rights');	
  $current_page_rights = $access_permission['access_permission'];
  $access_rights = explode(',',$current_page_rights);
}
if(!empty($this->session->userdata("login_status"))): 
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
                           <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Setting</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/payment_gateway">Payment Gateway Setting</a><span class="divider-last">&nbsp;</span></li>
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
                        </div>
                        <div class="widget-body form">
                          <form action="admin_users/edit_profile_validation" class="form-horizontal admin_login_form" method="POST">
                            <!-- <p class="admin_status"> </p> -->
	                          <div class="control-group">
	                            <label class="control-label">Currency Symbol</label>
	                            <div class="controls">
	                              <div class="input-prepend input-append">
                                    <span class="add-on">$</span><input class=" " type="text" /><span class="add-on">.00</span>
                                 </div>
	                            </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">PayPal Currency Code</label>
	                            <div class="controls">
	                              <input class="span6" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">PayPal ID</label>
	                            <div class="controls">
	                              <input class="span6" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">2Checkout ID</label>
	                            <div class="controls">
	                            	<input class="span6" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Cheques Address</label>
	                            <div class="controls">
	                                <textarea class="span6 " rows="3"></textarea>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Cheques Address</label>
	                            <div class="controls">
	                                <textarea class="span6 " rows="3"></textarea>
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Bank Account Information</label>
	                            <div class="controls">
	                              <input class="span6" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Payments ID</label>
	                            <div class="controls">
	                              <input class="span6" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Access Key</label>
	                            <div class="controls">
	                              <input class="span6" type="text">
	                             </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Secret Key</label>
	                            <div class="controls">
	                              <input class="span6" type="text">
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
redirect(base_url().'admin');
endif;
?>

