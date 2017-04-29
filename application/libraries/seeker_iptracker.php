<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Description: Tracks the number of website visits everyday. 
 * Version: 1.0.0
 * Date Created: January 09, 2015
 * Author: Glenn Tan Gevero
 * Website: http://app-arsenal.com
 * File: IP Tracker Library File
 0 - Guest
 1 - Provider
 2 - Seeker
**********************************************************************/
class Seeker_Iptracker{
    
  private $sys = null;
  
  // Load user agent(browser) and get instance
  public function __construct(){
    $this->sys  =& get_instance();
    $this->sys->load->library('user_agent');
  }

  // Get ip address (public ip)
  private static function get_provider_ip_address(){   
    $ip = getenv('HTTP_CLIENT_IP')?:
      getenv('HTTP_X_FORWARDED_FOR')?:
      getenv('HTTP_X_FORWARDED')?:
      getenv('HTTP_FORWARDED_FOR')?:
      getenv('HTTP_FORWARDED')?:
      getenv('REMOTE_ADDR');   
    return $ip;
  }

  // Get current url
  private function get_provider_page_visit(){
    return current_url();
  }
  
  // Get user agent details (browser details)
  private function get_provider_user_agent(){        
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
  public function provider_save_site_visit($cand){
    $ip   = self::get_provider_ip_address();
    $page = self::get_provider_page_visit();
    $agent  = self::get_provider_user_agent();
    $seg  = explode("-", $page);
    
    //Uncomment the IF Statement if you do not want your own admin pages to be tracked. Change the value of the needle ('admin) to the segments (URI) found in your admin pages.
    //if(!in_array('admin', $seg)){  
    $can_id = 0;
    $org_id = 0;  
    $session = $this->sys->session->all_userdata();
    if(!empty($session['login_status']) && !empty($session['login_session']) && $session['login_session']['user_type'] == "provider") {
      $can_id = (isset($cand['candidate_id']) && !empty($cand['candidate_id'])) ?$cand['candidate_id'] : NULL;
      $org_id = $session['login_session']['pro_userid']; 
      $data = array(
        'ip_address'            => $ip,
        'user_agent'            => $agent,
        'candidate_id'          => $can_id,
        'organiztion_id'        => $org_id,
        'count'                 => '1',
        'user_type'             => '1'
      );
      $data_count_where = '(ip_address="'.$ip.'" and candidate_id="'.$can_id.'" and organiztion_id="'.$org_id.'" AND user_type=1 AND DATE(created_date) = DATE(NOW()))';
      $data_count = $this->sys->db->get_where('tr_organization_candidate_visitor_count',$data_count_where);
      if($data_count->num_rows() > 0) {
        $this->sys->db->where($data_count_where);
        $this->sys->db->set('count', 'count+1', FALSE);
        $this->sys->db->update('tr_organization_candidate_visitor_count'); 
      }
      else {
        $this->sys->db->insert('tr_organization_candidate_visitor_count', $data);     
      }
    }
  }
}
// $tracker = new Seeker_Iptracker(); // Object creattion
// $tracker->provider_save_site_visit(); // Call save method