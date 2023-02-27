<?php
header('Access-Control-Allow-Origin: *');
require "resources/templates/_search-trip_header.php"; ?>


<!-- div id="siteLoader" class="site-loader">
        <div class="preloader-content">
            <img src="assets/images/loader1.gif" alt="">
        </div >
    </div -->
<div class="mobile-menu-container"></div>
</header>

<div class="searchtripmargin">

<div class="container">
  <div class="col">
    <div class="tab-wrapper">
      <div class="tab-header">
        <button class="tab-btn">
        <i class="fas fa-user"></i>
        Passenger
        </button>
      </div>
      <div class="tab-body">
                    <form id="search_sched_form" class="ng-untouched ng-pristine ng-invalid">
                    <div class="search-form-box">
                        <div class="row">
                            <div class="col">
                                <div class="check-box-mv mg-t-10">
                                    <input class="coupon_question" type="checkbox" id="check-email" /><label for="check-email"
                                        class="text-normal">Has Preferred Shipping Lines</label>
                                </div>
                            </div>
                        </div>
                        <div class="row answer">
                            <div class="col">
                                <div class="shipping-lines-company mt-2">
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
                                                          <div class="ship-radio">
                                                            <input type="radio" data-type="radio" name="srch_ship_sched" style="display: none" id="<?php echo $row1['owner_id']; ?>" value="<?php echo $row1['owner_id']; ?>"  class="ng-untouched ng-pristine ng-invalid" />
                                                            <label class="company radio-label" for="<?php echo $row1['owner_id']; ?>" data-id="srch_ship_sched">
                                                                <div class="company-img">
                                                                    <img width="150" alt="" class="company-logo"
                                                                    src="data:image/jpeg;base64,<?php echo base64_encode($row1['ship_logo']); ?>" alt="<?php echo $row1['ship_name']; ?>"/>
                                                                </div>
                                                            </label>
                                                        </div>
                                            <?php } ?>
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="row">
                            <div class="col">
                                <div class="md-radio">
                                    <input id="trip1" type="radio" name="tripDirection" formcontrolname="tripDirection"
                                        checked="" class="ng-untouched ng-pristine ng-valid" /><label for="trip1">One-Way</label>
                            </div>
                        </div>
                        <!---->
                        <!---->
                        <div class="row mt-2">
                            <div class="col-md">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text input-label-w">From</label>
                                    </div>
                                    <!----><select name="srch_sched_loc_from" id="depFrom" required="" class="custom-select ng-untouched ng-pristine ng-valid">
                                    <?php 
                                                    $stmt1 = $con->prepare("SELECT * FROM routes"); 
                                                    $stmt1->execute();
                                                    $result1 = $stmt1->get_result();
                                                    while ($row1 = $result1->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row1['route_id']; ?>"><?php echo $row1['departure_from']; ?></option>
                                                <?php } ?>
                                        <!---->
                                    </select>
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                            <div class="col-ms switch-icon">
                                <button type="button" class="btn btn-transparent">
                                    <span class="fa fa-exchange"></span>
                                </button>
                            </div>
                            <div class="col-md">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text input-label-w">To</label>
                                    </div>
                                    <!----><select name="srch_sched_loc_to"
                                        class="custom-select ng-untouched ng-pristine ng-valid" id="depto">
                                        <?php 
                                                    $stmt1 = $con->prepare("SELECT * FROM routes"); 
                                                    $stmt1->execute();
                                                    $result1 = $stmt1->get_result();
                                                    while ($row1 = $result1->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row1['route_id']; ?>"><?php echo $row1['departure_from']; ?></option>
                                                <?php } ?>
                                        <!---->
                                    </select>
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-label-w">Depart</span>
                                            </div>
                                            <input id="from2" type="text" name="srch_sched_loc_depart" bsdatepicker="" placement="top" class="form-control ng-untouched ng-pristine ng-valid" />
                                            <!---->
                                            <div class="input-group-append toggle-calendar" aria-expanded="false">
                                                <span class="input-group-text"><span
                                                        class="far fa-calendar-alt"></span></span>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group mb-3" style="visibility: visible">
                                            <div class="input-group-prepend">
                                                <span  class="input-group-text input-label-w">Return</span>
                                            </div>
                                            <input id="to2" type="text" name="returnDate" placement="top" class="form-control ng-untouched ng-pristine ng-valid" />
                                            <!---->
                                            <div class="input-group-append toggle-calendar" aria-expanded="false">
                                                <span class="input-group-text"><span
                                                        class="far fa-calendar-alt"></span></span>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-label-w"
                                                    style="width: auto">Passengers</span>
                                            </div>
                                            <input type="number" min="1" name="paxCount" class="form-control ng-untouched ng-pristine ng-valid" max="10" />
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <button type="submit" name="srch_sched_btn" id="srch_sched_btn" class="btn btn-primary btn-block">
                                            <span class="mr-2"><span class="svg-icon svg-icon-white svg-icon-2x"><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20px"
                                                        height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path
                                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                            <path
                                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                fill="#000000" fill-rule="nonzero"></path>
                                                        </g>
                                                    </svg></span></span><span>Search Trips</span>
                                        </button>
                                    </div>
                                </div>
                                <!---->
                                <!---->
                                <!---->
                            </div>
                            <!---->
                        </div>
                        <!---->
                        </div>
                    </form>
        </div>
      </div>
  </div>
</div>
</div>
<script src="js/jquery.validate.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main/active.js"></script>
<script src="js/main/schedule/avail_process.js"></script>
<script>
function selectOnChange(obj) {
    var price = $(obj).find(':selected').data('price');
    var cost = document.getElementById("cost").value;

    var priceInt = parseInt(price);
    var costInt = parseInt(cost);

    var total = parseInt(priceInt + costInt);
    document.getElementById("AcommondationPrice").value = priceInt;
    document.getElementById("total").value = total;


    if (price == 0) {
        document.getElementById("AcommondationPrice").value = "";
    }

}


function check(input) {

    var checkboxes = document.getElementsByClassName("radioCheck");

    for (var i = 0; i < checkboxes.length; i++) {
        //uncheck all
        if (checkboxes[i].checked == true) {
            // checkboxes[i].disabled = 'false';
            checkboxes[i].checked = false;
            checkboxes[i].disabled = 'false';
        } else if (checkboxes[i].checked != true) {
            checkboxes[i].disabled = 'true';
        }
    }
    //set checked of clicked object
    if (input.checked == true) {
        input.checked = false;
    } else {
        input.checked = true;
    }
}

// for (i=0; i<document.creditCheck.length; i++){
// if (document.creditCheck[i].checked !=true)
//   document.creditCheck[i].disabled='true';
// }
</script>
<script>
$(document).ready(function() {
    $(".answer").hide();
    $(".coupon_question").click(function() {
        if ($(this).is(":checked")) {
            $(".answer").show();
        } else {
            setTimeout(function() {
                $(".answer").hide();
                }, 100);
        }
    });;
});
</script>
<script src="js/jquery/datepicker/wow.min.js"></script>
<!-- <link rel="stylesheet" href="css/jquery-ui.css" /> -->
<script>
new WOW().init();
</script>
<!-- <script src="js/jquery-1.10.2.js"></script> -->
<script src="js/jquery/datepicker/jquery-ui1.js"></script>
<script>
// var badDates = new Array("23-04-2022","24-04-2022","19-04-2022","20-04-2022");
// $.getJSON('getDates.php, function(json){badDates=json;});
$(document).ready(function() {
    var badDates;
    $.getJSON('sched_date.php', function(json) {
        badDates = json;
        console.log(badDates);
        $("#srch_sched_loc_depart").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 0,
            firstDay: 1,
            beforeShowDay: function(date) {
                if ($.inArray($.datepicker.formatDate('yy-mm-dd', date),
                        badDates) >= 0) {
                    return [true, "av", "available"];
                } else {
                    return [false, "notav", 'Not Available'];


                }
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('input[data-type=radio]').click(function(e) {
        var gender = $(this).val();
        var act = "getShipsched";
        $.ajax({
            url: "getShipsched.php",
            type: "POST",
            data: {
                action: act,
                shipname: gender
            },
            success: function(data) {
                setTimeout(function() {
                    $("#answering").html(data);
                }, 100);
                console.log(data);
            }
        });

    });
});
</script>

<script>
$(document).ready(function() {
    $('.carousel[data-type="multi"] .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 2; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
});
</script>
<script>
function inittab(tabWrapper, activeTab = 1) {
  const tabBtns = tabWrapper.querySelectorAll(".tab-btn");
  const underline = tabWrapper.querySelector(".underline");
  const tabContents = tabWrapper.querySelectorAll(".tab-content");

  activeTab = activeTab - 1;
  tabBtns[activeTab].classList.add("active");
  underline.style.width = `${tabBtns[activeTab].offsetWidth}px`;
  underline.style.left = `${tabBtns[activeTab].offsetLeft}px`;
  tabContents.forEach((content) => {
    content.style.transform = `translateX(-${activeTab * 100}%)`;
  });

  tabBtns.forEach((btn, index) => {
    btn.addEventListener("click", () => {
      tabBtns.forEach((btn) => btn.classList.remove("active"));
      btn.classList.add("active");
      underline.style.width = `${btn.offsetWidth}px`;
      underline.style.left = `${btn.offsetLeft}px`;
      tabContents.forEach((content) => {
        content.style.transform = `translateX(-${index * 100}%)`;
      });
    });

    //same effect as on click when button in focus
    btn.addEventListener("focus", () => {
      tabBtns.forEach((btn) => btn.classList.remove("active"));
      btn.classList.add("active");
      underline.style.width = `${btn.offsetWidth}px`;
      underline.style.left = `${btn.offsetLeft}px`;
      tabContents.forEach((content) => {
        content.style.transform = `translateX(-${index * 100}%)`;
      });
    });
  });
}

const tabWrappers = document.querySelectorAll(".tab-wrapper");
tabWrappers.forEach((tabWrapper, index) => inittab(tabWrapper));

</script>
<script>
$(document).ready(function() {
const paxCountInputElement = document.querySelector('input[name="paxCount"]');
const defaultValue = 1;
paxCountInputElement.defaultValue = defaultValue;
    });
</script>
<script>
$(document).ready(function() {
// Get the select elements
var fromSelect = document.getElementById("depFrom");
var toSelect = document.getElementById("depto");
// Get the number of options
var options = Math.max(fromSelect.options.length, toSelect.options.length);
// Generate a random index between 0 and the number of options
var randomIndex = Math.floor(Math.random() * options);
// Set both select elements to the same random option
fromSelect.selectedIndex = randomIndex;

});
</script>
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

</html>