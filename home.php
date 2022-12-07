<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="mainStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="extensions/editable/bootstrap-table-editable.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
        <script type="text/javascript" src="custom_table_edit.js"></script>
    </head>

    <div class="custom_navbar">
        <a href="/addcomment.php"><div>Add Comment</div></a>
        <a href="/userClassSearch.php"><div>Class Search</div></a>
        <a href="/userProfessorSearch.php"><div>Professor Search</div></a>
        <a href="/index.php"><div>Logout</div></a>
        <a href="/userUserSearch.php"><div>Schedule a meeting with a User</div></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Home</h1>
                <h2>Welcome <?php 
                    session_start();
                    $username = $_SESSION['username'];
                    $user_id = $_SESSION['user_id'];
                    echo $username;
                ?> !</h2>
            </div>
        </div>
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
            // get the user_id based on the username
            $sqlQuery = "SELECT user_id FROM Users WHERE username='$username'";
            $result = mysqli_query($db, $sqlQuery) or die("database error:". mysqli_error($db));
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];

			$sqlQuery = "SELECT comment_id, comment, user_id, course_name, letterGrade, professor_id FROM comment WHERE user_id=$user_id";
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
        
    


</html>
