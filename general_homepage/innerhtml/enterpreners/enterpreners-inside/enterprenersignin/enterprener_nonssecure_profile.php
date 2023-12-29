<?php
// Initialize the session
session_start();
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page

   $Email = $_GET['email'];

    $sql = "select * from entrepreneurs where email = '".$Email."'";
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

?>

<html>

<head>
<link rel="shortcut icon" href="../images/favicon.png" />
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
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

        body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
    </style>
</head>

<body>
    <div class="page">
        <header tabindex="0">  <p>
        <a class="logo" style="font-size: 25px;" style="color:#8261ee;"><i class="fa fa-line-chart"></i> <strong>Digital Trend</strong></a>   &emsp; Enterpreners Profile
    </p></header>
        <div id="nav-container">
            <div class="bg"></div>
            <div class="button" tabindex="0">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div id="nav-content" tabindex="0">
                
            </div>
        </div>

       
            <div class="content">
            <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        
                         <br>
                         <br>
                         </br>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information </h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Full name</p>
                                        <h6 class="text-muted f-w-400"><?php echo $full_name;   ?></h6>
                                    </div>
</br>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email address</p>
                                        <h6 class="text-muted f-w-400"><?php echo $email;   ?></h6>
                                    </div>
                                    </br>

                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php echo $phone;   ?></h6>
                                    </div>
                                    </br>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Skill sets </h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Select Skill sets</p>
                                        <h6 class="text-muted f-w-400"><?php echo $skills;   ?></h6>
                                    </div>
                                    </br>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Share video link</p>
                                        <h6 class="text-muted f-w-400"><?php echo $video_link;   ?></h6>
                                    </div>
                                    </br>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Company Details</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Name of the Company:</p>
                                        <h6 class="text-muted f-w-400"><?php echo $company_name;   ?></h6>
                                    </div>
                                    </br>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Stage of the company :</p>
                                        <h6 class="text-muted f-w-400"><?php echo $stage;   ?></h6>
                                    </div>
                                    </br>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Sector :</p>
                                        <h6 class="text-muted f-w-400"><?php echo $sector;   ?></h6>
                                    </div>
                                    </br>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">About the Founders :</p>
                                        <h6 class="text-muted f-w-400"><?php echo $about_founder;   ?></h6>
                                    </div>
                                    </br>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Additional Information </h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">More Info</p>
                                        <h6 class="text-muted f-w-400"><?php echo $message;   ?></h6>
                                    </div>
                                    </br>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Info Memo</p>
                                        <h6 class="text-muted f-w-400"> 
                                           
                                            <a target="_blank" href="membersinfo/<?php echo  $row['file_memo']; ?>?edit=<?php echo  $row['file_memo']; ?>" class="edit_btn" ><?php echo  $row['file_memo']; ?></a>     
                                        </h6>
                                    </div>
                                    </br>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Services Enrol   </h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">More Info</p>
                                        <h6 class="text-muted f-w-400">
                                             <?php
                       $sql = "select * from entrepreneurs_enrole ";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {

    echo $row['service'];
    echo nl2br("\n");
    
   

}
                       }
?>
    </h6>
                                    </div>
                                    </br>
</div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </main>
    </div>
</body>

</html>