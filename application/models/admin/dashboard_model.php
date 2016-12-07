<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  private $site_log = 'tr_site_visits';

	public function __construct()
  {
  }
  public function get_chart_data_for_visits($start_date, $end_date) {
      $sql = 'SELECT SUM(count) total_visits, DATE(created_date) day_date
      FROM ' . $this->site_log . '
      WHERE DATE(created_date) >= ' . $this->db->escape($start_date) . '
      AND DATE(created_date) <= ' . $this->db->escape($end_date) . '
      GROUP BY DATE(created_date) ORDER BY DATE(created_date) DESC';
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
        $data = array();
        foreach ($query->result_array() as $key => $value) {
          $data[$key]['label'] = $value['day_date'];
          $data[$key]['value'] = $value['total_visits'];
        }
        return $data;
      }
      return NULL;
  }
  public function count_vacancies_by_district(){
      //Get vacancies by district wise to combine the table of Vacancies, Organization and District
      $condition = "vac.vacancies_status = 1 AND org.organization_status=1 AND dist.  district_status=1";
      $this->db->select('count(district_id) as count_dist,dist.district_id,dist.district_name');
      $this->db->from('tr_organization_vacancies AS vac');
      $this->db->join('tr_organization_profile AS org', 'org.organization_id = vac.vacancies_organization_id', 'inner');
      $this->db->join('tr_district AS dist', 'dist.district_id = org.organization_district_id', 'inner');
      $this->db->where($condition);
      $this->db->order_by('count_dist','desc');
      $this->db->group_by('dist.district_name');
      $query = $this->db->get()->result_array();
      // echo "district";
      // print_r($query);
      return $query;
  }
  public function count_vacancies_by_state(){
      //Get vacancies by state wise to combine the table of Vacancies, Organization and District
      $condition = "vac.vacancies_status = 1 AND org.organization_status=1 AND dist.district_status=1 AND st.state_status = 1";
      $this->db->select('count(state_id) as count_st,st.state_id,st.state_name');
      $this->db->from('tr_organization_vacancies AS vac');
      $this->db->join('tr_organization_profile AS org', 'org.organization_id = vac.vacancies_organization_id', 'inner');
      $this->db->join('tr_district AS dist', 'dist.district_id = org.organization_district_id', 'inner');
      $this->db->join('tr_state AS st', 'st.state_id = dist.district_state_id', 'inner');
      $this->db->where($condition);
      $this->db->order_by('count_st','desc');
      $this->db->group_by('st.state_name');
      $query = $this->db->get()->result_array();
      // echo "staterecord";
      // print_r($query);
      return $query;
  }
  public function count_vacancies_by_qualification(){
      //Get vacancies by qualification wise to combine the table of Vacancies, Organization and District
      $query = $this->db->query("SELECT educational_qualification,count(qual.educational_qualification_id)
          as count_qual FROM tr_educational_qualification AS qual
          INNER JOIN 
          (
            SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( vac.vacancies_qualification_id, ',', n.n ) , ',', -1 ) value
            FROM tr_organization_vacancies AS vac
            CROSS JOIN numbers n
            WHERE n.n <=1 + ( LENGTH( vac.vacancies_qualification_id ) - LENGTH( REPLACE( vac.vacancies_qualification_id, ',', '' ) ) )
          )AS a ON a.value = qual.educational_qualification_id 
          group by qual.educational_qualification_id")->result_array();

      // echo $this->db->last_query();
      // echo "qualrecord";
      // print_r($query);
      return $query;
  }
  public function count_vacancies_by_institution(){
      //Get vacancies by institution wise to combine the table of Vacancies, Organization and District
      $condition = "vac.vacancies_status = 1 AND class.class_level_status=1 AND inst.institution_type_status=1";
      $this->db->select('count(institution_type_id) as count_inst,inst.institution_type_id,inst.institution_type_name');
      $this->db->from('tr_organization_vacancies AS vac');
      $this->db->join('tr_class_level AS class', 'class.class_level_id = vac.vacancies_class_level_id', 'inner');
      $this->db->join('tr_institution_type AS inst', 'inst.institution_type_id = class.class_level_inst_type_id', 'inner');
      $this->db->where($condition);
      $this->db->order_by('count_inst','desc');
      $this->db->group_by('inst.institution_type_name');
      $query = $this->db->get()->result_array();
      // echo "instrecord";
      // print_r($query);
      return $query;
  }
  public function count_overall_vacancies(){
      $condition = "vac.vacancies_status = 1";
      $this->db->select('count(vacancies_id) as count_vac');
      $this->db->from('tr_organization_vacancies AS vac');
      $this->db->where($condition);
      $this->db->order_by('vacancies_id','desc');
      $query = $this->db->get()->result_array();
      // echo "count_overall_vacancies";
      // print_r($query);
      return $query;
  }
  public function count_overall_job_applied(){
      $condition = "job.applied_job_status = 1";
      $this->db->select('count(applied_job_id) as count_job');
      $this->db->from('tr_candidate_applied_job AS job');
      $this->db->where($condition);
      $this->db->order_by('applied_job_id','desc');
      $query = $this->db->get()->result_array();
      // echo "job_applied";
      // print_r($query);
      return $query;
  }

  public function count_overall_job_seekers(){
      $condition = "cand.candidate_status = 1";
      $this->db->select('count(candidate_id) as count_cand');
      $this->db->from('tr_candidate_profile AS cand');
      $this->db->where($condition);
      $this->db->order_by('candidate_id','desc');
      $query = $this->db->get()->result_array();
      // echo "candidate";
      // print_r($query);
      return $query;
  }
  public function count_overall_job_providers(){
      $condition = "org.organization_status = 1";
      $this->db->select('count(organization_id) as count_org');
      $this->db->from('tr_organization_profile AS org');
      $this->db->where($condition);
      $this->db->order_by('organization_id','desc');
      $query = $this->db->get()->result_array();

      // echo $this->db->last_query();
      // echo "organization";
      // print_r($query);
      return $query;
  }
  public function count_unique_visitors(){
      $condition = "vis.is_unique_visitor = 1";
      $this->db->select('count(site_visits_id) as count_vis');
      $this->db->from('tr_site_visits AS vis');
      $this->db->where($condition);
      $query = $this->db->get()->result_array();
      // echo "unique_visitors";
      // print_r($query);
      return $query;
  }
  public function count_visits(){
      $this->db->select('count(site_visits_id) as count_vis');
      $this->db->from('tr_site_visits AS vis');
      $query = $this->db->get()->result_array();
      // echo "unique_visitors";
      // print_r($query);
      return $query;
  }
  public function paid_job_providers(){
      //Get vacancies by district wise to combine the table of Vacancies, Organization and District
      // $condition = "org.organization_status = 1 AND sub.subscription_status=1";
      // $this->db->select('count(subscription_id) as count_plan,sub.subscription_id,sub.subscription_plan,sub.subscription_price');
      // $this->db->from('tr_organization_profile AS org');
      // $this->db->join('tr_subscription AS sub', 'sub.subscription_id = org.subcription_id', 'inner');
      // $this->db->where($condition);
      // $this->db->order_by('count_plan','desc');
      // $this->db->group_by('sub.subscription_id');
      $condition = "org.organization_subscription_status = 1 AND sub.subscription_status=1";
      $this->db->select('count(org.subscription_id) as count_plan,sub.subscription_id,sub.subscription_plan,sub.subscription_price');
      $this->db->from('tr_organization_subscription AS org');
      $this->db->join('tr_subscription AS sub', 'sub.subscription_id = org.subscription_id', 'inner');
      $this->db->where($condition);
      $this->db->order_by('count_plan','desc');
      $this->db->group_by('org.organization_id');
      $query = $this->db->get()->result_array();
      // echo "plan job provider";
      // print_r($query);
      return $query;
  }
  public function paid_job_providers_by_district(){
      //Get vacancies by district wise to combine the table of Vacancies, Organization and District
      // $condition = "org.subcription_id IS NOT NULL AND org.organization_status = 1 AND dist.district_status=1";
      // $this->db->select('count(district_id) as count_dist,dist.district_id,dist.district_name');
      // $this->db->from('tr_organization_profile AS org');
      // $this->db->join('tr_district AS dist', 'dist.district_id = org.organization_district_id', 'inner');
      // $this->db->where($condition);
      // $this->db->order_by('count_dist','desc');
      // $this->db->group_by('dist.district_id');
      $condition = "org_sub.subscription_id IS NOT NULL AND org.organization_status = 1 AND dist.district_status=1";
      $this->db->select('count(district_id) as count_dist,dist.district_id,dist.district_name');
      $this->db->from('tr_organization_profile AS org');
      $this->db->join('tr_district AS dist', 'dist.district_id = org.organization_district_id', 'inner');
      $this->db->join('tr_organization_subscription AS org_sub', 'org_sub.organization_id = org.organization_id', 'inner');
      $this->db->where($condition);
      $this->db->order_by('count_dist','desc');
      $this->db->group_by('dist.district_id');
      $query = $this->db->get()->result_array();
      // echo "paid_job_providers_by_district";
      // print_r($query);
      return $query;
  }
  public function free_job_providers_by_district(){
      //Get vacancies by district wise to combine the table of Vacancies, Organization and District
      // $condition = "org.subcription_id IS NULL AND org.organization_status = 1 AND dist.district_status=1";
      // $this->db->select('count(district_id) as count_dist,dist.district_id,dist.district_name');
      // $this->db->from('tr_organization_profile AS org');
      // $this->db->join('tr_district AS dist', 'dist.district_id = org.organization_district_id', 'inner');
      // $this->db->where($condition);
      // $this->db->order_by('count_dist','desc');
      // $this->db->group_by('dist.district_id');
      $condition = "org_sub.subscription_id IS NULL AND org.organization_status = 1 AND dist.district_status=1";
      $this->db->select('count(district_id) as count_dist,dist.district_id,dist.district_name');
      $this->db->from('tr_organization_profile AS org');
      $this->db->join('tr_district AS dist', 'dist.district_id = org.organization_district_id', 'inner');
      $this->db->join('tr_organization_subscription AS org_sub', 'org_sub.organization_id = org.organization_id', 'inner');
      $this->db->where($condition);
      $this->db->order_by('count_dist','desc');
      $this->db->group_by('dist.district_id');
      $query = $this->db->get()->result_array();
      // echo "free_job_providers_by_district";
      // print_r($query);
      return $query;
  }
  public function latest_job_providers(){
      $condition = "org.organization_status = 1";
      $this->db->select('*');
      $this->db->from('tr_organization_profile AS org');
      $this->db->where($condition);
      $this->db->limit(5);
      $this->db->order_by('organization_id','desc');
      $query = $this->db->get()->result_array();
      return $query;
  }
  public function latest_vacancy_jobs(){
      $condition = "vac.vacancies_status = 1";
      $this->db->select('*');
      $this->db->from('tr_organization_vacancies AS vac');
      $this->db->join('tr_organization_profile AS org', 'org.organization_id = vac.vacancies_organization_id', 'inner');
      $this->db->join('tr_district AS dist', 'dist.district_id = org.organization_district_id', 'inner');
      $this->db->where($condition);
      $this->db->limit(5);
      $this->db->order_by('vacancies_id','desc');
      $query = $this->db->get()->result_array();
      // echo "latest_jobs";
      // echo $this->db->last_query();
      // echo "organization";
      // print_r($query);
      return $query;
  }
  public function page_high_count_visits(){
      $this->db->select('SUM(count) as count_vis, page_view');
      $this->db->from('tr_site_visits AS vis');
      $this->db->group_by('page_view');
      $this->db->order_by('SUM(count)','desc');
      $this->db->limit(8);
      $query = $this->db->get()->result_array();
      // echo "page_high_count_visits";
      // print_r($query);
      return $query;
  }
}

/* End of file Ajax_Model.php */
/* Location: ./application/controllers/Ajax_Model.php */