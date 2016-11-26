<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }


  
  // Login - Admin
  public function teac_login()
  {
    $model_data['error'] = 0;
    if($this->input->post('username') && $this->input->post('password')) {
        $admin_login_where = '(admin_user_name="'.$this->input->post('username').'" and admin_user_password="'.$this->input->post('password').'" and admin_user_status=1)';
        // $admin_login_get = $this->db->get_where('tr_admin_users',$admin_login_where);
        //Above commented code updated by kalai
        $this->db->select('au.*,aug.is_super_admin');
        $this->db->from('tr_admin_users au');
        $this->db->join('tr_admin_user_groups aug','au.admin_user_group_id=aug.user_group_id','inner');
        $this->db->where($admin_login_where);
        $admin_login_get = $this->db->get();
      if($admin_login_get->num_rows() == 1) {
        $model_data['status'] = "login_success";
        $model_data['login_values'] = $admin_login_get->row_array();
      }
      else {
        $model_data['status'] = "Invalid Login Details";
      }
    }
    else {
      $model_data['status']= "failed";
      $model_data['error'] = 1;
    }
    return $model_data;
  }

  // Forget password - Admin
  public function teac_forget_login()
  {
    $model_data['error'] = 0;
    if($this->input->post('useremail')) {
      $forget_where = '(admin_user_email="'.$this->input->post('useremail').'" and admin_user_status=1)';
      $forget_get = $this->db->get_where('tr_admin_users',$forget_where);
      if($forget_get->num_rows() == 1) {
        $model_data['status'] = "valid";
        $model_data['user_values'] = $forget_get->row_array();
      }
      else {
        $model_data['status'] = "Invalid Email Address";
      }
    }
    else {
      $model_data['status']= "failed";
      $model_data['error'] = 1;
    }
    return $model_data;
  }

  
}

/* End of file Ajax_Model.php */
/* Location: ./application/controllers/Ajax_Model.php */