<?php 

define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
define("MAIN_CSS_PATH", realpath(dirname(__FILE__) . './css/default-assets/'));


   define("DB_HOST", "server143.web-hosting.com");
   define("DB_ROOT", "barkicek_barkomatic");
   define("DB_PASS", "barkomatic@barkomatic");
   define("DB_NAME", "barkicek_barkomatic");
   
    $con = mysqli_connect(DB_HOST, DB_ROOT, DB_PASS, DB_NAME);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>