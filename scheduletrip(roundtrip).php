<?php
require_once("resources/templates/_header(withmodifyitinerary).php");
if(isset($_COOKIE['data'])){
  $datas=$_COOKIE['data'];
  $data=urldecode($datas);
  $data = json_decode($data, TRUE);
  $date= $data["departure_date"];
  $formatted_date = date("Ymd", strtotime($date));
?>
<div class="container">
    <ol class="cd-multi-steps text-top">
        <li class="current"><a href="#0">SCHEDULE</a></li>
        <li class=""><a href="#0">PASSENGER INFO</a></li>
        <li class=""><em>PAYMENT</em></li>
        <li><em>COMPLETE</em></li>
    </ol>
    <br>
<div class="depature-location">
    <h3 style="color: #ededed;"><?php echo $data["route_id_from"];?></h3><i class="fa-solid fa-arrow-right"
        style="color: #fff; font-size: 28px; padding-left: 10px; padding-right: 10px;"></i>
    <h3 style="color: #ededed;">
    <?php echo $data["route_id_to"];?>
    </h3>
</div>
<div class="calendar-section">
    <div class="dateRangeCalendarWrapper">
        <select id="dateRangeMonthPicker">
            <option style="text-align:center ; " value="0">January </option>
            <option style="text-align:center ; " value="1">February</option>
            <option style="text-align:center ; " value="2">March</option>
            <option style="text-align:center ; " value="3">April</option>
            <option style="text-align:center ; " value="4">May</option>
            <option style="text-align:center ; " value="5">June</option>
            <option style="text-align:center ; " value="6">July</option>
            <option style="text-align:center ; " value="7">August</option>
            <option style="text-align:center ; " value="8">September</option>
            <option style="text-align:center ; " value="9">October</option>
            <option style="text-align:center ; " value="10">November</option>
            <option style="text-align:center ; " value="11">December</option>
        </select>
        <div id="dateRange"></div>
        <button id="buttonDatePreviousWrap">&lsaquo;</button>
        <button id="buttonDateNextWrap">&rsaquo;</button>
    </div>

    <div class="selected-date-area" id="selectedDateRange">
    <?php 
    if(isset($date)){
                                           $stmt_ship_sd =$con->prepare("SELECT 
                                           f.name,
                                           s.schedule_id,
                                           f.ferry_id,
                                           a.acomm_name,
                                           a.price,
                                           a.room_type,
                                           a.aircon,
                                           so.ship_name,
                                           s.departure_date,
                                           s.arrival_time,
                                           s.route_id_from,
                                           s.route_id_to
                                           from schedules s
                                           JOIN ferries f ON s.ferry_id = f.ferry_id
                                           JOIN accommodations a ON s.ferry_id = a.ferry_id
                                           LEFT JOIN ship_owners so ON s.owner_id = so.owner_id
                                           WHERE s.departure_date=? GROUP BY s.ferry_id"); 
                                           $stmt_ship_sd->bind_param('s',$date);
                                           $stmt_ship_sd->execute();
                                           $row_ship_sd = $stmt_ship_sd->get_result();
                                           while ($row1 = $row_ship_sd->fetch_assoc()) { 
                                            $det = $row1["departure_date"];
                                            $formatted_dates = date("F j, Y", strtotime($det));
                                            $time = $row1["arrival_time"];
                                            $formatted_times = date("g:i A", strtotime($time));
                                            ?>
                                                          <div radio-group="">
            <form id="selectedDateForm" class="ng-untouched ng-pristine ng-valid">
                <div formarrayname="voyageAccommodations" class="ng-untouched ng-pristine ng-valid">
                    <div class="itinerary-table booking-table item-selected">
                    <input type="radio" hidden="" id="schedule_id" name="schedule_id" value="<?php echo $row1['schedule_id']?>" />
                        <div class="itinerary-row itinerary-head">
                            <div class="itr-col booking-time-container">
                                <div>
                                    <div class="departure-time"><?php echo $formatted_times; ?></div>
                                    <!---->
                                    <div class="travel-time">2 hours</div>
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                            <div class="itr-col itinerary-vessel">
                                <div class="booking-media-left itinerary-shipping-logo">
                                    <img alt=""
                                        src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-ocean-fast-ferries-inc.png" />
                                    <!---->
                                </div>
                                <div class="itinerary-name">
                                    <div class="booking-type booking-td-title">
                                        <div><?php echo $row1['name'];?></div>
                                        <!---->
                                        <div class="booking-td-meta book-text-muted">
                                        <?php echo $row1['ship_name'];?>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </div>
                        <div class="itinerary-row" id="row_'<?php echo $row1['schedule_id'] ?>">
                            <div class="itinerary-col itinerary-select">
                                <div class="form-select">
                                <select id="accomodation_form" name="selectedAccommodation" class="form-control accommodation border ng-untouched ng-pristine ng-valid" data-row-id="<?php echo $row1['schedule_id']?>">';
                                    <?php
                                         $ferry = $row1['ferry_id'];
                                         $stmt = $con->prepare("SELECT * FROM accommodations WHERE ferry_id=?"); 
                                         $stmt->bind_param('s', $ferry);
                                         $stmt->execute();
                                         $result = $stmt->get_result();
                                         while ($row = $result->fetch_assoc()) {
                                            $acommodations = $row["acomm_name"];
                                            $acommodations_id = $row["accomodation_id"];
                                            echo '<option value="'.$acommodations_id.'">'.$acommodations.'</option>';
                                       
                                        }
                                     ?>
                                        <!---->
                                    </select>
                                </div>
                                <!---->
                            </div>
                            <!---->
                            <div class="itinerary-col itinerary-price" style="position: relative; overflow: hidden">
                        <div class="booking-td-title text-wrap">
                        <div>
                            <div class="booking-td-title">
                            <span class="price-value" style="margin-right: 20px">
                            <?php
                                         $ferry = $row1['ferry_id'];
                                         $stmt = $con->prepare("SELECT * FROM accommodations WHERE ferry_id=?"); 
                                         $stmt->bind_param('s', $ferry);
                                         $stmt->execute();
                                         $result = $stmt->get_result();
                                         $row = $result->fetch_assoc();
                                            $acommodations = $row["acomm_name"];
                                            $acommodations_id = $row["accomodation_id"];
                                            echo '₱<span id="price-'.$row1['schedule_id'].'">'. $row1["price"].'</span>';
                                        
                                     ?>
                             </span>
                            </div>
                            <div class="booking-type booking-td-title">
                            <div class="booking-td-meta" style="margin-right: 5px">
                                <span style="font-weight: 800; color: #ff8c00">
                                Ticket Price
                                </span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="itinerary-col itinerary-select-btn">
                    <button type="button" class="btn btn-info select-button">Select</button>
                     </div>
                    </div>
                        </div>
                        <div class="itinerary-row">
                        </div>
                    </div>
                </div>
            </form>
        </div>
                                            <?php } } ?>
        <!---->
    </div>
 </div>
<br>

<div class="container">
<div class="depature-location2">
    <h3 style="color: #ededed;"><?php echo $data["route_id_to"];?></h3><i class="fa-solid fa-arrow-right"
        style="color: #fff; font-size: 28px; padding-left: 10px; padding-right: 10px;"></i>
    <h3 style="color: #ededed;"><?php echo $data["route_id_from"];?></h3>
</div>
<div class="calendar-section2">
    <div class="dateRangeCalendarWrapper">
        <select id="dateRangeMonthPicker1">
            <option style="text-align:center ; " value="0">January </option>
            <option style="text-align:center ; " value="1">February</option>
            <option style="text-align:center ; " value="2">March</option>
            <option style="text-align:center ; " value="3">April</option>
            <option style="text-align:center ; " value="4">May</option>
            <option style="text-align:center ; " value="5">June</option>
            <option style="text-align:center ; " value="6">July</option>
            <option style="text-align:center ; " value="7">August</option>
            <option style="text-align:center ; " value="8">September</option>
            <option style="text-align:center ; " value="9">October</option>
            <option style="text-align:center ; " value="10">November</option>
            <option style="text-align:center ; " value="11">December</option>
        </select>
        <div id="dateRange1"></div>
        <button id="buttonDatePreviousWrap1">&lsaquo;</button>
        <button id="buttonDateNextWrap1">&rsaquo;</button>
    </div>

    <div class="selected-date-area1" id="selectedDateRange1">
    <?php 
     if(isset($date)){
        $stmt_ship_sd =$con->prepare("SELECT 
                                        f.name,
                                        s.schedule_id,
                                        f.ferry_id,
                                        a.acomm_name,
                                        a.price,
                                        a.room_type,
                                        a.aircon,
                                        so.ship_name,
                                        s.departure_date,
                                        s.arrival_time,
                                        s.route_id_from,
                                        s.route_id_to
                                        from schedules s
                                        JOIN ferries f ON s.ferry_id = f.ferry_id
                                        JOIN accommodations a ON s.ferry_id = a.ferry_id
                                        LEFT JOIN ship_owners so ON s.owner_id = so.owner_id
                                        WHERE s.departure_date=? GROUP BY s.ferry_id"); 
                                        $stmt_ship_sd->bind_param('s',$date);
                                        $stmt_ship_sd->execute();
                                        $row_ship_sd = $stmt_ship_sd->get_result();
                                        while ($row1 = $row_ship_sd->fetch_assoc()) { 
                                        $det = $row1["departure_date"];
                                        $formatted_dates = date("F j, Y", strtotime($det));
                                        $time = $row1["arrival_time"];
                                        $formatted_times = date("g:i A", strtotime($time));
                                        ?>
        <div radio-group="">
            <form id="r_selectedDateForm" class="ng-untouched ng-pristine ng-valid">
                <div formarrayname="voyageAccommodations" class="ng-untouched ng-pristine ng-valid">
                    <div class="itinerary-table booking-table item-selected">
                    <input type="radio" hidden="" id="r_schedule_id" name="r_schedule_id" value="<?php echo $row1['schedule_id']?>" />
                        <div class="itinerary-row itinerary-head">
                            <div class="itr-col booking-time-container">
                                <div>
                                <div class="departure-time"><?php echo $formatted_times; ?></div>
                                    <div class="travel-time">2 hours</div>
                                </div>
                            </div>
                            <div class="itr-col itinerary-vessel">
                                <div class="booking-media-left itinerary-shipping-logo">
                                    <img alt=""
                                        src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-ocean-fast-ferries-inc.png" />
                                    <!---->
                                </div>
                                <div class="itinerary-name">
                                <div class="booking-type booking-td-title">
                                        <div><?php echo $row1['name'];?></div>
                                        <!---->
                                        <div class="booking-td-meta book-text-muted">
                                        <?php echo $row1['ship_name'];?>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="itinerary-row" id="row_'<?php echo $row1['schedule_id'] ?>">
                            <div class="itinerary-col itinerary-select">
                                <div class="form-select">
                                <select  id="r_accomodation_form" name="r_selectedAccommodation" class="form-control accommodation border ng-untouched ng-pristine ng-valid" data-row-id="<?php echo $row1['schedule_id'] ?>">';
                                <?php
                                         $ferry = $row1['ferry_id'];
                                         $stmt = $con->prepare("SELECT * FROM accommodations WHERE ferry_id=?"); 
                                         $stmt->bind_param('s', $ferry);
                                         $stmt->execute();
                                         $result = $stmt->get_result();
                                         while ($row = $result->fetch_assoc()) {
                                            $acommodations = $row["acomm_name"];
                                            $acommodations_id = $row["accomodation_id"];
                                            echo '<option value="'.$acommodations_id.'">'.$acommodations.'</option>';
                                       
                                        }
                                     ?>
                                        <!---->
                                    </select>
                                </div>
                            </div>
                            <div class="itinerary-col itinerary-price" style="position: relative; overflow: hidden">
                                <div class="booking-td-title text-wrap">
                                    <div>
                                    <div class="booking-td-title">
                            <span class="price-value" style="margin-right: 20px">
                            <?php
                                         $ferry = $row1['ferry_id'];
                                         $stmt = $con->prepare("SELECT * FROM accommodations WHERE ferry_id=?"); 
                                         $stmt->bind_param('s', $ferry);
                                         $stmt->execute();
                                         $result = $stmt->get_result();
                                         $row = $result->fetch_assoc();
                                            $acommodations = $row["acomm_name"];
                                            $acommodations_id = $row["accomodation_id"];
                                            echo ' ₱<span id="r_price-'.$row1['schedule_id'].'">'. $row1["price"].'</span>';
                                        
                                     ?>
                             </span>
                                    </div>
                                        <div class="booking-type booking-td-title">
                                            <div class="booking-td-meta" style="margin-right: 5px">
                                                <span style="font-weight: 800; color: #ff8c00">
                                                Ticket Price
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="itinerary-col itinerary-select-btn">
                                  <button type="button" class="btn btn-info select-buttons">Select</button>
                                 </div>
                            </div>
                        </div>
                        <div class="itinerary-row"></div>
                    </div>
                </div>
            </form>
        </div>
<?php } }?>
    </div>
 </div>
    <div class="container-summarytrip">
        <form id="summary_continue">
        <h4 class="summary-text-roundtrip">Summary</h4>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="ship_departure" id="ship_departure">
            <div class="accordion-item" style="margin-bottom: 25px; border-radius: 10px">
                <div class="depbackground-color" id="flush-headingOne">
                    <p class="accordion-header">
                    <div class="click">
                        <button class="btn-departure" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span style="color: #fff;">Depature</span>
                        </button>
                    </div>
                    </p>
                </div>
                <div class="container-form-summary bg-white">
                    <div class="contain-shippinglogo">
                        <div class="shipping-guide" style="margin-left:10px;">
                            <img src="./assets/images/vgshipping.png" alt="vgshipping"
                                style="width:50px; border-radius: 50%;">
                        </div>
                        <div class="shipping-guide" style="margin-right: 80px;">
                            <span style="font-size: 12px;"><?php echo $data["name"];?></span>
                            <br>
                            <span style="font-size: 12px;"><?php echo $data["ship_name"];?></span>
                        </div>
                    </div>
                    <div class="contain-depretlocation">
                        <div class="shipping-depret">
                            <i class="fa-solid fa-circle-dot"
                                style="display: flex; margin-left: 18px; padding-top: 15px;"></i>
                            <div class="vertical-dotted-line"></div>
                            <i class="fa-solid fa-anchor" style="display: flex; margin-left: 18px;"></i>
                        </div>
                        <div class="shipping-depret" style="padding-top: 10px; margin-right: 90px;">
                            <span><?php echo $data["route_id_from"];?></span>
                            <div style="padding-bottom: 12px;">
                                <br>
                            </div>
                            <span><?php echo $data["route_id_to"];?></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>

            <div class="returen_ship_departure" id="returen_ship_departure">
            <div class="accordion-item" style="border-radius: 10px;">
                <div class="depbackground-color" id="flush-headingTwo">
                    <p class="accordion-header">
                    <div class="click">
                        <button class="btn-departure" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <span style="color: #fff;">Return</span>
                        </button>
                    </div>
                    </p>
                </div>
                <div class="container-form-summary bg-white">
                    <div class="contain-shippinglogo">
                        <div class="shipping-guide" style="margin-left:10px;">
                            <img src="./assets/images/vgshipping.png" alt="vgshipping"
                                style="width:50px; border-radius: 50%;">
                        </div>
                        <div class="shipping-guide" style="margin-right: 80px;">
                            <span style="font-size: 12px;"><?php echo $data["name"];?></span>
                            <br>
                            <span style="font-size: 12px;"><?php echo $data["ship_name"];?></span>
                        </div>
                    </div>
                    <div class="contain-depretlocation">
                        <div class="shipping-depret">
                            <i class="fa-solid fa-circle-dot"
                                style="display: flex; margin-left: 18px; padding-top: 15px;"></i>
                            <div class="vertical-dotted-line"></div>
                            <i class="fa-solid fa-anchor" style="display: flex; margin-left: 18px;"></i>
                        </div>
                        <div class="shipping-depret" style="padding-top: 10px; margin-right: 90px;">
                            <span><?php echo $data["route_id_to"];?></span>
                            <div style="padding-bottom: 12px;">
                                <br>
                            </div>
                            <span><?php echo $data["route_id_from"];?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="button-mobile-fixed">
           <!-- //===========================================
            //====================return================= -->
            <input type="text" name="r_sched" hidden>
            <input type="text" name="r_acom" hidden>
            <input type="text" name="r_totalPrice" hidden>
            <!-- //======================end================== -->
            <button type="submit" id="btncontinue" class="btn btn-primary btn-block btn-lg"> Continue </button>
        </div>
        </form>
    </div>



<<div class="bottom-header-searchtrip3">
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
<?php }   ?>
<script src="js/jquery.validate.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main/active.js"></script>
<script src="js/main/schedule/avail_process.js"></script>
<script>
  $(document).ready(function() {
    <?php if (isset($formatted_date)): ?>
      var selectedDate = "<?php echo $formatted_date; ?>";
      var startDay = parseInt(selectedDate.slice(6, selectedDate.length));
      var startMonth = parseInt(selectedDate.slice(4, 6));
      var startYear = parseInt(selectedDate.slice(0, 4));
      
      selectedDate = new Date(startYear, startMonth-1, startDay);
      $('#selectedDateRange').css('display', 'block');
      $('#selectedDateRange1').css('display', 'block');
      console.log(selectedDate);
    <?php endif; ?>
  });
</script>

<script>
(function($) {
    $(function() {
        //  open and close nav 
        $('#navbar-toggle').click(function() {
            $('nav ul').slideToggle();
        });
        // Hamburger toggle
        $('#navbar-toggle').on('click', function() {
            this.classList.toggle('active');
        });
        // If a link has a dropdown, add sub menu toggle.
        $('nav ul li a:not(:only-child)').click(function(e) {
            $(this).siblings('.navbar-dropdown').slideToggle("slow");

            // Close dropdown when select another dropdown
            $('.navbar-dropdown').not($(this).siblings()).hide("slow");
            e.stopPropagation();
        });
        // Click outside the dropdown will remove the dropdown class
        $('html').click(function() {
            $('.navbar-dropdown').hide();
        });
    });
})(jQuery);
</script>

<script>
$('.click button').click(function() {
    $(this).find('i').toggleClass('fa-chevron-circle-down fa-chevron-circle-up')
});
</script>
</body>

<style>

</style>

</html>