<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_user_details')){
   function get_user_details(){
   	return true;
   }
}
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
				   	if($k == 'vacancies_job_title' || $k == 'organization_name' || $k == 'vacancies_available' || $k == 'vacancies_open_date' || $k == 'vacancies_close_date' || $k == 'vacancies_start_salary' || $k == 'vacancies_end_salary' || $k == 'vacancies_status' || $k == 'vacancies_experience' || $k == 'vacancies_class_level_id' || $k == 'vacancies_university_board_id' || $k == 'vacancies_subject_id' || $k == 'class_level' || $k == 'university_board_name' || $k == 'subject_name' || $k == 'vacancies_medium' || $k == 'vacancies_accommodation_info' || $k == 'vacancies_instruction' || $k == 'vacancies_interview_start_date' || $k == 'vacancies_end_date') {
	     				$out[$row['vacancies_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		return $out;
	}
}