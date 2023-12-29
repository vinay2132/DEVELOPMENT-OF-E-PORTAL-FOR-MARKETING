<?php
// Initialize the session
session_start();
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
?>

<html>
<head>
<style>
*{
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

body, html{
  background:#9c27b0;
  font-family: 'Open Sans', sans-serif;
}

.container{
  width:400px;
  height:500px;
  background:#fff;
  margin:20px auto;
  border-radius:4px;
  text-align:center;
  position:relative;
  -moz-box-shadow: 0px 0px 28px rgba(0,0,0,.3);
  -webkit-box-shadow: 0px 0px 28px rgba(0,0,0,.3);
   box-shadow: 0px 0px 28px rgba(0,0,0,.3);
   overflow:hidden;
}


.one , .two{
  display:block;
  height:500px;
  width:400px;
  margin:0px auto;
  position:absolute;
  -webkit-transition: all 600ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
  transition:         all 600ms cubic-bezier(0.175, 0.885, 0.32, 1.275); 
}

.one{
  top:0;
  background:#fff;
  margin-top:20px;
}

.two{
  top:500px;
  background:#ffc107;
}

.two h3{
  color:#fff;
  padding-top:240px;
}

.container .logo{
  width:40%;
  height:auto;
  display:block;
  margin:20px auto;
}

.one  .heading{
  color:#607d8b;
  text-transform:capitalize;
  font-size:20px;
  fonr-weight:900;
  margin-top:40px;
}

.container p{
  font-size:12px;
  color:#b7b7b7;
  font-weight:lighter;
  text-transform:capitalize;
}

input[type='text']{
  width:85%;
  height:60px;
  margin-top:20px;
  margin-bottom:20px;
  padding-bottom:-80px;
  border:none;
  border-bottom:3px solid #ffc107;
  overflow:auto;
  position:relative;
}





input[type='text']:active:focus,
input[type='text']:focus,
input[type='text']:hover{
  outline : none;
  font-size:20px;
}



input[type='text']:focus::-webkit-input-placeholder,
input[type='text']:active:focus::-webkit-input-placeholder
{
  font-size:12px;
  display:block;
  -webkit-transform:translateY(-20px);
  transform:translateY(-20px);
}

::-webkit-placeholder{
  font-size:14px;
  color:#b7b7b7;
  text-transform:capitalize;
  -webkit-transform:translateY(0px);
  transform:translateY(0px);
  -webkit-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out; 
}

::placeholder{
  font-size:14px;
  color:#b7b7b7;
  text-transform:capitalize;
  -webkit-transform:translateY(0px);
  transform:translateY(0px);
  -webkit-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out; 
}

.one  .btn{
  width:85%;
  background:#ffc107;
  padding:15px;
  border:none;
  border-radius:5px;
  font-size:14px;
  color:#fff;
  text-transform:capitalize;
  font-family: 'Open Sans', sans-serif;
}

.one  .btn:active:focus,
.one  .btn:focus,
.one  .btn:hover{
  outline : none;
}

.one .btn:hover{
  cursor:pointer;
}

.close{
  position:relative;
  top:0;
  left:0;
  display:block;
  cursor:pointer;
}

.close:before{
  content:"";
  position:absolute;
  top:-240px;
  right:50px;
  display:block;
  width:22px;
  height:3px;
  background:#fff;
  -webkit-transform:rotate(45deg);
  transform:rotate(45deg);
}

.close:after{
  content:"";
  position:absolute;
  top:-240px;
  right:50px;
  display:block;
  width:22px;
  height:3px;
  background:#fff;
  -webkit-transform:rotate(-45deg);
  transform:rotate(-45deg);
}
</style>
</head>

<body>
<section class="container">
 <section class="one">
  <div class="logo">
    <img src="https://image.flaticon.com/icons/svg/143/143361.svg">
  </div>
  <h2 class="heading">
    please subscribe to get updates
  </h2>
  <p> signup with your email to get latest updates 
  </p>
  <form action="services_mentorship_back.php" method="POST">
    <input type='text' placeholder="enter your email"   name = "mentor_describe"><br/>
    <button class="btn" role="button">
      subscribe
    </button>
  </form>
  </section>
  <section class="two">
    <h3>
      thank you for subscribing !
    </h3>
    <div class="close"> 
    </div>
  </section>
</section>

<script>
$(function(){
  $('.one form .btn').on('click',function(){ 
     $(this).parents('.one').animate({
          top : '-500px'
        },500);
    
                                          $(this).parents('.one').siblings('.two').
     animate({
          top : '0px'
        },500);
    return false;
  });

$('.two .close').on('click',function(){
  $(this).parent().animate({
   top : '-500px'
  },500);
  
  $(this).parent().siblings('.one').animate({
   top : '0px'
  },500);
  return false;
 });
});

    </script>
    
</body>

</html>