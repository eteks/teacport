<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------------------------
// Admin Panel Custom Helper functions which is called in both views and controllers
// --------------------------------------------------------------------------------------

if ( ! function_exists('get_qualication_by_dept')){
	// Get qualification by department
	function get_qualication_by_dept($value) 
	{	
		$out = array();
		if(!empty($value)) {
			foreach ($value as $key => $row) {
				foreach ($row as $k => $r) {
					if(!isset($out[$row['departments_id']][$row['educational_qualification_id']]))
					{
						$out[$row['departments_id']]['educational_qualification_id'][$row['educational_qualification_id']] = $row['educational_qualification'];
				   	}
				   	if($k == 'departments_name' || $k == 'departments_status' || $k == 'departments_created_date' || $k == 'department_educational_qualification_id' ) {
	     				$out[$row['departments_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		return $out;
	}
}

if ( ! function_exists('get_institution_by_dept')){
	// Get institution type by subject
	function get_institution_by_dept($value) 
	{
		$out = array();
		if(!empty($value)) {
			foreach ($value as $key => $row) {
				foreach ($row as $k => $r) {
					if(!isset($out[$row['subject_id']][$row['institution_type_id']]))
					{
						$out[$row['subject_id']]['institution_type_id'][$row['institution_type_id']] = $row['institution_type_name'];
				   	}
				   	if($k == 'subject_name' || $k == 'subject_status' || $k == 'subject_create_date' || $k == 'subject_institution_id' ) {
	     				$out[$row['subject_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		return $out;
	}
}

if ( ! function_exists('get_class_level_by_dept')){
	// Get institution type by subject
	function get_class_level_by_dept($value) 
	{
		$out = array();
		if(!empty($value)) {
			foreach ($value as $key => $row) {
				foreach ($row as $k => $r) {
					if(!isset($out[$row['education_board_id']][$row['class_level_id']]))
					{
						$out[$row['education_board_id']]['class_level_id'][$row['class_level_id']] = $row['class_level'];
				   	}
				   	if($k == 'university_board_name' || $k == 'university_board_status' || $k == 'university_board_created_date' || $k == 'university_class_level_id' ) {
	     				$out[$row['education_board_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		return $out;
	}
}

// Split institution type for postings
if ( ! function_exists('get_institution_by_postname')){
	// Get institution type by subject
	function get_institution_by_postname($value) 
	{
		$out = array();
		if(!empty($value)) {
			foreach ($value as $key => $row) {
				foreach ($row as $k => $r) {
					if(!isset($out[$row['posting_id']][$row['institution_type_id']]))
					{
						$out[$row['posting_id']]['institution_type_id'][$row['institution_type_id']] = $row['institution_type_name'];
				   	}
				   	if($k == 'posting_name' || $k == 'posting_status' || $k == 'posting_created_date' || $k == 'posting_institution_id' ) {
	     				$out[$row['posting_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		return $out;
	}
}

if ( ! function_exists('get_provider_vacancy_by_qua')){
	// Get institution type by subject
	function get_provider_vacancy_by_qua($value) 
	{
		$out = array();
		if(!empty($value)) {
			foreach ($value as $key => $row) {
				foreach ($row as $k => $r) {
					if(!isset($out[$row['vacancies_id']][$row['educational_qualification_id']]))
					{
						$out[$row['vacancies_id']]['educational_qualification_id'][$row['educational_qualification_id']] = $row['educational_qualification'];
				   	}
				   	if($k == 'vacancies_job_title' || $k == 'organization_name' || $k == 'vacancies_available' || $k == 'vacancies_open_date' || $k == 'vacancies_close_date' || $k == 'vacancies_start_salary' || $k == 'vacancies_end_salary' || $k == 'vacancies_status' || $k == 'vacancies_experience' || $k == 'vacancies_class_level_id' || $k == 'vacancies_university_board_id' || $k == 'vacancies_subject_id' || $k == 'class_level' || $k == 'university_board_name' || $k == 'subject_name' || $k == 'vacancies_medium' || $k == 'vacancies_accommodation_info' || $k == 'vacancies_instruction' || $k == 'vacancies_interview_start_date' || $k == 'vacancies_end_date' || $k == 'vacancies_organization_id' || $k == 'vacancies_department_id' || $k == 'departments_name' || $k == 'vacancies_applicable_posting_id' || $k == 'posting_name') {
	     				$out[$row['vacancies_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		return $out;
	}
}

if ( ! function_exists('get_privileges')){
	function get_privileges($mapped_privileges,$module_id,$operation){
	  	$results =  array_filter($mapped_privileges,function($value) use($module_id,$operation){
		    $value[1] = is_array($value[1])?$value[1]:explode(",",$value[1]); 
		    $value[0] = is_array($value[0])?$value[0]:(array)$value[0];
		    $result1 = in_array($operation,$value[1]);
		    $result2 = in_array($module_id,$value[0]); 
		    return $result1 && $result2;
		});
		return $results;
	}
}

if ( ! function_exists('recursiveFind')){
	function recursiveFind(array $array, $needle)
	{
	    $iterator  = new RecursiveArrayIterator($array);
	    $recursive = new RecursiveIteratorIterator(
	        $iterator,
	        RecursiveIteratorIterator::SELF_FIRST
	    );
	    foreach ($recursive as $key => $value) {
	        if ($value === $needle) {
	            return true;
	        }
	    }
	}
}

if ( ! function_exists('get_cand_pref_pcs')){
	// Get institution type by subject
	function get_cand_pref_pcs($value) 
	{
		$out = array();
		if(!empty($value)) {
			foreach ($value as $key => $row) {
				foreach ($row as $k => $r) {
					if(!isset($out[$row['candidate_preferance_id']][$row['posting_id']]))
					{
						$out[$row['candidate_preferance_id']]['posting_values'][$row['posting_id']] = $row['posting_name'];
				   	}
				   	if(!isset($out[$row['candidate_preferance_id']][$row['class_level_id']]))
					{
						$out[$row['candidate_preferance_id']]['class_values'][$row['class_level_id']] = $row['class_level'];
				   	}
				   	if(!isset($out[$row['candidate_preferance_id']][$row['subject_id']]))
					{
						$out[$row['candidate_preferance_id']]['subject_values'][$row['subject_id']] = $row['subject_name'];
				   	}
				   	if($k == 'candidate_name' || $k == 'candidate_expecting_start_salary' || $k == 'candidate_profile_id' || $k == 'candidate_expecting_end_salary' || $k == 'candidate_posting_applied_for' || $k == 'candidate_willing_class_level_id' || $k == 'candidate_willing_subject_id')
					{
						$out[$row['candidate_preferance_id']][$k] = $row[$k];
				   	}

			    }
			}
		}
		return $out;
	}
}

// Job provider profile - subscription
if ( ! function_exists('get_provider_subscription')){
	function get_provider_subscription($value) 
	{
		$out = array();
    	if(!empty($value)) {
      	foreach ($value as $key => $row) {
        	foreach ($row as $k => $r) {
          		if($k=='upgrade_or_renewal_id' || $k=='organization_upgrade_id' || $k=='validity_start_date' || $k=='validity_end_date' || $k=='transaction_id' || $k=='created_date' || $k=='status') {
            			if(!isset($out[$row['organization_subscription_id']][$row['upgrade_or_renewal_id']]))
				        {
			            	$out[$row['organization_subscription_id']]['upgrade_renewal'][$row['upgrade_or_renewal_id']][$k] = $row[$k];
				        }
          			}
          			else {
            			$out[$row['organization_subscription_id']][$k] = $row[$k];
          			}
        		}
      		}
    	}
		return $out;
	}
}