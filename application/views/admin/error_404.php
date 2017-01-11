<?php include "templates/header.php" ?>
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
  <!-- BEGIN PAGE -->
  <div id="main-content" class="<?php if(empty($this->session->userdata("admin_login_status"))) echo "remove_sidebar"; ?>">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid sub_section_scroll">
      <!-- BEGIN PAGE HEADER-->
      <?php if(!empty($this->session->userdata("admin_login_status")) && strpos($_SERVER['REQUEST_URI'], 'admin') === FALSE): ?>
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
      <?php endif; ?>
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
<?php include "templates/footer_grid.php" ?>
