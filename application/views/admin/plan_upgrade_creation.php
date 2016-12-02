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
                     <small>Plan Settings</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                          <a href="#">Plan Settings</a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                          <a href="<?php echo base_url(); ?>admin/plan_upgrade_creation">
                            Plan Upgrade Creation
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
                            <h4><i class="icon-reorder"></i> Plan Upgrade Creation</h4>
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
                                
                                <form method="post" action="subscription_pan/plan_upgrade_creation" class="admin_module_form" id="plan_upgrade_creation_form">
                                  <table class="table table-striped table-hover table-bordered admin_table plan_upgrade_creation" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Subscription Name</th>
                                        <th>Is SMS?</th>
                                        <th>SMS Count</th>
                                        <th>Is Email?</th>
                                        <th>Email Count</th>
                                        <th>Is Resume?</th>
                                        <th>Resume Count</th>
                                        <th>Price</th>
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
                                        <td class="subscription_name"> 
                                          Plan1
                                        </td>
                                        <td class="is_sms center_align"> 
                                          <span class="icon-ok"> </span> 
                                        </td>
                                        <td class="sms_count"> 
                                          20 
                                        </td>
                                        <td class="is_email center_align"> 
                                          <span class="icon-ok"> </span>
                                        </td>
                                        <td class="email_count"> 
                                          20 
                                        </td>
                                        <td class="is_resume center_align">
                                          <span class="icon-remove"> </span>
                                        </td>
                                        <td class="resume_count"> 
                                          20 
                                        </td>
                                        <td class="price"> 
                                          1000
                                        </td>
                                        <td class="plan_upgrade_creation_status"> 
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
                                          <a class="ajaxDelete" id="column1" data-id="column1">Delete</a>
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
    var inputType = new Array("text","on_off","text","on_off","text","on_off","text","text","select","label"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("subscription_name","is_sms","sms_count","is_email","email_count","is_resume","resume_count","price","plan_upgrade_creation_status","created_date"); // Set name of input types
    var placeholder = new Array("Enter State Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var is_created ="no";
    var plan_upgrade_creation_status_option = new Array("Active","Inactive"); 
    var plan_upgrade_creation_status_value = new Array("1","0"); 
  </script>
<?php include "templates/footer_grid.php" ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>
