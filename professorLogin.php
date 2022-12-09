<!-- make a simple professor sign up form using bootstrap -->
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
          <h1>Professor Sign In</h1>
            <form action = "professorLogin.php" method = "post">
                <div class = "form-group mb-4">
                    <label for = "email">Email</label>
                    <input type = "text" name = "email" class = "form-control" id = "email">
                </div>
                <div class = "form-group mb-4">
                    <label for = "password">Password</label>
                    <input type = "password" name = "password" class = "form-control" id = "password">
                </div>
                <button type = "submit" class = "btn btn-primary btn-lg btn-block mb-4">Submit</button>
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
                        // header("Location: professorhome.php");
                        // $result = mysqli_query($db, $query);
                        if($result){
                            echo "You are logged in";
                            header("Location: professorhome.php");
                        } else {
                            echo "<div class='alert alert-danger' role='alert'> make sure your email and password are correct </div>";
                        }
                    }
                ?>
                 <hr class="my-4">
                <a href = "index.php" class = "btn btn-primary btn-lg btn-block mb-4">User Sign In</a>
                <a href = "professorSignup.php" class = "btn btn-primary btn-lg btn-block mb-4">Professor Sign up</a>
            </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</html>


