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
    <link rel="stylesheet" href="./assets/css/intlTelInput.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Font -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    <!-- Bootstrap CDN, Custom Css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/lightbox/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="./assets/css/intlTelInput.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Barkomatic - Online Ticketing</title>
<style>
    .cd-breadcrumb, .cd-multi-steps {
  max-width: 2150px;
  padding: 0.5em 1em;
  margin:5%;
  background-color: #edeff0;
  border-radius: .25em;
  position:relative;
}
.cd-breadcrumb::after, .cd-multi-steps::after {
  clear: both;
  content: "";
  display: table;
}
.cd-breadcrumb li, .cd-multi-steps li {
  display: inline-block;
  float: left;
  margin: 0.5em 0;
}
.cd-breadcrumb li::after, .cd-multi-steps li::after {
  /* this is the separator between items */
  display: inline-block;
  content: '\00bb';
  margin: 0 .6em;
  color: ##ffffff;
}
.cd-breadcrumb li:last-of-type::after, .cd-multi-steps li:last-of-type::after {
  /* hide separator after the last item */
  display: none;
}
.cd-breadcrumb li > *, .cd-multi-steps li > * {
  /* single step */
  display: inline-block;
  font-size: 1.4rem;
  color: #2c3f4c;
}
.cd-breadcrumb li.current > *, .cd-multi-steps li.current > * {
  /* selected step */
  color:#17a2b8;
}
.no-touch .cd-breadcrumb a:hover, .no-touch .cd-multi-steps a:hover {
  /* steps already visited */
  color:#17a2b8;
}

@media only screen and (min-width: 768px) {
  .cd-breadcrumb, .cd-multi-steps {
   
    padding: 0 1.2em;
  }
  .cd-breadcrumb li, .cd-multi-steps li {
    margin: 1.2em 0;
  }
  .cd-breadcrumb li::after, .cd-multi-steps li::after {
    margin: 0 1em;
  }
  .cd-breadcrumb li > *, .cd-multi-steps li > * {
    font-size: 1.6rem;
  }
}
@media only screen and (min-width: 768px) {
  .cd-multi-steps {
    /* reset style */
    
    background-color: transparent;
    padding: 0;
    text-align: center;
  }

  .cd-multi-steps li {
    position: relative;
    float: none;
    margin: 0.4em 40px 0.4em 0;
  }
  .cd-multi-steps li:last-of-type {
    margin-right: 0;
  }
  .cd-multi-steps li::after {
    /* this is the line connecting 2 adjacent items */
    position: absolute;
    content: '';
    height: 6px;
    background: #edeff0;
    /* reset style */
    margin: 0;
  }
  .cd-multi-steps li.visited::after {
    background-color:#ffffff;
    opacity: 0.6;
  }
  .cd-multi-steps li > *, .cd-multi-steps li.current > * {
    position: relative;
    color: #ffffff;
    font-weight: bolder;
    font-size:1.2em;
    font-family: Montserrat, Helvetica, Arial, sans-serif !important;

  }

  .cd-multi-steps.text-top li{
    width: 216px;
    text-align: center;
  }
  .cd-multi-steps.text-top li::after{
    /* this is the line connecting 2 adjacent items */
    position: absolute;
    left: 50%;
    /* 40px is the <li> right margin value */
    width: calc(100% + 40px);
  }
  .cd-multi-steps.text-top li > *::before {
    /* this is the spot indicator */
    content: '';
    position: absolute;
    z-index: 1;
    left: 50%;
    right: auto;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background-color: #edeff0;
  }
  .cd-multi-steps.text-top li.visited > *::before,
  .cd-multi-steps.text-top li.current > *::before,
  .cd-multi-steps.text-bottom li.current > *::before {
    background-color: #17a2b8;
  }
  .no-touch .cd-multi-steps.text-top a:hover{
    color:#17a2b8;
  }
  .no-touch .cd-multi-steps.text-top a:hover::before{
    box-shadow: 0 0 0 3px rgba(150, 192, 61, 0.3);
  }

  .cd-multi-steps.text-top li::after {
    /* this is the line connecting 2 adjacent items */
    bottom: 4px;
  }
  .cd-multi-steps.text-top li > * {
    padding-bottom: 20px;
  }
  .cd-multi-steps.text-top li > *::before {
    /* this is the spot indicator */
    bottom: 0;
  }
}
.cd-multi-steps.count li {
  counter-increment: steps;
}

.cd-multi-steps.count li > *::before {
  content: counter(steps) " - ";
}

@media only screen and (min-width: 768px) {
  .cd-multi-steps.text-top.count li > *::before {
    /* this is the spot indicator */
    content: counter(steps);
    height: 26px;
    width: 26px;
    line-height: 26px;
    font-size: 1.4rem;
    color: #ffffff;
  }

  .cd-multi-steps.text-top.count li:not(.current) em::before {
    /* steps not visited yet - counter color */
    color: #2c3f4c;
  }

  .cd-multi-steps.text-top.count li::after {
    bottom: 11px;
  }

  .cd-multi-steps.text-top.count li > * {
    padding-bottom: 34px;
  }
}
</style>
</head>


<body class="container-tab4">

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