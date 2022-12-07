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
                <form action="signup.php" method="post">
                    <!-- add form groups for first name, last name, and email, phone number, grad year, major and classification -->
                    <div class = "form-group">
                        <label for = "username">User Name</label>
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
                        <label for="gradYear">Graduation Year</label>
                        <input type="text" name="gradYear" class="form-control" id="gradYear">
                    </div>
                    <div class = "form-group">
                        <label for="major">Major</label>
                        <input type="text" name="major" class="form-control" id="major">
                    </div>
                    <div class = "form-group">
                        <label for="classification">Classification</label>
                        <input type="text" name="classification" class="form-control" id="classification">
                    </div>
                    <!-- add password and confirm password fields -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
                    </div>
                    <!-- add a drop down menu for user type -->
                    <div class="form-group">
                        <label for="userType">User Type</label>
                        <select name="userType" class="form-control" id="userType">
                            <option value="Student">Student</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <!-- after hitting submit, the information should be stored in the database and redirected to home.php -->
                    <?php
                        session_start();
                        $_SESSION['username'] = $_POST['username'];
                        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phoneNumber']) && isset($_POST['gradYear']) && isset($_POST['major']) && isset($_POST['classification']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
                            // check if the passwords match
                            if($password == $confirmPassword){
                                // if they match, store the information in the database
                                $username = $_POST['username'];
                                $firstName = $_POST['firstName'];
                                $lastName = $_POST['lastName'];
                                $email = $_POST['email'];
                                $phoneNumber = $_POST['phoneNumber'];
                                $gradYear = $_POST['gradYear'];
                                $major = $_POST['major'];
                                $classification = $_POST['classification'];
                                $password = $_POST['password'];
                                $confirmPassword = $_POST['confirmPassword'];
                                $userType = $_POST['userType'];
                                
                                $query = "INSERT INTO `Users` (`user_id`, `firstName`, `email`, `lastName`, `phone_number`, `gradYear`, `major`, `classifications`, `password`, `userType`, `userName`) VALUES (NULL, '$firstName', '$email', '$lastName', '$phoneNumber', '$gradYear', '$major', '$classification', '$password', '$userType', '$username');";

                                include 'config.php';
                                $db->query($query);

                                if($userType == "Student") {
                                    session_start();
                                    $_SESSION['username'] = $username;
                                    header("Location: home.php");
                                }
                                else {
                                    session_start();
                                    $_SESSION['username'] = $username;
                                    header("Location: adminhome.php");
                                }
                            } else {
                                echo "Passwords do not match";

                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</html>


