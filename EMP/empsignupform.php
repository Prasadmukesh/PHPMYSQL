<?php
// Include database connection
include 'dbcon.php';

// Initialize variables for error messages and success status
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate name
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

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
    } elseif (strlen($_POST['password']) < 6) {
        $passwordErr = "Password must be at least 6 characters long";
    } else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    }

    // If no errors, insert data into the database
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        $query = "INSERT INTO EMP_REGISTER (name, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt,"sss",$name, $email, $password);

        if (mysqli_stmt_execute($stmt)) {
            $success = true;
            $name = $email = $password = ""; // Clear form values
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
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
    <title>Employee Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('Header.php')?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Employee Signup</h4>
                </div>
                <div class="card-body">
                    <?php if ($success): ?>
                        <div class="alert alert-success">Signup successful!</div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control <?php echo !empty($nameErr) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo $name; ?>">
                            <div class="invalid-feedback"> <?php echo $nameErr; ?> </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control <?php echo !empty($emailErr) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $email; ?>">
                            <div class="invalid-feedback"> <?php echo $emailErr; ?> </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?php echo !empty($passwordErr) ? 'is-invalid' : ''; ?>" id="password" name="password">
                            <div class="invalid-feedback"> <?php echo $passwordErr; ?> </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
   include('Footer.php')
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
