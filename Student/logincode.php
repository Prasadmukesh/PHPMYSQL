<?php
session_start();
// Assuming you have a database connection established
// Replace 'host', 'username', 'password', and 'database' with your database credentials
$conn = mysqli_connect('localhost', 'root', 'root', 'manya');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevent SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if user exists
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User exists, set session variables and redirect to dashboard
        $_SESSION['username'] = $username;
        header("location: dashboard.php");
    } else {
        // Invalid username or password
        echo "Invalid username or password";
    }
}

mysqli_close($conn);
?>
