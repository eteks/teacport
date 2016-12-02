<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	public function get_institution_type()
	{
		$institution_type = array();
		$allinstitutions = $this->db->get_where('tr_institution_type', array('institution_type_status' => '1'))->result_array();
		return $allinstitutions;
	}
    public function get_search_list()
    {
        if ($this->input->post('search_keyword')) {
        	$null_search = $this->input->post('search_keyword');
        	$search_product=$this->db->select('*');
            $search_product=$this->db->from('tr_organization_vacancies cp');
            $search_product = $this->db->join('tr_organization_profile op', 'cp.vacancies_organization_id = op.organization_id','inner');
            $where1 = '(cp.vacancies_status=1)';
            $search_product=$this->db->like('cp.vacancies_job_title',$this->input->post('search_keyword'));
            $search_product=$this->db->where($where1);
            $search_product=$this->db->group_by('cp.vacancies_id');
            $query = $this->db->get()->result_array();
        }
        if (empty($null_search)){
			$search_product=$this->db->select('*');
			$search_product=$this->db->from('tr_organization_vacancies cp');
            $search_product = $this->db->join('tr_organization_profile op', 'cp.vacancies_organization_id = op.organization_id','inner');
			$query = $this->db->get()->result_array();
			};
        return $query;
    }
}