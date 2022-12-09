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
          <h1>Professor Sign Up</h1>
            <form action = "professorSignup.php" method = "post">
                <div class = "form-group">
                    <label for = "username">Username</label>
                    <input type = "text" name = "username" class = "form-control" id = "username">
                </div>
                <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" class="form-control" id="firstName">
                    </div>
                    <div class = "form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" class="form-control" id="lastName">
                    </div>
                    <div class = "form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class = "form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" name="phoneNumber" class="form-control" id="phoneNumber">
                    </div>
                    <div class = "form-group">
                        <label for="officeLocation">Office Location</label>
                        <input type="text" name="officeLocation" class="form-control" id="officeLocation">
                    </div>
                    <div class = "form-group">
                        <label for="yearsAtSchool">Years at School</label>
                        <input type= "Number" name="yearsAtSchool" class="form-control" id="yearsAtSchool">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group mb-4">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
                    </div>

                    <button type = "submit" class = "btn btn-primary btn-lg btn-block mb-4">Submit</button>
                    <!-- on submit upload the data to the database and make sure the password match-->
                    <?php
                        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phoneNumber']) && isset($_POST['officeLocation']) && isset($_POST['yearsAtSchool']) && isset($_POST['confirmPassword'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $phoneNumber = $_POST['phoneNumber'];
                            $officeLocation = $_POST['officeLocation'];
                            $yearsAtSchool = $_POST['yearsAtSchool'];
                            $confirmPassword = $_POST['confirmPassword'];
                            if($password == $confirmPassword){
                                $query = "INSERT INTO `Professor` (`professor_id`, `firstName`, `email`, `lastName`, `phone_number`, `password`, `officeLocation`, `yearsatSchool`) VALUES (NULL, $firstName, $email, $lastName, $phoneNumber, $password, $officeLocation, $yearsAtSchool)";
                                include 'config.php';
                                $result = mysqli_query($db, $query);
                                if($result){
                                    echo "You are logged in";
                                } else {
                                    echo "You are not logged in";
                                    echo "<div class='alert alert-danger' role='alert'> Not correctly signed up</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger' role='alert'> Passwords do not match</div>";
                            }
                        }
                    ?>
                 <hr class="my-4">
                <a href = "index.php" class = "btn btn-primary btn-lg btn-block mb-4">User Sign In</a>
                <a href = "professorLogin.php" class = "btn btn-primary btn-lg btn-block">Professor Sign In</a>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</html>
  