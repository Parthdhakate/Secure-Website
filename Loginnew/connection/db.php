<?php
$server= 'localhost';
$user='root';
$password='';
$db='unrealchats';

$con = mysqli_connect($server, $user, $password, $db);

if(mysqli_connect_errno()){
    //Connection failed
    echo 'failed to connect to MySQL';
    mysqli_connect_errno();
}
