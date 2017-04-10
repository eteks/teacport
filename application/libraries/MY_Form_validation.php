<?php

class MY_Form_validation extends CI_Form_validation {

	//----------------------------------------------------------------------------------
	// Start Admin Panel Custom Form Validation functions which is called in both views
	//----------------------------------------------------------------------------------

    // Edit unique function - To check the field is already exists or not
    // This is our custom function to add in form validation library
	function edit_unique($value, $params) 
	{		
		//get main CodeIgniter object
	    $CI =& get_instance();
	    $CI->form_validation->set_message('edit_unique', "Sorry, that %s is already being used.");
	    list($table, $id, $field, $current_id) = explode(".", $params);    
	    $query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();    
	    if ($query->row() && $query->row()->$id != $current_id)
	    {
	        return FALSE;
	    }
	}

	//To check the new password with old one
	public function oldpassword_check($value,$params){
		//get main CodeIgniter object
	    $CI =& get_instance();   
	    $CI->form_validation->set_message('oldpassword_check', "Sorry, that %s is not match.");
	    list($table, $id, $field, $current_id) = explode(".", $params);    
	    $query = $CI->db->select()->from($table)->where($id, $current_id)->limit(1)->get();    
	    if ($query->row() && $query->row()->$field != $value)
	    {
	        return FALSE;
	    }
	}

	// Alpha with white space
 	public function alpha_dash_space($provider_job_title){
		if (! preg_match('/^[a-zA-Z\s]+$/', $provider_job_title)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//----------------------------------------------------------------------------------
	// End Admin Panel Custom Form Validation functions which is called in both views
	//----------------------------------------------------------------------------------
}

