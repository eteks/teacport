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
                           <a href="<?php echo base_url(); ?>admin/job_seeker_profile">Job Seekers</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/job_seeker_profile">Job Seeker Preference</a><span class="divider-last">&nbsp;</span></li>
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
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn green add_new">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
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
                              <form method="post" action="adminindex/job_seeker_preference" class="admin_module_form form_table_scl" id="languages_form">
                              <p class='val_error error_msg_md'> <p>
                              <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                <thead>
                                  <tr class="ajaxTitle">
                                    <th>Inbox Message</th>
                                    <th>Organization</th>
                                    <th>Vacancy</th>
                                    <th>Is Viewed</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="parents_tr" id="column1">
                                        <td class="candidate_inbox_message">Empty</td>
                                        <td class="candidate_organization_id">Company Name1</td>
                                        <td class="candidate_vacancy_id">4</td>
                                        <td class="is_viewed center_align">
                                        	<span class="icon-ok"> </span>
                                        </td>
                                        <td class="candidate_inbox_status">Active</td>
                                        <td class="created_date">01-01-2000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column1" href="javascript:;">Edit</a>
                                        </td>
                                        <td><a class="ajaxDelete" id="column1" onclick="Confirm.show()">Delete</a></td>
                                    </tr>
                                    <tr class="parents_tr" id="column2">
                                        <td class="candidate_inbox_message">Empty</td>
                                        <td class="candidate_organization_id">Company Name2</td>
                                        <td class="candidate_vacancy_id">15</td>
                                        <td class="is_viewed center_align">
                                        	<span class="icon-remove"> </span>
                                        </td>
                                        <td class="candidate_inbox_status">Active</td>
                                        <td class="created_date">01-01-2000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column2" href="javascript:;">Edit</a>
                                        </td>
                                        <td><a class="ajaxDelete" id="column2" onclick="Confirm.show()">Delete</a></td>
                                    </tr>
                                    <tr class="parents_tr" id="column3">
                                        <td class="candidate_inbox_message">Empty</td>
                                        <td class="candidate_organization_id">Company Name3</td>
                                        <td class="candidate_vacancy_id">10</td>
                                        <td class="is_viewed center_align">
                                        	<span class="icon-ok"> </span>
                                        </td>
                                        <td class="candidate_inbox_status">Active</td>
                                        <td class="created_date">01-01-2000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column3" href="javascript:;">Edit</a>
                                        </td>
                                        <td><a class="ajaxDelete" id="column3"  onclick="Confirm.show()">Delete</a></td>
                                    </tr>
                                    </tbody>
                                </table>
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
    var inputType = new Array("text","select","select","select","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("candidate_inbox_message","candidate_organization_id","candidate_vacancy_id","is_viewed","candidate_inbox_status"); // Set name of input types
    var placeholder = new Array("Enter Language Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var candidate_organization_id_option = new Array("Comany Name1","Comany Name2"); 
    var candidate_organization_id_value = new Array("1","0");
    var candidate_vacancy_id_option = new Array("50","20","10"); 
    var candidate_vacancy_id_value = new Array("1","0");
    var is_viewed_option = new Array("Yes","No"); 
    var is_viewed_value = new Array("1","0");
    var candidate_inbox_status_option = new Array("Active","Inactive"); // Set optiontext for select option which must have name of the select tag with '_option' . ex. select tag name is status means , the variable of the select optiontext should be as 'status_option'
    var candidate_inbox_status_value = new Array("1","0"); // Set value for select optionvalue which must have name of the select tag with '_value' . ex. select tag name is status means , the variable of the select optionvalue should be as 'status_value'
  </script>
<?php include "templates/footer_grid.php" ?>