<?php
// save data
session_start();
include 'dbcon.php';

if(isset($_POST['edit-data']))
{
    $emp_id=mysqli_real_escape_string($con,$_POST['emp_id']);


    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $post=mysqli_real_escape_string($con,$_POST['post']);

    $query="UPDATE EMPLOYEES SET name='$name',email='$email',phone='$phone',post='$post' where id='$emp_id'";
    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message']='Employee Updated Successfully';
        header("Location:Employee_View.php");
        exit(0);

    }
    else{

        $_SESSION['message']='Employee not Updated Successfully';
        header("Location:Employee_View.php");
        exit(0);
    }

}


?>