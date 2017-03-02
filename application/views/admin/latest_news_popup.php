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
                    <button id="sample_editable_1_new" data-open="popup_section_subs" class="btn green add_option" data-action="save">
                      Add New <i class="icon-plus"></i>
                    </button>
                  <?php endif; ?>
                  </div>
                </div>
                <form action="subscription_plans">
                <p class="admin_status"> </p>
                  <div>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Latest News</th>
                        <th>News Type</th>
                        <!--<th>Features</th> -->
                        <th>News Content / Link</th>
                        <!-- <th>Validity End Date</th> -->
                        <!-- <th>Max Vacancy Posts</th>
                        <th>Max Sms</th>
                        <th>Max Email</th>
                        <th>Max Resume Download</th>
                        <th>Max Ad Posts</th>
                        <th>Max Days Ad visible</th> -->
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
                      if(!empty($subscription_plans)):
                      foreach ($subscription_plans as $sub) :
                    ?>                              
                      <tr class="parents_tr" id="column">
                        <td> 
                          Latest News Title
                        </td>
                        <td> 
                          News Type
                        </td>
                        <td> 
                          www.etekchnoservices.com
                        </td>
                        <td> 
                          Active / Inactive
                        </td>
                        <td> 
                          <?php 
                          $created_datetime = explode(' ', $sub['subscription_created_date']);
                          echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; ?>
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="edit_option popup_fields" data-id="<?php echo $sub['subscription_id']; ?>" data-popup-open="popup_section_subs" data-href="subscription_plans_ajax" data-mode="edit" data-popup-open="popup_section_subs" data-action="update">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td>
                          <a class="pop_delete_action" data-mode="delete" data-id="<?php echo $sub['subscription_id']; ?>">
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
            <form action="" class="form-horizontal popup_form admin_form" data-mode="">
            <p class="admin_status"> </p>
              <fieldset>
                <legend> Latest News Details:</legend>
                <div class="form-wizard pop_details_section">
                  <div class="tab-content">
                    <div class="col12">
                      <div class="col6 control-group">  
                        <label class="control-label">Latest News Title</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" maxlength="50" placeholder="News Title" name="sub_plan" value=""/> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label">News Type</label>
                        <span class="dynamic_data"> 
                          <select name="" class="newstype_act">
                            <option value=""> Please select status </option>
                                <option value="news_link"> News in Link </option>
                                <option value="news_content"> News as Content </option>
                          </select>
                        </span>
                      </div>

                      <div class="display_newstype">
                        <div class="col6 control-group enter_news_link dn">  
                          <label class="control-label">Enter News Link</label>
                          <span class="dynamic_data"> 
                            <input type="text" class="form-control" maxlength="50" placeholder="News Title" name="news_link" value=""/> 
                          </span>
                        </div>
                        <div class="enter_news_content dn">  
                          <label class="control-label">News Content</label>
                          <div class="col12">
                            <textarea name="ckeditor" id="ckeditor"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="col6 control-group">
                        <label class="control-label">Latest News Status</label>
                        <span class="dynamic_data"> 
                          <select name="" class="newstype_act">
                            <option value=""> Select Status </option>
                                <option value="news_link"> Active </option>
                                <option value="news_content"> Inactive  </option>
                          </select>
                        </span>
                      </div>

                     </div> 
                  </div>
                <button type="submit" class="btn btn-info save_button">Save</button>
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
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>


<!-- CK-EDITOR -->
        <script src="http://cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor');

            // The height value now applies to the editing area.
            editor.resize( '100%', '350', true )
        </script>
