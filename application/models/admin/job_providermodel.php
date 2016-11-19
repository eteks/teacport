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

  // Job provider profile
  public function get_provider_vacancy() {
    $this->db->select('*');
    $this->db->from('tr_organization_vacancies ov');
    $this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
    $this->db->join('tr_educational_qualification eq','ov.vacancies_qualification_id=eq.educational_qualification_id','inner');
    $this->db->join('tr_class_level cl','ov.vacancies_class_level_id=cl.class_level_id','inner');
    $this->db->join('tr_university_board ub','ov.vacancies_university_board_id=ub.education_board_id','inner');
    $this->db->join('tr_subject s','ov.vacancies_subject_id=s.subject_id','inner');
    $provider_vacancy = $this->db->get()->result_array();
    return $provider_vacancy;
  }

  // Job provider profile - ajax
  public function get_full_provider_vacancy($value) {
    $provider_vacancy_query = $this->db->query("SELECT * FROM tr_educational_qualification AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.vacancies_qualification_id, ',', n.n ) , ',', -1 ) value FROM tr_organization_vacancies t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.vacancies_qualification_id ) - LENGTH( REPLACE( t.vacancies_qualification_id, ',', ''))) ) AS a ON a.value = c.educational_qualification_id INNER JOIN tr_organization_profile AS op ON a.vacancies_organization_id=op.organization_id INNER JOIN tr_class_level AS cl ON a.vacancies_class_level_id=cl.class_level_id INNER JOIN tr_university_board AS ub ON a.vacancies_university_board_id=ub.education_board_id INNER JOIN tr_subject AS s ON a.vacancies_subject_id=s.subject_id WHERE a.vacancies_id=1");
    $provider_vacancy = $provider_vacancy_query->result_array();  
    return $provider_vacancy;
  }




  
}

/* End of file Job_Providermodel.php */
/* Location: ./application/controllers/Job_Providermodel.php */