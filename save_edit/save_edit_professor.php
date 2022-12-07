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
	if(isset($input['officeLocation'])) {
		$updateField.= "officeLocation='".$input['officeLocation']."',";
	}
	if(isset($input['yearsatSchool'])) {
		$updateField.= "yearsatSchool='".$input['yearsatSchool']."',";
	} 
	if(isset($input['password'])) {
		$updateField.= "password='".$input['password']."',";
	} 
	
    $updateField = substr($updateField, 0, -1);
	if($updateField && $input['professor_id']) {
      
	    $sqlQuery = "UPDATE professor SET $updateField WHERE professor_id='" . $input['professor_id'] . "'";	
		mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));		
	}
}
if ($input['action'] == 'delete') {
	$sqlQuery = "DELETE FROM professor WHERE professor_id= '".$input['professor_id']."'";
	mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));		
}


?>

