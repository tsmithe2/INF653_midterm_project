<?php
    require("model/database.php");
    require("model/vehicle_db.php");
    require("model/make_db.php");
    require("model/type_db.php");
    require("model/class_db.php");

    /*$busy = false;

    if (isset($_POST["add_vehicle"]))
    {
        include("admin/view/add_vehicle_form.php");
    }
    if (isset($_POST["vehicle_added"]))
    {
        add_vehicle($_POST["vehicle_year"], $_POST["make_id"], $_POST["vehicle_model"], $_POST["type_id"], $_POST["class_id"], $_POST["vehicle_price"]);
        include("admin/view/add_vehicle_form.php");
        $busy = true;
    }
    if (isset($_POST["delete_vehicle"]))
    {
        delete_vehicle($_POST["del"]);
    }

    if (isset($_POST["view_edit_makes"]))
    {
        include("admin/view/make_list.php");
    }
    if (isset($_POST["add_make"]))
    {
        add_make($_POST["make_name"]);
        include("admin/view/make_list.php");
        $busy = true;
    }
    if (isset($_POST["delete_make"]))
    {
        delete_make($_POST["del"]);
        include("admin/view/make_list.php");
        $busy = true;
    }

    if (isset($_POST["view_edit_types"]))
    {
        include("admin/view/type_list.php");
    }
    if (isset($_POST["add_type"]))
    {
        add_type($_POST["type_name"]);
        include("admin/view/type_list.php");
        $busy = true;
    }
    if (isset($_POST["delete_type"]))
    {
        delete_type($_POST["del"]);
        include("admin/view/type_list.php");
        $busy = true;
    }

    if (isset($_POST["view_edit_classes"]))
    {
        include("admin/view/class_list.php");
    }
    if (isset($_POST["add_class"]))
    {
        add_class($_POST["class_name"]);
        include("admin/view/class_list.php");
        $busy = true;
    }
    if (isset($_POST["delete_class"]))
    {
        delete_class($_POST["del"]);
        include("admin/view/class_list.php");
        $busy = true;
    }

    if (!isset($_POST["add_vehicle"]) && !isset($_POST["view_edit_makes"]) && !isset($_POST["view_edit_types"]) && !isset($_POST["view_edit_classes"]) && !$busy)
    {
        include("admin/view/vehicle_list.php");
    }*/
?>