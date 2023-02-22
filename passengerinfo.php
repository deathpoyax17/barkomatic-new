
<?php
if(!isset($_SESSION['passenger_id'])){?>
<div class="container">
    <div class="two" style="display:none;">
    <ol class="cd-multi-steps text-top">
                <li class=""><a href="#0">SCHEDULE</a></li>
                <li class="current"><a href="#0">PASSENGER INFO</a></li>
                <li class=""><em>PAYMENT</em></li>
                <li><em>COMPLETE</em></li>
            </ol>
        <div class="container-contactinfo pt-2 pb-2" style="margin-top: 0px;">
            <i class="fa fa-info-circle" style="color: #fff; font-size: 22px;"></i>
            <span class="word-information">Contact Information</span>
        </div>
        <div class="container-field mb-4 pt-2 pb-2 border border-success">
            <i class="fa fa-info-circle text-muted font-weight-bold" style="font-size: 20px; font-weight:bold;margin-left: 0px;margin-right: 20px;">
            </i><span class="field-paragraph">Fields with red asterisk (<a class="text-danger fs-6 ">*</a>) are required </span>
        </div>
        <div class="container-form bg-white pt-4 pb-sm-4 mb-4">
            <form id="passengerinfoSubmit">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <span class="labelnameborder">
                            <label for="validationDefault01"> <a class="text-danger fs-6 ">*</a></label>
                        </span>
                        <input type="text" class="form-control" id="validationDefault01" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <span class="labelnameborder2">
                            <label for="validationDefault02"><a class="text-danger fs-6 ">*</a></label>
                        </span>
                        <div class="input-group">
                            <input type="tel" id="phone" class="form-control" value="+63" maxlength="13" size="55">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <span class="labelnameborder">
                            <label for="validationDefault01"> <a class="text-danger fs-6 ">*</a></label>
                        </span>
                        <input type="text" class="form-control" id="validationDefault01" placeholder="name@email.com" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <span class="labelnameborder2">
                            <label for="validationDefault02"><a class="text-danger fs-6 ">*</a></label>
                        </span>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="name@email.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <span class="labelnameborder3">
                            <label for="validationDefault03"><a class="text-danger fs-6 ">*</a></label>
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
        </div>
        <div class="container-passengerdetails ">
            <span class="word-passenger">Passenger Details</span>
        </div>
        <div class="container-field mb-4 pt-2 pb-2 border border-success">
            </i><span class="field-paragraph2"> * Senior/PWD/Student discounts are not available online. </span>
        </div>

        <?php for($i=0; $i<$data['paxCount']; $i++){ ?>
  <div class="container-form bg-white pt-4 pb-sm-4 mb-4">
  <h4>Passenger <?php echo ($i+1); ?></h4>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputFirstName<?php echo $i; ?>">First Name <a class="text-danger fs-6">*</a></label>
        <input type="text" class="form-control" id="inputFirstName<?php echo $i; ?>" placeholder="First Name">
      </div>
      <div class="form-group col-sm-1">
        <label for="inputMiddleName<?php echo $i; ?>">MI <a class="text-danger fs-6"></a></label>
        <input type="text" class="form-control" id="inputMiddleName<?php echo $i; ?>" placeholder="M.I.">
      </div>
      <div class="form-group col-md-4">
        <label for="inputLastName<?php echo $i; ?>">Last Name<a class="text-danger fs-6">*</a></label>
        <input type="text" class="form-control" id="inputLastName<?php echo $i; ?>" placeholder="Last Name">
      </div>
      <div class="form-group col-md-3">
        <label for="inputGender<?php echo $i; ?>">Gender <a class="text-danger fs-6">*</a></label>
        <select id="inputGender<?php echo $i; ?>" class="form-control">
          <option selected>Select</option>
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group  col-md-3">
        <label for="inputDateofBirth<?php echo $i; ?>">Date of Birth <a class="text-danger fs-6">*</a></label>
        <input type="date" class="form-control" id="inputDateofBirth<?php echo $i; ?>" placeholder="First Name">
      </div>
      <div class="form-group col-md-2">
        <label for="inputType<?php echo $i; ?>">Type <a class="text-danger fs-6">*</a></label>
        <select id="inputType<?php echo $i; ?>" class="form-control">
          <option selected>Adult</option>
          <option>Minor</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputNationality<?php echo $i; ?>">Nationality <a class="text-danger fs-6">*</a></label>
        <select id="inputNationality<?php echo $i; ?>" class="form-control">
          <option selected disabled>Select a nationality</option>
          <option>Filipino</option>
          <option>American</option>
          <option>Korean</option>
        </select>
      </div>
      <div class="form-group  col-md-5">
        <label for="inputEmail<?php echo $i; ?>">Email <a class="text-danger fs-6">*</a></label>
        <input type="text" class="form-control" id="inputEmail<?php echo $i; ?>" placeholder="Name@Email.com" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="inputDepartureDiscount">Apply Departure Discount? 
            <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputDepartureDiscount" class="form-control">
                        <option selected>Regular</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputReturnDiscount<?php echo $i; ?>">Apply Return Discount? <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputReturnDiscount<?php echo $i; ?>" class="form-control">
                        <option selected>Regular</option>
                    </select>
                </div>
            </div>
        </div>
        <?php }?>
        <div class="container-form-button pt-4 pb-sm-4 mb-4">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <button type="button" class="cancelBtn btn btn-light btn-lg pt-3 pb-sm-3">Back</button>
                </div>
                <div class="form-group col-md-4 ">
                </div>
                <div class="form-group col-md-4" style="padding-left:10%">
                    <button type="button" class="btn btn-primary btn-lg pt-3 pb-sm-3">Continue</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<?php }else{?>
    <div class="container">
    <div class="two" style="display:none;">
    <ol class="cd-multi-steps text-top">
                <li class=""><a href="#0">SCHEDULE</a></li>
                <li class="current"><a href="#0">PASSENGER INFO</a></li>
                <li class=""><em>PAYMENT</em></li>
                <li><em>COMPLETE</em></li>
            </ol>
        <div class="container-contactinfo pt-2 pb-2" style="margin-top: 0px;">
            <i class="fa fa-info-circle" style="color: #fff; font-size: 22px;"></i>
            <span class="word-information">Contact Information</span>
        </div>
        <div class="container-field mb-4 pt-2 pb-2 border border-success">
            <i class="fa fa-info-circle text-muted font-weight-bold" style="font-size: 20px; font-weight:bold;margin-left: 0px;margin-right: 20px;">
            </i><span class="field-paragraph">Fields with red asterisk (<a class="text-danger fs-6 ">*</a>) are required </span>
        </div>
       
        <div class="container-passengerdetails ">
            <span class="word-passenger">Passenger Details</span>
        </div>
        <div class="container-field mb-4 pt-2 pb-2 border border-success">
            </i><span class="field-paragraph2"> * Senior/PWD/Student discounts are not available online. </span>
        </div>

        <?php for($i=0; $i<$data['paxCount']; $i++){ ?>
  <div class="container-form bg-white pt-4 pb-sm-4 mb-4">
  <h4>Passenger <?php echo ($i+1); ?></h4>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputFirstName<?php echo $i; ?>">First Name <a class="text-danger fs-6">*</a></label>
        <input type="text" class="form-control" id="inputFirstName<?php echo $i; ?>" placeholder="First Name">
      </div>
      <div class="form-group col-sm-1">
        <label for="inputMiddleName<?php echo $i; ?>">MI <a class="text-danger fs-6"></a></label>
        <input type="text" class="form-control" id="inputMiddleName<?php echo $i; ?>" placeholder="M.I.">
      </div>
      <div class="form-group col-md-4">
        <label for="inputLastName<?php echo $i; ?>">Last Name<a class="text-danger fs-6">*</a></label>
        <input type="text" class="form-control" id="inputLastName<?php echo $i; ?>" placeholder="Last Name">
      </div>
      <div class="form-group col-md-3">
        <label for="inputGender<?php echo $i; ?>">Gender <a class="text-danger fs-6">*</a></label>
        <select id="inputGender<?php echo $i; ?>" class="form-control">
          <option selected>Select</option>
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group  col-md-3">
        <label for="inputDateofBirth<?php echo $i; ?>">Date of Birth <a class="text-danger fs-6">*</a></label>
        <input type="date" class="form-control" id="inputDateofBirth<?php echo $i; ?>" placeholder="First Name">
      </div>
      <div class="form-group col-md-2">
        <label for="inputType<?php echo $i; ?>">Type <a class="text-danger fs-6">*</a></label>
        <select id="inputType<?php echo $i; ?>" class="form-control">
          <option selected>Adult</option>
          <option>Minor</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputNationality<?php echo $i; ?>">Nationality <a class="text-danger fs-6">*</a></label>
        <select id="inputNationality<?php echo $i; ?>" class="form-control">
          <option selected disabled>Select a nationality</option>
          <option>Filipino</option>
          <option>American</option>
          <option>Korean</option>
        </select>
      </div>
      <div class="form-group  col-md-5">
        <label for="inputEmail<?php echo $i; ?>">Email <a class="text-danger fs-6">*</a></label>
        <input type="text" class="form-control" id="inputEmail<?php echo $i; ?>" placeholder="Name@Email.com" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="inputDepartureDiscount">Apply Departure Discount? 
            <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputDepartureDiscount" class="form-control">
                        <option selected>Regular</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputReturnDiscount<?php echo $i; ?>">Apply Return Discount? <a class="text-danger fs-6 ">*</a></label>
                    <select id="inputReturnDiscount<?php echo $i; ?>" class="form-control">
                        <option selected>Regular</option>
                    </select>
                </div>
            </div>
        </div>
        <?php }?>
        <div class="container-form-button pt-4 pb-sm-4 mb-4">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <button type="button" class="cancelBtn btn btn-light btn-lg pt-3 pb-sm-3">Back</button>
                </div>
                <div class="form-group col-md-4 ">
                </div>
                <div class="form-group col-md-4" style="padding-left:10%">
                    <button type="button" class="btn btn-primary btn-lg pt-3 pb-sm-3">Continue</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<?php }?>