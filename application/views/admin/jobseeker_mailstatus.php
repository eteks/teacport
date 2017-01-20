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
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE -->
  <div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid sub_pre_section">
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
          <!-- <h3 class="page-title">
            Teachers Recruit
            <small>Job Providers</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Job Seekers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/transaction">Candidate Approved jobs</a>
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
              <h4>
                <i class="icon-reorder"></i>Candidate Approved jobs
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                </div>
                <form action="jobseeker_mailstatus">
                  <p class="admin_status"> </p>
                  <div class="">  
                    <p class='val_error'> <p>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th> Candidate Name </th>
                          <th> Candidate Mobile </th>
                          <th> Inbox Message </th>
                          <th> Organization Name </th>
                          <th> Vacancy Job Title </th>
                          <th> Is Viewed By candidate </th>
                          <th> Status </th>
                          <th> Created Date</th>
                        </tr>
                      </thead>
                      <tbody class="table_content_section"> 
                        <?php } ?>
                        <?php
                        if(!empty($approved_candidate_jobs))  :
                        ?>   
                        <?php
                          foreach ($approved_candidate_jobs as $jobs) :
                          ?>                                  
                        <tr class="parents_tr" id="column">
                          <td class="">
                            <?php echo $jobs['candidate_name']; ?>
                          </td>
                          <td class="">
                            <?php 
                            if(!empty($jobs['candidate_mobile_no']) && $jobs['candidate_mobile_no'] != 0) :
                              echo $jobs['candidate_mobile_no'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </td>
                          <td class="">
                            <?php echo $jobs['candidate_inbox_message']; ?>
                          </td>
                          <td class="">
                            <?php 
                            if(!empty($jobs['organization_name'])) :
                              echo $jobs['organization_name'];
                            else :
                              echo "NULL";
                            endif;
                            ?>   
                          </td>
                          <td class="">
                            <?php 
                            if(!empty($jobs['vacancies_job_title'])) :
                              echo $jobs['vacancies_job_title'];
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </td>
                          <td class="center_align">
                            <?php 
                            if ($jobs['is_viewed'] == 1) 
                              echo "<span class='icon-ok'> </span> <p class='hidden_values'> Yes </p>";
                            else
                              echo "<span class='icon-remove'> </span> <p class='hidden_values'> No </p>";
                            ?>
                          </td>
                          <td class="">
                            <?php 
                              if ($jobs['candidate_inbox_status'] == 1) 
                                echo "Active";
                              else
                                echo "Inactive";
                            ?>
                          </td>
                          <td class=""> 
                            <?php 
                              $created_datetime = explode(' ', $jobs['candidate_inbox_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?> 
                          </td>         
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        <?php 
                        endif;
                        ?>
                        <?php if(!$this->input->is_ajax_request()) { ?> 
                      </tbody>
                    </table>
                  </div>
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
</div>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
