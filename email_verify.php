<?php
include("modules/config.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM tbl_passenger_account WHERE token='$token' LIMIT 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE tbl_passenger_account SET verified=1 WHERE token='$token'";

        if (mysqli_query($con, $query)) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['verified'] = true;
            header('location: http://barkomatic.xyz/index.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}
?>