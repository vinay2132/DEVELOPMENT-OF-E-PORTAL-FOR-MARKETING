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

$email = $_GET['email'];

$sql = "select * from entrepreneurs where email = '".$email."'";

    $result1 = $db->query($sql);
        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();

         $full_name = $row['full_name'];
$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];

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


    $reg="  DELETE from  entrepreneurs where email = '".$email."'";
    mysqli_query($db,$reg);
    echo '<script>alert("New record inserted sucessfully")</script>';
    echo "<meta http-equiv='refresh' content='0; url=entrepreneur_profile.php' />";
   
  }
  else{
      echo '<script>alert("sorry")</script>';
  }

?>
