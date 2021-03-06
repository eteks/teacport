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
   <!-- <div class="sidebar-toggler hidden-phone"></div> -->
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
            <small>Job Seekers</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Others</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/job_seeker_profile">Latest News</a>
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
          <div class="edit_add_overlay dn"> </div> <!-- Overlay for table -->
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i>Latest News 
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                	<div class="btn-group">
                    <?php if(($is_super_admin) || (recursiveFind($access_rights, "add"))): ?>
                      <button id="sample_editable_1_new" class="btn green add_new">
                              Add New <i class="icon-plus"></i>
                      </button>
                    <?php endif; ?>
                  </div>
                  <div class="btn-group pull-right">
                  </div>
                </div>
                <form method="post" action="latest_news" class="admin_module_form" id="latestnews_form">
                  <?php } ?>
                    <?php
                    if(!empty($status)) :
                      echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                    endif;
                    ?> 
                  <div class="">  
                    <p class='val_error error_msg_md'> <p>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th>Latest News Title </th>
                          <th>Latest News Redirect Link </th>
						              <th>Latest News Status </th>
                          <th>Created date</th>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                            <th class="data_action">Edit</th>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                            <th class="data_action">Delete</th>
                          <?php endif; ?>                          
                        </tr>
                      </thead>
                      <tbody class="table_content_section"> 
                      <?php
                        if(!empty($latest_news_values)) :
                        $i=0;
                        foreach ($latest_news_values as $lat_news) :
                        $i++;
                      ?>                       
                        <tr class="parents_tr" id="column<?php echo $i; ?>">
                          <td class="l_news_title"> 
                          	<?php echo $lat_news['latest_news_title']; ?>
                          </td>
                          <td class="l_redirect_link"> 
                         	<?php echo $lat_news['latest_news_redirect_link']; ?>
                          </td>                         
                         <td class="l_news_status"> 
                            <?php 
                              if ($lat_news['latest_news_status'] == 1) 
                                echo "Active";
                              else
                                echo "Inactive";
                            ?>      
                            <input type="hidden" value="<?php echo $lat_news['latest_news_status']; ?>" />         
                         </td>
                        <td class="created_date"> 
                            <?php 
                              $created_datetime = explode(' ', $lat_news['latest_news_createddate']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?> 
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                          <td class="edit_section">
                            <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $lat_news['latest_news_id']; ?>">
                              Edit
                            </a>
                          </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                          <td class="delete_section">
    							         <a class='ajaxDelete' data-id="<?php echo $lat_news['latest_news_id']; ?>">Delete</a>
                          </td> 
                        <?php endif; ?>                         
                        </tr>  
                        <?php
                          endforeach;
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

      <!---Full View & Edit popup -->
     
      <!-- END ADVANCED TABLE widget-->
      <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
  </div>
</div>
  <!-- END PAGE -->
  <script>
    // Define default values
    var inputType = new Array("text","text","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("l_news_title","l_redirect_link","l_news_status" ); // Set name of input types
    var placeholder = new Array("Enter Latest News Title","Enter Redirect Link"); // Set placeholder of input types
    var class_selector = new Array("");//To set class for element
    var table = "admin_table"; // Set classname of table
    var maxlength= new Array("");
    // var is_created="no";
    var l_news_status_option = new Array("Please select status","Active","Inactive"); 
    var l_news_status_value = new Array("","1","0");
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
