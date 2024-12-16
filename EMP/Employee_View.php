<?php
include 'dbcon.php';
// Pagination logic
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Fetch total number of records
$total_query = "SELECT COUNT(*) AS total FROM EMPLOYEES";
$total_result = mysqli_query($con, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Fetch records for the current page
$query = "SELECT * FROM EMPLOYEES LIMIT $limit OFFSET $offset";
$query_run = mysqli_query($con, $query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="emp.css">

    <title>Employee Details</title>
  </head>
  <body>
    <?php include('Header.php')?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee Details:
                            
                            <a href="Create-emp.php" class="btn btn-danger float-end">ADD EMPLOYEE +</a>


                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>EMPID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>POST</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    // $query="SELECT * FROM EMPLOYEES";

                                    // $query_run=mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        foreach($query_run as $emp)
                                        {
                                            //echo $student['name'];
                                     ?>
                                    <tr>
                                    <td><?= $emp['id'];?></td>
                                    <td><?= $emp['name'];?></td>
                                    <td><?= $emp['email'];?></td>
                                    <td><?= $emp['phone'];?></td>
                                    <td><?= $emp['post'];?></td>
                                    <td class="text-center">
                                    <a href="emp-view.php?id=<?=$emp['id'];?>"  class=" btn btn-primary btn-sm">VIEW</a>
                                    <a href="emp-edit.php?id=<?=$emp['id'];?>"  class=" btn btn-warning btn-sm">EDIT</a>


                                    <form action="Delemployee.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete_emp" value="<?=$emp['id'];?>" class="btn btn-danger btn-sm">DELETE</button>

                                    
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
                                
                                <!-- Pagination Links -->
                        <nav class="text-center">
                            <ul class="pagination">
                                <?php if ($page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page - 1; ?>">Previous</a>
                                    </li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= ($page == $i) ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page + 1; ?>">Next</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
   include('Footer.php')
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>