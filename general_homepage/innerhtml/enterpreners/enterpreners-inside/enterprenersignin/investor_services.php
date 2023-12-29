<?php
// Initialize the session
session_start();
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='investor')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
   // $email = $_GET['email'];

    $sql = "select * from investor where email = '".$email."'";
    $result1 = $db->query($sql);
        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();

          $full_name = $row['full_name'];
          //$email = $row['email'];
          $phone = $row['phone'];
          $password = $row['password'];
          $linkedin = $row['linkedin'];
          $stage = $row['stage'];
          $investment = $row['investment'];
          //$experience = $row['experience'];
          $message = $row['message'];
          $file_memo = $row['file_memo'];
        }
}
else{
    header("location: ../../investor.html");
    exit;
}
?>
 
 <html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Encode+Sans+Condensed:400,600');
        * {
            outline: none;
        }
        
        strong {
            font-weight: 600;
        }
        
        .page {
            width: 100%;
            height: 100vh;
            background: #fdfdfd;
            font-family: 'Encode Sans Condensed', sans-serif;
            font-weight: 600;
            letter-spacing: .03em;
            color: #212121;
        }
        
        header {
            display: flex;
            position: fixed;
            width: 100%;
            height: 70px;
            background: #212121;
            color: #fff;
            justify-content: center;
            align-items: center;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        
        main {
            padding: 70px 20px 0;
            display: flex;
            flex-direction: column;
            height: 100%;
            
        }
        
        main>div {
            margin: auto;
            max-width: 600px;
        }
        
        main h2 span {
            color: #BF7497;
        }
        
        main p {
            line-height: 1.5;
            font-weight: 200;
            margin: 20px 0;
        }
        
        main small {
            font-weight: 300;
            color: #888;
        }
        
        #nav-container {
            position: fixed;
            height: 100vh;
            width: 100%;
            pointer-events: none;
        }
        
        #nav-container .bg {
            position: absolute;
            top: 70px;
            left: 0;
            width: 100%;
            height: calc(100% - 70px);
            visibility: hidden;
            opacity: 0;
            transition: .3s;
            background: #000;
        }
        
        #nav-container:focus-within .bg {
            visibility: visible;
            opacity: .6;
        }
        
        #nav-container * {
            visibility: visible;
        }
        
        .button {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 1;
            -webkit-appearance: none;
            border: 0;
            background: transparent;
            border-radius: 0;
            height: 70px;
            width: 30px;
            cursor: pointer;
            pointer-events: auto;
            margin-left: 25px;
            touch-action: manipulation;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        
        .dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

        .icon-bar {
            display: block;
            width: 100%;
            height: 3px;
            background: #aaa;
            transition: .3s;
        }
        
        .icon-bar+.icon-bar {
            margin-top: 5px;
        }
        
        #nav-container:focus-within .button {
            pointer-events: none;
        }
        
        #nav-container:focus-within .icon-bar:nth-of-type(1) {
            transform: translate3d(0, 8px, 0) rotate(45deg);
        }
        
        #nav-container:focus-within .icon-bar:nth-of-type(2) {
            opacity: 0;
        }
        
        #nav-container:focus-within .icon-bar:nth-of-type(3) {
            transform: translate3d(0, -8px, 0) rotate(-45deg);
        }
        
        #nav-content {
            margin-top: 70px;
            padding: 20px;
            width: 90%;
            max-width: 300px;
            position: absolute;
            top: 0;
            left: 0;
            height: calc(100% - 70px);
            background: #ececec;
            pointer-events: auto;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            transform: translateX(-100%);
            transition: transform .3s;
            will-change: transform;
            contain: paint;
        }
        
        #nav-content ul {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        #nav-content li a {
            padding: 10px 5px;
            display: block;
            text-transform: uppercase;
            transition: color .1s;
        }
        
        #nav-content li a:hover {
            color: #BF7497;
        }
        
        #nav-content li:not(.small)+.small {
            margin-top: auto;
        }
        
        .small {
            display: flex;
            align-self: center;
        }
        
        .small a {
            font-size: 12px;
            font-weight: 400;
            color: #888;
        }
        
        .small a+a {
            margin-left: 15px;
        }
        
        #nav-container:focus-within #nav-content {
            transform: none;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        html,
        body {
            height: 100%;
        }
        
        a,
        a:visited,
        a:focus,
        a:active,
        a:link {
            text-decoration: none;
            outline: 0;
        }
        
        a {
            color: currentColor;
            transition: .2s ease-in-out;
        }
        
        h1,
        h2,
        h3,
        h4 {
            margin: 0;
        }
        
        ul {
            padding: 0;
            list-style: none;
        }
        
        img {
            vertical-align: middle;
            height: auto;
            width: 100%;
        }




.aaa {
  overflow: hidden;
  background: #bcdee7 url("../img/bg.jpg") no-repeat center center fixed;
  background-size: cover;
  position: fixed;
  padding: 0px;
  margin: 0px;
  width: 100%;
  height: 100%;
  font: normal 14px/1.618em "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
}

.aaa:before {
  content: "";
  height: 0px;
  padding: 0px;
  border: 130em solid #313440;
  position: absolute;
  left: 50%;
  top: 100%;
  z-index: 2;
  display: block;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-animation: puff 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
  animation: puff 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
}

h1,
h2 {
  font-weight: 500;
  margin: 0px 0px 5px 0px;
}

h1 {
  font-size: 24px;
}

h2 {
  font-size: 16px;
}

p {
  margin: 0px;
}

.profile-card {
  background: #FFB300;
  width: 56px;
  height: 56px;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 2;
  overflow: hidden;
  opacity: 0;
  margin-top: 70px;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
  -webkit-animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
  animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
}

.profile-card header {
  width: 179px;
  height: 280px;
  padding: 40px 20px 30px 20px;
  display: inline-block;
  float: left;
  border-right: 2px dashed #EEEEEE;
  background: #FFFFFF;
  color: #000000;
  margin-top: 50px;
  opacity: 0;
  text-align: center;
  -webkit-animation: moveIn 1s 3.1s ease forwards;
  animation: moveIn 1s 3.1s ease forwards;
}

.profile-card header h1 {
  color: #FF5722;
}

.profile-card header a {
  display: inline-block;
  text-align: center;
  position: relative;
  margin: 25px 30px;
}

.profile-card header a:after {
  position: absolute;
  content: "";
  bottom: 3px;
  right: 3px;
  width: 20px;
  height: 20px;
  border: 4px solid #FFFFFF;
  -webkit-transform: scale(0);
  transform: scale(0);
  background: -webkit-linear-gradient(top, #f38721 0%, #ffff 50%, #ffff 50%, #07ff26 100%);
  background: linear-gradient(#f38721 0%, #ffff 50%, #ffff 50%, #07ff26 100%);
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
  -webkit-animation: scaleIn 0.3s 3.5s ease forwards;
  animation: scaleIn 0.3s 3.5s ease forwards;
}

.profile-card header a > img {
  width: 120px;
  max-width: 100%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -webkit-transition: -webkit-box-shadow 0.3s ease;
  transition: box-shadow 0.3s ease;
  -webkit-box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
  box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
}

.profile-card header a:hover > img {
  -webkit-box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
}

.profile-card .profile-bio {
  width: 175px;
  height: 180px;
  display: inline-block;
  float: right;
  padding: 50px 20px 30px 20px;
  background: #FFFFFF;
  color: #333333;
  margin-top: 50px;
  text-align: center;
  opacity: 0;
  -webkit-animation: moveIn 1s 3.1s ease forwards;
  animation: moveIn 1s 3.1s ease forwards;
}

.profile-social-links {
  width: 218px;
  display: inline-block;
  float: right;
  margin: 0px;
  padding: 15px 20px;
  background: #FFFFFF;
  margin-top: 50px;
  text-align: center;
  opacity: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-animation: moveIn 1s 3.1s ease forwards;
  animation: moveIn 1s 3.1s ease forwards;
}

.profile-social-links li {
  list-style: none;
  margin: -5px 0px 0px 0px;
  padding: 0px;
  float: left;
  width: 25%;
  text-align: center;
}

.profile-social-links li a {
  display: inline-block;
  color: red;
  width: 24px;
  height: 24px;
  padding: 6px;
  position: relative;
  overflow: hidden!important;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}

.profile-social-links li a i {
  position: relative;
  z-index: 1;
}

.profile-social-links li a img,
.profile-social-links li a svg {
  width: 24px;
}

@-webkit-keyframes init {
  0% {
    width: 0px;
    height: 0px;
  }
  100% {
    width: 56px;
    height: 56px;
    margin-top: 0px;
    opacity: 1;
  }
}

@keyframes init {
  0% {
    width: 0px;
    height: 0px;
  }
  100% {
    width: 56px;
    height: 56px;
    margin-top: 0px;
    opacity: 1;
  }
}

@-webkit-keyframes puff {
  0% {
    top: 100%;
    height: 0px;
    padding: 0px;
  }
  100% {
    top: 50%;
    height: 100%;
    padding: 0px 100%;
  }
}

@keyframes puff {
  0% {
    top: 100%;
    height: 0px;
    padding: 0px;
  }
  100% {
    top: 50%;
    height: 100%;
    padding: 0px 100%;
  }
}

@-webkit-keyframes borderRadius {
  0% {
    -webkit-border-radius: 50%;
  }
  100% {
    -webkit-border-radius: 0px;
  }
}

@keyframes borderRadius {
  0% {
    -webkit-border-radius: 50%;
  }
  100% {
    border-radius: 0px;
  }
}

@-webkit-keyframes moveDown {
  0% {
    top: 50%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 100%;
  }
}

@keyframes moveDown {
  0% {
    top: 50%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 100%;
  }
}

@-webkit-keyframes moveUp {
  0% {
    background: #FFB300;
    top: 100%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 50%;
    background: #E0E0E0;
  }
}

@keyframes moveUp {
  0% {
    background: #FFB300;
    top: 100%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 50%;
    background: #E0E0E0;
  }
}

@-webkit-keyframes materia {
  0% {
    background: #E0E0E0;
  }
  50% {
    -webkit-border-radius: 4px;
  }
  100% {
    width: 440px;
    height: 280px;
    background: #FFFFFF;
    -webkit-border-radius: 4px;
  }
}

@keyframes materia {
  0% {
    background: #E0E0E0;
  }
  50% {
    border-radius: 4px;
  }
  100% {
    width: 440px;
    height: 280px;
    background: #FFFFFF;
    border-radius: 4px;
  }
}

@-webkit-keyframes moveIn {
  0% {
    margin-top: 50px;
    opacity: 0;
  }
  100% {
    opacity: 1;
    margin-top: -20px;
  }
}

@keyframes moveIn {
  0% {
    margin-top: 50px;
    opacity: 0;
  }
  100% {
    opacity: 1;
    margin-top: -20px;
  }
}

@-webkit-keyframes scaleIn {
  0% {
    -webkit-transform: scale(0);
  }
  100% {
    -webkit-transform: scale(1);
  }
}

@keyframes scaleIn {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}

@-webkit-keyframes ripple {
  0% {
    transform: scale3d(0, 0, 0);
  }
  50%,
  100% {
    -webkit-transform: scale3d(1, 1, 1);
  }
  100% {
    opacity: 0;
  }
}

@keyframes ripple {
  0% {
    transform: scale3d(0, 0, 0);
  }
  50%,
  100% {
    transform: scale3d(1, 1, 1);
  }
  100% {
    opacity: 0;
  }
}

@media screen and (min-aspect-ratio: 4/3) {
  body {
    background-size: cover;
  }
  body:before {
    width: 0px;
  }
  @ -webkit-keyframes puff {
    0% {
      top: 100%;
      width: 0px;
      padding-bottom: 0px;
    }
    100% {
      top: 50%;
      width: 100%;
      padding-bottom: 100%;
    }
  }
  @keyframes puff {
    0% {
      top: 100%;
      width: 0px;
      padding-bottom: 0px;
    }
    100% {
      top: 50%;
      width: 100%;
      padding-bottom: 100%;
    }
  }
}

@media screen and (min-height: 480px) {
  .profile-card header {
    width: auto;
    height: auto;
    padding: 178px 50px;
    display: block;
    float: none;
    border-right: none;
  }
  .profile-card .profile-bio {
    width: auto;
    height: auto;
    padding: 20px 20px 10px 20px;
    display: block;
    float: none;
  }
  .profile-social-links {
    width: 100%;
    display: block;
    float: none;
  }
  @ -webkit-keyframes materia {
    0% {
      background: #E0E0E0;
    }
    50% {
      -webkit-border-radius: 4px;
    }
    100% {
      width: 280px;
      height: 440px;
      background: #FFFFFF;
      -webkit-border-radius: 4px;
    }
  }
  @keyframes materia {
    0% {
      background: #E0E0E0;
    }
    50% {
      border-radius: 4px;
    }
    100% {
      width: 280px;
      height: 440px;
      background: #FFFFFF;
      border-radius: 4px;
    }
  }
}
    </style>
</head>

<body>
    <div class="page">
    <header tabindex="0">
        <p>
        <a class="logo" style="font-size: 25px;" style="color:#8261ee;"><i class="fa fa-line-chart"></i> <strong>Digital Trend</strong></a>   &emsp; Investor Dashboard
    </p>
    </header>
        <div id="nav-container">
            <div class="bg"></div>
            <div class="button" tabindex="0">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div id="nav-content" tabindex="0">
                <ul>
                    <li><a href="#0">Dashboard</a></li>
                    <li><a href="investor_services_profile.php ">Your Profile</a></li>
                   
                    <li><a href = "investor_mom_view.php">MOM Services</a></li>
                    <li><a href = "investor_view_contact.php">View Contact</a></li>
 
                    <li><a href="../../../../index.html">Home</a></li>
                    <li><a href="services_logout.php">Log Out</a></li>
                    <li class="small"><a href="#0">Facebook</a><a href="#0">Instagram</a></li>
                </ul>
            </div>
        </div>

        <main>
        <br>
            <br>
            <div class="content">
         
            <div calss = "aaa">
            <aside class="profile-card">
  <header>
    <!-- here’s the avatar -->
    <a target="_blank" href="investor_share_profile.php">
      <img src="https://cdn.dribbble.com/users/2788963/screenshots/6829123/characterheadgif3.gif" class="hoverZoomLink">
    </a>

    <!-- the username -->
    <h1>
            <?php echo $full_name; ?>
          </h1>

    <!-- and role or location -->
    <h2>
            <?php echo $email  ?>          </h2>

  </header>

  <!-- bit of a bio; who are you? -->
  <div class="profile-bio">

    <p>
     Intrested in: <?php echo $stage ?>
</br>
     Investement : <?php  echo $investment; ?></br>
     Linkedin  :<?php echo $linkedin  ?></br>
    </p>

  </div>

  <!-- some social links to show off -->
  <ul class="profile-social-links">
    <li>
      <a target="_blank" href="https://www.facebook.com/creativedonut">
        <i class="fa fa-facebook"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://twitter.com/dropyourbass">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://github.com/vipulsaxena">
        <i class="fa fa-github"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://www.behance.net/vipulsaxena">
       
        <i class="fa fa-behance"></i>
      </a>
    </li>
  </ul>
</aside>
</div>
            </div>
        </main>
    </div>
    
</body>

</html>