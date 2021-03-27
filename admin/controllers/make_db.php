<?php
    function add_make($make_name)
    {
        global $db;
        $query = "INSERT INTO makes (makeName) VALUES ('" . addslashes($make_name) . "')";
        fetch_one($query, $db);
    }
    function delete_make($make_id)
    {
        global $db;
        $query = "DELETE FROM makes WHERE makeID = $make_id";
        fetch_all($query, $db);
    }
?>