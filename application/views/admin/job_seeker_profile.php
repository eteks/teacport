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
                  <div class="table_content_section">
                    <?php } ?>
                    <?php
                    if(!empty($seeker_profile))  :
                    ?>     
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
                          <th class="data_action"> Edit </th>
                          <th class="data_action"> Delete </th>
                          <th class="data_action"> Full View </th>
                        </tr>
                      </thead>
                      <tbody> 
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
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $pro_val['candidate_id']; ?>" data-href="job_seeker/teacport_job_seeker_profile_ajax" data-mode="edit" data-popup-open="popup_section">
                              Edit
                            </a>
                          </td>
                          <td>
                           <!--  <a class="job_delete pop_delete_action" data-id="<?php echo $pro_val['candidate_id']; ?>">
                              Delete
                            </a> -->
                             <a class="uidelete" data-id="<?php echo $pro_val['candidate_id']; ?>">
                              Delete
                            </a>
                          </td>
                          <td>
                            <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['candidate_id']; ?>" data-href="job_seeker/teacport_job_seeker_profile_ajax"  data-mode="full_view"  data-popup-open="popup_section">
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
                            <a href="#tab1" data-toggle="tab" class="step active">
                            <span class="number seeker_tab_num">1</span>
                            <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Basic<br /> Info-1</span>
                            </a>
                         </li>
                         <li class="span2">
                            <a href="#tab2" data-toggle="tab" class="step">
                              <span class="number seeker_tab_num">2</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Basic<br /> Info-2</span>
                            </a>
                         </li>
                         <li class="span2">
                            <a href="#tab3" data-toggle="tab" class="step">
                            <span class="number seeker_tab_num">3</span>
                            <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Contact<br /> Info</span>
                            </a>
                         </li>
                         <li class="span2">
                            <a href="#tab4" data-toggle="tab" class="step">
                              <span class="number seeker_tab_num">4</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Educational<br /> Info</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab5" data-toggle="tab" class="step">
                              <span class="number seeker_tab_num">5</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Experience<br /> Info</span>
                            </a>
                          </li>
                          <li class="span2">
                            <a href="#tab6" data-toggle="tab" class="step">
                              <span class="number seeker_tab_num">6</span>
                              <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Professional<br /> Info</span>
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
                    <input type="hidden" value="view" id="popup_mode" />
                    <div class="tab-pane" id="tab1">
                      <h4>Candidate Basic Info-1</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Name</label>
                          <span class="dynamic_data"> 
                              test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Gender</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Father Initial</label>
                          <span class="dynamic_data"> 
                          test
                        </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Father Name</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Date Of Birth</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Marital Status</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Mother Tongue</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Language Known</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Nationality</label>
                          <span class="dynamic_data"> 
                            test
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
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Is Physically Challenged</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Registration Type</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Image Path</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Facebook url</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Google Plus url</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Linkedin url</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Candidate Status</label>
                          <span class="dynamic_data"> 
                            test
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
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mobile No</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">District Name</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Address 1</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Address 2</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Live District Name</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Pincode</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                      <h4>Candidate Educational Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Qualification Name</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label"> Year Of Passing </label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div> 
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Medium Of Language</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Subject</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Percentage</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Education Board</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Education Status</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Education Created Date</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                      <h4>Candidate Experience Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Class Level</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Experience Year</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Experience Board</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Experience Status</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Created Date</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab6">
                      <h4>Candidate Prefessional Info</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Institution Type</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">TET Exam Status</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Interest Subject</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Extra Curricular</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Is Fresher</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Resume Upload Path</label>
                          <span class="dynamic_data"> 
                            test
                          </span>
                        </div>
                      </div>
                    </div>
                    <?php
                    else :
                      echo "None";
                    endif;
                    ?>
                    <ul class="pager wizard">
                      <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
                      <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
                      <li class="finish disabled"><button type="submit">Finish<i class="icon-ok"></i></button></li>
                    </ul>
                  </div>  
                </div>
                <input type="hidden" class="hidden_id" value="<?php    ?>" />
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
