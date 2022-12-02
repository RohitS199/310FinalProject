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
                <h1>Add Class</h1>
                <form action="addclass.php" method="post">
                    <!-- add class name and class description -->
                    <div class="form-group">
                        <label for="class_name">
                            Class Name
                        </label>
                        <input type="text" name="class_name" class="form-control" id="class_name">
                    </div>
                    <div class="form-group">
                        <label for="class_description">
                            Class Description
                        </label>
                        <input type="text" name="class_description" class="form-control" id="class_description">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
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
            </div>
        </div>
    </div>
</html>
