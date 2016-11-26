<?php
if(!empty($this->session->userdata("login_status"))): 
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
                           <a href="editable_table.html#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="<?php echo base_url(); ?>admin/job_provider_profile">Job Providers</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/job_provider_profile">Job Provider Profile</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Job Provider Profile </h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
				                  <div class="btn-group">
				                    <button id="sample_editable_1_new" class="btn green add_new">
				                      Add New <i class="icon-plus"></i>
				                    </button>
				                  </div>
				                </div>
                                <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                  <thead>
                                    <tr class="ajaxTitle">
                                      <th> Organization Name </th>
                                      <th> Registrant Name </th>
                                      <th> Profile Completeness </th>
                                      <th> Transaction ID </th>
                                      <th> Subcription Plan </th>
                                      <th> Status </th>
                                      <th> Created Date</th>
                                      <th> Edit </th>
                                      <th> Delete </th>
                                      <th> Full Details </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    if(!empty($provider_profile))  :
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
                                        if(!empty($pro_val['transcation_id'])) :
                                          echo $pro_val['transcation_id'];
                                        else :
                                          echo "Null";
                                        endif;
                                        ?>   
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
                                      <td class="edit_section">
                                        <a class="job_edit popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider/teacport_job_provider_profile_ajax" data-mode="edit" data-popup-open="popup_section">
                                          Edit
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_delete" onclick="Confirm.show()" data-id="<?php echo $pro_val['organization_id']; ?>">
                                          Delete
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider/teacport_job_provider_profile_ajax"  data-mode="full_view"  data-popup-open="popup_section">
                                          Full View
                                        </a>
                                      </td>
                                    </tr>
                                    <?php
                                    endforeach;
                                    endif;
                                    ?>
                                  </tbody>
                                </table>
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
                            <ul  class="row-fluid nav nav-pills">
                              <li class="span3">
                                <a href="#tab1" data-toggle="tab" class="step active">
                                	<span class="number">1</span>
                                    <span class="desc"><i class="icon-ok"></i>Organization Detail</span>
                                </a>
                              </li>
                              <li class="span3">
                                <a href="#tab2" data-toggle="tab" class="step">
                                	<span class="number">2</span>
                                    <span class="desc"><i class="icon-ok"></i>Registrant Details</span>
                                </a>
                              </li>
                              <?php
                              if(!empty($mode) && $mode=="full_view") :
                              ?>
                              <li class="span3">
                                <a href="#tab3" data-toggle="tab" class="step">
                                	<span class="number">3</span>
                                    <span class="desc"><i class="icon-ok"></i>Payment Details</span>
                                </a>
                              </li>
                              <li class="span3">
                                <a href="#tab4" data-toggle="tab" class="step">
                                	<span class="number">4</span>
                                    <span class="desc"><i class="icon-ok"></i>Addtional Details</span>
                                </a>
                              </li>
                              <?php
                              else :
                              ?>
                              <li class="span3">
                                <a href="#tab3" data-toggle="tab" class="step">
                                	<span class="number">3</span>
                                    <span class="desc"><i class="icon-ok"></i>Addtional Details</span>
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
                                <img src="<?php echo base_url().$provider_full_profile['organization_logo']; ?>" />
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
                        <div class="tab-pane" id="tab3">
                          <h4>Payment Details</h4>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Subscription Plan</label>
                              <span class="dynamic_data"> 
                                <?php echo $provider_full_profile['subscription_plan']; ?>
                              </span>                         
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Subscription Price</label>
                              <span class="dynamic_data"> 
                                <?php echo $provider_full_profile['subscription_price']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Subcription Features</label>
                              <span class="dynamic_data"> 
                                <?php echo $provider_full_profile['subscription_features']; ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Subcription Validitity</label>
                              <span class="dynamic_data"> 
                                <?php echo $provider_full_profile['subcription_valid_upto']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">
                              <label class="control-label">Transcation Id</label>
                              <span class="dynamic_data"> 
                                <?php 
                                if(!empty($provider_full_profile['transcation_id'])) :
                                  echo $provider_full_profile['transcation_id'];
                                else :
                                  echo "Null";
                                endif;
                                ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Subcription Status</label>
                              <span class="dynamic_data"> 
                                <?php 
                                if($provider_full_profile['subscription_status']==1) :
                                  echo "Active";
                                else :
                                  echo "Inactive";
                                endif;
                                ?>
                              </span>
                            </div>
                          </div>
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
                                <input class="form-control hidden_upload tabfield1 tabfield" name="organization_logo" type="file" >
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
                        <?php
                        endif;
                        ?>
                        <ul class="pager wizard">
                          <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
                          <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
                          <li class="finish disabled"><a href="#">Finish<i class="icon-ok"></i></a></li>
                        </ul>
                      </div>  
                    </div>
                    <input type="hidden" class="hidden_id" value="<?php echo $provider_full_profile['organization_id']; ?>" />
                    <?php
                    else :
                      echo "<p> No content found </p>";
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
