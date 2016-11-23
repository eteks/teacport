<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_provider_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	public function create_job_provider($data)
	{
		/*query for check wheather data exist or not */
		$checkquery = $this->db->get_where('tr_organization_profile', array(
            'registrant_email_id' => $data['registrant_email_id'],
        ));
		$count = $checkquery->num_rows();
		/*check wheather data exist or not */
		if ($count === 0) {
			/* data not exist and insert to database and return verification message */
            $this->db->insert('tr_organization_profile', $data);
			return 'inserted';
        }
		else{
			/* data exist and return verification message */
			return 'exists';
		}
	}
	public function check_valid_provider_login($data){
		/*query for check wheather data exist or not */
		$where = "(registrant_email_id='".$data['registrant_login_data']."' AND registrant_password='".$data['registrant_password']."' AND organization_status='1' OR registrant_mobile_no='".$data['registrant_login_data']."' AND registrant_password='".$data['registrant_password']."' AND organization_status='1')";
		$existuser = $this->db->get_where('tr_organization_profile',$where);
		$count = $existuser->num_rows();
		if ($count === 1) {
            $user_data = $existuser->row_array();
			$user_details['pro_email'] = $user_data['registrant_email_id'];
			$user_details['pro_userid'] = $user_data['organization_id'];
			$user_details['pro_mobile'] = $user_data['registrant_mobile_no'];
			$user_details['user_type'] = 'provider';
			$user_details['valid_status'] = 'valid';
			$user_detalls['login_type'] = 'teacherrecruit';
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}

	public function social_authendication_registration($data)
	{
		/*query for check wheather data exist or not */
		$checkquery = $this->db->get_where('tr_organization_profile', array(
            'registrant_email_id' => $data['registrant_email_id'],
        ));
		$count = $checkquery->num_rows();
		/*check wheather data exist or not */
		if ($count === 0) {
			/* data not exist and insert to database and return verification message */
            $this->db->insert('tr_organization_profile', $data);
			return 'inserted';
        }
		else{
			/* data exist and return verification message */
			return 'exists';
		}
	}

	public function social_valid_provider_login($data)
	{
		$where = "(registrant_email_id='".$data['registrant_email_id']."' AND organization_status='1')";
		$existuser = $this->db->get_where('tr_organization_profile',$where);
		$count = $existuser->num_rows();
		if ($count === 1) {
            $user_data = $existuser->row_array();
			$user_details['pro_email'] = $user_data['registrant_email_id'];
			$user_details['pro_userid'] = $user_data['organization_id'];
			$user_details['user_type'] = 'provider';
			$user_details['valid_status'] = 'valid';
			$user_detalls['login_type'] = $user_data['registrant_register_type'];
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}
	public function check_has_initial_data($data)
	{
		$where = "((((registrant_password IS NULL OR registrant_password = '') AND registrant_email_id='".$data."') OR ((registrant_mobile_no IS NULL OR registrant_mobile_no ='')  AND registrant_email_id='".$data."') AND organization_status='1' ))";
		$validuser = $this->db->get_where('tr_organization_profile',$where);
		$counts = $validuser->num_rows();
		if ($counts === 1) {
			return 'has_no_data';
		}
		else{
			return 'has_data';
		}	
		
	}
	public function get_org_data_by_id($id)
	{
		$where = "(organization_id='".$id."' AND organization_status='1')";
		$existuser = $this->db->get_where('tr_organization_profile',$where);
		$user_data = $existuser->row_array();
		return $user_data; 
	} 
	public function get_org_data_by_mail($email)
	{
		$where = "(registrant_email_id='".$email."' AND organization_status='1')";
		$existuser = $this->db->get_where('tr_organization_profile',$where);
		$user_data = $existuser->row_array();
		return $user_data; 
	} 
	public function edit_profile_completeness($id)
	{
		$where = "(organization_id='".$id."' AND ((organization_logo IS NULL OR organization_logo ='') OR (organization_address_1 IS NULL OR organization_address_1 ='') OR (organization_address_2 IS NULL OR organization_address_2 ='') OR (organization_address_3 IS NULL OR organization_address_3 ='') OR (organization_district_id IS NULL OR organization_district_id ='') OR (organization_district_id IS NULL OR organization_district_id ='') OR (registrant_name IS NULL OR registrant_name ='') OR (registrant_designation IS NULL OR registrant_designation ='') OR (registrant_date_of_birth IS NULL OR registrant_date_of_birth ='')) AND organization_status='1')";
		$check_completeness = $this->db->get_where('tr_organization_profile',$where);
		
	}
	 public function job_provider_update_profile($id,$profile)
	 {
	 	$this->db->where('organization_id', $id);
		$this->db->update('tr_organization_profile', $profile);
		return 'updated';
	 }
	
}