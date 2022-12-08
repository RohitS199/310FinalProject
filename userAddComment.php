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
                <h1>Add Comment</h1>
                <form action="userAddComment.php" method="post">
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
                    <div class="form-group">
                        <label for="professor_last_name">Professor First Name</label>
                        <select name="professor_last_name" class="form-control" id="professor_last_name">
                            <?php
                                include 'config.php';
                                $query = "SELECT * FROM `Professor`";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['lastName'] . "'>" . $row['firstName'] . $row['lastName'] . "</option>";
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
                            $professor_last_name = $_POST['professor_last_name'];
                            
                            session_start();
                            $username = $_SESSION['username'];

                            // given the username, get the user_id
                            include 'config.php';
                            $query1 = "SELECT user_id FROM `secureuser` WHERE `userName` LIKE '$username'";
                            $result1 = mysqli_query($db, $query1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $user_id = $row1['user_id'];

                            //given the classname, get the class_id
                            $query2 = "SELECT class_id FROM `Class` WHERE `course_name` LIKE '$course_name'";
                            $result2 = mysqli_query($db, $query2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $class_id = $row2['class_id'];

                            //given the professor's last name, get the professor_id
                            $query3 = "SELECT professor_id FROM `Professor` WHERE `lastName` LIKE '$professor_last_name'";
                            $result3 = mysqli_query($db, $query3);
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
                <div class="text-center">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='home.php'">Return Home</button>
                </div>
            </div>
        </div>
    </div>
</html>