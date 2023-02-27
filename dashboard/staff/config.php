<?php
   define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
    define("MAIN_CSS_PATH", realpath(dirname(__FILE__) . './css/default-assets/'));
    
    define("DB_HOST", "localhost");
   define("DB_ROOT", "u846678508_barkomatic");
   define("DB_PASS", "Deathpoyax9876");
   define("DB_NAME", "u846678508_barkomatic");
   
    $con = mysqli_connect(DB_HOST, DB_ROOT, DB_PASS, DB_NAME);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>