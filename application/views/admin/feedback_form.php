<?php
$is_super_admin = $this->config->item('is_super_admin');
// $access_rights = $this->config->item('access_rights');
if(!$is_super_admin){
  $access_permission=$this->config->item('current_page_rights');	
  $current_page_rights = $access_permission['access_permission'];
  $access_rights = explode(',',$current_page_rights);
}
if(!empty($this->session->userdata("login_status"))): 
?>
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
                          <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                        <li>
                          <a href="#">Others</a><span class="divider">&nbsp;</span>
                        </li>
                       <li>
                          <a href="<?php echo base_url(); ?>admin/jobprovider_ads">
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
                                        <button id="sample_editable_1_new" data-open="popup_section" class="btn green add_option">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <form method="post" action="adminindex/state" class="admin_module_form" id="state_form">
                                  <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Form Title</th>
                                        <th>Form Message</th>
                                        <th>Is Organization?</th>
                                        <th>Is Candidate?</th>
                                        <th>Is Guest User?</th>
                                        <th>Candidate or Organization</th>
                                        <th>Is Viewed</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                            				<th class="data_action">Edit</th>
                          				<?php endif; ?>
                         				<?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                          				     <th class="data_action">Delete</th>
                         				<?php endif; ?>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="parents_tr" id="column1">
                                        <td class=""> 
                                          Feedback Form
                                        </td>
                                        <td class=""> 
                                          Message 
                                        </td>
                                        <td class="is_organization center_align"> 
                                          <span class="icon-ok"> </span>
                                        </td>
                                        <td class="is_candidate center_align">
                                          <span class="icon-remove"> </span>
                                        </td>
                                        <td class="is_guest_user center_align"> 
                                          <span class="icon-remove"> </span>
                                        </td>
                                        <td class=""> 
                                          Ets
                                        </td>
                                        <td class="is_viewed is_viewd_onoff center_align"> 
                                          <span class="icon-ok"> </span>
                                        </td>
                                        <td class="feedback_form_status center_align"> 
                                          Active
                                        </td>
                                        <td class="created_date">
                                          00-00-0000
                                        </td>
                                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                                        <td class="edit_section">
                                          <a class="ajaxEdit" id="column1" href="javascript:;" data-id="column1">
                                            Edit
                                          </a>
                                        </td>
                                        <?php endif; ?>
                                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                                        <td>
                                          <a class="ajaxDelete" onclick="Confirm.show()" data-id="">Delete</a>
                                        </td>
                                        <?php endif; ?>
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
<?php
else :
redirect(base_url().'admin');
endif;
?>


text, browse,text,datepicker,verify,select