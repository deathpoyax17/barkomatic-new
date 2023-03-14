<?php 
require "../resources/config.php";
if(isset($_POST["action"]) && $_POST["action"] == "fetch_ship_profile") {
    session_start();
    fetch_ship_profile($con);
}
if(isset($_POST["action"]) && $_POST["action"] == "insert") {
    session_start();
    ship_profile_upload($con);
}

if(isset($_POST["action"]) && $_POST["action"] == "ship_chgn_psswd_btn") {
    session_start();
    ship_change_password($con);
}
if(isset($_POST["action"]) && $_POST["action"] == 'ship_profile_edit_id_form') {
    profile_edit_id_form($con);
}

if(isset($_POST["action"]) && $_POST["action"] == "ship_ownr_signout") {
    session_start();
    sign_out();
}

function profile_edit_id_form($con) {
ob_start();
        $edit_id = $_POST['e_p_e'];
        $stmtss = "SELECT ship_name,email,o_shipping_name,o_sl_address FROM tbl_ship_detail WHERE id=?";
        $stmts = $con->prepare($stmtss);
        $stmts->bind_param('s', $edit_id);
        $stmts->execute();
        $results = $stmts->get_result();
        $row = $results->fetch_array();
         ob_end_clean();
        echo json_encode($row); 
        
}

//* ship profile fetch - data
function fetch_ship_profile($c) {
    $ship_line_id = $_SESSION['alt_owner_id'];
    $stmt = $c->prepare("SELECT * FROM ship_owners WHERE alt_owner_id=?");
    $stmt->bind_param("i", $ship_line_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
        $output = '
        <div class="image w-48 h-48 mx-auto">
            <img src="data:image/jpeg;base64,'.base64_encode($row["ship_logo"]).'" alt="Shipping Line Image" class="rounded-full">
        </div>
        <hr>
        <div class="field">
            <label class="label">Shipping Line Name</label>
            <div class="control">
                <input type="text" readonly value="'.$row["ship_name"].'" class="input is-static">
            </div>
        </div>
        <hr>
        <div class="field">
            <label class="label">E-mail</label>
            <div class="control">
                <input type="text" readonly value="'.$row["email"].'" class="input is-static">
            </div>
        </div>
        <hr>
        <div class="field">
            <label class="label">Account Name</label>
            <div class="control">
                <input type="text" readonly value="'.$row["name"].'" class="input is-static">
            </div>
        </div>
        <hr>
         <div class="field">
            <label class="label">Account Address</label>
            <div class="control">
                <input type="text" readonly value="'.$row["address"].'" class="input is-static">
            </div>
        </div>
        <br>
         <div class="field">
               <div class="control">
                      <button type="button" class="button green update_profile_btns" id="'.$row["alt_owner_id"].'" data-toggle="modal" data-target="#exampleModal">
                    <span >Update Profile</span>
                </button>
                  </div>
        </div>
             <div class="field">
               <div class="control">
                      <button type="button" class="button red edit_pass_btn" id="'.$row["alt_owner_id"].'" data-toggle="modal" data-target="#exampleModals">
                    <span >Change Password</span>
                </button>
                  </div>
        </div>
        
        ';
    echo $output;
    $stmt->close();
}

//* ship profile upload
function ship_profile_upload($c) {
    $file = file_get_contents($_FILES["image"]["tmp_name"]);
    $ship_name = $_POST['ship_name_profile'];
    $ship_email = $_POST['ship_email_profile'];
    $ship_address = $_POST['ship_address_profiles'];
    $id = $_SESSION['ship_id'];

    $stmt = $c->prepare("UPDATE tbl_ship_detail SET o_shipping_name=?,email=?,ship_logo=?,o_sl_address=? WHERE id=?");
    $stmt->bind_param("ssssi", $ship_name,$ship_email,$file,$ship_address,$id);
    $stmt->execute();
    echo "Updated Successfully";
 
}   

//* ship profile change password
function ship_change_password($c) {
    $oldpass = sha1($_POST['ship_old_psswd']);
    $pass = sha1($_POST['ship_nw_psswd']);
    $cpass = sha1($_POST['ship_c_nw_psswd']);
    
    $ship_line_id = $_SESSION['ship_id'];
    $stmt = $c->prepare("SELECT * FROM tbl_ship_account WHERE id=?");
    $stmt->bind_param("i", $ship_line_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($row['password'] == $oldpass){
        if($pass != $cpass) {
            echo "Password did not match!";
        } else {
            $id = $_SESSION['ship_id'];
            $stmt = $c->prepare("UPDATE tbl_ship_account SET password=? WHERE id=?");
            $stmt->bind_param("si", $pass,$id);
            $stmt->execute();
            sign_out();
            }
    }
    else{
        echo "Old Password does not match";
    }
    
}


//* signout users
function sign_out() {
    session_destroy();
    echo "Shipping Owner Signout Successfully!";
}