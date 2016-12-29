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
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Teachers Recruit
                     <small>Others</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                        <li>
                          <a href="#">Others</a><span class="divider">&nbsp;</span>
                        </li>
                       <li>
                          <a href="<?php echo base_url(); ?>main/jobprovider_ads">
                            Feedback Form
                          </a>
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
                            <h4><i class="icon-reorder"></i> Feedback Form</h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <!-- <button id="sample_editable_1_new" data-open="popup_section" class="btn green add_option">
                                            Add New <i class="icon-plus"></i>
                                        </button> -->
                                    </div>
                                </div>
                                
                                <form method="post" action="adminindex/state" class="admin_module_form" id="state_form">
                                  <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Form Title</th>
                                        <th>Form Message</th>
                                        <!-- <th>Is Organization?</th> -->
                                        <!-- <th>Is Candidate?</th> -->
                                        <!-- <th>Is Guest User?</th> -->
                                        <!-- <th>Candidate or Organization</th> -->
                                        <th>Viewed</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="data_action"> Full View </th>
                                      </tr>
                                    </thead>
                                    <tbody class="table_content_section">   
                        <?php

                          foreach ($feedback_data as $feed) :
                          ?>                                  
                        <tr class="parents_tr" id="column">
                          <td class="">
                            <?php echo $feed['feedback_form_title']; ?>
                          </td>
                          <td class="message_res">
                            <?php echo $feed['feedback_form_message']; ?>
                          </td>
                          <td class="">
                            <?php echo $feed['is_viewed']; ?>
                          </td>
                          <td class="">
                            <?php echo $feed['feedback_form_status']; ?>
                          </td>
                          <td class="">
                            <?php echo $feed['feedback_form_created_date']; ?>
                          </td>
                          <td>
                            <a class="job_full_view popup_fields" data-id="<?php echo $feed['feedback_form_id']; ?>" data-href="other_module/get_feedback_full_view"  data-mode="full_view"  data-popup-open="popup_section_feedback">
                              Full View
                            </a>
                          </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                      </tbody>
                                  </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>


            <div class="popup" data-popup="popup_section_feedback">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Feedback
              </h4>                        
            </div>
            <div class="widget-body form pop_details_section">
              <?php } ?>
              <form class="tab_form" data-index="" method="POST" data-mode="update">
                <?php
                if(!empty($feedback_form)) :
                ?>
                <div id="rootwizard" class="form-wizard">
                  <div class="tab-content">
                    <input type="hidden" value="view" id="popup_mode" />
                      <div>
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Form id</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['feedback_form_id'])) echo $feedback_form['feedback_form_id']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Title</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['feedback_form_title'])) echo $feedback_form['feedback_form_title']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Message</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['feedback_form_message'])) echo $feedback_form['feedback_form_message']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Is Organisation?</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['is_organization'])) echo $feedback_form['is_organization']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Is Candidate?</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['is_candidate'])) echo $feedback_form['is_candidate']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Guest User</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['is_guest_user'])) echo $feedback_form['is_guest_user']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Candidate Or Organization</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['candidate_or_organization_id'])) echo $feedback_form['candidate_or_organization_id']; else echo "-"; ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Message Viewed</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['is_viewed'])) echo $feedback_form['is_viewed']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Feedback Form Status</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['feedback_form_status'])) echo $feedback_form['feedback_form_status']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>      
                      <div class="span12">
                        <div class="span6 control-group">  
                          <label class="control-label">Feedback Created Date</label>
                          <span class="dynamic_data"> 
                            <?php if(!empty($feedback_form['feedback_form_created_date'])) echo $feedback_form['feedback_form_created_date']; else echo "-"; ?>
                          </span>
                        </div>
                      </div>          
                    </div>
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
            <a data-popup-close="popup_section_feedback" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="popup_section_feedback" href="#">x</a>
        </div>
      </div> 





            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
  </div>
  <script>
    // Define default values
    var inputType = new Array("label","label","label","label","label","label","on_off","select","label"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("feedback_form_title","feedback_form_message","is_organization","is_candidate","is_guest_user","candidate_or_organization_id","is_viewed","feedback_form_status","created_date"); // Set name of input types
    var placeholder = new Array("Enter State Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var is_created ="no";
    var feedback_form_status_option = new Array("Active","Inactive"); 
    var feedback_form_status_value = new Array("1","0"); 
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
