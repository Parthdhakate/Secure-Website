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
<body data-vide-bg="Peoples">
    <section id="wrapper">
        <div id="signin">
            <div class="logo">
                <a href="signin.php"> <img src="../img/unrealchats.png" alt="Unrealchats" /></a>
            </div>
            <p bg-info text-white px-5> <?php 
            if(isset($_SESSION['logmsg']))
            {
                echo $_SESSION['logmsg'];
                
            }else{
                echo $_SESSION['logmsg']= "";
                
            } 
            ?>
            </p>
            <form action="login.php" method="POST" enctype="multipart/form-data" class="signin-form">
                <input type='text' name="email" class='text-input' placeholder='Email Id' required>
                <i class="fas fa-eye"><input type='password' name="password" class='text-input' placeholder='Password' required></i>
                <i class="field input"><input type="submit" name="submit" class="primary-btn"></button></i>
            </form>
            <div class="links">
                <a href="../forgotp/forgotp.php">Forgot Password?</a>
                <a href="guest.php">Signin as a guest</a>
            </div>
            <div class="or">
                <hr class="bar" />
                <span>OR</span>
                <hr class="bar" />
            </div>
        <a href="Signup.php" class="secondary-btn">Create an account</a>
        </div>

    </section>
    
    <!-- <footer id="main-footer">
            <p>Copyright &copy; 2022, Unrealchats All Rights Reserved</p>
            <div>
                <a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
            </div>
    </footer> -->
     <script src="../js/passh.js"></script>
     <script src="../js/login.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="../js/jquery.vide.js"></script>
</body>
</html>