<?php

session_start();

include '../connection/db.php';

if(isset($_POST['submit']))
{
    $Guestn = mysqli_real_escape_string($con, $_POST['Guestn']);
    $guestquery= "select * from guest where Guestn='$Guestn'";	
	$query = mysqli_query($con, $guestquery);
    $guestcount = mysqli_num_rows($query);
    if($guestcount>0)
    {     
        $_SESSION['guemsg']= "Name already exists";
        header('location:guest.php');
	}
    else
    {
        $insertquery = "insert into guest(Guestn) VALUES ('$Guestn')"; 
        $iquery= mysqli_query($con, $insertquery);
        if($iquery)
        {
            echo "Login successful";
            ?>
            <script>
                location.replace("../home/index.php")
            </script>
            <?php
        }
        else
        {
            $_SESSION['guemsg']= "Error while entering name";
            header('location: guest.php');
        }

    }
}
    else{

    $_SESSION['guemsg']= "Enter a name";
    header('location: guest.php');
    }
?> 

