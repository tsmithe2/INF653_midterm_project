<?php
    // Start session management with a persistent cookie 
    $lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds 
    session_set_cookie_params($lifetime, '/'); 
    session_start();

    require("model/database.php");
    if (isset($_POST["register"]))
    {
        echo "yoasjaidjoiwdj";
    }
    include("view/vehicle_list.php");
?>