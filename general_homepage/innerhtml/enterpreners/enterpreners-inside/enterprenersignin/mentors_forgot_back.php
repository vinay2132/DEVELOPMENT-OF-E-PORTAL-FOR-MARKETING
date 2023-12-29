<?php

session_start();
include("../../../../dbconfig.php");
$email = $_POST['email'];

use PHPMailer\PHPMailer\PHPMailer;

$s ="select * from mentorship where email = '$email'";//where email = '$email'
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);
$row = $result->fetch_assoc();

$full_name = $row['full_name'];
//$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];
$linkedinlink = $row['linkedinlink'];	
$skills = $row['skills'];
$expertise = $row['expertise'];
$experience = $row['experience'];
$message = $row['message'];
$file_memo = $row['file_memo'];

if($num==1){
    //echo '<script>alert("Someone already register using this email")</script>';
     // echo "<meta http-equiv='refresh' content='0; url=feedback.html' />";
     require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';


$_SESSION['email']=$email;

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
    $mail->Body = "<h3>Name : $full_name <br>Email: $email <br>Message : $message</h3><a href='http://localhost/pp/college_majorproject/general_homepage/innerhtml/enterpreners/enterpreners-inside/enterprenersignin/mentors_reset_password.html?email=$email'>register account</a>";
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
else{
    echo '<script>alert("Someone already register using this email")</script>';
}
?>
