<?php

session_start();
include '../../../../connection/db.php';
// include_once 'sende.php';
date_default_timezone_set("Asia/kolkata");


$success = "";
$error_message = "";
if(!empty($_POST["submit_email"])){
	$result = mysqli_query($con,"SELECT * FROM base WHERE email='" . $_POST["email"] . "'");
	$count  = mysqli_num_rows($result);
	if($count>0){
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
        $to_email=$_POST["email"];
        $subject ="OTP Verfication";
        $body ="Here is your otp ,$otp for two factor authentication";
        $headers ="From: detectablevirus69@gmail.com";
		// $mail_status = sendOTP($_POST["email"],'OTP Verification',$otp);
		
		if(mail($to_email, $subject, $body, $headers)){
			$result = mysqli_query($con,"INSERT INTO otpu(otp, validity, time) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($con);
			if(!empty($current_id)){
				$success=1;
			}
		}
	} else {
		$error_message = "Email not exists!";
	}
}
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($con,"SELECT * FROM otpu WHERE otp='" . $_POST["otp"] . "' AND validity!=1 AND NOW() <= DATE_ADD(time, INTERVAL 10 MINUTE)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($con,"UPDATE otpu SET validity = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
 body {
        font-family: Arial, Helvetica, sans-serif;
    }
    /* Split the screen in half */
    
    .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
    }
    /* Control the left side */
    
    .left {
        left: 0;
        background-color: #111;
    }
    /* Control the right side */
    
    .right {
        right: 0;
        background-color: red;
    }
    /* If you want the content centered horizontally and vertically */
    
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    /* Style the image inside the centered container, if needed */
    
    .centered img {
        width: 150px;
        border-radius: 50%;
    }
    
    * {
        box-sizing: border-box;
    }
    /* Full-width input fields */
    
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    /* Add a background color when the inputs get focus */
    
    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    /* Set a style for all buttons */
    
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    
    button:hover {
        opacity: 1;
    }
    /* Extra styles for the cancel button */
    
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }
    /* Float cancel and signup buttons and add an equal width */
    
    .cancelbtn,
    .signupbtn {
        float: left;
        width: 50%;
    }
    /* Add padding to container elements */
    
    .container {
        padding: 16px;
    }
    /* The Modal (background) */
    
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: #474e5d;
        padding-top: 50px;
    }
    /* Modal Content/Box */
    
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }
    /* Style the horizontal ruler */
    
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    /* The Close Button (x) */
    
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }
    
    .close:hover,
    .close:focus {
        color: #f44336;
        cursor: pointer;
    }
    /* Clear floats */
    
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    /* Change styles for cancel button and signup button on extra small screens */
    
    @media screen and (max-width: 300px) {
        .cancelbtn,
        .signupbtn {
            width: 100%;
        }
    }
    
    .sub-entry {
        float: left;
        width: 50%;
    }
    
    .or {
        display: flex;
        flex-direction: row;
        /* margin-bottom: 1.2rem; */
        align-items: center;
        border-left: 1px solid #ccc;
        height: 500px;
        margin-top: 70px;
        position: absolute;
        left: 50%;
    }
    
    .or .bar {
        flex: auto;
        border: none;
        height: 1px;
        background: #aaa;
    }
    
    .or span {
        color: #ccc;
        padding: 0 0.8rem;
    }



</style>
</head>
<body>
    <!-- Email Authentication -->
    <!-- <div class="sub-entry">
    
    <form class="modal-content" action="/action_page.php">
    
        <div class="container">
            <h2>Email Authentication</h2>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
    
            <label for="psw"><b>OTP</b></label>
            <input type="password" placeholder="Enter OTP received" name="psw" required>
    
            <div class="clearfix">
                <button type="submit" class="signupbtn">Submit</button>
            </div>
        </div>
    </form>
    </div> -->
    <form name="frmUser" method="POST" action="">
	<div class="tblLogin">
		<?php 
			if(!empty($success == 1)) { 
		?>
		<div class="tableheader">Enter OTP</div>
		<p style="color:#31ab00;">Check your email for the OTP</p>
			
		<div class="tablerow">
			<input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
		</div>
		<div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
		<?php 
			} else if ($success == 2) {
        ?>
		<p style="color:#31ab00;">Welcome, You have successfully loggedin!</p>
		<?php
			}
			else {
		?>
		
		<div class="tableheader">Enter Your Login Email</div>
		<div class="tablerow"><input type="text" name="email" placeholder="Email" class="login-input" required></div>
		<div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btnSubmit"></div>
		<?php 
			}
		?>
	</div>
</form>
</body>
</html>