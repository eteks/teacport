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
         <div class="container-fluid sub_section_scroll">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <!-- <h3 class="page-title">
                     Teachers Recruit
                     <small>Others</small>
                  </h3> -->
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                        <li>
                          <a href="#">Others</a><span class="divider">&nbsp;</span>
                        </li>
                       <li>
                          <a href="<?php echo base_url(); ?>main/site_visit_tracking">
                            Site Visit Tracking
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
                            <h4><i class="icon-reorder"></i> Site Visit Tracking</h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                </div>
                                <form>
                                  <table class="table table-striped table-hover table-bordered admin_table ads_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Organization Name</th>
                                        <th>Candidate Name</th>
                                        <th>IP Address</th>
                                        <th>Page View</th>
                                        <th>User Agent</th>
                                        <th>Count</th>
                                        <th>Unique Visitor</th>
                                        <th>Created Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="parents_tr" id="column">
                                        <td class=""> 
                                          ETS
                                        </td>
                                        <td class=""> 
                                          Employee
                                        </td>
                                        <td class=""> 
                                          192.168.0.00
                                        </td>
                                        <td class="">
                                          http://localhost/teacport/admin/sitevisit
                                        </td>
                                         <td class=""> 
                                          Firebox v12.0
                                        </td>
                                        <td class=""> 
                                          40
                                        </td>
                                        <td class="">
                                          <ul class="on_off_button on_off_button_j site_visit_btn" disabled>
			                              	<li data-value="1" class="on"><a href="#">Yes</a></li> 
			                              	<li data-value="0"><a href="#">No</a></li>
			                              </ul>
                                        </td>
                                        <td class="created_date">
                                          00-00-0000
                                        </td>
                                      </tr>
                                      <tr class="parents_tr" id="column">
                                        <td class=""> 
                                          ETS
                                        </td>
                                        <td class=""> 
                                          Employee
                                        </td>
                                        <td class=""> 
                                          192.168.0.00
                                        </td>
                                        <td class="">
                                          http://localhost/teacport/admin/sitevisit
                                        </td>
                                         <td class=""> 
                                          Firebox v12.0
                                        </td>
                                        <td class=""> 
                                          40
                                        </td>
                                        <td class="">
                                          <ul class="on_off_button on_off_button_j site_visit_btn" disabled>
			                              	<li data-value="1"><a href="#">Yes</a></li> 
			                              	<li data-value="0" class="on"><a href="#">No</a></li>
			                              </ul>
                                        </td>
                                        <td class="created_date">
                                          00-00-0000
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
redirect(base_url().'main');
endif;
?>


text, browse,text,datepicker,verify,select