<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------------------------
// Admin Panel Custom Helper functions which is called in both views and controllers
// --------------------------------------------------------------------------------------

if ( ! function_exists('cron_related_vacancy')) {
	// Get qualification by department
	function cron_related_vacancy($value) 
	{	
		$out = array();
		if(!empty($value)) {
			foreach ($value as $key => $row) {
	        	foreach ($row as $k => $r) {
	          		if($k=='vacancies_job_title' || $k=='vacancies_start_salary' || $k=='vacancies_end_salary' || $k=='vacancy_type' || $k=='vacancies_applicable_posting_id' || $k=='organization_name') {
	        			if(!isset($out[$row['candidate_id']][$row['vacancies_id']]))
				        {
			            	$out[$row['candidate_id']]['vacancy_details'][$row['vacancies_id']][$k] = $row[$k];
				        }
	      			}
	      			else if($k=='candidate_id' || $k=='candidate_name' || $k=='candidate_email' || $k == "candidate_posting_applied_for" ){
	        			$out[$row['candidate_id']][$k] = $row[$k];
	      			}
	    		}
	  		}
	  	}
		return $out;
	}
}