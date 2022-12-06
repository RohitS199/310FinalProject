<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="extensions/editable/bootstrap-table-editable.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
        <script type="text/javascript" src="custom_table_edit.js"></script>
    </head>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" style="color:white;" href="home.php">Class Search</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a style="color:white;" href="home.php">Home</a></li>
                <li><a style="color:white;" href="search.php">Search</a></li>
                <li><a style="color:white;" href="index.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Search Class</h1>
                <h2 style= "font-size: medium">Please Enter Valid Major Abbrv. and Course Number:
                    <!-- <?php 
                    session_start();
                    $username = $_SESSION['username'];
                    echo $username;?>  -->
                    </h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Course" aria-label="Search Course" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Search</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <?php
        include 'config.php';

        if($db === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        echo "<br>";

        $sql = "SELECT couse_id, crn, class_id, professor_id from course"; /* where username = '$username'" */

        $sql1_1 = "SELECT class.course_name, class.course_description
        FROM class
        INNER JOIN course ON class.course_id = course.course_id";

        $sql1_2 = "SELECT class.course_name AS course_name, class.course_description AS course_description, professor.firstName AS firstName, professor.lastName AS lastName
        FROM ((class
        INNER JOIN course ON class.class_id = course.class_id
        INNER JOIN professor ON class.professor_id = professor.professor_id))";

        $result = $db->query($sql1_2);

        echo "<div class='container'>";
		echo "<div class='row-fluid'>";
		
			echo "<div class='col-xs-6'>";
			echo "<div class='table-responsive'>";
			
				echo "<table class='table table-hover table-inverse'>";
				
				echo "<tr>";
				echo "<th>Course Name</th>";
				echo "<th>Course Description</th>";
				// echo "<th>Class ID</th>";
                echo "<th>Professor First</th>";
                echo "<th>Professor Last</th>";
				echo "</tr>";

                if ( && $result->num_rows > 0) {
					// output data of each row
                    //echo $result->num_rows;
					while($row = $result->fetch_assoc()) {
							
						echo "<tr>";
						echo "<td>" . $row["course_name"] . "</td>";
						echo "<td>" . $row["course_description"] . "</td>";
						echo "<td>" . $row["firstName"] . "</td>";
                        echo "<td>" . $row["lastName"] . "</td>";
						echo "</tr>";			
					}
				} else {
					echo "0 results";
				}
				
				echo "</table>";
            
            echo "</div>";
            echo "</div>";
        echo "</div>";
        echo "</div>";

        mysqli_close($link);

        echo "</br>";
    ?>

        

</html>