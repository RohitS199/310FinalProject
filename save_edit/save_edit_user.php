<?php

include_once("../config.php");
$input = filter_input_array(INPUT_POST);
	
if ($input['action'] == 'edit') {	
	$updateField='';
	if(isset($input['firstName'])) {
		$updateField.= "firstName='".$input['firstName']."',";
    }
    if(isset($input['lastName'])) {
		$updateField.= "lastName='".$input['lastName']."',";
	} 
	if(isset($input['email'])) {
		$updateField.= "email='".$input['email']."',";
	} 
	if(isset($input['phone_number'])) {
		$updateField.= "phone_number='".$input['phone_number']."',";
	}
	if(isset($input['gradYear'])) {
		$updateField.= "gradYear='".$input['gradYear']."',";
	}
	if(isset($input['major'])) {
		$updateField.= "major='".$input['major']."',";
	} 
	if(isset($input['classifications'])) {
		$updateField.= "classifications='".$input['classifications']."',";
	} 
	if(isset($input['password'])) {
		$updateField.= "password='".$input['password']."',";
	}
	if(isset($input['userType'])) {
		$updateField.= "userType='".$input['userType']."',";
	}
	if(isset($input['userName'])) {
		$updateField.= "userName='".$input['userName']."',";
	}
    $updateField = substr($updateField, 0, -1);
	if($updateField && $input['user_id']) {
      
	    $sqlQuery = "UPDATE users SET $updateField WHERE user_id='" . $input['user_id'] . "'";	
		mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));		
	}
}
if ($input['action'] == 'delete') {
	$sqlQuery = "DELETE FROM users WHERE user_id= '".$input['user_id']."'";
	mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));		
}


?>

