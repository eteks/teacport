<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_data_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  /* ===========            State Model Start       ============ */

  // State - Add Edit Delete View
  public function state($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    $this->db->select('s.state_id');
    $this->db->from('tr_state s');
    $this->db->join('tr_district d','s.state_id=d.district_state_id','inner');
    $this->db->group_by('d.district_state_id');
    $model_data['mapped_data'] = array_column($this->db->get()->result_array(), 'state_id');

    // print_r($model_data['mapped_data']);
    // Update data
    if($status=='update') {
      $state_update_data = array( 
                              'state_name' => $this->input->post('s_name'),
                              'state_status' => $this->input->post('s_status')
                            );
      $state_update_where = '( state_id="'.$this->input->post('rid').'")'; 
      $this->db->set($state_update_data); 
      $this->db->where($state_update_where);
      $this->db->update("tr_state", $state_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $state_insert_data = array( 
                            'state_name' => $this->input->post('s_name'),
                            'state_status' => $this->input->post('s_status')
                          );
      $this->db->insert("tr_state", $state_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $state_delete_where = '(state_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_state", $state_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2; 
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }
    }

    // View
    $model_data['state_values'] = $this->db->order_by('state_id','desc')->get_where('tr_state')->result_array();

    return $model_data;
  }

  /* ===========            State Model End       ============ */

  /* ===========            District Model Start       ============ */

  // Districts - Add Edit Delete View
  public function districts($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $sql= $this->db->query("SELECT d.district_id from tr_district d INNER JOIN tr_candidate_profile c INNER JOIN tr_organization_profile o where c.candidate_district_id=d.district_id OR c.candidate_live_district_id=d.district_id OR o.organization_district_id=d.district_id GROUP BY d.district_id");
    $model_data['mapped_data'] = array_column($sql->result_array(), 'district_id');

    // Update data
    if($status=='update') {
      $district_get_where = "district_name =" . "'" . $this->input->post('d_name') . "' AND district_state_id =" . "'" . $this->input->post('d_state_name') . "' AND district_id NOT IN (". $this->input->post('rid').")";
      $district_get = $this->db->get_where('tr_district',$district_get_where);

      if($district_get -> num_rows() > 0) {
        $model_data['status'] = "Sorry, that District Name is already being used.";
        $model_data['error'] = 1;     
      }
      else {
        $district_update_data = array( 
                                    'district_name' => $this->input->post('d_name'),
                                    'district_state_id' => $this->input->post('d_state_name'),
                                    'district_status' => $this->input->post('d_status'),
                                  );
        $district_update_where = '(district_id="'.$this->input->post('rid').'")'; 
        $this->db->set($district_update_data); 
        $this->db->where($district_update_where);
        $this->db->update("tr_district", $district_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      }
    }

    // Save data
    else if($status=='save') {
      $district_get_where = '(district_name="'.$this->input->post('d_name').'" and district_state_id="'.$this->input->post('d_state_name').'")';
      $district_get = $this->db->get_where('tr_district',$district_get_where);

      if($district_get -> num_rows() > 0) {
        $model_data['status'] = "Sorry, that District Name is already being used.";
        $model_data['error'] = 1;     
      }
      else {
        $district_insert_data = array( 
                                      'district_name' => $this->input->post('d_name'),
                                      'district_state_id' => $this->input->post('d_state_name'),
                                      'district_status' => $this->input->post('d_status'),
                                  );
        $this->db->insert("tr_district", $district_insert_data); 
        $model_data['status'] = "Inserted Successfully";
        $model_data['error'] = 2;
      }
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $district_delete_data = '(district_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_district", $district_delete_data); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details";
      }  
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_district d');
    $this->db->join('tr_state s','d.district_state_id=s.state_id','inner');
    $this->db->order_by('d.district_id','desc');
    $model_data['districts_values'] = $this->db->get()->result_array();

    return $model_data;
  }

  /* ===========            District Model End       ============ */
  
  /* ===========            Institution Type Model Start       ============ */

  // Institution Type - Add Edit Delete View
  public function institution_type($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

     //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT i.institution_type_id
        FROM `tr_institution_type` AS i
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( a.posting_institution_id, ',', n.n ) , ',', -1 ) value
          FROM tr_applicable_posting a
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( a.posting_institution_id ) - LENGTH( REPLACE( a.posting_institution_id, ',', '' ) ) )
        )AS pos 
        INNER JOIN 
        (
          SELECT candidate_institution_type
          FROM tr_candidate_profile
        )AS pr 
        INNER JOIN 
        (
          SELECT class_level_inst_type_id
          FROM tr_class_level
        )AS cl
        INNER JOIN 
        (
          SELECT educational_qualifcation_inst_type_id
          FROM tr_educational_qualification
        )AS eq
        INNER JOIN 
        (
          SELECT organization_institution_type_id
          FROM tr_organization_profile
        )AS op
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( sub.subject_institution_id, ',', n.n ) , ',', -1 ) i_value
          FROM tr_subject sub
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( sub.subject_institution_id ) - LENGTH( REPLACE( sub.subject_institution_id, ',', '' ) ) )
        )AS sub_i where pos.value = i.institution_type_id OR pr.candidate_institution_type = i.institution_type_id OR cl.class_level_inst_type_id = i.institution_type_id OR eq.educational_qualifcation_inst_type_id = i.institution_type_id OR op.organization_institution_type_id = i.institution_type_id OR sub_i.i_value = i.institution_type_id group by i.institution_type_id");

    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'institution_type_id');

    // Update data
    if($status=='update') {
      $institution_update_data = array( 
                              'institution_type_name' => $this->input->post('i_name'),
                              'institution_type_status' => $this->input->post('i_status')
                            );
      $institution_update_where = '(institution_type_id="'.$this->input->post('rid').'")'; 
      $this->db->set($institution_update_data); 
      $this->db->where($institution_update_where);
      $this->db->update("tr_institution_type", $institution_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $institution_insert_data = array( 
                            'institution_type_name' => $this->input->post('i_name'),
                            'institution_type_status' => $this->input->post('i_status')
                          );
      $this->db->insert("tr_institution_type", $institution_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $institution_delete_where = '(institution_type_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_institution_type", $institution_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }
    }

    // View
    $model_data['institution_type_values'] = $this->db->order_by('institution_type_id','desc')->get_where('tr_institution_type')->result_array();

    return $model_data;
  }

  /* ===========            Institution Type Model End       ============ */

  /* ===========            Extra Curricular Model Start       ============ */

  // Extra Curricular - Add Edit Delete View
  public function extra_curricular($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT e.extra_curricular_id
      FROM `tr_extra_curricular` AS e
      INNER JOIN 
      (
        SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( c.candidate_id, ',', n.n ) , ',', -1 ) value
        FROM tr_candidate_profile c
        CROSS JOIN numbers n
        WHERE n.n <=1 + ( LENGTH( c.candidate_id ) - LENGTH( REPLACE( c.candidate_id, ',', '' ) ) )
      )AS cand where cand.value = e.extra_curricular_id group by e.extra_curricular_id");
    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'extra_curricular_id');

    // Update data
    if($status=='update') {
      $extrac_update_data = array( 
                              'extra_curricular' => $this->input->post('e_name'),
                              'extra_curricular_status' => $this->input->post('e_status')
                            );
      $extrac_update_where = '( extra_curricular_id="'.$this->input->post('rid').'")'; 
      $this->db->set($extrac_update_data); 
      $this->db->where($extrac_update_where);
      $this->db->update("tr_extra_curricular", $extrac_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $extrac_insert_data = array( 
                            'extra_curricular' => $this->input->post('e_name'),
                            'extra_curricular_status' => $this->input->post('e_status')
                          );
      $this->db->insert("tr_extra_curricular", $extrac_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $extrac_delete_where = '(extra_curricular_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_extra_curricular", $extrac_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }    
    }

    // View
    $model_data['extra_curricular_values'] = $this->db->order_by('extra_curricular_id','desc')->get_where('tr_extra_curricular')->result_array();

    return $model_data;
  }

  /* ===========            Extra Curricular Model End       ============ */

  /* ===========            Languages Model Start       ============ */

  // Languages - Add Edit Delete View
  public function languages($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT l.language_id
        FROM `tr_languages` AS l
        INNER JOIN 
        (
          SELECT candidate_mother_tongue,SUBSTRING_INDEX( SUBSTRING_INDEX( c.candidate_language_known, ',', n.n ) , ',', -1 ) c_value
          FROM tr_candidate_profile c
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( c.candidate_language_known ) - LENGTH( REPLACE( c.candidate_language_known, ',', '' ) ) )
        )AS can
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( v.vacancies_medium, ',', n.n ) , ',', -1 ) value
          FROM tr_organization_vacancies v
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( v.vacancies_medium ) - LENGTH( REPLACE( v.vacancies_medium, ',', '' ) ) )
        )AS vac 
        INNER JOIN 
        (
          SELECT candidate_medium_of_inst_id
          FROM tr_candidate_education
        )AS edu WHERE l.language_id=can.candidate_mother_tongue OR l.language_id=can.c_value OR l.language_id=vac.value OR l.language_id=edu.candidate_medium_of_inst_id group by l.language_id");

    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'language_id');

    // Update data
    if($status=='update') {
      $language_update_data = array( 
                                    'language_name' => $this->input->post('l_name'),
                                    'is_mother_tangue' => $this->input->post('l_mother_tongue'),
                                    'is_medium_of_instruction' => $this->input->post('l_instruction'),
                                    'language_status' => $this->input->post('l_status'),
                                  );
      $language_update_where = '(language_id="'.$this->input->post('rid').'")'; 
      $this->db->set($language_update_data); 
      $this->db->where($language_update_where);
      $this->db->update("tr_languages", $language_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $language_insert_data = array( 
                                      'language_name' => $this->input->post('l_name'),
                                      'is_mother_tangue' => $this->input->post('l_mother_tongue'),
                                      'is_medium_of_instruction' => $this->input->post('l_instruction'),
                                      'language_status' => $this->input->post('l_status'),
                                    );
      $this->db->insert("tr_languages", $language_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $language_delete_where = '(language_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_languages", $language_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }    
    }

    // View
    $model_data['language_values'] = $this->db->order_by('language_id','desc')->get('tr_languages')->result_array();

    return $model_data;
  }

  /* ===========            Languages Model End       ============ */

  /* ===========            Qualification Model Start       ============ */

  // Qualification Type - Add Edit Delete View
  public function qualification_type($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT edu.educational_qualification_id
        FROM `tr_educational_qualification` AS edu
        INNER JOIN 
        (
          SELECT candidate_education_qualification_id
          FROM tr_candidate_education
        )AS can_edu
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( d.department_educational_qualification_id, ',', n.n ) , ',', -1 ) d_value
          FROM tr_departments d
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( d.department_educational_qualification_id ) - LENGTH( REPLACE( d.department_educational_qualification_id, ',', '' ) ) )
        )AS dep
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( v.vacancies_qualification_id, ',', n.n ) , ',', -1 ) v_value
          FROM tr_organization_vacancies v
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( v.vacancies_qualification_id ) - LENGTH( REPLACE( v.vacancies_qualification_id, ',', '' ) ) )
        )AS vac WHERE edu.educational_qualification_id=can_edu.candidate_education_qualification_id OR edu.educational_qualification_id=dep.d_value OR edu.educational_qualification_id=vac.v_value group by edu.educational_qualification_id");

    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'educational_qualification_id');

    // Update data
    if($status=='update') {
      // $qualification_get_where = '(educational_qualification="'.$this->input->post('educational_qualification').'" and educational_qualification_course_type="'.$this->input->post('educational_qualification_course_type').'")';
      if($this->input->post('q_course_type')) {
        $qualification_get_where = "educational_qualification =" . "'" . $this->input->post('q_name') . "' AND educational_qualification_course_type =" . "'" . $this->input->post('q_course_type') . "' AND educational_qualifcation_inst_type_id =" . "'" . $this->input->post('q_inst_type') . "' AND educational_qualification_id NOT IN (". $this->input->post('rid').")";
      }
      else {
        $qualification_get_where = "educational_qualification =" . "'" . $this->input->post('q_name') . "' AND educational_qualifcation_inst_type_id =" . "'" . $this->input->post('q_inst_type') . "' AND educational_qualification_id NOT IN (". $this->input->post('rid').")";
      }
      $qualification_get = $this->db->get_where('tr_educational_qualification',$qualification_get_where);
      if($qualification_get -> num_rows() > 0) {
        $model_data['status'] = "Sorry, that Educational Qualification is already being used.";
        $model_data['error'] = 1;     
      }
      else {
        $qualification_update_data = array( 
                                    'educational_qualification' => $this->input->post('q_name'),
                                    'educational_qualification_course_type' => ($this->input->post('q_course_type')) ? $this->input->post('q_course_type') : NULL,
                                    'educational_qualifcation_inst_type_id' => $this->input->post('q_inst_type'),
                                    'educational_qualification_status' => $this->input->post('q_status'),
                                  );
        $qualification_update_where = '(educational_qualification_id="'.$this->input->post('rid').'")'; 
        $this->db->set($qualification_update_data); 
        $this->db->where($qualification_update_where);
        $this->db->update("tr_educational_qualification", $qualification_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      }
    }

    // Save data
    else if($status=='save') {
      if($this->input->post('q_course_type')) {
        $qualification_get_where = '(educational_qualification="'.$this->input->post('q_name').'" and educational_qualification_course_type="'.$this->input->post('q_course_type').'" and educational_qualifcation_inst_type_id="'.$this->input->post('q_inst_type').'")';
      }
      else {
        $qualification_get_where = '(educational_qualification="'.$this->input->post('q_name').'" and educational_qualifcation_inst_type_id="'.$this->input->post('q_inst_type').'")';
      }     
      $qualification_get = $this->db->get_where('tr_educational_qualification',$qualification_get_where);

      if($qualification_get -> num_rows() > 0) {
        $model_data['status'] = "Sorry, that Educational Qualification is already being used.";
        $model_data['error'] = 1;     
      }
      else {
        $qualification_insert_data = array( 
                                      'educational_qualification' => $this->input->post('q_name'),
                                      'educational_qualification_course_type' => ($this->input->post('q_course_type')) ? $this->input->post('q_course_type') : NULL,
                                      'educational_qualifcation_inst_type_id' => $this->input->post('q_inst_type'),
                                      'educational_qualification_status' => $this->input->post('q_status'),
                                    );
        $this->db->insert("tr_educational_qualification", $qualification_insert_data); 
        $model_data['status'] = "Inserted Successfully";
        $model_data['error'] = 2;
      }
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $qualification_delete_where = '(educational_qualification_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_educational_qualification", $qualification_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      } 
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_educational_qualification eq');
    $this->db->join('tr_institution_type it','eq.educational_qualifcation_inst_type_id=it.institution_type_id','inner');
    $model_data['qualification_type_values'] = $this->db->order_by('eq.educational_qualification_id','desc')->get()->result_array();

    return $model_data;
  }

  /* ===========            Qualification Model End       ============ */

  /* ===========            Class Level Model Start       ============ */

   // Class Level - Add Edit Delete View
  public function class_level($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT class.class_level_id
        FROM `tr_class_level` AS class
        INNER JOIN 
        (
          SELECT candidate_experience_class_level_id
          FROM tr_candidate_experience
        )AS exp
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( p.candidate_willing_class_level_id, ',', n.n ) , ',', -1 ) p_value
          FROM tr_candidate_preferance p
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( p.candidate_willing_class_level_id ) - LENGTH( REPLACE( p.candidate_willing_class_level_id, ',', '' ) ) )
        )AS pre
        INNER JOIN 
        (
          SELECT vacancies_class_level_id
          FROM tr_organization_vacancies
        )AS vac
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( ub.university_class_level_id, ',', n.n ) , ',', -1 ) ub_value
          FROM tr_university_board ub
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( ub.university_class_level_id ) - LENGTH( REPLACE( ub.university_class_level_id, ',', '' ) ) )
        )AS uni WHERE class.class_level_id=exp.candidate_experience_class_level_id OR class.class_level_id=pre.p_value OR class.class_level_id=vac.vacancies_class_level_id OR class.class_level_id=uni.ub_value group by class.class_level_id");

    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'class_level_id');

    // Update data
    if($status=='update') {
      $class_level_get_where = "class_level =" . "'" . $this->input->post('c_name') . "' AND class_level_inst_type_id =" . "'" . $this->input->post('c_inst_type') . "' AND class_level_id NOT IN (". $this->input->post('rid').")";
      $class_level_get = $this->db->get_where('tr_class_level',$class_level_get_where);
      if($class_level_get -> num_rows() > 0) {
        $model_data['status'] = "Sorry, that Class Level is already being used.";
        $model_data['error'] = 1;     
      }
      else {
        $class_level_update_data = array( 
                                    'class_level' => $this->input->post('c_name'),
                                    'class_level_inst_type_id' => $this->input->post('c_inst_type'),
                                    'class_level_status' => $this->input->post('c_status'),
                                  );
        $class_level_update_where = '(class_level_id="'.$this->input->post('rid').'")'; 
        $this->db->set($class_level_update_data); 
        $this->db->where($class_level_update_where);
        $this->db->update("tr_class_level", $class_level_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      }
    }

    // Save data
    else if($status=='save') {
      $class_level_get_where = '(class_level="'.$this->input->post('c_name').'" and class_level_inst_type_id="'.$this->input->post('c_inst_type').'")';
      $class_level_get = $this->db->get_where('tr_class_level',$class_level_get_where);

      if($class_level_get -> num_rows() > 0) {
        $model_data['status'] = "Sorry, that Class Level is already being used.";
        $model_data['error'] = 1;     
      }
      else {
        $class_level_insert_data = array( 
                                      'class_level' => $this->input->post('c_name'),
                                      'class_level_inst_type_id' => $this->input->post('c_inst_type'),
                                      'class_level_status' => $this->input->post('c_status'),
                                  );
        $this->db->insert("tr_class_level", $class_level_insert_data); 
        $model_data['status'] = "Inserted Successfully";
        $model_data['error'] = 2;
      }
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $class_level_delete_where = '(class_level_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_class_level", $class_level_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      } 
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_class_level cl');
    $this->db->join('tr_institution_type it','cl.class_level_inst_type_id=it.institution_type_id','inner');
    $this->db->order_by('cl.class_level_id','desc');
    $model_data['class_level_values'] = $this->db->get()->result_array();

    return $model_data;
  }

  /* ===========            Class Level Model End       ============ */

  /* ===========            Departments Model Start       ============ */

  // Departments - Add Edit Delete View
  public function departments($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT dep.departments_id
        FROM `tr_departments` AS dep
        INNER JOIN 
        (
          SELECT candidate_education_department_id
          FROM tr_candidate_education
        )AS can_edu
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( v.vacancies_department_id, ',', n.n ) , ',', -1 ) v_value
          FROM tr_organization_vacancies v
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( v.vacancies_department_id ) - LENGTH( REPLACE( v.vacancies_department_id, ',', '' ) ) )
        )AS vac WHERE dep.departments_id=can_edu.candidate_education_department_id OR dep.departments_id=vac.v_value group by dep.departments_id");

    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'departments_id');

    // Update data
    if($status=='update') {
      $departments_update_data = array( 
                              'departments_name' => $this->input->post('d_name'),
                              'department_educational_qualification_id' => $this->input->post('d_qualification'),
                              'departments_status' => $this->input->post('d_status'),
                            );
      $departments_update_where = '(departments_id="'.$this->input->post('rid').'")'; 
      $this->db->set($departments_update_data); 
      $this->db->where($departments_update_where);
      $this->db->update("tr_departments", $departments_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $departments_insert_data = array( 
                            'departments_name' => $this->input->post('d_name'),
                            'department_educational_qualification_id' => $this->input->post('d_qualification'),
                            'departments_status' => $this->input->post('d_status'),
                          );
      $this->db->insert("tr_departments", $departments_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $departments_delete_where = '(departments_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_departments", $departments_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }
    }

    // View
    $departments_list_query = $this->db->query("SELECT * FROM tr_educational_qualification AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.department_educational_qualification_id, ',', n.n ) , ',', -1 ) value FROM tr_departments t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.department_educational_qualification_id ) - LENGTH( REPLACE( t.department_educational_qualification_id, ',', ''))) ) AS a ON a.value = c.educational_qualification_id order by (a.departments_id) desc");
    $model_data['departments_values'] = $departments_list_query->result_array(); 

    return $model_data;
  }

  /* ===========            Departments Model End       ============ */

  /* ===========            Subjects Model Start       ============ */

  // Subjects - Add Edit Delete View
  public function subjects($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT sub.subject_id
        FROM `tr_subject` AS sub
        INNER JOIN 
        (
          SELECT candidate_experience_subject_id
          FROM tr_candidate_experience
        )AS exp
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( p.candidate_willing_subject_id, ',', n.n ) , ',', -1 ) p_value
          FROM tr_candidate_preferance p
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( p.candidate_willing_subject_id ) - LENGTH( REPLACE( p.candidate_willing_subject_id, ',', '' ) ) )
        )AS pre
        INNER JOIN 
        (
          SELECT candidate_interest_subject_id
          FROM tr_candidate_profile
        )AS pro
        INNER JOIN 
        (
          SELECT vacancies_subject_id
          FROM tr_organization_vacancies
        )AS vac WHERE sub.subject_id=exp.candidate_experience_subject_id OR sub.subject_id=pre.p_value OR sub.subject_id=pro.candidate_interest_subject_id OR sub.subject_id=vac.vacancies_subject_id group by sub.subject_id");

    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'subject_id');

    // Update data
    if($status=='update') {
      $subjects_update_data = array( 
                                'subject_name' => $this->input->post('s_name'),
                                'subject_institution_id' => $this->input->post('s_inst_type'),
                                'subject_status' => $this->input->post('s_status'),
                              );
      $subjects_update_where = '(subject_id="'.$this->input->post('rid').'")'; 
      $this->db->set($subjects_update_data); 
      $this->db->where($subjects_update_where);
      $this->db->update("tr_subject", $subjects_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $subjects_insert_data = array( 
                            'subject_name' => $this->input->post('s_name'),
                            'subject_institution_id' => $this->input->post('s_inst_type'),
                            'subject_status' => $this->input->post('s_status'),
                          );
      $this->db->insert("tr_subject", $subjects_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $subjects_delete_where = '(subject_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_subject", $subjects_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }
    }

    // View
    $subjects_list_query = $this->db->query("SELECT * FROM tr_institution_type AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.subject_institution_id, ',', n.n ) , ',', -1 ) value FROM tr_subject t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.subject_institution_id ) - LENGTH( REPLACE( t.subject_institution_id, ',', ''))) ) AS a ON a.value = c.institution_type_id order by (a.subject_id) desc");
    $model_data['subject_values'] = $subjects_list_query->result_array();  

    return $model_data;
  }

  /* ===========            Subjects Model End       ============ */

  /* ===========            Universities Model Start       ============ */

  // Universities - Add Edit Delete View
  public function universities($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $sql= $this->db->query("SELECT ub.education_board_id from tr_university_board ub INNER JOIN tr_organization_vacancies vac INNER JOIN tr_candidate_education edu INNER JOIN tr_candidate_experience exp where ub.education_board_id=vac.vacancies_university_board_id OR ub.education_board_id=edu.candidate_edu_board OR ub.education_board_id=exp.candidate_experience_board GROUP BY ub.education_board_id");
    $model_data['mapped_data'] = array_column($sql->result_array(), 'education_board_id');

    // Update data
    if($status=='update') {
      $universities_update_data = array( 
                              'university_board_name' => $this->input->post('u_name'),
                              'university_class_level_id' => $this->input->post('u_class_level'),
                              'university_board_status' => $this->input->post('u_status'),
                            );
      $universities_update_where = '(education_board_id="'.$this->input->post('rid').'")'; 
      $this->db->set($universities_update_data); 
      $this->db->where($universities_update_where);
      $this->db->update("tr_university_board", $universities_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $universities_insert_data = array( 
                            'university_board_name' => $this->input->post('u_name'),
                            'university_class_level_id' => $this->input->post('u_class_level'),
                            'university_board_status' => $this->input->post('u_status'),
                          );
      $this->db->insert("tr_university_board", $universities_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $universities_delete_data = '(education_board_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_university_board", $universities_delete_data); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }
    }

    // View
    $universities_list_query = $this->db->query("SELECT * FROM tr_class_level AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.university_class_level_id, ',', n.n ) , ',', -1 ) value FROM tr_university_board t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.university_class_level_id ) - LENGTH( REPLACE( t.university_class_level_id, ',', ''))) ) AS a ON a.value = c.class_level_id order by (a.education_board_id) desc");
    $model_data['universities_values'] = $universities_list_query->result_array(); 

    return $model_data;
  }

  /* ===========            Universities Model End       ============ */

  /* ===========            Postings Model Start       ============ */

  // Postings - Add Edit Delete View
  public function postings($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    //Check whether the data is mapped or not
    $mapped_data = $this->db->query("SELECT pos.posting_id
        FROM `tr_applicable_posting` AS pos
        INNER JOIN 
        (
          SELECT SUBSTRING_INDEX( SUBSTRING_INDEX( p.candidate_preferance_id, ',', n.n ) , ',', -1 ) p_value
          FROM tr_candidate_preferance p
          CROSS JOIN numbers n
          WHERE n.n <=1 + ( LENGTH( p.candidate_preferance_id ) - LENGTH( REPLACE( p.candidate_preferance_id, ',', '' ) ) )
        )AS pre
        INNER JOIN 
        (
          SELECT vacancies_id
          FROM tr_organization_vacancies
        )AS vac WHERE pos.posting_id=pre.p_value OR pos.posting_id=vac.vacancies_id group by pos.posting_id");

    $model_data['mapped_data'] = array_column($mapped_data->result_array(), 'posting_id');

    // Update data
    if($status=='update') {
      $postings_update_data = array( 
                              'posting_name' => $this->input->post('p_name'),
                              'posting_institution_id' => $this->input->post('p_inst_type'),
                              'posting_status' => $this->input->post('p_status'),
                            );
      $postings_update_where = '(posting_id="'.$this->input->post('rid').'")'; 
      $this->db->set($postings_update_data); 
      $this->db->where($postings_update_where);
      $this->db->update("tr_applicable_posting", $postings_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $postings_insert_data = array( 
                            'posting_name' => $this->input->post('p_name'),
                            'posting_institution_id' => $this->input->post('p_inst_type'),
                            'posting_status' => $this->input->post('p_status'),
                          );
      $this->db->insert("tr_applicable_posting", $postings_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      if(!in_array($this->input->post('rid'),$model_data['mapped_data'])) {
        $postings_delete_data = '(posting_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_applicable_posting", $postings_delete_data); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
      }
      else {
        $model_data['error'] = 1;
        $model_data['status'] = "Something went wrong. Please try again with correct details ";
      }   
    }

    // View
    $postings_list_query = $this->db->query("SELECT * FROM tr_institution_type AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.posting_institution_id, ',', n.n ) , ',', -1 ) value FROM tr_applicable_posting t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.posting_institution_id ) - LENGTH( REPLACE( t.posting_institution_id, ',', ''))) ) AS a ON a.value = c.institution_type_id order by (a.posting_id) desc");
    $model_data['postings_values'] = $postings_list_query->result_array(); 

    return $model_data;
  }

  /* ===========            Postings Model End       ============ */



}

/* End of file Master_Data_Model.php */
/* Location: ./application/controllers/Master_Data_Model.php */