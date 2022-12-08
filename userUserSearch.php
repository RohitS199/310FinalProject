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
    <!-- create a drop down menu of all the users -->
    <section class="vh-100" style="background-color: #508bfc; ">
  
  <div class="container py-5 h-100">
 
    <div class="row d-flex justify-content-center align-items-center h-100">
   
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

          <h1>Search for a User</h1>
                <form action="userUserSearch.php" method="post">
                    <div class="form-group mb-4">
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
                    <button type="submit" class="btn btn-primary mb-4">Find User Information</button>
                    <!-- on button click get the user information -->
                    <?php
                        if(isset($_POST['userName'])) {
                            $userName = $_POST['userName'];
                            $query = "SELECT * FROM `secureuser` WHERE userName = '$userName'";
                            $query2 = "SELECT * FROM `Users` USE INDEX (USERNAMESEARCH) WHERE userName = '$userName'";

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
                <button type="button" class="btn btn-primary" onclick="window.location.href='ScheduleMeeting.php'">Schedule Meeting</button>
                <hr class="my-4">
                <button type="button" class="btn btn-primary" onclick="window.location.href='home.php'">Return Home</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</html>
