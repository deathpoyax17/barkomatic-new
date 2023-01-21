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
                                        <div class="carousel">
                                            <div class="card card-1">

                                            </div>

                                            <div class="card card-2">

                                            </div>
                                        </div>
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
                                                    $stmt2 = $con->prepare("SELECT * FROM tbl_ship_port"); 
                                                    $stmt2->execute();
                                                    $result2 = $stmt2->get_result();
                                                    while ($row2 = $result2->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row2['location_from']; ?>"><?php echo $row2['location_from']; ?>(<?php echo $row2['port_from']; ?>)</option>
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
                    <button class="designbutton">
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
                                        <div class="carousel">
                                            <div class="card card-1">

                                            </div>

                                            <div class="card card-2">

                                            </div>
                                        </div>
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
                                <select class="custom-select" id="inputGroupSelect01">
                                  <option selected>Choose Location</option>
                                  <option value="0">Cebu</option>
                                  <option value="1">Bacolod</option>
                                  <option value="2">BayBay,Leyte</option>
                                  <option value="3">Batangas</option>
                                  <option value="4">Bogo,Cebu</option>
                                  <option value="5">Bato,Leyte</option>
                                  <option value="6">Butuan</option>
                                  <option value="7">Cagayan de Oro</option>
                                  <option value="8">Calapan</option>
                                  <option value="9">Poro,Camotes</option>
                                  <option value="10">Catiklan</option>
                                  <option value="11">Cebu</option>
                                  <option value="12">Consuelo,Camotes</option>
                                  <option value="13">Danao</option>
                                  <option value="14">Dapitan</option>
                                  <option value="15">Dapdap</option>
                                  <option value="16">Dumaguete</option>
                                  <option value="17">Dipolog</option>
                                  <option value="18">Dapa,Siargao</option>
                                  <option value="19">Estacia</option>
                                  <option value="20">Hagnaya</option>
                                  <option value="21">Iligan</option>
                                  <option value="22">Iloilo</option>
                                  <option value="23">Medellin,Cebu</option>
                                  <option value="24">Liloan,Southern Leyte</option>
                                  <option value="25">Lipata,Siargao</option>
                                  <option value="26">Lipata,Culasi</option>
                                  <option value="27">Cataingan,Masbate</option>
                                  <option value="28">Masbate</option>
                                  <option value="29">Manila</option>
                                  <option value="30">Ormoc</option>
                                  <option value="31">Osamiz</option>
                                  <option value="32">Palompon</option>
                                  <option value="33">Puerto,Princesa Palawan</option>
                                  <option value="34">Puerto Galera</option>
                                  <option value="35">Roxas City,Capiz</option>
                                  <option value="36">San Carlos,Negros</option>
                                  <option value="37">Sibuyan,Romblon</option>
                                  <option value="38">Santa Fe, Bantayan Island</option>
                                  <option value="39">Surigao</option>
                                  <option value="40">Matnog</option>
                                  <option value="41">Tagbilaran,Bohol </option>
                                  <option value="42">Toledo</option>
                                  <option value="43">Tubigon</option>
                                  <option value="44">Zamboanga</option>
                                  <option value="45">Talibon,Bohol</option>
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
                                <select class="custom-select" id="inputGroupSelect01">
                                  <option selected>Choose Location</option>
                                  <option value="0">Cebu</option>f
                                  <option value="1">Bacolod</option>
                                  <option value="2" >BayBay,Leyte</option>
                                  <option value="3">Batangas</option>
                                  <option value="4">Bogo,Cebu</option>
                                  <option value="5">Bato,Leyte</option>
                                  <option value="6">Butuan</option>
                                  <option value="7">Cagayan de Oro</option>
                                  <option value="8">Calapan</option>
                                  <option value="9">Poro,Camotes</option>
                                  <option value="10">Catiklan</option>
                                  <option value="11">Cebu</option>
                                  <option value="12">Consuelo,Camotes</option>
                                  <option value="13">Danao</option>
                                  <option value="14">Dapitan</option>
                                  <option value="15">Dapdap</option>
                                  <option value="16">Dumaguete</option>
                                  <option value="17">Dipolog</option>
                                  <option value="18">Dapa,Siargao</option>
                                  <option value="19">Estacia</option>
                                  <option value="20">Hagnaya</option>
                                  <option value="21">Iligan</option>
                                  <option value="22">Iloilo</option>
                                  <option value="23">Medellin,Cebu</option>
                                  <option value="24">Liloan,Southern Leyte</option>
                                  <option value="25">Lipata,Siargao</option>
                                  <option value="26">Lipata,Culasi</option>
                                  <option value="27">Cataingan,Masbate</option>
                                  <option value="28">Masbate</option>
                                  <option value="29">Manila</option>
                                  <option value="30">Ormoc</option>
                                  <option value="31">Osamiz</option>
                                  <option value="32">Palompon</option>
                                  <option value="33">Puerto,Princesa Palawan</option>
                                  <option value="34">Puerto Galera</option>
                                  <option value="35">Roxas City,Capiz</option>
                                  <option value="36">San Carlos,Negros</option>
                                  <option value="37">Sibuyan,Romblon</option>
                                  <option value="38">Santa Fe, Bantayan Island</option>
                                  <option value="39">Surigao</option>
                                  <option value="40">Matnog</option>
                                  <option value="41">Tagbilaran,Bohol </option>
                                  <option value="42">Toledo</option>
                                  <option value="43">Tubigon</option>
                                  <option value="44">Zamboanga</option>
                                  <option value="45">Talibon, Bohol</option>
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
                                    <button class="designbutton2">
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
<div class="bottom-header-searchtrip">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 d-none d-lg-block">
                <div class="header-contact-info">
                    <ul>
                        <li>
                            <a href="#"><i class="fas fa-phone-alt"></i> +64 (909) 1234 396</a>
                        </li>
                        <li>
                            <a href="mailto:info@Travel.com"><i class="fas fa-envelope"></i> BarkoamticOnlineTicketing@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> 6000 V. Rama Avenue, Englis, Cebu City
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                <div class="header-social social-links">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
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