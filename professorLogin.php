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
                    <label for = "username">Email</label>
                    <input type = "text" name = "email" class = "form-control" id = "email">
                </div>
                <div class = "form-group">
                    <label for = "password">Password</label>
                    <input type = "password" name = "password" class = "form-control" id = "password">
                </div>
                <button type = "submit" class = "btn btn-default">Submit</button>
                <?php
                    if(isset($_POST['email']) && isset($_POST['password'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $query = "SELECT * FROM `Professor` WHERE `password` LIKE '$password' AND `email` LIKE '$email';";
                        $query2 = "SELECT professor_id FROM `Professor` WHERE `password` LIKE '$password' AND `email` LIKE '$email';";
                        include 'config.php';
                        $result = $db->query($query);
                        $profFirst = $result->fetch_assoc()['firstName'];
                        $result2 = $db->query($query2);
                        $profesor_id = $result2->fetch_assoc()['professor_id'];
                        session_start();
                        $_SESSION['profFirst'] = $profFirst;
                        $_SESSION['professor_id'] = $profesor_id;
                        header("Location: professorhome.php");
                        // $result = mysqli_query($db, $query);
                        // if($result){
                        //     echo "You are logged in";
                        // } else {
                        //     echo "You are not logged in";
                        // }
                    }
                ?>
                <a href = "index.php" class = "btn btn-default">User Sign In</a>
                <a href = "professorSignup.php" class = "btn btn-default">Professor Sign up</a>
            </form>
        </div>
    </div>
</html>


