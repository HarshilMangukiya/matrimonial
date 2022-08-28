<?php
use Illuminate\Support\Carbon;


//- used static value with id
	//- occupation
		// 1: Private Job
		// 2: Government Job
		// 3: Business
	
	//- Gender
		// 1: Male
		// 2: Female
		// 3: Other

	//- Family Type
		// 1: Joint Family
		// 2: Nuclear Family

	//- Manglik
		// 1: Yes
		// 2 : No

		
function successRes($msg = "Success", $statusCode = 200) {
	$return = array();
	$return['status'] = 1;
	$return['status_code'] = $statusCode;
	$return['msg'] = $msg;
	return $return;
}

function errorRes($msg = "Error", $statusCode = 400) {
	$return = array();
	$return['status'] = 0;
	$return['status_code'] = $statusCode;
	$return['msg'] = $msg;
	return $return;
}

//- convert date Year month date to date month year format
function dateDMYFormat($date){
    return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
}

//- convert date date month year to Year month date format
function dateYMDFormat($date){
    return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
}
