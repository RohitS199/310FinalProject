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
                <h1>Get Comments by Professor</h1>
                <form action="userProfessorSearch.php" method="post">
                    <div class="form-group">
                        <!-- make a drop down menu for all the professors -->
                        <label for="professor_id">Professor Name</label>
                        <select name="professor_id" class="form-control" id="professor_id">
                            <?php
                                include 'config.php';
                                $query = "SELECT * FROM `Professor`";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['professor_id'] . "'>" . $row['firstName'] . " " .$row['lastName'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <!-- on the submit button press, populate a table with all comments for that professors -->
                    <?php
                        if(isset($_POST['professor_id'])) {
                            $professor_id = $_POST['professor_id'];

                            $query = "SELECT * FROM `Comment` WHERE `professor_id` = '$professor_id'";
                            $result = mysqli_query($db, $query);

                            // get the first name and last name of the professor given the professor_id
                            $query2 = "SELECT * FROM `Professor` WHERE `professor_id` = '$professor_id'";
                            $result2 = mysqli_query($db, $query2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $professorName = $row2['firstName'] . " " . $row2['lastName'];

                            echo "<table class='table table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Grade</th>";
                            echo "<th>Comment</th>";
                            echo "<th>Class Name</th>";
                            echo "<th>Professor Last Name</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['letterGrade'] . "</td>";
                                echo "<td>" . $row['comment'] . "</td>";
                                echo "<td>" . $row['course_name'] . "</td>";
                                echo "<td>" . $professorName . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</html>
                    


