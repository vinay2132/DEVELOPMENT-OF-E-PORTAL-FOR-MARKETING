<?php
// Initialize the session
session_start();
include("../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='entrep')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
    $service = $_GET['service'];

   $comment = $_POST['comment'];
   $s ="select * from entrepreneurs_enrole where email = '$email' && service = '$service'";//where email = '$email'
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("You have already enroled to this service")</script>';
      echo "<meta http-equiv='refresh' content='0; url=feedback.html' />";
}
else{
    $reg="INSERT Into entrepreneurs_enrole (email,service,comment) values('$email','$service','$comment')";
    mysqli_query($db,$reg);
    echo '<script>alert("New record inserted sucessfully")</script>';
    echo "<meta http-equiv='refresh' content='0; url=enterprenersignin/services_profile.php' />";
}
}
else{
    echo '<script>alert("Sign in to access")</script>';
   
    echo "<meta http-equiv='refresh' content='0; url=enterprenersignin/enterprenersignin.html' />";
   
}
?>