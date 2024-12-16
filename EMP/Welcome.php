<?php
session_start();

// // Check if user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: LoginProcessnew.php");
//     exit();
// }

// // Logout process
// if (isset($_GET['logout'])) {
//     session_destroy();
//     header("Location: index.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="emp.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h4>
                </div>
                <div class="card-body text-center">
                    <p class="lead">You have successfully logged in.</p>
                    <a href="LogoutProcess.php?logout=true" class="btn btn-danger">Log Out</a>
                    <div class="mt-5">
                    <a href="Create-emp.php" class="btn btn-warning mx-5">AddEmployeeDetails</a>
                      <a href="Employee_View.php " class="btn btn-warning">ViewEmployeeDetails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
