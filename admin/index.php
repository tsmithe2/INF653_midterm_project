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

    function clear_errors()
    {
        $_SESSION["success"] = false;
        $_SESSION["username_exists"] = false;
        $_SESSION["username_error"] = false;
        $_SESSION["password_error"] = false;
        $_SESSION["match_error"] = false;
    }

    if (isset($_POST["view_v_list"]))
    {
        $_SESSION["bad_register"] = false;
        clear_errors();
    }

    if (isset($_POST["username"]) && isset($_POST["password"]))
    {
        $_SESSION["action"] = "login";
        $_SESSION["temp_username"] = $_POST["username"];
        $_SESSION["temp_password"] = $_POST["password"];
        include("controllers/admin.php");
    }

    if (!isset($_SESSION["is_logged_in"]) || $_SESSION["is_logged_in"] == false)
    {
        $_SESSION["action"] = "show_login";
        include("controllers/admin.php");
    }

    if (isset($_POST["logout"]))
    {
        $_SESSION["bad_register"] = false;
        clear_errors();
        $_SESSION["action"] = "logout";
        include("controllers/admin.php");
        session_start();
        $_SESSION["is_logged_in"] = false;
        $_SESSION["bad_log"] = false;
        $_SESSION["action"] = "show_login";
        include("controllers/admin.php");
    }

    if (isset($_POST["register"]))
    {
        $_SESSION["action"] = "show_register";
        include("controllers/admin.php");
        $busy = true;
    }

    if (isset($_POST["register_new_admin"]))
    {
        $_SESSION["action"] = "register";
        $_SESSION["temp_new_user"] = $_POST["new_username"];
        $_SESSION["temp_new_password"] = $_POST["new_password"];
        $_SESSION["confirm_password"] = $_POST["confirm_password"];
        include("controllers/admin.php");
    }

    if (isset($_POST["add_vehicle"]))
    {
        $_SESSION["bad_register"] = false;
        clear_errors();
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
        $_SESSION["bad_register"] = false;
        clear_errors();
        include("view/make_list.php");
    }

    if (isset($_POST["add_make"]))
    {
        MakeDB::add_make($_POST["make_name"]);
        include("view/make_list.php");
        $busy = true;
    }

    if (isset($_POST["delete_make"]))
    {
        MakeDB::delete_make($_POST["del"]);
        include("view/make_list.php");
        $busy = true;
    }

    if (isset($_POST["view_edit_types"]))
    {
        $_SESSION["bad_register"] = false;
        clear_errors();
        include("view/type_list.php");
    }

    if (isset($_POST["add_type"]))
    {
        TypeDB::add_type($_POST["type_name"]);
        include("view/type_list.php");
        $busy = true;
    }

    if (isset($_POST["delete_type"]))
    {
        TypeDB::delete_type($_POST["del"]);
        include("view/type_list.php");
        $busy = true;
    }

    if (isset($_POST["view_edit_classes"]))
    {
        $_SESSION["bad_register"] = false;
        clear_errors();
        include("view/class_list.php");
    }

    if (isset($_POST["add_class"]))
    {
        ClassDB::add_class($_POST["class_name"]);
        include("view/class_list.php");
        $busy = true;
    }
    
    if (isset($_POST["delete_class"]))
    {
        ClassDB::delete_class($_POST["del"]);
        include("view/class_list.php");
        $busy = true;
    }

    if ($_SESSION["bad_register"] == true)
    {
        $_SESSION["action"] = "show_register";
        include("controllers/admin.php");
        $busy = true;
    }

    if (!isset($_POST["add_vehicle"]) && !isset($_POST["view_edit_makes"]) && !isset($_POST["view_edit_types"]) && !isset($_POST["view_edit_classes"]) && !$busy && $_SESSION["is_logged_in"] == true)
    {
        include("view/vehicle_list.php");
    }
?>