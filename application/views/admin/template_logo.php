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
         <div class="container-fluid sub_pre_section">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <!-- <h3 class="page-title">
                     Teachers Recruit
                     <small>Setting</small>
                  </h3> -->
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Setting</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>main/edit_profile">Template Logo</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> Template Logo</h4>
                            <span class="loader_holder hide_loader"> </span>
                        </div>
                        <div class="widget-body form">
                          <form action="template_logo" class="form-horizontal template_logo_act" method="POST">
                            <p class="admin_status"> </p>
	                          <div class="control-group">
	                            <label class="control-label">Logo</label>
	                            <div class="controls">
	                              <span>
	                                <a name="" class="btn upload_option"> Upload </a>
	                                <input name="template_logo" id="upload_logo" class="form-control hidden_upload" value="" type="file" >
                                  <?php 
                                  if(!empty($logo_values['template_logo'])) :
                                  ?>
	                                <img id='imagepreview_templogo' src="<?php echo $logo_values['template_logo']; ?>" alt="template logo">
                                  <?php
                                  else :
                                  ?>
                                  <img id='imagepreview_templogo' alt="template logo">
                                  <?php
                                  endif;
                                  ?>
                                  <!-- <i class="icon-remove-sign temp_remove_act">Remove</i> -->
	                              </span>
                                 <input type="hidden" value="<?php if(!empty($logo_values['template_logo'])) echo $logo_values['template_logo']; ?>" name="old_file_path" />
	                            </div>
	                          </div>
	                          <div class="control-group">
	                            <label class="control-label">Logo Text</label>
	                            <div class="controls">
	                              <input name="template_logo_text" value="<?php if(!empty($logo_values['template_logo_text'])) echo $logo_values['template_logo_text']; ?>" type="text" class="span6" />
	                             </div>
	                          </div>
	                          <div class="form-actions">
	                            <button type="submit" class="btn btn-success">Save</button>
	                            <!-- <button type="button" class="btn">Cancel</button> -->
                            </div>
                            <input name="hidden_id_settings" type="hidden" class="hidden_id" value="<?php if(!empty($logo_values['template_id'])) echo $logo_values['template_id']; ?>" />
                          </form>
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
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>

