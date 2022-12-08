<?php
    session_start();
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="mainStyle.css">
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
  </head>
  
  <section class="vh-100" style="background-color: #508bfc; overflow:hidden">
  
  <div class="container py-5 h-100">
 
    <div class="row d-flex justify-content-center align-items-center h-100">
    
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

          <h1>Add Comment</h1>
                <form action="addcomment.php" method="post">
                
                    <div class="form-outline mb-4">
                        <input type="text" name="grade" class="form-control form-control-lg" id="grade">
                        <label class="form-label" for="grade" >
                            Grade
                        </label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" name="comment" class="form-control form-control-lg" id="comment">
                        <label class="form-label" for="comment">
                            Comment
                        </label>
                    </div>
                    <label for="course_name">Class Name</label>
                    <div class="form-outline mb-4">
                        <select name="course_name" class="form-control form-control-lg" id="course_name">
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
                    <label for="professor_last_name">Professor First Name</label>
                    <div class="form-outline mb-4">
                        <select name="professor_last_name" class="form-control form-control-lg" id="professor_last_name">
                            <?php
                                include 'config.php';
                                $query = "SELECT * FROM `Professor`";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['lastName'] . "'>" . $row['lastName'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <?php

                        
                        if(isset($_POST['course_name']) && isset($_POST['grade']) && isset($_POST['comment']) && isset($_POST['professor_last_name'])) {
                            $course_name = $_POST['course_name'];
                            $grade = $_POST['grade'];
                            $comment = $_POST['comment'];
                            $professor_last_name = $_POST['professor_last_name'];
                            

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
                            $query3 = "SELECT professor_id FROM `profsecure` WHERE `lastName` LIKE '$professor_last_name'";
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
                <hr class="my-4">
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-block" onclick="window.location.href='home.php'">Return Home</button>
                </div>
            </div>

          </div>
          </div>
          </div>
          </div>
          </div>
        </section>
                
      
</html>
