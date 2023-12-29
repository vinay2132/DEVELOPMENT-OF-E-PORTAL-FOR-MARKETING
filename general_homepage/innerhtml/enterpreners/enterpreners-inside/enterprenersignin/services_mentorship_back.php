<?php
// Initialize the session
session_start();
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='entrep')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
   // $email = $_GET['email'];
   $mentor_describe = $_POST['mentor_describe'];

    $sql = "select * from entrepreneurs where email = '".$email."'";
    $result = mysqli_query($db,$sql);
$num=mysqli_num_rows($result);
if($num==1){
          
          
         // $reg="INSERT Into entrepreneurs (mentor_describe) values('$mentor_describe')";
         $reg="  update entrepreneurs set mentor_describe='$mentor_describe' , mentorship = 'ab' where email = '".$email."'";
          mysqli_query($db,$reg);
          echo '<script>alert("New record inserted sucessfully")</script>';
          echo "<meta http-equiv='refresh' content='0; url=services.php' />";
         
        }
        else{
            echo '<script>alert("sorry")</script>';
        }
}
else{
    header("location: ../../enterpreners.html");
    exit;
}
?>