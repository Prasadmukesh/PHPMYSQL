<?php
session_start();
include 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id=mysqli_real_escape_string($con,$_POST['delete_student']);


    $query="DELETE FROM STUDENTS  where id='$student_id'"; 
    

    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message']='Student Deleted Successfully';
        header("Location:index.php");
        exit(0);

    }
    else{

        $_SESSION['message']='Student not Deleted Successfully';
        header("Location:index.php");
        exit(0);
    }

}
// update
if(isset($_POST['update_student']))
{
    $student_id=mysqli_real_escape_string($con,$_POST['student_id']);


    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $course=mysqli_real_escape_string($con,$_POST['course']);

    $query="UPDATE STUDENTS SET name='$name',email='$email',phone='$phone',course='$course' where id='$student_id'"; 
    

    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message']='Student Udated Successfully';
        header("Location:edit-student.php");
        exit(0);

    }
    else{

        $_SESSION['message']='Student not Updated Successfully';
        header("Location:edit-student.php");
        exit(0);
    }

}
// save data

if(isset($_POST['save_student']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $course=mysqli_real_escape_string($con,$_POST['course']);

    $query="INSERT INTO STUDENTS(name,email,phone,course) 
    values('$name','$email','$phone','$course')";

    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message']='Student Created Successfully';
        header("Location:student-create.php");
        exit(0);

    }
    else{

        $_SESSION['message']='Student not Created Successfully';
        header("Location:student-create.php");
        exit(0);
    }

}


?>