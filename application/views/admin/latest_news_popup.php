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
    <!-- END SIDEBAR MENU -->
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
            <small>Plan Setting</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span> Others </span>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/subscription_plans">
                Latest News 
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
              <h4>
                <i class="icon-reorder"></i> Latest News
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                  <div class="btn-group">
                  <?php if(($is_super_admin) || (recursiveFind($access_rights, "add"))): ?>
                    <button id="sample_editable_1_new" data-popup-open="popup_section_subs" class="btn green new_add_option" data-mode="add" data-action="save" data-href="latest_news_ajax" data-section="editor">
                      Add New <i class="icon-plus"></i>
                    </button>
                  <?php endif; ?>
                  </div>
                </div>
                <form action="latest_news">
                <p class="admin_status"> </p>
                  <div>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Latest News</th>
                        <th>News Type</th>
                        <th>News Content / Link</th>
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
                    <tbody class="table_content_section">
                      <?php } ?>
                      <?php
                      if(!empty($latest_news_values)) :
                      $i=0;
                      foreach ($latest_news_values as $lat_news) :
                      $i++;
                      ?>                               
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td> 
                          <?php echo $lat_news['latest_news_title']; ?>
                        </td>
                        <td> 
                          <?php echo $lat_news['latest_news_type']; ?>
                        </td>
                        <td> 
                          <?php echo $lat_news['latest_news_content_or_link']; ?>
                        </td>
                        <td> 
                          <?php 
                          if ($lat_news['latest_news_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?> 
                        </td>
                        <td> 
                          <?php 
                          $created_datetime = explode(' ', $lat_news['latest_news_createddate']);
                          echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1];
                          ?> 
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="edit_option popup_fields" data-id="<?php echo $lat_news['latest_news_id']; ?>" data-popup-open="popup_section_subs" data-section="editor" data-href="latest_news_ajax" data-mode="edit" data-action="update">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td class="delete_section">
                          <a class="pop_delete_action" data-mode="delete" data-id="<?php echo $lat_news['latest_news_id']; ?>">
                            Delete
                          </a>
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

      <!---Add and edit popup -->
      <div class="popup" data-popup="popup_section_subs">
        <div class="popup-inner">       
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Latest News
              </h4>                        
            </div>
            <div class="widget-body form">
              <form action="latest_news" class="form-horizontal admin_simple_popup_form" data-mode="">
                <p class="admin_status"> </p>
                <fieldset>
                  <legend> Latest News Details:</legend>
                  <div class="form-wizard pop_details_section">
                    <?php } ?>
                    <?php
                    if(!empty($latest_news_details) || (!empty($mode) && $mode=="add") ) :
                    ?>
                    <div class="tab-content">
                      <div class="col12">
                        <div class="col6 control-group">  
                          <label class="control-label">Latest News Title</label>
                          <span class="dynamic_data"> 
                            <input type="text" class="form-control" maxlength="150" placeholder="News Title" name="news_title" value="<?php if(!empty($latest_news_details['latest_news_title'])) echo $latest_news_details['latest_news_title']; ?>"/> 
                          </span>
                        </div>
                        <div class="col6 control-group">
                          <label class="control-label">News Type</label>
                          <span class="dynamic_data"> 
                            <select name="news_type" class="newstype_act">
                              <option value=""> Please select type </option>
                              <option value="link" <?php if(!empty($latest_news_details['latest_news_type']) && $latest_news_details['latest_news_type'] == "link") echo "selected"; ?>> News in Link </option>
                              <option value="content" <?php if(!empty($latest_news_details['latest_news_type']) && $latest_news_details['latest_news_type'] == "content") echo "selected"; ?>> News as Content </option>
                            </select>
                          </span>
                        </div>
                        <div class="display_newstype">
                          <div class="col6 control-group enter_news_link <?php if(!empty($latest_news_details['latest_news_type']) && $latest_news_details['latest_news_type'] == "link") echo ''; else echo 'dn'; ; ?>">  
                            <label class="control-label">Enter News Link</label>
                            <span class="dynamic_data"> 
                              <input type="text" class="form-control" placeholder="News Title" name="news_link" value="<?php if(!empty($latest_news_details['latest_news_type']) && $latest_news_details['latest_news_type'] == "link" && !empty($latest_news_details['latest_news_content_or_link'])) echo $latest_news_details['latest_news_content_or_link']; ?>"/> 
                            </span>
                          </div>
                          <div class="enter_news_content <?php if(!empty($latest_news_details['latest_news_type']) && $latest_news_details['latest_news_type'] == "content") echo ''; else echo 'dn'; ; ?>">  
                            <label class="control-label">News Content</label>
                            <div class="col12">
                              <textarea name="news_content" id="ckeditor"><?php if(!empty($latest_news_details['latest_news_type']) && $latest_news_details['latest_news_type'] == "content" && !empty($latest_news_details['latest_news_content_or_link'])) echo $latest_news_details['latest_news_content_or_link']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col6 control-group">
                          <label class="control-label">Latest News Status</label>
                          <span class="dynamic_data"> 
                            <select name="news_status">
                              <option value=""> Select Status </option>
                                  <option value="1" <?php if(!empty($latest_news_details['latest_news_status']) && $latest_news_details['latest_news_status'] == 1) echo "selected"; ?>> Active </option>
                                  <option value="0" <?php if(isset($latest_news_details['latest_news_status']) && $latest_news_details['latest_news_status']!='' && $latest_news_details['latest_news_status'] == 0) echo "selected"; ?>> Inactive  </option>
                            </select>
                          </span>
                        </div>
                     </div> 
                     <input type="hidden" name="action" value="<?php echo ((isset($mode) && !empty($mode) && $mode == "edit") ? "update" : "save"); ?>"/>
                     <input type="hidden" name="rid" value="<?php if(!empty($latest_news_details['latest_news_id'])) echo $latest_news_details['latest_news_id']; ?>"/>
                    </div>
                    <button type="submit" class="btn btn-info save_button">Save</button>
                    <?php
                    endif;
                    ?>
                    <?php if(!$this->input->is_ajax_request()) { ?>
                  </div>
                </fieldset>
              </form>
            </div> 
          </div>                
          <p>
            <a data-open="popup_section_subs" class="close_trig" href="#">Close</a>
          </p>
          <a class="popup-close close_trig" data-open="popup_section_subs"href="#">x</a>
        </div>
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
<script src="http://cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
<script type="text/javascript">
  // CKEDITOR.replace('ckeditor');
  // // The height value now applies to the editing area.
  // editor.resize( '100%', '350', true );
</script>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>

