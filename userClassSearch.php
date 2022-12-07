<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <!-- let a user select a class from drop down menu -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Search for a Class</h1>
                <form action="userClassSearch.php" method="post">
                    <div class="form-group">
                        <label for="course_name">Class Name</label>
                        <select name="course_name" class="form-control" id="course_name">
                            <?php
                                include 'config.php';
                                $query = "SELECT * FROM `Class`";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['course_name'] . "'>" . $row['course_name'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <!-- on the submit button press, populate a table with all comments for that class -->
                    <button type="submit" class="btn btn-default">Submit</button>
                    <?php
                        if(isset($_POST['course_name'])) {
                            $course_name = $_POST['course_name'];
                            $query = "SELECT * FROM `Comment` WHERE `course_name` = '$course_name'";
                            $result = mysqli_query($db, $query);
                            echo "<table class='table table-striped'>
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Grade</th>
                                            <th>Comment</th>
                                            <th>Professor</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                            // on the delete button press, delete the comment from the database
                            
                            while($row = mysqli_fetch_assoc($result)) {
                                // from the professor id, get the professor's first and last name
                                $professor_id = $row['professor_id'];
                                $query = "SELECT * FROM `Professor` WHERE `professor_id` = '$professor_id'";
                                $result2 = mysqli_query($db, $query);
                                $row2 = mysqli_fetch_assoc($result2);
                                $profName = $row2['firstName'] . " " . $row2['lastName'];

                                // from the user id, get the user's first and last name
                                $user_id = $row['user_id'];
                                $query2 = "SELECT * FROM `Users` WHERE `user_id` = '$user_id'";
                                $result3 = mysqli_query($db, $query2);
                                $row3 = mysqli_fetch_assoc($result3);
                                $name = $row3['firstName'] . " " . $row3['lastName'];

                                echo "<tr>
                                        <td>" . $name . "</td>
                                        <td>" . $row['letterGrade'] . "</td>
                                        <td>" . $row['comment'] . "</td>
                                        <td>" . $profName . "</td>
                                        
                                    </tr>";
                            }
                            echo "</tbody>
                                </table>";
                        }
                    ?>
                </form>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="window.location.href='home.php'">Return Home</button>
            </div>
        </div>
    </div>
</html>



