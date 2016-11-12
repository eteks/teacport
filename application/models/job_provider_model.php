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
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}
	
	
}