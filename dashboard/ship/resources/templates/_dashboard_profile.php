<div class="grid">
        <!--<div class="card">-->
        <!--    <header class="card-header">-->
        <!--        <p class="card-header-title">-->
        <!--            <span class="icon"><i class="mdi mdi-account-circle"></i></span> Edit Profile-->
        <!--        </p>-->
        <!--    </header>-->
        <!--    <div class="card-content">-->
        <!--        <form id="image_form" method="post" enctype="multipart/form-data">-->
        <!--            <div class="field">-->
        <!--                <label class="label" for="image">Shipping Line Image</label>-->
        <!--                <div class="field-body">-->
        <!--                    <div class="field file">-->
        <!--                        <img id="output"/>-->
        <!--                        <input type="file" name="image" id="image" />-->
        <!--                        <input type="hidden" name="action" id="action" value="insert" />-->
        <!--                        <input type="hidden" name="image_id" id="image_id" />-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <hr>-->
        <!--            <div class="field">-->
        <!--                <label class="label">Shipping Line Name</label>-->
        <!--                <div class="field-body">-->
        <!--                    <div class="field">-->
        <!--                        <div class="control">-->
        <!--                            <input type="text" name="ship_name_profile" id="ship_name_profile" placeholder="<?php echo $_SESSION['ship_name'];?>" class="input" required>-->
        <!--                        </div>-->
        <!--                        <p class="help">Required. Your shipping line name</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="field">-->
        <!--                <label class="label">E-mail</label>-->
        <!--                <div class="field-body">-->
        <!--                    <div class="field">-->
        <!--                        <div class="control">-->
        <!--                            <input type="email" name="ship_email_profile" id="ship_email_profile" placeholder="<?php echo $_SESSION['email'];?>" class="input" required>-->
        <!--                        </div>-->
        <!--                        <p class="help">Required. Your e-mail</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <hr>-->
        <!--            <div class="field">-->
        <!--                <div class="control">-->
        <!--                    <input type="submit" name="insert" id="insert" value="Submit" class="button green">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </form>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account"></i></span> Profile
                </p>
            </header>
            <div class="card-content" id="profile_data">
                <img class="text-center" src="./resources/img/loading.gif" alt="Loading" style="text-align:center;width:48px;height:48px;">
            </div>
        </div>
    </div>
    <!--<div class="card">-->
    <!--    <header class="card-header">-->
    <!--        <p class="card-header-title">-->
    <!--            <span class="icon"><i class="mdi mdi-lock"></i></span> Change Password-->
    <!--        </p>-->
    <!--    </header>-->
    <!--    <div class="card-content">-->
    <!--        <form id="ship_change_pswd_form">-->
    <!--             <div class="field">-->
    <!--                <label class="label">Old Password</label>-->
    <!--                <div class="control">-->
    <!--                    <input type="hidden" name="action" id="action" value="old_ship_chgn_psswd_btn" />-->
    <!--                    <input type="password" name="ship_old_psswd" id="ship_old_psswd" class="input" required>-->
    <!--                </div>-->
    <!--                <p class="help">Required. Old password</p>-->
    <!--            </div>-->
    <!--            <div class="field">-->
    <!--                <label class="label">New password</label>-->
    <!--                <div class="control">-->
    <!--                    <input type="hidden" name="action" id="action" value="ship_chgn_psswd_btn" />-->
    <!--                    <input type="password" name="ship_nw_psswd" id="ship_nw_psswd" class="input" required>-->
    <!--                </div>-->
    <!--                <p class="help">Required. New password</p>-->
    <!--            </div>-->
    <!--            <div class="field">-->
    <!--                <label class="label">Confirm password</label>-->
    <!--                <div class="control">-->
    <!--                    <input type="password" name="ship_c_nw_psswd" id="ship_c_nw_psswd" class="input" required>-->
    <!--                </div>-->
    <!--                <p class="help">Required. New password one more time</p>-->
    <!--            </div>-->
    <!--            <hr>-->
    <!--            <div class="field">-->
    <!--                <div class="control">-->
    <!--                    <input type="submit" name="ship_chgn_psswd_btn" id="ship_chgn_psswd_btn" value="Submit" class="button green">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </form>-->
    <!--    </div>-->
    <!--</div>-->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="port_locationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <form id="image_form" method="post" enctype="multipart/form-data">
                    <div class="field">
                        <label class="label" for="image">Shipping Line Image</label>
                        <div class="field-body">
                            <div class="field file">
                                <img id="output"/>
                                <input type="file" name="image" id="image" />
                                <input type="hidden" name="action" id="action" value="insert" />
                                <input type="hidden" name="image_id" id="image_id" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--<div class="field">-->
                    <!--    <label class="label">Shipping Line Name</label>-->
                    <!--    <div class="field-body">-->
                    <!--        <div class="field">-->
                    <!--            <div class="control">-->
                    <!--                <input type="text" name="ship_name_profile" id="ship_name_profiles" class="input" disabled>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                     <div class="field">
                        <label class="label">Shipping Owner's Name</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" name="ship_name_profile" id="ship_name_profiles" class="input">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                     <div class="field">
                        <label class="label">Shipping Owner's Address</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" name=" ship_address_profiles" id="ship_address_profiles" class="input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="email" name="ship_email_profile" id="ship_email_profiles" class="input" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="field">
                        <div class="control">
                            <input type="submit" name="insert" id="insert" value="Submit" class="button green">
                        </div>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
    
    
    <!--======================FOR UPDATE PASSWORD=====================================-->
    
     <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="port_locationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form id="ship_change_pswd_form"  method="post" enctype="multipart/form-data">
            <div class="field">
                    <label class="label">Old Password</label>
                    <div class="control">
                        <input type="password" name="ship_old_psswd" id="ship_old_psswd" class="input" required>
                    </div>
                    <p class="help">Required. Old password</p>
                </div>
                <div class="field">
                    <label class="label">New password</label>
                    <div class="control">
                        <input type="password" name="ship_nw_psswd" id="ship_nw_psswd" class="input" required>
                    </div>
                    <p class="help">Required. New password</p>
                </div>
                <div class="field">
                    <label class="label">Confirm password</label>
                    <div class="control">
                        <input type="password" name="ship_c_nw_psswd" id="ship_c_nw_psswd" class="input" required>
                    </div>
                    <p class="help">Required. New password one more time</p>
                </div>
                <hr>
                <div class="field">
                    <div class="control">
                        <input type="submit" name="ship_chgn_psswd_btn" id="ship_chgn_psswd_btn" value="Submit" class="button green">
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
