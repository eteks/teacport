<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_Plan_Model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  // Job provider profile
  public function get_subscription_plans() {
    
    return 1;
  }

 


 
  
}

/* End of file Subscription_Plan_Model.php */
/* Location: ./application/controllers/Subscription_Plan_Model.php */