<?php

session_start();
include("../../../../dbconfig.php");
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$skills = $_POST['skills'];
$video_link = $_POST['video_link'];
$company_name = $_POST['company_name'];
$stage = $_POST['stage'];
$sector = $_POST['sector'];
$about_founder = $_POST['about_founder'];
$message = $_POST['message'];
$file_memo = $_POST['file_memo'];



use PHPMailer\PHPMailer\PHPMailer;

$s ="select * from entrepreneurs where email = '$email'";//where email = '$email'
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("Someone already register using this email")</script>';
     // echo "<meta http-equiv='refresh' content='0; url=feedback.html' />";
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


     $reg="INSERT Into entrepreneurs (full_name,email, phone,  password,skills,video_link,company_name,stage,sector,about_founder,message,file_memo,vkey,varefied) values('$full_name','$email','$phone','$password','$skills','$video_link','$company_name','$stage','$sector','$about_founder','$message','$pname1','$vkey','$varefied')";
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
    //<h3>Name : $full_name <br>Email: $email <br>Message : $vkey</h3><a href='http://localhost/pp/college_majorproject/general_homepage/innerhtml/enterpreners/enterpreners-inside/enterprenersignin/enterprenervarified.php?vkey=$vkey'>register account</a>
    //$mail -> Body = "<a href='http://localhost/pp/a1/varified.php?vkey=$vkey'>register account</a>";
    $mail->Body = "
       
    <!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <meta name='x-apple-disable-message-reformatting'>
    <title></title>
    <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body style='margin:0;padding:0;'>
    <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
        <tr>
            <td align='center' style='padding:0;'>
                <table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
                    <tr>
                        <td align='center' style='padding:40px 0 30px 0;background:#70bbd9;'>
                            <img src='https://lolaredpr.com/wp-content/uploads/digital-trends-logo.png' alt='' width='300' style='height:auto;display:block;' />
                        </td>
                    </tr>
                    <tr>
                        <td style='padding:36px 30px 42px 30px;'>
                            <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
                                <tr>
                                    <td style='padding:0 0 36px 0;color:#153643;'>
                                        <h1 style='font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;'> Email from Digital Trend</h1>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>
                                        Hi <b>$full_name</b>; thanks for contacting us and the query you send was <b>$message</b> and we promise you that our team will definately get back to you</br>
                                        </p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>
                                        <a href='http://localhost/pp/college_majorproject/general_homepage/innerhtml/enterpreners/enterpreners-inside/enterprenersignin/enterprenervarified.php?vkey=$vkey'>
                                        <button class='button button1'><i>Click Hear to activate your account</i></button>
                                        </a>
                                        </p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>

                                        WE ARE A DIGITAL MARKETING AGENCY WITH A PERSONAL TOUCH
                                        There are many digital marketing agencies who could create online marketing strategies, build websites and apps. But there are few who really take the time to understand who you are.</p>
                                        <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><a href='http://localhost/pp/college_majorproject/general_homepage/index.html' style='color:#ee4c50;text-decoration:underline;'>To Know more about us</a></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding:0;'>
                                        <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
                                            <tr>
                                                <td style='width:260px;padding:0;vertical-align:top;color:#153643;'>
                                                    <p style='margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><img src='https://assets.codepen.io/210284/left.gif' alt='' width='260' style='height:auto;display:block;' /></p>
                                                    <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>Everyone knows that owning a website is a must for every business otherwise you will not be taken seriously by your potential clients. 
                                                    Your website should instantly provide your visitors with the message you are delivering and the information they are seeking instantly. 
                                                       </p>
                                                    <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><a href='http://localhost/pp/college_majorproject/general_homepage/innerhtml/enterpreners/enterpreners.html' style='color:#ee4c50;text-decoration:underline;'>To Know more about....</a></p>
                                                </td>
                                                <td style='width:20px;padding:0;font-size:0;line-height:0;'>&nbsp;</td>
                                                <td style='width:260px;padding:0;vertical-align:top;color:#153643;'>
                                                    <p style='margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><img src='https://assets.codepen.io/210284/right.gif' alt='' width='260' style='height:auto;display:block;' /></p>
                                                    <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>At MW Inc., we take pride in listening, setting goals, and building a digital platform that is truly a mirror of your brand. Innovating strategies that help you achieve your goals is what we’re most passionate about. If you succeed, so do we. Discover the added-value of working with an agency that actually knows you!</p>
                                                    <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><a href='http://localhost/pp/college_majorproject/general_homepage/innerhtml/enterpreners/mentor.html' style='color:#ee4c50;text-decoration:underline;'>To Know more about....</a></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding:30px;background:#ee4c50;'>
                            <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;'>
                                <tr>
                                    <td style='padding:0;width:50%;' align='left'>
                                        <p style='margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;'>
                                            &reg; Someone, Somewhere 2021<br/><a href='http://localhost/pp/college_majorproject/general_homepage/index.html' style='color:#ffffff;text-decoration:underline;'>Subscribe</a>
                                        </p>
                                    </td>
                                    <td style='padding:0;width:50%;' align='right'>
                                        <table role='presentation' style='border-collapse:collapse;border:0;border-spacing:0;'>
                                            <tr>
                                                <td style='padding:0 0 0 10px;width:38px;'>
                                                    <a href='http://www.twitter.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/tw_1.png' alt='Twitter' width='38' style='height:auto;display:block;border:0;' /></a>
                                                </td>
                                                <td style='padding:0 0 0 10px;width:38px;'>
                                                    <a href='http://www.facebook.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/fb_1.png' alt='Facebook' width='38' style='height:auto;display:block;border:0;' /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
    ";
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
