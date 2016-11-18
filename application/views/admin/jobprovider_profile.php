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
         <!-- BEGIN SIDEBAR MENU -->
          
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Editable Table
                     <small>Editable Table Sample</small>
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
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <!-- <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn green add_new">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div> -->
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="editable_table.html#">Print</a></li>
                                            <li><a href="editable_table.html#">Save as PDF</a></li>
                                            <li><a href="editable_table.html#">Export to Excel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="space15"></div>

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
                                        <a class="job_edit popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider/teacport_job_provider_profile_ajax" data-mode="edit" data-popup-open="popup-1">
                                          Edit
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_delete" data-id="<?php echo $pro_val['organization_id']; ?>" href="#myModal1" data-toggle="modal">
                                          Delete
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider/teacport_job_provider_profile_ajax"  data-mode="full_view"  data-popup-open="popup-1">
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
            <div class="popup" data-popup="popup-1">
              <div class="popup-inner">
      				  <div class="widget box blue" id="popup_wizard_section">
                  <div class="widget-title">
                    <h4>
                      <i class="icon-reorder"></i> Job Providers Profile
                    </h4>                        
                  </div>
                  <div class="widget-body form pop_details_section">
                    <?php } ?>
                    <?php
                    if(!empty($provider_full_profile)) :
                    ?>
                    <form action="form_wizard.html#" class="form-horizontal">
                      <div class="form-wizard">
                        <div class="navbar steps">
                          <div class="navbar-inner">
                            <ul class="row-fluid">
                              <li class="span4">
                                <a href="form_wizard.html#tab1" data-toggle="tab" class="step active">
                                  <span class="number">1</span>
                                  <span class="desc">
                                    <i class="icon-ok"></i>Organization Details
                                  </span>
                                </a>
                              </li>
                              <li class="span4">
                                <a href="form_wizard.html#tab2" data-toggle="tab" class="step">
                                  <span class="number">2</span>
                                  <span class="desc">
                                    <i class="icon-ok"></i>Registrant Details</span>
                                </a>
                              </li>
                              <?php
                              if(!empty($mode) && $mode=="full_view") :
                              ?>
                              <li class="span4">
                                <a href="form_wizard.html#tab3" data-toggle="tab" class="step">
                                  <span class="number">3</span>
                                  <span class="desc">
                                    <i class="icon-ok"></i>Payment Details</span>
                                </a>
                              </li>
                              <li class="span4">
                                <a href="form_wizard.html#tab4" data-toggle="tab" class="step">
                                  <span class="number">4</span>
                                  <span class="desc">
                                    <i class="icon-ok"></i>Addtional Details</span>
                                </a>
                              </li>
                              <?php
                              else :
                              ?>
                              <li class="span4">
                                <a href="form_wizard.html#tab3" data-toggle="tab" class="step">
                                  <span class="number">3</span>
                                  <span class="desc">
                                    <i class="icon-ok"></i>Addtional Details
                                  </span>
                                </a>
                              </li>
                              <?php
                              endif;
                              ?>
                            </ul>
                          </div>
                        </div>
                        <div id="bar" class="progress progress-striped">
                          <div class="bar"></div>
                        </div>
                        <div class="tab-content">
                          <?php
                          if(!empty($mode) && $mode=="full_view") :
                          ?>
                          <div class="tab-pane active" id="tab1">
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
                                </span>
                                <img src="<?php echo base_url().$provider_full_profile['organization_logo']; ?>" />
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
                                  <?php echo $provider_full_profile['transcation_id']; ?>
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
                            <div class="tab-pane active" id="tab1">
                              <h4>Organization Details</h4>
                              <div class="span12">
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Organization Name</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['organization_name']; ?>" />
                                  </div>
                                </div>
                                <div class="span6 control-group">
                                  <label class="control-label">Organization Logo</label>
                                  <div class="controls input_field_width">
                                    <input type="text" value="<?php echo $provider_full_profile['organization_logo']; ?>" readonly />
                                    <input type="file" />
                                    <img src="<?php echo base_url().$provider_full_profile['organization_logo']; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="span12">
                                <div class="span6 control-group">
                                  <label class="control-label">Institution Type</label>
                                  <div class="controls input_field_width">
                                    <select>
                                      <option> Please select institution type </option>
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
                                  </div>
                                </div>
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Organization Status</label>
                                  <div class="controls input_field_width">
                                    <select>
                                      <option value="1" <?php if($provider_full_profile['organization_status']==1) echo "selected"; ?>> Active </option>
                                      <option value="0" <?php if($provider_full_profile['organization_status']==0) echo "selected"; ?>> Inactive </option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane active" id="tab2">
                              <h4>Organization Address</h4>
                              <div class="span12">
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Organization Address1</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['organization_address_1']; ?>" />
                                  </div>
                                </div>
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Organization Address2</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['organization_address_2']; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="span12">
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Organization Address3</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['organization_address_3']; ?>" />
                                  </div>
                                </div>
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Organization District</label>
                                  <div class="controls input_field_width">
                                    <select>
                                      <option> Please select district </option>
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
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane active" id="tab3">
                              <h4>Registrant Details</h4>
                              <div class="span12">
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Registrant Name</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['registrant_name']; ?>" />
                                  </div>
                                </div>
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Registrant Designation</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['registrant_designation']; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="span12">
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Registrant DOB</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['registrant_date_of_birth']; ?>" />
                                  </div>
                                </div>
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Registrant Email</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['registrant_email_id']; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="span12">
                                <div class="span6 control-group">                                       
                                  <label class="control-label">Registrant Mobile</label>
                                  <div class="controls input_field_width">
                                    <input type="text" class="span6" value="<?php echo $provider_full_profile['registrant_mobile_no']; ?>" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php
                            endif;
                            ?>
                          </div>
                        </div>
                        <div class="form-actions clearfix">
                          <a href="javascript:;" class="btn button-previous">
                            <i class="icon-angle-left"></i> Back 
                          </a>
                          <a href="javascript:;" class="btn btn-primary blue button-next">
                            Continue 
                            <i class="icon-angle-right"></i>
                          </a>
                          <a href="javascript:;" class="btn btn-success button-submit">
                            Submit 
                            <i class="icon-ok"></i>
                          </a>
                        </div>
                      </form>
                      <?php
                      else :
                        echo "<p> No content found </p>";
                      endif;
                      ?>
                      <?php if(!$this->input->is_ajax_request()) { ?>
                    </div>
                  </div>
            		  <p>
                    <a data-popup-close="popup-1" href="#">Close</a>
                  </p>
                  <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
                </div>
              </div>      
              <!-- Delete Popup -->       
              <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        			  <div class="modal-dialog">
        					<div class="modal-content">
        						<div class="modal-body delete_message_style">
        							<input type="hidden" name="delete" id="vId" value=""/>
        							<button type="button" class="close popup_tx" data-dismiss="modal" aria-hidden="true"> &times; </button>
        							<center class="popup_tx">
        								<h5>Are you sure you want to delete this item? </h5>
        							</center>
        						</div>
        						<div id="delete_btn" class="modal-footer footer_model_button" >
        						  <a name="action" class="btn btn-danger popup_btn yes_btn_act" id="popup_btn1" value="Delete">Yes</a>    
        							<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
        						</div>
        				  </div><!--/row-->
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
