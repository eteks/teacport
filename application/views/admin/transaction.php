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
  <!-- BEGIN SIDEBAR -->
  <div id="sidebar" class="nav-collapse collapse">
   <div class="sidebar-toggler hidden-phone"></div>
   <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
   <div class="navbar-inverse">
      <form class="navbar-search visible-phone">
        <input type="text" class="search-query" placeholder="Search" />
      </form>
   </div>
   <!-- END RESPONSIVE QUICK SEARCH FORM -->
   <!-- BEGIN SIDEBAR MENU -->
  </div>
  <!-- END SIDEBAR -->
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
            <small>Job Providers</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Job Providers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/transaction">Job Provider Transaction</a>
              <span class="divider-last">&nbsp;</span>
            </li>
          </ul>
          <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
      </div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN ADVANCED TABLE widget-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN EXAMPLE TABLE widget-->
          <div class="widget sub_section_scroll">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i>Job Provider Transaction
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                </div>
                <form action="job_seeker/teacport_job_seeker_profile">
                  <p class="admin_status"> </p>
                  <div class="">  
                    <p class='val_error'> <p>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th> Transaction Id </th>
                          <th> Organization Name </th>
                          <th> Merchant Transaction Id </th>
                          <th> Payu Unique id </th>
                          <th> Payment Id </th>
                          <th> Payment Mode </th>
                          <th> Transaction Status </th>
                          <th> Transaction Date & Time</th>
                          <th class="data_action"> Full View </th>
                        </tr>
                      </thead>
                      <tbody class="table_content_section"> 
                        <?php
                        if(!empty($job_provider_transaction))  :
                        ?>   
                        <?php
                          foreach ($job_provider_transaction as $trans) :
                          ?>                                  
                        <tr class="parents_tr" id="column">
                          <td class="">
                            <?php echo $trans['transaction_id']; ?>
                          </td>
                          <td class="">
                            <?php echo $trans['organization_name']; ?>
                          </td>
                          <td class="">
                            <?php echo $trans['tracking_id']; ?>
                          </td>
                          <td class="">
                            <?php echo $trans['mihpayid']; ?>
                          </td>
                          <td class="">
                            <?php echo $trans['payumoneyid']; ?>
                          </td>
                          <td class="">
                            <?php echo $trans['payment_mode']; ?>
                          </td>
                          <td class="">
                            <?php echo $trans['transaction_status']; ?>
                          </td>
                          <td class=""> 
                            <?php 
                              $created_datetime = explode(' ', $trans['transaction_date_time']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?>
                          </td>
                          <td>
                            <a class="job_full_view popup_fields" data-id="<?php echo $trans['transaction_id']; ?>" data-href="job_provider/get_transaction_full_view"  data-mode="full_view"  data-popup-open="popup_section_transaction">
                              Full View
                            </a>
                          </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        <?php 
                        endif;
                        ?>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE widget-->    
        </div>                
      </div>         

      <!---Full View popup -->
      <div class="popup" data-popup="popup_section_transaction">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Job Providers Transaction
              </h4>                        
            </div>
            <div class="widget-body form pop_details_section">
              <?php } ?>
              <form class="tab_form" action="job_seeker/teacport_job_seeker_profile" data-index="" method="POST" data-mode="update">
                <?php
                if(!empty($provider_full_transaction)) :
                ?>
                <div id="rootwizard" class="form-wizard">
                  <div class="tab-content">
                    <?php
                    if(!empty($mode) && $mode=="full_view") :
                    ?>
                    <input type="hidden" value="view" id="popup_mode" />
                    <div>
                      <div class="span12">
                        <div class="span6 control-group">                                  
                          <label class="control-label">Transaction Id</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['transaction_id'])) echo $provider_full_transaction['transaction_id']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Name</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['organization_id'])) echo $provider_full_transaction['organization_name']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Merchant Transaction Id</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['tracking_id'])) echo $provider_full_transaction['tracking_id']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Payu Unique Id</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['mihpayid'])) echo $provider_full_transaction['mihpayid']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Payment Id</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['payumoneyid'])) echo $provider_full_transaction['payumoneyid']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Payment Mode</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['payment_mode'])) echo $provider_full_transaction['payment_mode']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Merchant Key</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['merchant_key'])) echo $provider_full_transaction['merchant_key']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Payment Gateway Type</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['pg_type'])) echo $provider_full_transaction['pg_type']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Bank Reference Number</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['bank_referrence_number'])) echo $provider_full_transaction['bank_referrence_number']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Bank Code</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['bank_code'])) echo $provider_full_transaction['bank_code']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Card Number</label>
                          <span class="dynamic_data">
                            <?php if(!empty($provider_full_transaction['card_number'])) echo $provider_full_transaction['card_number']; else echo "-"; ?> 
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Card Name</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['card_name'])) echo $provider_full_transaction['card_name']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Unmapped Status</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['unmapped_status'])) echo $provider_full_transaction['unmapped_status']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Discount Value</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['discount_value'])) echo $provider_full_transaction['discount_value']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Amount</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['amount'])) echo $provider_full_transaction['amount']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Net Amount Debit</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['transaction_id'])) echo $provider_full_transaction['net_amount_debit']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>   
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Error Code</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['error_code'])) echo $provider_full_transaction['error_code']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Error Message</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['error_message'])) echo $provider_full_transaction['error_message']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>   
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Transaction Status</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($provider_full_transaction['transaction_status'])) echo $provider_full_transaction['transaction_status']; else echo "-"; ?>
                            <?php echo $provider_full_transaction['transaction_status']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Transaction date & Time</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_transaction['transaction_date_time'])) {
                              $created_datetime = explode(' ', $provider_full_transaction['transaction_date_time']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            }
                            else echo "-";
                            ?>
                          </span>
                        </div>
                      </div>          
                    </div>
                    <?php
                    endif;
                    ?>
                  </div>  
                </div>
                <?php
                endif;
                ?>
              </form>                 
              <?php if(!$this->input->is_ajax_request()) { ?>
            </div>
          </div>
          <p>
            <a data-popup-close="popup_section_transaction" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="popup_section_transaction" href="#">x</a>
        </div>
      </div> 	
      <!-- END ADVANCED TABLE widget-->
      <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
  </div>
</div>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
