<?php


session_start();

$email=$_POST['email'];

$pws=$_POST['password'];	

include 'dbcon.php';

$result=$con->query("select * from emp_register where email='$email' and password='$pws'");	

$num=mysqli_num_rows($result);		

if($num==1)

{			

    $_SESSION['email']=$email;

    //header("location:https://www.google.com/");
    echo "login success";

    header("location:Dashboard.php");

}

?>

