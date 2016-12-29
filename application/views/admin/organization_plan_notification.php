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
                     <small>Job Providers</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                        <li>
                          <a href="#">Job Providers</a><span class="divider">&nbsp;</span>
                        </li>
                       <li>
                          <a href="<?php echo base_url(); ?>main/organization_plan_notification">
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
                            </div>
                            <form>
                            <?php } ?> 
                                  <table class="table table-striped table-hover table-bordered admin_table ads_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Organization Name</th>
                                        <th>Subscription Name</th>
                                        <th>Is Upgrade/Renewal?</th>
                                        <th>Validity Start Date</th>
                                        <th>Validity End Date</th>
                                        <th>Is Email Sent?</th>
                                        <th>Is Email Viewed?</th>
                                        <th>Is Email Read?</th>
                                        <th>Created Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // echo sizeof($org_notification);
                                    // echo "<pre>";
                                    // print_r($org_notification);
                                    // echo "</pre>";
                                      if(!empty($org_notification)) :
                                      $i=1;
                                      foreach ($org_notification as $org_not) :
                                    ?>   
                                      <tr class="parents_tr" id="column1">
	                                        <td class=""> 
	                                          <?php echo $org_not['organization_name']; ?>
	                                        </td>
	                                        <td class=""> 
	                                          <?php echo $org_not['subscription_plan']; ?>
	                                        </td>
	                                        <td class=""> 
	                                          <?php 
                                              if($org_not['upgrade_or_renewal_id'] !=NULL) echo "<span class='icon-ok'> </span>";
                                              else
                                                echo "<span class='icon-remove'> </span>";
                                             ?>
	                                        </td>
                                          <td class="center_align"> 
                                            <?php 
                                              if($org_not['upgrade_or_renewal_id'] !=NULL) 
                                                echo date("d/m/Y", strtotime($org_not['upg_vstart']));
                                              else
                                                echo date("d/m/Y", strtotime($org_not['org_sub_vstart']));
                                             ?>
                                          </td>
                                          <td class="center_align"> 
                                            <?php 
                                              if($org_not['upgrade_or_renewal_id'] !=NULL) 
                                                echo date("d/m/Y", strtotime($org_not['upg_vend']));
                                              else
                                                echo date("d/m/Y", strtotime($org_not['org_sub_vend']));
                                             ?>
                                          </td>
                                          <td class="is_email_sent center_align">
  	                                        <?php 
                                                if($org_not['is_email_sent'] ==1) echo "<span class='icon-ok'> </span>";
                                                else
                                                  echo "<span class='icon-remove'> </span>";
                                            ?>
                                          </td>
	                                        <td class="is_email_viewed center_align"> 
	                                          <?php 
                                                if($org_not['is_email_viewed'] ==1) echo "<span class='icon-ok'> </span>";
                                                else
                                                  echo "<span class='icon-remove'> </span>";
                                            ?>
	                                        </td>
	                                        <td class="is_email_read center_align"> 
	                                          <?php 
                                                if($org_not['is_email_read'] ==1) echo "<span class='icon-ok'> </span>";
                                                else
                                                  echo "<span class='icon-remove'> </span>";
                                            ?>
	                                        </td>
	                                        <td class="created_date">
	                                          <?php 
                                              $created_datetime = explode(' ', $org_not['created_date']);
                                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                                            ?>
	                                        </td>
                                       </tr>
                                       <?php
                                        $i++;
                                        endforeach;
                                        endif;
                                      ?>
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
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
