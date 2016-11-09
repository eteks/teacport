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
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Editable Table
                     <small>Editable Table Sample</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="editable_table.html#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="editable_table.html#">Data Tables</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="editable_table.html#">Editable Table</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Editable Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn green">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="editable_table.html#">Print</a></li>
                                            <li><a href="editable_table.html#">Save as PDF</a></li>
                                            <li><a href="editable_table.html#">Export to Excel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>State Name</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="editable_table">
                                        <td>
                                          <span class="view_on_pageload">Andhra</span>
                                          <input class="view_on_edit" type="text" value="Andhra">
                                        </td>                                        
                                        <td>
                                        	 <span class="view_on_pageload">Active</span>
                                        	 <select class="view_on_edit">
												  <option value="active">Active</option>
												  <option value="inactive">Inactive</option>
											</select>
                                        </td>
                                        <td class="center">01-01-2000</td>
                                        <td><a class="edit" data-edit="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" data-edit="cancel" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr class="editable_table">
                                        <td>
                                        	<span class="view_on_pageload">Tamilnadu</span>
                                        	<input class="view_on_edit" type="text" value="Tamilnadu">
                                        </td>
                                        <td>
                                        	<span class="view_on_pageload">Active</span>
                                        	 <select class="view_on_edit">
												  <option value="active">Active</option>
												  <option value="inactive">Inactive</option>
											</select>
                                        </td>
                                        <td class="center">01-01-2000</td>
                                        <td><a class="edit" data-edit="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" data-edit="cancel" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr class="editable_table">
                                        <td>
                                        	<span class="view_on_pageload">Kerala</span>
                                        	<input class="view_on_edit" type="text" value="Kerala">
                                        </td>
                                        <td>
                                        	<span class="view_on_pageload">Active</span>
                                        	 <select class="view_on_edit">
												  <option value="active">Active</option>
												  <option value="inactive">Inactive</option>
											</select>
                                        </td>
                                        <td class="center">01-01-2000</td>
                                        <td><a class="edit" data-edit="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" data-edit="cancel" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <!-- <tr class="">
                                        <td>vectorlab</td>
                                        <td>Inactive</td>
                                        <td class="center">01-01-2000</td>
                                        <td><a class="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr class="">
                                        <td>Admin</td>
                                        <td>Inactive</td>
                                        <td class="center">01-01-2000</td>
                                        <td><a class="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr class="">
                                        <td>Rafiqul</td>
                                        <td>Active</td>
                                        <td class="center">01-01-2000</td>
                                        <td><a class="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr> -->
                                    </tbody>
                                </table>
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
<?php include "templates/footer.php" ?>