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
              <a href="<?php echo base_url(); ?>admin/job_provider_vacancies">Job Provider Vacancies</a>
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
                <i class="icon-reorder"></i>Job Provider Vacancies
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                </div>
                <form action="job_provider/teacport_job_provider_vacancies">
                  <p class="admin_status"> </p>
                  <div class="table_content_section">
                    <?php } ?>
                    <?php
                    if(!empty($provider_vacancy))  :
                    ?>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th> Vacancies Job Title </th>
                          <th> Organization Name </th>
                          <th> Available </th>
                          <th> Open Date </th>
                          <th> Close Date </th>
                          <th> Status </th>
                          <th> Created Date</th>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                            <th class="data_action">Edit</th>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                            <th class="data_action">Delete</th>
                        <?php endif; ?>
                          <th class="data_action"> Full View </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($provider_vacancy as $vac_val) :
                        ?>                                   
                        <tr class="parents_tr" id="column">
                          <td class=""> 
                            <?php echo $vac_val['vacancies_job_title']; ?>
                          </td>
                          <td class="">
                            <?php echo $vac_val['organization_name']; ?>
                          </td>
                          <td class=""> 
                            <?php echo $vac_val['vacancies_available']; ?>
                          </td>
                          <td class=""> 
                            <?php echo date("d/m/Y", strtotime($vac_val['vacancies_open_date'])) ; ?>
                          </td>
                          <td class=""> 
                             <?php echo date("d/m/Y", strtotime($vac_val['vacancies_close_date'])) ; ?>
                          </td>
                          <td class=""> 
                            <?php 
                            if($vac_val['vacancies_status']==1) :
                              echo "Active";
                            else :
                              echo "Inactive";
                            endif;
                            ?> 
                          </td>
                          <td class=""> 
                            <?php 
                              $created_datetime = explode(' ', $vac_val['vacancies_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?>
                          </td> 
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>    
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $vac_val['vacancies_id']; ?>" data-href="job_provider/teacport_job_provider_vacancy_ajax" data-mode="edit" data-popup-open="popup-1">
                              Edit
                            </a>
                          </td>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                          <td>
                            <a class="job_delete pop_delete_action" onclick="Confirm.show()" data-id="<?php echo $vac_val['vacancies_id']; ?>">
                              Delete
                            </a>
                          </td>
                          <?php endif; ?>
                          <td>
                            <a class="job_full_view popup_fields" data-id="<?php echo $vac_val['vacancies_id']; ?>" data-href="job_provider/teacport_job_provider_vacancy_ajax"  data-mode="full_view" data-popup-open="popup-1">
                              Full View
                            </a>
                          </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                      </tbody>
                    </table>                  
                    <?php 
                    endif;
                    ?>
                    <?php if(!$this->input->is_ajax_request()) { ?> 
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE widget-->
        </div>
      </div>
            
            <!---Full edit popup -->
            <div class="popup" data-popup="popup-1">
              <div class="popup-inner">
                <div class="widget box blue" id="popup_wizard_section">
                  <div class="widget-title">
                    <h4>
                      <i class="icon-reorder"></i> Job Providers Vacancies
                    </h4>                        
                  </div>
                  <div class="widget-body form pop_details_section">
                    <?php } ?>
                    <form class="tab_form" action="job_provider/teacport_job_provider_vacancies" data-index="" method="POST" data-mode="update">
                    <?php
                    if(!empty($provider_full_vacancies)) :
                    ?>
                    <div id="rootwizard"  class="form-wizard">
                      <div class="navbar steps">
                        <div class="navbar-inner">
                          <div class="container">
                            <ul class="row-fluid nav nav-pills">
                              <li class="span-2">
                                <a href="#tab1" data-toggle="tab" class="step active">
                                	<span class="number">1</span>
                                    <span class="desc"><i class="icon-ok"></i>Vacancies Details</span>
                                </a>
                              </li>
                              <li class="span-2">
                                <a href="#tab2" data-toggle="tab" class="step">
                                	<span class="number">2</span>
                                    <span class="desc"><i class="icon-ok"></i>Vacancies Pre-Requisite</span>
                                </a>
                              </li>
                              <li class="span-2">
                                <a href="#tab3" data-toggle="tab" class="step">
                                	<span class="number">3</span>
                                    <span class="desc"><i class="icon-ok"></i>Vacancies Instructions</span>
                                </a>
                              </li>
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
                        <?php
                        foreach ($provider_full_vacancies as $vac_val) :
                        ?>
                        <input type="hidden" value="view" id="popup_mode" />
                        <div class="tab-pane" id="tab1">
                          <h4>Vacancies Details</h4>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Vacancies Job Title</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['vacancies_job_title']; ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Organization Name</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['organization_name']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label"> Available </label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['vacancies_available']; ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label"> Open Date </label>
                              <span class="dynamic_data"> 
                                <?php echo date("d/m/Y", strtotime($vac_val['vacancies_open_date'])) ; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label"> Close Date </label>
                              <span class="dynamic_data"> 
                                <?php echo date("d/m/Y", strtotime($vac_val['vacancies_close_date'])) ; ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label"> Salary </label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['vacancies_start_salary']." to ".$vac_val['vacancies_end_salary']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">
                              <label class="control-label"> Posting Name </label>
                              <span class="dynamic_data"> 
                                <?php
                                if(!empty($vac_val['posting_name'])) :
                                  echo $vac_val['posting_name'];
                                else :
                                  echo "NULL";
                                endif;
                                ?>
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label"> Status </label>
                              <span class="dynamic_data"> 
                                <?php 
                                if($vac_val['vacancies_status']==1) :
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
                          <h4>Vacancies Pre-Requisite</h4>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Qualification Name</label>
                              <span class="dynamic_data"> 
                                <?php
                                foreach ($vac_val['educational_qualification_id'] as $qua_val) :
                                  echo $qua_val;
                                  echo " ";
                                endforeach;
                                ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Experience</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['vacancies_experience']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Class Level</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['class_level']; ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">University Board Name</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['university_board_name']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">
                              <label class="control-label"> Department Name </label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['departments_name']; ?>
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">Subject Name</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['subject_name']; ?>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                          <h4>Vacancies Instructions</h4>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Vacancies Medium</label>
                              <span class="dynamic_data"> 
                                <?php
                                $lan_array = explode(',',$vac_val['vacancies_medium']);
                                if(!empty($medium_language_values)) :
                                foreach ($medium_language_values as $lan_val) :
                                ?>
                                <?php
                                if(in_array($lan_val['language_id'], $lan_array)) {
                                  echo '<span> '.$lan_val["language_name"].' </span>';
                                }
                                endforeach;
                                endif;
                                ?>
                              </span>                         
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Accommodation Info</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['vacancies_accommodation_info']; ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">
                              <label class="control-label">Interview Start Date</label>
                              <span class="dynamic_data"> 
                                <?php echo date("d/m/Y", strtotime($vac_val['vacancies_interview_start_date'])); ?>
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Interview End Date</label>
                              <span class="dynamic_data"> 
                                <?php echo date("d/m/Y", strtotime($vac_val['vacancies_end_date'])); ?>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">
                              <label class="control-label">Instruction</label>
                              <span class="dynamic_data"> 
                                <?php echo $vac_val['vacancies_instruction']; ?>
                              </span>
                            </div>
                          </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                        <?php
                        else :
                        ?>
                        <?php
                        foreach ($provider_full_vacancies as $vac_key => $vac_val) :
                        ?>
                        <input type="hidden" value="edit" id="popup_mode" />
                        <p class="val_error"> </p>
                        <div class="tab-pane" id="tab1">
                          <h4>Vacancies Details</h4>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Vacancies Job Title</label>
                              <span>
                                <input type="text" value="<?php echo $vac_val['vacancies_job_title']; ?>" name="job_title" class="span6 tabfield1 tabfield" />
                              </span>
                            </div>
                            <div class="span6 control-group">
                              <label class="control-label">Organization Name</label>
                              <span>
                                <select name="org_name" class="tabfield1 tabfield">
                                  <option value=""> Please select organization </option>
                                  <?php
                                  if(!empty($org_values)) :
                                  foreach ($org_values as $org_val) :
                                  ?>
                                    <?php
                                    if($org_val['organization_id']==$vac_val['vacancies_organization_id']) {
                                      echo '<option value='.$org_val["organization_id"].' selected> '.$org_val["organization_name"].' </option>';
                                    }
                                    else {
                                      echo '<option value='.$org_val["organization_id"].'> '.$org_val["organization_name"].' </option>';
                                    }
                                  endforeach;
                                  else :
                                    echo '<option value='.$vac_val['vacancies_organization_id'].' selected> "'.$vac_val['organization_name'].'" </option>';
                                  endif;
                                    ?>
                                </select>   
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">
                              <label class="control-label">Available</label>
                              <span>
                                <input type="text" value="<?php echo $vac_val['vacancies_available']; ?>"  name="vac_available" class="span6 tabfield1 tabfield" />
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">Open Date</label>
                              <span>
                                <input class="span6 tabfield1 tabfield m-ctrl-medium date-picker dp_width" size="16" type="text" value="<?php echo date("d/m/Y", strtotime($vac_val['vacancies_open_date'])); ?>" name="vac_open_date" />
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Close Date</label>
                              <span>
                                <input class="span6 tabfield1 tabfield m-ctrl-medium date-picker dp_width" size="16" type="text" value="<?php echo date("d/m/Y", strtotime($vac_val['vacancies_close_date'])); ?>" name="vac_end_date" />
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">Start Salary</label>
                              <span>
                                <input type="text" value="<?php echo $vac_val['vacancies_start_salary']; ?>" name="job_min_salary" class="span6 tabfield1 tabfield" />
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label"> End Salary</label>
                              <span>
                                <input type="text" value="<?php echo $vac_val['vacancies_end_salary']; ?>"  name="job_max_salary" class="span6 tabfield1 tabfield" />
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label"> Status </label>
                              <span>
                                <select name="vac_status" class="tabfield1 tabfield">
                                  <option> Please select status </option>
                                  <option value="1" <?php if($vac_val['vacancies_status']==1) echo "selected"; ?>> Active </option>
                                  <option value="0" <?php if($vac_val['vacancies_status']==0) echo "selected"; ?>> Inactive </option>
                                </select>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                          <h4>Vacancies Pre-Requisite</h4>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Qualification Name</label>
                              <span class="multi_choice">
                                <?php
                                $qua_array = array();
                                foreach ($vac_val['educational_qualification_id'] as $qua_key => $qua_val) :
                                  $qua_array[] = $qua_key;
                                endforeach;
                                ?>
                                <select data-placeholder="select" name="qualification_name" class="chosen span6 tabfield2 tabfield" multiple="multiple" >
                                  <?php
                                  if(!empty($qualification_values)) :
                                  foreach ($qualification_values as $qua_val) :
                                  ?>
                                  <?php
                                    if(in_array($qua_val['educational_qualification_id'], $qua_array)) {
                                      echo '<option value='.$qua_val["educational_qualification_id"].' selected> '.$qua_val["educational_qualification"].' </option>';
                                    }
                                    else if($qua_val['educational_qualification_status']==1){
                                      echo '<option value='.$qua_val["educational_qualification_id"].'> '.$qua_val["educational_qualification"].' </option>';
                                    }
                                  endforeach;
                                  else :
                                    foreach ($vac_val['educational_qualification_id'] as $qua_key => $qua_val) :
                                      echo '<option value='.$qua_key.' selected> "'.$qua_val.'" </option>';
                                    endforeach;  
                                  endif;
                                  ?>
                                </select>
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">Experience</label>
                              <span>
                                <input type="text" value="<?php echo $vac_val['vacancies_experience']; ?>"  name="vac_experience" class="span6 tabfield2 tabfield" />
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Class Level</label>
                              <span>
                                <select name="vac_class" class="span6 tabfield2 tabfield">
                                <option value=""> Please select class level </option>
                                <?php
                                if(!empty($class_levels)) :
                                foreach ($class_levels as $cls_val) :
                                ?>
                                <?php
                                  if($cls_val['class_level_id']==$vac_val['vacancies_class_level_id']) {
                                    echo '<option value='.$cls_val["class_level_id"].' selected> '.$cls_val["class_level"].' </option>';
                                  }
                                  else if($cls_val['class_level_status']==1){
                                    echo '<option value='.$cls_val["class_level_id"].'> '.$cls_val["class_level"].' </option>';
                                            }
                                endforeach;
                                else :
                                  echo '<option value='.$vac_val['vacancies_class_level_id'].' selected> "'.$vac_val['class_level'].'" </option>';
                                endif;
                                ?>
                                </select>
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">University Board Name</label>
                              <span>
                                <select name="vac_univ_name" class="span6 tabfield2 tabfield">
                                  <option value=""> Please select University </option>
                                  <?php
                                  if(!empty($university_values)) :
                                  foreach ($university_values as $unv_val) :
                                  ?>
                                  <?php
                                    if($unv_val['education_board_id']==$vac_val['vacancies_university_board_id']) {
                                      echo '<option value='.$unv_val["education_board_id"].' selected> '.$unv_val["university_board_name"].' </option>';
                                    }
                                    else if($unv_val['university_board_status']==1){
                                      echo '<option value='.$unv_val["education_board_id"].'> '.$unv_val["university_board_name"].' </option>';
                                    }
                                  endforeach;
                                  else :
                                    echo '<option value='.$vac_val['vacancies_university_board_id'].' selected> "'.$vac_val['university_board_name'].'" </option>';
                                  endif;
                                  ?>
                                </select>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Department Name</label>
                              <span>
                                <select name="vac_dept_name" class="span6 tabfield2 tabfield">
                                  <option value=""> Please select department </option>
                                  <?php
                                  if(!empty($department_values)) :
                                  foreach ($department_values as $dep_val) :
                                  ?>
                                  <?php
                                    if($dep_val['departments_id']==$vac_val['vacancies_department_id']) {
                                      echo '<option value='.$dep_val["departments_id"].' selected> '.$dep_val["departments_name"].' </option>';
                                    }
                                    else {
                                      echo '<option value='.$dep_val["departments_id"].'> '.$dep_val["departments_name"].' </option>';
                                    }
                                  endforeach;
                                  else :
                                    echo '<option value='.$vac_val['vacancies_department_id'].' selected> "'.$vac_val['departments_name'].'" </option>';
                                  endif;
                                  ?>
                                </select>
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">Subject Name</label>
                              <span>
                                <select name="vac_sub_name" class="span6 tabfield2 tabfield">
                                  <option value=""> Please select subject </option>
                                  <?php
                                  if(!empty($subject_values)) :
                                  foreach ($subject_values as $sub_val) :
                                  ?>
                                  <?php
                                    if($sub_val['subject_id']==$vac_val['vacancies_subject_id']) {
                                      echo '<option value='.$sub_val["subject_id"].' selected> '.$sub_val["subject_name"].' </option>';
                                    }
                                    else if($sub_val['subject_status']==1){
                                      echo '<option value='.$sub_val["subject_id"].'> '.$sub_val["subject_name"].' </option>';
                                    }
                                  endforeach;
                                  else :
                                    echo '<option value='.$vac_val['vacancies_subject_id'].' selected> "'.$vac_val['subject_name'].'" </option>';
                                  endif;
                                  ?>
                                </select>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                          <h4>Vacancies Instructions</h4>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Posting Name</label>
                              <span>
                                <select name="vac_pos_name" class="span6 tabfield3 tabfield">
                                  <option value=""> Please select posting </option>
                                  <?php
                                  if(!empty($posting_values)) :
                                  foreach ($posting_values as $pos_val) :
                                  ?>
                                  <?php
                                    if($pos_val['posting_id']==$vac_val['vacancies_applicable_posting_id']) {
                                      echo '<option value='.$pos_val["posting_id"].' selected> '.$pos_val["posting_name"].' </option>';
                                    }
                                    else {
                                      echo '<option value='.$pos_val["posting_id"].'> '.$pos_val["posting_name"].' </option>';
                                    }
                                  endforeach;
                                  else :
                                    echo '<option value='.$vac_val['vacancies_department_id'].' selected> "'.$vac_val['posting_name'].'" </option>';
                                  endif;
                                  ?>
                                </select>
                              </span>
                            </div>

                            <div class="span6 control-group">                                       
                              <label class="control-label">Vacancies Medium</label>
                              <span class="multi_choice">
                                <?php
                                $lan_array = explode(',',$vac_val['vacancies_medium']);
                                ?>
                                <select data-placeholder="select" name="vac_medium" class="chosen span6 tabfield3 tabfield" multiple="multiple" >
                                  <?php
                                  if(!empty($medium_language_values)) :
                                  foreach ($medium_language_values as $lan_val) :
                                  ?>
                                  <?php
                                    if(in_array($lan_val['language_id'], $lan_array)) {
                                      echo '<option value='.$lan_val["language_id"].' selected> '.$lan_val["language_name"].' </option>';
                                    }
                                    else{
                                      echo '<option value='.$lan_val["language_id"].'> '.$lan_val["language_name"].' </option>';
                                    }
                                  endforeach;
                                  endif;
                                  ?>
                                </select>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Accommodation Info</label>
                              <span>
                                <input type="text" value="<?php echo $vac_val['vacancies_accommodation_info']; ?>" name="vac_accom" class="span6 tabfield3 tabfield" />
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">Instruction</label>
                              <span>
                                <textarea name="vac_instruction" class="span6 tabfield3 tabfield"> <?php echo $vac_val['vacancies_instruction']; ?> </textarea>
                              </span>
                            </div>
                          </div>
                          <div class="span12">
                            <div class="span6 control-group">                                       
                              <label class="control-label">Interview Start Date</label>
                              <span>
                                <input class="span6 tabfield3 tabfield m-ctrl-medium date-picker dp_width" size="16" type="text" value="<?php echo date("d/m/Y", strtotime($vac_val['vacancies_interview_start_date'])); ?>" name="vac_inter_sdate" />
                              </span>
                            </div>
                            <div class="span6 control-group">                                       
                              <label class="control-label">Interview End Date</label>
                              <span>
                                <input class="span6 tabfield3 tabfield m-ctrl-medium date-picker dp_width" size="16" type="text" value="<?php echo date("d/m/Y", strtotime($vac_val['vacancies_end_date'])); ?>" name="vac_inter_edate"/>
                              </span>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" class="hidden_id" value="<?php echo $vac_key; ?>" />
                        <?php
                        endforeach;
                        ?>
                        <?php
                        endif;
                        ?>
                        <ul class="pager wizard">
                          <li class="previous"><a href="#">Previous</a></li>
                          <li class="next"><a href="#">Next</a></li>
                          <li class="finish disabled"><button type="submit">Finish<i class="icon-ok"></i></button></li>
                        </ul>
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
                  <a data-popup-close="popup-1" href="#">Close</a>
                </p>
                <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
              </div>
            </div>
            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
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