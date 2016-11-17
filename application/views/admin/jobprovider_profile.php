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
                           <a href="editable_table.html#">Master Data</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="editable_table.html#">State</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Editable Table</h4>
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

                                <form method="post" action="adminindex/state" class="admin_module_form" id="state_form">
                                <?php } ?>
                                <?php
                                if(!empty($status)) :
                                  echo "<p class='db_status'> $status </p>";
                                endif;
                                ?> 
                                <p class='val_error'> <p>
                                <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                  <thead>
                                    <tr class="ajaxTitle">
                                      <th> Organization Name </th>
                                      <th> organization_logo </th>
                                      <th> organization_address1 </th>
                                      <th> organization_address2 </th>
                                      <th> organization_address3 </th>
                                      <th> organization district </th>
                                      <th> organization institution </th>
                                      <th> register type </th>
                                      <th> registrant name </th>
                                      <th> registrant designation </th>
                                      <th> registrant data of birth </th>
                                      <th> email </th>
                                      <th> mobile </th>
                                      <th> sms verified </th>
                                      <th> transaction id </th>
                                      <th> subcription id </th>
                                      <th> profile completeness </th>
                                      <th> sms count </th>
                                      <th> resume download count </th>
                                      <th> sms_remaining_count </th>
                                      <th> remaining_resume_download_count </th>
                                      <th> organization_status </th>
                                      <th> edit </th>
                                      <th> delete </th>
                                    </tr>
                                  </thead>
                                  <tbody>                                   
                                    <tr class="parents_tr" id="column">
                                      <td class="organization_name"> 
                                      </td>
                                      <td class="organization_logo"> 
                                      </td>
                                      <td class="organization_address_1"> 
                                      </td>
                                      <td class="organization_address_2"> 
                                      </td>
                                      <td class="organization_address_3"> 
                                      </td>
                                      <td class="organization_district_id"> 
                                      </td>
                                      <td class="organization_institution_type_id"> 
                                      </td>
                                      <td class="registrant_register_type"> 
                                      </td>
                                      <td class="registrant_name"> 
                                      </td>
                                      <td class="registrant_designation"> 
                                      </td>
                                      <td class="registrant_date_of_birth"> 
                                      </td>
                                      <td class="registrant_email_id"> 
                                      </td>
                                      <td class="registrant_mobile_no"> 
                                      </td>
                                      <td class="is_sms_verified"> 
                                      </td>
                                      <td class="transcation_id"> 
                                      </td>
                                      <td class="subcription_id"> 
                                      </td>
                                      <td class="organization_profile_completeness"> 
                                      </td>
                                      <td class="organization_sms_count"> 
                                      </td>
                                      <td class="organization_resume_download_count"> 
                                      </td>
                                      <td class="organization_sms_remaining_count"> 
                                      </td>
                                      <td class="organization_remaining_resume_download_count"> 
                                      </td>
                                      <td class="organization_status"> 
                                      </td>
                                      <td class="edit_section">
                                        <a class="ajaxEdit" id="column" href="javascript:;" data-id="">
                                          Edit
                                        </a>
                                      </td>
                                      <td>
                                        <a class="ajaxDelete" href="javascript:;" data-id="">
                                          Delete
                                        </a>
                                      </td>
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
  <script>
    // Define default values
    var inputType = new Array("text","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("state_name","state_status"); // Set name of input types
    var placeholder = new Array("Enter State Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var organization_institution_type_id_option = new Array("Please select institution");
    var organization_institution_type_id_value = new Array("");
    <?php foreach ($variable as $key => $value): ?>
      
    <?php endforeach ?>







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
