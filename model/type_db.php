<?php
    class TypeDB
    {
        private function __construct() {}

        public static function add_type($type_name)
        {
            $query = "INSERT INTO types (typeName) VALUES ('" . addslashes($type_name) . "')";
            Database::fetch_one($query);
        }
        
        public static function delete_type($type_id)
        {
            $query = "DELETE FROM types WHERE typeID = $type_id";
            Database::fetch_all($query);
        }
    }
?>