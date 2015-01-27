<?php
include('db.php');


if($_POST['action']=="signup")
    {
        $name       = mysqli_real_escape_string($conn,$_POST['name']);
        $email      = mysqli_real_escape_string($conn,$_POST['email']);
        $password   = mysqli_real_escape_string($conn,$_POST['password']);
        $query = "SELECT email FROM login where email='".$email."'";
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
           echo $message="Invalid email address please type a valid email!!";
        }
        elseif($count>=1)
        {
            echo $message=$email." Email already exist!!";
        }
        else
        {
            mysqli_query($conn,"insert into login(name,email,password) values('".$name."','".$email."','".$password."')");
            echo $message="Signup Sucessfully!!";
        }
    }
?>