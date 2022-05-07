<?php
 session_start();
 
 include '../connection/db.php';
 //  $passcode	= $connect->real_escape_string($_POST["passcode"]);	
 //  $csrf		= $connect->real_escape_string($_POST["csrf"]);

 function str_openssl_enc($str,$iv){
	$key='1325436543YOlo#$!@23321';
	$chiper="AES-128-CTR";
	$options=0;
	$str=openssl_encrypt($str,$chiper,$key,$options,$iv);
	return $str;
}
if (isset($_POST['submit'])) {

    // function mysqli_real_escape_string($data){
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
    $iv         = openssl_random_pseudo_bytes(16);    
	$username 	= mysqli_real_escape_string($con, $_POST['username']);
	$email 		= mysqli_real_escape_string($con, $_POST['email']);			
	$password	= mysqli_real_escape_string($con, $_POST['password']);
    $cpassword	= mysqli_real_escape_string($con, $_POST['cpassword']);
    $Bday	    = mysqli_real_escape_string($con, $_POST['Bday']);
    $Country	= mysqli_real_escape_string($con, $_POST['Country']);
    	
    //encrypting data
    // $user=str_openssl_enc($username,$iv);
	// $em   =str_openssl_enc($email,$iv);
	// $Bd    =str_openssl_enc($Bday,$iv);
	// $place =str_openssl_enc($Country,$iv);	
	// $iv=bin2hex($iv);
	
    $pass= password_hash($password, PASSWORD_BCRYPT); //make password more secure
    $cpass= password_hash($cpassword, PASSWORD_BCRYPT);
	
     $token = bin2hex(random_bytes(15)); //make token readable
    /* Check If  username or email used Before */
	$emailquery= "select * from base where email='$email'";	
	$query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if($emailcount>0)
    {     
        $_SESSION['regmsg']= "Email already exists";
        header('location: Signup.php');
	}
    else{
        if($password === $cpassword){
            $status="Active now";
                $ran_id = rand(time(), 100000000);
                $insertquery = "insert into base( username, email, password, token, status, Bday, Country, verified, iv)  VALUES ('$username', '$email', '$pass', '$token','$status' ,'$Bday', '$Country', 'inactive', '$iv')";
            
            $iquery= mysqli_query($con, $insertquery);
            if($iquery){

                $template_file ="email.php";
                if(file_exists($template_file)){
    
                    $subject  = "Account Activation";
                    $body     =  file_get_contents($template_file);
                    $headers  = "From: Unrealchats <detectablevirus69@gmail.com>\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8\r\n";}
                    else{
                        die("Unable to  locate file");
                    }
                    
                // "Hi $username,

                // We just need to verify your email address before you can access Unrealchats.

                // Verify your email address http://localhost/loginnew/connection/act.php?token=$token 

                // Thanks! &#8211; The Unrealchats team";
                
                // $Sender_email="From: fantasticsingh99@gmail.com";
                
                if(mail($email, $subject, $body, $headers)) {
                    $_SESSION['regmsg']= "Check your mail to activate your account $email";
                    header('Location: ../Signup/signin.php');
                    exit();
                } else{
                    $_SESSION['regmsg']= "Email sending failed ";
                    header('location:../Signup/Signup.php');
                    exit();
                }
                
            }
                else{

                    $_SESSION['regmsg']= "Email not inserted";
                    header('location:../Signup/Signup.php');
                    exit();
                    ?> 
                    
                    <?php
                }   
        
        }
        else{
                  $_SESSION['regmsg']= "Your password does not match";
                header('location:../Signup/Signup.php');
                exit();
                ?> 
                    
                <?php
           }
		
	}
	
}
?>