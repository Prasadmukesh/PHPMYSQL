<?php
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Addstudent</title>
  </head>
  <body>
    
  <div class="container mt-5" >
    
    <?php include('message.php');?>

    <div class="row">
        <h2 class="text-center text-danger mb-3">Students Management System : Crud Operation</h2>
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Students Details: <span class="float-end">
                   <a href="index.php" class="btn btn-danger float-end">BACK</a>
                </span></h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="post">

               
            <div class="mb-3">
                <label for="">Name </label>
                <input type="text" name="name" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="">EMAIL</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">PHONE</label>
                <input type="tel" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">COURSE</label>
                <input type="text" name="course"  class="form-control">
            </div>
            <div class="mb-3">
               
                <input type="submit" name="save_student" class="btn btn-primary" value="Add Student">
            </div>

                </form>
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