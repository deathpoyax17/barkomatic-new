<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/core-img/favicon.png">
    <title>Barkomatic - Online Ticketing</title>
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/mediaqueries.css" />
<link href="http://server.info/jquery.socialist.css" rel="stylesheet"/>
<link href="http://server.info/your_css_generated_with_php.php" rel="stylesheet"/>

    <script src="/assets/js/calendar-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment-with-langs.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/script1.js"></script>
    <link rel="stylesheet" href="sample.css">
    <link rel="stylesheet" href="calendar-css/style.css">
    <style>
        html{box-sizing: border-box;}
        #ui_01e_body{
        font-family: Helvetica, Arial, sans-serif;
        background-image: url(assets/images/passengerinfo-background.png);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        }
        /* Extra Small Devices, Phones */
        @media only screen and (min-width : 320px) {
            .progressbar0e1 strong {font-size: 8.25px;}
        }
        @media only screen and (min-width : 480px) {
            .progressbar0e1 strong {font-size: 8.25px;}
        }
        @media only screen and (min-width : 768px) {
            .progressbar0e1 strong {font-size:11px;}
        } 

        /* Medium Devices, Desktops */
        @media only screen and (min-width : 992px) {
            .pg_dd0e1{
                border: 1px solid #fff;
                border-radius: 5px;
            }
            .cg_dd0e1{
                border: 1px solid #fff;
                border-radius: 5px;
            }
            .nav-item a {font-size: 12px;}
            .progressbar0e1 strong {font-size: 12px;}
        }

        /* Large Devices, Wide Screens */
        @media only screen and (min-width : 1200px) {
            .pg_dd0e1{
                border: 1px solid #fff;
                border-radius: 5px;
            }
        }
        @media only screen and (min-width : 1200px) {
            .cg_dd0e1{
                border: 1px solid #fff;
                border-radius: 5px;
            }
            .nav-item a {font-size: 13.5px;}
        }
        
        /*progressbar*/
        .cardex {
            background-color: #fff;
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative;
        }
        .progressbar0e1 {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
        }

        .progressbar0e1 .active {color: #000000;}

        .progressbar0e1 li {
            list-style-type: none;
            width: 25%;
            float: left;
            position: relative;
        }
        /*Icons in the ProgressBar*/
        .progressbar0e1 #schedule:before {
            font-family: FontAwesome;
            content: "\f073";
        }

        .progressbar0e1 #passengerinfo:before {
            font-family: FontAwesome;
            content: "\f007";
        }

        .progressbar0e1 #payment:before {
            font-family: FontAwesome;
            content: "\f09d";
        }

        .progressbar0e1 #confirm:before {
            font-family: FontAwesome;
            content: "\f00c";
        }
        /*ProgressBar before any progress*/
        .progressbar0e1 li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
        }
        /*ProgressBar connectors*/
        .progressbar0e1 li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }
        /*Color number of the step and the connector before it*/
        .progressbar0e1 li.active:before, .progressbar0e1 li.active:after {background: skyblue;}
        /* pop-up notice */
        .fancybox-inner{overflow: hidden !important; width: auto !important; height: auto !important;border-radius: 3px;}
     </style>  
  
</head>
<body id="ui_01e_body">
    <!-- div id="siteLoader" class="site-loader">
            <div class="preloader-content">
                <img src="assets/images/loader1.gif" alt="">
            </div >
        </div -->
        <div class="nav-header" >
        <a href="index.php">
            <img src="img/core-img/barkomatic-logo.png" alt="barkomatic-logo" class="barkomatic-logo">
        </a>
        <div class="navigation">
            <ul class="menu">
                <div class="close-btn"></div>
                <li class="menu-item"><a href="index.php">Home</a></li>
                <li class="menu-item"><a href="#">Contact Us</a></li>
                <li class="menu-item"><a href="#">Tracker</a></li>
                <li class="menu-item"><a href="#">Privacy Policy</a></li>
                <li class="menu-item">
                    <a class="sub-btn" href="#">Passenger Guidelines <i class="fas fa-angle-down"></i></a>
                    <ul class="sub-menu">
                        <li class="sub-item"><a href="#">Booking/Boarding Guide</a></li>
                        <li class="sub-item"><a href="#">Rebooking Guidelines</a></li>
                        <li class="sub-item"><a href="#">Refund Guidelines</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a class="sub-btn" href="#">Cargo Guidelines <i class="fas fa-angle-down"></i></a>
                    <ul class="sub-menu">
                        <li class="sub-item"><a href="#">Book/BoardGuide</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="menu-btn"></div>
    </div>
    <!-- Header Area End -->

<div class="itinerary-nav-bar">
    <div class="container-modify">
        <div class="itinerary-nav-body">
            <div class="box-group dest-group">
                <div class="dest-box"><div>
                    <div class="form-location-code">CEB</div>
                    <span class="form-label-heading mb-tab">Cebu</span>
                </div>
            </div>
            <div class="dest-fa">
                <span class="fa fa-exchange">
              </span>  
            </div><div class="dest-box">
                <div><div class="form-location-code">TAG</div>
                <span class="form-label-heading mb-tab">Tagbilaran City, Bohol</span>
            </div></div></div><div class="box-group mb-tab">
                <div><div class="form-label-title">1</div>
                <div class="form-label-heading">Passengers</div>
            </div><!----><!----></div>
            
            <div class="box-group mb-tab">
                <div>
                    <div class="form-label-title">Mon, 6 Feb 2023</div>
                    <div class="form-label-heading">Departure</div>
                </div>
            </div>
            <div class="box-group mb-tab">
                <div>
                    <div class="form-label-title">Tue, 7 Feb 2023</div>
                    <div class="form-label-heading">Return</div></div>
                </div><!----><div class="box-group departure-return d-flex d-lg-none">
                    <div class="form-label-title p-1 " >Mon, 6 Feb - Tue, 7 Feb</div></div>
                    <div class="box-group"><span role="button" class="modify-btn">
                        <span class="fa fa-edit pr-2"></span>MODIFY ITINERARY </span>
                    </div>
                </div>
            </div>
        </div>
   
        <script type="text/javascript">
        //jquery for toggle dropdown menus
        $(document).ready(function() {
            //toggle sub-menus
            $(".sub-btn").click(function() {
                $(this).next(".sub-menu").slideToggle();
            });

            //toggle more-menus
            $(".more-btn").click(function() {
                $(this).next(".more-menu").slideToggle();
            });
        });

        //javascript for the responsive navigation menu
        var menu = document.querySelector(".menu");
        var menuBtn = document.querySelector(".menu-btn");
        var closeBtn = document.querySelector(".close-btn");

        menuBtn.addEventListener("click", () => {
            menu.classList.add("active");
        });

        closeBtn.addEventListener("click", () => {
            menu.classList.remove("active");
        });

        //javascript for the navigation bar effects on scroll
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>

</body>

</html>