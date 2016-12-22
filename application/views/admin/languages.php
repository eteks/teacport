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
          <h3 class="page-title">
            Teachers Recruit
            <small>Master Data</small>
          </h3>
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Master Data</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/languages">Languages</a>
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
                <i class="icon-reorder"></i> Languages
              </h4>
              <!-- <span class="tools">
                      <a href="javascript:;" class="icon-chevron-down"></a>
                      <a href="javascript:;" class="icon-remove"></a>
              </span> -->
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix">
                  <div class="btn-group">
                    <button id="sample_editable_1_new" class="btn green add_new">
                      Add New <i class="icon-plus"></i>
                    </button>
                  </div>
                  <div class="btn-group pull-right">
                  </div>
                </div>
                
                <form method="post" action="adminindex/languages" class="admin_module_form" id="languages_form">
                  <?php } ?>
                  <?php
                  if(!empty($status)) :
                    echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                  endif;
                  ?> 
                  <p class='val_error error_msg_md'> <p>
                  <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Language</th>
                        <th>Is Mother Tongue?</th>
                        <th>Is Medium of Instruction?</th>
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
                      <?php
                      if(!empty($language_values)) :
                      $i=0;
                      foreach ($language_values as $lan_val) :
                      $i++;
                      ?>
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="l_name">
                          <?php echo $lan_val['language_name']; ?>
                        </td>
                        <td class="l_mother_tongue">
                          <?php 
                          if ($lan_val['is_mother_tangue'] == 1) 
                            echo "Yes";
                          else
                            echo "No";
                          ?>
                          <input type="hidden" value="<?php echo $lan_val['is_mother_tangue']; ?>" />
                        </td>
                        <td class="l_instruction">
                          <?php 
                          if ($lan_val['is_medium_of_instruction'] == 1) 
                            echo "Yes";
                          else
                            echo "No";
                          ?>
                          <input type="hidden" value="<?php echo $lan_val['is_medium_of_instruction']; ?>" />
                        </td>
                        <td class="l_status">
                          <?php 
                          if ($lan_val['language_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <input type="hidden" value="<?php echo $lan_val['language_status']; ?>" />
                        </td>
                        <td class="language_created_date">
                          <?php 
                            $created_datetime = explode(' ', $lan_val['language_created_date']);
                            echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                          ?> 
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $lan_val['language_id']; ?>">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td>   
                          <a class="ajaxDelete" data-id="<?php echo $lan_val['language_id']; ?>">   
                            Delete
                          </a>
                        </td>
                        <?php endif; ?>
                      </tr>
                      <?php
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
<!-- END CONTAINER -->
<script>
  // Define default values
  var inputType = new Array("text","select","select","select"); // Set type of input which are you have used like text, select,textarea.
  var columns = new Array("l_name","l_mother_tongue","l_instruction","l_status"); // Set name of input types
  var placeholder = new Array("Enter Language Name",""); // Set placeholder of input types
  var class_selector = new Array("");//To set class for element
  var table = "admin_table"; // Set classname of table
  var l_mother_tongue_option = new Array("select","Yes","No"); 
  var l_mother_tongue_value = new Array("","1","0");
  var l_instruction_option = new Array("select","Yes","No"); 
  var l_instruction_value = new Array("","1","0");
  var l_status_option = new Array("select","Active","Inactive"); 
  var l_status_value = new Array("","1","0"); 
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>

