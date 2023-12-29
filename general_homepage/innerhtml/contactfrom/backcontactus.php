<?php
session_start();
include("../../dbconfig.php");
$names = $_POST['names'];
$email = $_POST['email'];
$message = $_POST['message'];
$s = "select * from contact";
$result = mysqli_query($db,$s);
$num=mysqli_num_rows($result);

$reg="INSERT Into contact (names,email,message) values('$names','$email','$message')";
mysqli_query($db,$reg);
echo '<script>alert("New record inserted sucessfully")</script>';
// echo "<meta http-equiv='refresh' content='0; url=contact.html' />";



 

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';


  $names = $_POST['names'];
  $email = $_POST['email'];
  $message = $_POST['message'];

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
    $mail->Subject = 'Digital Trends  (Contact Page)';
    //<h3>Name : $names <br>Email: $email <br>Message : $message</h3>
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
                                        Hi <b>$names</b>; thanks for contacting us and the query you send was <b>$message</b> and we promise you that our team will definatelly get back to you</br>
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
    echo "<meta http-equiv='refresh' content='0; url=thanksforcontact.html' />";
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