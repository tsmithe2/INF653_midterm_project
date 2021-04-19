<?php
    class MakeDB
    {
        private function __construct() {}

        public static function add_make($make_name)
        {
            $query = "INSERT INTO makes (makeName) VALUES ('" . addslashes($make_name) . "')";
            Database::fetch_one($query);
        }

        public static function delete_make($make_id)
        {
            $query = "DELETE FROM makes WHERE makeID = $make_id";
            Database::fetch_all($query);
        }
    }
?>