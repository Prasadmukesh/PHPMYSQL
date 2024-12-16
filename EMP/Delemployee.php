<?php
session_start();
include 'dbcon.php';

if(isset($_POST['delete_emp']))
{
    $emp_id=mysqli_real_escape_string($con,$_POST['delete_emp']);


    $query="DELETE FROM EMPLOYEES  where id='$emp_id'"; 
    

    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message']='Deleted Successfully';
        header("Location:Employee_View.php");
        exit(0);

    }
    else{

        $_SESSION['message']=' Not Deleted Successfully';
        header("Location:Employee_View.php");
        exit(0);
    }

}
?>