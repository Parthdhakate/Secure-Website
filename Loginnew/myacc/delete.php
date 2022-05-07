<?php 

session_start();

if (isset($_POST['submit'])) {
    
    include '../connection/db.php';
    $email = $_SESSION['email'];
	$sql= "delete from base where email='$email'";
    mysqli_query($con, $sql);
      
    header('location: ../Signup/signin.php');
    exit();
}
else{
    header('location:profile/security.php?error=error');
    exit();
}
?>
