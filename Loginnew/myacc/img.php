<?php

session_start();
include '../connection/db.php';

$imageName = $userImage ['name'];
$fileType  = $userImage['type'];
$fileSize  = $userImage['size'];
$fileTmpName = $userImage['tmp_name'];
$fileError = $userImage['error'];

$fileImageData = explode('/',$fileType);
$fileExtension = $fileImageData[count($fileImageData)-1];


if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg'){
    //Process Image
    
    if($fileSize < 5000000){
        //var_dump(basename($imageName));

        $fileNewName = "img/".$imageName;
        
        $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
        
        if($uploaded){
            $currentUser = $_SESSION['email'];
            
            $sql = "UPDATE base SET username = '$userNewName', email ='$userNewEmail', img='$imageName' WHERE username = '$currentUser'";

            $results = mysqli_query($connection,$sql);

            header('Location:myacc.php?success=userUpdated');
        exit;
        }


    }else{
        header('Location:myacc.php?error=invalidFileSize');
        exit;
    }
    exit;
}else{
    header('Location:myacc.php?error=invalidFileType');
    exit;
}

?>