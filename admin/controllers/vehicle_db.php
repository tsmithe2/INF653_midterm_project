<?php
    function add_vehicle($year, $make_id, $model, $type_id, $class_id, $price)
    {
        global $db;
        $query = "INSERT INTO vehicles (year, makeID, model, typeID, classID, price) VALUES ('" . addslashes($year) . "',$make_id,'" . addslashes($model) . "',$type_id,$class_id, '" . addslashes($price) . "')";
        fetch_one($query, $db);
    }
    function delete_vehicle($vehicle_id)
    {
        global $db;
        $query = "DELETE FROM vehicles WHERE vehicleID = $vehicle_id";
        fetch_all($query, $db);
    }
?>