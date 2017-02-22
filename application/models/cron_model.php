<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends CI_Model {

	// Related vacancy post by applicable posting
	public function cron_related_jobs() {
		$data = array();
		$prev_date = date('Y-m-d', strtotime(' -10 day'));  
		$where = '(op.organization_status=1 AND ov.vacancies_status=1 AND candidate_status=1 AND DATE(vacancies_created_date) >= "'.$prev_date.'")';
		$this->db->select('op.organization_id,op.organization_name,op.organization_status,ov.vacancies_id,ov.vacancies_start_salary,ov.vacancies_end_salary,ov.vacancies_job_title,ov.vacancies_applicable_posting_id,ov.vacancy_type,ov.vacancies_status,ov.vacancies_created_date,cpre.candidate_profile_id,cpre.candidate_posting_applied_for,cp.candidate_id,cp.candidate_name,cp.candidate_email,cp.candidate_status');
		$this->db->from('tr_organization_profile op');
		$this->db->join('tr_organization_vacancies ov','op.organization_id=ov.vacancies_organization_id','inner');
		$this->db->join('tr_candidate_preferance cpre','FIND_IN_SET(ov.vacancies_applicable_posting_id , cpre.candidate_posting_applied_for)','inner');
		$this->db->join('tr_candidate_profile cp','cpre.candidate_profile_id=cp.candidate_id','inner');
		$this->db->where($where);
		$this->db->group_by(array('ov.vacancies_id','cp.candidate_id'));
		$this->db->order_by('ov.vacancies_id','desc');
		$data = $this->db->get()->result_array();
		return $data;
	}

















} // End

/*   Cron_model.php */