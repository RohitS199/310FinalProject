<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Sign Up</h1>
                <form action="addcomment.php" method="post">
                    <div class="form-group">
                        <label for="grade">
                            Grade
                        </label>
                        <input type="text" name="grade" class="form-control" id="grade">
                    </div>
                    <div class="form-group">
                        <label for="comment">
                            Comment
                        </label>
                        <input type="text" name="comment" class="form-control" id="comment">
                    </div>
                    <div class="form-group">
                        <label for="userType">User Type</label>
                        <select name="userType" class="form-control" id="userType">
                            <?php
                                include 'config.php';
                                $query = "SELECT * FROM `Class`";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['class_id'] . "'>" . $row['course_name'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userType">User Type</label>
                        <select name="userType" class="form-control" id="userType">
                            <?php
                                include 'config.php';
                                $query = "SELECT * FROM `Professor`";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['professor_id'] . "'>" . $row['firstName'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                    <?php
                        if(isset($_POST['course_name']) && isset($_POST['grade']) && isset($_POST['comment']) && isset($_POST['professor_last_name'])) {
                            $course_name = $_POST['course_name'];
                            $grade = $_POST['grade'];
                            $comment = $_POST['comment'];

                            session_start();
                            include 'config.php';
                            // get the username from the session
                            $username = $_SESSION['username'];
                            
                            
                            // given the username, get the user_id
                            $query1 = "SELECT user_id FROM User WHERE username = '$username'";
                            //given the classname, get the class_id
                            $query2 = "SELECT class_id FROM Class WHERE course_name = '$course_name'";
                            //given the professor's last name, get the professor_id
                            $query3 = "SELECT professor_id FROM Professor WHERE last_name = '$professor_last_name'";


                            $result1 = mysqli_query($db, $query1);
                            $result2 = mysqli_query($db, $query2);
                            $result3 = mysqli_query($db, $query3);

                            // get the user_id from the result
                            $row1 = mysqli_fetch_assoc($result1);
                            $user_id = $row1['user_id'];

                            // get the class_id from the result
                            $row2 = mysqli_fetch_assoc($result2);
                            $class_id = $row2['class_id'];

                            // get the professor_id from the result
                            $row3 = mysqli_fetch_assoc($result3);
                            $professor_id = $row3['professor_id'];

                            //make sure user, class, and professor exist before inserting into database
                            if($user_id != null && $class_id != null && $professor_id != null) {
                                $query4 = "INSERT INTO `Comment` (`comment_id`, `user_id`, `course_name`, `class_id`, `letterGrade`, `comment`, `professor_id`) VALUES (NULL, '$user_id', '$course_name', '$class_id', '$grade', '$comment', '$professor_id')";
                                $result4 = mysqli_query($db, $query4);
                                if($result4) {
                                    echo "<div class='alert alert-success' role='alert'>Comment added successfully</div>";
                                }
                                else {
                                    echo "<div class='alert alert-danger' role='alert'>Comment not added</div>";
                                }
                            }
                            else {
                                echo "<div class='alert alert-danger' role='alert'>Professor, Class or User does not exist</div>";
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</html>
