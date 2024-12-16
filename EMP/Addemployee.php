<?php
// save data
session_start();
include 'dbcon.php';

if(isset($_POST['save-data']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $post=mysqli_real_escape_string($con,$_POST['post']);

    $query = mysqli_query($con,"SELECT * FROM employees WHERE email = '". $email ."'");

	if (mysqli_num_rows($query) > 0)

	{

		 //echo 'Email Address is Already In Use.';
         $_SESSION['message']='Email id already exist';
         header("Location:Addemployee.php");
         exit(0);
		// header("Location:email-verify.php");

	}	
    else{
        $query="INSERT INTO EMPLOYEES(name,email,phone,post) 
        values('$name','$email','$phone','$post')";

        $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message']='Employee Added Successfully';
        header("Location:Employee_View.php");
        exit(0);

    }
    else{

        $_SESSION['message']='Employee not Created Successfully';
        header("Location:Addemployee.php");
        exit(0);
    }


    }


    
}


?>