<?php
    require("../model/database.php");
    require("../model/admin_db.php");
    require("controllers/vehicle_db.php");
    require("controllers/make_db.php");
    require("controllers/type_db.php");
    require("controllers/class_db.php");

    //require_once('util/secure_conn.php'); 
    //require_once('util/valid_admin.php');

    // Start session management with a persistent cookie 
    $lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds 
    session_set_cookie_params($lifetime, '/'); 
    session_start();

    $busy = false;
    $_SESSION["action"] = "";
    $_SESSION["is_logged_in"] = false;

    if (isset($_POST["username"]) && isset($_POST["password"]))
    {
        $_SESSION["action"] = "login";
        $_SESSION["temp_username"] = $_POST["username"];
        $_SESSION["temp_password"] = $_POST["password"];
        include("controllers/admin.php");
    }

    if (!isset($_POST["username"]) && !isset($_POST["password"]) && $_SESSION["is_logged_in"] == false)
    {
        $_SESSION["action"] = "show_login";
        include("controllers/admin.php");
        $busy = true;
    }

    if (isset($_POST["logout"]))
    {
        $_SESSION["action"] = "logout";
        include("controllers/admin.php");
        $busy = true;
    }

    if (isset($_POST["add_vehicle"]))
    {
        include("view/add_vehicle_form.php");
    }

    if (isset($_POST["vehicle_added"]))
    {
        add_vehicle($_POST["vehicle_year"], $_POST["make_id"], $_POST["vehicle_model"], $_POST["type_id"], $_POST["class_id"], $_POST["vehicle_price"]);
        include("view/add_vehicle_form.php");
        $busy = true;
    }

    if (isset($_POST["delete_vehicle"]))
    {
        delete_vehicle($_POST["del"]);
    }

    if (isset($_POST["view_edit_makes"]))
    {
        include("view/make_list.php");
    }

    if (isset($_POST["add_make"]))
    {
        add_make($_POST["make_name"]);
        include("view/make_list.php");
        $busy = true;
    }

    if (isset($_POST["delete_make"]))
    {
        delete_make($_POST["del"]);
        include("view/make_list.php");
        $busy = true;
    }

    if (isset($_POST["view_edit_types"]))
    {
        include("view/type_list.php");
    }

    if (isset($_POST["add_type"]))
    {
        add_type($_POST["type_name"]);
        include("view/type_list.php");
        $busy = true;
    }

    if (isset($_POST["delete_type"]))
    {
        delete_type($_POST["del"]);
        include("view/type_list.php");
        $busy = true;
    }

    if (isset($_POST["view_edit_classes"]))
    {
        include("view/class_list.php");
    }

    if (isset($_POST["add_class"]))
    {
        add_class($_POST["class_name"]);
        include("view/class_list.php");
        $busy = true;
    }
    
    if (isset($_POST["delete_class"]))
    {
        delete_class($_POST["del"]);
        include("view/class_list.php");
        $busy = true;
    }

    if (!isset($_POST["add_vehicle"]) && !isset($_POST["view_edit_makes"]) && !isset($_POST["view_edit_types"]) && !isset($_POST["view_edit_classes"]) && !$busy)
    {
        include("view/vehicle_list.php");
    }
?>