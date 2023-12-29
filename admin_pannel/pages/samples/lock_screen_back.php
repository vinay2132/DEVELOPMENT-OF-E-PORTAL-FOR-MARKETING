<?php
session_start();
include("../../dbconfig.php");
//$email = $_POST['email'];
$password= $_POST['password'];
//$password = md5($password);
$s ="select * from admin where  password='$password' ";
    $result=mysqli_query($db,$s);
    $num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("Thanks for login")</script>';
    //$_SESSION['email']=$email;
     $_SESSION['password']=$password;
     $_SESSION['acctype']='admin';
   echo "<meta http-equiv='refresh' content='0; url=../../index.php' />";
}
else{
    echo '<script>alert("Incorrect Mailid (or) Password ")</script>';
    //echo "<meta http-equiv='refresh' content='0; url=../../enterpreners.html' />";
}

?>