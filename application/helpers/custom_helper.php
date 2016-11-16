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
				   	if($k == 'departments_name' || $k == 'departments_status' || $k == 'departments_created_date' ) {
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
				   	if($k == 'subject_name' || $k == 'subject_status' || $k == 'subject_create_date' ) {
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
				   	if($k == 'university_board_name' || $k == 'university_board_status' || $k == 'university_board_created_date' ) {
	     				$out[$row['education_board_id']][$k] = $row[$k];
	     			}
			    }
			}
		}
		return $out;
	}
}