<?php 
session_start();

include 'db.php';

if(isset($_GET['token'])){

    $token= $_GET['token'];

    $updatequery= "update base set verified= 'active' where token='$token' ";

    $query= mysqli_query($con, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){

            $_SESSION['logmsg']= "Account activated successfully";
            header('location:../Signup/signin.php');
        }else{
            $_SESSION['logmsg']= "You are logged out";
            header('location:../Signup/signin.php');
        }
    }else{

        $_SESSION['regmsg']= "Account not activated";
            header('location:../Signup/Signup.php');
    }
}


?>