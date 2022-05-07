<?php 
session_start();
ob_start();
if (isset($_POST['update']) && isset($_SESSION['email'])){
     include '../../connection/db.php';

     if (isset($_POST['Opassword']) && isset($_POST['Npassword'])
         && isset($_POST['Cpassword'])){

        $email = $_SESSION['email'];
        $op  = mysqli_real_escape_string($con, $_POST['Opassword']);
        $np  = mysqli_real_escape_string($con, $_POST['Npassword']);
        $cnp = mysqli_real_escape_string ($con, $_POST['Cpassword']);
    
if(empty($op)){
        header("Location: profile/security.php?error=Old Password is required");
        exit();
 }else if(empty($np)){
        header("Location:profile/security.php?error=New Password is required");
        exit();
 }else if($np !== $cnp){
        header("Location:profile/security.php?error=The confirmation password does not match");
        exit();
}
else 
{	
  
                $npass= password_hash($np, PASSWORD_BCRYPT); //make password more secure
                $cpass= password_hash($cnp, PASSWORD_BCRYPT);
		$opass= "select password from base where password= '$op' and email= '$email' ";
                $query = mysqli_query($con, $opass);
                $email_count= mysqli_num_rows($query);
		
                if($email_count){

                        $email_pass= mysqli_fetch_assoc($query);

                        $db_pass = $email_pass['Opassword'];
                        $_SESSION['email'] = $email_pass['email'];

                        $pass_decode = password_verify($Opassword, $db_pass);
                
                if($pass_decode){
		$updatequery = "update base set password ='$npass' where email= '$email' ";
            
                $iquery= mysqli_query($con, $updatequery);
                if($iquery){
                        header('location:profile/security.php?success=passwordUpdated');
                        exit();
                }
                else{
                        header('location:profile/security.php?failed=notUpdated');
                        exit();
                }   

		}
                else{
                        header('location:profile/security.php?error=error');
                        exit();
		}
        }

    }   
  }
}

    
// }else{
// 	header("Location:profile/security.php");
// 	exit();
// }

// }else{
//      header("Location:profile/security.php");
//      exit();
// }

?>