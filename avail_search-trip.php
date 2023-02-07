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

        <input type="radio" data-type="tab-radio" id="tabpassenger" name="searchtrip-tab" checked="checked">
        <label class="passenger" id="passengertab" for="tabpassenger"><i class="fa-solid fa-user"></i> Passenger</label>
        <div class="tabsearchtrip">
            <div id="passengertab">

                <div class="search-form-box">
                    <form novalidate="" class="ng-untouched ng-pristine ng-invalid">
                        <div class="row">
                            <div class="col">
                                <div class="check-box-mv mg-t-10">
                                    <input type="checkbox" id="check-email" /><label for="check-email"
                                        class="text-normal">Has Preferred Shipping Lines</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="shipping-lines-company mt-2">
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company0"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company0">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_2go.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company1"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company1">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_starlite.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company2"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company2">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_clemer.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company3"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company3">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list-aznar.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company4"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company4">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_evaristo.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company5"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company5">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_fastcat.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company6"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company6">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list-ffcruz.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company7"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company7">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_islandwater.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company8"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company8">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_jomalia.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company9"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company9">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_lapulapu.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company10"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company10">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_lite-ferries.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company11"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company11">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_medallion.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company12"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company12">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_oceanjet.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company13"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company13">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_amt.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company14"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company14">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-supercat-chelsea.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company15"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company15">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_transasia.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company16"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company16">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_grandferries.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company17"
                                            class="ng-untouched ng-pristine ng-invalid" /><label
                                            class="company radio-label" for="company17">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_weesam.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="row">
                            <div class="col">
                                <div class="md-radio">
                                    <input id="1" type="radio" name="tripDirection" formcontrolname="tripDirection"
                                        checked="" class="ng-untouched ng-pristine ng-valid" /><label for="1">Round
                                        Trip</label><input id="2" type="radio" name="tripDirection"
                                        formcontrolname="tripDirection"
                                        class="ng-untouched ng-pristine ng-valid" /><label for="2">One Way</label>
                                </div>
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
                                    <!----><select formcontrolname="origin" required=""
                                        class="custom-select ng-untouched ng-pristine ng-valid">
                                        <option value="0: Object">Bacolod</option>
                                        <option value="1: Object">Batangas</option>
                                        <option value="2: Object">Bato, Leyte</option>
                                        <option value="3: Object">Baybay, Leyte</option>
                                        <option value="4: Object">Bogo, Cebu</option>
                                        <option value="5: Object">Butuan</option>
                                        <option value="6: Object">Cagayan de Oro</option>
                                        <option value="7: Object">Calapan</option>
                                        <option value="8: Object">Calbayog City</option>
                                        <option value="9: Object">Cataingan, Masbate</option>
                                        <option value="10: Object">Caticlan</option>
                                        <option value="11: Object">Cebu</option>
                                        <option value="12: Object">Consuelo, Camotes</option>
                                        <option value="13: Object">Danao</option>
                                        <option value="14: Object">Dapa, Siargao</option>
                                        <option value="15: Object">Dapitan</option>
                                        <option value="16: Object">Dipolog</option>
                                        <option value="17: Object">Dumaguete</option>
                                        <option value="18: Object">EB Magalona, Negros Occ</option>
                                        <option value="19: Object">Estancia</option>
                                        <option value="20: Object">Getafe</option>
                                        <option value="21: Object">Guimaras</option>
                                        <option value="22: Object">Hagnaya</option>
                                        <option value="23: Object">Hilongos</option>
                                        <option value="24: Object">Iligan</option>
                                        <option value="25: Object">Iloilo</option>
                                        <option value="26: Object">Isabel, Leyte</option>
                                        <option value="27: Object">Jagna, Bohol</option>
                                        <option value="28: Object">Larena, Siquijor</option>
                                        <option value="29: Object">Manila</option>
                                        <option value="30: Object">Masbate</option>
                                        <option value="31: Object">Matnog</option>
                                        <option value="32: Object">Medellin, Cebu</option>
                                        <option value="33: Object">Nasipit</option>
                                        <option value="34: Object">Odiongan, Romblon</option>
                                        <option value="35: Object">Ormoc</option>
                                        <option value="36: Object">Ozamiz</option>
                                        <option value="37: Object">Palompon</option>
                                        <option value="38: Object">Plaridel</option>
                                        <option value="39: Object">Puerto Galera</option>
                                        <option value="40: Object">Puerto Princesa, Palawan</option>
                                        <option value="41: Object">Romblon, Romblon</option>
                                        <option value="42: Object">Roxas City, Capiz</option>
                                        <option value="43: Object">Roxas, Mindoro</option>
                                        <option value="44: Object">San Carlos, Negros</option>
                                        <option value="45: Object">Santa Fe, Bantayan Island</option>
                                        <option value="46: Object">Sibuyan, Romblon</option>
                                        <option value="47: Object">Siquijor</option>
                                        <option value="48: Object">Surigao</option>
                                        <option value="49: Object">Tagbilaran City, Bohol</option>
                                        <option value="50: Object">Talibon</option>
                                        <option value="51: Object">Toledo</option>
                                        <option value="52: Object">Tubigon</option>
                                        <option value="53: Object">Ubay, Bohol</option>
                                        <option value="54: Object">Zamboanga</option>
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
                                    <!----><select formcontrolname="destination"
                                        class="custom-select ng-untouched ng-pristine ng-valid">
                                        <option value="0: Object">Bato, Leyte</option>
                                        <option value="1: Object">Baybay, Leyte</option>
                                        <option value="2: Object">Butuan</option>
                                        <option value="3: Object">Cagayan de Oro</option>
                                        <option value="4: Object">Calbayog City</option>
                                        <option value="5: Object">Cataingan, Masbate</option>
                                        <option value="6: Object">Dipolog</option>
                                        <option value="7: Object">Getafe</option>
                                        <option value="8: Object">Hilongos</option>
                                        <option value="9: Object">Iligan</option>
                                        <option value="10: Object">Iloilo</option>
                                        <option value="11: Object">Larena, Siquijor</option>
                                        <option value="12: Object">Manila</option>
                                        <option value="13: Object">Masbate</option>
                                        <option value="14: Object">Nasipit</option>
                                        <option value="15: Object">Ormoc</option>
                                        <option value="16: Object">Ozamiz</option>
                                        <option value="17: Object">Palompon</option>
                                        <option value="18: Object">Plaridel</option>
                                        <option value="19: Object">Surigao</option>
                                        <option value="20: Object">Tagbilaran City, Bohol</option>
                                        <option value="21: Object">Talibon</option>
                                        <option value="22: Object">Tubigon</option>
                                        <option value="23: Object">Ubay, Bohol</option>
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
                                            <input id="from2" type="text" formcontrolname="departureDate" bsdatepicker="" placement="top" class="form-control ng-untouched ng-pristine ng-valid" />
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
                                            <input id="to2" type="text" bsdatepicker="" formcontrolname="returnDate"
                                                placement="top"
                                                class="form-control ng-untouched ng-pristine ng-valid" />
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
                                            <input type="number" min="1" formcontrolname="paxCount"
                                                class="form-control ng-untouched ng-pristine ng-valid" max="10" />
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" class="btn btn-primary btn-block">
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
                    </form>
                </div>
            </div>
        </div>
        <input type="radio" id="tabvehicle" data-type="tab-radio" name="searchtrip-tab">
        <label class="vehicle" id="vehicletab" for="tabvehicle"><i class="fa-solid fa-car"></i> Vehicle</label>
        <div class="tabsearchtrip2">
            <div id="vehicletab">
                <div class="search-form-box">
                    <form novalidate="" class="ng-pristine ng-valid ng-touched">
                        <div class="row">
                            <div class="col">
                                <div class="check-box-mv mg-t-10">
                                    <input type="checkbox" id="check-email" /><label for="check-email"
                                        class="text-normal">Has Preferred Shipping Lines</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="shipping-lines-company mt-2">
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company0"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company0">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_starlite.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company1"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company1">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list-aznar.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company2"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company2">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_fastcat.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company3"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company3">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list-ffcruz.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company4"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company4">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_jomalia.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company5"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company5">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_lite-ferries.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company6"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company6">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_medallion.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="ship-radio">
                                        <input type="radio" name="shippingLine" formcontrolname="shippingLine"
                                            style="display: none" id="company7"
                                            class="ng-untouched ng-pristine ng-valid" /><label
                                            class="company radio-label" for="company7">
                                            <div class="company-img">
                                                <img width="150" alt="" class="company-logo"
                                                    src="https://storage.googleapis.com/barkota-reseller-assets/companies/list_transasia.png" />
                                            </div>
                                        </label>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="row">
                            <div class="col">
                                <div class="md-radio">
                                    <input id="1" type="radio" name="tripDirection" formcontrolname="tripDirection"
                                        checked="" class="ng-untouched ng-pristine ng-valid" /><label for="1">Round
                                        Trip</label><input id="2" type="radio" name="tripDirection"
                                        formcontrolname="tripDirection"
                                        class="ng-untouched ng-pristine ng-valid" /><label for="2">One Way</label>
                                </div>
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
                                    <!----><select formcontrolname="origin" required=""
                                        class="custom-select ng-untouched ng-pristine ng-valid">
                                        <option value="0: Object">Bacolod</option>
                                        <option value="1: Object">Bogo, Cebu</option>
                                        <option value="2: Object">Cebu</option>
                                        <option value="3: Object">Danao</option>
                                        <option value="4: Object">EB Magalona, Negros Occ</option>
                                        <option value="5: Object">Guimaras</option>
                                        <option value="6: Object">Iloilo</option>
                                        <option value="7: Object">Isabel, Leyte</option>
                                        <option value="8: Object">Medellin, Cebu</option>
                                        <option value="9: Object">Palompon</option>
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
                                    <!----><select formcontrolname="destination"
                                        class="custom-select ng-untouched ng-pristine ng-valid">
                                        <option value="0: Object">Cagayan de Oro</option>
                                        <option value="1: Object">Iligan</option>
                                        <option value="2: Object">Iloilo</option>
                                        <option value="3: Object">Masbate</option>
                                        <option value="4: Object">Ozamiz</option>
                                        <!---->
                                    </select>
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-label-w">Depart</span>
                                            </div>
                                            <input type="text" formcontrolname="departureDate" bsdatepicker=""
                                                placement="top" class="form-control ng-pristine ng-valid ng-touched" />
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
                                                <span class="input-group-text input-label-w">Return</span>
                                            </div>
                                            <input type="text" bsdatepicker="" formcontrolname="returnDate"
                                                placement="top"
                                                class="form-control ng-untouched ng-pristine ng-valid" />
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
                            <!---->
                        </div>
                        <div class="cargo-con pl-3 pr-3 pt-2 pb-2">
                            <div class="row">
                                <div class="col-md-4 tab-size">
                                    <div class="radio-flex">
                                        <div>
                                            <div class="md-radio">
                                                <input type="radio" formcontrolname="cargoType" tabindex="6"
                                                    class="ng-untouched ng-pristine ng-valid" /><label
                                                    for="Category">Category</label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" formcontrolname="cargoType" tabindex="6"
                                                    class="ng-untouched ng-pristine ng-valid" /><label
                                                    for="Brand">Brand</label>
                                            </div>
                                            <!---->
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!---->
                                <!---->
                                <!---->
                            </div>
                            <div class="row">
                                <div class="col-md tab-size">
                                    <div class="input-group mt-2 mb-2">
                                        <div class="input-group-prepend">
                                            <label for="inputCategory" class="input-group-text input-label-w"
                                                style="width: auto">Category</label>
                                        </div>
                                        <!----><select id="inputCategory" formcontrolname="cargoItem" required=""
                                            tabindex="9" class="custom-select ng-untouched ng-pristine ng-valid">
                                            <option value="0: Object">10-WHEELER / EMPTY</option>
                                            <option value="1: Object">6-WHELEER / EMPTY</option>
                                            <option value="2: Object">8-WHEELER / EMPTY</option>
                                            <option value="3: Object">AUV</option>
                                            <option value="4: Object">HATCHBACK</option>
                                            <option value="5: Object">MOTORCYCLE (100cc to 200cc)</option>
                                            <option value="6: Object">MOTORCYCLE (250cc &amp; above)</option>
                                            <option value="7: Object">MOTORCYCLE (below 250cc)</option>
                                            <option value="8: Object">MULTICAB</option>
                                            <option value="9: Object">OWNER / LIGHT CARS</option>
                                            <option value="10: Object">OWNER JEEP</option>
                                            <option value="11: Object">PICK-UP</option>
                                            <option value="12: Object">SEDAN</option>
                                            <option value="13: Object">SUV</option>
                                            <option value="14: Object">TRICYCLE</option>
                                            <option value="15: Object">VAN</option>
                                            <!---->
                                        </select>
                                        <!---->
                                        <!---->
                                    </div>
                                    <!---->
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md tab-size">
                                    <div class="check-box-mv mg-t-10">
                                        <input type="checkbox" id="cargo-driver" formcontrolname="hasCargoDriver"
                                            class="ng-untouched ng-pristine ng-valid" /><label for="cargo-driver"
                                            class="text-normal">With Driver</label>
                                    </div>
                                </div>
                                <div class="col-md tab-size">
                                    <div class="row justify-content-end d-flex">
                                        <div class="col-md tab-size">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-label-w"
                                                        style="width: auto"><small>No. of passengers</small></span>
                                                </div>
                                                <input type="number" min="1" formcontrolname="paxCount"
                                                    class="form-control ng-untouched ng-pristine ng-valid" max="10" />
                                                <!---->
                                            </div>
                                            <div class="input-label-info">
                                                <small>(Including Driver)</small>
                                            </div>
                                            <!---->
                                        </div>
                                        <div class="col-md-5 tab-size text-right">
                                            <button type="button" class="btn btn-primary btn-block">
                                                <span class="mr-2"><span
                                                        class="svg-icon svg-icon-white svg-icon-2x"><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20px"
                                                            height="20px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3">
                                                                </path>
                                                                <path
                                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                    fill="#000000" fill-rule="nonzero"></path>
                                                            </g>
                                                        </svg></span></span><span>Cargo Trips</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <!---->
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



<script src="js/jquery.validate.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main/active.js"></script>
<script src="js/main/schedule/process.js"></script>
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
            $(".answer").hide();
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
    $('input[type=radio]').click(function(e) {
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
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

</html>