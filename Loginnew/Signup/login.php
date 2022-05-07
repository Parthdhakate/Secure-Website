<?php
session_start();
include '../connection/db.php';

// function str_openssl_dec($str,$iv){
// 	$key='1325436543YOlo#$!@23321';
// 	$chiper="AES-128-CTR";
// 	$options=0;
// 	$str=openssl_decrypt($str,$chiper,$key,$options,$iv);
// 	return $str;
//}
    // $res=mysqli_query($con,"select * from base order by id desc");
    // $query = mysqli_query($con, $res);
    // $row=mysqli_fetch_assoc($res);
    // $email_count= mysqli_num_rows($res);
    // $iv=hex2bin($row['iv']);
    //dec data
    // $name=str_openssl_dec($row['username'],$iv);
    // $decemail=str_openssl_dec($row['email'],$iv);
    // $decemail= str_openssl_dec($row, $iv);
if(isset($_POST['submit'])){

    // echo "<table border='1'>"; 
	// echo "<tr><td>Id</td><td>Name</td><td>Email</td></tr>";
	// while($row=mysqli_fetch_assoc($res)){
	// 	$iv=hex2bin($row['iv']);
	// 	$name=str_openssl_dec($row['username'],$iv);
	// 	$email=str_openssl_dec($row['email'],$iv);
		
		
	// 	echo "<tr><td>".$row['Id']."</td><td>".$name."</td><td>".$email."</td></tr>";
	// }
    // echo "</table>"




    $username= $_POST['username'];
    $email   = $_POST['email'];
    $password= $_POST['password'];
    $Id = $_SESSION["Id"];
    $email_search = "select * from base where email ='$email' and verified='active'";
    $query = mysqli_query($con, $email_search);

    $email_count= mysqli_num_rows($query);

    if($email_count){
        $email_pass= mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];
        $_SESSION['email'] = $email_pass['email'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            $_SESSION['Sucmsg']= "Login successfull";
            header('location: ../home/index.php');
            ?>
            <script>
                location.replace("../home/index.php")
            </script>
            <?php
        }else {
                $_SESSION['logmsg']= "Password incorrect";
                header('location: signin.php');
        }
    }else
    {
             $_SESSION['logmsg']= "Invalid Email";
                header('location: signin.php');
        
    }
}
 

?>
