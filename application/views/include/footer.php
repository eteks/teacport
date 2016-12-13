<!--footer-->
			
			<!--End of Footer-->

			<a href="index.html#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

			<!-- JAVASCRIPT JS  -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>

			<!-- BOOTSTRAP CORE JS -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
			
			<!-- JQUERY SELECT -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

			<!-- MEGA MENU -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mega_menu.min.js"></script>

			<!-- JQUERY EASING -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
			
			<!--datepicker-->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/zebra_datepicker.js"></script>
			
			<!--Experience Range-->
			<script src="<?php echo base_url(); ?>assets/js/range/res/Obj.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/range/res/addSlider.js"></script>
			
			<!--Multipleselect-->
			<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.multiselect.js"></script> -->

			<!-- JQUERY COUNTERUP -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/counterup.js"></script>

			<!-- JQUERY WAYPOINT -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script>

			<!-- JQUERY REVEAL -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/footer-reveal.min.js"></script>
			
			<!-- Owl Carousel -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
			
			<!-- TOASTER JS -->
        	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
        	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution/js/jquery.themepunch.tools.min.js"></script>
        	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution/js/jquery.themepunch.revolution.min.js"></script>
			<!-- CORE JS -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
			<script type="text/javascript">
			  var baseurl = "<?php echo base_url(); ?>";
			</script>			
			<script src="<?php echo base_url(); ?>assets/js/ajax-call.js"></script>
			<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.fine-uploader.min.js"></script>		 -->
			
			<?php 
				$user_type = $this->session->userdata("login_session"); 
				if($this->session->userdata('login_status') === TRUE && $user_type['user_type'] === 'provider'){
				
			?>
			
			<script type="text/javascript">
	 			provider_inbox_ajax_message_count('<?php echo base_url(); ?>','<?php echo $user_type['pro_userid'] ?>','<?php echo $this->security->get_csrf_hash(); ?>');
			</script>
			<?php }
			else if ($this->session->userdata('login_status') === TRUE && $user_type['user_type'] === 'seeker') {
			?>
			<script type="text/javascript">
	 			seeker_inbox_ajax_message_count('<?php echo base_url(); ?>','<?php echo $user_type['candidate_id'] ?>','<?php echo $this->security->get_csrf_hash(); ?>');
			</script>
			<?php
			}
			?>
		</div>
	</body>
</html>