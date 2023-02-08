<?php require_once("resources/templates/_header(withmodifyitinerary).php"); ?>
<div class="container">
                    <ol class="cd-multi-steps text-top">
                        <li class="visited"><a href="#0">SCHEDULE</a></li>
                        <li class="visited" ><a href="#0">PASSENGER INFO</a></li>
                        <li class="current"><em>PAYMENT</em></li>
                        <li><em>COMPLETE</em></li>
                    </ol>
                    <br>
</div>

<div class="container">
    <div class="depature-location">
        <h3 style="color: #ededed;">Cebu City</h3><i class="fa-solid fa-arrow-right" style="color: #fff; font-size: 28px; padding-left: 10px; padding-right: 10px;"></i>
        <h3 style="color: #ededed;">Tagbilaran City, Bohol</h3>
    </div>
</div>
    <div class="calendar-section">

        <div class="dateRangeCalendarWrapper">
            <select id="dateRangeMonthPicker">
                <option style="text-align:center ; "value="0">January </option>
                <option style="text-align:center ; "value="1">February</option>
                <option style="text-align:center ; "value="2">March</option>
                <option style="text-align:center ; "value="3">April</option>
                <option style="text-align:center ; "value="4">May</option>
                <option style="text-align:center ; "value="5">June</option>
                <option style="text-align:center ; "value="6">July</option>
                <option style="text-align:center ; "value="7">August</option>
                <option style="text-align:center ; "value="8">September</option>
                <option style="text-align:center ; "value="9">October</option>
                <option style="text-align:center ; "value="10">November</option>
                <option style="text-align:center ; " value="11">December</option>
               </select>
            <div id="dateRange"></div>
            <button id="buttonDatePreviousWrap">&lsaquo;</button>
            <button id="buttonDateNextWrap">&rsaquo;</button>
        </div>

        <div class="selected-date-area" id="selectedDateRange">
    <div radio-group="">
      <form novalidate="" class="ng-untouched ng-pristine ng-valid">
        <div formarrayname="voyageAccommodations" class="ng-untouched ng-pristine ng-valid" >
          <div class="itinerary-table booking-table item-selected">
            <!-- <input type="radio" hidden="" value="[object Object]" /> -->
            <div class="itinerary-row itinerary-head">
              <div class="itr-col booking-time-container">
                <div>
                  <div class="departure-time">6:00 AM</div>
                  <!---->
                  <div class="travel-time">2 hours</div>
                  <!----><!---->
                </div>
              </div>
              <div class="itr-col itinerary-vessel">
                <div class="booking-media-left itinerary-shipping-logo">
                  <img
                    alt=""
                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-ocean-fast-ferries-inc.png"/><!---->
                </div>
                <div class="itinerary-name">
                  <div class="booking-type booking-td-title">
                    <div>Ocean Fast Ferries Inc.</div>
                    <!---->
                    <div class="booking-td-meta book-text-muted">
                      Ocean Jet (FASTCRAFT)
                    </div>
                    <!---->
                  </div>
                </div>
              </div>
              <!---->
            </div>
            
            <div class="itinerary-row">
              <div class="itinerary-col itinerary-select">
                <div class="form-select">
                  <select formcontrolname="selectedAccommodation" class="form-control accommodation border ng-untouched ng-pristine ng-valid">
                    <option value="0: Object">Business Class</option>
                    <option value="1: Object">Open Air</option>
                    <option value="2: Object">Tourist Class</option>
                    <!---->
                  </select>
                </div>
                <!---->
              </div>
              <!---->
              <div
                class="itinerary-col itinerary-price" style="position: relative; overflow: hidden">
                <div class="booking-td-title text-wrap">
                  <div>
                    <div class="booking-td-title">
                      <!-- <span class="price-value" style="margin-right: 20px"> -->
                        ₱1,200.00
                      <!-- </span> -->
                    </div>
                    <div class="booking-type booking-td-title">
                      <div class="booking-td-meta" style="margin-right: 5px">
                        <!-- <span style="font-weight: 800; color: #ff8c00"> -->
                          Ticket Price 
                              <!-- </span> -->
                      </div>
                    </div>
                  </div>
                  <!---->
                </div>
                <!---->
              </div>
              <!----><!---->
              <div class="itinerary-col itinerary-select-btn">
                <button type="button" class="btn btn-success select-button">
                <!-- <span>Selected &nbsp;<span class="fa fa-check"></span></span> -->
                Select
                </button>
              </div>
              <!----><!---->
            </div>
            <!----><!---->
            <div class="itinerary-row"><!----><!----><!----></div>
            <!----><!---->
          </div>
          <!---->
        </div>
        <!---->
      </form>
    </div>
    <!---->
  </div>

    </div>
    
<br>
    <div class="depature-location2">
        <h3 style="color: #ededed;">Tagbilaran City, Bohol</h3><i class="fa-solid fa-arrow-right" style="color: #fff; font-size: 28px; padding-left: 10px; padding-right: 10px;"></i>
        <h3 style="color: #ededed;">Cebu City</h3>
    </div>
    <div class="calendar-section2">
        <div class="dateRangeCalendarWrapper">
            <select id="dateRangeMonthPicker1">
                   <option style="text-align:center ; "value="0">January </option>
                   <option style="text-align:center ; "value="1">February</option>
                   <option style="text-align:center ; "value="2">March</option>
                   <option style="text-align:center ; "value="3">April</option>
                   <option style="text-align:center ; "value="4">May</option>
                   <option style="text-align:center ; "value="5">June</option>
                   <option style="text-align:center ; "value="6">July</option>
                   <option style="text-align:center ; "value="7">August</option>
                   <option style="text-align:center ; "value="8">September</option>
                   <option style="text-align:center ; "value="9">October</option>
                   <option style="text-align:center ; "value="10">November</option>
                   <option style="text-align:center ; " value="11">December</option>
               </select>
            <div id="dateRange1"></div>
            <button id="buttonDatePreviousWrap1">&lsaquo;</button>
            <button id="buttonDateNextWrap1">&rsaquo;</button>
        </div>

        <div class="selected-date-area1" id="selectedDateRange1">
        <div radio-group="">
      <form novalidate="" class="ng-untouched ng-pristine ng-valid">
        <div formarrayname="voyageAccommodations" class="ng-untouched ng-pristine ng-valid" >
          <div class="itinerary-table booking-table item-selected">
            <input type="radio" hidden="" value="[object Object]" />
            <div class="itinerary-row itinerary-head">
              <div class="itr-col booking-time-container">
                <div>
                  <div class="departure-time">6:00 AM</div>
                  <div class="travel-time">2 hours</div>
                </div>
              </div>
              <div class="itr-col itinerary-vessel">
                <div class="booking-media-left itinerary-shipping-logo">
                  <img
                    alt=""
                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-ocean-fast-ferries-inc.png"/><!---->
                </div>
                <div class="itinerary-name">
                  <div class="booking-type booking-td-title">
                    <div>Ocean Fast Ferries Inc.</div>
                    <div class="booking-td-meta book-text-muted">
                      Ocean Jet (FASTCRAFT)
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="itinerary-row">
              <div class="itinerary-col itinerary-select">
                <div class="form-select">
                  <select formcontrolname="selectedAccommodation" class="form-control accommodation border ng-untouched ng-pristine ng-valid">
                    <option value="0: Object">Business Class</option>
                    <option value="1: Object">Open Air</option>
                    <option value="2: Object">Tourist Class</option>
                  </select>
                </div>
              </div>
              <div
                class="itinerary-col itinerary-price" style="position: relative; overflow: hidden">
                <div class="booking-td-title text-wrap">
                  <div>
                    <div class="booking-td-title">
                      <!-- <span class="price-value" style="margin-right: 20px"> -->
                        ₱1,200.00
                      <!-- </span> -->
                    </div>
                    <div class="booking-type booking-td-title">
                      <div class="booking-td-meta" style="margin-right: 5px">
                        <!-- <span style="font-weight: 800; color: #ff8c00"> -->
                          Ticket Price 
                              <!-- </span> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="itinerary-col itinerary-select-btn">
                <button type="button" class="btn btn-success select-button">
                <!-- <span>Selected &nbsp;<span class="fa fa-check"></span></span> -->
                Select
                </button>
              </div>
            </div>
            <div class="itinerary-row"></div>
          </div>
        </div>
      </form>
    </div>
    
    </div>
    <div class="container-summarytrip">
        <h4 class="summary-text-roundtrip">Summary</h4>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item" style="margin-bottom: 25px; border-radius: 10px">
                <div class="depbackground-color" id="flush-headingOne">
                    <p class="accordion-header">
                        <div class="click">
                            <button class="btn-departure" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span style="color: #fff;">Depature</span><i style="padding-left: 125px;" class="fa fa-chevron-circle-down"></i>
                        </button>
                        </div>
                    </p>
                </div>
                <div class="container-form-summary bg-white">
                    <div class="contain-shippinglogo">
                        <div class="shipping-guide" style="margin-left:10px;">
                            <img src="./assets/images/vgshipping.png" alt="vgshipping" style="width:50px; border-radius: 50%;">
                        </div>
                        <div class="shipping-guide" style="margin-right: 50px;">
                            <span style="font-size: 12px;">Vg Shipping Lines</span>
                            <br>
                            <span style="font-size: 12px;">(VG-RORO)</span>
                        </div>
                    </div>
                    <div class="contain-depretlocation">
                        <div class="shipping-depret">
                            <i class="fa-solid fa-circle-dot" style="display: flex; margin-left: 18px; padding-top: 15px;"></i>
                            <div class="vertical-dotted-line"></div>
                            <i class="fa-solid fa-anchor" style="display: flex; margin-left: 18px;"></i>
                        </div>
                        <div class="shipping-depret" style="padding-top: 10px; margin-right: 30px;">
                            <span>Cebu City</span>
                            <div style="padding-bottom: 12px;">
                                <br>
                            </div>
                            <span>Tagbilaran City, Bohol</span>
                        </div>
                    </div>
                </div>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="container-form-collapse">
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90;">DEPARTURE DATE</span>
                            <br>
                            <span style="color: #657174;">December 20, 2022 10:00AM</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style=" font-size:14px; color: #988f90; ">ACCOMODATION</span>
                            <br>
                            <span style="color: #657174; ">Standard A</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">SEAT TYPE</span>
                            <br>
                            <span style="color: #657174; ">Bunk</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">AIRCON</span>
                            <br>
                            <span style="color: #657174; ">NO</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style=" font-size:14px; color: #988f90; ">PORT</span>
                            <br>
                            <span style="color: #657174; ">Port of Cebu Passenger Terminal 1 (Pier 1)</span>
                            <span style="color: #657174; "><i class="fa-solid fa-arrow-right" style="padding-left: 10px; padding-right: 10px;"></i>Port of Tagbilaran</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">PRICE</span>
                            <br>
                            <span style="color: #657174; ">₱ 370.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item" style="border-radius: 10px;">
                <div class="depbackground-color" id="flush-headingTwo">
                    <p class="accordion-header">
                        <div class="click">
                            <button class="btn-departure" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <span style="color: #fff;">Return</span><i style="padding-left: 145px;" class="fa fa-chevron-circle-down"></i>
                        </button>
                        </div>
                    </p>
                </div>
                <div class="container-form-summary bg-white">
                    <div class="contain-shippinglogo">
                        <div class="shipping-guide" style="margin-left:10px;">
                            <img src="./assets/images/vgshipping.png" alt="vgshipping" style="width:50px; border-radius: 50%;">
                        </div>
                        <div class="shipping-guide" style="margin-right: 50px;">
                            <span style="font-size: 12px;">Vg Shipping Lines</span>
                            <br>
                            <span style="font-size: 12px;">(VG-RORO)</span>
                        </div>
                    </div>
                    <div class="contain-depretlocation">
                        <div class="shipping-depret">
                            <i class="fa-solid fa-circle-dot" style="display: flex; margin-left: 18px; padding-top: 15px;"></i>
                            <div class="vertical-dotted-line"></div>
                            <i class="fa-solid fa-anchor" style="display: flex; margin-left: 18px;"></i>
                        </div>
                        <div class="shipping-depret" style="padding-top: 10px; margin-right: 30px;">
                            <span>Tagbilaran City, Bohol</span>
                            <div style="padding-bottom: 12px;">
                                <br>
                            </div>
                            <span>Cebu City</span>
                        </div>
                    </div>
                </div>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="container-form-collapse">
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90;">DEPARTURE DATE</span>
                            <br>
                            <span style="color: #657174;">December 23, 2022 10:00PM</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style=" font-size:14px; color: #988f90; ">ACCOMODATION</span>
                            <br>
                            <span style="color: #657174; ">Standard A</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">SEAT TYPE</span>
                            <br>
                            <span style="color: #657174; ">Bunk</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">AIRCON</span>
                            <br>
                            <span style="color: #657174; ">NO</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style=" font-size:14px; color: #988f90; ">PORT</span>
                            <br>
                            <span style="color: #657174; ">Port of Tagbilaran</span>
                            <span style="color: #657174;  ;"><i class="fa-solid fa-arrow-right" style="padding-left: 10px; padding-right: 10px;"></i>
                                Port of Cebu Passenger Terminal 1 (Pier 1)</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">PRICE</span>
                            <br>
                            <span style="color: #657174; ">₱ 370.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="bottom-header-searchtrip4">
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