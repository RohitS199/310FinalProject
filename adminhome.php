<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="mainStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="jquery/jquery.tabledit.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- <script type="text/javascript" src="custom_table_edit.js"></script> -->
    </head>


    <div class="custom_navbar">
        <a href="/logout.php"><div>Logout</div></a>
        <a href="/addclass.php"><div>Add Class</div></a>
    </div>
    <script type="text/javascript" src="js/edittable.js"></script>

<body>  

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Home</h1>
                <h2>Welcome <?php 
                    session_start();
                    $username = $_SESSION['username'];
                    $user_id = $_SESSION['userid'];
                    echo $user_id;
                    echo $username;
                ?> !</h2>
                <h2>Here, you can manage users, professors, classes, and comments</h2>
            </div>
        </div>
    </div>
    
    <div class="container">
    <h1 class="text-center">Users</h1>
	<table id="usersTable" class="table table-bordered table-responsive-md table-striped text-center">
		<thead>
			<tr>
                <th>User ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone Number</th>
                <th>Grad Year</th>
                <th>Major</th>
                <th>Classifications</th>
                <th>Password</th>
                <th>User Type</th>
                <th>Username</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include_once("config.php");
            if($db === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
			$sqlQuery = "SELECT user_id, firstName, lastName, email, phone_number, gradYear, major, classifications, password, userType, userName FROM users";
			$result = mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));
            if ($result->num_rows > 0) {

			while( $row = mysqli_fetch_assoc($result) ) {
			?>
			   <tr id="<?php echo $row ['user_id']; ?>">
			    <td><?php echo $row ['user_id']; ?></td>
			    <td><?php echo $row ['firstName']; ?></td>
                <td><?php echo $row ['lastName']; ?></td>
                <td><?php echo $row ['email']; ?></td> 		   
                <td><?php echo $row ['phone_number']; ?></td> 
                <td><?php echo $row ['gradYear']; ?></td>   
                <td><?php echo $row ['major']; ?></td>   
                <td><?php echo $row ['classifications']; ?></td>   
                <td><?php echo $row ['password']; ?></td>   
                <td><?php echo $row ['userType']; ?></td>   
                <td><?php echo $row ['userName']; ?></td>   
                
			   </tr>
			<?php } 
            }
            else {
                echo "0 results";
            }
            
            ?>
		</tbody>
    </table>
    </div>
   
    <div class="container">
    <h1 class="text-center">Professors</h1>
	<table id="professorsTable" class="table table-bordered table-responsive-md table-striped text-center">
		<thead>
			<tr>
				<th>ID</th>
                <th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Office Location</th>
                <th>Years at School</th>
                <th>Password</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include_once("config.php");
            if($db === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
			$sqlQuery = "SELECT professor_id, firstName, email, lastName, phone_number, password, officeLocation, yearsatSchool FROM professor";
			$result = mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));
            if ($result->num_rows > 0) {

			while( $row = mysqli_fetch_assoc($result) ) {
			?>
			   <tr id="<?php echo $row ['professor_id']; ?>">
			    <td><?php echo $row ['professor_id']; ?></td>
			    <td><?php echo $row ['firstName']; ?></td>
                <td><?php echo $row ['lastName']; ?></td>
                <td><?php echo $row ['email']; ?></td>
                <td><?php echo $row ['phone_number']; ?></td> 		   
                <td><?php echo $row ['officeLocation']; ?></td> 
                <td><?php echo $row ['yearsatSchool']; ?></td> 
                <td><?php echo $row ['password']; ?></td>   
                
			   </tr>
			<?php } 
            }
            else {
                echo "0 results";
            }
            
            ?>
		</tbody>
    </table>
    </div>
    
    <div class="container">
    <h1 class="text-center">Classes</h1>
	<table id="classesTable" class="table table-bordered table-responsive-md table-striped text-center">
		<thead>
			<tr>
				<th>ID</th>
                <th>Course Name</th>
				<th>Course Description</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			include_once("config.php");
            if($db === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
			$sqlQuery = "SELECT class_id, course_name, course_description FROM class";
			$result = mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));
            if ($result->num_rows > 0) {

			while( $row = mysqli_fetch_assoc($result) ) {
			?>
			   <tr id="<?php echo $row ['class_id']; ?>">
			    <td><?php echo $row ['class_id']; ?></td>
			    <td><?php echo $row ['course_name']; ?></td>
                <td><?php echo $row ['course_description']; ?></td>
                
                
			   </tr>
			<?php } 
            }
            else {
                echo "0 results";
            }
            
            ?>
		</tbody>
    </table>
    </div>
    <!-- make a button using boostrap style that will redirect to addclass.php -->
    <!-- <button type="button" class="btn btn-primary" onclick="window.location.href='addclass.php'">Add Class</button> -->
    <!-- center the button on the page -->
    <div class="text-center">
        <button type="button" class="btn btn-primary" onclick="window.location.href='addclass.php'">Add class</button>
    </div>
    
    <div class="container">
    <h1 class="text-center">Comments</h1>
	<table id="commentsTable" class="table table-bordered table-responsive-md table-striped text-center">
		<thead>
			<tr>
				<th>ID</th>
                <th>User ID</th>
				<th>Course Name</th>
				<th>Grade</th>
				<th>Comment</th>
				<th>Professor ID</th>
               
			</tr>
		</thead>
		<tbody>
			<?php 
			include_once("config.php");
            if($db === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
			// $sqlQuery = "SELECT comment_id, comment, user_id, course_name, letterGrade, professor_id FROM comment";
            $sqlQuery = "SELECT * FROM COMMENTWOCLASSID";
			$result = mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));
            if ($result->num_rows > 0) {

			while( $row = mysqli_fetch_assoc($result) ) {
			?>
			   <tr id="<?php echo $row ['comment_id']; ?>">
			    <td><?php echo $row ['comment_id']; ?></td>
			    <td><?php echo $row ['user_id']; ?></td>
                <td><?php echo $row ['course_name']; ?></td>
                <td><?php echo $row ['letterGrade']; ?></td> 		   
                <td><?php echo $row ['comment']; ?></td> 
                <td><?php echo $row ['professor_id']; ?></td>   
                
			   </tr>
			<?php } 
            }
            else {
                echo "0 results";
            }
            
            ?>
		</tbody>
    </table>
    </div>

</body>


</html>
            
  
 





