<?php

session_start();
include("../../../../dbconfig.php");
$email=$_SESSION['email'];
$password = $_POST['password'];

use PHPMailer\PHPMailer\PHPMailer;

$s ="select * from mentorship where email = '$email'";//where email = '$email'
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);
$row = $result->fetch_assoc();

$full_name = $row['full_name'];
//$email = $row['email'];
$phone = $row['phone'];
//$password = $row['password'];
$linkedinlink = $row['linkedinlink'];	
$skills = $row['skills'];
$expertise = $row['expertise'];
$experience = $row['experience'];
$message = $row['message'];
$file_memo = $row['file_memo'];
if($num==1){
    
    $password = md5($password);
    mysqli_query($db,
    "UPDATE `mentorship` SET `password`='".$password."'
    WHERE `email`='".$email."';"
    );
    echo '<script>alert("Thanks for updating the password")</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../mentors.html' />";
}
else{
    echo '<script>alert("Someone already register using this email")</script>';
}
?>
