<?php
session_start();
include("../../../../dbconfig.php");
$email = $_POST['email'];
$password= $_POST['password'];
$password = md5($password);
$s ="select * from investor where email = '$email' && password='$password' && 	varefied = 1";
    $result=mysqli_query($db,$s);
    $num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("Thanks for login")</script>';
    $_SESSION['email']=$email;
     $_SESSION['password']=$password;
     $_SESSION['acctype']='investor';
   echo "<meta http-equiv='refresh' content='0; url=investor_services.php?email=$email' />";
}
else{
    echo '<script>alert("Incorrect Mailid (or) Password ")</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../investor.html' />";
}

?>