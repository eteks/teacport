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
	public function get_all_district()
	{
		$district = array();
		$alldistrict = $this->db->get_where('tr_district',array('district_status' => '1'))->result_array();
		return $alldistrict;
	}
		
	public function subject_by_institution($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_subject');
		$where = "(subject_institution_id like '%".$ins_id."%' AND subject_status='1')";
		$this->db->where($where);
		$subjectdata = $this->db->get();
		return $subjectdata->result_array(); 
	}
	public function qualification_by_institution($ins_id,$course_type = 'ug')
	{
		$this->db->select('*');    
		$this->db->from('tr_educational_qualification');
		$where = "(educational_qualifcation_inst_type_id = '".$ins_id."' AND educational_qualification_course_type = '".$course_type."' AND educational_qualification_status='1')";
		$this->db->where($where);
		$educationdata = $this->db->get();
		return $educationdata->result_array(); 
	}
	public function classlevel_by_institution($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_class_level');
		$where = "(class_level_inst_type_id = '".$ins_id."'  AND class_level_status='1')";
		$this->db->where($where);
		$classlevel = $this->db->get();
		return $classlevel->result_array(); 
	}
	public function medium_of_instruction()
	{
		$this->db->select('*');    
		$this->db->from('tr_languages');
		$where = "(is_medium_of_instruction = '1'  AND language_status='1')";
		$this->db->where($where);
		$moi = $this->db->get();
		return $moi->result_array(); 
	}
	public function applicable_posting($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_applicable_posting');
		$where = "(posting_institution_id like '%".$ins_id."%' AND posting_status='1')";
		$this->db->where($where);
		$posting = $this->db->get();
		return $posting->result_array(); 
	}
	public function mother_tongue()
	{
		$this->db->select('*');    
		$this->db->from('tr_languages');
		$where = "(is_mother_tangue = '1'  AND language_status='1')";
		$this->db->where($where);
		$mt = $this->db->get();
		return $mt->result_array(); 
	}
	public function subjects($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_subject');
		$where = "(subject_institution_id like '%".$ins_id."%'  AND subject_status='1')";
		$this->db->where($where);
		$subject = $this->db->get();
		return $subject->result_array(); 
	}
	public function qualification($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_educational_qualification');
		$where = "(educational_qualifcation_inst_type_id like '%".$ins_id."%'  AND educational_qualification_status='1')";
		$this->db->where($where);
		$qualification = $this->db->get();
		return $qualification->result_array(); 
	}
	public function subcription_plan()
	{
		$this->db->select('*');    
		$this->db->from('tr_subscription');
		$qualification = $this->db->get();
		return $qualification->result_array(); 
	}

	// Get vacancy details
	public function get_vacancy_details()
	{
		$value = $this->db->get_where('tr_organization_vacancies',array('vacancies_status' => '1'))->result_array();
		return $value;
	}

	// Get salary details
	public function get_salary_details()
	{
		$value = $this->db->get_where('tr_expect_salary',array('expect_salary_status' => '1'))->result_array();
		return $value;
	}

	// Get department details
	public function get_department_details()
	{
		$value = $this->db->get_where('tr_departments',array('departments_status' => '1'))->result_array();
		return $value;
	}

	// Get university board details
	public function get_board_details()
	{
		$value = $this->db->get_where('tr_university_board',array('university_board_status' => '1'))->result_array();
		return $value;
	}

	// Get extra curricular details
	public function get_extra_curricular_details()
	{
		$value = $this->db->get_where('tr_extra_curricular',array('extra_curricular_status' => '1'))->result_array();
		return $value;
	}

	
	


} // End