
<?php
require_once("resources/templates/_payment_header.php");
?>
    <div class="progressbar-row2">
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
                    <div class="col-sm-3 text-center ">
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
                            <div class="one " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;"></div>
                            <div class="two " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px; left: 34%;"></div>
                            <div class="three " style=" background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;left: 64%;"></div>
                            <div class="four " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;left: 94%;"></div>

                            <div class="progress-bar" style="width: 65.5%; "></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-form-total">
        <div class="contain-payment">
            <span style="padding-right: 41px; padding-bottom: 15px; color: #fff;">1x Passenger</span>
            <span style="padding-left: 21px; color: #fff;">2,400.00</span>
        </div>
        <div class="contain-payment">
            <span style="padding-right: 41px; color: #fff;">Services Charge</span>
            <span style="padding-left: 20px; color: #fff;">160.00</span>
        </div>
        <span style="font-size: small;  color: #fff;">(NON-REFUNDABLE)</span>
        <div class="contain-payment">
            <span style="padding-right: 76px; padding-top: 15px; color: #fff;">Terminal Fee</span>
            <span style="padding-left: 20px; padding-top: 15px; color: #fff;">0.00</span>
        </div>
    </div>
    <div class="container-form-total2 ">
        <div class="contain-payment">
            <span style="font-size: 12px; color: #fff; padding-left: 4px; padding-bottom: 2px; background-color: #0085BA; border-radius: 3px;">Service charge will vary depending on payment option selected.</span>
        </div>
        <div class="contain-payment">
            <span style="padding-right: 170px; padding-top: 10px; color: #fff;">TOTAL</span>
        </div>
        <div class="contain-payment">
            <span class="contain-payment-total">₱ 1,682.00</span>
        </div>
    </div>
    <div class="container-form-payment bg-white pt-2 pb-2">
        <span> <img src="../assets/images/barkomatic-ship-logo.png" alt="barkomatic-ship-logo" class="ship-logo"></span>
        <span class="word-information2">You're Almost There!</span>
    </div>
    <div class="container-paymentword">
        <span>Payment Options <a class="text-danger fs-6 ">*</a></span>
    </div>
    <div class="container-important2 border border-success pt-3 ">
        <p>
            <span class="important-word">IMPORTANT:</span> <span class="important-paragraph ">Non-credit card payments will be posted on the next banking day.</span>
        </p>
    </div>
    <div class="container-field2 mb-4 pt-2 pb-2 border border-success ">
        <i class="fa fa-info-circle text-muted font-weight-bold " style="font-size: 20px; font-weight:bold;margin-left: 0px;margin-right: 20px; ">
        </i><span class="field-paragraph ">Fields with red asterisk (<a class="text-danger fs-6 ">*</a>) are required </span>
    </div>
    <div class="container-pay">
        <label class="option_item">
          <input class="checkbox">
          <div class="option_inner payment">
            <div class="tickmark"></div>
            <div class="icon"><i class="fa-solid fa-credit-card"></i></div>
            <div class="name">Credit Card</div>
          </div>
        </label>
        <label class="option_item">
          <input type="checkbox" class="checkbox" >
          <div class="option_inner payment">
            <div class="tickmark"></div>
            <div class="icon"><i class="fa-brands fa-cc-paypal"></i></div>
            <div class="name">Paypal</div>
          </div>
        </label>
        <label class="option_item2">
          <input class="checkbox">
          <div class="option_inner2 payment">
            <div class="tickmark"></div>
            <div class="icon"><i class="fa-solid fa-wallet"></i></div>
            <div class="name">Gcash/Paymaya</div>
          </div>
        </label>
        <label class="option_item3">
          <input class="checkbox" >
          <div class="option_inner3 payment">
            <div class="tickmark"></div>
            <div class="icon"><i class="fa-solid fa-cash-register"></i></div>
            <div class="name">Over The Counter</div>
          </div>
        </label>
    </div>
    <div class="container-pay">
        <label class="option_item4">
          <input  class="checkbox" >
          <div class="option_inner4 payment">
            <div class="tickmark"></div>
            <div class="icon"><i class="fa-solid fa-cash-register"></i></div>
            <div class="name">Dragonpay Non-Bank</div>
          </div>
        </label>
    </div>
    <div class="container-passengerword">
        <span>Passenger Guidelines</span>
    </div>
    <div class="container-passengerguidelines bg-white">
        <div class="contain-payment ">
            <div class="passengerguide" style="margin-left: 2%;">
                <span style="font-size: 43px; margin-left: 25px;"><i class="fa-solid fa-ticket"></i></span>
                <br>
                <span class="passengerguide-text">Print the ticket</span>
            </div>
            <span><i class="fa-solid fa-angle-right" style="font-size: 40px; margin-top: 50px;"></i></span>
            <div class="passengerguide" style=" margin-left: 1%;">
                <span style="font-size: 43px; margin-left: 25px; "><i class="fa-solid fa-id-card "></i></span>
                <br>
                <span class="passengerguide-text">Bring a valid ID</span>
            </div>
            <span><i class="fa-solid fa-angle-right " style="font-size: 40px; margin-top: 50px;"></i></span>
            <div class="passengerguide" style="margin-right: 2%;">
                <span style="font-size: 43px; margin-left: 115px;"><i class="fa-solid fa-ship "></i></span>
                <br>
                <span class="passengerguide-text">Be there 30 minutes before departure</span>
            </div>
        </div>
    </div>
    <div class="container-tripsummary">
        <h4 style="color: #fff;">Trip Summary</h4>
    </div>
    <div class="container-tripsummaryform bg-white">
        <div class="border-dotted">
            <p style=" width:90px; font-size: 17px; margin-top:-15px; margin-left:20px; padding-left: 7px; background:white;">
                Depature</p>
            <div class="contain-departure">
                <div class="depaturefrom">
                    <h3>Cebu</h3>
                </div>
                <i class="fa-solid fa-arrow-right" class="" style="font-size: 30px; position: absolute;"></i>
                <div class="depatureto">
                    <h3>Tagbilaran City, Bohol</h2>
                </div>
            </div>
        </div>
        <div class="contain-depaturedetails">
            <div class="depaturesummary">
                <span style="font-size:14px; color: #C4AEB2;">DEPARTURE DATE</span>
                <br>
                <span style="color: #657174;">December 20, 2022</span>
            </div>
            <div class="depaturesummary">
                <span style="font-size:14px; color: #C4AEB2;">DEPARTURE TIME</span>
                <br>
                <span style="color: #657174;">10:00 AM</span>
            </div>
            <div class="depaturesummary">
                <img src=".//assets/images/vgshipping.png" alt="vgshippinglogo" class="ownershiplogo">
                <span style="color: #657174;">VG Shipping Lines</span>
                <br>
                <span style="font-size: 12.5px; color: #657174;">VG-RORO (CARGO-PAX)</span>
            </div>
        </div>
        <div class="contain-depaturedetails">
            <div class="depaturesummary2" style="display: inline-block; margin-left:2.1%;">
                <span style=" font-size:14px; color: #C4AEB2; ">ACCOMODATION</span>
                <br>
                <span style="color: #657174; ">Standard A</span>
            </div>
            <div class="depaturesummary2 " style="display: inline-block; margin-left: 9.6%; margin-right: 12%; ">
                <span style="font-size:14px; color: #C4AEB2; ">SEAT TYPE</span>
                <br>
                <span style="color: #657174; ">Bunk</span>
            </div>
            <div class="depaturesummary2 " style="display: inline-block; margin-right: 13.8%;">
                <span style="font-size:14px; color: #C4AEB2; ">AIRCON</span>
                <br>
                <span style="color: #657174; ">NO</span>
            </div>
        </div>
        <div class="container-port">
            <div class="depaturesummary-port" style="display: inline-block; margin-left:2.1%;">
                <span style=" font-size:14px; color: #C4AEB2; ">PORT</span>
                <br>
                <span style="color: #657174; ">Port of Cebu Passenger Terminal 1 (Pier 1)</span>
                <span style="color: #657174; "><i class="fa-solid fa-arrow-right" style="padding-left: 10px; padding-right: 10px;"></i>Port of Tagbilaran</span>
            </div>
        </div>
        <div class="margin-bottom"></div>
        <hr width="100%" />
        <div class="margin-top"></div>
        <div class="border-dotted2">
            <p style=" width:70px; font-size: 17px; margin-top:-15px; margin-left:20px; padding-left: 7px; background:white;">
                Return</p>
            <div class="contain-return">
                <div class="depaturefrom2">
                    <h3>Tagbilaran City, Bohol</h3>
                </div>
                <i class="fa-solid fa-arrow-right" style="font-size: 30px; margin-left: 10px; position: absolute;"></i>
                <div class="depatureto2">
                    <h3>Cebu</h2>
                </div>
            </div>
        </div>
        <div class="contain-depaturedetails">
            <div class="depaturesummary">
                <span style="font-size:14px; color: #C4AEB2;">DEPARTURE DATE</span>
                <br>
                <span style="color: #657174;">December 23, 2022</span>
            </div>
            <div class="depaturesummary">
                <span style="font-size:14px; color: #C4AEB2;">DEPARTURE TIME</span>
                <br>
                <span style="color: #657174;">10:00 PM</span>
            </div>
            <div class="depaturesummary">
                <img src=".//assets/images/vgshipping.png" alt="vgshippinglogo" class="ownershiplogo">
                <span style="color: #657174; ">VG Shipping Lines</span>
                <br>
                <span style="font-size: 12.5px; color: #657174; ">VG-RORO (CARGO-PAX)</span>
            </div>
        </div>
        <div class="contain-depaturedetails ">
            <div class="depaturesummary2 " style="display: inline-block; margin-left:2.1%; ">
                <span style=" font-size:14px; color: #C4AEB2; ">ACCOMODATION</span>
                <br>
                <span style="color: #657174; ">Standard A</span>
            </div>
            <div class="depaturesummary2 " style="display: inline-block; margin-left: 9.6%; margin-right: 12%; ">
                <span style="font-size:14px; color: #C4AEB2; ">SEAT TYPE</span>
                <br>
                <span style="color: #657174; ">Bunk</span>
            </div>
            <div class="depaturesummary2 " style="display: inline-block; margin-right: 13.8%; ">
                <span style="font-size:14px; color: #C4AEB2; ">AIRCON</span>
                <br>
                <span style="color: #657174; ">NO</span>
            </div>
        </div>
        <div class="container-port">
            <div class="depaturesummary-port " style="display: inline-block; margin-left:2.1%; ">
                <span style=" font-size:14px; color: #C4AEB2; ">PORT</span>
                <br>
                <span style="color: #657174; ">Port of Tagbilaran</span>
                <span style="color: #657174; ; "><i class="fa-solid fa-arrow-right " style="padding-left: 10px; padding-right: 10px; "></i>Port of Cebu Passenger Terminal 1 (Pier 1)</span>
            </div>
        </div>
        <div class="margin-bottom2 "></div>
    </div>
    <div class="container-contactinfo bg-white ">
        <h3>Contact Information</h3>
        <div class="contain-contactinfo">
            <div class="contactinfo ">
                <span style="font-size:14px; color: #C4AEB2; ">NAME</span>
                <br>
                <span style="color: #657174; ">Autentico Jay-ar T.</span>
            </div>
            <div class="contactinfo ">
                <span style="font-size:14px; color: #C4AEB2; ">EMAIL ADDRESS</span>
                <br>
                <span style="color: #657174; ">jayarautentico2022@gmail.com</span>
            </div>
            <div class="contactinfo ">
                <span style="font-size:14px; color: #C4AEB2; ">MOBILE NUMBER</span>
                <br>
                <span style="color: #657174; ">+639096440396</span>
            </div>
        </div>
        <div class="contain-address-info">
            <div class="depaturesummary2 " style="display: inline-block; margin-left:2.5%; ">
                <span style=" font-size:14px; color: #C4AEB2; ">ADDRESS</span>
                <br>
                <span style="color: #657174; ">0059, Puso, Poblacion, Cordova</span>
            </div>
        </div>
    </div>
    <div class="container-passengerinfo bg-white ">
        <h3>Passenger Information</h3>
        <div class="contain-passengerinfo">
            <div class="depaturesummary2 ">
                <span style=" font-size:14px; color: #C4AEB2; ">FIRST NAME</span>
                <br>
                <span style="color: #657174; ">Jay-ar</span>
            </div>
            <div class="depaturesummary2 ">
                <span style="font-size:14px; color: #C4AEB2; ">MIDDLE NAME</span>
                <br>
                <span style="color: #657174; ">T</span>
            </div>
            <div class="depaturesummary2 ">
                <span style="font-size:14px; color: #C4AEB2; ">LAST NAME</span>
                <br>
                <span style="color: #657174; ">Autentico</span>
            </div>
            <div class="depaturesummary2 ">
                <span style="font-size:14px; color: #C4AEB2; ">GENDER</span>
                <br>
                <span style="color: #657174; ">Male</span>
            </div>
        </div>
        <div class="contain-bd-nationality-info">
            <div class="depaturesummary2 " style="display: inline-block; margin-left:2%; margin-right: 7.6%; ">
                <span style=" font-size:14px; color: #C4AEB2; ">BIRTH DATE</span>
                <br>
                <span style="color: #657174; ">October 28, 1998</span>
            </div>
            <div class="depaturesummary2 " style="display: inline-block; ">
                <span style=" font-size:14px; color: #C4AEB2; ">NATIONALITY</span>
                <br>
                <span style="color: #657174; ">Filipino</span>
            </div>
        </div>
    </div>
    <div class="container-form-button pt-4 pb-sm-4 mb-4 ">
        <div class="form-row ">
            <div class="form-group col-md-4 ">
                <button type="button " class="btn btn-light btn-lg pt-3 pb-sm-3 ">Back</button>
            </div>
            <div class="form-group col-md-4 ">
            </div>
            <div class="form-group col-md-4 ">
                <div class="confirm-continuebutton">
                    <button type="button " class="btn btn-primary btn-lg pt-3 pb-sm-3 ">Confirm and Continue</button>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header-searchtrip3 ">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-8 d-none d-lg-block ">
                    <div class="header-contact-info ">
                        <ul>
                            <li>
                                <a href="# "><i class="fas fa-phone-alt "></i> +64 (909) 1234 396</a>
                            </li>
                            <li>
                                <a href="mailto:info@Travel.com "><i class="fas fa-envelope "></i> BarkoamticOnlineTicketing@gmail.com</a>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt "></i> 6000 V. Rama Avenue, Englis, Cebu City
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between ">
                    <div class="header-social social-links ">
                        <ul>
                            <li><a href="# "><i class="fab fa-facebook-f " aria-hidden="true "></i></a></li>
                            <li><a href="# "><i class="fab fa-twitter " aria-hidden="true "></i></a></li>
                            <li><a href="# "><i class="fab fa-instagram " aria-hidden="true "></i></a></li>
                            <li><a href="# "><i class="fab fa-linkedin " aria-hidden="true "></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/intlTelInput.js "></script>
    <script>
        var input = document.querySelector("#phone ")
        window.intlTelInput(input, {});
    </script>
</body>

</html>