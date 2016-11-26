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
                           <a href="<?php echo base_url(); ?>admin/job_seeker_applied">Job Seekers</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/job_seeker_applied"> Job Applaied</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> Job Applaied</h4>
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
                                
                                <form method="post" action="job_seeker/job_seeker_applied" class="admin_module_form" id="job_seeker_applied_form">
                                 <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
	                                <thead>
	                                  <tr class="ajaxTitle">
	                                    <th>Job Vacancies</th>
	                                    <th>Candidate</th>
	                                    <th>Status</th>
	                                    <th>Created Date</th>
	                                    <th>Edit</th>
	                                    <th>Delete</th>
	                                  </tr>
	                                </thead>
	                                <tbody>
	                                  <tr class="parents_tr" id="column1">
	                                        <td class="applied_job_vacancies_id">10</td>
	                                        <td class="applied_job_candidate_id">Candidate Name1</td>
	                                        <td class="applied_job_status">Active</td>
	                                        <td class="created_date">01-01-2000</td>
	                                        <td class="edit_section">
	                                        	<a class="ajaxEdit" id="column1" href="javascript:;" data-id="column1">Edit</a>
	                                        </td>
	                                        <td><a class="ajaxDelete" id="column1" onclick="Confirm.show()">Delete</a></td>
	                                    </tr>
	                                    <tr class="parents_tr" id="column2">
	                                        <td class="applied_job_vacancies_id">20</td>
	                                        <td class="applied_job_candidate_id">Candidate Name2</td>
	                                        <td class="applied_job_status">Active</td>
	                                        <td class="created_date">01-01-2000</td>
	                                        <td class="edit_section">
	                                        	<a class="ajaxEdit" id="column2" href="javascript:;" data-id="column2">Edit</a>
	                                        </td>
	                                        <td><a class="ajaxDelete" id="column2" onclick="Confirm.show()">Delete</a></td>
	                                    </tr>
	                                    <tr class="parents_tr" id="column3">
	                                        <td class="applied_job_vacancies_id">30</td>
	                                        <td class="applied_job_candidate_id">Candidate Name3</td>
	                                        <td class="applied_job_status">Inactive</td>
	                                        <td class="created_date">01-01-2000</td>
	                                        <td class="edit_section">
	                                        	<a class="ajaxEdit" id="column3" href="javascript:;" data-id="column3">Edit</a>
	                                        </td>
	                                        <td><a class="ajaxDelete" id="column3" onclick="Confirm.show()">Delete</a></td>
	                                    </tr>
	                                    </tbody>
                                 </table>
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
    var inputType = new Array("select","select","select","text"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("applied_job_vacancies_id","applied_job_candidate_id","applied_job_status"); // Set name of input types
    var placeholder = new Array("Enter Language Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var applied_job_vacancies_id_option = new Array("20","30"); 
    var applied_job_vacancies_id_value = new Array("1","0");
    var applied_job_candidate_id_option = new Array("Candidate Name1","Candidate Name2","Candidate Name3"); 
    var applied_job_candidate_id_value = new Array("1","0");
    var applied_job_status_option = new Array("Active","Inactive"); // Set optiontext for select option which must have name of the select tag with '_option' . ex. select tag name is status means , the variable of the select optiontext should be as 'status_option'
    var applied_job_status_value = new Array("1","0"); // Set value for select optionvalue which must have name of the select tag with '_value' . ex. select tag name is status means , the variable of the select optionvalue should be as 'status_value'
  </script>
<?php include "templates/footer_grid.php" ?>