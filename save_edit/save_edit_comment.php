<?php

include_once("../config.php");
$input = filter_input_array(INPUT_POST);
	
if ($input['action'] == 'edit') {	
	$updateField='';
	if(isset($input['comment'])) {
		$updateField.= "comment='".$input['comment']."',";
    }
    if(isset($input['user_id'])) {
		$updateField.= "user_id='".$input['user_id']."',";
	} 
	if(isset($input['letterGrade'])) {
		$updateField.= "letterGrade='".$input['letterGrade']."',";
	} 
	if(isset($input['course_name'])) {
		$updateField.= "course_name='".$input['course_name']."',";
	}
	if(isset($input['professor_id'])) {
		$updateField.= "professor_id='".$input['professor_id']."',";
	}
    $updateField = substr($updateField, 0, -1);
	if($updateField && $input['comment_id']) {
      
	    $sqlQuery = "UPDATE comment SET $updateField WHERE comment_id='" . $input['comment_id'] . "'";	
		mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));		
	}
}
if ($input['action'] == 'delete') {
	$sqlQuery = "DELETE FROM comment WHERE comment_id= '".$input['comment_id']."'";
	mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));		
}


?>

