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
    <link rel="stylesheet" href="emp.css">

    <title>Login</title>
  </head>
  <body>
  <?php include('Header.php')?>
  <div class="container mt-5" >
    
    
    <?php include('message.php');?>

    <div class="row">
        <div class="col-md-12">
        <div class="card p-5">
            <div class="card-header">
                <h4>LOGIN HERE</h4>
            </div>
            <div class="card-body  text-center">
            
    <form action="loginprocess.php" method="post">
<div class="mb-3">
    <label for="">EMAIL</label>
    <input type="email" name="email" class="form-control">
</div>
<div class="mb-3">
    <label for="">Password </label>
    <input type="password" name="password" class="form-control">
</div>
<div class="mb-3">
               
               <input type="submit" name="login" class="btn btn-primary" value="login">
           </div>
          <h2>If you haven't register ?</h2>
          <div class="mb-3">
               <a href="empsignupform.php"
                class="btn btn-primary">Register here</a>
           </div>
</form>     
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