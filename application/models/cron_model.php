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

	// Plan expiry alert before 10 days
	public function plan_expiry_before_alert() {
        $aftertenday = date('Y-m-d', strtotime(' +10 day'));
        $get_where = '(os.organization_subscription_status=1 AND (DATE(os.org_sub_validity_end_date) = "'.$aftertenday.'" OR DATE(ur.validity_end_date) = "'.$aftertenday.'"))';
        $this->db->select('os.org_sub_validity_end_date,op.organization_id,op.organization_name,op.registrant_email_id,op.registrant_name,s.subscription_plan,ur.validity_end_date');
        $this->db->from('tr_organization_subscription os');
        $this->db->join('tr_organization_profile op','os.organization_id=op.organization_id','inner');
        $this->db->join('tr_subscription s','os.subscription_id=s.subscription_id','inner');
        $this->db->join('tr_organization_upgrade_or_renewal ur','os.organization_subscription_id=ur.organization_subscription_id and ur.is_renewal=1 and ur.status=1','left');
        $this->db->where($get_where);
        $data = $this->db->get()->result_array();
        return $data;
    }

    // Grace period expiry before 3 days
	public function grace_expiry_before_alert() {
        $aftertenday = date('Y-m-d', strtotime(' +3 day'));
        $get_where = '(os.organization_subscription_status=1 AND (DATE(os.grace_period_end_date) = "'.$aftertenday.'" OR DATE(ur.renewal_grace_period_end_date) = "'.$aftertenday.'"))';
        $this->db->select('os.grace_period_end_date,op.organization_id,op.organization_name,op.registrant_email_id,op.registrant_name,s.subscription_plan,ur.renewal_grace_period_end_date');
        $this->db->from('tr_organization_subscription os');
        $this->db->join('tr_organization_profile op','os.organization_id=op.organization_id','inner');
        $this->db->join('tr_subscription s','os.subscription_id=s.subscription_id','inner');
        $this->db->join('tr_organization_upgrade_or_renewal ur','os.organization_subscription_id=ur.organization_subscription_id and ur.is_renewal=1 and ur.status=1','left');
        $this->db->where($get_where);
        $data = $this->db->get()->result_array();
        return $data;
    }

    // Plan expiry - Update status
	public function plan_expiry_alert() {
       	$yesterday = date('Y-m-d', strtotime(' -1 day'));
        $get_where = '(os.organization_subscription_status=1 AND (DATE(os.org_sub_validity_end_date) = "'.$yesterday.'" OR DATE(ur.validity_end_date) = "'.$yesterday.'"))';
        $this->db->select('os.org_sub_validity_end_date,op.organization_id,op.organization_name,op.registrant_email_id,op.registrant_name,s.subscription_plan,ur.validity_end_date,os.organization_subscription_id as org_sub_id');
        $this->db->from('tr_organization_subscription os');
        $this->db->join('tr_organization_profile op','os.organization_id=op.organization_id','inner');
        $this->db->join('tr_subscription s','os.subscription_id=s.subscription_id','inner');
        $this->db->join('tr_organization_upgrade_or_renewal ur','os.organization_subscription_id=ur.organization_subscription_id and ur.is_renewal=1 and ur.status=1','left');
        $this->db->where($get_where);
        $data = $this->db->get()->result_array();
        $org_id_array = array_column($data, 'organization_id');
        $org_sub_id_array = array_column($data, 'org_sub_id');

        if(!empty($org_id_array)) {
        	// Organization subscription table
        	$this->db->where_in('organization_id',$org_id_array);
	        $set_data = array(
	                                'organization_post_vacancy_count'         => 0,
	                                'organization_vacancy_remaining_count'    => 0,
	                                'organization_post_ad_count'              => 0,
	                                'organization_ad_remaining_count'         => 0,
	                                'organization_email_count'                => 0,
	                                'organization_sms_count'                  => 0,
	                                'organization_resume_download_count'      => 0,
	                                'organization_email_remaining_count'      => 0,
	                                'organization_sms_remaining_count'        => 0,
	                                'is_email_validity'                       => 0,
	                                'is_sms_validity'                         => 0,
	                                'is_resume_validity'                      => 0,
	                                'organization_remaining_resume_download_count'  => 0,
	                                'organization_subscription_status'        => 0
	                            );
        	$this->db->set($set_data);
       		$this->db->update('tr_organization_subscription');

       		// Renewal table
       		$this->db->where_in('organization_subscription_id',$org_sub_id_array);
            $this->db->set('status', '0', FALSE);
            $this->db->update('tr_organization_upgrade_or_renewal');
        }
        return $data;
    }

    // Grace period expiry - Update status
	public function grace_expiry_alert() {
       	$yesterday = date('Y-m-d', strtotime(' -1 day'));
        $get_where = '(os.organization_subscription_status=1 AND (DATE(os.grace_period_end_date) = "'.$yesterday.'" OR DATE(ur.renewal_grace_period_end_date) = "'.$yesterday.'"))';
        $this->db->select('os.grace_period_end_date,op.organization_id,op.organization_name,op.registrant_email_id,op.registrant_name,s.subscription_plan,ur.renewal_grace_period_end_date,os.organization_subscription_id as org_sub_id');
        $this->db->from('tr_organization_subscription os');
        $this->db->join('tr_organization_profile op','os.organization_id=op.organization_id','inner');
        $this->db->join('tr_subscription s','os.subscription_id=s.subscription_id','inner');
        $this->db->join('tr_organization_upgrade_or_renewal ur','os.organization_subscription_id=ur.organization_subscription_id and ur.is_renewal=1 and ur.status=1','left');
        $this->db->where($get_where);
        $data = $this->db->get()->result_array();
        $org_id_array = array_column($data, 'organization_id');
        $org_sub_id_array = array_column($data, 'org_sub_id');

        if(!empty($org_id_array)) {
        	// Organization subscription table
        	$this->db->where_in('organization_id',$org_id_array);
	        $set_data = array(
	                                'organization_post_vacancy_count'         => 0,
	                                'organization_vacancy_remaining_count'    => 0,
	                                'organization_post_ad_count'              => 0,
	                                'organization_ad_remaining_count'         => 0,
	                                'organization_email_count'                => 0,
	                                'organization_sms_count'                  => 0,
	                                'organization_resume_download_count'      => 0,
	                                'organization_email_remaining_count'      => 0,
	                                'organization_sms_remaining_count'        => 0,
	                                'is_email_validity'                       => 0,
	                                'is_sms_validity'                         => 0,
	                                'is_resume_validity'                      => 0,
	                                'organization_remaining_resume_download_count'  => 0,
	                                'organization_subscription_status'        => 0
	                            );
        	$this->db->set($set_data);
       		$this->db->update('tr_organization_subscription');

       		// Renewal table
       		$this->db->where_in('organization_subscription_id',$org_sub_id_array);
            $this->db->set('status', '0', FALSE);
            $this->db->update('tr_organization_upgrade_or_renewal');
        }
        return $data;
    }






} // End

/*   Cron_model.php */