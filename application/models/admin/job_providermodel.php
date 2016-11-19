<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Providermodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  // Job provider profile
  public function get_provider_profile() {
    $this->db->select('*');
    $this->db->from('tr_organization_profile op');
    $this->db->join('tr_subscription s','op.subcription_id=s.subscription_id','inner');
    $provider_profile = $this->db->get()->result_array();
    return $provider_profile;
  }

  // Job provider profile - ajax
  public function get_full_provider_profile($value) {
    $provider_profile_where = '(op.organization_id="'.$value.'")';
    $this->db->select('*');
    $this->db->from('tr_organization_profile op');
    $this->db->join('tr_subscription s','op.subcription_id=s.subscription_id','inner');
    $this->db->join('tr_institution_type it','op.organization_institution_type_id=it.institution_type_id','inner');
    $this->db->join('tr_district d','op.organization_district_id=d.district_id','inner');
    $provider_profile = $this->db->where($provider_profile_where)->get()->row_array();
    return $provider_profile;
  }
  
}

/* End of file Job_Providermodel.php */
/* Location: ./application/controllers/Job_Providermodel.php */