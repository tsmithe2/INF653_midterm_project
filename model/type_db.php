<?php
    function add_type($type_name)
    {
        global $db;
        $query = "INSERT INTO types (typeName) VALUES ('" . addslashes($type_name) . "')";
        fetch_one($query, $db);
    }
    function delete_type($type_id)
    {
        global $db;
        $query = "DELETE FROM types WHERE typeID = $type_id";
        fetch_all($query, $db);
    }
?>