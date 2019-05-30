<?php
function asset_url($url) {
	return base_url('assets/' . $url);
}


if(!function_exists('date_formats')){
 function date_formats($date)
   {
	return date('d-m-Y',strtotime($date));
	
   }
}


if(!function_exists('month_format')){
 function month_format($date)
   {
	return date('M',strtotime($date));
	
   }
}


if(!function_exists('day_format')){
 function day_format($date)
   {
	return date('d',strtotime($date));
	
   }
}


if(!function_exists('count_data')){
	function count_data($tbl_name,$cond){
		$CI = & get_instance();
		if($cond!=false){
			$CI->db->where($cond);
		}
		$get_fields = $CI->db->get($tbl_name);
		$count = $get_fields->num_rows();
		return $count;
	}
}

if(!function_exists('check_exist_name')){
	function check_exist_name($tbl_name,$cond){
		$CI =& get_instance();
		$CI->db->where($cond);
		$get_fields  = $CI->db->get($tbl_name);
		return  $get_fields->num_rows();	
	}	
}

if(!function_exists('userdata')){
	function userdata($tbl_name,$cond){
		$CI =& get_instance();
		$CI->db->where($cond);
		$get_fields  = $CI->db->get($tbl_name);
		return  $get_fields->row();
	}
}