<div id="alert" class="alert alert-success lead ml-5 p-2" role="alert">
    <span id="res-icon"></span>
    <span id="res-message"></span>
</div>
<div class="row">
    <div class="col-4">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title mb-0">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span> Add
                </p>
            </header>
            
            <div class="card-content">
                <form id="add_ticket_form">
                    <div class="field">
                        <label class="label">Vessel Name</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="hidden" name="ship_comp" value="<?php echo $_SESSION['stff_ship_reside'];?>">
                                    <input type="text" autocomplete="on" name="vessel_name" id="vessel_name" class="input" required>
                                </div>
                                <p class="help">Required. Vessel Name</p>
                            </div>
                        </div>
                    </div>
                    
                   <div class="field">
                        <label class="label">Seat Capacity</label>
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
                                <p class="help">Required. Seat Capacity</p>
                            </div>
                        </div>
                    </div>
                    
                       <div class="field">
                        <label class="label">Ticket Price</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="hidden" name="ticket_status" value="Open For Avail">
                                    <input type="number" autocomplete="on" name="ticket_price" id="ticket_price" class="input" required>
                                </div>
                                <p class="help">Required. Price</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="field">
                        <div class="control">
                            <input type="submit" name="vessel_typ_btn" id="vessel_typ_btn" value="Submit" class="button green">
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

<div class="modal fade" id="exampleModal23" tabindex="-1" role="dialog" aria-labelledby="port_locationLabel" aria-hidden="true">
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
                <label for="edit_accom_name">Vessel Name</label>
                <input type="text" class="form-control form-control-sm" name="edit_vessel_name" id="edit_vessel_name" required>
            </div>
            <div class="form-group">
                <label for="edit_accom_st">Seat Capacity</label>
                <input type="number" class="form-control form-control-sm" name="edit_vessel_capacity" id="edit_vessel_capacity" required>
            </div>
             <div class="form-group">
                <label for="edit_accom_st">Price</label>
                <input type="number" class="form-control form-control-sm" name="edit_vessel_price" id="edit_vessel_price" required>
            </div>
            <button type="submit" id="edit_accom_btn" class="btn btn-primary btn-sm form-control">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>