<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_Model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }


public function insert_payment_gateway($data)
	{	
		// Query to insert data in database
		 $this->db->select('*');
	    $this->db->from('tr_settings_payment_gateway',$data);
	    if ($this->db->count_all_results() == 0) {
	      $query = $this->db->insert('tr_settings_payment_gateway', $data);//insert data
	    } else {
	      $query = $this->db->update('tr_settings_payment_gateway', $data);//update with the condition where data exist
	    }
	}
public function insert_sms_gateway($data)
	{	
		$this->db->select('*');
	    $this->db->from('tr_settings_sms_gateway',$data);
	    if ($this->db->count_all_results() == 0) {
	      $query = $this->db->insert('tr_settings_sms_gateway', $data);//insert data
	    } else {
	      $query = $this->db->update('tr_settings_sms_gateway', $data);//update with the condition where data exist
	    }
	}
public function insert_configuration_option($data)
	{	
		$this->db->select('*');
	    $this->db->from('tr_settings_site_configuration',$data);
	    if ($this->db->count_all_results() == 0) {
	      $query = $this->db->insert('tr_settings_site_configuration', $data);//insert data
	    } else {
	      $query = $this->db->update('tr_settings_site_configuration', $data);//update with the condition where data  exist
	    }
	}
public function insert_template_logo($data)
	{	
		$this->db->select('*');
	    $this->db->from('tr_settings_template',$data);
	    if ($this->db->count_all_results() == 0) {
	      $query = $this->db->insert('tr_settings_template', $data);//insert data
	    } else {
	      $query = $this->db->update('tr_settings_template', $data);//update with the condition where data exist
	    }
	}




}