<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
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
  
  <!-- make a simple sign in page using bootstrap -->
  <!-- <div style="background-color: #508bfc;" >
         
              <div class="title text-center">
                  <h1 class="">Rate my Class</h1>
                  <p>CSCE310 Group 15</p>
              </div>
        
    </div> -->
  <section class="vh-100" style="background-color: #508bfc; overflow:hidden">
  
  <div class="container py-5 h-100">
 
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class=" text-center">
                  <h1 class="title">Rate My Class</h1>
                  <h4 class="title">CSCE310 Group 15</h4>
    </div>
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
            <form action="index.php" method="post">
            <div class="form-outline mb-4">
              <input type="text" id="typeEmailX-2" class="form-control form-control-lg" id="username" name="username"/>
              <label class="form-label" for="typeEmailX-2">Username</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" id="password" name="password"/>
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

          

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">
            <?php
                    
                    
                    if(isset($_POST['username']) && isset($_POST['password'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $query = "SELECT * FROM `Users` WHERE `password` LIKE '$password' AND `userName` LIKE '$username';";
                        $query2 = "SELECT user_id FROM `Users` WHERE `password` LIKE '$password' AND `userName` LIKE '$username';";
                        include 'config.php';
                        $result = $db->query($query);
                        //echo $result->num_rows;
                        $userType = $result->fetch_assoc()['userType'];
                        $result2 = $db->query($query);
                        $user_id = $result2->fetch_assoc()['user_id'];
                       // echo $result2->num_rows;
                        

                        session_start();
                        if($userType == "Admin") {
                            $_SESSION['username'] = $_POST['username'];
                            header("Location: adminhome.php");
                        } else if($userType == "Student") {
                            $_SESSION['username'] = $_POST['username'];
                            $_SESSION['user_id'] = $user_id;
                            header("Location: home.php");
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Login Unsuccessful</div>";

                        }
                    }
                  ?>
           
            </form>
           
            <a href="signup.php" class="btn btn-primary btn-lg btn-block mb-4" >User Sign Up</a>
            <a href="professorSignup.php" class="btn btn-primary btn-lg btn-block mb-4" >Professor Sign Up</a>
            <a href="professorLogin.php" class="btn btn-primary btn-lg btn-block " >Professor Sign In</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</html>