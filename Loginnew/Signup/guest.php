<?php
session_start();
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
                    <img src="../img/unrealchats.png" alt="Unrealchats" />
                </div>
                <p bg-info text-white px-5><?php 
                if(isset($_SESSION['guemsg']))
                {
                    echo $_SESSION['guemsg'];
                }else{
                    echo $_SESSION['guemsg']= "";
                } 
                ?>
                </p>
                <form action="guest1.php" method="POST" enctype="multipart/form-data">
                    <input type='text' name="Guestn" class='text-input' placeholder='Guest name' required>
                    <button type="submit" name="submit" class="primary-btn">Sign In</button>
                </form>
                <div class="links">
                    <!-- <a href="../forgotp/forgotp.php">Forgot Password</a>
                    <a href="guest.php">Signin as a guest</a> -->
                </div>
                <div class="or">
                    <hr class="bar" />
                    <span>OR</span>
                    <hr class="bar" />
                </div>
                <a href="../Signup/Signup.php" class="secondary-btn">Create an account</a>
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