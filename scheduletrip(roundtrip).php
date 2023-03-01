<?php
include_once("modules/schedule/paypal_config.php");
require_once("resources/templates/_header(withmodifyitinerary).php");
if (isset($_COOKIE['data'])) {
    $datas = $_COOKIE['data'];
    $data = urldecode($datas);
    $data = json_decode($data, TRUE);
    $date = $data["departure_date"];
    $formatted_date = date("Ymd", strtotime($date));
?>
    <div class="one">
        <div class="container">
            <ol class="cd-multi-steps text-top">
                <li class="current"><a href="#0">SCHEDULE</a></li>
                <li class=""><a href="#0">PASSENGER INFO</a></li>
                <li class=""><em>PAYMENT</em></li>
                <li><em>COMPLETE</em></li>
            </ol>
            <br>
            <div class="depature-location">
                <h3 style="color: #ededed;"><?php echo $data["route_id_from"]; ?></h3><i class="fa-solid fa-arrow-right" style="color: #fff; font-size: 28px; padding-left: 10px; padding-right: 10px;"></i>
                <h3 style="color: #ededed;">
                    <?php echo $data["route_id_to"]; ?>
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
                    if (isset($date)) {
                        $stmt_ship_sd = $con->prepare("SELECT 
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
                        $stmt_ship_sd->bind_param('s', $date);
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
                                            <input type="radio" hidden="" id="schedule_id" name="schedule_id" value="<?php echo $row1['schedule_id'] ?>" />
                                            <div class="itinerary-row itinerary-head">
                                                <input type="text" hidden="" id="departureDateInput" value="<?php echo $date; ?>">
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
                                                        <!-- <img alt="" src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-ocean-fast-ferries-inc.png" /> -->
                                                        <!---->
                                                    </div>
                                                    <div class="itinerary-name">
                                                        <div class="booking-type booking-td-title">
                                                            <div><?php echo $row1['name']; ?></div>
                                                            <!---->
                                                            <div class="booking-td-meta book-text-muted">
                                                                <?php echo $row1['ship_name']; ?>
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
                                                        <select id="accomodation_form" name="selectedAccommodation" class="form-control accommodation border ng-untouched ng-pristine ng-valid" data-row-id="<?php echo $row1['schedule_id'] ?>">';
                                                            <?php
                                                            $ferry = $row1['ferry_id'];
                                                            $stmt = $con->prepare("SELECT * FROM accommodations WHERE ferry_id=?");
                                                            $stmt->bind_param('s', $ferry);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();
                                                            while ($row = $result->fetch_assoc()) {
                                                                $acommodations = $row["acomm_name"];
                                                                $acommodations_id = $row["accomodation_id"];
                                                                echo '<option value="' . $acommodations_id . '">' . $acommodations . '</option>';
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
                                                                    echo '₱<span id="price-' . $row1['schedule_id'] . '">' . $row1["price"] . '</span>';

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
        <?php }
                    } ?>
        <!---->
            </div>
        </div>
        <br>
        <div class='error'>
            No departure accommodation selected.
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
                                    <button class="btn-departure" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span style="color: #fff;">Depature</span>
                                    </button>
                                </div>
                                </p>
                            </div>
                            <div class="container-form-summary bg-white">
                                No departure voyage selected yet.
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="button-mobile-fixed">
                    <button type="submit" id="btncontinue" class="continueBtn btn btn-primary btn-block btn-lg"> Continue </button>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php }   ?>
<?php include_once("passengerinfo.php"); ?>
<div id="success_tic" class="modal" title="Success">
    <h2>Passenger info submitted successfully.</h2>
    <div class="container">
        <div class="component">
            <div class="hero-image">
                <img src="img/barkomatic-payment.jpg" alt="barkomatic Boat">
            </div>
            <div class="component-info">
                <div class="order-summary">
                    <h2>Summary</h2>
                </div>
                <div class="annual-plan">
                    <div class="plan-price">
                        <h4>DEPARTURE DATE</h4>
                        <p><span id="dateDeparture"></span></p>
                    </div>
                    <div class="change">
                        <!-- <a></a> -->
                    </div>
                </div>
                <div class="annual-plan">
                    <div class="plan-price">
                        <h4>ARRIVAL TIME</h4>
                        <p><span id="timeArrival"></span></p>
                    </div>
                    <div class="change">

                    </div>
                </div>
                <div class="annual-plan">
                    <div class="plan-price">
                        <h4>FERRY NAME</h4>
                        <p><span id="nameFerry"></span></p>
                    </div>
                    <div class="change">
                    </div>
                </div>
                <div class="annual-plan">
                    <div class="plan-price">
                        <h4>ROUTE FROM</h4>
                        <p><span id="routeFrom"></span></p>
                    </div>
                    <div class="change">
                    </div>
                </div>
                <div class="annual-plan">

                    <div class="plan-price">
                        <h4>ROUTE TO</h4>
                        <p><span id="routeTo"></span></p>
                    </div>
                    <div class="change">

                    </div>
                </div>
                <div class="annual-plan">

                    <div class="plan-price">
                        <h4>Accomodation</h4>
                        <p><span id="AccomondationName"></span></p>
                    </div>
                    <div class="change">

                    </div>
                </div>
                <div class="annual-plan">

                    <div class="plan-price">
                        <h4>Ticket Price</h4>
                    </div>
                    <div class="change">
                        <a><span id="PriceTicket"></span></a>
                    </div>
                </div>
                <div class="annual-plan">

                    <div class="plan-price">
                        <h4>Passengers</h4>

                    </div>
                    <div class="change">
                        <a><span id="PassengersCount"></span></a>
                    </div>
                </div>
                <hr>
                <div class="annual-plan">

                    <div class="plan-price">
                        <h2>Total</h2>
                    </div>
                    <div class="change">
                        <a><span id="totalPrices"></span></a>
                    </div>
                </div>
                <form method='post' action='<?php echo PAYPAL_URL; ?>'>
                    <!-- PayPal business email to collect payments -->
                    <input type='hidden' name='business' value='<?php echo PAYPAL_EMAIL; ?>'>
                    <!-- Details of item that customers will purchase -->
                    <input type='hidden' name='item_number' value='Purchase'>
                    <input type='hidden' name='item_name' value='01'>
                    <input type='hidden' name='amount' value='300'>
                    <input type='hidden' name='currency_code' value='<?php echo CURRENCY; ?>'>
                    <input type='hidden' name='no_shipping' value='1'>
                    
                    <!-- PayPal return, cancel & IPN URLs -->
                    <input type='hidden' name='return' value='<?php echo RETURN_URL; ?>'>
                    <input type='hidden' name='cancel_return' value='<?php echo CANCEL_URL; ?>'>
                    <input type='hidden' name='notify_url' value='<?php echo NOTIFY_URL; ?>'>

                    <!-- Specify a Pay Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
                    <button type="submit" class="pay btn-payment">Proceed to Payment</button>
                    </form>
                <a href="avail_search-trip.php" class="btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.validate.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main/active.js"></script>
<script src="js/main/schedule/avail_process.js"></script>
<script>
    $(document).ready(function() {
        var selectedDate2 = "<?php echo $date; ?>";
        var DaterFormat = $.datepicker.formatDate('yymmd', new Date(selectedDate2));
        var DaterFormat = DaterFormat.replace(/^0+/, '');
        <?php if (isset($formatted_date)) : ?>
            var selectedDate = "<?php echo $formatted_date; ?>";
            var startDay = parseInt(selectedDate.slice(6, selectedDate.length));
            var startMonth = parseInt(selectedDate.slice(4, 6));
            var startYear = parseInt(selectedDate.slice(0, 4));

            selectedDate = new Date(startYear, startMonth - 1, startDay);
            $('#selectedDateRange').css('display', 'block');
            $('#selectedDateRange1').css('display', 'block');
            $('[date-id="' + DaterFormat + '"]').addClass('start selected last');
            console.log(DaterFormat);
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
<script>
    $(document).ready(function() {
        $('.error').hide();
        $(".cancelBtn").on('click', function(e) {
            e.preventDefault();
            $(".two").fadeOut(function() {
                $(".one").fadeIn();
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.close').click(function() {
            $('#myModal').hide();
        });
    });
</script>
</body>

<style>

</style>

</html>