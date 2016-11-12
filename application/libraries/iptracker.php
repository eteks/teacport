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
  
  public function __construct(){
    $this->sys  =& get_instance();
        $this->sys->load->library('user_agent');
  }
  
  private static function get_ip_address(){   
    $ip = getenv('HTTP_CLIENT_IP')?:
      getenv('HTTP_X_FORWARDED_FOR')?:
      getenv('HTTP_X_FORWARDED')?:
      getenv('HTTP_FORWARDED_FOR')?:
      getenv('HTTP_FORWARDED')?:
      getenv('REMOTE_ADDR');    
    return $ip;
  }

  private function get_page_visit(){
    return current_url();
  }
    
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
  
  public function save_site_visit(){
    $ip   = self::get_ip_address();
    $page = self::get_page_visit();
    $agent  = self::get_user_agent();
    $seg  = explode("-", $page);
    
        //Uncomment the IF Statement if you do not want your own admin pages to be tracked. Change the value of the needle ('admin) to the segments (URI) found in your admin pages.
    //if(!in_array('admin', $seg)){    
    if(!empty($this->sys->session->userdata("login_status"))) {
      $session_data = $this->sys->session->userdata("login_session");
      $user_id = $session_data['user_id'];
    }
    else {
      $user_id = 0;
    }
    $current_date = date("Y-m-d h:i:s");
    $data = array(
      'ip'            => $ip,
      'page_view'     => $page,
      'user_agent'    => $agent,
      'user_id'       => $user_id,
      'count'         => '1',
      'created_date'  => $current_date

    );
    $data_count_where = '(ip="'.$ip.'" and page_view="'.$page.'" and user_id="'.$user_id.'")';
    $data_count = $this->sys->db->get_where('site_visits',$data_count_where);
    if($data_count->num_rows() > 0) {
      $create_date_query = $data_count->row_array();
      $count = $create_date_query['count'] + 1;
      $created_date = date('Y-m-d',strtotime($create_date_query['created_date']));
      $updated_date = date("Y-m-d");
      if($updated_date > $created_date) {
        $update_data = array(
                        'count'         => $count,
                        'created_date'  => $current_date
                      );
        $this->sys->db->set($update_data);
        $this->sys->db->where($data_count_where);
        $this->sys->db->update('site_visits'); 
      }
    }
    else {
      $this->sys->db->insert('site_visits', $data);     
    }
    echo $_SERVER['REMOTE_ADDR'];  

    //}
  }
}
$tracker = new Iptracker();
$tracker->save_site_visit();