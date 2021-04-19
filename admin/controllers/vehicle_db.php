<?php
    class VehicleDB
    {
        private function __construct() {}

        public static function add_vehicle($year, $make_id, $model, $type_id, $class_id, $price)
        {
            $query = "INSERT INTO vehicles (year, makeID, model, typeID, classID, price) VALUES ('" . addslashes($year) . "',$make_id,'" . addslashes($model) . "',$type_id,$class_id, '" . addslashes($price) . "')";
            Database::fetch_one($query);
        }

        public static function delete_vehicle($vehicle_id)
        {
            $query = "DELETE FROM vehicles WHERE vehicleID = $vehicle_id";
            Database::fetch_all($query);
        }
    }
?>