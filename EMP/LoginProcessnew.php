<?php
// Include database connection
include 'dbcon.php';

session_start();

// Initialize variables for error messages
$emailErr = $passwordErr = "";
$email = $password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate email
    if (empty($_POST['email'])) {
        $emailErr = "Email ID is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    // Validate password
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST['password'];
    }

    // If no errors, proceed to login
    if (empty($emailErr) && empty($passwordErr)) {
        $query = "SELECT * FROM EMP_REGISTER WHERE email = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        //print_r($result);

        if ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            // echo $row['password'];
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Start session and redirect to dashboard
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                header("Location: Welcome.php");
                exit();
            } else {
                $passwordErr = "Invalid password";
            }
        } else {
            $emailErr = "No account found with this email";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('Header.php')?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Employee Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control <?php echo !empty($emailErr) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $email; ?>" required>
                            <div class="invalid-feedback"> <?php echo $emailErr; ?> </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?php echo !empty($passwordErr) ? 'is-invalid' : ''; ?>" id="password" name="password" required>
                            <div class="invalid-feedback"> <?php echo $passwordErr; ?> </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
