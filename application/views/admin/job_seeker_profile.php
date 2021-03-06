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
  <!-- <div id="sidebar" class="nav-collapse collapse">
   <div class="navbar-inverse">
      <form class="navbar-search visible-phone">
        <input type="text" class="search-query" placeholder="Search" />
      </form>
   </div>
  </div> -->
  <!-- END SIDEBAR -->
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
            <small>Job Seekers</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Job Seekers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/job_seeker_profile">Job Seeker Profile</a>
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
                <form action="job_seeker_profile">
                  <p class="admin_status"> </p>
                  <div class="">  
                    <p class='val_error'> <p>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th> Candidate Registered Id </th>
                          <th> Candidate Name </th>
                          <th> Is Fresher </th>
                          <th> Live State </th>
                          <th> Live District </th>
                          <th> Email </th>
                          <th> Mobile No </th>
                          <th> Status </th>
                          <th> Created Date</th>
                          <!-- <th> Visitors Count </th> -->
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
                            <?php echo $pro_val['candidate_id']; ?>
                          </td>
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
                            <?php 
                            if(!empty($pro_val['district_name'])) {
                              echo $pro_val['state_name'];
                            }
                            else {
                              echo "NULL";
                            }
                            ?>
                          </td>
                          <td class="">
                            <?php 
                            if(!empty($pro_val['district_name'])) {
                              echo $pro_val['district_name'];
                            }
                            else {
                              echo "NULL";
                            }
                            ?>
                          </td>
                          <td class="">
                            <?php echo $pro_val['candidate_email']; ?>
                          </td>
                          <td class="">
                            <?php 
                            if(!empty($pro_val['candidate_mobile_no']) && $pro_val['candidate_mobile_no'] != 0) {
                              echo $pro_val['candidate_mobile_no'];
                            }
                            else {
                              echo "NULL";
                            }
                            ?>
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
                            <?php 
                              $created_datetime = explode(' ', $pro_val['candidate_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?>
                          </td>
                          <!-- <td class=""> 
                          	<a class="job_edit popup_fields" data-id=" " data-href="teacport_job_seeker_profile_ajax" data-mode="edit" data-popup-open="seeker_visitorcount_detail">
                          		150 
                          	</a>
                          </td> -->
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>                                      
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $pro_val['candidate_id']; ?>" data-href="teacport_job_seeker_profile_ajax" data-mode="edit" data-popup-open="popup_section_seeker_profile">
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
                            <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['candidate_id']; ?>" data-href="teacport_job_seeker_profile_ajax"  data-mode="full_view"  data-popup-open="popup_section_seeker_profile">
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
      <div class="popup feedback-design" data-popup="popup_section_seeker_profile">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Job Seeker Profile
              </h4>                        
            </div>
            <div class="widget-body form pop_details_section">
              <?php } ?>
              <form class="tab_form" action="job_seeker_profile" data-index="" method="POST" data-mode="update">
                <?php
                if(!empty($seeker_full_profile)) :
                ?>
                <div id="rootwizard" class="form-wizard job_seek_form">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul  class="row-fluid nav nav-pills" id="fullview_rootwizard">
                          <li class="span2">
                            <a href="#tab1" data-toggle="tab" class="step step_menus active">
                            <span class="number">1</span>
                            <span class="desc seeker_tab_desc_info"><i class="icon-ok"></i>Basic Information-1</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab2" data-toggle="tab" class="step step_menus">
                              <span class="number">2</span>
                              <span class="desc seeker_tab_desc_info"><i class="icon-ok"></i>Basic Information-2</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab3" data-toggle="tab" class="step step_menus">
                              <span class="number">3</span>
                              <span class="desc seeker_tab_desc_info"><i class="icon-ok"></i>Contact Information</span>
                            </a>
                          </li>
                          <?php
                          if(!empty($mode) && $mode=="full_view") :
                          ?>
                          <li class="span2">
                            <a href="#tab4" data-toggle="tab" class="step step_menus">
                              <span class="number">4</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Educational Information</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab5" data-toggle="tab" class="step step_menus">
                              <span class="number">5</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Experience Information</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab6" data-toggle="tab" class="step step_menus">
                              <span class="number">6</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Curricular Information</span>
                            </a>
                          </li>
                          <?php
                          elseif(!empty($mode) && $mode=="edit") :
                          ?>
                          <li class="span2">
                            <a href="#tab4" data-toggle="tab" class="step">
                              <span class="number">4</span>
                              <span class="desc seeker_tab_desc nav_curricular"><i class="icon-ok"></i>Curricular  Information</span>
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
                      <h4>Candidate Basic Info-1</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Name</label>
                          <span class="dynamic_data"> 
                            <?php echo $seeker_full_profile['candidate_name']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Gender</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['candidate_gender'])) :
                              echo $seeker_full_profile['candidate_gender'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Father Name</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['candidate_father_name'])) :
                              echo $seeker_full_profile['candidate_father_name'];
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
                            if(!empty($seeker_full_profile['candidate_date_of_birth'])) :
                              echo date("d/m/Y", strtotime($seeker_full_profile['candidate_date_of_birth'])) ;
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Marital Status</label>
                          <span class="dynamic_data">
                            <?php
                            if(!empty($seeker_full_profile['candidate_marital_status'])) :
                              echo $seeker_full_profile['candidate_marital_status'];
                            else :
                              echo "NULL";
                            endif;
                            ?> 
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Mother Tongue</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['language_name'])) :
                              echo $seeker_full_profile['language_name'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Language Known</label>
                          <span class="dynamic_data lang_design">
                          	<?php
                            $lan_array = explode(',',$seeker_full_profile['candidate_language_known']);
                            if(!empty($known_languages) && !empty($seeker_full_profile['candidate_language_known'])) :
                            foreach ($known_languages as $lan_val) :
                            ?>
                            <?php
                            if(in_array($lan_val['language_id'], $lan_array)) {
                              echo '<span>'.$lan_val["language_name"].' </span>';
                            }
                            endforeach;
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Nationality</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($seeker_full_profile['candidate_nationality'])) :
                            foreach (unserialize(NATIONALITY) as $key => $val):
                            if($seeker_full_profile['candidate_nationality'] == $key) { 
                                echo $val; 
                            }
                            endforeach;
                            else :
                              echo "NULL";
                            endif;
                            ?>
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
                            <?php 
                            if(!empty($seeker_full_profile['candidate_religion'])) :
                            foreach (unserialize(RELIGION) as $key => $val):
                            if($seeker_full_profile['candidate_religion'] == $key) { 
                                echo $val; 
                            }
                            endforeach;
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Community</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($seeker_full_profile['candidate_community'])) :
                            foreach (unserialize(COMMUNAL) as $key => $val):
                            if($seeker_full_profile['candidate_community'] == $key) { 
                                echo $val; 
                            }
                            endforeach;
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Is Physically Challenged</label>
                          <span class="dynamic_data">
                            <?php 
                            if(!empty($seeker_full_profile['candidate_is_physically_challenged'])) :
                              echo $seeker_full_profile['candidate_is_physically_challenged'];
                            else :
                              echo "NULL";
                            endif;
                            ?> 
                            <?php  ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Registration Type</label>
                          <span class="dynamic_data"> 
                            <?php echo $seeker_full_profile['candidate_registration_type']; ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label"> Candidate Image </label>
                          <span class="dynamic_data"> 
                            <img class="popup_preview" src="<?php echo $seeker_full_profile['candidate_image_path']; ?>" alt="Not Found" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Facebook url</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['candidate_facebook_url'])) :
                              echo $seeker_full_profile['candidate_facebook_url'];
                            else :
                              echo "NULL";
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
                            if(!empty($seeker_full_profile['candidate_googleplus_url'])) :
                              echo $seeker_full_profile['candidate_googleplus_url'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Linkedin url</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['candidate_linkedin_url'])) :
                              echo $seeker_full_profile['candidate_linkedin_url'];
                            else :
                              echo "NULL";
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
                            if($seeker_full_profile['candidate_status'] == 1) :
                              echo "Active";
                            else :
                              echo "Inactive  ";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Created Date</label>
                          <span class="dynamic_data"> 
                            <?php 
                              $created_datetime = explode(' ', $seeker_full_profile['candidate_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?>
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
                            <?php echo $seeker_full_profile['candidate_email']; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mobile No</label>
                          <span class="dynamic_data">
                            <?php
                            if(!empty($seeker_full_profile['candidate_mobile_no']) && $seeker_full_profile['candidate_mobile_no'] != 0) :
                              echo $seeker_full_profile['candidate_mobile_no'];
                            else :
                              echo "NULL";
                            endif;
                            ?> 
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Address 1</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['candidate_address_1'])) :
                              echo $seeker_full_profile['candidate_address_1'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">   
                          <label class="control-label">Address 2</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['candidate_address_2'])) :
                              echo $seeker_full_profile['candidate_address_2'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Native State</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['native_state_name'])) :
                              echo $seeker_full_profile['native_state_name'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">  
                          <label class="control-label">Native District</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['native_district_name'])) :
                              echo $seeker_full_profile['native_district_name'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Live State</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['live_state_name'])) :
                              echo $seeker_full_profile['live_state_name'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Live District</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['live_district_name'])) :
                              echo $seeker_full_profile['live_district_name'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>   
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Pincode</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['candidate_pincode']) && $seeker_full_profile['candidate_pincode'] != 0) :
                              echo $seeker_full_profile['candidate_pincode'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                      <h4>Candidate Educational Info</h4>
                      <div class="span12">
                        <?php
                        if($education_details) :
                        ?>
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
                            foreach ($education_details as $edu_key => $edu_val) :
                            ?>
                            <tr>
                              <td> <?php echo $edu_val['educational_qualification']; ?> </td>
                              <td> <?php echo $edu_val['candidate_education_yop']; ?> </td>
                              <td> <?php echo $edu_val['language_name']; ?> </td>
                              <td> 
                                <?php
                                if(!empty($edu_val['departments_name'])) :
                                  echo $edu_val['departments_name']; 
                                else :
                                  echo "NULL";
                                endif;
                                ?> 
                              </td>
                              <td> <?php echo $edu_val['candidate_education_percentage']." %"; ?> </td>
                              <td> 
                                <?php
                                if(!empty($edu_val['university_board_name'])) :
                                  echo $edu_val['university_board_name']; 
                                else :
                                  echo "NULL";
                                endif;
                                ?> 
                              </td>
                              <td> 
                                <?php
                                if($edu_val['candidate_education_status'] == 1) :
                                  echo "Active";
                                else :
                                  echo "Inactive";
                                endif;
                                ?> 
                              </td>
                              <td> 
                              <?php 
                                $created_datetime = explode(' ', $edu_val['candidate_education_created_date']);
                                echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                              ?>
                              </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                          </tbody>
                        </table>
                        <?php
                        else :
                        ?>
                        <p> The candidate has no education details </p>
                        <?php
                        endif;
                        ?>

                      </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                      <h4>Candidate Experience Info</h4>
                      <div class="span12">
                        <?php
                        if($experience_details) :
                        ?>
                        <table class="seeker_profile_education">
                          <thead>
                            <tr>
                              <th> Class Level </th>
                              <th> Experience Year </th>
                              <th> Experience Board </th>
                              <th> Experience Subject </th>
                              <th> Experience Status </th>
                              <th> Created Date </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($experience_details as $exp_key => $exp_val) :
                            ?>
                            <tr>
                              <td> <?php echo $exp_val['class_level']; ?> </td>
                              <td> <?php echo $exp_val['candidate_experience_year']; ?> </td>
                              <td> 
                                <?php
                                if(!empty($exp_val['university_board_name'])) :
                                  echo $exp_val['university_board_name']; 
                                else :
                                  echo "NULL";
                                endif;
                                ?> 
                              </td>
                              <td> 
                                <?php
                                if(!empty($exp_val['subject_name'])) :
                                  echo $exp_val['subject_name']; 
                                else :
                                  echo "NULL";
                                endif;
                                ?> 
                              </td>
                              <td> 
                                <?php
                                if($exp_val['candidate_experience_status'] == 1) :
                                  echo "Active";
                                else :
                                  echo "Inactive";
                                endif;
                                ?> 
                              </td>
                              <td> 
                              <?php 
                                $created_datetime = explode(' ', $exp_val['candidate_experience_created_date']);
                                echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                              ?>
                              </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                          </tbody>
                        </table>
                        <?php
                        else :
                        ?>
                        <p> The candidate has no experience details </p>
                        <?php
                        endif;
                        ?>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab6">
                      <h4>Candidate Prefessional Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Institution Type</label>
                          <span class="dynamic_data"> 
                            <?php
                            if(!empty($seeker_full_profile['institution_type_name'])) :
                              echo $seeker_full_profile['institution_type_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">TET Exam Status</label>
                          <span class="dynamic_data"> 
                            <?php
                            if($seeker_full_profile['candidate_tet_exam_status'] == 1) :
                              echo "Yes";
                            else :
                              echo "No";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <!-- <div class="span6 control-group">                                       
                          <label class="control-label">Interest Subject</label>
                          <span class="dynamic_data">
                            <?php
                            // if(!empty($seeker_full_profile['subject_name'])) :
                            //   echo $seeker_full_profile['subject_name']; 
                            // else :
                            //   echo "NULL";
                            // endif;
                            ?>  
                          </span>
                        </div> -->
                        <div class="span6 control-group">
                          <label class="control-label">Extra Curricular</label>
                          <span class="dynamic_data"> 
                             <?php
                            $ext_array = explode(',',$seeker_full_profile['candidate_extra_curricular_id']);
                            if(!empty($extra_curricular_values) && !empty($seeker_full_profile['candidate_extra_curricular_id'])) :
                            foreach ($extra_curricular_values as $ext_val) :
                            if(in_array($ext_val['extra_curricular_id'], $ext_array)) {
                              echo $ext_val['extra_curricular'].'<br/>';
                            }
                            endforeach;
                            else :
                              echo "NULL";
                            endif;
                            ?>          
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Is Fresher</label>
                          <span class="dynamic_data"> 
                            <?php
                            if($seeker_full_profile['candidate_is_fresher'] == 1) :
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
                          <label class="control-label">Resume Uploaded </label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($seeker_full_profile['candidate_resume_upload_path'])) {
                            ?>
                              <span> Yes </span> <a href="<?php echo $seeker_full_profile['candidate_resume_upload_path']; ?>" target="_blank"> Open </a>
                            <?php
                            }
                            else {
                            ?>
                             <span> No </span>
                            <?php
                            }
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
                    <div class="tab-pane active" id="tab1">
                      <h4>Candidate Basic Info-1</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Name</label>
                          <span>
                            <input type="text" class="span6 tabfield1 tabfield alpha_value" value="<?php echo $seeker_full_profile['candidate_name']; ?>" placeholder="Candidate Name" maxlength="50" name="cand_name" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Gender</label>
                          <span>
                            <select name="cand_gen" class="popup_select tabfield1 tabfield">
                              <option value="">Select gender</option>
                              <option value="male" <?php if($seeker_full_profile['candidate_gender']=='male') echo "selected"; ?>>Male</option>
                              <option value="female" <?php if($seeker_full_profile['candidate_gender']=='female') echo "selected"; ?>>Female</option>
                              <option value="others" <?php if($seeker_full_profile['candidate_gender']=='others') echo "selected"; ?>>Others</option>
                            </select> 
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Father Name</label>
                          <span>
                            <input type="text" class="span6 tabfield1 tabfield alpha_value" placeholder="Father's Name" maxlength="50" value="<?php echo $seeker_full_profile['candidate_father_name']; ?>" name="cand_fa_name" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Date Of Birth</label>
                          <span>
                            <input class="m-ctrl-medium admin_date_picker dp_width tabfield1 tabfield" size="16" type="text" value="<?php echo date("d/m/Y", strtotime($seeker_full_profile['candidate_date_of_birth'])); ?>" name="cand_dob" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Marital Status</label>
                          <input type="radio" class="radio_status" name="mar_status" value="single" <?php if($seeker_full_profile['candidate_marital_status']=='single') echo "checked"; ?> />
                            Single
                          <input type="radio" class="radio_status" name="mar_status" value="married" <?php if($seeker_full_profile['candidate_marital_status']=='married') echo "checked"; ?> />
                            Married
                          <input type="hidden" value="<?php echo $seeker_full_profile['candidate_marital_status']; ?>" name="cand_mar_status" class="hidden_status tabfield1 tabfield"/>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mother Tongue</label>
                          <span>
                            <select name="cand_moth_ton" class="popup_select tabfield1 tabfield">
                              <option value="">Select mother tongue</option>
                              <?php
                                if(!empty($mother_tongue)) :
                                foreach ($mother_tongue as $lan_val) :
                                ?>
                                <?php
                                  if($lan_val['language_id']==$seeker_full_profile['candidate_mother_tongue']) {
                                    echo '<option value='.$lan_val["language_id"].' selected> '.$lan_val["language_name"].' </option>';
                                  }
                                  else {
                                    echo '<option value='.$lan_val["language_id"].'> '.$lan_val["language_name"].' </option>';
                                  }
                                endforeach;
                                  else :
                                    echo '<option value='.$seeker_full_profile['candidate_mother_tongue'].' selected> "'.$seeker_full_profile['mother_tongue'].'" </option>';
                                endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Languages Known</label>
                          <span class="multi_choice">
                            <?php
                            $lan_array = explode(',',$seeker_full_profile['candidate_language_known']);
                            ?>
                            <select data-placeholder="Languages Known" name="cand_known_lang" class="chosen span6 tabfield1 tabfield" multiple="multiple">
                              <?php
                              if(!empty($known_languages)) :
                              foreach ($known_languages as $lan_val) :
                              if(in_array($lan_val['language_id'], $lan_array)) {
                                echo '<option value='.$lan_val["language_id"].' selected> '.$lan_val["language_name"].' </option>';
                              }
                              else {
                                echo '<option value='.$lan_val["language_id"].'> '.$lan_val["language_name"].' </option>';
                              }
                              endforeach;
                              endif;
                              ?>
                            </select>
                          </span>
                        </div>
                      </div>   
                    </div>
                    <div class="tab-pane active" id="tab2">
                      <h4>Candidate Basic Info-2</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Nationality</label>
                          <span>
                             <select class="span6 tabfield2 tabfield" name="cand_nationality">
                              <option value=""> Select </option>
                              <?php 
                              foreach (unserialize(NATIONALITY) as $key => $val): 
                              if($key == $seeker_full_profile['candidate_nationality']) {
                              echo '<option value='.$key.' selected>
                                  '.$val.' </option>';
                              }
                              else {
                              echo '<option value='.$key.'>
                                  '.$val.' </option>';
                              }
                              endforeach; 
                              ?>
                            </select>
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Religion</label>
                          <span>
                            <select class="span6 tabfield2 tabfield" name="cand_religion">
                              <option value=""> Select </option>
                              <?php 
                              foreach (unserialize(RELIGION) as $key => $val):
                              if($key == $seeker_full_profile['candidate_religion']) {
                              echo '<option value='.$key.' selected>
                                  '.$val.' </option>';
                              }
                              else {
                              echo '<option value='.$key.'>
                                  '.$val.' </option>';
                              }
                              endforeach; 
                              ?>
                            </select>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Community</label>
                          <span>
                            <select class="span6 tabfield2 tabfield" name="cand_community">
                              <option value=""> Select </option>
                              <?php 
                              foreach (unserialize(COMMUNAL) as $key => $val): 
                              if($key == $seeker_full_profile['candidate_community']) {
                              echo '<option value='.$key.' selected>
                                  '.$val.' </option>';
                              }
                              else {
                              echo '<option value='.$key.'>
                                  '.$val.' </option>';
                              }
                              endforeach; 
                              ?>
                            </select>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Is Physically Challenged</label>
                          <input type="radio" class="radio_status" name="phy_status" value="yes" <?php if($seeker_full_profile['candidate_is_physically_challenged']=='yes') echo "checked"; ?> />
                            Yes
                          <input type="radio" class="radio_status" name="phy_status" value="no"  <?php if($seeker_full_profile['candidate_is_physically_challenged']=='no') echo "checked"; ?> />
                            No
                          <input type="hidden" value="<?php echo $seeker_full_profile['candidate_is_physically_challenged']; ?>" name="cand_phy" class="hidden_status tabfield2 tabfield"/>                        
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Image</label>
                          <span>
                            <a class="btn upload_option"> Upload </a>
                            <input class="form-control hidden_upload tabfield2 tabfield" name="cand_img" type="file">
                            <img src="<?php echo $seeker_full_profile['candidate_image_path']; ?>" class="popup_preview" alt="Not Found" />
                            <input type="hidden" value="<?php echo $seeker_full_profile['candidate_image_path']; ?>" class="tabfield2 tabfield" name="old_file_path" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Candidate Status</label>
                          <span>
                            <select name="cand_status" class="popup_select tabfield2 tabfield">
                              <option value="">Please select status</option>
                              <option value="1" <?php if($seeker_full_profile['candidate_status']==1) echo "selected"; ?>>Active</option>
                              <option value="0" <?php if($seeker_full_profile['candidate_status']==0) echo "selected"; ?>>Inactive</option>
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
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $seeker_full_profile['candidate_email']; ?>" name="cand_email" placeholder="Email" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Mobile No</label>
                          <span>
                            <?php
                            if(!empty($seeker_full_profile['candidate_mobile_no']) && $seeker_full_profile['candidate_mobile_no'] != 0) :
                            ?>
                            <input type="text" class="span6 tabfield3 tabfield numeric_value" maxlength="10" value="<?php echo $seeker_full_profile['candidate_mobile_no']; ?>" placeholder="Mobile" name="cand_mobile" />
                            <?php
                            else :
                            ?>
                            <input type="text" class="span6 tabfield3 tabfield numeric_value" placeholder="Mobile" maxlength="10" value="" name="cand_mobile" />
                            <?php
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group state_section">  
                          <label class="control-label">Native State</label>
                          <span>
                            <select name="cand_state" class="popup_select tabfield3 tabfield state_act seeker_state">
                              <option value="">Please select state</option>
                              <?php
                              if(!empty($state_values)) :
                              foreach ($state_values as $st_val) :
                              ?>
                              <?php
                                if($st_val['state_id']==$seeker_full_profile['native_state_id']) {
                                  echo '<option value='.$st_val["state_id"].' selected> '.$st_val["state_name"].' </option>';
                                }
                                else if($st_val['state_status']==1){
                                  echo '<option value='.$st_val["state_id"].'> '.$st_val["state_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$seeker_full_profile['native_state_id'].' selected> "'.$seeker_full_profile['native_state_name'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group district_section">  
                          <label class="control-label">Native District</label>
                          <span>
                            <select name="cand_district" class="popup_select tabfield3 tabfield">
                              <option value="">Please select district</option>
                              <?php
                              if(!empty($district_values)) :
                              foreach ($district_values as $dis_val) :
                              ?>
                              <?php
                                if($dis_val['district_id']==$seeker_full_profile['native_district_id']) {
                                  echo '<option value='.$dis_val["district_id"].' selected> '.$dis_val["district_name"].' </option>';
                                }
                                else if($dis_val['district_status']==1){
                                  echo '<option value='.$dis_val["district_id"].'> '.$dis_val["district_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$seeker_full_profile['native_district_id'].' selected> "'.$seeker_full_profile['native_district_name'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Address 1</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $seeker_full_profile['candidate_address_1']; ?>" name="cand_address1" maxlength="150" placeholder="Address" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Address 2</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $seeker_full_profile['candidate_address_2']; ?>" name="cand_address2" maxlength="150" placeholder="Address" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group state_section">  
                          <label class="control-label">Live State</label>
                          <span>
                            <select name="cand_live_state" class="popup_select tabfield3 tabfield state_act seeker_state">
                              <option value="">Please select state</option>
                              <?php
                              if(!empty($state_values)) :
                              foreach ($state_values as $st_val) :
                              ?>
                              <?php
                                if($st_val['state_id']==$seeker_full_profile['live_state_id']) {
                                  echo '<option value='.$st_val["state_id"].' selected> '.$st_val["state_name"].' </option>';
                                }
                                else if($st_val['state_status']==1){
                                  echo '<option value='.$st_val["state_id"].'> '.$st_val["state_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$seeker_full_profile['native_state_id'].' selected> "'.$seeker_full_profile['native_state_name'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group district_section">
                          <label class="control-label">Live District</label>
                          <span>
                            <select name="cand_live_district" class="popup_select tabfield3 tabfield">
                              <option value="">Please select live district</option>
                              <?php
                              if(!empty($district_values)) :
                              foreach ($district_values as $dis_val) :
                              ?>
                              <?php
                                if($dis_val['district_id']==$seeker_full_profile['live_district_id']) {
                                  echo '<option value='.$dis_val["district_id"].' selected> '.$dis_val["district_name"].' </option>';
                                }
                                else if($dis_val['district_status']==1){
                                  echo '<option value='.$dis_val["district_id"].'> '.$dis_val["district_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$seeker_full_profile['live_district_id'].' selected> "'.$seeker_full_profile['live_district_name'].'" </option>';
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
                              <input type="text" class="span6 tabfield3 tabfield numeric_value" value="<?php echo $seeker_full_profile['candidate_pincode']; ?>" maxlength="6" placeholder="Pincode" name="cand_pincode" />
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
                                if($ins_val['institution_type_id']==$seeker_full_profile['candidate_institution_type']) {
                                  echo '<option value='.$ins_val["institution_type_id"].' selected> '.$ins_val["institution_type_name"].' </option>';
                                }
                                else if($ins_val['institution_type_status']==1){
                                  echo '<option value='.$ins_val["institution_type_id"].'> '.$ins_val["institution_type_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$seeker_full_profile['candidate_institution_type'].' selected> "'.$seeker_full_profile['institution_type_name'].'" </option>';
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
                              <option value="1" <?php if($seeker_full_profile['candidate_tet_exam_status']==1) echo "selected"; ?>>Yes</option>
                              <option value="0" <?php if($seeker_full_profile['candidate_tet_exam_status']==0) echo "selected"; ?>>No</option>
                            </select>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <!-- <div class="span6 control-group">                                       
                          <label class="control-label">Interest Subject</label>
                          <span>
                            <select name="cand_int_sub" class="popup_select tabfield4 tabfield">
                              <option value="">Please select subject</option>
                              <?php
                              // if(!empty($subject_values)) :
                              // foreach ($subject_values as $sub_val) :
                              // ?>
                              // <?php
                              //   if($sub_val['subject_id']==$seeker_full_profile['candidate_interest_subject_id']) {
                              //     echo '<option value='.$sub_val["subject_id"].' selected> '.$sub_val["subject_name"].' </option>';
                              //   }
                              //   else {
                              //     echo '<option value='.$sub_val["subject_id"].'> '.$sub_val["subject_name"].' </option>';
                              //   }
                              // endforeach;
                              // else :
                              //   echo '<option value='.$seeker_full_profile['candidate_interest_subject_id'].' selected> "'.$seeker_full_profile['edu_interest_sub'].'" </option>';
                              // endif;
                              ?>
                            </select> 
                          </span>
                        </div> -->
                        <div class="span6 control-group">
                          <label class="control-label">Fresher</label>
                          <span>
                            <select name="cand_is_fresh" class="popup_select tabfield4 tabfield">
                              <option value="">Please select status</option>
                              <option value="1" <?php if($seeker_full_profile['candidate_is_fresher']==1) echo "selected"; ?>>Yes</option>
                              <option value="0" <?php if($seeker_full_profile['candidate_is_fresher']==0) echo "selected"; ?>>No</option>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Extra Curricular</label>
                          <span class="multi_choice">
                            <?php
                            $ext_array = explode(',',$seeker_full_profile['candidate_extra_curricular_id']);
                            ?>
                            <select data-placeholder="select" name="cand_extra" class="chosen span6 tabfield4 tabfield" multiple="multiple" >
                              <?php
                              if(!empty($extra_curricular_values)) :
                              foreach ($extra_curricular_values as $ext_val) :
                              if(in_array($ext_val['extra_curricular_id'], $ext_array)) {
                                echo '<option value='.$ext_val["extra_curricular_id"].' selected> '.$ext_val["extra_curricular"].' </option>';
                              }
                              else {
                                echo '<option value='.$ext_val["extra_curricular_id"].'> '.$ext_val["extra_curricular"].' </option>';
                              }
                              endforeach;
                              endif;
                              ?>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" class="hidden_id" value="<?php echo $seeker_full_profile['candidate_id']; ?>" />  
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
                <?php
                endif;
                ?>
              </form>                 
              <?php if(!$this->input->is_ajax_request()) { ?>
            </div>
          </div>
          <p>
            <a data-popup-close="popup_section_seeker_profile" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="popup_section_seeker_profile" href="#">x</a>
        </div>
      </div>  
      <!-- END ADVANCED TABLE widget-->
      <!-- END PAGE CONTENT-->
      
      
      <!---Visitors Count-->
      <div class="popup feedback-design" data-popup="seeker_visitorcount_detail">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Visitors Count
              </h4>                        
            </div>
            <div class="widget-body">
            	<table class="bordered table table-striped table-hover table-bordered admin_table" id="mple_editable_1">
                      <thead>
                        <tr class="">
                          <th> Organization Id </th>
                          <th> Candidate Id </th>
                          <th>IP Address </th>
                          <th>User Agent </th>
                          <th>Count </th>
                          <th>User Type </th>
                          <th>Created Date </th>
                        </tr>  
                      </thead>
                      <tbody>
                      	<tr>
                      		<td>14</td>
                      		<td>25</td>
                      		<td>10.0.0.0</td>
                      		<td>1</td>
                      		<td>45</td>
                      		<td>Registered</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr>
                      	<tr>
                      		<td>12</td>
                      		<td>20</td>
                      		<td>10.0.12.200</td>
                      		<td>1</td>
                      		<td>14</td>
                      		<td>Guest</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr>
                      	<tr>
                      		<td>13</td>
                      		<td>18</td>
                      		<td>10.0.0.100</td>
                      		<td>1</td>
                      		<td>55</td>
                      		<td>Registered</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr>
                      	<tr>
                      		<td>233</td>
                      		<td>04</td>
                      		<td>10.0.0.220</td>
                      		<td>1</td>
                      		<td>145</td>
                      		<td>Registered</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr>
                     </tbody> 
                 </table>        
            </div><!--widget-body-->
          </div>
          <p>
            <a data-popup-close="seeker_visitorcount_detail" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="seeker_visitorcount_detail" href="#">x</a>
        </div>
      </div>
      
      
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
    var class_selector = new Array("");//To set class for element
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
redirect(base_url().'main');
endif;
?>
