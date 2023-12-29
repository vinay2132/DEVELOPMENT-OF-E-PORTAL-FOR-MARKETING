<?php

session_start();
include("../../../../dbconfig.php");
$email=$_SESSION['email'];
$passwords = $_POST['password'];

use PHPMailer\PHPMailer\PHPMailer;

$s ="select * from investor where email = '$email'";//where email = '$email'
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);
$row = $result->fetch_assoc();

$full_name = $row['full_name'];
//$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];
$linkedin = $row['linkedin'];
$stage = $row['stage'];
$investment = $row['investment'];
//$experience = $row['experience'];
$message = $row['message'];
$file_memo = $row['file_memo'];
if($num==1){
    
    $password = md5($passwords);
    mysqli_query($db,
    "UPDATE `investor` SET `password`='".$password."'
    WHERE `email`='".$email."';"
    );
    echo '<script>alert("Thanks for updating the password")</script>';
//echo $password;
//echo $passwords;
    echo "<meta http-equiv='refresh' content='0; url=../../investor.html' />";
}
else{
    echo '<script>alert("Someone already register using this email")</script>';
}
?>
