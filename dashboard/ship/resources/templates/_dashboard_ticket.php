<div id="alert" class="alert alert-success lead ml-5 p-2" role="alert">
    <span id="res-icon"></span>
    <span id="res-message"></span>
</div>
<div class="row">
    <div class="col-4">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title mb-0">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span> Add Ticket
                </p>
            </header>
            <div class="card-content">
                <form id="add_ticket_form">
                    <div class="field">
                        <label class="label"></label>
                        <div class="field-body d-none">
                            <div class="field">
                                <div class="control">
                                    <input type="text" name="ship_comp" value="<?php echo $_SESSION['ship_name'];?>" class="input" readonly>
                                </div>
                                <p class="help"></p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Quantity</label>
                        <input list="ticket_quantity" name="ticket_quantity" class="form-control">
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <datalist name="ticket_quantity" id="ticket_quantity">
                                        <option selected value="">--</option>
                                        <!-- <option value="1"></option>
                                        <option value="2"></option>
                                        <option value="3"></option>
                                        <option value="4"></option>
                                        <option value="5"></option>
                                        <option value="6"></option>
                                        <option value="7"></option>
                                        <option value="8"></option>
                                        <option value="9"></option>
                                        <option value="10"></option> -->
                                        <?php
                                            for ($x = 1; $x <= 100; $x++) { ?>
                                            <option value="<?php echo $x; ?>"></option>
                                          <?php } ?>
                                        
                                    </datalist>
                                </div>
                                <p class="help">Required. Quantity</p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Status</label>
                        <div class="field-body">
                            <div class="field">
                            <div class="control">
                                    <select name="ticket_status" id="ticket_status" class="form-control">
                                        <option value="Open For Avail">Open For Avail</option>
                                        <option value="Open For Reservation">Open For Reservation</option>
                                    </select>
                                </div>
                                <p class="help">Required. Status</p>
                            </div>
                        </div>
                    </div>
                 
                    <!--<div class="field">-->
                    <!--    <label class="label">Promo</label>-->
                    <!--    <input type="checkbox" id="chkbox_promo" /><p class="help">Please check box if promo is available</p>-->
                    <!--    <div class="field-body">-->
                    <!--        <div class="field">-->
                    <!--            <div class="control">-->
                    <!--                <input type="text" autocomplete="on" name="ticket_promo" id="ticket_promo" value="" class="input" required  disabled>-->
                    <!--            </div>-->
                    <!--            <p class="help">Required. Promo</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

        

                    <!--<div class="field">-->
                    <!--    <label class="label">Discount</label>-->
                    <!--    <input type="checkbox" id="chkbox_discount" /> <p class="help">Please check box if discount is available</p>-->
                    <!--    <div class="field-body">-->
                    <!--        <div class="field">-->
                    <!--            <div class="control">-->
                    <!--                <input type="text" autocomplete="on" name="ticket_discount" id="ticket_discount" class="input" required disabled>-->
                    <!--            </div>-->
                    <!--            <p class="help">Required. Discount</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <hr>
                    <div class="field">
                        <div class="control">
                            <input type="submit" name="add_ticket" id="add_ticket" value="Generate" class="button green">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title mb-0">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span> Details
                </p>
            </header>
            <div id="ticket_data" class="card-content">
                <img class="text-center" src="./resources/img/loading.gif" alt="Loading" style="text-align:center;width:48px;height:48px;">
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="port_locationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_accom_form">
            <div class="form-group">
                <label for="edit_accom_name">Quantity</label>
                <input type="text" class="form-control form-control-sm" name="edit_accom_name" id="edit_accom_name" required>
            </div>
            <div class="form-group">
                <label for="edit_accom_st">Seat Type</label>
                <input type="text" class="form-control form-control-sm" name="edit_accom_st" id="edit_accom_st" required>
            </div>
            <div class="form-group">
                <label for="edit_accom_aircon">Aircon</label>
                <select name="edit_accom_aircon" id="edit_accom_aircon" class="form-control-sm form-control">
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit_accom_price">Price</label>
                <input type="text" class="form-control form-control-sm" name="edit_accom_price" id="edit_accom_price" required>
            </div>
            <button type="submit" id="edit_accom_btn" class="btn btn-primary btn-sm form-control">Update</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

<script>
var checkbox_promo = document.getElementById("chkbox_promo");
function validator() {
  if (checkbox_promo.checked == false) {
    document.getElementById('ticket_promo').disabled = true;
  } else {
    document.getElementById('ticket_promo').disabled = false;
  }
}
checkbox_promo.addEventListener('click', validator)

var checkbox_discount = document.getElementById("chkbox_discount");
function validator2() {
  if (checkbox_discount.checked == false) {
    document.getElementById('ticket_discount').disabled = true;
  } else {
    document.getElementById('ticket_discount').disabled = false;
  }
}
checkbox_discount.addEventListener('click', validator2)
</script>