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

    <title>register user</title>
  </head>
  <body>
  <?php include('Header.php')?>
  
  <div class="container mt-5">
    <?php include('message.php');?>

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Admin Registration Form:
                    <a href="Userdashboard.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="registeration.php" method="post" onsubmit="return validateForm()">

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required placeholder="Enter your name" aria-label="Name">
                    </div>
                    
                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Enter a valid email address" aria-label="Email">
                    </div>

                    <!-- Phone Field -->
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required placeholder="Enter your phone number" pattern="[0-9]{10}" aria-label="Phone">
                        <small class="form-text text-muted">Phone number should be 10 digits.</small>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6" placeholder="Enter a secure password" aria-label="Password">
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-3">
                        <label for="cpassword">Re-enter Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" required minlength="6" placeholder="Re-enter your password" aria-label="Confirm Password">
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
  </div>

  <!-- JavaScript for Validation -->
  <script>
    function validateForm() {
      const password = document.getElementById('password').value;
      const cpassword = document.getElementById('cpassword').value;

      if (password !== cpassword) {
        alert('Passwords do not match. Please try again.');
        return false;
      }
      return true;
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
