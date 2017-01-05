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
  <!-- BEGIN PAGE -->
  <div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
          <!-- <h3 class="page-title">
            Error Page
            <small>404</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Error</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="#">404</a>
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
                <i class="icon-reorder"></i>Error page
              </h4>
              <!-- <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
              </span> -->
            </div>
            <div class="row-fluid" >
	           <div class="span12">
	               <div class="space20"></div>
	               <div class="space20"></div>
	               <div class="widget-body">
	                   <div class="error-page" style="min-height: 800px">
	                       <img src="<?php echo base_url(); ?>assets/admin/img/admin_404.png" alt="404 error">
	                       <h1>
	                           <strong>404</strong> <br/>
	                           Page Not Found
	                       </h1>
	                       <p>We're sorry, the page you were looking for doesn't exist anymore.</p>
	                   </div>
	               </div>
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
  var inputType = new Array("text","select"); // Set type of input which are you have used like text, select,textarea.
  var columns = new Array("e_name","e_status"); // Set name of input types
  var placeholder = new Array("Enter Extra-Curricular Name",""); // Set placeholder of input types
  var class_selector = new Array("");//To set class for element
  var table = "admin_table"; // Set classname of table
  var e_status_option = new Array("Please select status","Active","Inactive"); 
  var e_status_value = new Array("","1","0"); 
</script>
  
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>