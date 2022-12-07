<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1>Rate my Class</h1>
                  <p>CSCE310 Group 15</p>
              </div>
          </div>
      </div>
  </body>
  <!-- make a simple sign in page using bootstrap -->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <h1>Sign In</h1>
              <form action="index.php" method="post">
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control" id="username">
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                  <?php
                    
                    
                    if(isset($_POST['username']) && isset($_POST['password'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        echo $username;
                        echo $password;
                        $query = "SELECT * FROM `Users` WHERE `password` LIKE '$password' AND `userName` LIKE '$username';";

                        include 'config.php';
                        $result = $db->query($query);
                        echo $result->num_rows;
                        $userType = $result->fetch_assoc()['userType'];
                        

                        session_start();
                        if($userType == "Admin") {
                            $_SESSION['username'] = $_POST['username'];
                            header("Location: adminhome.php");
                        } else if($userType == "Student") {
                            $_SESSION['username'] = $_POST['username'];
                            header("Location: home.php");
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Login Unsuccessful</div>";

                        }
                    }
                  ?>
                  <a href="signup.php" class="btn btn-default">User Sign Up</a>
                  <!-- make a professor sign up button -->
                  <a href="professorSignup.php" class="btn btn-default">Professor Sign Up</a>
                  <!-- make a professor sign in button -->
                  <a href="professorLogin.php" class="btn btn-default">Professor Sign In</a>
              </form>
          </div>
      </div>
  </div>
</html>