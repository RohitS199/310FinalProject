$(document).ready(function(){
	$('#commentsTable').Tabledit({
		deleteButton: true,
		editButton: true,   		
		columns: {
		  identifier: [0, 'comment_id'],                    
		  editable: [[1, 'user_id'], [2, 'course_name'], [3, 'letterGrade'],[4, 'comment'], [5, 'professor_id']]
		},
		hideIdentifier: false,
		url: 'save_edit/save_edit_comment.php'		
	});

	$('#usersTable').Tabledit({
		deleteButton: true,
		editButton: true,   		
		columns: {
		  identifier: [0, 'user_id'],                    
		  editable: [[1, 'firstName'], [2, 'lastName'], [3, 'email'],[4, 'phone_number'], [5, 'gradYear'], [6, 'major'], [7, 'classifications'], [8, 'password'], [9, 'userType'], [10, 'userName']]
		},
		hideIdentifier: false,
		url: 'save_edit/save_edit_user.php'		
	});

	$('#professorsTable').Tabledit({
		deleteButton: true,
		editButton: true,   		
		columns: {
		  identifier: [0, 'professor_id'],                    
		  editable: [[1, 'firstName'], [2, 'lastName'], [3, 'email'],[4, 'phone_number'], [5, 'officeLocation'], [6, 'yearsatSchool'], [7, 'password']]
		},
		hideIdentifier: false,
		url: 'save_edit/save_edit_professor.php'		
	});

	$('#classesTable').Tabledit({
		deleteButton: true,
		editButton: true,   		
		columns: {
		  identifier: [0, 'class_id'],                    
		  editable: [[1, 'course_name'], [2, 'course_description']]
		},
		hideIdentifier: false,
		url: 'save_edit/save_edit_class.php'		
	});
});