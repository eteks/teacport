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
		$moi = $this->db->get();
		return $moi->result_array(); 
	}
}