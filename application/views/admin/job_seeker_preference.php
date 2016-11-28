<?php
if(!empty($this->session->userdata("admin_login_status"))): 
?>
<?php if(!$this->input->is_ajax_request()) { ?>
<?php include "templates/header.php" ?>
  <!-- BEGIN CONTAINER -->
  <div id="container" class="row-fluid">
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
                           <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#"> Job Seekers</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/languages"> Job Seeker Preference</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> Job Seeker Preference</h4>
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
                                
                              <form method="post" action="job_seeker/job_seeker_preference" class="admin_module_form form_table_scl" id="job_seeker_preference_form">
                              <?php } ?>
                              <?php
                              if(!empty($status)) :
                                echo "<p class='db_status update_success_md'> $status </p>";
                              endif;
                              ?> 
                              <p class='val_error error_msg_md'> <p>
                              <table class="table table-striped table-hover table-bordered admin_table job_seeker_table" id="sample_editable_1">
                               <tr class="ajaxTitle">
                                  <thead>
                                    <th>Candidate Name</th>
                                    <th>Posting Applied</th>
                                    <th>Start Salary</th>
                                    <th>End Salary</th>
                                    <th>Class Level</th>
                                    <th>Subject</th>
                                    <th>Created Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                  </thead>
                                </tr>
                                <tbody>
                                  <tr class="parents_tr" id="">
                                        <td class="candidate_profile_id">Name1</td>
                                        <td class="candidate_posting_applied_for">Teacher</td>
                                        <td class="candidate_expecting_start_salary">10000</td>
                                        <td class="candidate_expecting_end_salary">13000</td>
                                        <td class="candidate_willing_class_level_id">Class1</td>
                                        <td class="candidate_willing_subject_id">Maths</td>
                                        <td class="created_date">00-00-0000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="" href="javascript:;" data-id="">Edit</a>
                                        </td>
                                        <td><a class="uidelete" id="">Delete</a></td>
                                    </tr>
                                    <tr class="parents_tr" id="">
                                        <td class="candidate_profile_id">Name2</td>
                                        <td class="candidate_posting_applied_for">Prof</td>
                                        <td class="candidate_expecting_start_salary">10000</td>
                                        <td class="candidate_expecting_end_salary">13000</td>
                                        <td class="candidate_willing_class_level_id">Class2</td>
                                        <td class="candidate_willing_subject_id">English</td>
                                        <td class="created_date">00-00-0000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="" href="javascript:;" data-id="">Edit</a>
                                        </td>
                                        <td><a class="uidelete" id="">Delete</a></td>
                                    </tr>
                                    <tr class="parents_tr" id="">
                                        <td class="candidate_profile_id">Name3</td>
                                        <td class="candidate_posting_applied_for">Professor</td>
                                        <td class="candidate_expecting_start_salary">10000</td>
                                        <td class="candidate_expecting_end_salary">13000</td>
                                        <td class="candidate_willing_class_level_id">Class3</td>
                                        <td class="candidate_willing_subject_id">Science</td>
                                        <td class="created_date">00-00-0000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="" href="javascript:;" data-id="">Edit</a>
                                        </td>
                                        <td><a class="uidelete" id="">Delete</a></td>
                                    </tr>
                                </tbody>
                              </table>
                                <?php if(!$this->input->is_ajax_request()) { ?>
                            </form>
                          </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>
            <!-- END ADVANCED TABLE widget-->
            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
    <script>
    // Define default values
    var inputType = new Array("select","multiselect","text","text","multiselect","multiselect"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("candidate_profile_id","candidate_posting_applied_for","candidate_expecting_start_salary","candidate_expecting_end_salary","candidate_willing_class_level_id","candidate_willing_subject_id"); // Set name of input types
    var placeholder = new Array("Enter Language Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var candidate_profile_id_option = new Array("Name1","Name2"); 
    var candidate_profile_id_value = new Array("","1","0");
    var candidate_posting_applied_for_option = new Array("Teacher","Prof","Professor"); 
    var candidate_posting_applied_for_value = new Array("","1","0");
    var candidate_willing_class_level_id_option = new Array("Class1","Class2","Class3"); 
    var candidate_willing_class_level_id_value = new Array("","1","0");
    var candidate_willing_subject_id_option = new Array("English","Maths","Science"); 
    var candidate_willing_subject_id_value = new Array("","1","0"); 
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>

