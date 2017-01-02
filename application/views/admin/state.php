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
<div id="container" class="row-fluid"> <!-- BEGIN CONTAINER -->
  <div id="sidebar" class="nav-collapse collapse"> <!-- BEGIN SIDEBAR -->
    <div class="sidebar-toggler hidden-phone"></div>
    <div class="navbar-inverse"> <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
      <form class="navbar-search visible-phone">
        <input type="text" class="search-query" placeholder="Search" />
      </form>
    </div> <!-- END RESPONSIVE QUICK SEARCH FORM -->
  </div> <!-- END SIDEBAR -->
  <div id="main-content"> <!-- BEGIN PAGE -->
    <div class="container-fluid"> <!-- BEGIN PAGE CONTAINER-->
      <div class="row-fluid"> <!-- BEGIN PAGE HEADER-->
        <div class="span12">
          <h3 class="page-title">
            Teachers Recruit
            <small>Master Data</small>
          </h3>
          <ul class="breadcrumb"> <!-- START PAGE TITLE & BREADCRUMB-->
            <li>
              <a href="<?php echo base_url()."main/dashboard"; ?>">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Master Data</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url()."main/state"; ?>">State</a>
              <span class="divider-last">&nbsp;</span>
            </li>
          </ul> <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
      </div> <!-- END PAGE HEADER-->
      <div class="row-fluid"> <!-- BEGIN ADVANCED TABLE widget-->
        <div class="span12">
          <div class="widget">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> State
              </h4>
              <!-- <h3 class="ajax_loader">
                <span> Loading </span>
              </h3>
              <p class="cb"> -->
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
                <form method="post" action="state" class="admin_module_form" id="state_form">
                  <?php } ?>
                  <?php
                  if(!empty($status)) :
                    echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                  endif;
                  ?> 
                  <p class='val_error error_msg_md'> <p>
                  <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                          <th>Statename</th>
                          <th>Status</th>
                          <th>Created date</th>
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
                      if(!empty($state_values)) :
                      $i=0;
                      foreach ($state_values as $sta_val) :
                      $i++;
                      ?>
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="s_name"> 
                          <?php echo $sta_val['state_name']; ?>
                        </td>
                        <td class="s_status"> 
                          <?php 
                          if ($sta_val['state_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <input type="hidden" value="<?php echo $sta_val['state_status']; ?>" />
                        </td>
                        <td class="created_date"> 
                          <?php 
                            $created_datetime = explode(' ', $sta_val['state_created_date']);
                            echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                          ?> 
                        </td>
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $sta_val['state_id']; ?>">
                            Edit
                          </a>
                        </td>
                        <td>
                          <?php 
                            if(!empty($mapped_data)){
                              $state_id = $sta_val['state_id'];  
                              $mapped_result = array_filter($mapped_data, function($m) use ($state_id) {
                              return $m == $state_id; });
                              if(count($mapped_result) > 0)
                                echo "<span class='restrict'>Delete<div class='restrict_tooltip'>Mapping has been already done. Delete not possible.</div></span>";
                              else
                                echo "<a class='ajaxDelete' data-id='".$sta_val['state_id']."'>Delete</a>";
                            }
                            else{
                              echo "<a class='ajaxDelete' data-id='".$sta_val['state_id']."'>Delete</a>";
                            }
                          ?>      
                        </td>
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
        </div>
      </div> <!-- END ADVANCED TABLE widget-->
    </div> <!-- END PAGE CONTAINER-->
  </div> <!-- END PAGE -->
</div> <!-- END Container -->
<script>
  // Define default values
  var inputType = new Array("text","select"); // Set type of input which are you have used like text, select,textarea.
  var columns = new Array("s_name","s_status"); // Set name of input types
  var placeholder = new Array("Enter State Name",""); // Set placeholder of input types
  var class_selector = new Array("");//To set class for element
  var table = "admin_table"; // Set classname of table
  var s_status_option = new Array("Please select status","Active","Inactive"); 
  var s_status_value = new Array("","1","0"); 
</script>

<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
