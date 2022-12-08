<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <!-- create a drop down menu of all the users -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Search for a User</h1>
                <form action="userUserSearch.php" method="post">
                    <div class="form-group">
                        <label for="userName">User</label>
                        <select name="userName" class="form-control" id="userName">
                            <?php
                                include 'config.php';
                                $query = "SELECT * FROM `Users`";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['userName'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Find User Information</button>
                    <!-- on button click get the user information -->
                    <?php
                        if(isset($_POST['userName'])) {
                            $userName = $_POST['userName'];
                            $query = "SELECT * FROM `secureuser` WHERE userName = '$userName'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);

                            $firstName = $row['firstName'];
                            $lastName = $row['lastName'];
                            $email = $row['email'];
                            $phone_number = $row['phone_number'];
                            $username = $row['username'];
                            $graduationYear = $row['gradYear'];
                            $major = $row['major'];
                            $classification = $row['classifications'];

                            echo "<h2>First Name: " . $firstName . "</h2>";
                            echo "<h2>Last Name: " . $lastName . "</h2>";
                            echo "<h2>Email: " . $email . "</h2>";
                            echo "<h2>Major: " . $major . "</h2>";
                            echo "<h2>Graduation Year: " . $graduationYear . "</h2>";
                            echo "<h2>Classification: " . $classification . "</h2>";
                            echo "<h2>Phone Number: " . $phone_number . "</h2>";
                        }
                    ?>
                </form>
                <div class="text-center">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='ScheduleMeeting.php'">Schedule Meeting</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='home.php'">Return Home</button>
                </div>
            </div>
        </div>
    </div>
</html>
