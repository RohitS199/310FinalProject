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
  <!-- let a user select a class from drop down menu -->
  <section class="vh-100" style="background-color: #508bfc; ">
  
  <div class="container py-5 h-100">
 
    <div class="row d-flex justify-content-center align-items-center h-100">
    
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

          <h1>Search for a Class</h1>
                <form action="userClassSearch.php" method="post">
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
                    <!-- on the submit button press, populate a table with all comments for that class -->
                    <button type="submit" class="btn btn-primary ">Submit</button>
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
                                $query = "SELECT * FROM `profsecure` WHERE `professor_id` = '$professor_id'";
                                $result2 = mysqli_query($db, $query);
                                $row2 = mysqli_fetch_assoc($result2);
                                $profName = $row2['firstName'] . " " . $row2['lastName'];

                                // from the user id, get the user's first and last name
                                $user_id = $row['user_id'];
                                $query2 = "SELECT * FROM `secureuser` WHERE `user_id` = '$user_id'";
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
                <hr class="my-4">
                <button type="button" class="btn btn-primary" onclick="window.location.href='home.php'">Return Home</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   
</html>



