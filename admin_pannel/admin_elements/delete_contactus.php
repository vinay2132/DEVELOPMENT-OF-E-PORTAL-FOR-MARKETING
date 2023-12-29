<?php
// Initialize the session
session_start();
include("../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
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

$id = $_GET['id'];

$sql = "select * from contact where id = '".$id."'";

    $result1 = $db->query($sql);
        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();

         $names = $row['names'];
$email = $row['email'];
$message = $row['message'];



    $reg="  DELETE from  contact where id = '".$id."'";
    mysqli_query($db,$reg);
    echo '<script>alert("New record inserted sucessfully")</script>';
    echo "<meta http-equiv='refresh' content='0; url=entrepreneur_profile.php' />";
   
  }
  else{
      echo '<script>alert("sorry")</script>';
  }

?>
