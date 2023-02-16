<?php
require_once("resources/templates/_passengerinfo_header.php");
?>
     <div class="progressbar-row">
        <div class="col-sm-2"> </div>
        <div class="progressbar col-sm-8" style="font-size: 12px;margin-top: 50px; font-weight: bolder; color: #fff; ">
            <div class="container text-center">
                <div class="progressbar-text row ">
                    <div class="col-sm-3 text-center">
                        SCHEDULE
                    </div>
                    <div class="col-sm-3 text-center">
                        PASSENGER INFO
                    </div>
                    <div class="col-sm-3 text-center " style="opacity: 0.6;">
                        PAYMENT
                    </div>
                    <div class="col-sm-3 text-center " style="opacity: 0.6;">
                        COMPLETE
                    </div>
                </div>
                <div class="row  " style="margin-top: 10px">
                    <div class="col-md-1 "></div>
                    <div class="col-md-10 ">
                        <div class="progress" style="opacity: 0.8; width: 95%;height:10px; margin-left: 2.5%; margin-right: 2.5%;">
                            <div class="one " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                            <div class="two " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px; left: 34%;"></div>
                            <div class="three " style=" background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;left: 64%;"></div>
                            <div class="four " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;left: 94%;"></div>

                            <div class="progress-bar" style="width: 34.5%; "></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-contactinfo pt-2 pb-2" style="margin-top: 0px;">
        <i class="fa fa-info-circle" style="color: #fff; font-size: 22px;"></i>
        <span class="word-information">Contact Information</span>
    </div>
    <div class="container-field mb-4 pt-2 pb-2 border border-success">
        <i class="fa fa-info-circle text-muted font-weight-bold" style="font-size: 20px; font-weight:bold;margin-left: 0px;margin-right: 20px;">
        </i><span class="field-paragraph">Fields with red asterisk (<a class="text-danger fs-6 ">*</a>) are required </span>
    </div>
    <div class="container-form bg-white pt-4 pb-sm-4 mb-4">
        <form>
            <div class="form-row">

                <div class="col-md-6 mb-3">
                    <span class="labelnameborder">
                    <label for="validationDefault01">Contact Person <a class="text-danger fs-6 ">*</a></label>
                    </span>
                    <input type="text" class="form-control" id="validationDefault01" required>
                </div>
                <div class="col-md-6 mb-3">
                    <span class="labelnameborder2">
                    <label for="validationDefault02">Mobile Number (+64 xxxxxxxxxx) <a class="text-danger fs-6 ">*</a></label>
                    </span>
                    <div class="input-group">
                        <input type="tel" id="phone" class="form-control" value="+63" maxlength="13" size="55">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <span class="labelnameborder">
                    <label for="validationDefault01">Email Address <a class="text-danger fs-6 ">*</a></label>
                    </span>
                    <input type="text" class="form-control" id="validationDefault01" placeholder="name@email.com" required>
                </div>
                <div class="col-md-6 mb-3">
                    <span class="labelnameborder2">
                    <label for="validationDefault02">Confirm Email Address <a class="text-danger fs-6 ">*</a></label>
                    </span>
                    <input type="text" class="form-control" id="validationDefault02" placeholder="name@email.com" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <span class="labelnameborder3">
                    <label for="validationDefault03">Address <a class="text-danger fs-6 ">*</a></label>
                    </span>
                    <input type="text" class="form-control" id="validationDefault03" placeholder="e.g. Ozamiz City, Misamis Occidental / APOR" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">
                 I would like to receive notifications about travel promos and advisories in the future.
                </label>
                </div>
            </div>
        </form>
    </div>
    <div class="container-passengerdetails ">
        <span class="word-passenger">Passenger Details</span>
    </div>
    <div class="container-field mb-4 pt-2 pb-2 border border-success">
        </i><span class="field-paragraph2"> * Senior/PWD/Student discounts are not available online. </span>
    </div>
    <div class="container-form bg-white pt-4 pb-sm-4 mb-4">
        <form>
            <div class="form-row">
                <div class="form-group  col-md-4">
                    <label for="inputEmail4">First Name <a class="text-danger fs-6 ">*</a></label>
                    <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
                </div>
                <div class="form-group col-sm-1">
                    <label for="inputMiddleName">MI <a class="text-danger fs-6 "></a></label>
                    <input type="text" class="form-control" id="inputMiddleName" placeholder="M.I.">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputLastName">Last Name<a class="text-danger fs-6 ">*</a></label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputGender">Gender <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputGender" class="form-control">
                  <option selected>Select</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group  col-md-3">
                    <label for="inputDateofBirth">Date of Birth <a class="text-danger fs-6 ">*</a></label>
                    <input type="date" class="form-control" id="inputFirstName" placeholder="First Name">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputType">Type <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputType" class="form-control">
                  <option selected>Adult</option>
                  <option>Minor</option>
                </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputNationality">Nationality <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputNationality" class="form-control">
                  <option selected>Filipino</option>
                  <option>American</option>
                  <option>Korean</option>
                </select>
                </div>
                <div class="form-group  col-md-5">
                    <label for="inputDateofBirth">Email <a class="text-danger fs-6 ">*</a></label>
                    <input type="text" class="form-control" id="validationDefault02" placeholder="Name@Email.com" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputDepartureDiscount">Apply Departure Discount? <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputDepartureDiscount" class="form-control">
                  <option selected>Regular</option>
                </select>
                </div>
                <div class="form-group col-sm-3">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputReturnDiscount">Apply Return Discount? <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputReturnDiscount" class="form-control">
                  <option selected>Regular</option>
                </select>
                </div>
            </div>

        </form>
    </div>
    <div class="container-form-button pt-4 pb-sm-4 mb-4">
        <div class="form-row">
            <div class="form-group col-md-4">
                <button type="button" class="btn btn-light btn-lg pt-3 pb-sm-3">Back</button>
            </div>
            <div class="form-group col-md-4 ">
            </div>
            <div class="form-group col-md-4" style="padding-left: 20%;">
                <button type="button" class="btn btn-primary btn-lg pt-3 pb-sm-3">Continue</button>
            </div>
        </div>
    </div>
    <div class="bottom-header-searchtrip3">
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
    
    <!-- ꙮꙮꙮꙮꙮꙮ ꙮꙮꙮꙮꙮꙮ ꙮꙮꙮꙮꙮꙮ-->
    <script src="./assets/js/intlTelInput.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var input = document.querySelector("#phone")
        window.intlTelInput(input, {});

        $(window).on('load', function(){
            $('.modal.fade').appendTo('body');
        })
    </script>

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.js"></script>
    <!-- pop-up important notice -->
    <script>
        jQuery(document).ready(function () {
          function openFancybox() {
              setTimeout(function () {
                  jQuery('#popuplink').trigger('click');
              }, 500);
          };
          var visited = jQuery.cookie('visited');
          if (visited == 'yes') {
               // second page load, cookie active
          } else {
              openFancybox(); // first page load, launch fancybox
          }
        var date = new Date();
        date.setTime(date.getTime() + (30 * 1000));
        jQuery.cookie('visited', 'yes', {
                expires: date // the number of set (days/min/sec cookie) will be effective
        });
        jQuery("#popuplink").fancybox({modal:true, overlay : {closeClick : true}});
      });
        function myFunction1() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        function myFunction2() {
            var checkBox = document.getElementById("myCheck2");
            var text = document.getElementById("text2");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        // function to adjust minDate +/-
        function modifyMinMaxDate(date, days) {
            var tempDate = date;
            tempDate.setDate(tempDate.getDate() + days);
            return tempDate;
        }

        $(function() {
            var dateFormat = "mm/dd/yy",
                from = $("#from").datepicker({
                    defaultDate: "-2w",
                    changeMonth: true,
                    changeYear: true,
                    maxDate: "-1",
                    onClose: function(selectedDate) {
                        $("#to").datepicker(
                            "option",
                            "minDate",
                            modifyMinMaxDate(new Date(selectedDate), 1)
                        );
                    }
                }),
                to = $("#to").datepicker({
                    defaultDate: "-1w",
                    changeMonth: true,
                    changeYear: true,
                    maxDate: "0",
                    onClose: function(selectedDate) {
                        $("#from").datepicker(
                            "option",
                            "maxDate",
                            modifyMinMaxDate(new Date(selectedDate), -1)
                        );
                    }
                });
        });
        $(function() {
            var dateFormat = "mm/dd/yy",
                from2 = $("#from2").datepicker({
                    defaultDate: "-2w",
                    changeMonth: true,
                    changeYear: true,
                    maxDate: "-1",
                    onClose: function(selectedDate) {
                        $("#to").datepicker(
                            "option",
                            "minDate",
                            modifyMinMaxDate(new Date(selectedDate), 1)
                        );
                    }
                }),
                to2 = $("#to2").datepicker({
                    defaultDate: "-1w",
                    changeMonth: true,
                    changeYear: true,
                    maxDate: "0",
                    onClose: function(selectedDate) {
                        $("#from").datepicker(
                            "option",
                            "maxDate",
                            modifyMinMaxDate(new Date(selectedDate), -1)
                        );
                    }
                });
        });
    </script>

</body>
</html>