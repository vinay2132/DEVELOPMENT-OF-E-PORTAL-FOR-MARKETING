<?php
// Initialize the session
session_start();
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='mentor')){
    $Email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
   //$email = $_GET['email'];

    $sql = "select * from mentorship where email = '".$Email."'";
    $result1 = $db->query($sql);
        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();

          $full_name = $row['full_name'];
          $email = $row['email'];
          $phone = $row['phone'];
          $password = $row['password'];
          $linkedinlink = $row['linkedinlink'];	
          $skills = $row['skills'];
          $expertise = $row['expertise'];
          $experience = $row['experience'];
          $message = $row['message'];
          $file_memo = $row['file_memo'];
        }
}
else{
    header("location: ../../mentor.html");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Catch 'em Young</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <!----->
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
  <!---->
<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
</script>

<style>
p#personal {
    font-size: 20px;
}

.topnav {
    overflow: hidden;
    /* background-image: url(http://cachemyong.com/wp-content/uploads/2020/05/cropped-contact-bg.jpg); */
    background-color: rgb(106, 115, 218);
    padding-top: 15.188px;
}

.topnav a {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 20px;
    margin-top: -46px;
    font-family: times-new-roman;
    font-weight: bolder;
}

.topnav a:hover {
  color: #d8d0d0;
}

.topnav a.active {
    color: white;
    border-bottom: 3px solid #03a9f4;
}

.topnav .icon {
  display: none;
}


/**/
h4#head {
    color: white;
    font-family: Muli,sans-serif;
    margin-left: 25px;
    font-size: 23px;
}

.col-md-3 {
    display: inline-block;
    border-right: 1px solid #655757;
    padding: 19px;
    margin-top: 53px;
}
.fa-map-marker:before {
    content: "\f041";
    font-size: 28px;
}
.fa-envelope-o:before {
    content: "\f003";
  font-size: 28px;
}
.fa-phone:before {
    content: "\f095";
  font-size: 28px;
}
a.mesmerize-theme-link {
    color: white;
}
h2#head2 {
    font-family: times-new-roman;
    font-weight: bolder;
    text-align: center;
    font-size: 25px;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    font-family: times-new-roman;
    font-size: 18px;
    font-weight: bold;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

footer {
    background-color: #333;
    padding: 7px;
    text-align: center;
    color: white;
    position: absolute;
    width: 99%;
  height: 249px
}
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
    padding: 11px 28px 11px 31px;
    margin-top: 20px;
}
input[type=checkbox], input[type=radio] {
    margin: 5px 2px 2px 37px;
    margin-top: 1px\9;
    line-height: normal;
}

body {
  font-family: arial;
}
.hide {
  display: none;
}
p {
  font-weight: bold;
}
hr {
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
}
.contnr {
    margin-top: 35px;
}
p#par1 {
    font-size: 17px;
}
h4#head12 {
    float: right;
    margin-right: -590px;
    color: white;
    font-family: Muli,sans-serif;
    font-size: 39px;
    margin-bottom: 17px;
    margin-top: 28px;
    /* font-weight: bold; */
}
.topnav {
    transform: translateZ(0);
    box-shadow: 0 0 5px 2px rgba(0,0,0,.33);
}
img#img12 {
    width: 8%;
    height: 61px;
    margin-left: 59px;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 768px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: table-caption;
    text-align: left;
    margin-top: -10px;
    margin-bottom: -6px;
}
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    font-family: times-new-roman;
    font-size: 18px;
    font-weight: bold;
    margin-left: 9px;
}
.form-control {
    display: block;
    width: 92%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    margin-left: 10px;
}
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
    padding: 11px 28px 11px 31px;
    margin-top: 20px;
    margin-left: 12px;
}
footer {
    background-color: #333;
    padding: 7px;
    text-align: center;
    color: white;
    position: absolute;
    width: 99%;
    height: auto;
}
.topnav {
    overflow: auto;
    background-color: rgb(106, 115, 218);
    height: auto;
}
.topnav.responsive {
    position: initial;
    z-index: 3;
    overflow: auto;
    width: 100%;
}
.topnav a.active {
    color: white;
    border-bottom: none;
}
h4#head12 {
    float: right;
    margin-right: 48px;
    color: white;
    font-family: Muli,sans-serif;
    font-size: 24px;
    margin-bottom: 17px;
    margin-top: 28px;
    /* font-weight: bold; */
}
img#img12 {
    width: 34%;
    height: 61px;
    margin-left: 59px;
}
}

.formarea {
    width: 60%;
    margin: 0 auto;
    background-color: transparent;
    text-align: center;
    padding: 4%;
    border-radius: 5px;
}

#bararea {
    width: 100%;
    height: 40px;
    border:  gray;
    border-radius: 30px;
}

#bar {
    width: 1%;
    margin: 4px 0;
    height: 32px;
    background-color: #FF4500;
    border-radius: 30px;
}

#status {
    color: black;
}
</style>
</head>
<body>

<div class="logo mr-auto" style="padding:10px;">
       <a href="index.html"><img src="https://catchemyoung.com/assets/img/logo.png" alt="" class="img-fluid" style="width:80px;height:60px;text-align:center;"></a>
      </div>

<div class="container" id="con1">
<div class="row">

    <a href="mentorship_services.php"><button type="button" class="btn btn-danger btn-lg">Dashboard</button></a>  &emsp;
    <a href="mentorship_services_enterpreners_momview.php"><button type="button" class="btn btn-primary btn-lg">View Enterpreners MOM's</button></a>
  
<h2 id="head2">Mentoring Form</h2> </div>
<h4><center><u>Enterpreners Meeting details</u></center></h4>

<div class="contnr">
<div class="row">

<form method="POST" action="mentors_mom_back.php" enctype="multipart/form-data">

  <p id="personal"><u></u></p><br> 
  

 
     <div class="form-row">
    <div class="form-group col-md-6">
         <label for="email">Entrepreneur's Email</label>
      <?php
//$mysqli = NEW MYSQLi('localhost','cmy_user','36p1c(KaHSoh','cmy');

$resultSet = $db ->query("SELECT email FROM entrepreneurs");

?>

<select name="Email_use" class="form-control">
<?php
while($row = $resultSet -> fetch_assoc())
{
    $email = $row['email'];
    echo "<option value = '$email'>$email</option>";
}
?>
</select>
      </div>
      <div class="form-group col-md-6">
         <label for="email">Investors Email</label>
      <?php
//$mysqli = NEW MYSQLi('localhost','cmy_user','36p1c(KaHSoh','cmy');

$resultSet = $db ->query("SELECT email FROM investor");

?>

<select name="Email_use_investors" class="form-control">
<?php
while($row = $resultSet -> fetch_assoc())
{
    $email = $row['email'];
    echo "<option value = '$email'>$email</option>";
}
?>
</select>
      </div>
      <div class="form-group col-md-6">
         <label for="email">MOM of the meeting document

</label>
      
         <input type="file" class="form-control" name="file" accept=".doc,.docx,.xml,.pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document/pdf">
      </div>
       
      </div>

       <div class="form-group col-md-6">
         <label for="email">Others Email addresses

</label>
      
         <input type="email" class="form-control" name="other_email" placeholder = "Others Email id's" >
      </div>
       
      </div>
      
      
     <div class="form-row">
       <div class="form-group col-md-6">
         <label for="email">Comments for this file</label>
      <textarea rows="3" cols="50" name="commentfile"  class="form-control" placeholder="enter text"></textarea>
      </div>
      </div>
      
 
   
</br>

  </br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="submit" class="btn btn-danger btn-lg">&nbsp;&nbsp;
    
  
  </form> 

</div>

</div>

<br><br>


<script src="Script/script.js"></script>


</body>
</html>

