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
   
  
}
else{
    echo '<script>alert("Sign in to access")</script>';
   
    echo "<meta http-equiv='refresh' content='0; url=../enterprenersignin/enterprenersignin.html' />";
   
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Apply for job by Colorlib</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Basic details for website design</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="back_enrole_webappdevelopement.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Company Name </div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="company_name" placeholder="This will be the company name reflected in the website ">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Reference URL's</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="reference_url" placeholder="Website's/Linkedin Profiles etc...">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Additional Contant</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="additional_contant" placeholder="Contant given for use "></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Required docunatation</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_required" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload other relevant file. Max file size 50 MB</div>
                            </div>
                        </div>
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Send Application</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->


