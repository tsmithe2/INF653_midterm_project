<?php
    class ClassDB
    {
        private function __construct() {}

        public static function add_class($class_name)
        {
            $query = "INSERT INTO classes (className) VALUES ('" . addslashes($class_name) . "')";
            Database::fetch_one($query);
        }

        public static function delete_class($class_id)
        {
            $query = "DELETE FROM classes WHERE classID = $class_id";
            Database::fetch_all($query);
        }
    }
?>