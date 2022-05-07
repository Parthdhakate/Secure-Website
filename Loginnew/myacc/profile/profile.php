<?php

session_start();
include '../../connection/db.php';
if(isset($_GET['Id'])){
    
    $Id=$_GET['Id'];
    if(isset($_POST['update'])){
        echo 'Hello';
         include '../../connection/db.php';
        
    //     // function validate($data){
    //     //     $data = trim($data);
    //     //     $data = stripslashes($data);
    //     //     $data = htmlspecialchars($data);
    //     //     return $data;
    //     // }
        $Id      = $_SESSION['Id'];
        $NName   = mysqli_real_escape_string($con,$_POST['username']);
        $NEmail  = mysqli_real_escape_string($con,$_POST['email']);
        $NBday   = mysqli_real_escape_string($con,$_POST['Bday']);
        $Country = mysqli_real_escape_string($con,$_POST['Country']);
        
        
        $select= "select * from base where Id='$Id'";
        $sql = mysqli_query($con,$select);
        $row = mysqli_fetch_assoc($sql);
        $res= $row['Id'];
        
        if($res){
            echo "hello world";
            $sql = "UPDATE base SET username = '$NName', email ='$NEmail', Bday=$NBday, Country= $Country WHERE Id = '$Id'";
            $results = mysqli_query($con,$sql);

            if($results){
                        /*Successful*/
                        header('Location:edit_profile.php?success=userUpdated');
                        exit();
            }else{
                        /*Unsuccessful*/
                        header('Location:edit_profile.php?error=notUpdated');
                        exit();
            }
        }else{
            /*sorry your id is not match*/
            header('Location:edit_profile.php?error=noId');
                        exit();

        
    }
}}
?>