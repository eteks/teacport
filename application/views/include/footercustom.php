<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
			
<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";

  var csrf_token_value = "<?php echo $this->security->get_csrf_hash(); ?>";
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