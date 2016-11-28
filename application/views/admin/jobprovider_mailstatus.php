<?php
if(!empty($this->session->userdata("login_status"))): 
?>
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
                     <small>Job Providers</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Job Providers</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/jobprovider_mailstatus">Job Mail Provider Status</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Job Provider Mail Status</h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <!-- <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn green add_new">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div> -->
                                </div>
                                
                                <!-- <form method="post" action="adminindex/subject" class="admin_module_form" id="subject_form">
                                  <?php
                                  // if(!empty($status)) :
                                  //   echo "<p class='db_status update_success_md'> $status </p>";
                                  // endif;
                                  ?> 
                                  <p class='val_error error_msg_md'> <p> -->
                                  <table class="table table-striped job_activities table-hover table-bordered admin_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th> Inbox Message </th>
                                        <th> Candidate Name </th>
                                        <th> Email </th>
                                        <th> Phone No </th>
                                        <th> Vacancies Available </th>
                                        <th> Is Viewed </th>
                                        <th> Status </th>
                                        <th> Created Date </th>
                                        <th style="display: none;"> </th>
                                        <!-- <th >Edit</th>
                                        <th>Delete</th> -->
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="parents_tr" id="column">
                                        <td class="inbox_messge"> 
                                          Message 1
                                        </td>
                                        <td class="inbox_candidate_id"> 
                                          Candidate Name 
                                        </td>
                                        <td class="candidate_email"> 
                                          admin@gmail.com 
                                        </td>
                                        <td class="candidate_phone"> 
                                          9876543210 
                                        </td>
                                        <td class="inbox_vacancy_id"> 
                                          100 
                                        </td>
                                        <td class="is_viewed center_align"> 
                                          <span class="icon-ok"> </span>
                                        </td>
                                        <td class="inbox_status"> 
                                          Active 
                                        </td>
                                        <td class="inbox_created_date"> 
                                          00-00-0000 
                                        </td>
                                      </tr>
                                      <tr class="parents_tr" id="column">
                                        <td class="inbox_messge"> 
                                          Message 2
                                        </td>
                                        <td class="inbox_candidate_id"> 
                                          Admin
                                        </td>
                                        <td class="candidate_email"> 
                                          admin@gmail.com 
                                        </td>
                                        <td class="candidate_phone"> 
                                          0076543210 
                                        </td>
                                        <td class="inbox_vacancy_id"> 
                                          50 
                                        </td>
                                        <td class="is_viewed center_align"> 
                                          <span class="icon-remove"> </span>
                                        </td>
                                        <td class="inbox_status"> 
                                          Inactive 
                                        </td>
                                        <td class="inbox_created_date"> 
                                          00-00-0000 
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                <!-- </form> -->
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
   <!-- <script>
    // Define default values
    var inputType = new Array("select","select","on_off","on_off","on_off"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("activity_organization_id","activity_candidate_id","is_sms_sent","is_email_sent","is_resume_downloaded"); // Set name of input types
    var placeholder = new Array(""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var activity_organization_id_option = new Array("Select","Ets","Esourceit");
    var activity_organization_id_value = new Array("","1","3");
    var activity_candidate_id_option = new Array("Select","Siva","Kannan");
    var activity_candidate_id_value = new Array("","3","5");
    var is_created ="no";
  </script> -->
<?php include "templates/footer_grid.php" ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>