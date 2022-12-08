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
          <h1>Add Class</h1>
                <form action="addclass.php" method="post">
                    <!-- add class name and class description -->
                    <div class="form-group mb-4">
                        <label for="class_name">
                            Class Name
                        </label>
                        <input type="text" name="class_name" class="form-control" id="class_name">
                    </div>
                    <div class="form-group mb-4">
                        <label for="class_description">
                            Class Description
                        </label>
                        <input type="text" name="class_description" class="form-control" id="class_description">
                    </div>
                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                    <?php
                        if(isset($_POST['class_name']) && isset($_POST['class_description'])) {
                            
                            $class_name = $_POST['class_name'];
                            $class_description = $_POST['class_description'];

                            $query = "INSERT INTO `Class` (`class_id`, `course_name`, `course_description`) VALUES (NULL, '$class_name', '$class_description');";

                            include 'config.php';
                            $result = mysqli_query($db, $query);

                            if($result) {
                                echo "<div class='alert alert-success' role='alert'>Class added successfully</div>";
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>Class not added</div>";
                            }

                        }
                    ?>
                </form>
                <hr class="my-4">
                <button type="button" class="btn btn-primary" onclick="window.location.href='adminhome.php'">Back to Admin Home</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</html>
