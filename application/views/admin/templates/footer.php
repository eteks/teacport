	<!-- BEGIN FOOTER -->
        <div id="footer">
            <span><?php echo date("Y"); ?> &copy; Teacher Recruit.</span>
            <div class="span pull-right">
                <!-- <span class="go-top"><i class="icon-arrow-up"></i></span> -->
            </div>
        </div>
        <!-- CSRF TOKEN -->
        <script>
            var csfrData = {};
            csfrData['<?php echo $this->security->get_csrf_token_name(); ?>']
                       = '<?php echo $this->security->get_csrf_hash(); ?>';
            var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";     
            var admin_baseurl = "<?php echo base_url(); ?>main/"; // Route path
        </script>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-multiselect/bootstrap-multiselect.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.blockui.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.cookie.js"></script>
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
        <!-- <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.resize.js"></script>

        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.crosshair.js"></script> -->

        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.peity.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/data-tables/DT_bootstrap.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/admin/js/action.js"></script> -->

        <!-- JS import link for charts -->
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/charts/d3.v2.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/charts/sugar.min.js'></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/ajax_call.js"></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/charts/xcharts.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/charts/script.js'></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/daterangepicker.js'></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/ajax_call.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/timezones.full.min.js" type="text/javascript"></script>

        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(true);
                App.init();
            });
        </script>
        <script>
         

            var datatable = "";

            function datatable_initialization(id) {
                // alert(id);
                $(id).dataTable({
                    "order": [],
                    // Length of row in grid - row length
                    "lengthMenu" : [
                                    [5, 25, 50, -1], 
                                    [5, 25, 50, "All"]
                                  ],
                    // Page length
                    "pageLength" : 15,       
                    // set the initial value
                    "iDisplayLength": 5,
                    "sDom": "<'row-fluid'<''l><''f>r>t<'row-fluid'<''i><''p>>",
                    "sPaginationType": "bootstrap",
                    "bFilter" : false,
                    "aLengthMenu": false,
                    "bLengthChange": false,                 
                    "searching": false,
                    'bSortable': false,    

                });

                // Wrap datatable
                $(id).wrap("<div id='table_wrapper_Datatable' style='\n\
                                        overflow: auto;\n\
                                        overflow-y: hidden;\n\
                                        -ms-overflow-y: hidden\n\
                                        position:relative;\n\
                                        margin-right:5px;\n\
                                        padding-bottom: 15px;\n\
                                        display:block;\n\
                                   '>/");
            }
            jQuery(document).ready(function() {
                 datatable_initialization(id="#filter_vacancy_table");
                 datatable_initialization(id="#filter_provider_table");
            });
            $(".message_res").text(function(index, currentText) {
                if (currentText.length>60) {
                    return currentText.substr(0, 60)+'.....';
                }
            });
        </script>
        <!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
