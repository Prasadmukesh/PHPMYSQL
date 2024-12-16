<?php
include 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>index</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Students Details:
                            
                            <a href="student-create.php" class="btn btn-danger float-end">ADD STUDENTS</a>


                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>COURSE</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $query="SELECT * FROM STUDENTS";

                                    $query_run=mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            //echo $student['name'];
                                     ?>
                                    <tr>
                                    <td><?= $student['id'];?></td>
                                    <td><?= $student['name'];?></td>
                                    <td><?= $student['email'];?></td>
                                    <td><?= $student['phone'];?></td>
                                    <td><?= $student['course'];?></td>
                                    <td>
                                            <a href="view-student.php?id=<?=$student['id'];?>" class="btn btn-info btn-sm">View</a>

                                            
                                            <a href="edit-student.php?id=<?=$student['id'];?>" class="btn btn-warning btn-sm">Edit</a>

                                            
                                            <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                           
                                    </td>
                                </tr>

                                <?php

                                        }

                                    }
                                    else{
                                        echo '<h5>No Record Found</h5>';
                                    }

                                ?>
                               
                            </tbody>
                                </table>

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