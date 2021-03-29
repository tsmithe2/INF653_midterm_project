<?php
    // Start session management with a persistent cookie 
    $lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds 
    session_set_cookie_params($lifetime, '/'); 
    session_start();

    require("model/database.php");
    $busy = false;

    if (isset($_POST["reg"]))
    {
        include("view/register.php");
        $busy = true;
    }

    if (isset($_POST["is_reg"]))
    {
        echo "yo";
        include("view/is_registered.php");
        $busy = true;
    }

    if (isset($_POST["logout"]))
    {
        include("view/logout.php");
        $busy = true;
    }

    if (!isset($_POST["register"]) && !isset($_POST["registered"]) && !isset($_POST["logout"]) && $busy == false)
    {
        include("view/vehicle_list.php");
    }
?>