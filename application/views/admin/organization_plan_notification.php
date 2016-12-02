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
                     <small>Job Providers</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                        <li>
                          <a href="#">Job Providers</a><span class="divider">&nbsp;</span>
                        </li>
                       <li>
                          <a href="<?php echo base_url(); ?>admin/organization_plan_notification">
                            Organization Plan Notification
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
                            <h4><i class="icon-reorder"></i> Organization Plan Notification</h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix add_section">
                                    <div class="btn-group">
                                        <!-- <button id="sample_editable_1_new" class="btn green add_new">
                                            Add New <i class="icon-plus"></i>
                                        </button> -->
                                    </div>
                                </div>
                                  <table class="table table-striped table-hover table-bordered admin_table ads_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Organization Name</th>
                                        <th>Subscription Name</th>
                                        <th>Upgrade Or Renewal</th>
                                        <th>Is Email Sent?</th>
                                        <th>Is Email Viewed?</th>
                                        <th>Is Email Read?</th>
                                        <th>Created Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="parents_tr" id="column1">
	                                        <td class=""> 
	                                          ETS
	                                        </td>
	                                        <td class=""> 
	                                          Plan1
	                                        </td>
	                                        <td class=""> 
	                                          12344
	                                        </td>
	                                        <td class="is_email_sent center_align"> 
	                                          <span class="icon-ok"> </span>
	                                        </td>
	                                        <td class="is_email_viewed center_align"> 
	                                          <span class="icon-ok"> </span>
	                                        </td>
	                                        <td class="is_email_read center_align"> 
	                                          <span class="icon-ok"> </span>
	                                        </td>
	                                        <td class="created_date">
	                                          01-01-2000
	                                        </td>
                                       </tr>
                                      <tr class="parents_tr" id="column2">
	                                        <td class=""> 
	                                          Etek
	                                        </td>
	                                        <td class=""> 
	                                          Plan2
	                                        </td>
	                                        <td class=""> 
	                                          56788
	                                        </td>
	                                        <td class="is_email_sent center_align"> 
	                                          <span class="icon-ok"> </span>
	                                        </td>
	                                        <td class="is_email_viewed center_align"> 
	                                          <span class="icon-remove"> </span>
	                                        </td>
	                                        <td class="is_email_read center_align"> 
	                                          <span class="icon-remove"> </span>
	                                        </td>
	                                        <td class="created_date">
	                                          10-10-2000
	                                        </td>
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
<?php include "templates/footer_grid.php" ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>
