<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_Plan_Model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  // Job provider ads
  public function plan_subscription_details($status) {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    if($status=='update' || $status=='save'){
        $validity_start = explode('/', $this->input->post('sub_start_validity'));
        $validity_start_date = $validity_start[2]."-".$validity_start[1]."-".$validity_start[0];
        $validity_end = explode('/', $this->input->post('sub_end_validity'));
        $validity_end_date = $validity_end[2]."-".$validity_end[1]."-".$validity_end[0];
    }
    // Update data
    if($status=='update') {       
        $plans_update_data = array( 
                                'subscription_plan' => $this->input->post('sub_plan'),
                                'subscription_price' => $this->input->post('sub_price'),
                                'subscription_features' => $this->input->post('sub_features'),
                                'subcription_valid_start_date' => $validity_start_date,
                                'subcription_valid_end_date' => $validity_end_date,
                                'subscription_max_no_of_posts' => $this->input->post('sub_max_vacancy'),
                                'subcription_sms_counts' => $this->input->post('sub_max_sms'),
                                'subscription_email_counts' => $this->input->post('sub_max_email'),
                                'subcription_resume_download_count' => $this->input->post('sub_max_resume'),
                                'subscription_max_no_of_ads' => $this->input->post('sub_max_ads'),
                                'subscription_max_days_ad_visible' => $this->input->post('sub_max_days_ad_visible'),
                                'subscription_status' => $this->input->post('sub_status')
                              );
        $plans_update_where = '( subscription_id="'.$this->input->post('rid').'")'; 
        $this->db->set($plans_update_data); 
        $this->db->where($plans_update_where);
        $this->db->update("tr_subscription", $plans_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2; 
    }

    // Save data
    else if($status=='save') {
      $plan_insert_data = array( 
                                'subscription_plan' => $this->input->post('sub_plan'),
                                'subscription_price' => $this->input->post('sub_price'),
                                'subscription_features' => $this->input->post('sub_features'),
                                'subcription_valid_start_date' =>$validity_start_date,
                                'subcription_valid_end_date' => $validity_end_date,
                                'subscription_max_no_of_posts' => $this->input->post('sub_max_vacancy'),
                                'subcription_sms_counts' => $this->input->post('sub_max_sms'),
                                'subscription_email_counts' => $this->input->post('sub_max_email'),
                                'subcription_resume_download_count' => $this->input->post('sub_max_resume'),
                                'subscription_max_no_of_ads' => $this->input->post('sub_max_ads'),
                                'subscription_max_days_ad_visible' => $this->input->post('sub_max_days_ad_visible'),
                                'subscription_status' => $this->input->post('sub_status')
                              );
      $this->db->insert("tr_subscription", $plan_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
   	}

    // Delete data
    else if($status =='delete') {
      $plans_delete_where = '(subscription_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_subscription", $plans_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_subscription sub');
    $model_data['subscription_plans'] = $this->db->order_by('sub.subscription_id','desc')->get()->result_array();
    return $model_data;
  }
  // Subscription plan details - ajax while click edit
  public function get_plan_subscription_details($value) {
    $plans_where = '(subscription_id="'.$value.'")';
    $model_data = $this->db->get_where('tr_subscription',$plans_where)->row_array();
    return $model_data;
  }
  // Job provider ads
  public function plan_subscription_upgrade_details($status) {
    $model_data['status'] = 0;
    $model_data['error'] = 0;
    // Update data
    if($status=='update') {
        $plans_update_data = array( 
                                'subscription_id' => $this->input->post('subscription_name'),
                                'email_count' => $this->input->post('email_count'),
                                'sms_count' => $this->input->post('sms_count'),
                                'resume_count' => $this->input->post('resume_count'),
                                'upgrade_price' => $this->input->post('price'),
                                'upgrade_status' => $this->input->post('plan_upgrade_creation_status'),
                              );
        $plans_update_where = '( upgrade_id="'.$this->input->post('rid').'")'; 
        $this->db->set($plans_update_data); 
        $this->db->where($plans_update_where);
        $this->db->update("tr_subscription_upgrade", $plans_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2; 
    }

    // Save data
    else if($status=='save') {
      $plans_insert_data = array( 
                                'subscription_id' => $this->input->post('subscription_name'),
                                'email_count' => $this->input->post('email_count'),
                                'sms_count' => $this->input->post('sms_count'),
                                'resume_count' => $this->input->post('resume_count'),
                                'upgrade_price' => $this->input->post('price'),
                                'upgrade_status' => $this->input->post('plan_upgrade_creation_status'),
                              );
      $this->db->insert("tr_subscription_upgrade", $plans_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $plans_delete_where = '(upgrade_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_subscription_upgrade", $plans_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_subscription_upgrade sub_up');
    $this->db->join('tr_subscription sub','sub.subscription_id=sub_up.subscription_id','inner');
    $model_data['subscription_plan_upgrade'] = $this->db->order_by('sub.subscription_id','desc')->get()->result_array();
    return $model_data;
  }
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
}

/* End of file Subscription_Plan_Model.php */
/* Location: ./application/controllers/Subscription_Plan_Model.php */