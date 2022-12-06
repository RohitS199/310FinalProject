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
                <a class="navbar-brand" href="home.php">Class Search</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Home</h1>
                <h2>Welcome <?php 
                    session_start();
                    $username = $_SESSION['username'];
                    echo $username;
                ?> !</h2>
            </div>
        </div>
    </div>

    <?php
        include 'config.php';

        if($db === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        echo "<br>";

        $sql = "SELECT comment_id, course_name, grade, comment from comment where username = '$username'";
        $result = $db->query($sql);

        echo "<div class='container'>";
		echo "<div class='row-fluid'>";
		
			echo "<div class='col-xs-6'>";
			echo "<div class='table-responsive'>";
			
				echo "<table class='table table-hover table-inverse'>";
				
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Course Name</th>";
				echo "<th>Grade</th>";
                echo "<th>Comment</th>";
				echo "</tr>";

                if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
							
						echo "<tr>";
						echo "<td>" . $row["comment_id"] . "</td>";
						echo "<td>" . $row["course_name"] . "</td>";
						echo "<td>" . $row["grade"] . "</td>";
                        echo "<td>" . $row["comment"] . "</td>";
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