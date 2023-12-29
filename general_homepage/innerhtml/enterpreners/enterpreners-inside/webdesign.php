<?php
// Initialize the session
session_start();
include("../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='entrep')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];
   // $email = $_GET['email'];

   $sql = "select * from  entrepreneurs_enrole where service_accept = 'abc' && service = 'webappdesign' ";
   $result = mysqli_query($db,$sql);
   $num=mysqli_num_rows($result);
   
   
      
   if($num == 1){
    echo '<script>alert("Admin has accepted you for this service")</script>';
    echo "<meta http-equiv='refresh' content='0; url=enrole/enrole_webappdesign.php' />";
   }

}
else{
    echo '<script>alert("Sign in to access")</script>';
   
    echo "<meta http-equiv='refresh' content='0; url=enterprenersignin/enterprenersignin.html' />";
   
}
?>




    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

        <title>Digital Trend</title>
        <!--
SOFTY PINKO
https://templatemo.com/tm-535-softy-pinko
-->

        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="../../../assets/css/font-awesome.css">

        <link rel="stylesheet" href="../../../assets/css/templatemo-softy-pinko.css">

        <style>
            .hero {
                position: relative;
                padding: 9em 0;
                overflow: hidden;
            }
            
            .hero-bg {
                background: linear-gradient(170deg, var(--primary-color) 70%, var(--white-color) 30%);
            }
            
            .hero-image {
                position: relative;
                top: 2em;
            }
            
            .a {
                background: var(--menu-bg);
                z-index: 2;
                top: 0;
                right: 0;
                left: 0;
            }
            /* BUTTON */
            
            .aaa {
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: #ffffff;
                font-family: sans-serif;
            }
            
            .custom-btn {
                background: transparent;
                border: 2px solid var(--dark-color);
                border-radius: var(--border-radius-large);
                padding: 12px 26px 14px 26px;
                color: var(--dark-color);
                font-family: var(--title-font-family);
                font-size: var(--p-font-size);
                white-space: nowrap;
            }
            
            .custom-btn.btn-bg {
                background: var(--white-color);
                color: var(--primary-color);
                border-color: transparent;
                transition: all .3s ease;
            }
            
            .custom-btn:hover,
            .custom-btn:focus {
                background: var(--dark-color);
                color: var(--white-color);
                border-color: transparent;
            }
            
             :root {
                --background-dark: #ffffff;
                --text-light: rgba(255, 255, 255, 0.6);
                --text-lighter: rgba(255, 255, 255, 0.9);
                --spacing-s: 8px;
                --spacing-m: 16px;
                --spacing-l: 24px;
                --spacing-xl: 32px;
                --spacing-xxl: 64px;
                --width-container: 1200px;
            }
            
            * {
                border: 0;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            .boxxx {
                width: 1200px;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                grid-gap: 15px;
                margin: 0 auto;
            }
            
            .cardxx {
                position: relative;
                width: 300px;
                height: 350px;
                background: #fff;
                margin: 0 auto;
                border-radius: 4px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
            }
            
            .cardxx:before,
            .cardxx:after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border-radius: 4px;
                background: #fff;
                transition: 0.5s;
                z-index: -1;
            }
            
            .cardxx:hover:before {
                transform: rotate(20deg);
                box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
            }
            
            .cardxx:hover:after {
                transform: rotate(10deg);
                box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
            }
            
            .cardxx .imgBx {
                position: absolute;
                top: 10px;
                left: 10px;
                bottom: 10px;
                right: 10px;
                background: #222;
                transition: 0.5s;
                z-index: 1;
            }
            
            .cardxx:hover .imgBx {
                bottom: 80px;
            }
            
            .cardxx .imgBx img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .cardxx .details {
                position: absolute;
                left: 10px;
                right: 10px;
                bottom: 10px;
                height: 60px;
                text-align: center;
            }
            
            .cardxx .details h2 {
                margin: 0;
                padding: 0;
                font-weight: 600;
                font-size: 20px;
                color: #777;
                text-transform: uppercase;
            }
            
            .cardxx .details h2 span {
                font-weight: 500;
                font-size: 16px;
                color: #f38695;
                display: block;
                margin-top: 5px;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    </head>

    <body>

        <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->


        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky">
            <div class="a"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->

                            <!--<img src="assets/images/logo.png" alt="Softy Pinko"/>-->

                            <a class="logo" style="font-size: 25px;" style="color:#8261ee;"><i class="fa fa-line-chart"></i> <strong>Digital Trend</strong></a>

                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li><a href="../../../index.html">Home</a></li>
                                <li><a href="../../../aboutus.html">About</a></li>
                                <li><a href="../enterpreners.html" class="active">Entrepreneurs</a></li>
                                <li><a href="../mentor.html">Mentor</a></li>
                                <li><a href="../investor.html">Investor</a></li>
                                <li><a href="#blog">Blog Entries</a></li>
                                <li><a href="#contact-us">Contact Us</a></li>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->

        <!-- ***** Welcome Area Start ***** -->

        <section class="hero hero-bg d-flex justify-content-center align-items-center" style="
    padding-bottom: 30px;
">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                        <div class="hero-text">

                            <h1 class="text-white aos-init aos-animate" data-aos="fade-up">A QUALITY WEBSITE IS NOT AN EXPENSE IT'S AN INVESTMENT</h1>
                            <br>

                            <!--<strong class="d-block py-3 pl-5 text-white aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-phone mr-2"></i> +99 080 070 4224</strong>-->
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="hero-image aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">

                            <img src="https://www.impigertech.com/sites/default/files/2019-08/Web%20App%3Bications.png" class="img-fluid" alt="working girl">
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- ***** Features Big Item End ***** -->

        <br>
        <br>
        <section class="section padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                        <div class="left-heading">
                            <h2 class="section-title">Montreal Web Design Agency
                            </h2>
                        </div>
                        <div class="left-text">
                            <p>Everyone knows that owning a website is a must for every business otherwise you will not be taken seriously by your potential clients. Your website should instantly provide your visitors with the message you are delivering
                                and the information they are seeking instantly. Your website is an important part of your business, it’s your image. Make your visitor’s experience a memorable one with a beautiful custom website design that is not only
                                easy on the eyes but easy to navigate.</p>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="http://www.aaditritechnology.com/images/compbig.gif" class="rounded img-fluid d-block mx-auto" alt="App">
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Featured Works!</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>check them out!</p>

                    </div>
                </div>
            </div>
            <div class="aaa">
                <div class="boxxx">
                    <div class="cardxx">
                        <div class="imgBx">
                            <img src="https://www.marketingwebsites.ca/wp-content/uploads/2019/11/patriciomaison.jpg" alt="images">
                        </div>
                        <div class="details">
                            <h2>Maison Patricio Gourmande<br></h2>
                        </div>
                    </div>

                    <div class="cardxx">
                        <div class="imgBx">
                            <img src="https://www.marketingwebsites.ca/wp-content/uploads/2018/12/basha.jpg" alt="images">
                        </div>
                        <div class="details">
                            <h2>Basha<br></h2>
                        </div>
                    </div>

                    <div class="cardxx">
                        <div class="imgBx">
                            <img src="https://www.marketingwebsites.ca/wp-content/uploads/2019/11/kellner.jpg" alt="images">
                        </div>
                        <div class="details">
                            <h2>Kellner Avocats<br></h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ***** Contact Us Start ***** -->
        <section class="section colored" id="contact-us" style="
    padding-top: 30px;
">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Enrol Now for Free</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Our tech team will reach back to you and make your requirements happen</p>

                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="https://cdn.dribbble.com/users/988448/screenshots/5240042/icon_cadastro_v5.gif" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="contact-form">
                        <form id="contact" action="back_webdesign.php?service=webappdesign" method="POST">
                            <div class="row">
                                <div class="col-lg-10 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="comment" type="text" class="form-control" id="comment" placeholder="Add some Info" required="">
                                    </fieldset>
                                </div>
                                <br>
                               

                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Enrol Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
        <!-- ***** Contact Us End ***** -->

        <!-- ***** Footer Start ***** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <!----  <p class="copyright">Copyright &copy; 2020 Softy Pinko Company - Design: TemplateMo</p>
                  -->
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="../../../assets/js/jquery-2.1.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="../../../assets/js/popper.js"></script>
        <script src="../../../assets/js/bootstrap.min.js"></script>

        <!-- Plugins -->
        <script src="../../../assets/js/scrollreveal.min.js"></script>
        <script src="../../../assets/js/waypoints.min.js"></script>
        <script src="../../../assets/js/jquery.counterup.min.js"></script>
        <script src="../../../assets/js/imgfix.min.js"></script>

        <!-- Global Init -->
        <script src="../../../assets/js/custom.js"></script>

    </body>

    </html>