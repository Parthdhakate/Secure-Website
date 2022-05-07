<?php 

session_start();

if((!isset( $_SESSION['email']))){
    $_SESSION['logmsg']= "Logged out";
    header('location:../Signup/signin.php');
  
}else if((isset( $_SESSION['Guestn']))){
    header('location:index.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unrealchats</title>
    <p bg-info text-white px-5> 
    <link href="normalize.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="nav/nav.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="menu-toggle" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container">
            <nav>
                <h1 class="brand"><a href="index.php">Unrea<span>l</span>chats</a></h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="../myacc/profile/edit_profile.php">My account</a></li>
                    <li><a href="#">About</a></li>                  
                    <li><a href="../Signup/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <script src="nav/nav.js"></script>
    </header>


    <div class="wrapper">
        <div class="side left">
            <div class="image dog"></div>
            <div class="caption">
                <h1>Openly</h1>
                <a class="button" href="../ChatApp/App/chat.php">Go openly</a>
            </div>
        </div>

        <div class="side right">
            <div class="image cat"></div>
            <div class="caption">
                <h1>Incognito</h1>
                <a class="button" href="#">Go incognito</a>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
    </div>

    
    <script>
        $(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>

</html>