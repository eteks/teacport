	<!-- BEGIN FOOTER -->
        <div id="footer">
            <span>2016 &copy; Teacher Recruit.</span>
            <div class="span pull-right">
                <span class="go-top"><i class="icon-arrow-up"></i></span>
            </div>
        </div>        
	        <div class="popup_fade cancel_btn"></div> 
			<div class="error_popup_msg">
				<div class="success-alert">
			 		<span></span>
			 	</div><!--- -->
			 	<input type="submit" class="btn btn-primary alert_btn_popup" value="OK">
			</div><!--success_msg-->
			<div id="dialog-overlay"></div>
            <!--  Confirm box with yes and no button -->
            <div id="dialog-box">
                <h3 class="message"></h3>
                <div>
                  <span class="del_yes yes">Yes</span>
                  <span class="del_no no">No</span>
                </div>
            </div>
		<script>								 	
            var csfrData = {};
            csfrData['<?php echo $this->security->get_csrf_token_name(); ?>']
                       = '<?php echo $this->security->get_csrf_hash(); ?>';
            var admin_baseurl = "<?php echo base_url(); ?>admin/";
            var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
        </script>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.blockui.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.cookie.js"></script>
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"  type="text/javascript" ></script>

        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.crosshair.js"></script>

        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.peity.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/uniform/jquery.uniform.min.js"></script>

        <!-- Datatable plugin start -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/data-tables/DT_bootstrap.js"></script>  <!-- Bootstrap design  -->
       
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
        <!-- Datatable plugin end -->

        <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-daterangepicker/date.js"></script>

        <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-daterangepicker/date.js"></script>        
        <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/ajax_call.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/admin/js/table-editable.js"></script> -->  
        <script>
            var datatable = "";
            function datatable_initialization() {
                $('.admin_table').dataTable({
                    "order": [],
                    // Length of row in grid - row length
                    "lengthMenu" : [
                                    [5, 25, 50, -1], 
                                    [5, 25, 50, "All"]
                                  ],

                    // Page length
                    "pageLength" : 5,
                    // Change default text
                    "language" : {
                                    "lengthMenu": "_MENU_ records per page", // Remove show entries text from entries dropdown like "sLengthMenu": "_MENU_ records per page"
                                    "zeroRecords": "Nothing found - sorry", // empty table message
                                    "info": "Showing _START_ to _END_ of _TOTAL_ entries", // Entries message
                                    "infoEmpty": "No records available", // No results message
                                    "infoFiltered": "(filtered from _MAX_ total records)", // After filtering, message
                                    "search":         "Search:", // Search message
                                    "paginate": {  // Change pagination text
                                        "previous": "Prev", // Change previous pagination text
                                        "next": "Next" // Change next pagination text
                                    }
                    },

                    // Export option
                    "dom": 'lBfrtip',
                      
                    "buttons": 
                            [
                                {
                                    "extend": 'colvis',
                                    "columns": ':not(.data_action)',
                                    "postfixButtons": ['colvisRestore'],
                                    "text" : ' Column Visibility <i class="icon-angle-down"></i>',
                                    "className": 'btn dropdown-toggle colvis_button',
                                },
                                {
                                    "extend": 'collection',
                                    "text" : ' Export <i class="icon-angle-down"></i>',
                                    "className": 'btn dropdown-toggle export_button',
                                    "buttons": 
                                            [
                                                {
                                                    "extend": 'copy',
                                                    "text" : "Copy",
                                                    "className" : "export_options",
                                                    "exportOptions": {
                                                        "columns" : ':visible:not(.data_action)'
                                                    },
                                                },
                                                {
                                                    "extend": 'pdf',
                                                    "text" : "Save as pdf",
                                                    "className" : "export_options",
                                                    "exportOptions": {
                                                        "columns" : ':visible:not(.data_action)'
                                                    },
                                                },
                                                {
                                                    "extend": 'csv',
                                                    "text" : "Save as csv",
                                                    "className" : "export_options",
                                                    "exportOptions": {
                                                        "columns" : ':visible:not(.data_action)'
                                                    },
                                                },
                                                {
                                                    "extend": 'excel',
                                                    "text" : "Save as excel",
                                                    "className" : "export_options",
                                                    "exportOptions": {
                                                        "columns" : ':visible:not(.data_action)'
                                                    },
                                                },
                                                {
                                                    "extend": 'print',
                                                    "text" : "Print",
                                                    "className" : "export_options",
                                                    "exportOptions": {
                                                        "columns" : ':visible:not(.data_action)'
                                                    },
                                                },
                                            ],
                                },                         
                            ]

                });
            }
            jQuery(document).ready(function() {
                datatable_initialization();
            });
        </script>
        <script>
           jQuery(document).ready(function() {
              $('.privileges_table').dataTable({
                "bPaginate": false,
            });
           });
        </script>
        <!-- <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(true);
                App.init();
            });
        </script> -->
        <script>
           jQuery(document).ready(function() {
               App.init();
               // TableEditable.init();
           });
        </script>
        
       <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>