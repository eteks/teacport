<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Description: Tracks the number of website visits everyday. 
 * Version: 1.0.0
 * Date Created: January 09, 2015
 * Author: Glenn Tan Gevero
 * Website: http://app-arsenal.com
 * File: IP Tracker Library File
**********************************************************************/
class Iptracker{
    
  private $sys = null;
  
  // Load user agent(browser) and get instance
  public function __construct(){
    $this->sys  =& get_instance();
    $this->sys->load->library('user_agent');
  }

  // Get ip address (public ip)
  private static function get_ip_address(){   
    $ip = getenv('HTTP_CLIENT_IP')?:
      getenv('HTTP_X_FORWARDED_FOR')?:
      getenv('HTTP_X_FORWARDED')?:
      getenv('HTTP_FORWARDED_FOR')?:
      getenv('HTTP_FORWARDED')?:
      getenv('REMOTE_ADDR');   
    return $ip;
  }

  // Get current url
  private function get_page_visit(){
    return current_url();
  }
  
  // Get user agent details (browser details)
  private function get_user_agent(){        
    if ($this->sys->agent->is_browser()){
      $agent = $this->sys->agent->browser().' '.$this->sys->agent->version();
    }
    elseif ($this->sys->agent->is_robot()){
      $agent = $this->sys->agent->robot();
    }
    elseif ($this->sys->agent->is_mobile()){
      $agent = $this->sys->agent->mobile();
    }
    else{
      $agent = 'Unidentified User Agent';
    }
    return $agent;
  }
  
  // Save records in database
  public function save_site_visit(){
    $ip   = self::get_ip_address();
    $page = self::get_page_visit();
    $agent  = self::get_user_agent();
    $seg  = explode("-", $page);
    
    //Uncomment the IF Statement if you do not want your own admin pages to be tracked. Change the value of the needle ('admin) to the segments (URI) found in your admin pages.
    //if(!in_array('admin', $seg)){  
    $can_id = 0;
    $org_id = 0;  
    if(!empty($this->sys->session->userdata("login_status"))) {
      $session_data = $this->sys->session->userdata("login_session");
      if(!empty($session_data['candidate_id'])) {
        $can_id = $session_data['candidate_id'];
        $org_id = 0;
      }
      else if(!empty($session_data['organization_id'])) {
        $can_id = 0;
        $org_id = $session_data['organization_id'];
      }
    }

    // Inputs
    $current_date = date("Y-m-d h:i:s");
    $today = date("Y-m-d");
    $data = array(
      'ip_address'            => $ip,
      'page_view'             => $page,
      'user_agent'            => $agent,
      'candidate_id'          => $can_id,
      'organization_id'       => $org_id,
      'count'                 => '1',
      'created_date'          => $current_date
    );
    $data_count_where = '(ip_address="'.$ip.'" and page_view="'.$page.'" and candidate_id="'.$can_id.'" and organization_id="'.$org_id.'" AND DATE(created_date) = DATE(NOW()))';
    $data_count = $this->sys->db->get_where('tr_site_visits',$data_count_where);
    if($data_count->num_rows() > 0) {
      $this->sys->db->where($data_count_where);
      $this->sys->db->set('count', 'count+1', FALSE);
      $this->sys->db->update('tr_site_visits'); 
    }
    else {
      $this->sys->db->insert('tr_site_visits', $data);     
    }
    // echo $_SERVER['REMOTE_ADDR'];  
    // } 
  }
}
$tracker = new Iptracker(); // Object creattion
$tracker->save_site_visit(); // Call save method