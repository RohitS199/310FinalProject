<!-- make a simple professor sign up form using bootstrap -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <div class = "container">
        <div class = "row">
            <h1>Professor Sign In</h1>
            <form action = "professorLogin.php" method = "post">
                <div class = "form-group">
                    <label for = "username">Username</label>
                    <input type = "text" name = "username" class = "form-control" id = "username">
                </div>
                <div class = "form-group">
                    <label for = "password">Password</label>
                    <input type = "password" name = "password" class = "form-control" id = "password">
                </div>
                <button type = "submit" class = "btn btn-default">Submit</button>
                <?php
                    if(isset($_POST['username']) && isset($_POST['password'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $query = "INSERT INTO `Professor` (`professor_id`, `firstName`, `email`, `lastName`, `phone_number`, `password`, `officeLocation`, `yearsatSchool`) VALUES (NULL, '$username', '$password', 'lastName', 'phone_number', 'password', 'officeLocation', 'yearsatSchool')";
                        include 'config.php';
                        $result = mysqli_query($db, $query);
                        if($result){
                            echo "You are logged in";
                        } else {
                            echo "You are not logged in";
                        }
                    }
                ?>
                <a href = "index.php" class = "btn btn-default">User Sign In</a>
                <a href = "professorSignup.php" class = "btn btn-default">Professor Sign up</a>
            </form>
        </div>
    </div>
</html>


