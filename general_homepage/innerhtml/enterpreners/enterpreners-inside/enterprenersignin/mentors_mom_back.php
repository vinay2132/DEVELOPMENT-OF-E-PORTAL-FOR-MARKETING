<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
include("../../../../dbconfig.php");
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='mentor')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];

   // use PHPMailer\PHPMailer\PHPMailer;
    date_default_timezone_set('Asia/Kolkata');  
      $current_date = date("d/m/Y H:i:s");
      
        
    $file_name = $_FILES['file']['name'];
    $Email_use_investors = $_POST['Email_use_investors'];
   $other_email = $_POST['other_email'];
   $Email_use = $_POST['Email_use'];
  
    #file name with a random number so that similar dont get replaced
     if( $file_name != "" ){
    $pname = rand(1000,10000)."-" ."$Email_use" ."-".$_FILES["file"]["name"];
     }
     


    #temporary file name to store file

    $tname = $_FILES['file']['tmp_name'];
   
   
    
   
    #=====================================================application/pdf
    
    $imageFileType = strtolower(pathinfo($pname,PATHINFO_EXTENSION));
    
   

  
  
   if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "xml" && $imageFileType != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
         echo '<META http-equiv="refresh" content="0;mentor.php">';
   }
   
   
else{
    #===================================================
   
    $commentfile = $_POST['commentfile'];
   $Email_use = $_POST['Email_use'];

    #demo starts======================================================
  
    $file_name = $_FILES['file']['name'];
   
   
  

     #upload directory path
    $uploads_dir = "membersinfo/$Email_use";
    
   
    #TO move the uploaded file to specific location
    
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    
   

   echo $email;
   echo $Email_use;
   echo $pname;
   echo $commentfile;

$sql = "insert into mom(Mentor_email,Entrepreneur_Email,Email_use_investors,other_email,MOM_file,commentfile,date)values('$email','$Email_use','$other_email','$Email_use_investors','$pname','$commentfile','$current_date')";
  if(mysqli_query($conn,$sql)){
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
            $mail->addAddress($_POST['Email_use']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        $mail->addAddress($_POST['other_email']);
        $mail->addAddress($_POST['Email_use_investors']);
            $mail->isHTML(true);
            $mail->Subject = 'Message Received (Contact Page)';
            $mail->Body = "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='utf-8'> <!-- utf-8 works for most cases -->
                <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
                <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
                <meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
                <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
            
                <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet'>
            
                <!-- CSS Reset : BEGIN -->
            <style>
            p{
                font-size:15px;
            }
            </style>
            
            
            </head>
            
            <body>
            
            <h3>
              Dear $Email_use,
            </h3>
            
            <img src='https://catchemyoung.com/assets/img/entr.jpg'>
            <p>
            Many thanks for registering on CTY.<br>
            As a part of our process of on-boarding the Entrepreneurs, one of our
            Senior team member will reach out to you to understand your business
            and explain the next steps. During the call he will answer any of the
            query you may have.
            <br><br>With best regards
            <br><br><strong>Comment of the file by mentor</strong> &nbsp;&nbsp; $commentfile
            
            <br><br><strong>Form submited by user</strong><a  href='membersinfo/$Email_use/$pname'>&nbsp;&nbsp; $pname</a>
            <p>
              <h3>
                Team CTY.
              </h3>
               <img src='https://catchemyoung.com/assets/img/mail_logo.png'>
              
               
            
            </body>
            </html>  
             
            ";
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
 
}
}

?>