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
            <small>Job Seekers</small>
          </h3>
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Job Seekers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/job_seeker_profile">Job Seeker Profile</a>
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
                <i class="icon-reorder"></i>Job Seeker Profile 
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
                          <th> Candidate Name </th>
                          <th> Is Fresher </th>
                          <th> Live District </th>
                          <th> Email </th>
                          <th> Mobile No </th>
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
                      <tbody class="table_content_section"> 
                        <?php } ?>
                        <?php
                        if(!empty($seeker_profile))  :
                        ?>   
                        <?php
                          foreach ($seeker_profile as $pro_val) :
                          ?>                                  
                        <tr class="parents_tr" id="column">
                          <td class="">
                            <?php echo $pro_val['candidate_name']; ?>
                          </td>
                          <td class="">
                            <?php 
                            if($pro_val['candidate_is_fresher']==1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?> 
                          </td>
                          <td class="">
                            <?php echo $pro_val['district_name']; ?>
                          </td>
                          <td class="">
                            <?php echo $pro_val['candidate_email']; ?>
                          </td>
                          <td class="">
                            <?php echo $pro_val['candidate_mobile_no']; ?>
                          </td>
                          <td class="">
                            <?php 
                            if($pro_val['candidate_status']==1) :
                              echo "Active";
                            else :
                              echo "Inactive";
                            endif;
                            ?>  
                          </td>
                          <td class=""> 
                            <?php echo date('d-m-Y',strtotime($pro_val['candidate_created_date'])); ?>
                          </td>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>                                      
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $pro_val['candidate_id']; ?>" data-href="job_seeker/teacport_job_seeker_profile_ajax" data-mode="edit" data-popup-open="popup_section">
                              Edit
                            </a>
                          </td>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                          <td>
                            <a class="job_delete pop_delete_action" data-id="<?php echo $pro_val['candidate_id']; ?>">
                              Delete
                            </a> 
                          </td>
                          <?php endif; ?>
                          <td>
                            <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['candidate_id']; ?>" data-href="job_seeker/teacport_job_seeker_profile_ajax"  data-mode="full_view"  data-popup-open="popup_section">
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
              <form class="tab_form" action="job_seeker/teacport_job_seeker_profile" data-index="" method="POST" data-mode="update">
                <?php
                if(!empty($seeker_full_profile)) :
                ?>
                <div id="rootwizard" class="form-wizard">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul  class="row-fluid nav nav-pills">
                          <li class="span2">
                            <a href="#tab1" data-toggle="tab" class="step step_menus active">
                            <span class="number seeker_tab_num">1</span>
                            <span class="desc seeker_tab_desc_info"><i class="icon-ok"></i>Basic Info-1</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab2" data-toggle="tab" class="step step_menus">
                              <span class="number seeker_tab_num">2</span>
                              <span class="desc seeker_tab_desc_info"><i class="icon-ok"></i>Basic Info-2</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab3" data-toggle="tab" class="step step_menus">
                              <span class="number seeker_tab_num">3</span>
                              <span class="desc seeker_tab_desc_info"><i class="icon-ok"></i>Contact Info</span>
                            </a>
                          </li>
                          <?php
                          if(!empty($mode) && $mode=="full_view") :
                          ?>
                          <li class="span2">
                            <a href="#tab4" data-toggle="tab" class="step step_menus">
                              <span class="number seeker_tab_num">4</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Educational<br /> Info</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab5" data-toggle="tab" class="step step_menus">
                              <span class="number seeker_tab_num">5</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Experience<br /> Info</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab6" data-toggle="tab" class="step step_menus">
                              <span class="number seeker_tab_num">6</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Professional<br /> Info</span>
                            </a>
                          </li>
                          <?php
                          elseif(!empty($mode) && $mode=="edit") :
                          ?>
                          <li class="span2">
                            <a href="#tab4" data-toggle="tab" class="step">
                              <span class="number seeker_tab_num">4</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Professional<br /> Info</span>
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
                    <?php
                    foreach ($seeker_full_profile as $see_key => $see_val) :
                    ?>
                    <input type="hidden" value="view" id="popup_mode" />
                    <div class="tab-pane" id="tab1">
                      <h4>Candidate Basic Info-1</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_name']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Gender</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_gender']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Father Initial</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_father_initial']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Father Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_father_name']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Date Of Birth</label>
                          <span class="dynamic_data"> 
                            <?php echo date('d-m-Y',strtotime($see_val['candidate_date_of_birth'])); ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Marital Status</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_marital_status']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Mother Tongue</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['mother_tongue']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Language Known</label>
                          <span class="dynamic_data"> 
                            <?php
                            $lan_array = explode(',',$see_val['candidate_language_known']);
                            if(!empty($language_values)) :
                            foreach ($language_values as $lan_val) :
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
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Nationality</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_nationality']; ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Candidate Basic Info-2</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Religion</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Community</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_community']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Is Physically Challenged</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_is_physically_challenged']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Registration Type</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_registration_type']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Image Path</label>
                          <span class="dynamic_data"> 
                            <img class="popup_preview" src="<?php echo base_url().$see_val['candidate_image_path']; ?>" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Facebook url</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($see_val['candidate_facebook_url'])) :
                              echo $see_val['candidate_facebook_url'];
                            else :
                              echo "Null";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Google Plus url</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($see_val['candidate_googleplus_url'])) :
                              echo $see_val['candidate_googleplus_url'];
                            else :
                              echo "Null";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Linkedin url</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($see_val['candidate_linkedin_url'])) :
                              echo $see_val['candidate_linkedin_url'];
                            else :
                              echo "Null";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Status</label>
                          <span class="dynamic_data"> 
                            <?php
                            if($see_val['candidate_status'] == 1) :
                              echo "Active";
                            else :
                              echo "Inactive  ";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Status</label>
                          <span class="dynamic_data"> 
                            <?php echo date('d-m-Y',strtotime($see_val['candidate_created_date'])); ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                      <h4>Candidate Contact Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_email']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mobile No</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_mobile_no']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">District Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['district']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Address 1</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_address_1']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Address 2</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_address_2']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Live District Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['live_district']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Pincode</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_pincode']; ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                      <h4>Candidate Educational Info</h4>
                      <div class="span12">
                        <table class="seeker_profile_education">
                          <thead>
                            <tr>
                              <th> Qualification </th>
                              <th> Year Of Passing </th>
                              <th> Language </th>
                              <th> Department </th>
                              <th> Percentage </th>
                              <th> Board </th>
                              <th> Status </th>
                              <th> Created Date </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if(!empty($see_val['candidate_education_details'])) :
                            foreach ($see_val['candidate_education_details'] as $edu_key => $edu_val) :
                            ?>
                            <tr>
                              <td> <?php echo $edu_val['educational_qualification']; ?> </td>
                              <td> <?php echo $edu_val['candidate_education_yop']; ?> </td>
                              <td> <?php echo $edu_val['language_name']; ?> </td>
                              <td> <?php echo $edu_val['departments_name']; ?> </td>
                              <td> <?php echo $edu_val['candidate_education_percentage']." %"; ?> </td>
                              <td> <?php echo $edu_val['edu_board']; ?> </td>
                              <td> 
                                <?php
                                if($edu_val['candidate_education_status'] == 1) :
                                  echo "Active";
                                else :
                                  echo "Inactive";
                                endif;
                                ?> 
                              </td>
                              <td> <?php echo date('d-m-Y',strtotime($edu_val['candidate_education_created_date'])); ?></td>
                            </tr>
                            <?php
                            endforeach;
                            endif;
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                      <h4>Candidate Experience Info</h4>
                      <div class="span12">
                        <table class="seeker_profile_education">
                          <thead>
                            <tr>
                              <th> Class Level </th>
                              <th> Experience Year </th>
                              <th> Experience Board </th>
                              <th> Experience Status </th>
                              <th> Created Date </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if(!empty($see_val['candidate_experience_details'])) :
                            foreach ($see_val['candidate_experience_details'] as $exp_key => $exp_val) :
                            ?>
                            <tr>
                              <td> <?php echo $exp_val['class_level']; ?> </td>
                              <td> <?php echo $exp_val['candidate_experience_year']; ?> </td>
                              <td> <?php echo $exp_val['exu_board']; ?> </td>
                              <td> 
                                <?php
                                if($exp_val['candidate_experience_status'] == 1) :
                                  echo "Active";
                                else :
                                  echo "Inactive";
                                endif;
                                ?> 
                              </td>
                              <td> <?php echo date('d-m-Y',strtotime($exp_val['candidate_experience_created_date'])); ?></td>
                            </tr>
                            <?php
                            endforeach;
                            endif;
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab6">
                      <h4>Candidate Prefessional Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Institution Type</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['institution_type_name']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">TET Exam Status</label>
                          <span class="dynamic_data"> 
                            <?php
                            if($see_val['candidate_tet_exam_status'] == 1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Interest Subject</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['edu_interest_sub']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Extra Curricular</label>
                          <span class="dynamic_data"> 
                            <?php
                            foreach ($see_val['extra_curricular_details'] as $value) :
                            ?>
                            <span> <?php echo $value; ?> </span>
                            <?php
                            endforeach;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Is Fresher</label>
                          <span class="dynamic_data"> 
                            <?php
                            if($see_val['candidate_is_fresher'] == 1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Resume Upload Path</label>
                          <span class="dynamic_data"> 
                            <?php echo $see_val['candidate_resume_upload_path']; ?>
                            <a href="<?php echo base_url().$see_val['candidate_resume_upload_path']; ?>"> Open </a>
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
                    foreach ($seeker_full_profile as $see_key => $see_val) :
                    ?>
                    <input type="hidden" value="edit" id="popup_mode" />
                    <p class="val_error"> </p>
                    <div class="tab-pane active" id="tab1">
                      <h4>Candidate Basic Info-1</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Name</label>
                          <span>
                            <input type="text" class="span6 tabfield1 tabfield" value="<?php echo $see_val['candidate_name']; ?>" name="cand_name" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Gender</label>
                          <span>
                            <select name="cand_gen" class="popup_select tabfield1 tabfield">
                              <option value="">Please select gender</option>
                              <option value="male" <?php if($see_val['candidate_gender']=='male') echo "selected"; ?>>Male</option>
                              <option value="female" <?php if($see_val['candidate_gender']=='female') echo "selected"; ?>>Female</option>
                              <option value="others" <?php if($see_val['candidate_gender']=='others') echo "selected"; ?>>Others</option>
                            </select> 
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Father Name</label>
                          <span>
                            <input type="text" class="span6 tabfield1 tabfield" value="<?php echo $see_val['candidate_father_name']; ?>" name="cand_fa_name" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Date Of Birth</label>
                          <span>
                            <input class=" m-ctrl-medium date-picker dp_width tabfield1 tabfield" size="16" type="text" value="<?php echo $see_val['candidate_date_of_birth']; ?>" name="cand_dob" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Marital Status</label>
                          <input type="radio" class="radio_status" name="mar_status" value="single" <?php if($see_val['candidate_marital_status']=='single') echo "checked"; ?> />
                            Single
                          <input type="radio" class="radio_status" name="mar_status" value="married" <?php if($see_val['candidate_marital_status']=='married') echo "checked"; ?> />
                            Married
                          <input type="hidden" value="<?php echo $see_val['candidate_marital_status']; ?>" name="cand_mar_status" class="hidden_status tabfield1 tabfield"/>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mother Tongue</label>
                          <span>
                            <select name="cand_moth_ton" class="popup_select tabfield1 tabfield">
                              <option value="">Please select mother tongue</option>
                              <?php
                                if(!empty($language_values)) :
                                foreach ($language_values as $lan_val) :
                                ?>
                                <?php
                                  if($lan_val['language_id']==$see_val['candidate_mother_tongue']) {
                                    echo '<option value='.$lan_val["language_id"].' selected> '.$lan_val["language_name"].' </option>';
                                  }
                                  else {
                                    echo '<option value='.$lan_val["language_id"].'> '.$lan_val["language_name"].' </option>';
                                  }
                                endforeach;
                                  else :
                                    echo '<option value='.$see_val['candidate_mother_tongue'].' selected> "'.$see_val['mother_tongue'].'" </option>';
                                endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                      </div>
                     <!--  <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Languages Known</label>
                            <input type="checkbox" class="known_languages" value="1" checked />  
                              English
                            <input type="checkbox" class="known_languages" value="2" /> 
                              Tamil
                            <input type="hidden" class="tabfield1 tabfield hidden_known_lang" name="cand_known_lang">
                        </div>
                      </div>   --> 
                    </div>
                    <div class="tab-pane active" id="tab2">
                      <h4>Candidate Basic Info-2</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Nationality</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $see_val['candidate_nationality']; ?>" name="cand_nationality" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Religion</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $see_val['candidate_religion']; ?>" name="cand_religion" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Community</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $see_val['candidate_community']; ?>" name="cand_community" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Is Physically Challenged</label>
                          <input type="radio" class="radio_status" name="phy_status" value="yes" <?php if($see_val['candidate_is_physically_challenged']=='yes') echo "checked"; ?> />
                            Yes
                          <input type="radio" class="radio_status" name="phy_status" value="no"  <?php if($see_val['candidate_is_physically_challenged']=='no') echo "checked"; ?> />
                            No
                          <input type="hidden" value="<?php echo $see_val['candidate_is_physically_challenged']; ?>" name="cand_phy" class="hidden_status tabfield2 tabfield"/>                        
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Image</label>
                          <span>
                            <a class="btn upload_option"> Upload </a>
                            <input class="form-control hidden_upload tabfield2 tabfield" name="cand_img" type="file">
                            <img src="<?php echo base_url().$see_val['candidate_image_path']; ?>" class="popup_preview">
                            <input type="hidden" value="<?php echo $see_val['candidate_image_path']; ?>" class="tabfield2 tabfield" name="old_file_path" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Candidate Status</label>
                          <span>
                            <select name="cand_status" class="popup_select tabfield2 tabfield">
                              <option value="">Please select status</option>
                              <option value="1" <?php if($see_val['candidate_status']==1) echo "selected"; ?>>Active</option>
                              <option value="0" <?php if($see_val['candidate_status']==0) echo "selected"; ?>>Inactive</option>
                            </select> 
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane active" id="tab3">
                      <h4>Candidate Contact Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $see_val['candidate_email']; ?>" name="cand_email" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Mobile No</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $see_val['candidate_mobile_no']; ?>" name="cand_mobile" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">District Name</label>
                          <span>
                            <select name="cand_district" class="popup_select tabfield3 tabfield">
                              <option value="">Please select district</option>
                              <?php
                              if(!empty($district_values)) :
                              foreach ($district_values as $dis_val) :
                              ?>
                              <?php
                                if($dis_val['district_id']==$see_val['candidate_district_id']) {
                                  echo '<option value='.$dis_val["district_id"].' selected> '.$dis_val["district_name"].' </option>';
                                }
                                else if($dis_val['district_status']==1){
                                  echo '<option value='.$dis_val["district_id"].'> '.$dis_val["district_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$see_val['candidate_district_id'].' selected> "'.$see_val['district'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Address 1</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $see_val['candidate_address_1']; ?>" name="cand_address1" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Address 2</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $see_val['candidate_address_2']; ?>" name="cand_address2" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Live District</label>
                          <span>
                            <select name="cand_live_district" class="popup_select tabfield3 tabfield">
                              <option value="">Please select live district</option>
                              <?php
                              if(!empty($district_values)) :
                              foreach ($district_values as $dis_val) :
                              ?>
                              <?php
                                if($dis_val['district_id']==$see_val['candidate_live_district_id']) {
                                  echo '<option value='.$dis_val["district_id"].' selected> '.$dis_val["district_name"].' </option>';
                                }
                                else if($dis_val['district_status']==1){
                                  echo '<option value='.$dis_val["district_id"].'> '.$dis_val["district_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$see_val['candidate_live_district_id'].' selected> "'.$see_val['live_district'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Pincode</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $see_val['candidate_pincode']; ?>" name="cand_pincode" />
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane active" id="tab4">
                      <h4>Candidate Professional Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Institution Type</label>
                          <span>
                            <select name="cand_institution" class="popup_select tabfield4 tabfield">
                              <option value="">Please select institution</option>
                              <?php
                              if(!empty($instution_values)) :
                              foreach ($instution_values as $ins_val) :
                              ?>
                              <?php
                                if($ins_val['institution_type_id']==$see_val['candidate_institution_type']) {
                                  echo '<option value='.$ins_val["institution_type_id"].' selected> '.$ins_val["institution_type_name"].' </option>';
                                }
                                else if($ins_val['institution_type_status']==1){
                                  echo '<option value='.$ins_val["institution_type_id"].'> '.$ins_val["institution_type_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$see_val['candidate_institution_type'].' selected> "'.$see_val['institution_type_name'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">TET Exam Status</label>
                          <span>
                            <select name="cand_tet_status" class="popup_select tabfield4 tabfield">
                              <option value="">Please select TET status</option>
                              <option value="1" <?php if($see_val['candidate_tet_exam_status']==1) echo "selected"; ?>>Yes</option>
                              <option value="0" <?php if($see_val['candidate_tet_exam_status']==0) echo "selected"; ?>>No</option>
                            </select>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Interest Subject</label>
                          <span>
                            <select name="cand_int_sub" class="popup_select tabfield4 tabfield">
                              <option value="">Please select subject</option>
                              <?php
                              if(!empty($subject_values)) :
                              foreach ($subject_values as $sub_val) :
                              ?>
                              <?php
                                if($sub_val['subject_id']==$see_val['candidate_interest_subject_id']) {
                                  echo '<option value='.$sub_val["subject_id"].' selected> '.$sub_val["subject_name"].' </option>';
                                }
                                else {
                                  echo '<option value='.$sub_val["subject_id"].'> '.$sub_val["subject_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$see_val['candidate_interest_subject_id'].' selected> "'.$see_val['edu_interest_sub'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Extra Curricular</label>
                          <span>
                            <?php
                            $extr_array = array();
                            foreach ($see_val['extra_curricular_details'] as $extr_key => $extr_val) :
                              $extr_array[] = $extr_key;
                            endforeach;
                            ?>
                            <select data-placeholder="select" name="cand_extra" class="chosen span6 popup_select tabfield4 tabfield" multiple="multiple" >
                              <?php
                              if(!empty($extra_curricular_values)) :
                              foreach ($extra_curricular_values as $ext_val) :
                              ?>
                              <?php
                                if(in_array($ext_val['extra_curricular_id'], $extr_array)) {
                                  echo '<option value='.$ext_val["extra_curricular_id"].' selected> '.$ext_val["extra_curricular"].' </option>';
                                }
                                else {
                                  echo '<option value='.$ext_val["extra_curricular_id"].'> '.$ext_val["extra_curricular"].' </option>';
                                }
                              endforeach;
                              else :
                                foreach ($see_val['extra_curricular_details'] as $extr_key => $extr_val) :
                                  echo '<option value='.$extr_key.' selected> "'.$extr_val.'" </option>';
                                endforeach;  
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Fresher</label>
                          <span>
                            <select name="cand_is_fresh" class="popup_select tabfield4 tabfield">
                              <option value="">Please select status</option>
                              <option value="1" <?php if($see_val['candidate_is_fresher']==1) echo "selected"; ?>>Yes</option>
                              <option value="0" <?php if($see_val['candidate_is_fresher']==0) echo "selected"; ?>>No</option>
                            </select> 
                          </span>
                        </div>
                      </div>
                    </div> 
                    <input type="hidden" class="hidden_id" value="<?php echo $see_key; ?>" />
                    <?php
                    endforeach;
                    ?>
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
      <!-- END ADVANCED TABLE widget-->
      <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
  </div>
</div>
  <!-- END PAGE -->
  <script>
    // Define default values
    var inputType = new Array("text","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("state_name","state_status"); // Set name of input types
    var placeholder = new Array("Enter State Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var organization_institution_type_id_option = new Array("Please select institution");
    var organization_institution_type_id_value = new Array("");  
    var state_status_option = new Array("Please select status","Active","Inactive"); 
    var state_status_value = new Array("","1","0");
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>
