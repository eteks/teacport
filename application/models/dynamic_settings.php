<?php if(! defined('BASEPATH')) exit("No direct script access allowed");

class Dynamic_settings extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->config->load('custom_variables');
	  	$this->load->library(array('captcha')); 
	}

	public function global_variables() {
		$data['sms_credentials'] = $this->db->get('tr_settings_sms_gateway')->row_array();
		$this->config->set_item('sms_gateway',$data['sms_credentials']);
	}

	public function popup_signup_form() {
		$data['institution_types'] = $this->db->get_where('tr_institution_type',array('institution_type_status' => 1))->result_array();
		$this->config->set_item('institution_types',$data['institution_types']);
		$data['captcha'] = $this->captcha->main();
		$this->session->set_userdata('captcha_info', $data['captcha']);
		$this->config->set_item('captcha_value',$data['captcha']);

		// Set Logo as dynamic
		$data['logo'] = $this->db->get('tr_settings_template')->row_array();
		$this->config->set_item('logo',$data['logo']);
	}
}

$a = new Dynamic_settings();
// $a->global_variables();
$a->popup_signup_form();