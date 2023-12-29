<?php
// Initialize the session
session_start();
use PHPMailer\PHPMailer\PHPMailer;
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='entrep')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
   // $email = $_GET['email'];

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
        }
}
else{
    header("location: ../../enterpreners.html");
    exit;
}


$send_email = $_POST['send_email'];
$send_identity = 'Others';
date_default_timezone_set('Asia/Kolkata');  
      $date = date("d/m/Y H:i:s");

$reg="INSERT Into share_profile (email, acctype,  send_email,send_identity,date) values('$email','$acctype','$send_email','$send_identity','$date')";
mysqli_query($db,$reg);
echo '<script>alert("New record inserted sucessfully")</script>';

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
    $mail->addAddress($_POST['send_email']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $full_name <br>Email: $email <br>Message : $vkey</h3><a href='http://localhost/pp/college_majorproject/general_homepage/innerhtml/enterpreners/enterpreners-inside/enterprenersignin/enterprener_nonssecure_profile.php?email=$email' target='_blank'>register account</a>";
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



?>
