	<!-- BEGIN FOOTER -->
        <div id="footer">
            2013 &copy; Admin Lab Dashboard.
            <div class="span pull-right">
                <span class="go-top"><i class="icon-arrow-up"></i></span>
            </div>
        </div>
        <!-- CSRF TOKEN -->
        
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

        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/flot/jquery.flot.crosshair.js"></script>

        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.peity.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/uniform/jquery.uniform.min.js"></script>
       <!--  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/data-tables/DT_bootstrap.js"></script> -->
        
        <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
        <script>
           jQuery(document).ready(function() {
              $('.admin_table').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });
           });
        </script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(true);
                App.init();
            });
        </script>
        <script>
            var admin_baseurl = "<?php echo base_url(); ?>admin/";
        </script>    
        <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>