<?php
    function add_class($class_name)
    {
        global $db;
        $query = "INSERT INTO classes (className) VALUES ('" . addslashes($class_name) . "')";
        fetch_one($query, $db);
    }
    function delete_class($class_id)
    {
        global $db;
        $query = "DELETE FROM classes WHERE classID = $class_id";
        fetch_all($query, $db);
    }
?>