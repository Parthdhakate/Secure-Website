<?php
    session_start();
    ob_start();
    include '../connection/db.php';

if (isset($_POST['submit'])) 
{

    if(isset($_GET['token'])){

        $token= $_GET['token'];

    
	$newpassword	= mysqli_real_escape_string($con, $_POST['password']);
    $cpassword	= mysqli_real_escape_string($con, $_POST['cpassword']);	
	
    $pass= password_hash($newpassword, PASSWORD_BCRYPT); //make password more secure
    $cpass= password_hash($cpassword, PASSWORD_BCRYPT);
        
    
    if($newpassword === $cpassword)
        {

            $updatequery= "update base set password ='$pass' where token='$token' ";
            
            $iquery= mysqli_query($con, $updatequery);
            if($iquery)
            {
                $_SESSION['logmsg']= "Your password has been updated";
                header('location: ../Signup/signin.php');
                
            }
                else
                {
                    $_SESSION['pasmsg']= "Your password has not been updated";
                    header('location: reset.php');
                }   
        
        }else {
            $_SESSION['pasmsg']= "Password are not matching";
            header('location: reset.php');
        }
		
	
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Unrealchats</title>
</head>
<body>
    <div id="wrapper">
            <div id="left">
                <div id="signin">
                <div class="logo">
                    <img src="../img/unrealchats.png" alt="Unrealchats"/>
                </div>
                <p bg-info text-white px-5> <?php 
                if(isset($_SESSION['pasmsg']))
                {
                    echo $_SESSION['pasmsg'];
                }else{
                    echo $_SESSION['pasmsg']="";
                } 
                ?>
                </p>
                <form action="" method="POST">                    
                     <input type='password' name="password" class='text-input' placeholder='New Password' required>
                     <input type='password' name="cpassword" class='text-input' placeholder='Confirm Password' required>
                     <button type="submit" name="submit" class="primary-btn">submit</button>                
                </form>
                <div class="links">
                    <!-- <a href="guest.php">Signin as a guest</a> -->
                    <!-- <a href="guest.php">
                        <button type="button">Sign In as</button>   
                    </a> -->
                </div>
                <div class="or">
                    <!-- <hr class="bar" />
                    <span>OR</span>
                    <hr class="bar" /> -->
                </div>
                <!-- <a href="signin.php" class="secondary-btn">Sign In</a> -->
                </div>
                <footer id="main-footer">
                <p>Copyright &copy; 2022, Unrealchats All Rights Reserved</p>
                <div>
                    <a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
                </div>
                </footer>
            </div>
            <div id="right">
                <div id="showcase">
                <div class="showcase-content">
                    <h1 class="showcase-text">
                    
                    </h1>
                   
                </div>
                </div>
            </div>
     </div>
</body>
</html>