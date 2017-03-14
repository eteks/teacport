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
    <!-- <div class="sidebar-toggler hidden-phone"></div> -->
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
    <div class="mCustomScrollbar" data-mcs-theme="dark">
    <div class="container-fluid sub_pre_section">
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
              <a href="<?php echo base_url(); ?>main/job_provider_profile">Job Provider Profile</a>
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
                <form action="job_provider_profile">
                  <p class="admin_status"> </p>
                  <div class="">
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="mple_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th> Organization Registered Id </th>
                          <th> Organization Name </th>
                          <th> Registrant Name </th>
                          <th> Profile Completeness </th>
                          <!-- <th> Subcription Plan </th> -->
                          <th> Status </th>
                          <!-- <th> Transaction Type </th> -->
                          <th> Created Date</th>
                          <th> Visitors Count </th>
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
                            <?php echo $pro_val['organization_id']; ?>
                          </td> 
                          <td class="">
                            <?php
                            if(!empty($pro_val['organization_name'])) :
                              echo $pro_val['organization_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </td>
                          <td class="">
                            <?php
                              if(!empty($pro_val['registrant_name'])) :
                                echo $pro_val['registrant_name']; 
                              else :
                                echo "NULL";
                              endif;
                            ?>
                          </td>
                          <td class="">
                            <?php echo $pro_val['organization_profile_completeness']." %"; ?>      
                          </td>
                          <!-- <td class="">
                            <?php 
                            // if(!empty($pro_val['subscription_plan'])) :
                            //   echo $pro_val['subscription_plan'];
                            // else :
                            //   echo "Null";
                            // endif;
                            ?>   
                          </td> -->
                          <td class="">
                            <?php 
                            if($pro_val['organization_status']==1) :
                              echo "Active";
                            else :
                              echo "Inactive";
                            endif;
                            ?> 
                          </td>
                          <!-- <td> Online</td> -->
                          <td class=""> 
                            <?php 
                              $created_datetime = explode(' ', $pro_val['organization_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?> 
                          </td> 
                          <td class=""> 
                            <a class="visit_count" data-href="job_provider_visit_details_ajax" data-value="<?php echo $pro_val['count']; ?>" data-popup-open="provider_visit_details_section" data-id="<?php echo $pro_val['organization_id']; ?>">
                              <?php echo $pro_val['count']; ?> 
                            </a>
                          </td>

                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>                                     
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider_edit_profile" data-mode="edit" data-popup-open="popup_section_profile">
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
                            <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider_edit_profile"  data-mode="full_view"  data-popup-open="popup_section_profile">
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
      <div class="popup feedback-design" data-popup="popup_section_profile">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Job Providers Profile
              </h4>                        
            </div>
            <div class="widget-body form pop_details_section">
              <?php } ?>
              <form class="tab_form" action="job_provider_profile" data-index="" method="POST" data-mode="update">
                <?php
                if(!empty($provider_full_profile)) :
                ?>
                <div id="rootwizard" class="form-wizard job_pro_form">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul  id="pro_profile_tabs" class="span12 row-fluid nav nav-pills nav-design">
                          <li class="span-2">
                            <a href="#tab1" data-toggle="tab" class="step active">
                            	<span class="number">1</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Organization Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab2" data-toggle="tab" class="step">
                            	<span class="number">2</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Organization Address</span>
                            </a>
                          </li>
                          <?php
                          if(!empty($mode) && $mode=="full_view") :
                          ?>
                          <li class="span-2">
                            <a href="#tab3" data-toggle="tab" class="step">
                            	<span class="number">3</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Payment Details</span>
                            </a>
                          </li>
                          <!-- <li class="span-2">
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
                          </li> -->
                          <?php
                          else :
                          ?>
                          <li class="span-2">
                            <a href="#tab3" data-toggle="tab" class="step">
                            	<span class="number">3</span>
                              <span class="desc desc_space"><i class="icon-ok"></i>Registrant Details</span>
                            </a>
                          </li>
                          <?php if($is_super_admin){ ?>
                            <li class="span-2">
                              <a href="#tab4" data-toggle="tab" class="step">
                              	<span class="number">4</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Grace Period</span>
                              </a>
                            </li>
                          <?php } ?>
                          <!-- <li class="span-2">
                            <a href="#tab4" data-toggle="tab" class="step">
                              <span class="number">4</span>
                              <span class="desc"><i class="icon-ok"></i>Validity <br/> Details</span>
                            </a>
                          </li> -->
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
                  <div class="tab-content tab_content_scroll">
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
                            <?php 
                            if(!empty($provider_full_profile['organization_name'])) :
                              echo $provider_full_profile['organization_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Logo</label>
                          <span class="dynamic_data"> 
                            <img src="<?php echo $provider_full_profile['organization_logo']; ?>" class="popup_preview" alt="Logo Not Found" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address1</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['organization_address_1'])) :
                              echo $provider_full_profile['organization_address_1']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Address2</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['organization_address_2'])) :
                              echo $provider_full_profile['organization_address_2']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address3</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['organization_address_3'])) :
                              echo $provider_full_profile['organization_address_3']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">State Name</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['state_name'])) :
                              echo $provider_full_profile['state_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">District Name</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['district_name'])) :
                              echo $provider_full_profile['district_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>   
                        <div class="span6 control-group">  
                          <label class="control-label">Institution Type</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['institution_type_name'])) :
                              echo $provider_full_profile['institution_type_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
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
                            <?php 
                            if(!empty($provider_full_profile['registrant_name'])) :
                              echo $provider_full_profile['registrant_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?> 
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Register Type</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_register_type'])) :
                              echo $provider_full_profile['registrant_register_type']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Designation</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_designation'])) :
                              echo $provider_full_profile['registrant_designation']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Date Of Birth</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_date_of_birth'])) :
                              echo date("d/m/Y", strtotime($provider_full_profile['registrant_date_of_birth']));
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email ID</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_email_id'])) :
                              echo $provider_full_profile['registrant_email_id']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mobile No</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_mobile_no'])) :
                              echo $provider_full_profile['registrant_mobile_no']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <!-- <div class="span6 control-group">                                       
                          <label class="control-label"> Sms Verification</label>
                          <span class="dynamic_data"> 
                            <?php 
                            // if($provider_full_profile['is_sms_verified']==1) :
                            //   echo "Yes";
                            // else :
                            //   echo "No";
                            // endif;
                            ?>
                          </span>
                        </div> -->
                        <div class="span6 control-group">
                          <label class="control-label">Registrant Picture</label>
                          <span class="dynamic_data"> 
                            <img src="<?php echo $provider_full_profile['registrant_logo']; ?>" class="popup_preview" alt="Picture Not Found" />
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane profile_subscription_tab plan_details_scroll" id="tab3">
                      <h4>
                        Payment Details 
                        <?php
                        if(!empty($payment_details) && count($payment_details) > 1) :
                        ?>
                        <span class="arrow_section">
                          <a class="subscription_paginate popup_pag_prev"> 
                            <i class="icon-chevron-left"></i> 
                          </a> 
                          <a class="subscription_paginate">  
                            <i class="icon-chevron-right popup_pag_next"></i> 
                          </a> 
                        </span>
                        <?php
                        endif;
                        ?>
                      </h4>
                      <?php
                      if(!empty($payment_details)) :
                      ?>
                      <div class="subscription_organization_section">
                        <?php
                        foreach ($payment_details as $pay_key => $pay_val) :
                        ?>
                        <div class="span12 subscription_organization_inner_section">
                          <h4 class="center_align plan_name"> 
                            <a class="payment_wrapper"> 
                              <i class="icon-info-sign"></i> More Details 
                              <div class="payment_tooltip">
                                <label class="control-label">
                                <?php 
                                if($pay_val['is_email_validity']==1) : 
                                  echo "<i class='icon-ok'></i> <span> Email Valid </span> "; 
                                else :
                                  echo "<i class='icon-remove'></i> <span> Email Invalid </span>";
                                endif;
                                ?> </label>
                                <label class="control-label"> 
                                <?php 
                                if($pay_val['is_sms_validity']==1) : 
                                  echo "<i class='icon-ok'></i> <span> Sms Valid </span>"; 
                                else :
                                  echo "<i class='icon-remove'></i> <span> Sms Invalid </span>";
                                endif;
                                ?> </label>
                                <label class="control-label">
                                <?php 
                                if($pay_val['is_resume_validity']==1) : 
                                  echo "<i class='icon-ok'></i> <span> Resume Valid </span>"; 
                                else :
                                  echo "<i class='icon-remove'></i> <span> Resume Invalid </span>"; 
                                endif;
                                ?> </label>
                                <table>
                                  <thead> <th> Plan option </th> <th> Total </th> <th> Used </th> <th> Remaining </th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td> Sms </td>
                                      <td> <?php echo $pay_val['organization_sms_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_sms_count']-$pay_val['organization_sms_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_sms_remaining_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Resume </td>
                                      <td> <?php echo $pay_val['organization_resume_download_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_resume_download_count']-$pay_val['organization_remaining_resume_download_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_remaining_resume_download_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Email </td>
                                      <td> <?php echo $pay_val['organization_email_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_email_count']-$pay_val['organization_email_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_email_remaining_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Vacancy </td>
                                      <td> <?php echo $pay_val['organization_post_vacancy_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_post_vacancy_count']-$pay_val['organization_vacancy_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_vacancy_remaining_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Ad </td>
                                      <td> <?php echo $pay_val['organization_post_ad_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_post_ad_count']-$pay_val['organization_ad_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_ad_remaining_count']; ?> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </a> <?php echo $pay_val['subscription_plan']; ?> 
                          </h4>
                          <div class="profile_plan_section">
                            <div class="span3 plan_label_section">  
                              <h4 class="">Summary</h4>
                              <label class=""> Subscription Price </label>
                              <label class=""> Subscription Start Date </label>
                              <label class=""> Subscription End Date </label>
                              <label class=""> Transaction Id </label>
                              <label class=""> Grace Period Start Date </label>
                              <label class=""> Grace Period End Date </label>
                              <label class=""> Subscription Created Date </label>
                              <label class=""> Subscription Status </label>
                            </div>
                            <div class="span3 plan_field_section">                                       
                              <h4 class="">Original Plan</h4>
                              <label class="">
                                <?php if(!empty($pay_val['org_sub_amount'])) echo "&#x20B9; ".$pay_val['org_sub_amount']; else echo "Free"; ?>
                              </label>
                              <label class=""> <?php echo date('d M Y',strtotime($pay_val['org_sub_validity_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($pay_val['org_sub_validity_end_date'])); ?> </label>
                              <label class=""> <?php echo $pay_val['organization_transcation_id']; ?> </label>
                              <label class="show_grace"> 
                                <?php if(!empty($pay_val['grace_period_start_date'])) echo $pay_val['grace_period_start_date']; else echo "Null"; ?>
                              </label>
                              <label class="show_grace"> 
                                <?php if(!empty($pay_val['grace_period_end_date'])) echo $pay_val['grace_period_start_date']; else echo "Null"; ?>
                              </label>
                              <label class=""> <?php echo date('d M Y',strtotime($pay_val['organization_subscription_created_date'])); ?> </label> 
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
                            </div>
                            <?php
                            $upgrade = 0;
                            $renewal = 0;
                            foreach ($pay_val['upgrade_renewal'] as $up_re_key => $up_re_val) :
                            if(!empty($up_re_key)) {
                            ?>
                            <?php
                            if($up_re_val['is_renewal'] == 0) :
                            $upgrade++;
                            ?>
                            <div class="upgrade_holder_content upgrade_section_profile plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class=""> &#x20B9; <?php echo $up_re_val['upg_ren_amount']; ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_end_date'])); ?> </label>
                              <label class=""> <?php echo $up_re_val['transaction_id']; ?> </label>
                              <label class="show_grace"> 
                                <?php if(!empty($pay_val['renewal_grace_period_start_date'])) echo $pay_val['renewal_grace_period_start_date']; else echo "Null"; ?>
                              </label>
                              <label class="show_grace"> 
                                <?php if(!empty($pay_val['renewal_grace_period_end_date'])) echo $pay_val['renewal_grace_period_end_date']; else echo "Null"; ?>
                              </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['created_date'])); ?> </label>
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
                            </div>
                            <?php
                            if($upgrade > 1) :
                            ?>  
                            <div class="upgrade_holder_content navigation_options">
                              <span class="arrow_section">
                                <a class="subscription_paginate upgrade_pag_prev"> 
                                  <i class="icon-chevron-left"></i> 
                                </a> 
                                <a class="subscription_paginate upgrade_pag_next">  
                                  <i class="icon-chevron-right"></i> 
                                </a> 
                              </span>
                            </div>
                            <?php
                            endif;
                            ?> 
                            <?php
                            else :
                            $renewal++;
                            ?>                  
                            <div class="renewal_holder_content renewal_section_profile plan_field_section">     
                              <h4 class="">Renewal Plan</h4>
                              <label class=""> &#x20B9; <?php echo $up_re_val['upg_ren_amount']; ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_end_date'])); ?> </label>
                              <label class=""> <?php echo $up_re_val['transaction_id']; ?> </label>
                              <label class="show_grace"> 
                                <?php if(!empty($pay_val['renewal_grace_period_start_date'])) echo $pay_val['renewal_grace_period_start_date']; else echo "Null"; ?>
                              </label>
                              <label class="show_grace"> 
                                <?php if(!empty($pay_val['renewal_grace_period_end_date'])) echo $pay_val['renewal_grace_period_end_date']; else echo "Null"; ?>
                              </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['created_date'])); ?> </label>
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
                            </div>
                            <?php
                            if($renewal > 1) :
                            ?>  
                            <div class="renewal_holder_content navigation_options">
                              <span class="arrow_section">
                                <a class="subscription_paginate renew_pag_prev"> 
                                  <i class="icon-chevron-left"></i> 
                                </a> 
                                <a class="subscription_paginate">  
                                  <i class="icon-chevron-right renew_pag_next"></i> 
                                </a> 
                              </span>
                            </div>
                            <?php
                            endif;
                            ?>
                            <?php
                            endif;
                            }
                            endforeach;
                            ?>
                            <?php
                            if($upgrade == 0 && $renewal == 0) {
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
                            }
                            else if($renewal == 0) {
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class=""> Renewal Plan </h4>  
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Renewal <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                        
                            </div>
                            <?php
                            }
                            else if($upgrade == 0) {
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Upgrade <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                    
                            </div>
                            <?php
                            }
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
                            <input type="text" class="span6 tabfield1 tabfield" value="<?php echo $provider_full_profile['organization_name']; ?>" name="organization_name" placeholder="Organization Name" maxlength="50" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Logo</label>
                          <span>
                            <a class="btn upload_option"> Upload </a>
                            <input class="form-control hidden_upload tabfield1 tabfield" name="organization_logo" type="file">
                            <img src="<?php echo $provider_full_profile['organization_logo']; ?>" class="popup_preview" alt="Not Loaded">
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
                      <div class="span12 control-group">
                       <!--  <input type="checkbox" value="" class="show_plan_detail plan_bank_details" data-id="<?php echo $provider_full_profile['org_id']; ?>" data-mode="add">  -->
                         <a class="add_registrant_Plan plan_bank_details" data-id="<?php echo $provider_full_profile['org_id']; ?>" data-mode="add" data-href="job_provider_plan_activation" data-popup-open="popup_plan_activate">
                           Activate 
                        </a>
                        <!-- or  -->
                        <!-- <a class="edit_registrant_Plan plan_bank_details" data-id="<?php echo $provider_full_profile['org_id']; ?>" data-mode="edit" data-href="job_provider_plan_activation" data-popup-open="popup_plan_activate">
                          Edit
                        </a> -->
                        Plan for this organization ?
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Organization Address</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address1</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_1']; ?>" name="org_addr_1" maxlength="150" placeholder="Organization Address" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address2</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_2']; ?>" name="org_addr_2" maxlength="150" placeholder="Organization Address" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address3</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_3']; ?>" name="org_addr_3" maxlength="150" placeholder="Organization Address" />
                          </span>
                        </div>
                        <div class="span6 control-group state_section">    
                          <label class="control-label">Organization State</label>
                          <span>
                            <select class="tabfield2 tabfield state_act" name="organization_state">
                              <option value=""> Please select State </option>
                              <?php
                              if(!empty($state_values)) :
                              foreach ($state_values as $st_val) :
                              ?>
                              <?php
                                if($st_val['state_id']==$provider_full_profile['organization_state_id']) {
                                  echo '<option value='.$st_val["state_id"].' selected> '.$st_val["state_name"].' </option>';
                                }
                                else if($st_val['state_status']==1){
                                  echo '<option value='.$st_val["state_id"].'> '.$st_val["state_name"].' </option>';
                                }
                              endforeach;
                                else :
                                  echo '<option value='.$provider_full_profile['organization_state_id'].' selected> "'.$provider_full_profile['state_name'].'" </option>';
                              endif;
                              ?>
                            </select>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group district_section">  
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
                            <input type="text" class="span6 tabfield3 tabfield alpha_value" value="<?php echo $provider_full_profile['registrant_name']; ?>" placeholder="Registrant Name" name="registrant_name" maxlength="50" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Designation</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_designation']; ?>" name="registrant_designation" placeholder="Registrant Designation" maxlength="50" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant DOB</label>
                          <span>
                            <?php
                            if(!empty($provider_full_profile['registrant_date_of_birth'])) :
                            ?>
                            <input type="text" class="span6 m-ctrl-medium admin_date_picker tabfield3 tabfield" value="<?php echo date("d/m/Y", strtotime($provider_full_profile['registrant_date_of_birth'])); ?>" name="registrant_dob" placeholder="Registrant DOB" />
                            <?php
                            else :
                            ?>
                            <input type="text" placeholder="Registrant DOB" class="span6 m-ctrl-medium admin_date_picker tabfield3 tabfield" value="" name="registrant_dob" />
                            <?php
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Email</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_email_id']; ?>" name="registrant_email" placeholder="Registrant Email" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Mobile</label>
                          <span>
                            <?php
                            if(!empty($provider_full_profile['registrant_mobile_no']) && $provider_full_profile['registrant_mobile_no'] != 0) :
                            ?>
                            <input type="text" class="span6 tabfield3 tabfield numeric_value" value="<?php echo $provider_full_profile['registrant_mobile_no']; ?>" placeholder="Registrant Mobile" name="registrant_mobile" maxlength="10" />
                            <?php
                            else :
                            ?>
                            <input type="text" class="span6 tabfield3 tabfield numeric_value" value="" placeholder="Registrant Mobile" name="registrant_mobile" maxlength="10" />
                            <?php
                            endif;
                            ?>
                          </span>
                        </div>
                        <!-- <div class="span6 control-group">                                       
                          <label class="control-label">SMS Verification</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              //if($provider_full_profile['is_sms_verified']==1) //echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              //if($provider_full_profile['is_sms_verified']==0) //echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            //echo $provider_full_profile['is_sms_verified']; ?>" class="verification tabfield3 tabfield" name="sms_verify" />
                          </span>
                        </div> -->
                      </div>
                      <!-- <div class="span12 control-group">
                        <input type="checkbox" value="" class="show_plan_detail"> Activate Plan for this organization ?
                        <a class="edit_registrant_Plan" data-id="" data-href="" data-mode="edit" data-popup-open="popup_plan_activate">
                          Edit
                        </a>
                      </div> -->
                    </div>
                    <?php if($is_super_admin){ ?>
                      <div class="tab-pane" id="tab4">
                      	<h4>Grace Period</h4>
                        <?php if(isset($latest_plan_details)): ?>
                         	<p class="span12 control-group">                                       
                          	<span class="info_color">Note :</span>
                           	Extending grace time is applicable only for the Latest Plan/Current Plan that customer availed. 
                        	</p>
                        	<div class="span12">
                          	<div class="span6 control-group">                                       
                            		<label class="control-label">Plan Name</label>
                            		<span>
                              	 <label class="show_plan_name icon"> <?php echo $latest_plan_details['subscription_plan']; ?> </label>	
                            		</span>
                          	</div>
                          	<div class="span6 control-group">
  	                      		<label>Plan Current Status</label>
                              <?php if(empty($latest_plan_details['is_renewal']))
                                  $sub_status = $latest_plan_details['organization_subscription_status'];
                                else
                                  $sub_status = $latest_plan_details['status'];
                                if($sub_status==1) :
                                  echo "<span class='icon'> Active </span>";
                                else :
                                  echo "<span class='icon icon_expired'> Inactive </span>";
                                endif;
                              ?> 
  		                    </div>
                          </div>	
                          <div class="span12">
                          	<div class="span6 control-group">  
                              <label class="control-label">Subscription Start Date</label>
  	                          <span class="dynamic_data"> 
                                <?php 
                                if(empty($latest_plan_details['is_renewal'])):
                                  if($latest_plan_details['is_grace_period_available']==0)
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['org_sub_validity_start_date'])[0]));
                                  else
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['grace_period_start_date'])[0]));
                                else:
                                  if($latest_plan_details['renewal_is_grace_period_available']==0)
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['validity_start_date'])[0]));
                                  else
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['renewal_grace_period_start_date'])[0]));
                                endif;
                                ?> 
                            		</span>
  	                        </div>
                              <div class="span6 control-group">  
                                <label class="control-label">Subscription End Date</label>
                        		    <span class="dynamic_data"> 
                             			<?php 
                                if(empty($latest_plan_details['is_renewal'])):
                                  if($latest_plan_details['is_grace_period_available']==0)
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['org_sub_validity_end_date'])[0]));
                                  else
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['grace_period_end_date'])[0]));
                                else:
                                  if($latest_plan_details['renewal_is_grace_period_available']==0)
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['validity_end_date'])[0]));
                                  else
                                    echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['renewal_grace_period_end_date'])[0]));
                                endif;
                                ?> 
                            		</span>
                            	</div>
                         	</div>
                          <?php if($latest_plan_details['is_grace_period_available']==1|| $latest_plan_details['renewal_is_grace_period_available']==1){ ?>
                            <div class="span12">
                              <div class="span6 control-group">  
                                <label class="control-label">Grace Period Start Date</label>
                                <span class="dynamic_data"> 
                                  <?php 
                                    if($latest_plan_details['is_renewal'] == 1):
                                      echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['renewal_grace_period_start_date'])[0]));
                                    else:
                                      echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['grace_period_start_date'])[0]));
                                    endif;
                                  ?> 
                                  </span>
                              </div>
                                <div class="span6 control-group">  
                                  <label class="control-label">Grace Period End Date</label>
                                  <span class="dynamic_data"> 
                                    <?php 
                                    if($latest_plan_details['is_renewal'] == 1):
                                      echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['renewal_grace_period_end_date'])[0]));
                                    else:
                                      echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['grace_period_end_date'])[0]));
                                    endif;
                                  ?> 
                                  </span>
                                </div>
                            </div>
                          <?php } ?>
                         	<div class="span12">
                        		<div class="control-group check_grace">
                              <input type="hidden" name="grace_period_allocate_id" value="<?php if($latest_plan_details['is_renewal'] ==1) echo $latest_plan_details['upgrade_or_renewal_id']; else echo $latest_plan_details['org_subscription_id']; ?>" data-renewal="<?php if(empty($latest_plan_details['is_renewal'])) echo "0"; else echo $latest_plan_details['is_renewal']; ?>" readonly>
                        			<input type="hidden" name="grace_period_renewal" value="<?php if(empty($latest_plan_details['is_renewal'])) echo "0"; else echo $latest_plan_details['is_renewal']; ?>" readonly>
                              <input type="checkbox" name="grace_period_applicable_status" class="control-group apply_grace_period" <?php if($latest_plan_details['is_grace_period_available'] == 1 || $latest_plan_details['renewal_is_grace_period_available'] == 1){ ?> disabled checked title="Already Grace Period Assigned" <?php } else if(empty($latest_plan_details['is_renewal']) && $latest_plan_details['organization_subscription_status'] == 1){ ?> disabled title="cannot assign grace period when provider is active"  <?php } ?>>Apply Grace period for this provider latest/current plan 
                              <input type="hidden" class="grace_period_days" name="grace_period_days" value="10" readonly>
                        		</div>
                        	</div>
                        	<div class="span12 show_grace_period hide_all">
                          	<div class="span6 control-group">    
                                <label class="control-label">Grace Period Start Date</label>
                            		<span>
                                  <input type="text" class="grace_period_days" name="grace_period_days" value="15/02/2017" readonly>
  	                          	</span>
                          	</div>
                          	<div class="span6 control-group">
                            		<label class="control-label">Grace Period End Date</label>
                            		<span>
                                  <input type="text" class="grace_period_days" name="grace_period_days" value="15/02/2017" readonly>
                                </span>
                          	</div>
                        	</div>
                          <div class="span12 show_grace_period hide_all">
                            <div class="span6 control-group">    
                                <label class="control-label">Email Count</label>
                                <span>
                                  <input type="text" class="grace_period_days" name="grace_period_days" value="10" readonly>
                                </span>
                            </div>
                            <div class="span6 control-group">
                                <label class="control-label">SMS Count</label>
                                <span>
                                  <input type="text" class="grace_period_days" name="grace_period_days" value="20" readonly>
                                </span>
                            </div>
                          </div>
                          <div class="span12 show_grace_period hide_all">
                            <div class="span6 control-group">    
                                <label class="control-label">Resume Download Count</label>
                                <span>
                                  <input type="text" class="grace_period_days" name="grace_period_days" value="10" readonly>
                                </span>
                            </div>
                            <div class="span6 control-group">
                                <label class="control-label">Vacancy Count</label>
                                <span>
                                  <input type="text" class="grace_period_days" name="grace_period_days" value="20" readonly>
                                </span>
                            </div>
                          </div>
                          <div class="span12 show_grace_period hide_all">
                            <div class="span6 control-group">    
                                <label class="control-label">Ad Count</label>
                                <span>
                                  <input type="text" class="grace_period_days" name="grace_period_days" value="30" readonly>
                                </span>
                            </div>
                          </div>
                          <?php else: ?>
                            <div class="empty_subscription_section">
                              <p> This Organization has <span> no subscription </span> plans. </p>
                            </div>
                          <?php endif; ?>
                      </div>
                    <?php } ?>
                    <!-- <div class="tab-pane" id="tab4">
                      <h4>Validity Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              // if($provider_full_profile['is_email_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              // if($provider_full_profile['is_email_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            // echo $provider_full_profile['is_email_validity']; ?>" class="verification tabfield4 tabfield" name="email_valid" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">SMS Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              // if($provider_full_profile['is_sms_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              // if($provider_full_profile['is_sms_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            // echo $provider_full_profile['is_sms_validity']; ?>" class="verification tabfield4 tabfield" name="sms_valid" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Resume Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              // if($provider_full_profile['is_resume_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              // if($provider_full_profile['is_resume_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            // echo $provider_full_profile['is_resume_validity']; ?>" class="verification tabfield4 tabfield" name="resume_valid" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Subscription Status</label>
                          <span>
                            <select name="subscription_status" class="tabfield4 tabfield">
                              <option value=""> Please select status </option>
                              <option value="1" <?php 
                              // if($provider_full_profile['organization_subscription_status']==1) echo "selected"; ?>> Active </option>
                              <option value="0" <?php 
                              // if($provider_full_profile['organization_subscription_status']==0) echo "selected"; ?>> Inactive </option>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div> -->
                    <?php
                    endif;
                    ?>
                    <ul class="pager wizard">
                      <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
                      <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
                      <li class="finish disabled"><button type="submit">Finish<i class="icon-ok"></i></button></li>
                    </ul>
                    <div class="clearfix"> </div>
                  </div>  
                </div>
                <input type="hidden" class="hidden_id" value="<?php echo $provider_full_profile['org_id']; ?>" />
                <?php
                endif;
                ?>
              </form>
              <?php if(!$this->input->is_ajax_request()) { ?>
            </div>
          </div><!--popup body-->
        	<p>
            <a data-popup-close="popup_section_profile" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="popup_section_profile" href="#">x</a>
        </div>
      </div> <!--end full and Edit-->
      
      
       <!---Visitors Count-->
      <div class="popup visit_details_section" data-popup="provider_visit_details_section">
        <?php } ?>
        <?php
        if(!empty($provider_visit_details)) :
        ?>
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Visitors Count
              </h4>                        
            </div>
            <div class="widget-body">
            	<table class="bordered table table-striped table-hover table-bordered visit_details_table">
                      <thead>
                        <tr class="">
                          <th> Candidate Id </th>
                          <th> IP Address </th>
                          <th> User Agent </th>
                          <th> Count </th>
                          <th> User Type </th>
                          <th> Created Date </th>
                        </tr>  
                      </thead>
                      <tbody>
                        <?php
                        foreach ($provider_visit_details as $val) :
                        ?>
                        <tr>
                          <td> <?php if(!empty($val['candidate_id'])) echo $val['candidate_id']; else echo "NULL"; ?> </td>
                          <td> <?php echo $val['ip_address']; ?> </td>
                          <td> <?php echo $val['user_agent']; ?> </td>
                          <td> <?php echo $val['count']; ?> </td>
                          <td> <?php echo ($val['user_type']==0 ? "Guest" : ($val['user_type']==1 ? "Provider" : "Seeker")); ?> </td>
                          <td> <?php echo date('d/m/Y',strtotime($val['created_date'])); ?> </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                      </tbody> 
                 </table>        
            </div><!--widget-body-->
          </div>
          <p>
            <a data-popup-close="provider_visit_details_section" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="provider_visit_details_section" href="#">x</a>
        </div>
        <?php
        endif;
        ?>
        <?php if(!$this->input->is_ajax_request()) { ?>
      </div> <!--End Visitors count popup-->

      <!--Personal Banking-->
      <div class="popup personal_banking" data-popup="popup_plan_activate">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Plan Activation for Personal Banking
              </h4>                        
            </div>
            <div class="widget-body form">
              <form class="plan_bank_details_form" action="job_provider_plan_validation" data-index="" method="POST" data-mode="update">
                <?php } ?>
                <?php
                if((!empty($bank_details) && !empty($bank_details_mode) && $bank_details_mode=="edit") || (!empty($bank_details_mode) && $bank_details_mode=="add")) :
                ?>                     
                <div id="rootwizard_activate" class="form-wizard job_pro_form">
                <!--Navbar steps-->
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul  id="pro_profile_tabs" class="span12 row-fluid nav nav-pills nav-design">
                          <li class="span-2">
                            <a href="#bank_tab1" data-toggle="tab" class="step">
                              <span class="number">1</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Transaction Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#bank_tab2" data-toggle="tab" class="step">
                              <span class="number">2</span>
                              <span class="desc desc_space"><i class="icon-ok"></i>Plan Details</span>
                            </a>
                           </li>
                        </ul>
                      </div>
                    </div>
                  </div> 
                  <!--End Navbar steps-->
                  <div id="bar" class="progress progress-striped active">
                    <div class="bar"></div>
                  </div>
                  <!--Tab Content-->
                  <div class="tab-content tab_content_scroll">
                    <!--Transaction Detail-->
                    <p class="val_error"> </p>
                    <div class="tab-pane" id="bank_tab1">
                      <h4>Transaction Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Transaction Type</label>
                          <select class="select_banking_type tabfield tabfield1" name="trans_type">
                            <option value="">Select</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                          </select>  
                        </div>
                      </div>  
                      <!--Cash Deposit details-->
                      <div class="cash_detail_holder dn">
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Amount</label>
                            <input type="text" class="tabfield tabfield1" name="cash_amt" maxlength="8">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Issued Date</label>
                            <input type="text" class="tabfield tabfield1" name="cash_date">
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Contact Person Name</label>
                            <input type="text" class="tabfield tabfield1" name="cash_name" maxlength="50">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Contact Mailid</label>
                            <input type="text" class="tabfield tabfield1" name="cash_mail" maxlength="100">
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Contact Number</label>
                            <input type="text" class="tabfield tabfield1" name="cash_num" maxlength="10">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Reference description</label>
                            <input type="text" class="tabfield tabfield1" name="cash_des" maxlength="200">
                          </div>
                        </div>
                      </div> <!--Cash deposit details-->
                      <!--Cheque Deposit details-->
                      <div class="cheque_detail_holder dn">
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Bank Name</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_bank_name" maxlength="50">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Cheque Number</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_code" maxlength="50">
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Amount</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_amt" maxlength="8">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Issued Date</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_date">
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Account Number</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_acc_num" maxlength="50">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Contact Person Name</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_name" maxlength="50">
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Contact Mailid</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_mail" maxlength="100">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Contact Number</label>
                            <input type="text" class="tabfield tabfield1" name="cheque_num" maxlength="10">
                          </div>
                        </div>
                      </div> <!--Cheque deposit details-->
                    </div> <!--End Transaction Detail-->
                    <!--Plan Detail Starts-->
                    <div class="tab-pane" id="bank_tab2">
                      <h4>Plan Details</h4>
                      <?php
                      if(!empty($current_plan)) :
                      ?>
                      <h5 class="bank_details_sub_note">  Note : Recently, this organization has activated <?php echo $current_plan['subscription_plan']; ?> as <?php echo (!empty($current_plan['status']) ? "Renewal" : "New"); ?>. <?php echo (!empty($current_plan['organization_subscription_status']) && $current_plan['organization_subscription_status'] == 1) ? "<span class='icon'> Active </span>" : "<span class='icon icon_expired'> Inactive </span>"; ?> </h5>
                      <?php
                      else :
                      ?>
                      <h5 class="bank_details_sub_note">  Note : This organization has no subscription plan. </h5>
                      <?php
                      endif;
                      ?>

                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Plan Name</label>
                          <select class="control-group tabfield tabfield2" name="plan_name">
                            <?php
                            if(!empty($plan_details)) :
                            foreach ($plan_details as $pla_val) :
                            if(!empty($current_plan['subscription_id']) && $pla_val['subscription_id'] == $current_plan['subscription_id']) {
                              echo "<option value=".$pla_val['subscription_id']." selected> ".$pla_val['subscription_plan']." </option>";
                            }
                            else {
                              echo "<option value=".$pla_val['subscription_id']."> ".$pla_val['subscription_plan']." </option>";
                            }
                            endforeach;
                            endif;
                            ?>
                          </select>  
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Plan type</label>
                          <select class="control-group choose_plan_type tabfield tabfield2" name="plan_type">
                            <option value="">Select</option>
                            <option value="original">Original</option>
                            <option value="upgrade">Upgrade</option>
                            <option value="renewal">Renewal</option>
                          </select>  
                        </div>
                      </div>  
                      <div class="display_upgrade_types dn">
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">SMS Count</label>
                            <input type="text" name="plan_sms" class="tabfield tabfield2">
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label">Email Count</label>
                            <input type="text" name="plan_email"  class="tabfield tabfield2">
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label">Resume Count</label>
                            <input type="text" name="plan_resume" class="tabfield tabfield2">
                          </div>
                        </div>  
                      </div>
                      <div class="span12">  
                        <div class="span6 control-group">
                          <label class="control-label">Transaction ID</label>
                          <input type="text" value="NULL" name="plan_trans_id" class="tabfield tabfield2" readonly>
                        </div>
                      </div> 
                    </div>
                    <!--Plan Detail Ends-->
                    <ul class="pager wizard">
                      <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
                      <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
                      <li class="finish disabled"><button type="submit">Finish<i class="icon-ok"></i></button></li>
                    </ul>
                    <div class="clearfix"> </div>
                  </div>  
                  <input type="hidden" class="tabfield" name="org_id" value="<?php if(!empty($value)) echo $value; ?>" />
                  <!--Tab Content-->
                  <input type="hidden" class="hidden_id" value="<?php if(!empty($bank_details['trans_id'])) echo $bank_details['trans_id']; ?>" />
                </div>
                <?php
                elseif (!empty($bank_details_mode) && $bank_details_mode=="edit") :
                  echo "<div class='status_message'> Nothing to edit transaction and plan details! </div>";
                endif;
                ?>
                <?php
                if(!$this->input->is_ajax_request()) {
                ?>
              </form>
            </div>
          </div><!--popup body-->
          <p>
            <a data-popup-close="popup_plan_activate" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="popup_plan_activate" href="#">x</a>
        </div>
      </div> <!--end full and Edit-->
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
redirect(base_url().'main');
endif;
?>
