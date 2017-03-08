<?php if(! defined('BASEPATH')) exit("No direct script access allowed");

class Dynamic_settings extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->config->load('custom_variables');
	}

	public function global_variables() {
		$data['sms_credentials'] = $this->db->get_where('tr_settings_sms_gateway')->row_array();
		$this->config->set_item('sms_gateway',$data['sms_credentials']);
	}
}

$a = new Dynamic_settings();
$a->global_variables();