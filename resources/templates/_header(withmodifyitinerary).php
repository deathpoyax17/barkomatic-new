
<?php 
    require("resources/config.php");
    require (TEMPLATES_PATH . "/_distributable.php");
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/assets/css/calendar-style.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="icon" type="image/png" href="img/core-img/favicon.png">
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/modal-video/modal-video.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/lightbox/dist/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick-theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="/assets/js/calendar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment-with-langs.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/script1.js"></script>
    <link rel="stylesheet" href="calendar-css/style.css">

    <title>Barkomatic - Online Ticketing</title>
</head>

<body class="container-tab2">

    <!-- div id="siteLoader" class="site-loader">
            <div class="preloader-content">
                <img src="assets/images/loader1.gif" alt="">
            </div >
        </div -->
     <!-- Header Area Start -->
     <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav">
                        <!-- Logo -->
                        <a class="nav-brand mr-0" href="index.php">
                            <img src="./img/core-img/logo.png" alt="BarkoMatic">
                        </a>
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                            <span></span>
                            <span></span>
                            </span>
                        </div>
                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Contact Us</a>
                                    </li>
                                    <li class="">
                                        <a href="index.html">Privacy Policy</a>
                                    </li>
                                    <li class="cn-dropdown-item has-down">
                                        <a href="#">PASSENGER GIUDE LINES</a>
                                        <ul class="dropdown" style="background-color: #09527F;">
                                            <li>
                                                <a href="passenger.html">- Passenger</a>
                                            </li>
                                            <li>
                                                <a href="rollings-cargo.html">- Rollings Cargo</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="cn-dropdown-item has-down">
                                        <a href="#">CARGO GUIDELINES</a>
                                        <ul class="dropdown" style="background-color: #09527F;">
                                            <li>
                                                <a href="faq.html">- FAQ</a>
                                            </li>
                                            <li>
                                                <a href="about.html">- About Us</a>
                                            </li>
                                            <li>
                                                <a href="ticket-agent.html">- Ticket Agent</a>
                                            </li>
                                            <li>
                                                <a href="blog.html">- Blog</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- Book Now -->
                                <!-- <div class="book-now-btn">
                                    <a href="book.php">
                                        Book Now
                                        <i class="bi bi-arrow-right-circle-fill"></i>
                                    </a>
                                </div> -->
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Header Area End -->
    <div class="buttom-header-searchtrip">
        <span class="horizontal-lines"></span>
        <div class="margin-moditene">
            <form>
                <span class="vertical-lines"></span>
                <div class="form-row-mod">
                    <div class="col-1-mod">
                        <h5 style="color: #fff;">CEB</h5>
                        <p style="color: #fff;">Cebu</p>
                    </div>
                    <div class="col-1-mod2">
                        <i class="fa-solid fa-arrow-right-arrow-left fa-xl"></i>
                    </div>
                    <div class="col-1-mod3">
                        <h5 style="color: #fff;">TAG</h5>
                        <p style="color: #fff;">Tagbilaran, Bohol City</p>
                    </div>
                    <span class="vertical-lines2"></span>
                    <div class="col-1-mod4">
                        <h5 style="color: #fff;">1</h5>
                        <p style="color: #fff;">Passenger</p>
                    </div>
                    <span class="vertical-lines3"></span>
                    <div class="col-1-mod5">
                        <h5 style="color: #fff;">Sat, 17 Sep 2022</h5>
                        <p style="color: #fff;">Departure</p>
                    </div>
                    <span class="vertical-lines4"></span>
                    <div class="col-1-mod6">
                        <h5 style="color: #fff;">Sun, 18 Sep 2022</h5>
                        <p style="color: #fff;">Return</p>
                    </div>
                    <span class="vertical-lines5"></span>
                    <div class="col-1-mod7">
                        <button type="button" class="modifybutton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit" style="color: #000;"></i> MODIFY ITINERARY</button>
                        <?php 
                        require("resources/templates/_modify-itinerary.php");
                        ?>
                    </div>
                    <span class="vertical-lines6"></span>
                </div>
            </form>
        </div>
    </div>