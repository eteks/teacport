<?php
$is_super_admin = $this->config->item('is_super_admin');
// $access_rights = $this->config->item('access_rights');
if(!$is_super_admin){
  $access_permission=$this->config->item('current_page_rights');	
  $current_page_rights = $access_permission['access_permission'];
  $access_rights = explode(',',$current_page_rights);
}
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
          <h3 class="page-title">
            Teachers Recruit
            <small>Job Providers</small>
          </h3>
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Job Providers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/job_provider_profile">Job Provider Profile</a>
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
          <div class="widget">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i>Job Provider Profile 
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                </div> 
                <form action="job_provider/teacport_job_provider_profile">
                  <p class="admin_status"> </p>
                  <div class="">
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="mple_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th> Organization Name </th>
                          <th> Registrant Name </th>
                          <th> Profile Completeness </th>
                          <th> Subcription Plan </th>
                          <th> Status </th>
                          <th> Created Date</th>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                            <th class="data_action">Edit</th>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                            <th class="data_action">Delete</th>
                          <?php endif; ?>
                          <th class="data_action"> Full Details </th>
                        </tr>
                      </thead>
                      <tbody class="table_content_section">
                        <?php } ?>
                        <?php
                        if(!empty($provider_profile))  :
                        ?>  
                        <?php
                        foreach ($provider_profile as $pro_val) :
                        ?>                               
                        <tr class="parents_tr">
                          <td class="">
                            <?php echo $pro_val['organization_name']; ?>
                          </td>
                          <td class="">
                            <?php echo $pro_val['registrant_name']; ?> 
                          </td>
                          <td class="">
                            <?php echo $pro_val['organization_profile_completeness']." %"; ?>      
                          </td>
                          <td class="">
                            <?php 
                            if(!empty($pro_val['subscription_plan'])) :
                              echo $pro_val['subscription_plan'];
                            else :
                              echo "Null";
                            endif;
                            ?>   
                          </td>
                          <td class="">
                            <?php 
                            if($pro_val['organization_status']==1) :
                              echo "Active";
                            else :
                              echo "Inactive";
                            endif;
                            ?> 
                          </td>
                          <td class=""> 
                            <?php echo date('d-m-Y',strtotime($pro_val['organization_created_date'])); ?>
                          </td> 
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>                                     
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider/teacport_job_provider_profile_ajax" data-mode="edit" data-popup-open="popup_section">
                              Edit
                            </a>
                          </td>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                          <td>
                            <a class="job_delete pop_delete_action" data-id="<?php echo $pro_val['organization_id']; ?>">
                              Delete
                            </a>
                          </td>
                          <?php endif; ?>
                          <td>
                            <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider/teacport_job_provider_profile_ajax"  data-mode="full_view"  data-popup-open="popup_section">
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
                        <?php if(!$this->input->is_ajax_request()) { ?> 
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
      <!---Full View & Edit popup -->
      <div class="popup" data-popup="popup_section">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Job Providers Profile
              </h4>                        
            </div>
            <div class="widget-body form pop_details_section">
              <?php } ?>
              <form class="tab_form" action="job_provider/teacport_job_provider_profile" data-index="" method="POST" data-mode="update">
                <?php
                if(!empty($provider_full_profile)) :
                ?>
                <div id="rootwizard" class="form-wizard">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul  class="span12 row-fluid nav nav-pills">
                          <li class="span-2">
                            <a href="#tab1" data-toggle="tab" class="step active">
                            	<span class="number">1</span>
                                <span class="desc"><i class="icon-ok"></i>Organization <br/> Detail</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab2" data-toggle="tab" class="step">
                            	<span class="number">2</span>
                                <span class="desc"><i class="icon-ok"></i>Registrant <br/> Details</span>
                            </a>
                          </li>
                          <?php
                          if(!empty($mode) && $mode=="full_view") :
                          ?>
                          <li class="span-2">
                            <a href="#tab3" data-toggle="tab" class="step">
                            	<span class="number">3</span>
                                <span class="desc"><i class="icon-ok"></i>Payment <br/> Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab4" data-toggle="tab" class="step">
                            	<span class="number">4</span>
                              <span class="desc"><i class="icon-ok"></i>Addtional <br/> Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab5" data-toggle="tab" class="step">
                              <span class="number">5</span>
                              <span class="desc"><i class="icon-ok"></i>Validity <br/> Details</span>
                            </a>
                          </li>
                          <?php
                          else :
                          ?>
                          <li class="span-2">
                            <a href="#tab3" data-toggle="tab" class="step">
                            	<span class="number">3</span>
                              <span class="desc"><i class="icon-ok"></i>Addtional <br/> Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab4" data-toggle="tab" class="step">
                              <span class="number">4</span>
                              <span class="desc"><i class="icon-ok"></i>Validity <br/> Details</span>
                            </a>
                          </li>
                          <?php
                          endif;
                          ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-striped active">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content">
                    <?php
                    if(!empty($mode) && $mode=="full_view") :
                    ?>
                    <input type="hidden" value="view" id="popup_mode" />
                    <div class="tab-pane" id="tab1">
                      <h4>Organization Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_name']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Logo</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_logo']; ?>
                            <img src="<?php echo base_url().$provider_full_profile['organization_logo']; ?>" class="popup_preview" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address1</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_address_1']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Address2</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_address_2']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address3</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_address_3']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">District Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['district_name']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Institution Type</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['institution_type_name']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Status</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if($provider_full_profile['organization_status']==1) :
                              echo "Active";
                            else :
                              echo "Inactive";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Registrant Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['registrant_name']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Register Type</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['registrant_register_type']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Designation</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['registrant_designation']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Date Of Birth</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['registrant_date_of_birth']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email ID</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['registrant_email_id']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mobile No</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['registrant_mobile_no']; ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane profile_subscription_tab" id="tab3">
                      <h4>
                        Payment Details 
                        <!-- <span class="arrow_section">
                          <a class="subscription_paginate popup_pag_prev"> 
                            <i class="icon-chevron-left"></i> 
                          </a> 
                          <a class="subscription_paginate">  
                            <i class="icon-chevron-right popup_pag_next"></i> 
                          </a> 
                        </span> -->
                      </h4>
                      <?php
                      if(!empty($payment_details)) :
                      ?>
                      <div class="subscription_organization_section">
                        <?php
                        foreach ($payment_details as $pay_key => $pay_val) :
                        ?>
                        <div class="span12 subscription_organization_inner_section">
                          <h4 class="center_align plan_name"><?php echo $pay_val['subscription_plan']; ?> </h4>
                          <div class="profile_plan_section">
                            <div class="span3 plan_label_section">                                       
                              <h4 class="">Summary</h4>
                              <label class=""> Subscription Price </label>
                              <label class=""> Subscription Start Date </label>
                              <label class=""> Subscription End Date </label>
                              <label class=""> Transaction Id </label>
                              <label class=""> Subscription Status </label>
                              <label class=""> Subscription Created Date </label>
                            </div>
                            <div class="span3 plan_field_section">                                       
                              <h4 class="">Original Plan</h4>
                              <label class=""> &#8377 </label>
                              <label class=""> <?php echo date('d M Y',strtotime($pay_val['subcription_valid_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($pay_val['subcription_valid_end_date'])); ?> </label>
                              <label class=""> <?php echo $pay_val['organization_transcation_id']; ?> </label>
                              <?php
                              if($pay_val['organization_subscription_status'] == 1) :
                              ?>
                              <label class='subscription_status'> <span class='icon'> Active <span> </label>
                              <div class='inner-triangle'> </div> <span class='icon-ok triangle_notification'> </span>
                              <?php
                              else :
                              ?>
                              <label class='subscription_status'> <span class='icon icon_expired'> Inactive <span></label> 
                              <div class='inner-triangle triangle_disabled'> </div>
                              <?php
                              endif;
                              ?>               
                              <label class=""> <?php echo date('d-m-Y',strtotime($pay_val['organization_subscription_created_date'])); ?> </label>                   
                            </div>
                            <?php
                            if(!empty($pay_val['upgrade_renewal']) && $pay_key) :
                            $upgrade = 0;
                            $renewal = 0;
                            foreach ($pay_val['upgrade_renewal'] as $up_re_key => $up_re_val) :
                            ?>
                            <?php
                            if(!empty($up_re_val['organization_upgrade_id'])) :
                            $upgrade = 1;
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class=""> &#8377  </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_end_date'])); ?> </label>
                              <label class=""> <?php echo $up_re_val['transaction_id']; ?> </label>
                              <?php
                              if($up_re_val['status'] == 1) :
                              ?>
                              <label class='subscription_status'> <span class='icon'> Active <span> </label>
                              <div class='inner-triangle'> </div> <span class='icon-ok triangle_notification'> </span>
                              <?php
                              else :
                              ?>
                              <label class='subscription_status'> <span class='icon icon_expired'> Inactive <span></label> 
                              <div class='inner-triangle triangle_disabled'> </div>
                              <?php
                              endif;
                              ?>
                              <label class=""> <?php echo date('d-m-Y',strtotime($up_re_val['created_date'])); ?> </label>  
                            </div>
                            <?php
                            else :
                            $renewal = 1;
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class="">Renewal Plan</h4>
                              <label class=""> &#8377  </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['org_sub_validity_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['org_sub_validity_end_date'])); ?> </label>
                              <label class=""> <?php echo $up_re_val['transaction_id']; ?> </label>
                              <?php
                              if($up_re_val['status'] == 1) :
                              ?>
                              <label class='subscription_status'> <span class='icon'> Active <span> </label>
                              <div class='inner-triangle'> </div> <span class='icon-ok triangle_notification'> </span>
                              <?php
                              else :
                              ?>
                              <label class='subscription_status'> <span class='icon icon_expired'> Inactive <span></label> 
                              <div class='inner-triangle triangle_disabled'> </div>
                              <?php
                              endif;
                              ?>
                              <label class=""> <?php echo date('d-m-Y',strtotime($up_re_val['created_date'])); ?> </label>  
                            </div>
                            <?php
                            endif;
                            endforeach;
                            ?>
                            <?php
                            if($renewal == 0):
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class=""> Renewal Plan </h4>  
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Renewal <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                        
                            </div>
                            <?php
                            elseif($upgrade == 0):
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Upgrade <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                    
                            </div>
                            <?php
                            endif;
                            ?>
                            <?php
                            else :
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Upgrade <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                    
                            </div>
                            <div class="span3 plan_field_section">     
                              <h4 class=""> Renewal Plan </h4>  
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Renewal <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                        
                            </div>
                            <?php
                            endif;
                            ?>


                          </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                      </div>
                      <?php
                      else :
                      ?>
                      <div class="empty_subscription_section">
                        <p> This Organization has <span> no subscription </span> plans. </p>
                      </div>
                      <?php
                      endif;
                      ?>
                    </div>
                    <div class="tab-pane" id="tab4">
                      <h4>Addtional Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Is SMS Verified</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if($provider_full_profile['is_sms_verified']==1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Total SMS Count</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_sms_count']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Used SMS Count</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_sms_count']-$provider_full_profile['organization_sms_remaining_count']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Remaining SMS Count</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_sms_remaining_count']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Total Resume Count</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_resume_download_count']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Used Resume Count</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_resume_download_count']-$provider_full_profile['organization_remaining_resume_download_count']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Remaining Resume Count</label>
                          <span class="dynamic_data"> 
                            <?php echo $provider_full_profile['organization_remaining_resume_download_count']; ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                      <h4>Validity Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email Validity</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if($provider_full_profile['is_email_validity']==1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Validity Start Date</label>
                          <span class="dynamic_data"> 
                            <?php echo date('d-m-Y',strtotime($provider_full_profile['org_sub_validity_start_date'])); ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">SMS Validity</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if($provider_full_profile['is_sms_validity']==1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Validity End Date</label>
                          <span class="dynamic_data"> 
                            <?php echo date('d-m-Y',strtotime($provider_full_profile['org_sub_validity_end_date'])); ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Resume Validity</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if($provider_full_profile['is_resume_validity']==1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <?php
                    else :
                    ?>
                    <input type="hidden" value="edit" id="popup_mode" />
                    <p class="val_error"> </p>
                    <div class="tab-pane" id="tab1">
                      <h4>Organization Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Name</label>
                          <span>
                            <input type="text" class="span6 tabfield1 tabfield" value="<?php echo $provider_full_profile['organization_name']; ?>" name="organization_name" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Logo</label>
                          <span>
                            <a class="btn upload_option"> Upload </a>
                            <input class="form-control hidden_upload tabfield1 tabfield" name="organization_logo" type="file">
                            <img src="<?php echo base_url().$provider_full_profile['organization_logo']; ?>" class="popup_preview">
                            <input type="hidden" value="<?php echo $provider_full_profile['organization_logo']; ?>" class="tabfield1 tabfield" name="old_file_path" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Institution Type</label>
                          <span>
                            <select name="institution_type" class="tabfield1 tabfield">
                              <option value=""> Please select institution type </option>
                              <?php
                              if(!empty($instution_values)) :
                              foreach ($instution_values as $ins_val) :
                              ?>
                              <?php
                                if($ins_val['institution_type_id']==$provider_full_profile['organization_institution_type_id']) {
                                  echo '<option value='.$ins_val["institution_type_id"].' selected> '.$ins_val["institution_type_name"].' </option>';
                                }
                                else if($ins_val['institution_type_status']==1){
                                  echo '<option value='.$ins_val["institution_type_id"].'> '.$ins_val["institution_type_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$provider_full_profile['institution_type_id'].' selected> "'.$provider_full_profile['institution_type_name'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Status</label>
                          <span>
                            <select name="organization_status" class="tabfield1 tabfield">
                              <option value=""> Please select status </option>
                              <option value="1" <?php if($provider_full_profile['organization_status']==1) echo "selected"; ?>> Active </option>
                              <option value="0" <?php if($provider_full_profile['organization_status']==0) echo "selected"; ?>> Inactive </option>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Organization Address</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address1</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_1']; ?>" name="org_addr_1" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address2</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_2']; ?>" name="org_addr_2" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address3</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_3']; ?>" name="org_addr_3" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization District</label>
                          <span>
                            <select class="tabfield2 tabfield" name="organization_district">
                              <option value=""> Please select district </option>
                              <?php
                              if(!empty($district_values)) :
                              foreach ($district_values as $dis_val) :
                              ?>
                              <?php
                                if($dis_val['district_id']==$provider_full_profile['organization_district_id']) {
                                  echo '<option value='.$dis_val["district_id"].' selected> '.$dis_val["district_name"].' </option>';
                                }
                                else if($dis_val['district_status']==1){
                                  echo '<option value='.$dis_val["district_id"].'> '.$dis_val["district_name"].' </option>';
                                }
                              endforeach;
                                else :
                                  echo '<option value='.$provider_full_profile['organization_district_id'].' selected> "'.$provider_full_profile['district_name'].'" </option>';
                              endif;
                              ?>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                      <h4>Registrant Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Name</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_name']; ?>" name="registrant_name" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Designation</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_designation']; ?>" name="registrant_designation" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant DOB</label>
                          <span>
                            <input type="text" class="span6 m-ctrl-medium date-picker tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_date_of_birth']; ?>" name="registrant_dob" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Email</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_email_id']; ?>" name="registrant_email" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Mobile</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_mobile_no']; ?>" name="registrant_mobile" />
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                      <h4>Validity Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php if($provider_full_profile['is_email_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php if($provider_full_profile['is_email_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php echo $provider_full_profile['is_email_validity']; ?>" class="verification tabfield4 tabfield" name="email_valid" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">SMS Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php if($provider_full_profile['is_sms_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php if($provider_full_profile['is_sms_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php echo $provider_full_profile['is_sms_validity']; ?>" class="verification tabfield4 tabfield" name="sms_valid" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Resume Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php if($provider_full_profile['is_resume_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php if($provider_full_profile['is_resume_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php echo $provider_full_profile['is_resume_validity']; ?>" class="verification tabfield4 tabfield" name="resume_valid" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Subscription Status</label>
                          <span>
                            <select name="subscription_status" class="tabfield4 tabfield">
                              <option value=""> Please select status </option>
                              <option value="1" <?php if($provider_full_profile['subscription_status']==1) echo "selected"; ?>> Active </option>
                              <option value="0" <?php if($provider_full_profile['subscription_status']==0) echo "selected"; ?>> Inactive </option>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    <?php
                    endif;
                    ?>
                    <ul class="pager wizard">
                      <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
                      <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
                      <li class="finish disabled"><button type="submit">Finish<i class="icon-ok"></i></button></li>
                    </ul>
                  </div>  
                </div>
                <input type="hidden" class="hidden_id" value="<?php echo $provider_full_profile['organization_id']; ?>" />
                <?php
                endif;
                ?>
              </form>
              <?php if(!$this->input->is_ajax_request()) { ?>
            </div>
          </div>
        	<p>
            <a data-popup-close="popup_section" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="popup_section" href="#">x</a>
        </div>
      </div>     	
    </div>
    <!-- END PAGE CONTAINER-->
  </div>
  <!-- END PAGE -->
</div>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>
