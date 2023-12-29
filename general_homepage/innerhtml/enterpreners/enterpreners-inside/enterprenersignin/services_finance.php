<?php
// Initialize the session
session_start();
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='entrep')){
    $Email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
   //$email = $_GET['email'];

    $sql = "select * from entrepreneurs where email = '".$Email."'";
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

$sql1 = "select * from entrepreneurs where mentorship = 'ab' ";
$result3 = $db->query($sql1);
       
$mentorship = $row['mentorship'];

    $sql2 = "select * from entrepreneurs where mentorship = 'abc' ";
    $result2 = $db->query($sql2);
    

  //  if ($result3 ->num_rows > 0){
    if ($mentorship == 'ab'){
    echo '<script>alert("Admin has restriclted you to go please wait")</script>';
    echo "<meta http-equiv='refresh' content='0; url=services.php' />";
   //echo $mentorship ;
  
}
elseif ($mentorship == 'abc'){
    echo '<script>alert("fill the finital due forms")</script>';
   echo "<meta http-equiv='refresh' content='0; url=services_form.php' />";
}
else{
    echo '<script>alert("Fill the form for mentorship we will check and get back to you ")</script>';
    echo "<meta http-equiv='refresh' content='0; url=services_mentorship.php' />";
}
        }
}
else{
    header("location: ../../enterpreners.html");
    exit;
}
?>

