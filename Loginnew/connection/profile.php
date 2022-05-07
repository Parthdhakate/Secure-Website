<?php 

session_start();

include "db.php";

$Id= $_SESSION['Id'];
$username= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$country= $_POST['country'];
$bio= $_POST['bio'];
?>