<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  // User groups - Add Edit Delete View
  public function user_groups($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $group_update_data = array( 
                              'user_group_name' => $this->input->post('user_group_name'),
                              'user_group_description' => $this->input->post('user_group_description'),
                              'user_group_status' => $this->input->post('user_group_status')
                            );
      $group_update_where = '( user_group_id="'.$this->input->post('rid').'")'; 
      $this->db->set($group_update_data); 
      $this->db->where($group_update_where);
      $this->db->update("tr_admin_user_groups", $group_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $group_insert_data = array( 
                              'user_group_name' => $this->input->post('user_group_name'),
                              'user_group_description' => $this->input->post('user_group_description'),
                              'user_group_status' => $this->input->post('user_group_status')
                            );
      $this->db->insert("tr_admin_user_groups", $group_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $group_delete_where = '(state_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_admin_user_groups", $group_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $model_data['group_values'] = $this->db->get_where('tr_admin_user_groups')->result_array();
    return $model_data;
  }

  // Edit admin profile
  public function teac_admin_edit_profile($status)
  {
    $session_data = $this->session->userdata('login_session');
    // Update data
    if($status == 'update') {
      $update_where = '(admin_user_id="'.$session_data['admin_user_id'].'")';
      $update_data =  array(
                        'admin_user_name' => $this->input->post('user_name'),
                        'admin_user_email' => $this->input->post('user_email')              
                      );
      $this->db->set($update_data);
      $this->db->where($update_where);
      $this->db->update("tr_admin_users", $update_data); 
      $model_data['status'] = "Updated Successfully";
    }
    else if($status = 'init') {
      $select_where = '(admin_user_id="'.$session_data['admin_user_id'].'")';
      $model_data = $this->db->get_where('tr_admin_users',$select_where)->row_array();
    }
    return $model_data;
  }

  // Change password
  public function teac_admin_change_password()
  {
    $session_data = $this->session->userdata('login_session');
    // Update data
    $update_where = '(admin_user_id="'.$session_data['admin_user_id'].'")';
    $update_data =  array(
                      'admin_user_password' => $this->input->post('new_pass_confirm')            
                    );
    $this->db->set($update_data);
    $this->db->where($update_where);
    $this->db->update("tr_admin_users", $update_data); 
    $model_data['status'] = "Updated Successfully";
    return $model_data;
  }

  





}

/* End of file Admin_users_model.php */
/* Location: ./application/controllers/Admin_users_model.php */