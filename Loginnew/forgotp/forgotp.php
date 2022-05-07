<?php
    session_start();
    include '../connection/db.php';

if (isset($_POST['submit'])) 
{
	$email = mysqli_real_escape_string($con, $_POST['email']);				
    $token = bin2hex(random_bytes(15)); //make token readable
    /* Check If  username or email used Before */
	$emailquery= "select * from base where email='$email'";	
	$query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    
    if($emailcount)
    {
                $userdata= mysqli_fetch_assoc($query);
                $username=$userdata['username'];
                $token= $userdata['token'];
                $subject="Password Reset";
                $body=
                "
                    <html>
                    <head>
                    <title>{$subject}</title>
                    </head>
                    <body>
                    <p><strong>Dear $username ,</strong></p>
                    <p>Forgot Password? Not a problem. Click below link to reset your password.</p>
                    <p><a href='http://localhost/loginnew/forgotp/reset.php?token=$token'>Reset Password</a></p>
                    </body>
                    </html>
                 ";


                    $headers  = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: detectablevirus69@gmail.com";
                
                if(mail($email, $subject, $body, $headers)) 
                {
                    $_SESSION['msg']= "Check your mail to reset your password $email";
                    header('Location:../Signup/signin.php');
                } else
                {
                    $_SESSION['formsg']= "Email sending failed";
                    header('location: forgotp.php');
                }
                
    }
    else
    {
        $_SESSION['formsg']= "Invalid Email";
        header('location: forgotp.php');
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
<body data-vide-bg="Peoples"> 
    <section id="wrapper">
            <div id="signin">
                <div class="logo">
                    <a href="../Signup/signin.php"> <img src="../img/unrealchats.png" alt="Unrealchats" /></a>
                </div>
                <p bg-info text-white px-5> <?php 
                if(isset($_SESSION['formsg']))
                {
                    echo $_SESSION['formsg'];
                }else{
                    echo $_SESSION['formsg']= "";
                } 
                ?>
                </p>
                <form action="" method="POST" enctype="multipart/form-data" class="signin-form">                    
                     <input type='email' name="email" class='text-input' placeholder='Email Id' required>                             
                     <button type="submit" name="submit" class="primary-btn">Recover</button>                
                </form>
                <div class="or">
                    <hr class="bar" />
                    <span>OR</span>
                    <hr class="bar" />
                </div>
                <a href="../Signup/signin.php" class="secondary-btn">Sign In</a>
            </div>
                <!-- <footer id="main-footer">
                <p>Copyright &copy; 2022, Unrealchats All Rights Reserved</p>
                <div>
                    <a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
                </div>
                </footer> -->
    </section>
</body>
</html>