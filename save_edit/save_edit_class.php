<?php

include_once("../config.php");
$input = filter_input_array(INPUT_POST);
	
if ($input['action'] == 'edit') {	
	$updateField='';
	if(isset($input['course_name'])) {
		$updateField.= "course_name='".$input['course_name']."',";
    }
    if(isset($input['course_description'])) {
		$updateField.= "course_description='".$input['course_description']."',";
	} 
	
    $updateField = substr($updateField, 0, -1);
	if($updateField && $input['class_id']) {
      
	    $sqlQuery = "UPDATE class SET $updateField WHERE class_id='" . $input['class_id'] . "'";	
		mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));		
	}
}
if ($input['action'] == 'delete') {
	$sqlQuery = "DELETE FROM class WHERE class_id= '".$input['class_id']."'";
	mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));
    		
}


?>

