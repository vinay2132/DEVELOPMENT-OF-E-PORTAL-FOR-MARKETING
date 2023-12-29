<?php
session_start();
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page

if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='entrep')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
   // $email = $_GET['email'];
  

   $company_name = $_POST['company_name'];
   $reference_url = $_POST['reference_url'];
   $additional_contant = $_POST['additional_contant'];
   $file_required = $_POST['file_required'];

   $pname1 = rand(1000,10000)."-".$_FILES["file_required"]["name"];
$tname1 = $_FILES["file_required"]["tmp_name"];
$imageFileType1 = strtolower(pathinfo($pname1,PATHINFO_EXTENSION));

$file_name1 = $_FILES['file_required']['name'];
$uploads_dir = "../enterprenersignin/membersinfo/$email ";
//general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin\membersinfo\daramvinay12@gmail.com
//C:\xampp\htdocs\pp\college_majorproject\general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin\membersinfo\daramvinay12@gmail.com
move_uploaded_file($tname1, $uploads_dir.'/'.$pname1);

$reg="INSERT Into entrepreneurs_webappdesign (email, company_name,  reference_url,additional_contant,file_required) values('$email','$company_name','$reference_url','$additional_contant','$pname1')";
     mysqli_query($db,$reg);
     echo '<script>alert("New record inserted sucessfully")</script>';
     echo "<meta http-equiv='refresh' content='0; url=../enterprenersignin/services.php' />";

}
else{
    echo '<script>alert("Sign in to access")</script>';
   
    echo "<meta http-equiv='refresh' content='0; url=../enterprenersignin/enterprenersignin.html' />";
   
}



?>