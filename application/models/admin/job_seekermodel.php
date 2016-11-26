<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Seekermodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  // Seeker profile
  public function get_seeker_profile($status) {
  	$model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $profile_update_data = array( 
                              'organization_name' => $this->input->post('organization_name'),
                              'organization_logo' => $this->input->post('organization_logo'),
                              'organization_status' => $this->input->post('organization_status'),
                              'registrant_designation' => $this->input->post('registrant_designation'),
                              'registrant_date_of_birth' => $this->input->post('registrant_dob'),
                              'registrant_email_id' => $this->input->post('registrant_email'),
                              'registrant_mobile_no' => $this->input->post('registrant_mobile'),
                              'registrant_name' => $this->input->post('registrant_name'),
                              'organization_district_id' => $this->input->post('organization_district'),
                              'organization_address_3' => $this->input->post('org_addr_3'),
                              'organization_address_2' => $this->input->post('org_addr_2'),
                              'organization_address_1' => $this->input->post('org_addr_1'),
                              'organization_institution_type_id' => $this->input->post('institution_type')
                            );
      $profile_update_where = '( organization_id="'.$this->input->post('rid').'")'; 
      $this->db->set($profile_update_data); 
      $this->db->where($profile_update_where);
      $this->db->update("tr_organization_profile", $profile_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;   
    }

    // Delete data
    else if($status =='delete') {
      $profile_delete_where = '(organization_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_organization_profile", $profile_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_candidate_profile cp');
    $this->db->join('tr_district d','cp.candidate_live_district_id=d.district_id','left');
    $model_data['seeker_profile'] = $this->db->get()->result_array();
    return $model_data;
  }


}
/* End of file Job_Seekermodel.php */
/* Location: ./application/controllers/Job_Seekermodel.php */