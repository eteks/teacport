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

  // User groups - Add Edit Delete View
  public function user_accounts($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $users_update_data = array( 
                              'admin_user_name' => $this->input->post('admin_user_name'),
                              'admin_user_password' => $this->input->post('admin_user_password'),
                              'admin_user_email' => $this->input->post('admin_user_email'),
                              'admin_user_group_id' => $this->input->post('admin_user_group_id'),
                              'admin_user_status' => $this->input->post('admin_user_status')
                            );
      $users_update_where = '( admin_user_id="'.$this->input->post('rid').'")'; 
      $this->db->set($users_update_data); 
      $this->db->where($users_update_where);
      $this->db->update("tr_admin_users", $users_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $users_insert_data = array( 
                              'admin_user_name' => $this->input->post('admin_user_name'),
                              'admin_user_password' => $this->input->post('admin_user_password'),
                              'admin_user_email' => $this->input->post('admin_user_email'),
                              'admin_user_group_id' => $this->input->post('admin_user_group_id'),
                              'admin_user_status' => $this->input->post('admin_user_status')
                            );
      $this->db->insert("tr_admin_users", $users_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $users_delete_where = '(state_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_admin_users", $users_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_admin_users usr');
    $this->db->join('tr_admin_user_groups grp','usr.admin_user_group_id=grp.user_group_id','inner');
    $model_data['user_details'] = $this->db->get()->result_array();
    return $model_data;
  }
    //Admin modules to store in database
    public function insert_modules($data){
        $data = json_decode($data, true);
        $full_map_array = array();
        foreach($data as $data_value) {
          foreach ($data_value as $key => $value) {
            $array = array();
            foreach ($value as $record) {
              $array['main_module'] = $key;
              $array['sub_module'] = $record;
              array_push($full_map_array, $array);
            }
          }
        }

        //Here insert_batch is a inbuilt function to store the set of records into database in a single query at the same time
        // $this->db->insert_batch('tr_admin_modules', $full_map_array);

        //Here insert_on_duplicate_update_batch is also a inbuilt function, it ignores the insertion when duplicate record found. To use this function we have to download two files MY_Loader.php and MY_DB_mysql_driver.php and place in folder application/core
        $this->db->insert_on_duplicate_update_batch('tr_admin_modules', $full_map_array);
    }
    //Get all the admin modules to assign priveleges for each user
    public function get_all_modules(){
        $this->db->select('*');
        $this->db->from('tr_admin_modules');
        $query = $this->db->get()->result_array();
        return $query;
    }
    //Get all the admin groups to assign priveleges for that group user
    public function get_admin_groups(){
        $this->db->select('*');
        $this->db->from('tr_admin_user_groups');
        $query = $this->db->get()->result_array();
        return $query;
    }
}

/* End of file Admin_users_model.php */
/* Location: ./application/controllers/Admin_users_model.php */