<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Providermodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  /* ===================          Job Provider Profile Model Start     ====================== */

  // Job provider profile - Add Edit Delete View
  public function get_provider_profile($status) {

    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {

      // Check Mobile Number or Email already exists or not
      $mobile_exists_where = "registrant_mobile_no =" . "'" . $this->input->post('registrant_mobile') . "' AND organization_id NOT IN (". $this->input->post('rid').")";
      $mobile_exists = $this->db->get_where('tr_organization_profile',$mobile_exists_where);
      if($mobile_exists->num_rows() > 0 && $this->input->post('registrant_mobile')) {
        $model_data['status'] = "Mobile Number Already exists";
        $model_data['error'] = 1; 
      }
      else {
        $email_exists_where = "registrant_email_id =" . "'" . $this->input->post('registrant_email') . "' AND organization_id NOT IN (". $this->input->post('rid').")";
        $email_exists = $this->db->get_where('tr_organization_profile',$email_exists_where);
        if($email_exists->num_rows() > 0) {
          $model_data['status'] = "Email Already exists";
          $model_data['error'] = 1;
        }
        else {
          $registrant_dob = explode('/', $this->input->post('registrant_dob'));
          if($this->input->post('registrant_dob')) {
            $registrant_dob_date = $registrant_dob[2]."-".$registrant_dob[1]."-".$registrant_dob[0];
          }
          else {
            $registrant_dob_date = NULL;
          }
      
          $profile_update_org_data = array( 
                              'organization_name' => ($this->input->post('organization_name')) ? $this->input->post('organization_name') : NULL,
                              'organization_logo' => ($this->input->post('organization_logo')) ? $this->input->post('organization_logo') : NULL,
                              'organization_status' => $this->input->post('organization_status'),
                              'registrant_designation' => ($this->input->post('registrant_designation')) ? $this->input->post('registrant_designation') : NULL,
                              'registrant_date_of_birth' => $registrant_dob_date,
                              'registrant_email_id' => $this->input->post('registrant_email'),
                              'registrant_mobile_no' => ($this->input->post('registrant_mobile')) ? $this->input->post('registrant_mobile') : NULL,
                              'registrant_name' => $this->input->post('registrant_name'),
                              'organization_state_id' => ($this->input->post('organization_state')) ? $this->input->post('organization_state') : NULL,
                              'organization_district_id' => ($this->input->post('organization_district')) ? $this->input->post('organization_district') : NULL,
                              'organization_address_3' => ($this->input->post('org_addr_3')) ? $this->input->post('org_addr_3') : NULL,
                              'organization_address_2' => ($this->input->post('org_addr_2')) ? $this->input->post('org_addr_2') : NULL,
                              'organization_address_1' => ($this->input->post('org_addr_1')) ? $this->input->post('org_addr_1') : NULL,
                              // 'is_sms_verified' => $this->input->post('sms_verify'),
                              'organization_institution_type_id' => $this->input->post('institution_type')
                            );
          // $profile_update_org_sub_data = array( 
          //                         'is_email_validity' => $this->input->post('email_valid'), 
          //                         'is_sms_validity' => $this->input->post('sms_valid'),
          //                         'is_resume_validity' => $this->input->post('resume_valid'),
          //                         'subscription_status' => $this->input->post('subscription_status'),
          //                       );
          $profile_update_org_where = '( organization_id="'.$this->input->post('rid').'")'; 
          $this->db->set($profile_update_org_data);                         
          $this->db->where($profile_update_org_where);
          $this->db->update("tr_organization_profile", $profile_update_org_data); 
          $model_data['status'] = "Updated Successfully";
          $model_data['error'] = 2;   
          // $profile_update_org_sub_where = '( organization_id="'.$this->input->post('rid').'" and organization_subscription_status=1)'; 
          // $this->db->set($profile_update_org_sub_data);                         
          // $this->db->where($profile_update_org_sub_where);
          // $this->db->update("tr_organization_subscription", $profile_update_org_sub_data);
        }
      }
    }

    // Delete data
    else if($status =='delete') {
      $profile_delete_org_where = '(organization_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_organization_profile", $profile_delete_org_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*,(select count(vcv.organiztion_id) from tr_organization_candidate_visitor_count vcv where vcv.organiztion_id = tr_organization_profile.organization_id and (vcv.user_type=2 OR vcv.user_type=0)) as count');
    $this->db->from('tr_organization_profile');
    $this->db->order_by('organization_id','desc');
    // $this->db->join('tr_organization_subscription os','op.organization_id=os.organization_id','left');
    // $this->db->join('tr_subscription s','os.subscription_id=s.subscription_id','left');
    // $this->db->group_by('org_id');
    // $this->db->where('os.organization_subscription_status','1');
    // $this->db->or_where('os.organization_subscription_status',NULL);
    $model_data['provider_profile'] = $this->db->get()->result_array();
    return $model_data;
  }

  // Job provider profile - Edit and Fullview Popup - ajax
  public function get_full_provider_profile($value) {
    $provider_profile_where = '(op.organization_id="'.$value.'" )';
    $this->db->select('op.organization_id as org_id,op.*,os.*,it.*,os.*,d.*,st.*');
    $this->db->from('tr_organization_profile op');
    $this->db->join('tr_organization_subscription os','op.organization_id=os.organization_id','left');
    $this->db->join('tr_subscription s','os.subscription_id=s.subscription_id','left');
    $this->db->join('tr_institution_type it','op.organization_institution_type_id=it.institution_type_id','left');
    $this->db->join('tr_state st','op.organization_state_id=st.state_id','left');
    $this->db->join('tr_district d','op.organization_district_id=d.district_id','left');
    $this->db->order_by('os.organization_subscription_status','desc');
    $this->db->group_by('org_id');
    $model_data['provider_full_profile'] = $this->db->where($provider_profile_where)->get()->row_array();
    $model_data['payment_details'] =  array();

    // Payment Details
    $subscription_where = '(tos.organization_id="'.$value.'")';
    $this->db->select('tos.*,tos.organization_subscription_id as org_subscription_id,ts.subscription_plan,our.*,subt.amount as org_sub_amount,urt.amount as upg_ren_amount');
    $this->db->from('tr_organization_subscription tos');
    $this->db->join('tr_subscription ts','tos.subscription_id=ts.subscription_id','inner');
    $this->db->join('tr_organization_upgrade_or_renewal our','tos.organization_subscription_id=our.organization_subscription_id','left');
    $this->db->join('tr_payumoney_transaction subt','tos.organization_transcation_id=subt.transaction_id','left');
    $this->db->join('tr_payumoney_transaction urt','our.transaction_id=urt.transaction_id','left');
    $model_data['payment_details'] = $this->db->where($subscription_where)->order_by('tos.organizaion_sub_updated_date desc,our.validity_end_date desc')->get()->result_array();
    // echo "<pre>";
    // print_r($model_data['payment_details']);
    // echo "</pre>";
    return $model_data;
  }

  /* ===================          Job Provider Profile Model End     ====================== */

  /* ===================          Job Provider Vacancy Model Start    ====================== */

  // Job provider vacancy - Add Edit Delete View
  public function get_provider_vacancy($status) {

    $model_data['status'] = 0;
    $model_data['error'] = 0;
    // Update data
    if($status=='update') {
      $vacancy_get_where   = "vacancies_organization_id =" . "'" . $this->input->post('org_name') . "' AND vacancies_job_title =" . "'" . $this->input->post('job_title') . "' AND vacancies_id NOT IN (". $this->input->post('rid').")";
      $vacancy_get = $this->db->get_where('tr_organization_vacancies',$vacancy_get_where);
      if($vacancy_get -> num_rows() > 0 ) {
        $model_data['status'] = "Job Vacancy Title Already exists";
        $model_data['error'] = 1;
      }
      else {
        $vacancy_open = explode('/', $this->input->post('vac_open_date'));
        $vacancy_open_date = $vacancy_open[2]."-".$vacancy_open[1]."-".$vacancy_open[0];
        $vacancy_end = explode('/', $this->input->post('vac_end_date'));
        $vacancy_end_date = $vacancy_end[2]."-".$vacancy_end[1]."-".$vacancy_end[0];
        $interview_start = explode('/', $this->input->post('vac_inter_sdate'));
        $interview_start_date = $interview_start[2]."-".$interview_start[1]."-".$interview_start[0];
        $interview_end = explode('/', $this->input->post('vac_inter_edate'));
        $interview_end_date = $interview_end[2]."-".$interview_end[1]."-".$interview_end[0];
        $vacancy_update_data = array( 
                                'vacancies_job_title' => $this->input->post('job_title'),
                                'vacancies_available' => $this->input->post('vac_available'),
                                'vacancies_open_date' => $vacancy_open_date,
                                'vacancies_close_date' => $vacancy_end_date,
                                'vacancies_start_salary' => $this->input->post('job_min_salary'),
                                'vacancies_end_salary' => $this->input->post('job_max_salary'),
                                'vacancies_status' => $this->input->post('vac_status'),
                                'vacancies_qualification_id' => $this->input->post('qualification_name'),
                                'vacancies_experience' => $this->input->post('vac_experience'),
                                'vacancies_class_level_id' => $this->input->post('vac_class'),
                                'vacancies_university_board_id' => $this->input->post('vac_univ_name'),
                                'vacancies_subject_id' => $this->input->post('vac_sub_name'),
                                'vacancies_department_id' => ($this->input->post('vac_dept_name')) ? $this->input->post('vac_dept_name') : NULL,
                                'vacancies_applicable_posting_id' => ($this->input->post('vac_pos_name')) ? $this->input->post('vac_pos_name') : NULL,
                                'vacancies_medium' => $this->input->post('vac_medium'),
                                'vacancies_accommodation_info' => $this->input->post('vac_accom'),
                                'vacancies_instruction' => $this->input->post('vac_instruction'),
                                'vacancies_interview_start_date' => $interview_start_date,
                                'vacancies_end_date' => $interview_end_date,
                                'vacancy_type' => $this->input->post('vac_type')
                              );
        $vacancy_update_where = '( vacancies_id="'.$this->input->post('rid').'")'; 
        $this->db->set($vacancy_update_data); 
        $this->db->where($vacancy_update_where);
        $this->db->update("tr_organization_vacancies", $vacancy_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      }
    }

    // Delete data
    else if($status =='delete') {
      $vacancy_delete_where = '(vacancies_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_organization_vacancies", $vacancy_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_organization_vacancies ov');
    $this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
    $this->db->order_by('ov.vacancies_id','desc');
    $model_data['provider_vacancy'] = $this->db->get()->result_array();
    return $model_data;
  }

  // Job provider vacancy - Edit Fullview Popup - ajax
  public function get_full_provider_vacancy($value) {
    $provider_vacancy_query = $this->db->query("SELECT * FROM tr_educational_qualification AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.vacancies_qualification_id, ',', n.n ) , ',', -1 ) value FROM tr_organization_vacancies t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.vacancies_qualification_id ) - LENGTH( REPLACE( t.vacancies_qualification_id, ',', ''))) ) AS a ON a.value = c.educational_qualification_id INNER JOIN tr_organization_profile AS op ON a.vacancies_organization_id=op.organization_id INNER JOIN tr_class_level AS cl ON a.vacancies_class_level_id=cl.class_level_id LEFT JOIN tr_university_board AS ub ON a.vacancies_university_board_id=ub.education_board_id INNER JOIN tr_subject AS s ON a.vacancies_subject_id=s.subject_id LEFT JOIN tr_applicable_posting AS tap ON a.vacancies_applicable_posting_id=tap.posting_id WHERE a.vacancies_id='$value'");
    $provider_vacancy = $provider_vacancy_query->result_array();
    return $provider_vacancy;
  }

  /* ===================          Job Provider Vacancy Model End    ====================== */

  /* ===================          Job Provider Activities Model Start    ====================== */

  // Organization_activity - Add Edit Delete View
  public function teacport_organization_activities($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      // $activity_get_where = "activity_organization_id =" . "'" . $this->input->post('act_org_name') . "' AND activity_candidate_id =" . "'" . $this->input->post('act_cand_name') . "' AND activity_id NOT IN (". $this->input->post('rid').")";
      // $activity_get = $this->db->get_where('tr_organization_activity',$activity_get_where);

      // if($activity_get -> num_rows() > 0) {
      //   $model_data['status'] = "Already exist";
      //   $model_data['error'] = 1;     
      // }
      // else {      
        $activity_update_data = array( 
                                    // 'activity_organization_id' => $this->input->post('act_org_name'),
                                    // 'activity_candidate_id' => $this->input->post('act_cand_name'),
                                    // 'activity_vacancy_id' => ($this->input->post('act_vac_name')) ? $this->input->post('act_vac_name') : NULL,
                                    'is_sms_sent' => $this->input->post('act_sms'),
                                    'is_email_sent' => $this->input->post('act_email'),
                                    'is_resume_downloaded' => $this->input->post('act_resume')
                                  );
        $activity_update_where = '(activity_id="'.$this->input->post('rid').'")'; 
        $this->db->set($activity_update_data); 
        $this->db->where($activity_update_where);
        $this->db->update("tr_organization_activity", $activity_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      // }
    }

    // Delete data
    else if($status =='delete') {
      $district_delete_data = '(activity_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_organization_activity", $district_delete_data); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_organization_activity oa');
    $this->db->join('tr_candidate_profile cp','oa.activity_candidate_id=cp.candidate_id','inner');
    $this->db->join('tr_organization_profile op','oa.activity_organization_id=op.organization_id','inner');
    $this->db->join('tr_organization_vacancies ov','oa.activity_vacancy_id=ov.vacancies_id','left');
    $this->db->order_by('oa.activity_id','desc');
    $model_data['pro_activities'] = $this->db->get()->result_array();
    return $model_data;
  }

  /* ===================          Job Provider Activities Model End    ====================== */

  /* ===================          Job Provider Ads Model Start    ====================== */

  // Job provider ads - Add Edit Delete View
  public function get_provider_ads($status) {

    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $ads_get_where = "premium_ads_name =" . "'" . $this->input->post('ads_name') . "' AND organization_id =" . "'" . $this->input->post('org_name') . "' AND premium_ads_id NOT IN (". $this->input->post('rid').")";
      $ads_get = $this->db->get_where('tr_premium_ads',$ads_get_where);
      if($ads_get->num_rows() > 0) {
        $model_data['error'] = 1;
        $model_data['status'] = "Already exists";
      }
      else {
        $ads_update_data = array( 
                                'premium_ads_name' => $this->input->post('ads_name'),
                                'ads_image_path' => $this->input->post('ads_logo'),
                                'ad_visible_days' => $this->input->post('ads_days'),
                                'is_admin_verified' => $this->input->post('admin_verify'),
                                'premium_ads_status' => $this->input->post('ads_status')
                              );
        $ads_update_where = '( premium_ads_id="'.$this->input->post('rid').'")'; 
        $this->db->set($ads_update_data); 
        $this->db->where($ads_update_where);
        $this->db->update("tr_premium_ads", $ads_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2; 
      }  
    }

    // Delete data
    else if($status =='delete') {
      $ads_delete_where = '(premium_ads_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_premium_ads", $ads_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_premium_ads pa');
    $this->db->join('tr_organization_profile op','pa.organization_id=op.organization_id','inner');
    $model_data['provider_ads'] = $this->db->order_by('pa.premium_ads_id','desc')->get()->result_array();
    return $model_data;
  }

  // Job provider ads - Edit Popup Ajax
  public function get_full_provider_ads($value) {
    // $ads_where = '(premium_ads_id="'.$value.'")';
    // $model_data = $this->db->get_where('tr_premium_ads',$ads_where)->row_array();
    //Above code changed by kalai
    $ads_where = '(premium_ads_id="'.$value.'")';
    $this->db->select('*');
    $this->db->from('tr_premium_ads pa');
    $this->db->join('tr_organization_profile op','pa.organization_id=op.organization_id','inner');
    $this->db->where($ads_where);
    $model_data = $this->db->get()->row_array();
    return $model_data;
  }

  /* ===================          Job Provider Ads Model End    ====================== */

  /* ===================          Job Provider Plan Notification Model Start    ====================== */

  // Job provider plan notification - View
  public function get_organization_plan_notification(){
    // View
    // $model_data = $this->db->order_by('notification_id','desc')->get_where('tr_organization_plan_notification')->result_array();
    // return $model_data;
    // View
    $this->db->select('n.*,sub.subscription_plan,org_sub.org_sub_validity_start_date as org_sub_vstart,org_sub.org_sub_validity_end_date as org_sub_vend,org.organization_name,upg.validity_start_date as upg_vstart,upg.validity_end_date as upg_vend');
    $this->db->from('tr_organization_plan_notification n');
    $this->db->join('tr_organization_subscription org_sub','org_sub.organization_subscription_id=n.organization_subscription_id','inner');
    $this->db->join('tr_subscription sub','sub.subscription_id=org_sub.subscription_id','inner');
    $this->db->join('tr_organization_profile org','org.organization_id=org_sub.organization_id','inner');
    $this->db->join('tr_organization_upgrade_or_renewal upg','upg.upgrade_or_renewal_id=n.upgrade_or_renewal_id','left');
    $model_data = $this->db->order_by('n.notification_id','desc')->get()->result_array();
    return $model_data;
  }

  /* ===================          Job Provider Plan Notification Model End    ====================== */

  /* ===================          Job Provider Transaction Model Start    ====================== */

  // Job provider transaction - View
  public function get_provider_transaction(){
    $this->db->select('*');
    $this->db->from('tr_payumoney_transaction trans');
    $this->db->join('tr_organization_profile org','org.organization_id=trans.organization_id','left');
    $model_data= $this->db->order_by('trans.transaction_id','desc')->get()->result_array();
    return $model_data;
  }
  
  // Job provider transaction - Fullview Ajax
  public function get_provider_transaction_full_view($value) {
    $trans_where = '(transaction_id="'.$value.'")';
    $this->db->select('*');
    $this->db->from('tr_payumoney_transaction trans');
    $this->db->join('tr_organization_profile org','org.organization_id=trans.organization_id','left');
    $this->db->where($trans_where);  
    $model_data = $this->db->get()->row_array();
    return $model_data;
  }

  public function get_provider_visit_details($id) {
    $where = '(organiztion_id="'.$id.'" AND (user_type=2 OR user_type=0))';
    $model_data = $this->db->get_where('tr_organization_candidate_visitor_count',$where)->result_array();
    return $model_data;
  }

  public function get_recent_transaction($id) {

    // Recent transaction
    $where = '(pt.organization_id="'.$id.'" AND (pt.payment_type="cheque" OR pt.payment_type="cash"))';
    $this->db->select('pt.*,os.*,ur.*,pt.transaction_id as trans_id');
    $this->db->from('tr_payumoney_transaction pt');
    $this->db->join('tr_organization_subscription os','pt.transaction_id=os.organization_transcation_id','left');
    $this->db->join('tr_organization_upgrade_or_renewal ur','pt.transaction_id=ur.transaction_id','left');
    $this->db->where($where);
    $this->db->order_by('pt.transaction_id','desc');
    $model_data['recent_transaction'] = $this->db->get()->row_array();

    // Recent subscription plan
    $subscription_where = '(tos.organization_id="'.$id.'")';
    $this->db->select('*');
    $this->db->from('tr_organization_subscription tos');
    $this->db->join('tr_subscription ts','tos.subscription_id=ts.subscription_id','inner');
    $this->db->join('tr_organization_upgrade_or_renewal our','tos.organization_subscription_id=our.organization_subscription_id AND our.is_renewal=1','left');
    $model_data['recent_subscription'] = $this->db->where($subscription_where)->order_by('tos.organizaion_sub_updated_date desc,our.validity_end_date desc')->get()->row_array();

    // All plans
    $where = '(subscription_status=1 AND subscription_price > 0)';
    $model_data['plan_details'] = $this->db->get_where('tr_subscription',$where)->result_array();

    return $model_data;
  }

  // To get plan details
  public function get_plan_details() {
    $where = '(subscription_status=1 AND subscription_price > 0)';
    $model_data = $this->db->get_where('tr_subscription',$where)->result_array();
    return $model_data;
  }

  // Payment subscription validation - Renewal Plan
  public function check_renewal_plan_valid($plan_id,$org_id) {
    $data = '';
    $already_where_sub = '(organization_id = "'.$org_id.'" AND organization_subscription_status=1)';
    $check_already_sub = $this->db->get_where('tr_organization_subscription',$already_where_sub);
    $check_already_sub_array = $check_already_sub->num_rows();


    $where_sub = '(subscription_id="'.$plan_id.'" AND subscription_price = 0)';
    $already_sub = $this->db->get_where('tr_subscription',$where_sub);
    $already_sub_array = $already_sub->num_rows();

    $already_where = '(subscription_id = "'.$plan_id.'" AND organization_id = "'.$org_id.'")';
    $check_already = $this->db->get_where('tr_organization_subscription',$already_where)->num_rows();

    if($check_already == 1 && ($check_already_sub_array == 0 || $already_sub_array == 0)) {
        $data = 2; // if correct
    }
    else {
        $data = 1; // if wrong
    }
    return $data;
  }

  // Payment subscription validation - Orignial Plan
  public function check_orginal_plan_valid($plan_id,$org_id) {
    $data = '';
    $already_where_sub = '(organization_id = "'.$org_id.'" AND organization_subscription_status=1)';
    $check_already_sub = $this->db->get_where('tr_organization_subscription',$already_where_sub);
    $check_already_sub_array = $check_already_sub->num_rows();

    $where_sub = '(subscription_id="'.$plan_id.'" AND subscription_price = 0)';
    $already_sub = $this->db->get_where('tr_subscription',$where_sub);
    $already_sub_array = $already_sub->num_rows();

    $already_where = '(subscription_id = "'.$plan_id.'" AND organization_id = "'.$org_id.'")';
    $check_already = $this->db->get_where('tr_organization_subscription',$already_where)->num_rows();

    if(($check_already_sub_array == 0 || $already_sub_array == 0) && $check_already  == 0) {
      $data = 2; // if correct 
    }
    else {
        $data = 1; // if wrong   
    }
    return $data;
  }

  // Payment subscription validation - Upgrade Plan
  public function check_upgrade_plan_valid($plan_id,$org_id) {
    $data = '';
    $already_where_sub = '(organization_id = "'.$org_id.'" AND subscription_id = "'.$plan_id.'" AND organization_subscription_status=1)';
    $check_already_sub = $this->db->get_where('tr_organization_subscription',$already_where_sub);
    $check_already_sub_array = $check_already_sub->num_rows();
    if($check_already_sub_array == 1) {
      $data = 2; // if correct 
    }
    else {
      $data = 1; // if wrong   
    }
    return $data;
  }

  // Payment and Plan details insertion
  public function insert_bank_details($data) {
    if($data['trans_type'] == "cash") {
      $payment_data  = array(
                            'organization_id' => $data['org_id'],
                            'tracking_id'     => strtotime(date("Y-m-d H:i:s")),
                            'order_id'        => $data['order_id'],
                            'transaction_status' => 'Success',
                            'payment_mode'    => 'offline',
                            'payment_type'    => 'cash',
                            'unmapped_status' => 'Transaction Successful',
                            'transaction_date_time' => date('Y-m-d H:i:s',strtotime($data['cash_date'])),
                            'amount'          => number_format( (float) $data['cash_amt'], 2, '.', ''),
                            'net_amount_debit' => $data['cash_amt'],
                            'contact_name'    => $data['cash_name'],
                            'contact_email'   => $data['cash_mail'],
                            'contact_number'  => $data['cash_num'],
                            'error_code'      => 0,
                            'error_message'   => 'No Error',
                            'reference_description'  => $data['cash_des']
                         );
    }
    else  if($data['trans_type'] == "cheque") {
      $payment_data  = array(
                            'organization_id' => $data['org_id'],
                            'tracking_id'     => strtotime(date("Y-m-d H:i:s")),
                            'order_id'        => $data['order_id'],
                            'bank_referrence_number' => $data['cheque_acc_num'],
                            'transaction_status' => 'Success',
                            'payment_mode'    => 'offline',
                            'payment_type'    => 'cheque',
                            'unmapped_status' => 'Transaction Successful',
                            'transaction_date_time' => date('Y-m-d H:i:s',strtotime($data['cheque_date'])),
                            'amount'          => number_format( (float) $data['cheque_amt'], 2, '.', ''),
                            'net_amount_debit' => $data['cheque_amt'],
                            'bank_name'       => $data['cheque_bank_name'],
                            'cheque_number'   => $data['cheque_code'],
                            'contact_name'    => $data['cheque_name'],
                            'contact_email'   => $data['cheque_mail'],
                            'contact_number'  => $data['cheque_num'],
                            'error_code'      => 0,
                            'error_message'   => 'No Error',
                         );
    }
    if($this->db->insert('tr_payumoney_transaction',$payment_data)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  // Subscription plan by id
  public function get_subcription_plan($planid)
  {
    $where = "(subscription_id = '".$planid."'  AND subscription_status='1')";
    $model_data = $this->db->get_where('tr_subscription',$where)->row_array();
    return $model_data; 
  }

  // Insert original subscription data
  public function insert_orignial_plan_details($data)
  {
    $already_where = '(organization_id="'.$data['organization_id'].'" AND organization_subscription_status=1)';
    $already_get = $this->db->get_where('tr_organization_subscription',$already_where)->num_rows();
    if($already_get > 0) {
        $this->db->where($already_where);
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
    }
    if($this->db->insert('tr_organization_subscription', $data)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  // Get organization subscription details
  public function get_organization_subscription_data($org_id,$plan_id){
    $already_where = '(subscription_id = "'.$plan_id.'" AND organization_id = "'.$org_id.'")';
    $data = $this->db->get_where('tr_organization_subscription',$already_where)->row_array();
    return $data;
  }

  // Insert renewal subscription data
  public function insert_renewal_plan_details($org_id,$data)
  {
    $already_where = '(organization_id="'.$org_id.'" AND organization_subscription_status=1)';
    $already_get = $this->db->get_where('tr_organization_subscription',$already_where)->num_rows();
    if($already_get > 0) {
        $this->db->where($already_where);
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
    }
    if($this->db->insert('tr_organization_upgrade_or_renewal', $data)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  // Update plan details after renewal
  public function update_subscription_plan_details($org_id,$plan_id,$data){
    $update_where = '(organization_id="'.$org_id.'" AND subscription_id="'.$plan_id.'")';
    $this->db->where($update_where);
    $this->db->set($data);
    $this->db->update('tr_organization_subscription');
    return TRUE;
  }

  // Insert upgrade and renewal plan
  public function subscribe_upgrade_renewal_details($data)
  {
    if($this->db->insert('tr_organization_upgrade_or_renewal', $data)){
        return TRUE;
    }
    else{
        return FALSE;
    }
  }

  // Mail sending details - Renewal
  public function provider_subscription_active_renewl_plans_details($org_id,$plan_id){
    $get_where = '(os.organization_id="'.$org_id.'" AND os.subscription_id="'.$plan_id.'" AND opu.status=1 AND opu.is_renewal=1)';
    $this->db->select('*');    
    $this->db->from('tr_organization_subscription os');
    $this->db->join('tr_organization_upgrade_or_renewal opu', 'os.organization_subscription_id = opu.organization_subscription_id');
    $this->db->join('tr_subscription ts', 'os.subscription_id = ts.subscription_id');
    $this->db->where($get_where);
    $data = $this->db->get()->row_array();
    return $data;
  }

  // Mail sending details - Orignial
  public function provider_subscription_active_plans_details($org_id){
    $this->db->select('*');    
    $this->db->from('tr_organization_subscription os');
    $this->db->join('tr_subscription ts', 'os.subscription_id = ts.subscription_id');
    $where = "(os.organization_id = '".$org_id."' AND os.organization_subscription_status='1')";
    $this->db->where($where);
    $providersubcription = $this->db->get();
    return $providersubcription->row_array(); 
  }

  // To get provider basic details
  public function get_provider_basic_details($org_id) {
    $where = '(organization_id="'.$org_id.'")';
    $model_data = $this->db->get_where('tr_organization_profile',$where)->row_array();
    return $model_data;
  }

  /* ===================          Job Provider Transaction Model End    ====================== */
  
}

/* End of file Job_Providermodel.php */
/* Location: ./application/controllers/Job_Providermodel.php */