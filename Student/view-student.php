<?php
//session_start();
require 'dbcon.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student-View</title>
</head>

<body>

    <div class="container mt-5">
     
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Students Details:
                            <span class="float-end">
                                <a href="index.php" class="btn btn-danger float-end">BACK</a>
                            </span>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);

                            $query = "SELECT * FROM STUDENTS where id='$student_id'";

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                                // print_r($student);
                        ?>
                            
                                    <input type="hidden" name="student_id" value="<?=$student['id']?>">


                                    <div class="mb-3">
                                        <label for="">Name </label>
                                    
                                        <p class="form-control">
                                        <?= $student['name']; ?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">EMAIL</label>
                                       
                                        <p class="form-control">
                                        <?= $student['email']; ?>
                                        </p>
                                        

                                    </div>
                                    <div class="mb-3">
                                        <label for="">PHONE</label>
                                     
                                        <p class="form-control">
                                        <?= $student['phone']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">COURSE</label>
                                       
                                        <p class="form-control">
                                        <?= $student['course']; ?>
                                        </p>
                                    </div>
                                    
                        <?php


                            } else {

                                echo '<h5>No such Id Found</h5>';
                            }
                        }

                        ?>


                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>