<?php 
    require("resources/config.php");
    require (TEMPLATES_PATH . "/_distributable.php");
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Barkomatic - Search Trip</title>
    <!-- Favicon -->
      <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' 
          rel='stylesheet'>
    <link rel="icon" href="./img/core-img/favicon.png">
    <!-- Bootstrap DatePicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){     
  $(".srch_ship_sched").change(function(){
        var deptid = $(this).val();
       console.log(deptid);
        $.ajax({
            url: 'schedShip.php',
            type: 'post',
            data: {shipName:deptid},
            dataType: 'json',
            success:function(response){
                // console.log(response);
                var len = response.length;
                $("#srch_sched_loc_from").empty();
                $("#srch_sched_loc_to").empty();
                 $("#srch_sched_loc_from").append("<option value=''>---Select---</option>");
                  $("#srch_sched_loc_to").append("<option value=''>---Select---</option>");
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var location_name = response[i]['location_name'];
                     var location_to = response[i]['location_to'];
                       var port_to = response[i]['port_to'];
                         var port_from = response[i]['port_from'];
                   
                    $("#srch_sched_loc_from").append("<option value='"+location_name+"'>"+location_name+"("+port_from+")</option>");
                      $("#srch_sched_loc_to").append("<option value='"+location_to+"'>"+location_to+"("+port_to+")</option>");
                    // $('#srch_sched_loc_from').css('display','block');
                     $('#srch_sched_loc_from').niceSelect('update');
                      $('#srch_sched_loc_to').niceSelect('update');
                     
                   
                }
            }
        });
    });

});
</script>


    <!-- Stylesheet -->
    <style>
   .ui-datepicker {
            width: 12em; 
        }
    
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
  width: 50px;
  height: 50px;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
}
.date-card{
  border:1px solid #ddd;
  width:200px;
  padding:10px;
  display:flex;
  align-items:center;
}

.date-card .day{
  font-size:48px;
  margin:0px 10px;
  color:#2ab6b6;
}

.date-card .month{
  font-weight:bold;
}

.date-card p{
    font-size:9px;
}
.card-body {
    min-height: 100px;
    min-width: 300px;
    margin-right: 5px;
}


.frame {
  width: 85%;
  overflow: auto;
  overflow-y: hidden;
}

.card-list {
  display: flex;
  padding-left: 10px;
  padding-right: 10px;
}

.card {
  height:119px;
  flex-shrink: 0;
  margin-left: 10px;
  margin-right: 10px;
}

.space {
  flex-shrink: 0;
  width: 100%;
/*   background-color: white; */
}

    </style>

    
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

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