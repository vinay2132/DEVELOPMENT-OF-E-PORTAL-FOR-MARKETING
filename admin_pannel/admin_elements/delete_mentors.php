<?php
// Initialize the session
session_start();
include("../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
$email = $_GET['email'];
if( isset($_SESSION['password']) && ($_SESSION['acctype']=='admin')){
  // $email=$_SESSION['email'];
   $password=$_SESSION['password'];
   $acctype=$_SESSION['acctype'];
  // $email = $_GET['email'];

}
else{
   header("location: ../pages/samples/lock-screen.html");
   exit;
}

$sql = "select * from mentorship where email = '".$email."'";

    $result1 = $db->query($sql);
        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();

         $full_name = $row['full_name'];
$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];





    $reg="  DELETE from  mentorship where email = '".$email."'";
    mysqli_query($db,$reg);
    echo '<script>alert("Record gets Deleted")</script>';
    echo "<meta http-equiv='refresh' content='0; url=mentors_profile.php' />";
   
  }
  else{
      echo '<script>alert("sorry")</script>';
  }

?>
