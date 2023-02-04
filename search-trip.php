<?php require "resources/templates/_search-trip_header.php"; ?>


<!-- div id="siteLoader" class="site-loader">
        <div class="preloader-content">
            <img src="assets/images/loader1.gif" alt="">
        </div >
    </div -->
<div class="mobile-menu-container"></div>
</header>
<div class="searchtripmargin">
    <div class="searchtrip-tab">
        <input type="radio" id="tabpassenger" name="searchtrip-tab" checked="checked">
        <label class="passenger" id="passengertab" for="tabpassenger"><i class="fa-solid fa-user"></i> Passenger</label>
        <div class="tabsearchtrip">
            <div id="passengertab">
                <form class="container-search-trip">
                    <div class="mt-2">
                        <input class="hasprefchk" type="checkbox" id="myCheck" onclick="myFunction1()">
                        <span class="haspref">Has Preffered Shipping Lines</span>
                        <div class="rowhas">
                            <div id="text" style="display:none">
                                <div class="col-md-search">
                                    <div class="wrapper">
                                        <br>
                                        <?php 
                                                $stmt_ship_sd = $con->prepare("SELECT DISTINCT
                                                tsd.owner_id,
                                                tsd.ship_name,
                                                tsd.ship_logo
                                                FROM ship_owners tsd
                                                JOIN schedules tss ON tsd.owner_id=tss.owner_id"); 
                                                $stmt_ship_sd->execute();
                                                $row_ship_sd = $stmt_ship_sd->get_result();
                                                while ($row1 = $row_ship_sd->fetch_assoc()) { ?>
                                                
                                                          <div class="ship-button">
                                                          <input type="radio" id="b<?php echo $row1['owner_id']?>" name="srch_ship_sched" id="srch_ship_sched" value="<?php echo $row1['ship_name']; ?>" />
                                                          <label  for="b<?php echo $row1['owner_id']?>">
                                                          <img src="data:image/jpeg;base64,<?php echo base64_encode($row1['ship_logo']); ?>" alt="<?php echo $row1['ship_name']; ?>">
                                                          </label>
                                                          </div>
                                            <?php } ?>
                                        <!-- <div class="carousel">
                                            <div class="card card-1"> </div>

                                            <div class="card card-2">

                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Preferred Shipping Lines Section End -->
                    <div class="row ml-check mt-4">
                        <input type="radio" name="tab" value="igotnone" onclick="show1();" class="roundtrip" checked style="width:25px;height: 20px; display: block;" />
                        <span style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size: 18px;font-weight: bold;color: #0ceafa; margin-right: 10px; margin-left: 3px;"> Round Trip </span>
                        <input type="radio" name="tab" value="igottwo" onclick="show2();" style="width:25px;height: 20px; display: block; " />
                        <span style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size: 18px;font-weight: bold;color: #0ceafa; margin-left: 3px;"> One Way </span>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="input-group col-mb-3">
                                <div class="input-group-prepend">
                                    <!-- <label class="input-group-text" for="inputGroupSelect01">From</label> -->
                                    <label class="input-group-text" for="srch_trp_loc_from">From</label>
                                </div>
                                <!-- <select class="custom-select" id="inputGroupSelect01"> -->
                                <select class="custom-select" name="srch_sched_loc_from" id="srch_sched_loc_from"> 
                                  <option selected>Choose Location</option>
                                  <?php 
                                                    $stmt2 = $con->prepare("SELECT * FROM routes"); 
                                                    $stmt2->execute();
                                                    $result2 = $stmt2->get_result();
                                                    while ($row2 = $result2->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row2['departure_from']; ?>"><?php echo $row2['departure_from']; ?>(<?php echo $row2['departure_port']; ?>)</option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group col-1" style="padding: 7px; padding-left: 33px; margin-bottom: 30px;">
                            <button class="arrow-button">
                                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                </button>
                        </div>

                        <div class="col">
                            <div class="input-group col-mb-5">
                                <div class="input-group-prepend">
                                    <!-- <label class="input-group-text" for="inputGroupSelect01">To</label> -->
                                    <label class="input-group-text" for="srch_trp_loc_to">To</label>
                                </div>
                                <select class="form-control" name="srch_sched_loc_to" id="srch_sched_loc_to" required>
                                <!-- <select class="custom-select" id="inputGroupSelect01"> -->
                                  <option selected>Choose Location</option>
                                                <?php 
                                                    $stmt2 = $con->prepare("SELECT * FROM routes"); 
                                                    $stmt2->execute();
                                                    $result2 = $stmt2->get_result();
                                                    while ($row2 = $result2->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row2['departure_from']; ?>"><?php echo $row2['departure_from']; ?>(<?php echo $row2['departure_port']; ?>)</option>
                                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="input-group col-mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Depart</span>
                                </div>
                                <input type="text" id="from">
                                <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                </span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group col-mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Return</span>
                                </div>
                                <input type="text" id="to">
                                <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                </span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group col-mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Passenger</span>
                                </div>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                   
                    <button class="designbutton" type="submit" name="srch_sched_btn" id="srch_sched_btn">
                        <i class="fa-solid fa-magnifying-glass"> Search Trip</i>
                    </button>
            </div>
            </form>
        </div>

        <input type="radio" id="tabvehicle" name="searchtrip-tab">
        <label class="vehicle" id="vehicletab" for="tabvehicle"><i class="fa-solid fa-car"></i> Vehicle</label>
        <div class="tabsearchtrip2">
            <div id="vehicletab">
                <form class="container-search-trip">

                    <div class="mt-2">

                        <input class="hasprefchk" type="checkbox" id="myCheck2" onclick="myFunction2()">
                        <span class="haspref">Has Preffered Shipping Lines</span>
                        <div class="rowhas">
                            <div id="text2" style="display: none;">
                                <div class="col-md-search">
                                    <div class="wrapper">
                                      <br>
                                      <?php 
                                                $stmt_ship_sd =$con->prepare("SELECT DISTINCT
                                                tsd.owner_id,
                                                tsd.ship_name,
                                                tsd.ship_logo
                                                FROM ship_owners tsd
                                                JOIN schedules tss ON tsd.owner_id=tss.owner_id"); 
                                                $stmt_ship_sd->execute();
                                                $row_ship_sd = $stmt_ship_sd->get_result();
                                                while ($row1 = $row_ship_sd->fetch_assoc()) { ?>
                                                
                                                          <div class="ship-button">
                                                          <input type="radio" id="a<?php echo $row1['owner_id']?>" name="srch_ship_sched" value="<?php echo $row1['ship_name']; ?>" />
                                                          <label  for="a<?php echo $row1['owner_id']?>">
                                                          <img src="data:image/jpeg;base64,<?php echo base64_encode($row1['ship_logo']); ?>" alt="<?php echo $row1['ship_name']; ?>">
                                                          </label>
                                                          </div>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Preferred Shipping Lines Section End -->
                    <div class="row ml-check mt-4">

                        <input type="radio" name="tab" value="igotnone" onclick="show1();" class="roundtrip" checked style="width:25px;height: 20px; display: block;" />
                        <span style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size: 18px;font-weight: bold;color: #0ceafa; margin-right: 10px; margin-left: 3px;"> Round Trip </span>
                        <input type="radio" name="tab" value="igottwo" onclick="show2();" style="width:25px;height: 20px; display: block; " />
                        <span style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size: 18px;font-weight: bold;color: #0ceafa; margin-left: 3px;"> One Way </span>
                    </div>

                    <div class="form-row">

                        <div class="col">
                            <div class="input-group col-mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">From</label>
                                </div>
                                <select class="custom-select" name="srch_sched_loc_from" id="srch_sched_loc_from"> 
                                  <option selected>Choose Location</option>
                                  <?php 
                                                    $stmt2 = $con->prepare("SELECT * FROM tbl_ship_port"); 
                                                    $stmt2->execute();
                                                    $result2 = $stmt2->get_result();
                                                    while ($row2 = $result2->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row2['location_from']; ?>"><?php echo $row2['location_from']; ?>(<?php echo $row2['port_from']; ?>)</option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group col-1" style="padding: 7px; padding-left: 24px; margin-bottom: 30px;">
                            <button>
                                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                </button>
                        </div>

                        <div class="col">
                            <div class="input-group col-mb-5">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">To</label>
                                </div>
                                <select class="form-control" name="srch_sched_loc_to" id="srch_sched_loc_to" required>
                                <!-- <select class="custom-select" id="inputGroupSelect01"> -->
                                  <option selected>Choose Location</option>
                                                <?php 
                                                    $stmt2 = $con->prepare("SELECT * FROM tbl_ship_port"); 
                                                    $stmt2->execute();
                                                    $result2 = $stmt2->get_result();
                                                    while ($row2 = $result2->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row2['location_to']; ?>"><?php echo $row2['location_to']; ?>(<?php echo $row2['port_to']; ?>)</option>
                                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-depart">
                            <div class="input-group col-mb-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Depart</span>
                                </div>
                                <input type="text" id="from2">
                                <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                </span>
                            </div>
                        </div>
                        <div class="col-return">
                            <div class="input-group col-mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Return</span>
                                </div>
                                <input type="text" id="to2">
                                <span class="input-group-append">
                                                    <span class="input-group-text bg-white">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="category">

                        <div class="row ml-check mt-4">
                            <input type="radio" name="tab" value="igotnone" class="roundtrip" checked style="width:25px;height: 20px; display: block;" />
                            <span style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size: 15px;font-weight: bold;color: #000; margin-right: 10px; margin-left: 3px;"> Category </span>
                            <input type="radio" name="tab" value="igottwo" style="width:25px;height: 20px; display: block; " />
                            <span style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size: 15px;font-weight: bold;color: #000; margin-left: 3px;"> Brand </span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Category</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01">
                              <option selected>PICK-UP</option>
                              <option value="1">AUV</option>
                              <option value="2">SUV</option>
                              <option value="3">10-WHEELER / EMPTY</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="input-group col-mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" checked style="width:20px;height: 20px; display: block;">
                                        <label class="form-check-label" for="gridCheck1" style="padding-left: 10px; font-size: 19px;">
                                              With Driver
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group col-mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Passenger</span>
                                    </div>
                                    <input type="text">
                                </div>
                                <span>(Including Driver)</span>
                            </div>

                            <div class="col">
                                <div class="input-group col-mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <button type="submit" name="srch_sched_btn" id="srch_sched_btn" class="designbutton2 barkomatic-btn-search-trip">
                                        <i class="fa-solid fa-magnifying-glass"> Cargo Trip</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>

<footer class="footer-area section-padding-80-0">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row align-items-baseline ">
                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-80">
                            <!-- Footer Logo -->
                            <a href="#" class="footer-logo"><img src="img/core-img/logo.png" alt=""></a>
                            <p class="footprag">Call Us</p>
                            <h4>+12 345-678-9999</h4>
                            <p>Email Us</p>
                            <h4>barkomatic2021@gmail.com
                                <h4>

                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-2 col-lg-4">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">MANUALS</h5>

                            <!-- Single Blog Area -->
                            <div class="latest-blog-area">
                                <a href="#" class="post-title">Boarding Guidelines</a>
                                <a href="#" class="post-title">Payment Option</a>
                                <a href="#" class="post-title">Passenger Ticket Booking Manual</a>
                                <a href="#" class="post-title">Rolling Cargo Booking Manual</a>
                            </div>

                            <!-- Single Blog Area -->
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-2 col-lg-4">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">POLICY</h5>

                            <!-- Single Blog Area -->
                            <div class="latest-blog-area">
                                <a href="#" class="post-title">Refund Policy</a>
                                <a href="#" class="post-title">Rebooking Policy</a>
                                <a href="#" class="post-title">Barkomatic Terms & Conditions</a>
                                <a href="#" class="post-title">Privacy Policy</a>
                            </div>
                            <!-- Single Blog Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="container">
            <div class="copywrite-content">
                <div class="row align-items-center">
                    <div class="col-12 col-md-8">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | Barkomatic</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<script src="js/jquery.validate.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main/active.js"></script>
<script src="js/main/schedule/process.js"></script>
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

</html>