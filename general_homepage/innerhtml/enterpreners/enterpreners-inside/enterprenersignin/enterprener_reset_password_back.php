<?php

session_start();
include("../../../../dbconfig.php");
$email=$_SESSION['email'];
$password = $_POST['password'];

use PHPMailer\PHPMailer\PHPMailer;

$s ="select * from entrepreneurs where email = '$email'";//where email = '$email'
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);
$row = $result->fetch_assoc();

$full_name = $row['full_name'];
//$email = $row['email'];
$phone = $row['phone'];
//$password = $row['password'];

$skills = $row['skills'];
$video_link = $row['video_link'];
$company_name = $row['company_name'];
$stage = $row['stage'];
$sector = $row['sector'];
$about_founder = $row['about_founder'];
$message = $row['message'];
$file_memo = $row['file_memo'];
$mentorship = $row['mentorship'];
$mentor_describe = $row['mentor_describe'];
if($num==1){
    
    $password = md5($password);
    mysqli_query($db,
    "UPDATE `entrepreneurs` SET `password`='".$password."'
    WHERE `email`='".$email."';"
    );
    echo '<script>alert("Thanks for updating the password")</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../enterpreners.html' />";
}
else{
    echo '<script>alert("Someone already register using this email")</script>';
}
?>
