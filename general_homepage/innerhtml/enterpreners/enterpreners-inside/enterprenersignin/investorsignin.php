<?php

session_start();
include("../../../../dbconfig.php");
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$linkedin = $_POST['linkedin'];
$stage = $_POST['stage'];
$investment = $_POST['investment'];
$message = $_POST['message'];
$file_memo = $_POST['file_memo'];



use PHPMailer\PHPMailer\PHPMailer;

$s ="select * from entrepreneurs where email = '$email'";//where email = '$email'
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("Some enterprener already register using this email")</script>';
    echo "<meta http-equiv='refresh' content='0; url=../../enterpreners.html' />";
    exit("Unable to connect to");
}
$ss ="select * from mentorship where email = '$email'";//where email = '$email'
$results = mysqli_query($db,$ss);
$nums=mysqli_num_rows($results);
 if($nums == 1){

  echo '<script>alert("Some mentor already register using this email")</script>';
  echo "<meta http-equiv='refresh' content='0; url=../../mentor.html' />";
      exit("Unable to connect to");

}
$ss ="select * from investor where email = '$email'";//where email = '$email'
$results = mysqli_query($db,$ss);
$nums=mysqli_num_rows($results);
 if($nums == 1){
  echo '<script>alert("Some investor already register using this email")</script>';
  echo "<meta http-equiv='refresh' content='0; url=../../investor.html' />";
      exit("Unable to connect to");

}
else if($password != $repassword){
   
        echo '<script>alert("password doent match")</script>';
    }

else{
    $vkey =md5(time().$email);
         $password = md5($password);
         $varefied = 0;

         $pname1 = rand(1000,10000)."-".$_FILES["file_memo"]["name"];
$tname1 = $_FILES["file_memo"]["tmp_name"];
$imageFileType1 = strtolower(pathinfo($pname1,PATHINFO_EXTENSION));

$file_name1 = $_FILES['file_memo']['name'];
$uploads_dir = "membersinfo";
move_uploaded_file($tname1, $uploads_dir.'/'.$pname1);


     $reg="INSERT Into investor (full_name,email, phone,  password,stage,investment ,message,file_memo,vkey,varefied) values('$full_name','$email','$phone','$password','$stage','$investment','$message','$pname1','$vkey','$varefied')";
     mysqli_query($db,$reg);
     echo '<script>alert("New record inserted sucessfully")</script>';
     // echo "<meta http-equiv='refresh' content='0; url=feedback.html' />";
     
    

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';




  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vinayd.vef@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'openvinayd.vef@1'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('vinayd.vef@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($_POST['email']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $full_name <br>Email: $email <br>Message : $vkey</h3><a href='http://localhost/pp/college_majorproject/general_homepage/innerhtml/enterpreners/enterpreners-inside/enterprenersignin/investorvarified.php?vkey=$vkey'>register account</a>";
    //$mail -> Body = "<a href='http://localhost/pp/a1/varified.php?vkey=$vkey'>register account</a>";
    if($mail->send())
{
    echo "<meta http-equiv='refresh' content='0; url= ../../../contactfrom/thanksforcontact.html' />";
} 
  
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }


}
?>
